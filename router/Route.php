<?php

namespace Router;

class Route
{
	private $routes = [];
	private $params;
	public function addRoute($methode, $chemin, $controller, $methodeControler)
	{
		array_push($this->routes, [
			"methode" => $methode,
			"chemin" => $chemin,
			"controller" => $controller,
			"methodeControler" => $methodeControler
		]);
	}
	public function treatUrl($pathExist, $path)
	{
		$chemin = preg_replace("#:([\w]+)#", "([^/]+)", $pathExist);
		if (preg_match("#^$chemin$#", $path, $value)) {
			$this->params = $value;
			return true;
		} else {
			return false;
		}
	}
	public function treatRequest($methode, $chemin)
	{
		//a-zA-Z0-9 = \w
		foreach ($this->routes as $route) {
			if ($route["methode"] === $methode) {
				if ($this->treatUrl($route['chemin'], $chemin)) {
					$controller = $route["controller"];
					$methodeControler = $route["methodeControler"];
					$var = new $controller();
					if (isset($this->params[1])) {
						$var->$methodeControler($this->params[1]);
					} else {
						$var->$methodeControler();
					}
					return;
				}
			}
		}
	}
}
