<?php
session_start();
spl_autoload_register(function ($class_name) {
    if ($class_name === 'TeamMember') {
        require_once("../models/Team.class.php");
    } else {
        require_once("../models/" . $class_name . ".class.php");
    }
});
