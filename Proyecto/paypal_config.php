<?php
require 'vendor/autoload.php';

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

class PayPalClient
{
    public static function client()
    {
        $clientId = getenv("CLIENT_ID") ?: "AayZdff6I3B6lJHgYtur4XRTMEbZaiKuwehSnBDjp9KCOEPFT6pcZmykpC0bZcDFVHwuDKlOzAKBunMf";
        $clientSecret = getenv("CLIENT_SECRET") ?: "ECyz9ZuA-b-_8yCriMlPcqe7__i9CeBdMb6eluXN28fwuY0WNRNQqyWgzEpTAGK0u9EutmZ_9_DvSn-T";
        $environment = new SandboxEnvironment($clientId, $clientSecret);
        return new PayPalHttpClient($environment);
    }
}
