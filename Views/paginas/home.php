<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Numero</th>

                <th scope="col">Cliente</th>
                <th scope="col">Tipo</th>
                <th scope="col">Status</th>

                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($this->dados as $i) {

                echo "
                    <tr>
                        <th scope='row'>" . $count++ . "</th>
                        <td>" . $i["cd_container"] . "</td>
                        
                        <td>" . $i["nm_cliente"] . "</td>
                        <td>" . $i["cd_tipo"] . "</td>
                        <td>" . $i["nm_status"] . "</td>
                        <td>" . $i["nm_categoria"] . "</td>
                        <td><a href= " . VENDOR_PATH . "editcontainer/" . $i["cd_container"] . "><input type='button' value='editar' class='btn btn-warning'></a> </td>
                        <td><a href= " . VENDOR_PATH . "editcontainer/excluir/" . $i["cd_container"] . "><input type='button' value='excluir' class='btn btn-danger'></a> </td>
                        
                    </tr>
                    ";
            }
            ?>

        </tbody>
    </table>
</div>