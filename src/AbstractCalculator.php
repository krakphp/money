<?php

namespace Krak\Money;

abstract class AbstractCalculator implements Calculator
{
    public function sum(...$args) {
        return array_reduce($args, function($acc, $val) {
            if ($acc === null) {
                return $val;
            }

            return $this->add($acc, $val);
        });
    }
    public function diff(...$args) {
        return array_reduce($args, function($acc, $val) {
            if ($acc === null) {
                return $val;
            }

            return $this->sub($acc, $val);
        });
    }
    public function quot(...$args) {
        return array_reduce($args, function($acc, $val) {
            if ($acc === null) {
                return $val;
            }

            return $this->div($acc, $val);
        });
    }
    public function prod(...$args) {
        return array_reduce($args, function($acc, $val) {
            if ($acc === null) {
                return $val;
            }

            return $this->mul($acc, $val);
        });
    }
    public function max(...$args) {
        return array_reduce($args, function($acc, $val) {
            if ($acc === null) {
                return $val;
            }

            return $this->cmp($acc, $val) > 0 ? $acc : $val;
        });
    }
    public function min(...$args) {
        return array_reduce($args, function($acc, $val) {
            if ($acc === null) {
                return $val;
            }

            return $this->cmp($acc, $val) < 0 ? $acc : $val;
        });
    }
    /** returns true if $a < $b */
    public function lt($a, $b) {
        return $this->cmp($a, $b) < 0;
    }
    /** returns true if $a <= $b */
    public function lte($a, $b) {
        return $this->cmp($a, $b) <= 0;
    }
    /** returns true if $a > $b */
    public function gt($a, $b) {
        return $this->cmp($a, $b) > 0;
    }
    /** returns true if $a >= $b */
    public function gte($a, $b) {
        return $this->cmp($a, $b) >= 0;
    }
    /** returns true if $a == $b */
    public function eq($a, $b) {
        return $this->cmp($a, $b) == 0;
    }
    /** returns true if $a != $b */
    public function neq($a, $b) {
        return $this->cmp($a, $b) != 0;
    }

    abstract public function add($a, $b);
    abstract public function sub($a, $b);
    abstract public function mul($a, $b);
    abstract public function div($a, $b);
    abstract public function cmp($a, $b);
}
