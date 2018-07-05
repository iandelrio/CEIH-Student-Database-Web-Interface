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

        $new_application = array(

            "studentNumber" => $_POST['studentNumber'],
            "session" => $_POST['session'],
            "program" => $_POST['program'],
            "primarySubject" => $_POST['primarySubject'],
            "yearLevel" => $_POST['yearLevel'],
            "readmission" => $_POST['readmission'],
            "status" => $_POST['status'],
            "reason" => $_POST['reason'],
            "applicantDecision" => $_POST['applicantDecision'],
            "actionCode" => $_POST['actionCode'],
            "multipleAction" => $_POST['multipleAction']
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "applications",
            implode(", ", array_keys($new_application)),
            ":" . implode(", :", array_keys($new_application))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_application);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

}
?>


<div class="bg">
    <div class="container">
        <br><br><br>
        <center><h2>Add an Entry</h2></center>
        <center>
            <form id="target" method="post">
                <label for="studentNumber"><p align="left">Student Number*:</label>
                <input type="text" name="studentNumber" id="studentNumber" required="required" autocomplete="off"></p>


                <label for="surname"><p align="left">Session:</label>
                <input type="text" name="session" id="session" autocomplete="off"></p>


                <label for="program"><p align="left">Program:</label>
                <input type="text" name="program" id="program" autocomplete="off"></p>


                <label for="primarySubject"><p align="left">Primary Subject:</label>
                <input type="text" name="primarySubject" id="primarySubject" autocomplete="off"></p>


                <label for="yearLevel"><p align="left">Year Level:</label>
                <input type="text" name="yearLevel" id="yearLevel" autocomplete="off"></p>


                <label for="readmission"><p align="left">Readmission:</label>
                <input type="text" name="readmission" id="readmission" autocomplete="off"></p>


                <label for="status"><p align="left">Status:</label>
                <input type="text" name="status" id="status" autocomplete="off"></p>


                <label for="reason"><p align="left">Reason:</label>
                <input type="text" name="reason" id="reason" autocomplete="off"></p>


                <label for="applicantDecision"><p align="left">Applicant Decision:</label>
                <input type="text" name="applicantDecision" id="applicantDecision" autocomplete="off"></p>


                <label for="actionCode"><p align="left">Action Code:</label>
                <input type="text" name="actionCode" id="actionCode" autocomplete="off"></p>


                <label for="multipleAction"><p align="left">Multiple Action:</label>
                <input type="text" name="multipleAction" id="multipleAction" autocomplete="off"></p>
                <br>


                <input type="submit" name="submit" value="Submit" id="submit">
            </form>
        </center>
        <br>
        <?php if (isset($_POST['submit'])) { ?>
            <script> alert("Entry has been succesfully added!"); </script> <?php } ?>

    </div>
</div>
</body>

</html>

    
