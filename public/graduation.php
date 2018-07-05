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
            <h1>Graduation Entries</h1>
            <a class="button" href="#">Download all Graduation Data 2012-2017 (csv)</a>
            <a class="button" href="data/full_graduations.csv">Download current Graduation Data 2017 (csv)</a>
        </div>

        <br><br>
        <form target="_blank" action="graduationview.php" method="post" id="form1">
            <select name="column">
                <option value="">Select Filter</option>
                <option value="studentNumber">Student Number</option>
                <option value="gradApplicationStatus">Grad Application Status</option>
                <option value="statusReason">Status Reason</option>
                <option value="program">Program</option>
                <option value="dualDegree">Dual Degree</option>
                <option value="code1">Code 1</option>
                <option value="code2">Code 2</option>
                <option value="ceremonyDate">Ceremony Date</option>
                <option value="conferralPeriod">Conferral Period</option>
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
                <option value="gradApplicationStatus">Grad Application Status</option>
                <option value="statusReason">Status Reason</option>
                <option value="program">Program</option>
                <option value="dualDegree">Dual Degree</option>
                <option value="code1">Code 1</option>
                <option value="code2">Code 2</option>
                <option value="ceremonyDate">Ceremony Date</option>
                <option value="conferralPeriod">Conferral Period</option>
            </select>
            <br>
            <br>
            <input type="text" name="search2" id="search2" placeholder="Search Query" autocomplete="off">

            <input type="submit" name="submit" id="submit" value="View Results">
        </form>


        <form target="_blank" id="form2">
            <h6>Legend</h6>
            <p><strong>Student Number:</strong> 8 digit UBC student number
            <p><strong>Grad Application Status:</strong> APPL= applied; APRV= approved; CONF= conferred; NAPR= not
                approved; NOGR= not ready for graduation;
                PDAP= pending approved; PEND= graduation pending; SPCL= special situation; WTHD= withdrawn
            <p><strong>Status Reason:</strong> PREQ=; FREQ=; TRCR=;
            <p><strong>Program:</strong> i.e. BA (or BA-O for Okanagan)
            <p><strong>Dual Degree:</strong> Y/N
            <p><strong>Code 1:</strong> Refer to<a href="data/codes.csv"> this</a>
            <p><strong>Code 2:</strong> Refer to<a href="data/codes.csv"> this</a>
            <p><strong>Ceremony Date:</strong> Use the format YYYY/MM
            <p><strong>Conferral Period:</strong> Use the format YYYY/MM
        </form>

    </div>
</div>

</body>
</html>
