<?php

/**
  *  Insertion back end script.
  */

// TODO: make file return to insertFrontEnd after processing
require "templates/header.php";
echo "<br> <br> <br>";
//$uploadOk = 1;
// TODO: Limit file types and sizes

if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try {
        $file_name  = $file = str_replace("\\", "/", $_FILES["fileToInsert"]["tmp_name"]);
        $table_name = $_POST["tableName"];
        $connection = new PDO($dsn, $username, $password, $options);

        $query =
            "LOAD DATA LOCAL INFILE :file_name
            INTO TABLE $table_name
            FIELDS TERMINATED BY ','
            OPTIONALLY ENCLOSED BY '\"'
            LINES TERMINATED BY '\r\n'
            IGNORE 1 LINES";

        $statement = $connection->prepare($query);

//        TODO: Figure out why bindParam inserts single quotes
        $statement->bindParam(':file_name', $file_name);
        //$statement->bindParam(':table_name', $table_name);

        $statement->execute();

        $query2 =
            "SELECT COUNT(*)
            FROM $table_name";

        /* Prepared statement is unnecessary for the purpose of counting rows */
        $num_rows = $connection->query($query2)->fetchColumn();

        echo "Records inserted successfully." . "<br>" .
            " The $table_name table now has $num_rows rows." . "<br>";

        $connection = null;

    } catch (PDOException $error) {
        echo $error->getMessage() . "<br>";
    }
}