<!--- Used this source for the layout of the "Order Now" page as well as the "Shopping Cart" section.
<<<<<<< HEAD
source: http://www.webslesson.info/2016/08/simple-php-mysql-shopping-cart.html --->
=======
source: http://www.webslesson.info/2016/08/simple-php-mysql-shopping-cart.html --->   
>>>>>>> 1aebedeca7833909061d7c5605aabe1fbcbe0f0c

<?php   
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "macnmedb");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="order-now.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="order-now.php"</script>';  
                }  
           }  
      }  
 }  
<<<<<<< HEAD
 ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Mac & Me - Order Now</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    </head>

    <body class="no-sidebar">
        <div id="page-wrapper">
            <!-- Header -->
            <div id="header-wrapper">
                <div id="header" class="container">

                    <!-- Logo -->
                    <h1 id="logo"><a href="index.html">Mac & Me</a></h1>

                    <!-- Nav -->
                    <nav id="nav">
                        <ul>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li class="break"><a href="sign-up.html">Sign Up</a></li>
                            <li><a href="login.html">Login</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
            <br />
            <div class="container" style="width:700px;">
                <h3 align="center">Order Now!</h3>
                <br />
=======
 ?>  

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Mac & Me - Order Now</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
            <link rel="stylesheet" href="assets/css/main.css" />
            <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
            <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
      </head>  
      <body class="no-sidebar">
          <div id="page-wrapper">
              <!-- Header -->
                <div id="header-wrapper">
                <div id="header" class="container">

                <!-- Logo -->
                <h1 id="logo"><a href="index.html">Mac & Me</a></h1>

                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                        <li class="break"><a href="sign-up.html">Sign Up</a></li>
                        <li><a href="login.html">Login</a></li>
                    </ul>
                </nav>

                </div>
                </div>
           <br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Order Now!</h3><br />  
>>>>>>> 1aebedeca7833909061d7c5605aabe1fbcbe0f0c
                <?php  
                $query = "SELECT * FROM products ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
<<<<<<< HEAD
                ?>
                    <div class="col-md-4">+
                        <form method="post" action="order-now.php?action=add&id=<?php echo $row[" id "]; ?>">
                            <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                                <img src="<?php echo $row[" image "]; ?>" class="img-responsive" />
                                <br />
                                <h4 class="text-info"><?php echo $row["name"]; ?></h4>
                                <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
                                <input type="text" name="quantity" class="form-control" value="1" />
                                <input type="hidden" name="hidden_name" value="<?php echo $row[" name "]; ?>" />
                                <input type="hidden" name="hidden_price" value="<?php echo $row[" price "]; ?>" />
                                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                            </div>
                        </form>
                    </div>
                    <?php  
                     }  
                }  
                ?>
                        <div style="clear:both"></div>
                        <br />
                        <h3>Shopping Cart</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Item Name</th>
                                    <th width="10%">Quantity</th>
                                    <th width="20%">Price</th>
                                    <th width="15%">Total</th>
                                    <th width="5%">Action</th>
                                </tr>
                                <?php   
=======
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="order-now.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                <h3>Shopping Cart</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
>>>>>>> 1aebedeca7833909061d7c5605aabe1fbcbe0f0c
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
<<<<<<< HEAD
                          ?>
                                    <tr>
                                        <td>
                                            <?php echo $values["item_name"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $values["item_quantity"]; ?>
                                        </td>
                                        <td>$
                                            <?php echo $values["item_price"]; ?>
                                        </td>
                                        <td>$
                                            <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?>
                                        </td>
                                        <td><a href="order-now.php?action=delete&id=<?php echo $values[" item_id "]; ?>"><span class="text-danger">Remove</span></a></td>
                                    </tr>
                                    <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>
                                        <tr>
                                            <td colspan="3" align="right">Total</td>
                                            <td align="right">$
                                                <?php echo number_format($total, 2); ?>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <?php  
                          }  
                          ?>
                            </table>
                        </div>
            </div>
            <br />
        </div>
    </body>
    <ul id="hero" style="position: absolute; right: 20px; top: 10px;">
        <li><a href="order-now.php" class="button"><strong>Cart</strong></a></li>
    </ul>

    </html>
=======
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="order-now.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />
          </div>
      </body>  
            <ul id="hero" style="position: absolute; right: 20px; top: 10px;"> 
                <li><a href="order-now.php" class="button"><strong>Cart</strong></a></li>
            </ul>
 </html>
>>>>>>> 1aebedeca7833909061d7c5605aabe1fbcbe0f0c