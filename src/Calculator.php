<?php

namespace Krak\Money;

interface Calculator
{
    public function add($a, $b);
    public function sub($a, $b);
    public function mul($a, $b);
    public function div($a, $b);
    public function cmp($a, $b);
}
