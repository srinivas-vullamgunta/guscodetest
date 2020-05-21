<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Shop</title>
        <meta name="description" content="Shop">
        <meta name="author" content="Arden University">
        <link rel="stylesheet" href="styles.css">
    </head>    
    <body>
        <div style="font-size:26px; font-weight:bold;">Shop</div>

        <div style='float:left; padding-right:100px;'>
            <h2>Opening times</h2>

            <?php
            include 'Database.php';
            include 'Sendmail.php';
            include 'BaseController.php';
            include 'Model.php';
            include 'View.php';

            include 'ShopController.php';
            include 'OpeningTimesModel.php';
            include 'OpeningTimesView.php';

            include 'ProductsController.php';
            include 'ProductsModel.php';
            include 'ProductsView.php';

            $controller = new Arden\ShopController();
            $openingTimesView = new Arden\OpeningTimesView($controller->getModelData());
            echo $openingTimesView->render();
            ?>
        </div>

        <div style='float:left; padding-right:100px;'>
            <h2>Top Products</h2>
            <?php

                $pcontroller = new Arden\ProductsController();
                $productsView = new Arden\ProductsView($pcontroller->getModelData());
                echo $productsView->render();
            ?>
        </div>                  

        <div style='float:left; padding-right:100px;'> 
            <h2>Contact Form</h2>
            <?php 
            if(isset($_POST['submit']) && $_POST['submit'] != null ){ 
                try {
                    $e = new Arden\Email();
                    $e->Name = $_POST['name'];
                    $e->Email = $_POST['email'];
                    $e->Message = $_POST['message']; 
                    $pcontroller3 = new Arden\ProductsController();
                    $insertData = $pcontroller3->insertData($e->Name, $e->Email, $e->Message);  
                    echo "Contact details are Successfully inserted into the system.";
                    $e->Send();
                   
                }
                catch(Exception $e){
                    $error = $e->getMessage();
                }
            } 
            if(isset($error)){
                echo $error;
            }
            ?>

             <form name="contactform" action="" method="POST">
                <table>
                    <tr>
                        <td><label for="name">Name</label></td>
                        <td><input type="text" name="name" id="name" class="name" required /></td>
                    </tr>

                    <tr>
                        <td><label for="email">E-mail</label></td>
                        <td><input type="text" name="email" id="email" class="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"   required /> </td>
                     </tr>

                    <tr>
                        <td><label for="message">Message</label></td>
                        <td><textarea id="message" name="message" required></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" >
                            <input type="submit" value="Send" name="submit" class="send" />
                        </td>
                    </tr>
                </table>
            </form>
        </div> 
    </body>


</html>
