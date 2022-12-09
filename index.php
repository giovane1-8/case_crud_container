<?php
/*
 * Pagina que é carregada sempre 
 * Captura por metodo get a rota digitada
 * chama o objeto Application para carregar os objetos de cada pagina
 * Iniciamos a sessão 
*/

$autoload = function ($class) {

    if ($class != "Models\PDO") {
        $arquivo = explode("\\", $class);

        if (count($arquivo) >= 2) {
            $arquivo = $arquivo[0] . "/" . $arquivo[1] . ".php";
        } else {
            $arquivo = $arquivo[0] . ".php";
        }

        if (file_exists($arquivo)) {
            include($arquivo);
        } else {
            include('Views/paginas/erroPagina.php');
            include('Views/paginas/footer/footer.php');
            die();
        };
    };
};


spl_autoload_register($autoload);
$app = new Application();
$app->executar();
