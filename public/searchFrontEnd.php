<!DOCTYPE html>
<html lang="en">

<!-- HTML for the search front end page. -->

<?php require "templates/header.php"; ?>

<head>
    <title> Search | Update | Remove Records </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/shared.css">
    <link rel="stylesheet" href="css/searchFrontEnd.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="bg"></div>
<div class="content">
    <div class="container">
        <h2>
            Search | Update | Remove <br> Records
        </h2>
        <form id="search" method="post" action="searchBackEnd.php" enctype="multipart/form-data" target="_blank">
            <div class="tab">
                <p>
                    Select tables to search over (select at least one table).
                </p>
                <div class="checkbox-group required">
                    <label><input type="checkbox" name="table" value="applications"> Applications</label> <br>
                    <label> <input type="checkbox" name="table" value="awards"> Awards</label> <br>
                    <label> <input type="checkbox" name="table" value="enrollment"> Enrollment</label> <br>
                    <label> <input type="checkbox" name="table" value="graduation"> Graduation</label> <br>
                    <label> <input type="checkbox" name="table" value="student"> Students</label>
                </div>
            </div>

            <div class="tab">
                <p>
                    Select filter(s) (optional).
                </p>

                <div id="filterlist">
                    <select name="filters1" id="filters1" title="Filters">
                        <option value="" hidden>Select Filter...</option>
                        <option value="studentNumber" class="applications awards enrollment graduation student"> Student
                            Number
                        </option>
                        <option value="session" class="applications awards enrollment"> Session</option>
                        <option value="program" class="applications enrollment graduation"> Program</option>
                        <option value="primarySubject" class="applications"> Primary Subject</option>
                        <option value="yearLevel" class="applications enrollment"> Year Level</option>
                        <option value="readmission" class="applications"> Readmission</option>
                        <option value="status" class="applications awards"> Status</option>
                        <option value="reason" class="applications"> Reason</option>
                        <option value="applicantDecision" class="applications"> Applicant Decision</option>
                        <option value="actionCode" class="applications"> Action Code</option>
                        <option value="multipleAction" class="applications"> Multiple Action</option>

                        <option value="awardTitle" class="awards"> Award Title</option>
                        <option value="awardNumber" class="awards"> Award Number</option>
                        <option value="awardAmount" class="awards"> Award Amount</option>
                        <option value="awardType" class="awards"> Award Type</option>

                        <option value="regiStatus" class="enrollment"> Registration Status</option>
                        <option value="sessionalAverage" class="enrollment"> Sessional Average</option>
                        <option value="sessionalStanding" class="enrollment"> Sessional Standing</option>
                        <option value="programEntryYear" class="enrollment"> Program Entry Year</option>
                        <option value="code1" class="enrollment graduation"> Code 1</option>
                        <option value="code2" class="enrollment graduation"> Code 2</option>

                        <option value="gradApplicationStatus" class="graduation"> Grad Application Status</option>
                        <option value="statusReason" class="graduation"> Status Reason</option>
                        <option value="dualDegree" class="graduation"> Dual Degree</option>
                        <option value="ceremonyDate" class="graduation"> Ceremony Date</option>
                        <option value="conferralPeriod" class="graduation"> Conferral Period</option>

                        <option value="year" class="student"> Year</option>
                        <option value="surname" class="student"> Surname</option>
                        <option value="givenName" class="student"> Given Name</option>
                        <option value="emailAddress" class="student"> Email Address</option>
                        <option value="preferredName" class="student"> Preferred Name</option>
                        <option value="gender" class="student"> Gender</option>
                        <option value="birthDate" class="student"> Birth Date</option>
                        <option value="selfID" class="student"> Self ID</option>
                        <option value="city" class="student"> City</option>
                        <option value="province" class="student"> Province</option>
                        <option value="country" class="student"> Country</option>
                        <option value="financialHold" class="student"> Financial Hold</option>
                        <option value="sponsorship" class="student"> Sponsorship</option>
                        <option value="sponsor" class="student"> Sponsor</option>
                        <option value="firstSessionApplied" class="student"> First Session Applied</option>
                        <option value="firstSessionAdmitted" class="student"> First Session Admitted</option>
                        <option value="firstSessionRegistered" class="student"> First Session Registered</option>
                        <!-- TODO: Make depend on selected table(s). -->
                    </select>

                    <select name="comparisonOp" id="comparisonOp" title="Comparison Operator">
                        <option value="="> =</option>
                        <option value=">"> ></option>
                        <option value=">="> ≥</option>
                        <option value=">"> <</option>
                        <option value="<="> ≤</option>
                        <!-- TODO: Make depend on data type of selected filter. -->
                    </select>

                    <input type="text" id="filterinput" placeholder="eg. Session = 2016W1"
                           autocomplete="off">
                    <!-- TODO: Type checking based on selected attribute -->

                    <br>
                </div>
                <input id="addfltrbutton" type="button" value="Add filter" onclick="addFilter()">
            </div>

            <div class="tab">
                <p>
                    Select columns to display.
                </p>
                <label><input type="radio" name="column_display" value="*" checked> All</label> <br>
                <label><input type="radio" name="column_display" value="TODO"> Select columns (hold down CTRL or CMD key
                    to select multiple columns)</label>

                <br>

                <select name="columnsToShow" id="columnsToShow" title="Columns To Show" multiple>
                    <option value="" hidden>Select Filter...</option>
                    <option value="studentNumber" class="applications awards enrollment graduation student"> Student
                        Number
                    </option>
                    <option value="session" class="applications awards enrollment"> Session</option>
                    <option value="program" class="applications enrollment graduation"> Program</option>
                    <option value="primarySubject" class="applications"> Primary Subject</option>
                    <option value="yearLevel" class="applications enrollment"> Year Level</option>
                    <option value="readmission" class="applications"> Readmission</option>
                    <option value="status" class="applications awards"> Status</option>
                    <option value="reason" class="applications"> Reason</option>
                    <option value="applicantDecision" class="applications"> Applicant Decision</option>
                    <option value="actionCode" class="applications"> Action Code</option>
                    <option value="multipleAction" class="applications"> Multiple Action</option>

                    <option value="awardTitle" class="awards"> Award Title</option>
                    <option value="awardNumber" class="awards"> Award Number</option>
                    <option value="awardAmount" class="awards"> Award Amount</option>
                    <option value="awardType" class="awards"> Award Type</option>

                    <option value="regiStatus" class="enrollment"> Registration Status</option>
                    <option value="sessionalAverage" class="enrollment"> Sessional Average</option>
                    <option value="sessionalStanding" class="enrollment"> Sessional Standing</option>
                    <option value="programEntryYear" class="enrollment"> Program Entry Year</option>
                    <option value="code1" class="enrollment graduation"> Code 1</option>
                    <option value="code2" class="enrollment graduation"> Code 2</option>

                    <option value="gradApplicationStatus" class="graduation"> Grad Application Status</option>
                    <option value="statusReason" class="graduation"> Status Reason</option>
                    <option value="dualDegree" class="graduation"> Dual Degree</option>
                    <option value="ceremonyDate" class="graduation"> Ceremony Date</option>
                    <option value="conferralPeriod" class="graduation"> Conferral Period</option>

                    <option value="year" class="student"> Year</option>
                    <option value="surname" class="student"> Surname</option>
                    <option value="givenName" class="student"> Given Name</option>
                    <option value="emailAddress" class="student"> Email Address</option>
                    <option value="preferredName" class="student"> Preferred Name</option>
                    <option value="gender" class="student"> Gender</option>
                    <option value="birthDate" class="student"> Birth Date</option>
                    <option value="selfID" class="student"> Self ID</option>
                    <option value="city" class="student"> City</option>
                    <option value="province" class="student"> Province</option>
                    <option value="country" class="student"> Country</option>
                    <option value="financialHold" class="student"> Financial Hold</option>
                    <option value="sponsorship" class="student"> Sponsorship</option>
                    <option value="sponsor" class="student"> Sponsor</option>
                    <option value="firstSessionApplied" class="student"> First Session Applied</option>
                    <option value="firstSessionAdmitted" class="student"> First Session Admitted</option>
                    <option value="firstSessionRegistered" class="student"> First Session Registered</option>
                </select>
                <!-- TODO: Make depend on selected table(s) and filter(s). -->
            </div>

            <div style="overflow:auto;">
                <div style="float:right; padding: 0 0 0 20px;">
                    <button type="button" id="nextBtn" style="display: none" onclick="nextPrev(1)">Next</button>
                </div>
                <div style="float:right;">
                    <button type="button" id="prevBtn" style="display: none" onclick="nextPrev(-1)">Previous</button>
                </div>
            </div>

            <!-- Circles which indicate the steps of the form: -->
            <div id="steps" style="text-align:center; margin-top:40px; display: none">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>

        </form>
    </div>
</div>

<script src="js/searchFrontEnd.js"></script>

</body>
</html>
