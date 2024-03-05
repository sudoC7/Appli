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

                //Suppression d'un article précis 
                if(isset($_SESSION['products'])) {
                    unset($_SESSION['products'][$id]);
                }
                header('location:recap.php');

                die;
                break;
            case "clear":   

                //Suppression de tous les articles du panier 
                unset($_SESSION['products']);
                header('location:recap.php');

                die;
                break;
            case "up-qtt":

                //Incrémentation d'article 
                if(isset($_SESSION['products'])) {
                    $_SESSION['products'][$id]["qtt"]++;
                    $_SESSION['products'][$id]['total'] = $_SESSION['products'][$id]['price'] * $_SESSION['products'][$id]['qtt'];
                }
                header('location:recap.php');

                die;
                break;
            case "down-qtt":

                //Décrémentation d'article 
                if(isset($_SESSION['products'])) {
                    $_SESSION['products'][$id]["qtt"]--;
                    if($_SESSION['products'][$id]['total'] != 1) {
                        $_SESSION['products'][$id]['total'] = $_SESSION['products'][$id]['price'] * $_SESSION['products'][$id]['qtt'];
                    } else {
                        unset($_SESSION['products'][$id]);
                    }

                }

                header('location:recap.php');

                die;
                break;
        }
    }

    


    // header("Location:index.php");

    
    ?>
