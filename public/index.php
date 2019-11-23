<?php

include_once 'header.php';
?>

<body>
<style>
    body, html {
        height: 100%;
        font-family: "Inconsolata", sans-serif;
    }
    .bgimg {
        background-position: center;
        background-size: cover;
        background-image: url("../assets/img/SUShop.jpg");
        min-height: 35%;
    }
</style>

<header class="bgimg" id="home">
</header>
<div class="container-fluid mt-5 px-5">
    <div class="row">
        <div class="col-sm-12">
            <h1>Welcome</h1>
            <p>This application is provided for you to alert the lecturer that you need help during the
                practical session.  You need to enter your name but this will only be shown to the lecturer.
                The view will show the module code, date, time, row number and seat number only.  No other
                details will be displayed to students</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1"><a href="RaiseRequest.php" class="btn btn-info">Request</a></div>
        <div class="col-sm-1"><a href="viewRequest.php" class="btn btn-warning">View</a></div>
        <div class="col-sm-10"></div>
    </div>
</div>

<?php
include_once 'footer.php';
?>
