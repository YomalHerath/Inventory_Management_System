<?php include('../views/header.php'); ?>

<body>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg mx-auto">
                <div class="m-4">

                    <div class="col-lg-6 mx-auto">
                        <!-- Create Invoice view -->
                        <div class="my-2" id="printableArea">
                            <div class="card">
                                <div class="card-body" style="margin:20px;">

                                    <img src="../../../images/invoice.jpg" class="mx-auto img-fluid" alt="Invoice Header Image">

                                    <div class="row">

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
                                                        <label>: </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label><b>Customer Name </b></label>
                                                    </td>
                                                    <td>
                                                        <label>: </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label><b>Customer Address </b></label>
                                                    </td>
                                                    <td>
                                                        <label>: </label>
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
                                                        <label>: </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label><b>Tel </b></label>
                                                    </td>
                                                    <td>
                                                        <label>: </label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <table class="table table-bordered mt-4">
                                            <thead class="text-white bg-secondary text-center">
                                                <tr>
                                                    <th scope="col">Code</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Unit Price</th>
                                                    <th scope="col">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th class="table-secondary" colspan="4">Total Amount</th>
                                                    <td></td>
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
                        <button type="submit" class="btn btn-primary font-weight-bold" onClick="printPageArea('printableArea')">Print</button>&nbsp;
                        <button type="submit" class="btn btn-danger font-weight-bold" onclick="history.back()">Back</button>
                    </div>
                </div>


                <!-- make print view with button click -->
                <script>
                    function printPageArea(areaID) {
                        var printContents = document.getElementById(areaID).innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        window.print();
                        document.body.innerHTML = originalContents;
                    }
                </script>


            </div>
        </div>
    </div>
    </div>

</body>
<?php include('../views/footer.php'); ?>