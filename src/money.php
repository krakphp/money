<?php

namespace Krak\Money;

use iter;

function _head($data) {
    foreach ($data as $val) {
        return $val;
    }
}

function money_op($bc, ...$args) {
    $val = iter\reduce(function($acc, $val) use ($bc) {
        return $bc($acc, $val, 4);
    }, iter\slice($args, 1), _head($args));

    return round($val, 2);
}

function money_cmp($m1, $m2) {
    return bccomp($m1, $m2, 2);
}
function money_sum(...$args) {
    return money_op('bcadd', ...$args);
}
function money_diff(...$args) {
    return money_op('bcsub', ...$args);
}
function money_prod(...$args) {
    return money_op('bcmul', ...$args);
}
/* money_quotient */
function money_quot(...$args) {
    return money_op('bcdiv', ...$args);
}

/** calculate the tax rate from tax and the total */
function money_tax_rate($total, $tax) {
    return round(bcdiv($tax, $total, 6), 4);
}

/** calculate the tax from the total and rate */
function money_tax($total, $rate) {
   return round(money_prod($total, $rate), 2); 
}
