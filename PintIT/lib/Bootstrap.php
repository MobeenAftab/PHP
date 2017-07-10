<?php
/*
  Bootstrap class is responsible for redirecting the user based on url and
  follow through any requests or actions triggered during session.
*/
  class Bootstrap {

    private $controller;
    private $action;
    private $request;

    /*  Redirect user based on url
        @param controller, action, request
    */
    public function __construct($request){

      $this->request = $request;
      //Redirect user based on controller
      if ($this->request['controller'] == "") {
        $this->controller = 'home';
      } else {
        $this->controller = $this->request['controller'];
      }
      //Redirect user based on action
      if ($this->request['action'] == "") {
        $this->action = 'index';
      } else {
        $this->action = $this->request['action'];
      }
      echo $this->controller;
    }

    /*
    */
    public function CreateController () {

      //Check if class exists
      if (class_exists($this->controller)) {
        $parents = class_parents($this->controller);
        //Check if method exists
        if (in_array("Controller", $parents)) {
          if (method_exists($this->controller, $this->action)) {
            //instanciate controller if exists
            return new $this->controller($this->action, $this->action);
          } else {
            //Method does not exist
            echo '<h1>Method does not exist</h1>';
            return ;
          }
        } else {
          //Base controller not found
          echo '<h1>Base controller not found</h1>';
          return ;
        }
      } else {
        //Controller Class not found
        echo '<h1>Controller class does not exist</h1>';
        return;
      }
    }

  }

?>
