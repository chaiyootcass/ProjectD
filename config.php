<?php
require_once 'vendor/autoload.php';

$stripe = array(
    "secret_key" => "sk_test_SMs5v4Su3uMJswYCToABz42G",
    "publishable_key" => "pk_test_LLJKgTxoW4WNXkyyt5BRrJ8j",
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
