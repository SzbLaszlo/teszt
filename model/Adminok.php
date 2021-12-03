<?php

require_once 'KijeloltFelhasznalo.php';

class Admin extends Kijeloltfelhasznalok {
    
    function __construct() {
        $this->tablaNev = 'adminok';
    }
}

?>