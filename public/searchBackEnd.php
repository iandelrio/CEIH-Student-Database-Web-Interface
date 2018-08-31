<!DOCTYPE html>
<html lang="en">

<!-- Search back end script and HTML for search result page. -->

<head>
    <title> Insert | Upload Records </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/shared.css">
    <link rel="stylesheet" href="css/searchBackEnd.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<div class="content">
    <div class="push"></div>
    supper <br> supper <br> supper
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br>right: width = 100% - 250px, height = 100%
    <div class="push"></div>
</div>

<div class="footer">
    <a href="#" id="results">__ Results</a>
    <a href="#">Legend</a>
    <a href="#">Edit Table</a>
    <a href="#">Download Table</a>

</div>

<?php
require "templates/header.php";

if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try {
        // Get inputs from HTML form

        // Open connection to the database
        $connection = new PDO($dsn, $username, $password, $options);

        // Write query.
        $query =
            "SELECT *
            FROM ___
            WHERE ___";

        // Prepare query
        $statement = $connection->prepare($query);

        // Bind parameters.
        //$statement->bindParam(':file_name', $file_name);

        // Execute query.
        $statement->execute();

        // Get reference to table to make it sortable in javascript

        // Count the number of tuples in the query.
        $numResults = $statement->rowCount();

        // Close connection to the database.
        $connection = null;

    } catch (PDOException $error) {
        echo $error->getMessage() . "<br>";
    }
}
?>

<script>
    // Display number of results in footer.
    let numResults = '<?php echo $numResults; ?>';
    document.getElementById("numResults").innerHTML = numResults + " Results";
</script>

