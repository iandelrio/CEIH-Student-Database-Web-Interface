<?php
if (isset($_POST['submit'])) {

    $connection = mysqli_connect("localhost", "root", "", "studentdb");
    $search = $connection->real_escape_string($_POST['search']);
    $column = $connection->real_escape_string($_POST['column']);
    $search2 = $connection->real_escape_string($_POST['search2']);
    $column2 = $connection->real_escape_string($_POST['column2']);

    if (empty($search2)) {
        // die(mysql_error());
        $result = mysqli_query($connection, "SELECT session, studentNumber, awardTitle, awardNumber, awardAmount, awardType, status FROM awards WHERE $column = '$search'");
    } else
        $result = mysqli_query($connection, "SELECT session, studentNumber, awardTitle, awardNumber, awardAmount, awardType, status FROM awards WHERE $column = '$search' AND $column2 = '$search2'");


    echo "<table border='1'>";
    echo "<tr><td>Session</td><td>Student Number</td><td>Award Title</td><td>Award Number</td><td>Award Amount</td><td>Award Type</td><td>Status</td></table>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<table border='1'>";

        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>
            <td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr></table>";
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
            width: 12%;
            text-align: left;
        }

        tr:hover {
            background-color: #dcdcdc;
        }
    </style>
</head>
<body>
</body>

</html>