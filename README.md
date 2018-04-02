# Crosspay

Crosspay is an online payment API wrapper. 

## Support Online payment
- [Stripe](https://stripe.com/)
  - [GitHub - stripe/stripe-php](https://github.com/stripe/stripe-php)
- [PAY.JP](https://pay.jp/)
  - [GitHub - payjp/payjp-php](https://github.com/payjp/payjp-php)

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Crosspay\CrossPay;
use Crosspay\exception\CrosspayException;

try {
    $crossPay = new CrossPay([
        'provider' => 'stripe', // or payjp
        'api_key' => 'KEY', // require
        'api_secret' => 'SECRET', // require
        'api_version' => 'API_VERSION' // option
    ]);
    
    $customer = $crossPay->customer()->create([
        'email' => 'test@example.com',
        'source' => 'CARD_TOKEN',
    ]);
    
    $charge = $this->crossPay->charge()->create([
        'customer' => $customer->id(),
        'amount' => 1000,
        'currency' => 'jpy',
        'description' => 'test charge'
    ]);
    
    // credit card last 4 number
    echo $customer->defaultCard()->last4();
    
    // charge customer id
    echo $charge->customerId();
    
} catch (CrosspayException $e) {
    echo $e->getMessage();
}

```

# Testing
Use phpunit and phpdotenv.

```bash
$ cp .env.example .env
```

Set to Api Key and Secret.

```
STRIPE_KEY=""
STRIPE_SECRET=""
STRIPE_API_VERSION=""

PAYJP_KEY=""
PAYJP_SECRET=""
```

# License

This project is licensed under the terms of the MIT license.


