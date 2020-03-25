<?php
   $total = 500.00;
echo "<h3>The test total is: ".$total."</h3>";
   ?>

<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key=pk_test_L77hrmmDfp5nzUhZMfzSEhCq00QDPdN9DC
          data-description="<?php echo 'Payment Form'; ?>"
          data-amount="<?php echo $total*100; ?>"
          data-locale="auto"></script>
	   <input type="hidden" name="totalamt" value="<?php echo $total*100; ?>" />
</form>