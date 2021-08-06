<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wayamba Archery Suppliers</title>
</head>
<header>
    <link rel="stylesheet" type="text/css" href="../../css/index.css" />
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

<body id="login_body">

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg grid-margin stretch-card mx-auto">
                <div class="m-3">

                    <div class="col-lg-4 mx-auto">
                        <div class="m-3">

                            <div class="card mb-3">
                                <div class="card-body">
                                    <form name="login" method="POST" action="../form_controllers/login_control.php" onsubmit="return validation()" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <img class="mb-4" src="../../../images/logo.jpg" alt="" height="180">
                                        </div>
                                        <div class="form-group p-2">
                                            <h3 class="font-weight-normal">Please Sign In</h3>
                                        </div>
                                        <div class="form-group p-2">
                                            <label class="sr-only">Username</label>
                                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                                        </div>
                                        <div class="form-group p-2">
                                            <label class="sr-only">Password</label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        <div class="form-group p-2">
                                            <button class="btn btn btn-primary btn-block" name="submit" type="submit">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- validation for empty field -->
                            <script>
                                function validation() {

                                    var username = document.login.username.value;
                                    var password = document.login.password.value;

                                    if (username.length == "" && password.length == "") {
                                        alert("Username and Password fields are empty");
                                        return false;
                                    } else {
                                        if (username.length == "") {
                                            alert("Username is empty");
                                            return false;
                                        }
                                        if (password.length == "") {
                                            alert("Password field is empty");
                                            return false;
                                        }
                                    }
                                }
                            </script>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>