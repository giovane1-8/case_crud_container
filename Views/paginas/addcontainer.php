<div class="container mt-3">
    <center>
        <form method="POST" action="<?php echo VENDOR_PATH ?>addcontainer/set">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Cliente</span>
                </div>
                <select name="cliente" class="custom-select" id="inputGroupSelect01" required>
                    <?php
                    foreach ($this->dados as $i) {
                        echo "<option value='" . $i[0] . "'>" . $i[1] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Numero do container</span>
                </div>
                <input type="text" name="cn1" id="cn1" class="form-control" placeholder="AAAA" aria-describedby="basic-addon1" maxlength="4" required> <input type="number" name="cn2" id="cn2" class="form-control" placeholder="1234567" aria-describedby="basic-addon1" min="0" max="9999999" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Tipo</span>
                </div>
                <select name="tipo" class="custom-select" id="inputGroupSelect01" required>

                    <option value="20">20</option>
                    <option value="40">40</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Status</span>
                </div>
                <select name="status" class="custom-select" id="inputGroupSelect01" required>
                    <option value="Cheio">Cheio</option>
                    <option value="Vazio">Vazio</option>
                </select>
            </div>


            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Categoria</span>
                </div>
                <select name="categoria" class="custom-select" id="inputGroupSelect01" required>

                    <option value="Exportação">Exportação</option>
                    <option value="Importação">Importação</option>
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