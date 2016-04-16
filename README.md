# Money

Simple money manipulation library which uses bcmath to manipulate money values appropriately.

## Install

```
compose require krak/money
```

## Usage

```php
<?php

use function Krak\Money\money_sum,
    Krak\Money\money_diff,
    Krak\Money\money_prod,
    Krak\Money\money_quot,
    Krak\Money\money_cmp;

var_dump(money_cmp('6', money_sum('1.00', '2', '3.0')) === 0);
// bool(true)

var_dump(money_cmp('1.00', money_diff('8', '3', '4')) === 0);
// bool(true)
```

## API

```
string money_diff(...$args)
string money_sum(...$args)
string money_prod(...$args)
string money_quot(...$args)
string money_tax_rate($total, $tax)
string money_tax($total, $rate)
int money_cmp($m1, $m2)

```

`diff -> difference`, `prod -> product`, `quot -> quotient`, `cmp -> compare`

`money_diff` subtracts each of the values from left to right

`money_sum` sums all of the values together

`money_prod` multiplies all of the values together

`money_quot` divides all of the values together

`money_cmp` returns a comparison of the two money strings using `bccmp`

`money_tax_rate` calculates out the effective tax rate between a total and tax amount

`money_tax` calculates the tax amount from a total and tax rate
