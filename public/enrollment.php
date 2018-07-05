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
            <h1>Enrollments</h1>
            <a class="button" href="data/full_enrollment.csv">Download all Enrollment Data 2012-2017 (csv)</a>
            <a class="button" href="data/enrollment_2017.csv">Download current Enrollment Data 2017 (csv)</a>
        </div>

        <br><br>
        <form target="_blank" action="enrollmentview.php" method="post" id="form1">
            <select name="column">
                <option value="">Select Filter</option>
                <option value="studentNumber">Student Number</option>
                <option value="session">Session</option>
                <option value="program">Program</option>
                <option value="yearLevel">Year Level</option>
                <option value="regiStatus">Registration Status</option>
                <option value="sessionalAverage">Sessional Average</option>
                <option value="sessionalStanding">Sessional Standing</option>
                <option value="programEntryYear">Program Entry Year</option>
                <option value="code1">Code 1</option>
                <option value="code2">Code 2</option>
            </select>
            <br>
            <br>
            <input type="text" name="search" id="search" placeholder="Search Query" required="required"
                   autocomplete="off">
            <p>
            <div style="text-align: center;"><strong>AND</strong></div>

            <select name="column2">
                <option value="">Select Filter</option>
                <option value="studentNumber">Student Number</option>
                <option value="session">Session</option>
                <option value="program">Program</option>
                <option value="yearLevel">Year Level</option>
                <option value="regiStatus">Registration Status</option>
                <option value="sessionalAverage">Sessional Average</option>
                <option value="sessionalStanding">Sessional Standing</option>
                <option value="programEntryYear">Program Entry Year</option>
                <option value="code1">Code 1</option>
                <option value="code2">Code 2</option>
            </select>
            <br>
            <br>
            <input type="text" name="search2" id="search2" placeholder="Search Query" autocomplete="off">

            <input type="submit" name="submit" id="submit" value="View Results">
        </form>


        <form target="_blank" id="form2">
            <h6>Legend</h6>
            <!--<p><strong>Student Number:</strong> 8 digit UBC student number-->
            <p><strong>Session:</strong> From 1998-2017 inclusive. W for winter sessions, and S for summer sessions
                (i.e. 2012S)
            <p><strong>Program:</strong> i.e. BA (or BA-O for Okanagan)
                <!--<p><strong>Year Level:</strong> Between 1-5 inclusive-->
            <p><strong>Registration Status:</strong> REGI= registered; CONT= ;
                <!--<p><strong>Sessional Average:</strong> Average between 0-11 inclusive.-->
            <p><strong>Sessional Standing:</strong> PASS= ; FAIL= fail; PSSW= ; PSEN= ; P100= ; DEAN= ; ACPR = academic
                probation;
                HONR= honor standing; DNLW= ; DLEN= ; DLIS= ; REVW= ; PEND= ; ACP7= ; WTHD= ;
                <!--<p><strong>Program Entry Year:</strong>-->
            <p><strong>Code 1:</strong> Refer to<a href="data/codes.csv"> this</a>
            <p><strong>Code 2:</strong> Refer to<a href="data/codes.csv"> this</a>
        </form>
    </div>
</div>
</body>
</html>
