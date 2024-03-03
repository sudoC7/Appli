<?php 
    session_start();
    header("Location:index.php");
    

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


    if(isset($_GET['action'])) {

        switch($_GET['action']) {
            case "add":
                break;
            case "delete":
                break;
            case "clear":
                break;
            case "up-qtt":
                break;
            case "down-qtt":
                break;
        }
    }

    


    // header("Location:index.php");

    
    ?>
