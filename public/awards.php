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
            <h1>Award Entries</h1>
            <a class="button" href="data/full_awards.csv">Download all Awards Data 2012-2017 (csv)</a>
            <a class="button" href="data/awards_2017.csv">Download current Awards Data 2017 (csv)</a>
        </div>

        <br><br>
        <form target="_blank" action="awardsview.php" method="post" id="form1">

            <select name="column">
                <option value="">Select Filter</option>
                <option value="session">Session</option>
                <option value="studentNumber">Student Number</option>
                <option value="awardTitle">Award Title</option>
                <option value="awardNumber">Award Number</option>
                <option value="awardAmount">Award Amount</option>
                <option value="awardType">Award Type</option>
                <option value="status">Status</option>


            </select>
            <br>
            <br>
            <input type="text" name="search" id="search" placeholder="Search Query" required="required"
                   autocomplete="off">
            <p>
            <div style="text-align: center;"><strong>AND</strong></div>

            <select name="column2">
                <option value="">Select Filter</option>
                <option value="session">Session</option>
                <option value="studentNumber">Student Number</option>
                <option value="awardTitle">Award Title</option>
                <option value="awardNumber">Award Number</option>
                <option value="awardAmount">Award Amount</option>
                <option value="awardType">Award Type</option>
                <option value="status">Status</option>
            </select>
            <br>
            <br>
            <input type="text" name="search2" id="search2" placeholder="Search Query" autocomplete="off">

            <input type="submit" name="submit" id="submit" value="View Results">
        </form>


        <form target="_blank" id="form2">
            <h6>Legend</h6>
            <p><strong>Session:</strong> From 1998-2017 inclusive. W for winter sessions, and S for summer sessions
                (i.e. 2012S)
            <p><strong>Student Number:</strong>
            <p><strong>Award Title:</strong>
            <p><strong>Award Number:</strong>
            <p><strong>Award Amount:</strong>
            <p><strong>Award Type:</strong> AWRD = award; FELL = fellowship; SCHL = scholarship; PRIZ = prize
            <p><strong>Status:</strong> ACCE = accepted

        </form>

    </div>
</div>

</body>
</html>
