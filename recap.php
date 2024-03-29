<?php
    session_start();
    ob_start();
?>
<?php 
    $title = "Récapitulatif des produits";
    #other php code here
?>

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
                            "<td>",
                                "<label>",
                                "<a href='traitement.php?action=up-qtt&id=".($index-=1)."' class='btn btn-light btn-sm rounded-circle border' name='up-qtt' value='+'>+</a>",
                                "</label>".$product['qtt']."<label>",
						        "<a href='traitement.php?action=down-qtt&id=".$index."' class='btn btn-light btn-sm rounded-circle border' name='down-qtt' value='-'>-</a>",
					            "</label><label>",
                                "<a href='traitement.php?action=delete&id=".$index."' type='submit' class='btn btn-primary rounded-pill' name='delete' value='delete'>delete</a>",
                                "</label></td>",
                                "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "</td>";
                        $totalGeneral += $product['total'];
                        
                        
                    }

                    echo "<tr>",
                            "<td colspan=4>Total général : <label>
                            <a href='traitement.php?action=clear' class='btn btn-primary rounded-pill' name='clear' value='clear'>Clear</a>
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
                <?php
                if (isset($_SESSION['messageAlertClear'])) {
                    echo $_SESSION['messageAlertClear'];
                    unset($_SESSION['messageAlertClear']);
                }
                ?>
                <?php
                if (isset($_SESSION['messageAlertDelAnArticle'])) {
                    echo $_SESSION['messageAlertDelAnArticle'];
                    unset($_SESSION['messageAlertDelAnArticle']);
                }
                ?>


<?php 
    $content = ob_get_clean();
    require_once "template.php";
?>