<html>
<title> Add an Entry </title>
<head>


    <style>

    </style>
</head>
<body>

<?php

if (isset($_POST['submit'])) {

    require "../config.php";
    require "../common.php";

    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_student = array(
            // add year
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
            "users",
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
        <br><br>
        <form id="target" method="post">
            <label for="studentNumber">Student Number*:</label>
            <input type="text" name="studentNumber" id="studentNumber" required="required" placeholder="Student Number"
                   autocomplete="off">
            <br>

            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" placeholder="Surname" autocomplete="off">
            <br>

            <label for="givenName">Given Name:</label>
            <input type="text" name="givenName" id="givenName" placeholder="Given Name" autocomplete="off">
            <br>

            <label for="emailAddress">Email Address:</label>
            <input type="text" name="emailAddress" id="emailAddress" placeholder="Email Address" autocomplete="off">
            <br>

            <label for="preferredName">Preferred Name*:</label>
            <input type="text" name="preferredName" id="preferredName" required="required" placeholder="Preferred Name"
                   autocomplete="off">
            <br>

            <label for="gender">Gender:</label>
            <input type="text" name="gender" id="gender" placeholder="Gender" autocomplete="off">
            <br>

            <label for="birthdate">Birth Date:</label>
            <input type="text" name="birthDate" id="birthDate" placeholder="Birth Date" autocomplete="off">
            <br>

            <label for="selfID">Self ID:</label>
            <input type="text" name="selfID" id="selfID" placeholder="Self ID" autocomplete="off">
            <br>

            <label for="city">City:</label>
            <input type="text" name="city" id="city" placeholder="City" autocomplete="off">
            <br>

            <label for="province">Province:</label>
            <input type="text" name="province" id="province" placeholder="Province" autocomplete="off">
            <br>

            <label for="country">Country:</label>
            <input type="text" name="country" id="country" placeholder="Country" autocomplete="off">
            <br>

            <label for="financialHold">Financial Hold:</label>
            <input type="text" name="financialHold" id="financialHold" placeholder="Financial Hold" autocomplete="off">
            <br>

            <label for="sponsorship">Sponsorship:</label>
            <input type="text" name="sponsorship" id="sponsorship" placeholder="Sponsorship" autocomplete="off">
            <br>

            <label for="sponsor">Sponsor:</label>
            <input type="text" name="sponsor" id="sponsor" placeholder="Sponsor" autocomplete="off">
            <br>

            <label for="firstSessionApplied">First Session Applied:</label>
            <input type="text" name="firstSessionApplied" id="firstSessionApplied" placeholder="First Session Applied"
                   autocomplete="off">
            <br>

            <label for="firstSessionAdmitted">First Session Admitted:</label>
            <input type="text" name="firstSessionAdmitted" id="firstSessionAdmitted"
                   placeholder="First Session Admitted" autocomplete="off">
            <br>

            <label for="firstSessionRegistered">First Session Registered:</label>
            <input type="text" name="firstSessionRegistered" id="firstSessionRegistered"
                   placeholder="First Session Registered" autocomplete="off">
            <br>


            <input type="submit" name="submit" value="Submit" id="submit">
        </form>
        <br>
        <?php if (isset($_POST['submit'])) { ?>
            <script> alert("Entry has been succesfully added!"); </script> <?php } ?>

    </div>
</div>
</body>

</html>

    



