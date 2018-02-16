<html>


<form method="POST" action='payment-summary.php'>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="name">Cardholder Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group col-md-3">
            <label for="number">Card Number</label>
            <input type="text" name="number" class="form-control" id="number" placeholder="Number">
        </div>
        <div class="form-group col-md-3">
            <label for="date">Exp. Date</label>
            <input type="date" name="date" class="form-control" id="date">
        </div>
        <div class="form-group col-md-3">
            <label for="cvc">Security Code (CVC)</label>
            <input type="text" name="cvc" class="form-control" id="cvc">
        </div>
        <input type="hidden" name="product_id" value=<?php echo $product_id ?>>
        <input type="hidden" name="order_id" value=<?php echo $product_id ?>>
        <input type="hidden" name="total" value=<?php echo $data[2] ?>>
    </div>
    <input type="submit" class="btn btn-primary btn-lg" style="float: right;" value="Checkout">
</form>



















</html>
