<?php
include 'header.php';
?>

<h1 class="text-center my-4">Products</h1>


<div class="container">
    <div class="row">

    <?php
    $fetch = "SELECT * FROM `products`";
    $res = mysqli_query($conn,$fetch);
    while($row = mysqli_fetch_assoc($res)){

    ?>
        <div class="col-lg-3 my-3">
            <form action="cart_details.php" method="post">

                <div class="card" style="width: 16rem;">
                    <img src="products/<?php echo $row['img']?>" class="card-img-top" height="250">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['title']?></h5>
                        <p class="card-text">Some quick example text to build on the card title..</p>
                        <h6>Price: <?php echo $row['price']?>rs</h6>
                        <button type="submit" name="add_to_cart" class="btn btn-primary">Add To Cart</button>
                        <input type="hidden" name="title" value="<?php echo $row['title']?>">
                        <input type="hidden" name="price" value="<?php echo $row['price']?>">
                    </div>
                </div>
            </form>
        </div>

        <?php
    }
        
        ?>
    </div>
</div>

<?php
include 'footer.php';
?>