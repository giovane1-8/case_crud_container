<div class="container mt-3">
    <center>
        <form method="POST" action="<?php echo VENDOR_PATH ?>editcontainer/saveedit/<?php echo $this->dados[0]["cd_container"] ?>">


            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Numero do container</span>
                </div>
                <input type="text" value="<?php echo str_split($this->dados[0]["cd_container"], 4)[0];
                                            ?>" name="cn1" id="cn1" class="form-control" placeholder="AAAA" aria-describedby="basic-addon1" maxlength="4" required>

                <input type="number" value="<?php echo explode(str_split($this->dados[0]["cd_container"], 4)[0], $this->dados[0]["cd_container"])[1];
                                            ?>" name="cn2" id="cn2" class="form-control" placeholder="1234567" aria-describedby="basic-addon1" min="0" max="9999999" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Tipo</span>
                </div>
                <select name="tipo" class="custom-select" id="inputGroupSelect01" required>

                    <option value="20" <?php
                                        if ($this->dados[0]["cd_tipo"] == 20) {
                                            echo "selected";
                                        }
                                        ?>>20</option>
                    <option value="40" <?php
                                        if ($this->dados[0]["cd_tipo"] == 40) {
                                            echo "selected";
                                        }
                                        ?>>40</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Status</span>
                </div>
                <select name="status" class="custom-select" id="inputGroupSelect01" required>
                    <option value="Cheio" <?php
                                            if ($this->dados[0]["nm_status"] == "Cheio") {
                                                echo "selected";
                                            }
                                            ?>>Cheio</option>
                    <option value="Vazio" <?php
                                            if ($this->dados[0]["nm_status"] == "Vazio") {
                                                echo "selected";
                                            }
                                            ?>>Vazio</option>
                </select>
            </div>


            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Categoria</span>
                </div>
                <select name="categoria" class="custom-select" id="inputGroupSelect01" required>

                    <option value="Exportação" <?php
                                                if ($this->dados[0]["nm_categoria"] == "Exportação") {
                                                    echo "selected";
                                                }
                                                ?>>Exportação</option>
                    <option value="Importação" <?php
                                                if ($this->dados[0]["nm_categoria"] == "Importação") {
                                                    echo "selected";
                                                }
                                                ?>>Importação</option>
                </select>
            </div>
            <input type="submit" class="form-control btn btn-success" aria-describedby="basic-addon1">

        </form>
    </center>
</div>

<script>
    window.addEventListener("load", function() {
        async function verificaContainer() {
            cn1 = document.getElementById("cn1").value;
            cn2 = parseInt(document.getElementById("cn2").value);


            if ((cn1 != '') && (cn2 != '')) {


                var jqxhr = $.ajax("http://localhost/addcontainer/verificacontainer", {
                        method: "POST",
                        data: {
                            CN1: cn1,
                            CN2: cn2
                        }
                    })

                    .done(function(msg) {
                        msg = JSON.parse(msg)
                        console.log(msg)
                        if (msg.length > 0) {
                            alert("Ja existe um container com esse numero");
                            $("input[type=submit]").addClass("disabled");
                            $("form").attr("action", "")

                        } else {
                            $("form").attr("action", "<?php echo VENDOR_PATH ?>editcontainer/saveedit/<?php echo $this->dados[0]["cd_container"] ?>")

                            $("input[type=submit]").removeClass("disabled");
                        }
                    })



            }
        }
        $("#cn1").change(verificaContainer);
        $("#cn2").change(verificaContainer);

    })
</script>