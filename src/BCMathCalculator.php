<?php

namespace Krak\Money;

class BCMathCalculator extends AbstractCalculator
{
    private $precision;

    public function __construct($precision = 2) {
        $this->precision = $precision;
    }

    public function add($a, $b) {
        return bcadd($a, $b, $this->precision);
    }

    public function sub($a, $b) {
        return bcsub($a, $b, $this->precision);
    }

    public function mul($a, $b) {
        return bcmul($a, $b, $this->precision);
    }

    public function div($a, $b) {
        return bcdiv($a, $b, $this->precision);
    }

    public function cmp($a, $b) {
        return bccomp($a, $b, $this->precision);
    }
}
