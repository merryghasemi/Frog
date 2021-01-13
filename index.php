<?php

if (isset($_GET['submit'])) {

    $t_home = $_GET['t-home'];
    $t_jump = $_GET['t-jump'];
    $t_water = $_GET['t-water'];

    $location = 1;
    $jumptail = "";
    $rand = array();

    //make and resize an array to total tail
    $array_home = array();
    $array_home = array_pad($array_home, $t_home, 0);


    $a = range(2, $t_home);
    shuffle($a);
    $array = array_slice($a, 0, $t_water);

    foreach ($array as $value) {
        $array_home[$value] = 1;
    }

    $result = array();

    for ($j = 0; $j < $t_jump; $j++) {
        $location += 4;
        $jumptail .= $location . ", ";
        if ($array_home[$location] == 1) {
            array_push($result, $location);
        }
    }
}
?>
<html>

<head>
    <title>Frog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <style>
        body {
            font-family: 'Bree Serif';
            font-size: 12pt;
        }
    </style>
</head>

<body class="bg-dark text-white rtl text-center ">
    <div class="container">

        <div class="col-md-6 mx-auto mt-3">
            <form method="get" action="#" class="font-weight-bold" dir="rtl">
                <div class="form-group">
                    <label for="email">تعداد خانه های بازی :</label>
                    <input class="form-control" type="text" name="t-home">
                </div>
                <div class="form-group">
                    <label for="email">تعداد پرش های قورباغه :</label>

                    <input class="form-control" type="text" name="t-jump">
                </div>
                <div class="form-group">
                    <label for="email">تعداد خانه های آب گرفته :</label>
                    <input class="form-control" type="text" name="t-water">
                </div>
                <input type="submit" name="submit" value="Start" class="btn col-md-4 btn-outline-success">
            </form>
        </div>
        <div class="row">
            <?php
            if (isset($_GET['submit'])) {
                echo "<div  dir='rtl' class='alert alert-success col-md-4 mx-auto'><strong>مکان فعلی قورباغه :</strong> <p class='text-danger'>$location</p><strong>خانه های پرش :</strong></p><p class='text-justify text-info' dir='ltr'> $jumptail</p><p><strong>فهرست خانه های آبگرفته :</strong></p><p dir='ltr' class='text-info'>";
                for ($k = 0; $k < count($array_home); $k++) {
                    if ($array_home[$k] == 1) {
                        echo $k . ", ";
                    }
                }
                echo "</p></div>";
                echo "<div  dir='rtl' class='alert alert-success col-md-4 mx-auto'><strong>تعداد خانه های آبگرفته :</strong><br /><p class='text-primary'>";
                foreach ($result as $value) {
                    echo $value . "<br />";
                }
                echo "</p></div>";
            }
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>


</html>