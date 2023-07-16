<?php

session_start();

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) {

        if (isset($_SESSION['cart'])) {
            $items = array_column($_SESSION['cart'], 'title');
            if (in_array($_POST['title'], $items)) {
                echo "
                <script>alert('Item Already Added')
                window.location.href = 'index.php'
                </script>
                
                ";
            }
        else {
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array(
                "title" => $_POST['title'],
                "price" => $_POST['price'],
                "quantity" => 1
            );
            echo "
            <script>alert('Item Added')
            window.location.href = 'index.php'
            </script>
            ";
        }
    }
    } else {

        $_SESSION['cart'][0] = array(
            "title" => $_POST['title'],
            "price" => $_POST['price'],
            "quantity" => 1
        );
        echo "
                <script>alert('Item Added')
                window.location.href = 'index.php'
                </script>
                
                ";
    }
}

if(isset($_POST['remove'])){
    foreach ($_SESSION['cart'] as $key => $item) {
        if($item["title"] ==$_POST['title']){

            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo "
                <script>alert('Item Removed')
                window.location.href = 'cart.php'
                </script>
                
                ";
        } 
    }
}

if(isset($_POST['remove_all'])){
    session_destroy();
    echo "
    <script>alert('All Items Removed')
    window.location.href = 'cart.php'
    </script>
    
    ";
}

?>