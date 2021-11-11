<?php

require '../includes/db.inc.php';
require 'KijeloltFelhasznalo.php';

    class Admin extends KijeloltFelhasznalo{
        function __construct(){
            $this->tableNev = 'adminok';
        }
    }

    $admin = new Admin();

    $admin->set_id(1, $conn);
    echo $admin->get_id();
?>