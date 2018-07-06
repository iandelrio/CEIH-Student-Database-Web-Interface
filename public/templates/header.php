<!DOCTYPE html>
<html lang="en">

<!-- HTML and CSS for the header bar that navigates back to the home page. -->

<head>
    <title> Header </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<style>
    a:link, a:visited {
        font-family: Georgia, serif;
        color: lightgray;
        /*padding: 12px 28px;*/
        transition-duration: 0.2s;
        display: inline-block;
        text-decoration: none;
        /*margin: 8px 16px;*/
    }

    a:hover, a:active {
        color: white;
    }
</style>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" data-spy="affix">
    <div class="container-fluid">
        <div class="nav navbar-nav">
            <li>
                <a href="http://localhost/studentdb/public/index.php"> ← CEIH Student Database</a>
            </li>
            <!-- TODO remove lazy <li> -->
        </div>
    </div>
</nav>


