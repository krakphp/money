<?php

namespace Krak\Money;

/** perform precise calculations for most money type calculations */
function calc($precision = 2) {
    static $cache;

    if (!$cache) {
        $cache = [];
    }
    if (!isset($cache[$precision])) {
        $cache[$precision] = new BCMathCalculator($precision);
    }

    return $cache[$precision];
}

/** if you're doing any calculations regarding interest, you'll need to use floating
    point to get proper results */
function preciseCalc() {
    static $calc;

    if (!$calc) {
        $calc = new FloatCalculator();
    }

    return $calc;
}

function f($money) {
    return round($money, 2);
}
