<?php

/**
  *  Insertion back end script.
  */

// TODO: make file return to insertFrontEnd after processing
require "templates/header.php";
echo "<br> <br> <br>"; //TODO: fix this with html/css
//$uploadOk = 1;
// TODO: Limit file types and sizes

if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try {
        // Get input from HTML form.
        $file_name  = str_replace("\\", "/", $_FILES["fileToInsert"]["tmp_name"]);
        $table_name = $_POST["tableName"];

        // Open connection to the database
        $connection = new PDO($dsn, $username, $password, $options);

        // Write query.
        $query =
            "LOAD DATA LOCAL INFILE :file_name
            INTO TABLE $table_name
            FIELDS TERMINATED BY ','
            OPTIONALLY ENCLOSED BY '\"'
            LINES TERMINATED BY '\r\n'
            IGNORE 1 LINES";

        // Prepare query.
        $statement = $connection->prepare($query);

        // Bind parameters.
        $statement->bindParam(':file_name', $file_name);

        // Execute query.
        $statement->execute();

        // Count number of rows in table after insertion.
        $query2 =
            "SELECT COUNT(*)
            FROM $table_name";

        /* Prepared statement is unnecessary for the purpose of counting rows */
        $num_rows = $connection->query($query2)->fetchColumn();

        echo "Records inserted successfully." . "<br>" .
            " The $table_name table now has $num_rows rows." . "<br>";

        // Close connection to the database.
        $connection = null;

    } catch (PDOException $error) {
        echo $error->getMessage() . "<br>";
    }
}