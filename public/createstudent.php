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

        $new_student = array(

            "year" => $_POST['year'],
            "studentNumber" => $_POST['studentNumber'],
            "surname" => $_POST['surname'],
            "givenName" => $_POST['givenName'],
            "emailAddress" => $_POST['emailAddress'],
            "preferredName" => $_POST['preferredName'],
            "gender" => $_POST['gender'],
            "birthDate" => $_POST['birthDate'],
            "selfID" => $_POST['selfID'],
            "city" => $_POST['city'],
            "province" => $_POST['province'],
            "country" => $_POST['country'],
            "financialHold" => $_POST['financialHold'],
            "sponsorship" => $_POST['sponsorship'],
            "sponsor" => $_POST['sponsor'],
            "firstSessionApplied" => $_POST['firstSessionApplied'],
            "firstSessionAdmitted" => $_POST['firstSessionAdmitted'],
            "firstSessionRegistered" => $_POST['firstSessionRegistered']

        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "student",
            implode(", ", array_keys($new_student)),
            ":" . implode(", :", array_keys($new_student))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_student);
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
                <label for="year"><p align="left">Year:</label>
                <input type="text" name="year" id="year" autocomplete="off"></p>

                <label for="studentNumber"><p align="left">Student Number*:</label>
                <input type="text" name="studentNumber" id="studentNumber" required="required" autocomplete="off"></p>

                <label for="surname"><p align="left">Surname:</label>
                <input type="text" name="surname" id="surname" autocomplete="off"></p>

                <label for="givenName"><p align="left">Given Name:</label>
                <input type="text" name="givenName" id="givenName" autocomplete="off"></p>

                <label for="emailAddress"><p align="left">Email Address:</label>
                <input type="text" name="emailAddress" id="emailAddress" autocomplete="off"></p>

                <label for="preferredName"><p align="left">Preferred Name:</label>
                <input type="text" name="preferredName" id="preferredName" autocomplete="off"></p>

                <label for="gender"><p align="left">Gender:</label>
                <input type="text" name="gender" id="gender" autocomplete="off"></p>

                <label for="birthDate"><p align="left">Birth Date:</label>
                <input type="text" name="birthDate" id="birthDate" autocomplete="off"></p>

                <label for="selfID"><p align="left">Self ID:</label>
                <input type="text" name="selfID" id="selfID" autocomplete="off"></p>

                <label for="city"><p align="left">City:</label>
                <input type="text" name="city" id="city" autocomplete="off"></p>

                <label for="province"><p align="left">Province:</label>
                <input type="text" name="province" id="province" autocomplete="off"></p>

                <label for="country"><p align="left">Country:</label>
                <input type="text" name="country" id="country" autocomplete="off"></p>

                <label for="financialHold"><p align="left">Financial Hold:</label>
                <input type="text" name="financialHold" id="financialHold" autocomplete="off"></p>

                <label for="sponsorship"><p align="left">Sponsorship:</label>
                <input type="text" name="sponsorship" id="sponsorship" autocomplete="off"></p>

                <label for="sponsor"><p align="left">Sponsor:</label>
                <input type="text" name="sponsor" id="sponsor" autocomplete="off"></p>

                <label for="firstSessionApplied"><p align="left">First Session Applied:</label>
                <input type="text" name="firstSessionApplied" id="firstSessionApplied" autocomplete="off"></p>

                <label for="firstSessionAdmitted"><p align="left">First Session Admitted:</label>
                <input type="text" name="firstSessionAdmitted" id="firstSessionAdmitted" autocomplete="off"></p>

                <label for="firstSessionRegistered"><p align="left">First Session Registered:</label>
                <input type="text" name="firstSessionRegistered" id="firstSessionRegistered" autocomplete="off"></p>
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