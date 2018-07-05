<?php require "templates/header.php"; ?>

<html>

<meta charset="utf-8"
">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<head>
    <title> Find Entries </title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<div class="bg"></div>
<div class="content">
    <div class="container">

        <div style="text-align: center;">
            <h1>Student Entries</h1>
            <a class="button" href="data/student_csv.csv">Download all Student Data 2012-2017 (csv)</a>
            <a class="button" href="data/student2017_csv.csv">Download current Student Data 2017 (csv)</a>
        </div>

        <br><br>
        <form target="_blank" action="studentview.php" method="post" id="form1">

            <select name="column">
                <option value="">Select Filter</option>
                <option value="year">Year</option>
                <option value="studentNumber">Student Number</option>
                <option value="surname">Surname</option>
                <option value="givenName">Given Name</option>
                <option value="emailAddress">Email Address</option>
                <option value="preferredName">Preferred Name</option>
                <option value="gender">Gender</option>
                <option value="birthDate">Birthdate</option>
                <option value="selfID">Self ID</option>
                <option value="city">City</option>
                <option value="province">Province</option>
                <option value="country">Country</option>
                <option value="financialHold">Financial Hold</option>
                <option value="sponsorship">Sponsorship</option>
                <option value="sponsor">Sponsor</option>
                <option value="firstSessionApplied">First Session Applied</option>
                <option value="firstSessionAdmitted">First Session Admitted</option>
                <option value="firstSessionRegistered">First Session Registered</option>
                <br>
            </select>
            <br>
            <br>
            <input type="text" name="search" id="search" placeholder="Search Query" required="required"
                   autocomplete="off">
            <div style="text-align: center;"><strong>AND</strong></div>

            <select name="column2">
                <option value="">Select Filter</option>
                <option value="year">Year</option>
                <option value="studentNumber">Student Number</option>
                <option value="surname">Surname</option>
                <option value="givenName">Given Name</option>
                <option value="emailAddress">Email Address</option>
                <option value="preferredName">Preferred Name</option>
                <option value="gender">Gender</option>
                <option value="birthDate">Birthdate</option>
                <option value="selfID">Self ID</option>
                <option value="city">City</option>
                <option value="province">Province</option>
                <option value="country">Country</option>
                <option value="financialHold">Financial Hold</option>
                <option value="sponsorship">Sponsorship</option>
                <option value="sponsor">Sponsor</option>
                <option value="firstSessionApplied">First Session Applied</option>
                <option value="firstSessionAdmitted">First Session Admitted</option>
                <option value="firstSessionRegistered">First Session Registered</option>
            </select>
            <br>
            <br>
            <input type="text" name="search2" id="search2" placeholder="Search Query" autocomplete="off">


            <input type="submit" name="submit" id="submit" value="View Results">
        </form>


        <form id="form2">
            <h6>Legend</h6>
            <p><strong>Year:</strong> Between 2012-2017 inclusive
            <p><strong>Gender:</strong> M/F
            <p><strong>Birthdate:</strong> MM/DD/YYYY
            <p><strong>Financial Hold: </strong> Yes/No
            <p><strong>Sponsorship:</strong> Yes/No
            <p><strong>First Session Applied, First Session Admitted, First Session Registered:</strong> Year+Session
                (ie 2013W)

        </form>

    </div>
</div>

</body>
</html>
