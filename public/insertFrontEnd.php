<!DOCTYPE html>
<html lang="en">

<!-- HTML for the insertion front end page. -->

<?php require "templates/header.php"; ?>

<head>
    <title> Insert | Upload Records </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/shared.css">
    <link rel="stylesheet" href="css/insert.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="bg"></div>
<div class="content">
    <div class="container">
        <h2>
            Insert | Upload <br> Records
        </h2>

        <form method="post" action="insertBackEnd.php" enctype="multipart/form-data">
            <!--            TODO: add support for .xlsx files -->

            <p> Select a .csv file to insert </p>
            <input type="file" name="fileToInsert" id="fileToInsert" accept=".csv" required>
            <!--            TODO: Implement drag and drop option -->
            <br> <br>
            <p>
                Select table to insert into
            </p>
            <select name="tableName" id="tableName" title="Insertion Destination" required>
                <option value="" hidden> Select Table... </option>
                <option value="applications"> Applications </option>
                <option value="awards"> Awards </option>
                <option value="enrollment"> Enrollments </option>
                <option value="graduation"> Graduations </option>
                <option value="student"> Students </option>
            </select>
            <!--            TODO: Make appear when file is uploaded and table is selected-->
            <br>
            <button type="submit" name="submit">Insert file into database</button>
        </form>

    </div>

</div>
</body>
</html>
