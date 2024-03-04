<?php 
    session_start();
    // session_destroy();
    
    $id = (isset($_GET['id'])) ? ($_GET['id']) : null;
    
    
    
    if(isset($_GET['action'])) {

        switch($_GET['action']) {
            case "add":

                if(isset($_POST['submit'])){
        
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                    
                    if($name && $price && $qtt){
            
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];  
                        
                        $_SESSION['products'][] = $product;
                        
                        $_SESSION['messageAlert'] = "<div class='border m-3 p-3 alert alert-success' role='alert'>
                        <p class='mb-0'>Votre produit à bien été enregistré !</p>
                        </div>";
                        
                    } else {
                        
                        $_SESSION['messageAlert'] = "<div class='border m-3 p-3 alert alert-danger' role='alert'>
                        <p class='mb-0'>Votre produit n'a pas été enregistré !</p>
                        </div>";  
                        
                    }
                }
                
                header("Location:index.php");

                die;
                break;
            case "delete":

                if(isset($_SESSION['products'])) {
                    var_dump($_SESSION['products'][1]["qtt"]++);
                }

                header('location:recap.php');

                die;
                break;
            case "clear":   

                unset($_SESSION['products']);
                header('location:recap.php');
                
                die;
                break;
            case "up-qtt":

                if(isset($_SESSION['products'])) {
                    var_dump($_SESSION['products'][1]["qtt"]++);
                }

                header('location:recap.php');

                die;
                break;
            case "down-qtt":

                // if(isset($_SESSION['products'])) {
                //     var_dump($_SESSION['products'][1]["qtt"]--);
                // }

              

                header('location:recap.php');

                die;
                break;
        }
    }

    


    // header("Location:index.php");

    
    ?>
