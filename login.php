<?php

session_start();

if (isset($_POST['login']))
{


    $username = $_POST['username'];
    $password = $_POST['password'];

    //setting cookies ->
    setcookie('uname', $username, time() + 3,"/");
    setcookie('upass', $password, time() + 3,"/");

    // $remember = $_POST['remember'];

    // if ($remember == 1) {
    //     // setcookie('uname', $username, time() + 30,"/");
    //     // setcookie('upass', $password, time() + 30,"/");
    //     setcookie('uname', $username, time() + 60*60*24*10,"/");
    //     setcookie('upass', $password, time() + 60*60*24*10,"/");
    // }


    $sql = "SELECT * from login WHERE username = '$username' && password = '$password'";

    require('db.php');

    $qry = mysqli_query($conn, $sql) or die("Login Problem");

    $count = mysqli_num_rows($qry);

    if ($count== 1) {

        $_SESSION['user'] = $username;

        header("Location: index.php");
        // echo "successfull";
    }
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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

                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" method="post" name="login">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg" id="username" placeholder="Username" value="<?php if (isset($_COOKIE['uname'])) echo $_COOKIE['uname']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" value="<?php if (isset($_COOKIE['upass'])) echo $_COOKIE['upass']; ?>">
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="login" value="SIGN IN" />
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="remember" value="1" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="mb-2">
                                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                        <!-- <i class="mdi mdi-facebook mr-2"></i>Connect using facebook -->
                                        <a href="http://www.facebook.com" style="color: white;"><i class="mdi mdi-facebook mr-2"></i>Connect using facebook</a>
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="register.php" class="text-primary">Create</a>
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