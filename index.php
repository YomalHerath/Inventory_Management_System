<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wayamba Archery Suppliers</title>
</head>
<header>
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- import font awesome icons -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</header>

<!--Navigation Bar-->
<nav class="navbar navbar-expand navbar-dark" style="background-color : #1B4F72;">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="index.php"><b class="text-uppercase">Dashboard</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="view/php/views/supplier_details.php"><b class="text-uppercase">Suppliers</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="view/php/views/product_details.php"><b class="text-uppercase">Products</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="view/php/views/sales_details.php"><b class="text-uppercase">Sales</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="view/php/views/tender_details.php"><b class="text-uppercase">Tenders</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="view/php/forms/logout.php"><b class="text-uppercase">Logout</b></a>
            </li>
        </ul>
    </div>
</nav>

<body style=" background-image: url('images/background_image.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card mx-auto">

                <h1 style="font-size: 56px;" class=" m-2 d-flex justify-content-center text-center"><b>Welcome to Wayamaba Archery Suppliers Inventory Management System</b></h1>

                <div class="row m-4">
                    <!-- card views -->
                    <div class="col-sm-3 p-2">
                        <div class="card text-center font-weight-bold" style="width: 100%; height: 7rem; background-color: #2874A6;">
                            <div class="card-body">
                                <h4 class="text-light text-uppercase">Available Products</h4>
                                <h2 class="text-light">
                                    28
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 p-2">
                        <div class="card text-center font-weight-bold" style="width: 100%; height: 7rem; background-color: #B03A2E;">
                            <div class="card-body">
                                <h4 class="text-light text-uppercase">Suppliers</h4>
                                <h2 class="text-light">
                                    5
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 p-2">
                        <div class="card text-center font-weight-bold" style="width: 100%; height: 7rem; background-color: #117A65;">
                            <div class="card-body">
                                <h4 class="text-light text-uppercase">Tenders</h4>
                                <h2 class="text-light">
                                    8
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 p-2">
                        <div class="card text-center font-weight-bold" style="width: 100%; height: 7rem; background-color: #D4AC0D;">
                            <div class="card-body">
                                <h4 class="text-light text-uppercase">Sales</h4>
                                <h2 class="text-light">
                                    11
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="content-wrapper">
                        <?php

                        $dataPoints = array(
                            array("y" => 25, "label" => "January"),
                            array("y" => 15, "label" => "February"),
                            array("y" => 25, "label" => "March"),
                            array("y" => 5, "label" => "April"),
                            array("y" => 10, "label" => "May"),
                            array("y" => 3, "label" => "June"),
                            array("y" => 20, "label" => "July")
                        );

                        ?>
                        <script>
                            window.onload = function() {

                                var chart = new CanvasJS.Chart("chartContainer", {
                                    title: {
                                        text: "Monthly Sales"
                                    },
                                    axisY: {
                                        title: "Sales Count"
                                    },
                                    data: [{
                                        type: "line",
                                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                    }]
                                });
                                chart.render();

                            }
                        </script>
                        </head>

                        <body>
                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

<footer class="text-center text-white" style="background-color : #1B4F72;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Form -->
        <section class="">
            <form action="">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-auto">
                        <p class="pt-2">
                            © 2021 Copyright: QubeTech Production
                        </p>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </form>
        </section>
        <!-- Section: Form -->
    </div>
    <!-- Grid container -->
</footer>

</html>