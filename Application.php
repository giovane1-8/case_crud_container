<?php
/*
 * Define a constante que tem como valor o dominio do sistema web
 * Captura a rota e cria os objetos Model View e Controller dependendo da rota escolhida
 * Sempre sera criado o objeto com o nome do primeiro caminho da rota com a concatenação de Model ou View ou Controller. EX: homeController
 * se nenhum caminho é especificado ele chama a classe Home
*/

//  CONSTANTE DE PATH PARA ROTA [MODIFICAR SE NECESSARIO]
define("VENDOR_PATH", "http://localhost/");
if (empty($_SESSION['isLogado'])) {
    $_SESSION['isLogado'] = false;
};
class Application
{
    const DEFAULT = "Home";

    public function executar()
    {

        if (isset($_GET['url'])) {
            $url = explode("/", $_GET['url']);
            $class = 'Controllers\\' . ucfirst($url[0]) . "Controller";
        } else {
            $class = "Controllers\\HomeController";
            $url[0] = self::DEFAULT;
        }
        $view = 'Views\\' . ucfirst($url[0]) . "View";
        $model = 'Models\\' . ucfirst($url[0]) . "Model";
        $controller = new $class(new $view, new $model);
        $controller->index();
    }
}
