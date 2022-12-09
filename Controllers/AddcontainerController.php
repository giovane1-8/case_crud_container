<?php
/*
 * Classe controller da pagina home
*/

namespace Controllers;

class AddcontainerController extends Controller
{
    private $dados;
    public function __construct($view, $model)
    {
        parent::__construct($view, $model);
    }
    public function index()
    {
        if (!empty($_POST)) {
            \Router::rota("addcontainer/set",  function () {
                if (isset($_POST["cliente"], $_POST["cn1"], $_POST["cn2"], $_POST["tipo"], $_POST["status"], $_POST["categoria"])) {
                    $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $this->dados["cn2"] = ltrim($this->dados["cn2"], "0");
                    $aux = $this->dados["cn2"];
                    $count = 0;
                    while ($aux > 9) {
                        $aux = $aux / 10;
                        $count++;
                    };
                    for ($i = 0; $i <  6 - $count; $i++) {
                        $this->dados["cn2"] = substr_replace($this->dados["cn2"], '0', 0, 0);
                    }
                    if ($this->model->insereDb($this->dados)) {
                        header("location: " . VENDOR_PATH . "addcontainer/success");
                    } else {
                        header("location: " . VENDOR_PATH . "addcontainer/error");
                    }
                }
            });
        }
        \Router::rota("addcontainer/verificacontainer",  function () {

            if (isset($_POST["CN1"], $_POST["CN2"])) {
                $_POST["CN2"] = ltrim($_POST["CN2"], "0");
                $aux = $_POST["CN2"];
                $count = 0;
                while ($aux > 9) {
                    $aux = $aux / 10;
                    $count++;
                };
                for ($i = 0; $i <  6 - $count; $i++) {
                    $_POST["CN2"] = substr_replace($_POST["CN2"], '0', 0, 0);
                }
                $_POST["CN1"] = $_POST["CN1"] . $_POST["CN2"];
                $this->model->getContainer($_POST["CN1"]);
            }
        });
        $this->view->dados =  $this->model->getClientes();
        $this->view->render("addcontainer", 'Adicionar container');
    }
}
