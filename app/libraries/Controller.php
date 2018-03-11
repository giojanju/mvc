<?php
/**
 * Base Controller
 * Load the models and views 
 */

 class Controller 
 {  
    /**
     * Load model
     * @param string
    */
    public function model($model)
    {
        // Require model file
        require_once '../app/models/'.$model.'.php';

        // Instatiate model
        return new $model();
    } 

    /**
     * Load View
     * @param string
     * @param array
     */
    public function view($view, $data = [])
    {
        // check for view file
        if (file_exists('../app/views/'.$view.'.php')) {
            require_once '../app/views/'.$view.'.php';
        } else {
            // View Dose nod extsts
            die('View Dose not exist');
        }
    }
}

