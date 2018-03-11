<?php
/**
 * App Core Class
 * Creates URL & loads core Controller
 * URL FORMAT - /controller/methods/prams
 **/
Class Core 
{
    protected $currentController = 'PagesController';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() 
    {
        // print_r($this->getUrl());
        $url = $this->getUrl();

        // Look in controllers for first value
        if (file_exists('../app/controllers/' . ucwords($url[0]) . 'Controller.php')) {
            // If Exists, set as controller
            $this->currentController = ucwords($url[0]) . 'Controller';
            // Unset 0 Index
            unset($url[0]);
        }

        // Require the Controller
        require_once '../app/controllers/'.$this->currentController . '.php';

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for second part url
        if (isset($url[1])) {
            // check to see if method exists in controller
            if (method_exists($this->currentController, $url[1])) {
                // Set current method
                $this->currentMethod = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }

        // Get params
        $this->params = $url ? array_values($url) : [];
        
        // Call a callback with arrat of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params); 
        
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

}

