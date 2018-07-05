<!DOCTYPE html>
<html lang="en">

<!-- HTML for the search front end page. -->

<?php require "templates/header.php"; ?>

<head>
    <title> Search | Update | Remove Records </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/shared.css">
    <link rel="stylesheet" href="css/search.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/searchFrontEnd.js"></script>
</head>

<body>
<div class="bg"></div>
<div class="content">
    <div class="container">
        <h2>
            Search | Update | Remove <br> Records
        </h2>
        <form method="post" action="searchBackEnd.php" enctype="multipart/form-data" target="_blank">
            <p>
                Select tables to search over (select at least one table)
            </p>
            <div class="checkbox-group required">
                <input type="checkbox" name="table" value="applications"> Applications <br>
                <input type="checkbox" name="table" value="awards"> Awards <br>
                <input type="checkbox" name="table" value="enrollment"> Enrollment <br>
                <input type="checkbox" name="table" value="graduation"> Graduation <br>
                <input type="checkbox" name="table" value="student"> Students
            </div>
            <br>

            <p>
                Select filters (optional)
            </p>

            <select name="filters1" id="filters1" title="Filters">
                <option value="" hidden>Select Filter...</option>
                <option value="studentNumber"> Student Number </option>
                <option value="session"> Session </option>
                <option value="program"> Program </option>
                <option value="primarySubject"> Primary Subject </option>
                <option value="yearLevel"> Year Level </option>
                <option value="readmission"> Readmission </option>
                <option value="status"> Status </option>
                <option value="reason"> Reason </option>
                <option value="applicantDecision"> Applicant Decision </option>
                <option value="actionCode"> Action Code </option>
                <option value="multipleAction"> Multiple Action </option>

                <option value="awardTitle"> Award Title </option>
                <option value="awardNumber"> Award Number </option>
                <option value="awardAmount"> Award Amount </option>
                <option value="awardType"> Award Type </option>

                <option value="regiStatus"> Registration Status </option>
                <option value="sessionalAverage"> Sessional Average </option>
                <option value="sessionalStanding"> Sessional Standing </option>
                <option value="programEntryYear"> Program Entry Year </option>
                <option value="code1"> Code 1 </option>
                <option value="code2"> Code 2 </option>

                <option value="gradApplicationStatus"> Grad Application Status </option>
                <option value="statusReason"> Status Reason </option>
                <option value="dualDegree"> Dual Degree </option>
                <option value="ceremonyDate"> Ceremony Date </option>
                <option value="conferralPeriod"> Conferral Period </option>

                <option value="year"> Year </option>
                <option value="surname"> Surname </option>
                <option value="givenName"> Given Name </option>
                <option value="emailAddress"> Email Address </option>
                <option value="preferredName"> Preferred Name </option>
                <option value="gender"> Gender </option>
                <option value="birthDate"> Birth Date </option>
                <option value="selfID"> Self ID </option>
                <option value="city"> City </option>
                <option value="province"> Province </option>
                <option value="country"> Country </option>
                <option value="financialHold"> Financial Hold </option>
                <option value="sponsorship"> Sponsorship </option>
                <option value="sponsor"> Sponsor </option>
                <option value="firstSessionApplied"> First Session Applied </option>
                <option value="firstSessionAdmitted"> First Session Admitted </option>
                <option value="firstSessionRegistered"> First Session Registered </option>
                <!-- TODO: Make depend on selected table(s). -->
            </select>

            <select name="comparisonOp" id="comparisonOp" title="Comparison Operator">
                <option value="="> = </option>
                <option value=">"> > </option>
                <option value=">="> ≥ </option>
                <option value=">"> < </option>
                <option value=">="> ≤ </option>
                <!-- TODO: Make depend on data type of selected filter. -->
            </select>

            <input type="text" name="filter1" id="filter1" placeholder="eg. Session = 2016W1"
                   autocomplete="off">

            <br>

            <input type="button" value="Add filter">

            <br> <br>
            <p>
                Select columns to display
            </p>
            <input type="radio" name="column_display" value="*" checked> All <br>
            <input type="radio" name="column_display" value="TODO"> Select columns: <br>

            <select name="columnsToShow" id="columnsToShow" title="Columns To Show" multiple>
                <option value="studentNumber"> Student Number </option>
                <option value="session"> Session </option>
                <option value="program"> Program </option>
                <option value="primarySubject"> Primary Subject </option>
                <option value="yearLevel"> Year Level </option>
                <option value="readmission"> Readmission </option>
                <option value="status"> Status </option>
                <option value="reason"> Reason </option>
                <option value="applicantDecision"> Applicant Decision </option>
                <option value="actionCode"> Action Code </option>
                <option value="multipleAction"> Multiple Action </option>

                <option value="awardTitle"> Award Title </option>
                <option value="awardNumber"> Award Number </option>
                <option value="awardAmount"> Award Amount </option>
                <option value="awardType"> Award Type </option>

                <option value="regiStatus"> Registration Status </option>
                <option value="sessionalAverage"> Sessional Average </option>
                <option value="sessionalStanding"> Sessional Standing </option>
                <option value="programEntryYear"> Program Entry Year </option>
                <option value="code1"> Code 1 </option>
                <option value="code2"> Code 2 </option>

                <option value="gradApplicationStatus"> Grad Application Status </option>
                <option value="statusReason"> Status Reason </option>
                <option value="dualDegree"> Dual Degree </option>
                <option value="ceremonyDate"> Ceremony Date </option>
                <option value="conferralPeriod"> Conferral Period </option>

                <option value="year"> Year </option>
                <option value="surname"> Surname </option>
                <option value="givenName"> Given Name </option>
                <option value="emailAddress"> Email Address </option>
                <option value="preferredName"> Preferred Name </option>
                <option value="gender"> Gender </option>
                <option value="birthDate"> Birth Date </option>
                <option value="selfID"> Self ID </option>
                <option value="city"> City </option>
                <option value="province"> Province </option>
                <option value="country"> Country </option>
                <option value="financialHold"> Financial Hold </option>
                <option value="sponsorship"> Sponsorship </option>
                <option value="sponsor"> Sponsor </option>
                <option value="firstSessionApplied"> First Session Applied </option>
                <option value="firstSessionAdmitted"> First Session Admitted </option>
                <option value="firstSessionRegistered"> First Session Registered </option>
            </select>
            <!-- TODO: Make depend on selected table(s) and filter(s). -->

            <button type="submit" name="submit">Search</button>
        </form>
    </div>
</div>
<script>
    //var oneSelected = $('div.checkbox-group.required :checkbox:checked').length > 0;

</script>
</body>
</html>
