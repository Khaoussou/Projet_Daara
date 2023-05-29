<?php

namespace Router;

class Route
{
	private $routes = [];
	public function addRoute($methode, $chemin, $controller, $methodeControler)
	{
		array_push($this->routes, [
			"methode" => $methode,
			"chemin" => $chemin,
            "controller" => $controller,
			"methodeControler" => $methodeControler
		]);
	}

	public function treatRequest($methode, $chemin)
	{
		foreach ($this->routes as $route) {
			if ($route["methode"] === $methode && $route["chemin"] === $chemin) {
                $controller = $route["controller"];
                $methodeControler = $route["methodeControler"];
                $var = new $controller();
				$var->$methodeControler();
				return;
			}
		}
	}
}

