<?php

class App
{
    // Default controller and method if not specified in the URL
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // Parse the URL into parts
        $url = $this->parseUrl();

        // Check if the requested controller file exists
        if (isset($url[0]) && file_exists('controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = ucfirst($url[0]) . 'Controller'; // e.g., 'post' → 'PostController'
            unset($url[0]); // Remove the controller part from the URL array
        }

        // Load the controller file
        require_once 'controllers/' . $this->controller . '.php';

        // Instantiate the controller class
        $this->controller = new $this->controller;

        // Check if method exists in controller
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1]; // e.g., 'edit', 'delete'
            unset($url[1]); // Remove the method part from the URL array
        }

        // Any remaining parts of the URL are treated as parameters
        $this->params = $url ? array_values($url) : [];

        // Call the controller method with parameters
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Parse the URL from the GET request
     * Example: index.php?url=post/edit/5 → ['post', 'edit', '5']
     */
    private function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode(
                '/',
                filter_var(
                    rtrim($_GET['url'], '/'),
                    FILTER_SANITIZE_URL
                )
            );
        }
        return []; // Default to an empty array
    }
}
