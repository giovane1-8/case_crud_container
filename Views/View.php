<?php
/*
 * Classe filha de todas as views
 * aqui fica os metodos e propriedades que usamos em todas as views
*/

namespace Views;

class View
{
    const PATH_PAGES = "paginas/";
    public $dados;
    public $titlePage;
    public $msnTXT;

    public function render($fileName, $titlePage, $head = null, $footer = null)
    {
        
        $this->titlePage = $titlePage;

        if ($head == null) {
            include(self::PATH_PAGES . "head/head.php");
        } else {
            include(self::PATH_PAGES . "head/" . $head . ".php");
        }

        include(self::PATH_PAGES . $fileName . ".php");

        if ($footer == null) {
            include(self::PATH_PAGES . "footer/footer.php");
        } else {
            include(self::PATH_PAGES . "footer/" . $footer . ".php");
        }
    }
}
