<?php
    include_once '../model/Connection.class.php';
    include_once '../model/Manager.class.php';

    $manager = new Manager();
    $connection = new Connection();

    //all data from POST
    $update_client = $_POST;

    //db connection
    $query = $connection->get_instance(); //Connection.class Method
    $sql = "SELECT id, email, taxNumber FROM entries WHERE id != :id";
    $statement = $query->prepare($sql);
    $statement->bindValue(":id", $_POST['id']);
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
    
    $id = $_POST['id'];

    if( isset($id) && !empty($id) ){

        if( in_array( $_POST['email'], $email_array ) || 
            in_array( $_POST['taxNumber'], $taxNumber_array ) ){

            //redirect to
            header("Location: ../view/page_update.php?id=" . $id . "&message=This client already exist. Fill out the form correctly.");

        } else{
            $manager->updateClient("entries", $id, $update_client);
            header("Location: ../index.php?client_update");
        }

        
    }

?>