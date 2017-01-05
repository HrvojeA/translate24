<?php
namespace MyNamespace;

class Loader {
    public function construct () {
        spl_autoload_register (array ($this, 'load'));
    }
    public function load ($class) {
        // Process the class name here to suit your own file structure
         require_once  ($class.'.php');
    }

    public function killit(){
        echo '5123213213123';
    }
}