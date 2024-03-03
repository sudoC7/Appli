<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css"></link>
        <title>Récapitulatif des produits</title>
    </head>
    <body>
        <div class="container d-flex border border-black mt-3">

            <?php 

                if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                    echo "<p>Aucun produit en session...</p>";
                }    
                else{
                    echo "<table class='table table-bordered'>",
                            "<thead>",
                                "<tr>",
                                    "<th>#</th>",
                                    "<th>Nom</th>",
                                    "<th>Prix</th>",
                                    "<th>Quantité</th>",
                                    "<th>Total</th>",
                                "</tr>",
                            "</thead>",
                            "<tbody>";            
                    $totalGeneral = 0;
                    foreach($_SESSION['products'] as $index => $product){
                        echo "<tr>",
                                "<td>".($index+=1)."</td>",
                                "<td>".$product['name']."</td>",
                                "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                                "<td><label><input type='submit' class='btn btn-light btn-sm rounded-circle border' name='add' value='+'></label>".$product['qtt']."<label>
						<input type='submit' class='btn btn-light btn-sm rounded-circle border' name='sumbit' value='-'>
					</label><label>
                    <input type='submit' class='btn btn-primary rounded-pill' name='delete' value='delete'>
                </label></td>",
                                "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "</td>";
                        $totalGeneral += $product['total'];
                        
                        ($index-=1);
                    }

                    echo "<tr>",
                            "<td colspan=4>Total général : <label>
                            <input type='submit' class='btn btn-primary rounded-pill' name='clear' value='clear'>
                        </label></td>",
                            "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>","</tr>",
                            "</tbody>",
                        "</table>";
                }
            ?>
        </div>
        <div class="container mt-3">
            <a href="index.php" class="text-reset text-decoration-none"><button type="button" class="btn btn-primary"> < Retour</button></a>
        </div>
    </body>
</html>



<!-- create a function which display the number article in the basket -->