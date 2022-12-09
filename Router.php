<?php

/**
 * Controla o sistema de rotas
 * primeiro parametro indica a rota desejada
 * segundo parametro é uma função que roda quando bate na rota do primeiro parametro 
 */
class Router
{
	public static function rota($path, $arg)
	{
		$url = @$_GET['url'];
		if (($url == $path) || ($url == $path . "/")) {
			$arg();
			die();
		}

		$path = explode('/', $path);
		$url = explode('/', @$_GET['url']);
		$ok = true;
		$par = [];


		if ((count($path) + 1 == count($url)) || (count($path) == count($url))) {

			foreach ($path as $key => $value) {
				if (($value == '?') || ($value == '?/')) {
					$par[$key] = $url[$key];
				} else if ($url[$key] != $value) {
					$ok = false;
					break;
				}
			}
			if ($ok) {
				$arg($par);
				die();
			}
		}
	}
}
