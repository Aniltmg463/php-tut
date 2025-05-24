<?php

class Controller
{
    /**
     * Load a model file and return its instance
     * 
     * @param string $model The name of the model (e.g., 'User', 'Post')
     * @return object       An instance of the model class
     * @throws Exception    If the model file or class is not found
     */
    public function model($model)
    {
        // Capitalize the model name (e.g., 'user' → 'User')
        $modelName = ucfirst($model);

        // Build the full file path to the model
        $modelPath = 'models/' . $modelName . '.php';

        // Check if the file exists
        if (file_exists($modelPath)) {
            require_once $modelPath;

            // Check if the class exists after including
            if (class_exists($modelName)) {
                return new $modelName(); // Return an instance of the model
            } else {
                throw new Exception("Model class '$modelName' not found.");
            }
        } else {
            throw new Exception("Model file '$modelPath' not found.");
        }
    }

    /**
     * Load a view file and pass data to it
     * 
     * @param string $view The view file path (e.g., 'auth/login', 'post/index')
     * @param array $data  Optional associative array of data to pass to the view
     */
    public function view($view, $data = [])
    {
        // Convert array keys to variables for use in the view
        extract($data);

        // Build the full path to the view file
        $viewPath = 'views/' . $view . '.php';

        // Check if the file exists before including
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "<h3>View '$view' not found.</h3>";
        }
    }
}
