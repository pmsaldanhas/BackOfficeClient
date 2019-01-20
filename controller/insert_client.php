<?php
    include_once '../model/Connection.class.php';
    include_once '../model/Manager.class.php';

    $manager = new Manager();
    $connection = new Connection();
    
    //data array from POST
    $data = $_POST;

    //db connection
    $query = $connection->get_instance(); //Connection.class Method
    $sql = "SELECT id, email, taxNumber FROM entries";
    $statement = $query->prepare($sql);
    $statement->execute();

    //Email validations
    $emails = $statement->fetchAll ( PDO::FETCH_ASSOC );
    foreach( $emails as $email ) {
        $email_array[] = $email['email'];
    }

    //TaxNUmber validations
    $taxNumbers = $statement->fetchAll ( PDO::FETCH_ASSOC );
    foreach( $taxNumbers as $taxNumber ) {
        $taxNumber_array[] = $taxNumber['taxNumber'];
    }

    if( isset($data) && !empty($data) ) {

        if( in_array( $_POST['email'], $email_array ) || 
            in_array( $_POST['taxNumber'], $taxNumber_array ) ){

            //redirect to
            header("Location: ../view/page_register.php?message=This client already exist. Fill out the form correctly.");

        } else{

            $manager->insertClient("entries", $data);
            //redirect to
            header("Location: ../index.php?client_add_success");

        }
    }
?>