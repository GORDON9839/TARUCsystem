<?php

require_once 'factoryloan.php';
require_once 'factorylevelstudy.php';

class factory {

    // Use getShape() function to get object of type shape
    public function createRecord($type) {
        if ($type == null)
            return null;

        if (strcasecmp($type, "LOAN") == 0)
            return new Circle();

        if (strcasecmp($type, "LEVELSTUDY") == 0)
            return new Rectangle();

        return null;
    }

}
