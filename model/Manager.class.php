<?php

    class Manager extends Connection {

        //Create Client Method - Create
        public function insertClient($table, $data) {

            //db connection
            $pdo = parent::get_instance(); //Connection.class Method

            $fields = implode(", ", array_keys($data));
            $values = ":".implode(", :", array_keys($data));
            $sql = "INSERT INTO $table ($fields) VALUES ($values)";
            $statement = $pdo->prepare($sql);
            foreach($data as $key => $value) {
                $statement->bindValue(":$key", $value, PDO::PARAM_STR);
            }
            $statement->execute();
        }

        //Read Client Method - Read
        public function listClient($table) {
            $pdo = parent::get_instance();
            $sql = "SELECT * FROM $table ORDER BY name ASC";
            $statement = $pdo->query($sql);
            $statement->execute();

            //return all records 
            return $statement->fetchAll();
        }

        //Delete Client Method - Delete
        public function deleteClient($table, $id) {
            $pdo = parent::get_instance();
            $sql = "DELETE FROM $table WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();
        }

        //Update Client Form Method - Read before Update (Populate Update Form)
        public function getInfoClient($table, $id) {
            $pdo = parent::get_instance();
            $sql = "SELECT * FROM $table WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":id", $id);
            $statement->execute();

            return $statement->fetchAll();
        }

        //Update Client Info Method - Update
        public function updateClient($table, $id, $data) {
            $pdo = parent::get_instance();
            
            //new_values variable is responsible for carrying the update data
            $new_values = "";

            foreach($data as $key => $value) {
                //continue completing the variable new_values
                $new_values .= "$key=:$key, ";
            }

            //delete comma(,) and space from variable new_values
            $new_values = substr($new_values, 0, -2);

            $sql = "UPDATE $table SET $new_values WHERE id = :id";
            $statement = $pdo->prepare($sql);
            //cycle foreach for give the bindValue of each field form($key)
            foreach($data as $key => $value) {
                $statement->bindValue(":$key", $value, PDO::PARAM_STR);
            }
            $statement->execute();
        }

    }

?>