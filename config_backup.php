<?php
require_once('vendor/autoload.php');

$stripe = [
  "secret_key"      => "sk_test_Mpw0kIdnPpO4xWMHi3u60BD100KFCWiJzO",
  "publishable_key" => "pk_test_L77hrmmDfp5nzUhZMfzSEhCq00QDPdN9DC",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>

<?php require_once('./config.php'); ?>

<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount="5000"
          data-locale="auto"></script>
</form>