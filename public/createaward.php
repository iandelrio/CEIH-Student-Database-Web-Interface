<html>
<title> Add an Entry </title>
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/create.css">

    <nav class="navbar navbar-inverse navbar-fixed-top" data-spy="affix">
        <div class="container-fluid">
            <div class="nav navbar-nav">
                <li><a href="http://localhost/studentdb/public/index.php"> ← CEIH Database</a></li>
            </div>
        </div>
    </nav>


</head>
<body>

<?php

if (isset($_POST['submit'])) {

    require "../config.php";
    require "../common.php";

    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_award = array(

            "session" => $_POST['session'],
            "studentNumber" => $_POST['studentNumber'],
            "awardTitle" => $_POST['awardTitle'],
            "awardNumber" => $_POST['awardNumber'],
            "awardAmount" => $_POST['awardAmount'],
            "awardType" => $_POST['awardType'],
            "status" => $_POST['status']
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "awards",
            implode(", ", array_keys($new_award)),
            ":" . implode(", :", array_keys($new_award))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_award);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>


<div class="bg">
    <div class="container">
        <br><br><br>
        <div style="text-align: center;"><h2>Add an Entry</h2></div>
        <div style="text-align: center;">
            <form id="target" method="post">
                <label for="session"><p align="left">Session:</label>
                <input type="text" name="session" id="session" autocomplete="off">
                <p>

                    <label for="studentNumber">
                <p align="left">Student Number*:</label>
                    <input type="text" name="studentNumber" id="studentNumber" required="required" autocomplete="off">
                </p>


                <label for="awardTitle"><p align="left">Award Title:</label>
                <input type="text" name="awardTitle" id="awardTitle" autocomplete="off"></p>


                <label for="awardNumber"><p align="left">Award Number:</label>
                <input type="text" name="awardNumber" id="awardNumber" autocomplete="off"></p>


                <label for="awardAmount"><p align="left">Award Amount:</label>
                <input type="text" name="awardAmount" id="awardAmount" autocomplete="off"></p>

                <label for="awardType"><p align="left">Award Type:</label>
                <input type="text" name="awardType" id="awardType" autocomplete="off"></p>


                <label for="status"><p align="left">Status:</label>
                <input type="text" name="status" id="status" autocomplete="off"></p>
                <br>
                <input type="submit" name="submit" value="Submit" id="submit">
            </form>
        </div>
        <br>
        <?php if (isset($_POST['submit'])) { ?>
            <script> alert("Entry has been succesfully added!"); </script> <?php } ?>

    </div>
</div>
</body>

</html>