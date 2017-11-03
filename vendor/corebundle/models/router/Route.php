<?php

namespace Models\router;

class Route {

	private $path; // Store the path from the url
	private $callable; // String or function that will determine what to do
	private $matches; // Store the matches for parameters

	// Store parametters :

	public function __construct($path, $callable) {
		$this->path = trim($path, '/');
		$this->callable = $callable;
	}

	// Check if the route match a parametter :

	public function match($url) {
		$url = trim($url, '/'); // Remove '/' at the beggining and the end of the url before storing it
		$path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path); // Look if there is a parametter in the url and replace it (basically remove the ':')
		$regex = "#^$path$#i"; // Filter (i = case sensitive)
		if (!preg_match($regex, $url, $matches)) { // Verify if the url matches the filter
			return false; // If not, return false
		}
		array_shift($matches); // Delete first entry of the array so only the matches remain instead of having the full url on index 0 of the array
		$this->matches = $matches; // Store the parametter
		return true;
	}

	// Call the correct controller :

	public function call() {
		if (is_string($this->callable)) { // Check if a string is passed
			$params = explode('#', $this->callable);
			$controller = "Controllers\\" . $params[0] . "Controller"; // Select the right controller
			$controller = new $controller(); // And instance it
			$action = $params[1] . "Action"; // Select the right method of the controller
			return call_user_func_array([$controller, $params[1] . "Action"], $this->matches); // Execute the method from the controller and give parametters
		} else {
			throw new RouterException('Argument is not a string !'); // Error if not a string
			
		}
	}

}