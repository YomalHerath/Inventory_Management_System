<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

?>

    <?php include('../views/header.php'); ?>

    <body>

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-lg grid-margin stretch-card mx-auto">
                    <div class="m-3">

                        <div class="col-lg-6 mx-auto">
                            <div class="card mb-3">
                                <div class="card-header"style="background-color:#e0b0ff;">
                                    <h2 class="card-title d-flex justify-content-center text-uppercase"><b>Create New Quotation</b></h2>
                                    <div class="card-body">
                                    </div>

                                    <form class="m-1" action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Quotation No</label>
                                            <input type="text" class="form-control" id="quotation_no" name="quotation_no" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Date</label>
                                            <input type="date" class="form-control" id="date" name="date" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Company Name</label>
                                            <input type="text" class="form-control" id="company_name" name="company_name" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Company Address</label>
                                            <input type="text" class="form-control" id="company_address" name="company_address" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Customer Tel No</label>
                                            <input type="text" class="form-control" id="company_tel" name="company_tel" required>
                                        </div>
                                        <br>

                                        <div>
                                            <div class="form-group m-2">
                                                <div class="table-responsive ">
                                                    <table class="table table-bordered" id="product_table">

                                                        <thead class="table-primary text-center">
                                                            <tr>
                                                                <th>Description</th>
                                                                <th>Qty</th>
                                                                <th>Unit Price</th>
                                                                <th>Amount</th>
                                                                <th><button type="button" class="btn btn-success btn-sm" value="add" onclick="addField('table_body');" /><b>+</b></button></th>
                                                            </tr>
                                                        </thead>

                                                        <tbody class="table-light" id="table_body">
                                                            <tr>
                                                                <td><input type="text" class="form-control form-control-sm" name="description[]"></td>
                                                                <td><input type="text" class="form-control form-control-sm" name="qty[]"></td>
                                                                <td><input type="text" class="form-control form-control-sm" name="unit_price[]"></td>
                                                                <td><input type="text" class="form-control form-control-sm" name="amount[]"></td>
                                                                <td><button type="button" class="btn btn-danger btn-sm" value="remove" onclick="removeField(this);" /><b>-</b></button></td>
                                                            </tr>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <!-- row count update and delete scripits -->
                                            <script>
                                                function addField(table_id) {
                                                    let table_body = document.getElementById(table_id);
                                                    first_tr = table_body.firstElementChild;
                                                    tr_clone = first_tr.cloneNode(true);

                                                    table_body.append(tr_clone);
                                                    clean_first_tr(table_body.firstElementChild);
                                                }

                                                function clean_first_tr(firstTr) {
                                                    let children = firstTr.children;

                                                    children = Array.isArray(children) ? children : Object.values(children);
                                                    children.forEach(x => {
                                                        if (x !== firstTr.lastElementChild) {
                                                            x.firstElementChild.value = '';
                                                        }
                                                    });
                                                }

                                                function removeField(This) {
                                                    if (This.closest('tbody').childElementCount == 1) {
                                                        alert("You don't have permission to delete this row")
                                                    } else {
                                                        This.closest('tr').remove();
                                                    }
                                                }
                                            </script>
                                        </div>

                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Total Amount</label>
                                            <input type="text" class="form-control" id="total_bill_value" name="total_bill_value" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Warranty Period</label>
                                            <input type="text" class="form-control" id="warranty_period" name="warranty_period" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="exampleFormControlInput1">Validity Period</label>
                                            <input type="text" class="form-control" id="validity_period" name="validity_period" required>
                                        </div>
                                        <br>
                                        <button type="submit" name="submit" class="btn btn btn-success m-1">Submit</button>
                                        <button type="button" class="btn btn btn-danger m-1" onclick="history.back();">Cancel</button>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </body>
    <?php include('../views/footer.php'); ?>

<?php

} else {

    header("location: ../forms/login.php");
    exit();
}

?>