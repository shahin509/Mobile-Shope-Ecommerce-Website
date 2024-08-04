<?php

if (isset($_POST['register'])) {


    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    if ($username != '' && $password != '' && $email != '' && $country != '') {

        $sql = "INSERT INTO login(username, password, email, country) VALUES('$username', '$password', '$email', '$country')";

        include('db.php');

        $qry = mysqli_query($conn, $sql) or die("Data insert error");

        if ($qry) {
            $_SESSION['status'] = "hello!";
            header("Location: alert.php");
        }
    }
} else {
    echo "Please fill all the fields!!";
}



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                            <h4>New here?</h4>
                            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

                            <form class="pt-3" method="POST" name="register" action="">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="****@gmail.com">
                                </div>
                                <div class="form-group">
                                    <select name="country" class="form-control form-control-lg" id="country">
                                        <option value="">Country</option>
                                        <option value="US">United States of America</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="IN">Bangladesh</option>
                                        <option value="GR">Germany</option>
                                        <option value="AR">Argentina</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="****">
                                </div>
                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="iagree" value="1" class="form-check-input">
                                            I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" name="register" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP" />

                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="login.php" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>