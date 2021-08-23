<?php

session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

?>

<?php include('../views/header.php'); ?>

    
<body id="change_pw_body">

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card mx-auto">
                <div class="m-3">

                    <div class="col-lg-4 mx-auto">
                        <div class="m-3">

                            <div class="card mb-3">
                                <div class="card-body">
                                    <form name="change_pw" method="POST" action="../form_controllers/change_pw_control.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <img class="mb-4" src="../../../images/logo.jpg" alt="" height="160">
                                        </div>
                                        <div class="form-group p-2">
                                            <h3 class="font-weight-normal">Change Password</h3>
                                        </div>
                                        <div class="form-group p-2">
                                            <label class="sr-only">Current Password</label>
                                            <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Current Password" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label class="sr-only">New Password</label>
                                            <input type="password" id="new_password" name="new_password" class="form-control" placeholder="New Password" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <label class="sr-only">Confirm Password</label>
                                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                        </div>

                                        <div class="form-group p-2">
                                            <button class="btn btn btn-primary btn-block" name="submit" type="submit">Change</button>
                                        </div>
                                    </form>
                                </div>
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