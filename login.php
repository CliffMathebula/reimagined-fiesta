



<?php
include('models/connection.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Prescious Clothing Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
  <link rel="stylesheet" href="css/mystyle.css">
  </head>

  <body>

    <!-- Start of navbar section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand text-uppercase text-success" href="#"><strong>Prescious Clothing Store</strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-info" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="#">Features</a>
          </li>
        </ul>
        <span class="navbar-text">
          <a href="sign-up.php" class="nav-link text-info">Sign-Up</a>
        </span>
      </div>
    </nav>
    <!-- End of navbar section  -->

    <br /><br />
    
    <div class="container mt-4">
      <h2 class="text-center text-secondary text-uppercase"><small>User Login</small></h2>

      <div class="card bg-light mt-4">
        <div class="card-body">
          <form id="login">

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="staticEmail" placeholder="email@example.com">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <button class="btn btn-warning btn-lg">Login </button>
                <button type="button" class="btn btn-success btn-lg text-white" data-toggle="modal" data-target="#register_modal">
                  Sign-Up
                </button>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>

    <!-- Registration  Modal -->
    <div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <p id="register_status" class=" text-center mt-6"></p>

          <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">User Registration</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form id="register_form">
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="password" placeholder="Password">
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" id="register" value="Submit" />
          </div>
          </form>
        </div>
      </div>
    </div>

    <br /><br /><br />
    <!-- Footer -->
    <section id="footer mt-6">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
            <ul class="list-unstyled list-inline social text-center">
              <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-envelope"></i></a></li>
            </ul>
          </div>
          <hr>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
            <p class="h6">&copy; All Right Reversed.<a class="text-green ml-2" href="#" target="_blank"> Prescious Clothing Store</a> | Designed and Managed By Prescious Mokgoebo</p>
          </div>
          <hr>
        </div>
      </div>
    </section>
    <!-- ./Footer -->

    <script>
      $(document).ready(function() {
        // alert('ddd');
        register_user();
      });


      function register_user() {

        $('#register_form').submit(function() {
          //get form values from the form 
          var form_values = $('#register_form').serialize();

          $.ajax({

            type: 'POST',
            url: 'models/register_script.php',
            data: form_values,

            success: function(data) {
             
              $('#register_status').html(data);
            }
          });
//          $("#register_modal").modal('hide');
          $('#register_status').show();
          return false;
          
        });
      }
    </script>

  </body>

</html>