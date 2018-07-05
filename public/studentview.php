<?php
if (isset($_POST['submit'])) {

    $connection = mysqli_connect("localhost", "root", "", "studentdb");
    $search = $connection->real_escape_string($_POST['search']);
    $column = $connection->real_escape_string($_POST['column']);
    $search2 = $connection->real_escape_string($_POST['search2']);
    $column2 = $connection->real_escape_string($_POST['column2']);


    if (empty($search2)) {
        // die(mysql_error());
        $result = mysqli_query($connection, "SELECT year, studentNumber, surname, givenName, emailAddress, preferredName, gender, birthDate, selfID, city, province, country, financialHold, sponsorship, sponsor, firstSessionApplied, firstSessionAdmitted, firstSessionRegistered FROM student WHERE $column = '$search'");
    } else
        $result = mysqli_query($connection, "SELECT year, studentNumber, surname, givenName, emailAddress, preferredName, gender, birthDate, selfID, city, province, country, financialHold, sponsorship, sponsor, firstSessionApplied, firstSessionAdmitted, firstSessionRegistered FROM student WHERE $column = '$search' AND $column2 = '$search2'");


    echo "<table border='1'>";
    echo "<tr><td>Year</td><td>Student Number</td><td>Surname</td><td>Given Name</td><td>Email Address</td><td>Preferred Name</td><td>Gender</td><td>Birthdate</td><td>Self ID</td><td>City</td><td>Province</td><td>Country</td><td>Financial Hold</td><td>Sponsorship</td><td>Sponsor</td><td>First Session Applied</td><td>First Session Admitted</td><td>First Session Registered</td></table>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<table border='1'>";

        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>
                <td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>
                <td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td><td>$row[10]</td><td>$row[11]</td><td>$row[12]</td>
                <td>$row[13]</td><td>$row[14]</td><td>$row[15]</td><td>$row[16]</td><td>$row[17]</td></tr></table>";


    }
    // else
    //echo "No results found";
}


?>

<html>
<head>
    <style>
        table {
            width: 95%;
            border-collapse: collapse;
        }

        th, tr, td {
            height: 35px;
            width: 5%;
            text-align: left;
        }

        tr:hover {
            background-color: #dcdcdc;
        }
    </style>
</head>
<body>
</body>

</htmL>