<?php
namespace MyNamespace;

class MyClass {
    public function __construct () {
        add_action ('init', array ($this, 'myFunction'));
    }

}

