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

        $new_graduation = array(

            "studentNumber" => $_POST['studentNumber'],
            "gradApplicationStatus" => $_POST['gradApplicationStatus'],
            "statusReason" => $_POST['statusReason'],
            "program" => $_POST['program'],
            "dualDegree" => $_POST['dualDegree'],
            "code1" => $_POST['code1'],
            "code2" => $_POST['code2'],
            "ceremonyDate" => $_POST['ceremonyDate'],
            "conferralPeriod" => $_POST['conferralPeriod']
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "graduation",
            implode(", ", array_keys($new_graduation)),
            ":" . implode(", :", array_keys($new_graduation))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_graduation);
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

                <label for="gradApplicationStatus"><p align="left">Grad Application Status:</label>
                <input type="text" name="gradApplicationStatus" id="gradApplicationStatus" autocomplete="off"></p>

                <label for="statusReason"><p align="left">Status Reason:</label>
                <input type="text" name="statusReason" id="statusReason" autocomplete="off"></p>

                <label for="program"><p align="left">Program:</label>
                <input type="text" name="program" id="program" autocomplete="off"></p>

                <label for="dualDegree"><p align="left">Dual Degree:</label>
                <input type="text" name="dualDegree" id="dualDegree" autocomplete="off"></p>

                <label for="code1"><p align="left">Code 1:</label>
                <input type="text" name="code1" id="code1" autocomplete="off"></p>

                <label for="code2"><p align="left">Code 2:</label>
                <input type="text" name="code2" id="code2" autocomplete="off"></p>

                <label for="ceremonyDate"><p align="left">Ceremony Date:</label>
                <input type="text" name="ceremonyDate" id="ceremonyDate" autocomplete="off"></p>

                <label for="conferralPeriod"><p align="left">Conferral Period:</label>
                <input type="text" name="conferralPeriod" id="conferralPeriod" autocomplete="off"></p>

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

    