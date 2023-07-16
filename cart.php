<?php
include 'header.php';
?>

<h1 class="text-center my-4">Your Cart</h1>

<div class="container">
    <div class="row">


        <div class="col-md-9">


            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Item No.</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    if (isset($_SESSION['cart'])) {

                        $_SESSION['count'] = count($_SESSION['cart']);
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $total = $total + $value['price'];


                    ?>
                            <tr>
                                <td><?php echo $key+1 ?></td>
                                <td><?php echo $value['title'] ?></td>
                                <td><?php echo $value['price'] ?></td>
                                <td class='d-flex justify-content-center'><input type="number" class="text-center form-control w-50" value='<?php echo $value['quantity'] ?>' min="1" max="10"></td>

                                <td>
                                    <form action="cart_details.php" method="post">
                                        <button class='btn btn-sm btn-outline-danger' name='remove'>Remove</button>
                                        <input type="hidden" name="title" value='<?php echo $value['title'] ?>'>
                                    </form>
                                </td>

                            </tr>


                    <?php
                        }
                    }
                    if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
                    ?>
                    <tr class="table-active">
                        <th colspan=4></th>
                        <td>
                            <form action="cart_details.php" method="post">
                                <button class='btn btn-sm btn-danger' name='remove_all'>Remove All</button>
                                <input type="hidden" name="title" value='<?php echo $value['title'] ?>'>
                            </form>
                        </td>
                    </tr>
                    <?php
                    }   
                    ?>
                </tbody>
            </table>

        </div>

        <div class="col-md-3 bg-secondary-subtle rounded py-4 px-3">
            <div class='mt-3 '>
                <h4 class='text-success'>Order Summary</h4>
                <div class="d-flex justify-content-between mt-5">

                    <h5>Total:</h5>
                    <h5><?php echo $total ?></h5>
                </div>
                <hr>
                <form class='ms-2'>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            JazzCash / EasyPaisa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Cash On Delivery
                        </label>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button class='btn btn-primary btn-block'>Place Order</button>
                    </div>
                </form>
            </div>
        </div>



    </div>
    <?php
    include 'footer.php';
    ?>