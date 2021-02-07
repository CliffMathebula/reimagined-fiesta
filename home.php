<?php
session_start();
include('models/connection.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Prescious Clothing Store</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style type="text/css">
        body {
            background-image: url(https://static.pexels.com/photos/371633/pexels-photo-371633.jpeg);
            background-repeat: no-repeat;
            background-size: 100%;
        }

        footer {

            margin-top: 20px;
            padding-top: 20px;
        }

        .bg__card__navbar {
            background-color: #000000;
        }

        .bg__card__footer {
            background-color: #000000 !important;
        }

        #add__new__list {
            top: -38px;
            right: 0px;
        }
    </style>

<body>
    <header>
        <div class="container bg-info p-5 ">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><?php echo $_SESSION['user']; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="index.html">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#">Features</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!---->
    <main>
        <div class="container my-5">
            <div class="card-body text-center">
                <h2 class="card-title text-danger">Cart Items</h2>
                <p class="card-text text-white"><strong>Items Added to Cart</strong></p>
            </div>
            <div class="card">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">List Name</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Edit List </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $username = $_SESSION['user'];
                        // Perform query
                        if ($result = $mysqli->query("SELECT product_id FROM cart_items WHERE username ='$username' AND `cart_items`.`status`=''")) {

                            foreach ($result as $key => $value) {
                                $id = $value['product_id'];

                                if ($result = $mysqli->query("SELECT * FROM clothes WHERE id=$id")); {
                                    foreach ($result as $key => $rows) {
                        ?>
                                        <tr>
                                            <td><img src="<?php echo $rows['image_name']; ?>" width="100"></td>
                                            <th scope="row"><?php echo $rows['id']; ?></th>
                                            <td><?php echo $rows['product_name']; ?></td>
                                            <td><?php echo $rows['description']; ?></td>
                                            <td class='text text-danger'><strong><?php echo 'R' . $rows['price'] . '.00'; ?></strong></td>
                                            <td><?php echo $rows['date_placed']; ?></td>
                                            <td>
                                                <a href="models/cart_action.php?id='<?php echo $rows['id']; ?>'&&action='delete'" class="btn btn-warning"> Delete Item</a>
                                            </td>
                                        </tr>
                        <?php
                                    }
                                }
                            }
                        } else {
                            echo '<p class="text text-white">Cart Empty</p>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <a href="models/place_order.php?id='<?php echo $rows['id']; ?>'" class="btn btn-warning"> Check Out</a>
            <a class="btn btn-lg btn-primary" href="index.php">Add Item</a>
        </div>
        </div>
    </main>
    <!---->

    <!---->
    <footer>
        <div class="container bg-info p-5">
            <p class="text-white">Prescious clothing Store &copy 2021. All Rights Reserved</p>
        </div>
    </footer>
</body>