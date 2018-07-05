<?php require "templates/header.php"; ?>

<html>

<meta charset="utf-8">
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
            <h1>Applications</h1>
            <a class="button" href="data/full_applications.csv">Download all Applications Data 2012-2017 (csv)</a>
            <a class="button" href="data/2017_applications.csv">Download current Applications Data 2017 (csv)</a>
        </div>

        <br><br>
        <form target="_blank" action="applicationsview.php" method="post" id="form1">
            <select name="column">
                <option value="">Select Filter</option>
                <option value="studentNumber">Student Number</option>
                <option value="session">Session</option>
                <option value="program">Program</option>
                <option value="primarySubject">Primary Subject</option>
                <option value="yearLevel">Year Level</option>
                <option value="readmission">Readmission</option>
                <option value="status">Status</option>
                <option value="reason">Reason</option>
                <option value="applicantDecision">Applicant Decision</option>
                <option value="actionCode">Action Code</option>
                <option value="multipleAction">Multiple Action</option>
            </select>
            <br>
            <br>
            <input type="text" name="search" id="search" placeholder="Search Query" required="required"
                   autocomplete="off">
            <div style="text-align: center;"><strong>AND</strong></div>


            <select name="column2">
                <option value="">Select Filter</option>
                <option value="studentNumber">Student Number</option>
                <option value="session">Session</option>
                <option value="program">Program</option>
                <option value="primarySubject">Primary Subject</option>
                <option value="yearLevel">Year Level</option>
                <option value="readmission">Readmission</option>
                <option value="status">Status</option>
                <option value="reason">Reason</option>
                <option value="applicantDecision">Applicant Decision</option>
                <option value="actionCode">Action Code</option>
                <option value="multipleAction">Multiple Action</option>
            </select>
            <br>
            <br>
            <input type="text" name="search2" id="search2" placeholder="Search Query" autocomplete="off">


            <input type="submit" name="submit" id="submit" value="View Results">
        </form>


        <form target="_blank" id="form2">
            <h6>Legend</h6>
            <p><strong>Re-admission:</strong> REND= ; TROV= ; TRNP= ; RESP= ; TRVO= ;
            <p><strong>Status:</strong> ADMT= Admitted; DECD= Deceased; NELG= Not Eligible; NODE= No Decision; REFU=
                Refused admission
            <p><strong>Reason:</strong> Refer to<a href="data/reasoncodes.csv"> this</a>
            <p><strong>Applicant Decision:</strong> DECL= ; ACPT= ; NRSP= ; PEND= ;

        </form>

    </div>
</div>
</body>
</html>
