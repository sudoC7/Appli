<?php

    // 
    function nbrShop() {
        $total = 0;
        if(isset($_SESSION['products'])) {
            
            foreach($_SESSION['products'] as $index => $product){
                
                $total = $index + 1;      
                
            }
            echo "<span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>".$total."
            <span class='visually-hidden'>unread messages</span>
            </span>";

        } else {
            echo "<span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>".$total."
            <span class='visually-hidden'>unread messages</span>
            </span>";
        }
    }

?>