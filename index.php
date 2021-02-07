<?php
session_start();
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

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand text-uppercase text-success" href="#"><strong>Prescious Clothing Store</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-info" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" href="#">Features</a>
                    </li>

                </ul>
                <span class="navbar-text">
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#login_modal"> Login </button>
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#register_modal">
                        Sign-Up
                    </button>

                </span>
            </div>
        </nav>

        <br />


        <div class="container mt-4">

            <div class="card bg-secondary">
                <div class="card-body">
                    <h2 class="text-center text-white text-uppercase"><strong>Products on Special</strong></h2>
                </div>
            </div>

            <div class="row mt-4">
                <?php
                // Perform query
                if ($result = $mysqli->query("SELECT * FROM clothes")) {

                    foreach ($result as $key => $value) {
                ?>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body bg-light">
                                    <h5 class="card-title"><?php echo $value['product_name']; ?></h5>
                                    <img src="<?php echo $value['image_name']; ?>" width="200">
                                    <p class="card-text">Price : R<?php echo $value['price']; ?>.00</p>
                                    <hr />

                                    <p class="card-text"><?php echo $value['description']; ?></p>
                                    <a href="models/add_cart.php?id='<?php echo $value['id']; ?>'" class="btn btn-warning"> Add to Cart</a>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                    // Free result set
                    $result->free_result();
                }

                ?>

            </div>
        </div>

        <br /><br /><br />

        <!-- Login Modal -->
        <div class="modal fade " id="login_modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">


              

                    <div class="modal-header">
                 
                        <h5 class="modal-title" id="ModalLabel">User Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                    <form class="modal-content animate" action="models/login_script.php" method="post">
                        
                        <p id="login_status" class=" text-center"></p>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Start typing..." required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" id="register" value="Submit" />
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Registration  Modal -->
        <div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <p id="register_status" class=" text-center mt-6"></p><br/>

                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">User Registration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form id="register_form" method="post">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter Fisrt Name" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Surname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="Male"> Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Contact Number</label>
                                <div class="col-sm-10">
                                    <input type="phone" class="form-control" id="mobile" name="mobile" placeholder="Username" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Delivery Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="street_address" name="street_address" required>
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Postal Code</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="code" name="code" placeholder="e.g 1804" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required />
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

        <!-- Footer -->
        <section id="footer">
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
                        <hr>
                    </div>
                </div>
        </section>
        <!-- End of Footer Section -->
        
        <script>
        //runs when the page loads
            $(document).ready(function() {
                //calls the javascript functions
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
                    $('#register_status').show();
                    //$("#register_modal").modal('hide');
                    return false;

                });
            }

        </script>
    </body>

</html>