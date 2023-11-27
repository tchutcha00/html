<?php

use \Paygol\API;
use \Paygol\Exceptions\InvalidParameterException;

/**
 * Merchant service ID
 *
 * @var int
 */
$service_id = "123";
/**
 * Merchant shared secret
 *
 * @var string
 */
$shared_secret = "7c1a6a24-7943-102d-92f8-29573711ad31";

try {
  $pg = new API($service_id, $shared_secret);

  $payment_methods = $pg->getPaymentMethods("cl");

  var_dump($payment_methods);
} catch (\Exception $e) {
  die($e->getMessage());
}
