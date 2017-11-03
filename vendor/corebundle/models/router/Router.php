<?php

namespace Models\router;

class Router {

	private $url; // Store the url from the adress bar
	private $routes = []; // Routes get stored here

	// The url get stored into $url when the router get instancied :

	public function __construct($url) {
		$this->url = $url;
	}

	// Methods to set a new route based on request being a get or a post, then store the route into routes[] :

	public function get($path, $callable) {
		$route = new Route($path, $callable);
		$this->routes['GET'][] = $route;
	}

	public function post($path, $callable) {
		$route = new Route($path, $callable);
		$this->routes['POST'][] = $route;
	}

	// Once the route has been set, this make sure the route match an url. If not, it display a 404 :

	public function run() {
	if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) { // Make sure the request method is set
			throw new RouterException('missing REQUEST_METHOD'); // If not, throw an exception !
		}
		foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
			if ($route->match($this->url)) { // If the url match the route, start to call requiered controller.
				return $route->call();
			}
		}
		echo '404 - Page does not exist !';
	} 

}