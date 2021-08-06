    <?php include('../views/header.php'); ?>

    <body>

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
    <?php include('../views/footer.php'); ?>