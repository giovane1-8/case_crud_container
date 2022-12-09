<?php
/*
 * Classe controller da pagina home
*/

namespace Controllers;

class EditcontainerController extends Controller
{
    public function __construct($view, $model)
    {
        parent::__construct($view, $model);
    }
    public function index()
    {

        \Router::rota("editcontainer/saveedit/?", function ($arg) {
            if (isset($_POST["cn1"], $_POST["cn2"], $_POST["tipo"], $_POST["status"], $_POST["categoria"])) {
                $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $this->dados["container"] = $arg[2];
                $this->dados["cn2"] = ltrim($this->dados["cn2"],"0");
                $aux = $this->dados["cn2"];
                $count = 0;
                while ($aux > 9) {
                    $aux = $aux / 10;
                    $count++;
                };
                for ($i = 0; $i <  6 - $count; $i++) {
                    $this->dados["cn2"] = substr_replace($this->dados["cn2"], '0', 0, 0);
                }
                
            
                if ($this->model->saveedit($this->dados)) {
                    header("location: " . VENDOR_PATH . "editcontainer/" . $this->dados["cn1"] . $this->dados["cn2"] . "/success");
                } else {
                  
                  header("location: " . VENDOR_PATH . "editcontainer/" . $this->dados["container"] . "/error");
                }
            }
        });

        \Router::rota("editcontainer/excluir/?", function ($arg) { 
             if($this ->model->excluirContainer($arg[2])){
                $this->view->dados = $this->model->getAllContainers();
                $this->view->render("home", 'Home');
                echo "<script>alert('excluido com sucesso')</script>";
             };
        });
        \Router::rota("editcontainer/?", function ($arg) {

            $this->view->dados =  $this->model->getContainerR($arg[1]);

            $this->view->render("editcontainer", 'Editar Container');
        });

        header("location: " . VENDOR_PATH);
    }
}
