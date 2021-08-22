<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

?>
    <?php include('../views/header.php'); ?>

    <?php

    // get db connection from congfig file
    require '../config.php';

    //getting title from url
    if (!isset($_GET['sales_id'])) {
        header("Location: ../views/sales_details.php");
    } else {
        $sales_id = $_GET['sales_id'];
    }

    //selecting data associated
    $result = mysqli_query($con, "SELECT * FROM sales WHERE sales_id = '$sales_id' ");

    while ($row = mysqli_fetch_array($result)) {
        $invoice_no = $row['invoice_no'];
        $date = $row['date'];
        $customer_name = $row['customer_name'];
        $customer_address = $row['customer_address'];
        $customer_tel = $row['customer_tel'];
        $total_bill_value = $row['total_bill_value'];
    }

    ?>

    <body>

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg mx-auto">
                    <div class="m-4">

                        <div class="col-lg-6 mx-auto">
                            <!-- Create Invoice view -->
                            <div class="my-2">
                                <div class="card">
                                    <div class="card-body" style="margin:20px;">

                                        <img src="../../../images/invoice.jpg" class="mx-auto img-fluid" alt="Invoice Header Image">

                                        <div class="row print_container">

                                            <hr>
                                            <h3 class="text-uppercase text-center"><b>Invoice</b></h3>
                                            <hr>

                                            <div class="col">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <label><b>Invoice No </b></label>
                                                        </td>
                                                        <td>
                                                            <label>: <?php echo $invoice_no; ?></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label><b>Customer Name </b></label>
                                                        </td>
                                                        <td>
                                                            <label>: <?php echo $customer_name; ?></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label><b>Customer Address </b></label>
                                                        </td>
                                                        <td>
                                                            <label>: <?php echo $customer_address; ?></label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class=" col">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <label><b>Date </b></label>
                                                        </td>
                                                        <td>
                                                            <label>: <?php echo $date; ?></label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label><b>Tel </b></label>
                                                        </td>
                                                        <td>
                                                            <label>: <?php echo $customer_tel; ?></label>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <table class="table table-bordered mt-4">
                                                <thead class="text-white bg-secondary text-center">
                                                    <tr>
                                                        <th>Product Brand</th>
                                                        <th>Product Name</th>
                                                        <th>Qty</th>
                                                        <th>Unit Price</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php
                                                    require '../config.php';

                                                    $sql = "SELECT * FROM sales_invoices WHERE invoice_no = '$invoice_no'";

                                                    $result = $con->query($sql) or die($con->error);
                                                    while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $row['product_name']; ?></td>
                                                            <td><?php echo $row['product_brand']; ?></td>
                                                            <td><?php echo $row['qty']; ?></td>
                                                            <td><?php echo $row['unit_price']; ?></td>
                                                            <td><?php echo $row['amount']; ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                    <tr>
                                                        <th class="table-secondary" colspan="4">Total Amount</th>
                                                        <td><?php echo $total_bill_value; ?></td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                            <div class="row mx-auto">
                                                <div class="col-sm">
                                                    <div style="text-align:center; padding-top: 60px;">
                                                        <p class="text-center">.........................................................................</p>
                                                        <p class="text-center" style="font-size: 14px;">Customer Signature</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <div style="text-align:center; padding-top: 60px;">
                                                        <p class="text-center">.........................................................................</p>
                                                        <p class="text-center" style="font-size: 14px;">Authorized Signature <br> Wayambe Archery Suppliers</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary font-weight-bold" id="print_invoice">Print</button>&nbsp;
                            <button type="submit" class="btn btn-danger font-weight-bold" onclick="history.back()">Back</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/printThis.js"></script>
        <script>
            $('#print_invoice').click(function() {
                $('.print_container').printThis({
                    debug: false, // show the iframe for debugging
                    importCSS: true, // import parent page css
                    importStyle: true, // import style tags
                    printContainer: true, // print outer container/$.selector
                    loadCSS: "../../css/index.css", // path to additional css file - use an array [] for multiple
                    pageTitle: "Sales Invoice", // add title to print page
                    removeInline: false, // remove inline styles from print elements
                    removeInlineSelector: "*", // custom selectors to filter inline styles. removeInline must be true
                    printDelay: 333, // variable print delay
                    header: "<h1 align='center'>Wayamba Archery Suppliers</h1>", // prefix to html
                    footer: false, // postfix to html
                    base: false, // preserve the BASE tag or accept a string for the URL
                    formValues: true, // preserve input/form values
                    canvas: false, // copy canvas content
                    doctypeString: '<!DOCTYPE html>', // enter a different doctype for older markup
                    removeScripts: false, // remove script tags from print content
                    copyTagClasses: false, // copy classes from the html & body tag
                    beforePrintEvent: null, // callback function for printEvent in iframe
                    beforePrint: null, // function called before iframe is filled
                    afterPrint: null // function called before iframe is removed

                });
            })
        </script>



    </body>
    <?php include('../views/footer.php'); ?>
<?php

} else {

    header("location: ../forms/login.php");
    exit();
}

?>