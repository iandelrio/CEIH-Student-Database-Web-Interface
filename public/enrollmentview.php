<?php
if (isset($_POST['submit'])) {

    $connection = mysqli_connect("localhost", "root", "", "studentdb");
    $search = $connection->real_escape_string($_POST['search']);
    $column = $connection->real_escape_string($_POST['column']);
    $search2 = $connection->real_escape_string($_POST['search2']);
    $column2 = $connection->real_escape_string($_POST['column2']);


    if (empty($search2)) {
        // die(mysql_error());
        $result = mysqli_query($connection, "SELECT studentNumber, session, program, yearLevel, regiStatus, sessionalAverage, sessionalStanding, programEntryYear, code1, code2 FROM enrollment WHERE $column = '$search'");
    } else
        $result = mysqli_query($connection, "SELECT studentNumber, session, program, yearLevel, regiStatus, sessionalAverage, sessionalStanding, programEntryYear, code1, code2 FROM enrollment WHERE $column = '$search' AND $column2 = '$search2'");


    echo "<table border='1'>";
    echo "<tr><td>Student Number</td><td>Session</td><td>Program</td><td>Year Level</td><td>Readmission</td><td>Status</td><td>Reason</td><td>Applicant Decision</td><td>Action Code</td><td>Multiple Action</td></table>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<table border='1'>";

        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>
            <td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>
            <td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td></tr></table>";
    }
    // else
    //echo "No results found";
}


?>

<html>
<head>
    <style>
        table {
            width: 90%;
            border-collapse: collapse;
        }

        th, tr, td {
            height: 35px;
            width: 9%;
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