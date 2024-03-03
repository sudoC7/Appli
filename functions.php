<?php

    // 
    function nbrShop() {
        $total = 0;
        foreach($_SESSION['products'] as $index => $product){
            $total = $index;       
        }
        echo "<span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>".$total."
        <span class='visually-hidden'>unread messages</span>
        </span>";
    }

?>