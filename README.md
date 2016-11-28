# Money

Simple money manipulation library which uses bcmath to manipulate money values appropriately.

## Install

Install via composer at `krak/money`

## Usage

```php
<?php

use Krak\Money;

$calc = Money\calc($precision = 2);
$res = $calc->add('1.00', '2.00');
$res = $calc->mul($res, 2);
```

## API

### calc($precision = 2)

Returns a cached instance of the BCMathCalculator. Set the precision to higher if you need to do any multiplications or divisions
with the money that might require extra precision.

### preciseCalc()

Returns a cached instance of the FloatCalculator. Use this calculator if you have to do any intense money calculations like calculate compounding interest where you need a LOT of precision. Once done, you should then use the `money\f` to format the resulting money as proper money.

### f($money)

Format the money by rounding it to two decimal places.

### interface Calculator

```php
<?php

interface Calculator {
    public function add($a, $b);
    public function sub($a, $b);
    public function mul($a, $b);
    public function div($a, $b);
    public function cmp($a, $b);
}
```

These methods are fairly self explanatory, the `cmp` method will return 0 if `$a` and `$b` are equal, > 0 if `$a` is > `$b` and < 0 else.

### abstract class AbstractCalculator

```php
<?php

abstract class AbstractCalculator implements Calculator {
    public function sum(...$args);
    public function diff(...$args);
    public function quot(...$args);
    public function prod(...$args);
    public function max(...$args);
    public function min(...$args);

    abstract public function add($a, $b);
    abstract public function sub($a, $b);
    abstract public function mul($a, $b);
    abstract public function div($a, $b);
    abstract public function cmp($a, $b);
}
```

Any calculator should extend this class instead of directly implementing the `Calculator` interface so that it can have these extra methods.

Each method simply will find the sum, difference, quotient, product, max, or min of the set of args. They delegate the actual calculations to the abstract functions.

## Tests

```
make test
```
