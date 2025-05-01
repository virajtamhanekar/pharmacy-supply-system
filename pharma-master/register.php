<?php 
   if (isset($_GET['status']) && $_GET['status'] == '1' ) {
      $msg = '1';
   }elseif(isset($_GET['status']) && $_GET['status'] == '0' ){
      $msg = '0';
   }elseif(isset($_GET['status']) && $_GET['status'] == '2' ){
      $msg = '2';
   }else{
      $msg = '';
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>4 Pharma</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
    }
    .h-custom {
    height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
    .h-custom {
    height: 100%;
    }
    }
  </style>
</head>

<body>

    <div class="site-wrap">
      <div class="container" style="margin-top: 8%;">
        <section class="vh-100">
          <div class="container-fluid h-custom">
            <?php if ($msg == '1') { ?>
              <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!!!</strong> Data Inserted SuccessFully.
              </div>
            <?php } ?>

            <?php if ($msg == '0') { ?>
              <div class="alert alert-danger" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Invaid Data.
              </div>
            <?php } ?>

            <?php if ($msg == '2') { ?>
              <div class="alert alert-danger" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Email Already Exist.
              </div>
            <?php } ?>

            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="images/draw2.webp"
                  class="img-fluid" alt="Sample image">
              </div>
              <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" action="controller/submit.php">
                  <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                    <p class="lead fw-normal mb-0 me-3">Register the User</p>
                    <button type="button" class="btn btn-primary btn-floating mx-1">
                      <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" class="btn btn-primary btn-floating mx-1">
                      <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-primary btn-floating mx-1">
                      <i class="fab fa-linkedin-in"></i>
                    </button>
                  </div>

                  <div class="divider d-flex align-items-center my-4">
                    <p class="text-center fw-bold mx-3 mb-0">Or</p>
                  </div>

                  <!-- Name input -->
                  <div class="form-outline">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" id="name" required name="name" class="form-control form-control-lg"
                      placeholder="Enter Your Name" />
                  </div>

                  <!-- Email input -->
                  <div class="form-outline">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" id="email" required name="email" class="form-control form-control-lg"
                      placeholder="Enter a valid email address" />
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" required name="password" class="form-control form-control-lg"
                      placeholder="Enter password" />
                  </div>

                  <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg"
                      style="padding-left: 2.5rem; padding-right: 2.5rem;">Save</button>
                    <p class="small fw-bold mt-2 pt-1 mb-0">You Can <a href="login.php"
                        class="link-danger">Login now</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

</body>

</html>