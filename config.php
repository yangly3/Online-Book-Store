<?php
require_once('vendor/autoload.php');

$stripe = [
  "secret_key"      => "sk_test_Mpw0kIdnPpO4xWMHi3u60BD100KFCWiJzO",
  "publishable_key" => "pk_test_L77hrmmDfp5nzUhZMfzSEhCq00QDPdN9DC",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>
