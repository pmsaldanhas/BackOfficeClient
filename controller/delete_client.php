<?php

    include_once '../model/Connection.class.php';
    include_once '../model/Manager.class.php';

    $manager = new Manager();

    $id = $_POST['id'];

    if( isset($id) && !empty($id) ) {
        $manager->deleteClient("entries", $id);
        header("Location: ../index.php?client_delected");
    }

?>