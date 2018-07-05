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

        $new_enrollment = array(

            "studentNumber" => $_POST['studentNumber'],
            "session" => $_POST['session'],
            "program" => $_POST['program'],
            "yearLevel" => $_POST['yearLevel'],
            "regiStatus" => $_POST['regiStatus'],
            "sessionalAverage" => $_POST['sessionalAverage'],
            "sessionalStanding" => $_POST['sessionalStanding'],
            "programEntryYear" => $_POST['programEntryYear'],
            "code1" => $_POST['code1'],
            "code2" => $_POST['code2']
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "enrollment",
            implode(", ", array_keys($new_enrollment)),
            ":" . implode(", :", array_keys($new_enrollment))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_enrollment);
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
                <label for="studentNumber"><p align="left">Student Number*:</label>
                <input type="text" name="studentNumber" id="studentNumber" required="required" autocomplete="off"></p>

                <label for="surname"><p align="left">Session:</label>
                <input type="text" name="session" id="session" autocomplete="off"></p>

                <label for="program"><p align="left">Program:</label>
                <input type="text" name="program" id="program" autocomplete="off"></p>

                <label for="yearLevel"><p align="left">Year Level:</label>
                <input type="text" name="yearLevel" id="yearLevel" autocomplete="off"></p>

                <label for="regiStatus"><p align="left">Registration Status:</label>
                <input type="text" name="regiStatus" id="regiStatus" autocomplete="off"></p>

                <label for="sessionalAverage"><p align="left">Sessional Average:</label>
                <input type="text" name="sessionalAverage" id="sessionalAverage" autocomplete="off"></p>

                <label for="sessionalStanding"><p align="left">Sessional Standing:</label>
                <input type="text" name="sessionalStanding" id="sessionalStanding" autocomplete="off"></p>

                <label for="programEntryYear"><p align="left">Program Entry Year:</label>
                <input type="text" name="programEntryYear" id="programEntryYear" autocomplete="off"></p>

                <label for="code1"><p align="left">Code 1:</label>
                <input type="text" name="code1" id="code1" autocomplete="off"></p>

                <label for="code2"><p align="left">Code 2:</label>
                <input type="text" name="code2" id="code2" autocomplete="off"></p>
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