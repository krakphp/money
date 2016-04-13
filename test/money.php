<?php

use function Krak\Money\money_sum,
    Krak\Money\money_cmp,
    Krak\Money\money_diff,
    Krak\Money\money_prod,
    Krak\Money\money_quot;

describe('Money', function() {
    describe('#money_sum', function() {
        it('takes operands and adds them', function() {
            assert(money_cmp('1.00', money_sum('.49', '.51')) === 0, "expected 1.00");
        });
    });
    describe('#money_diff', function() {
        it('takes operands and subtracts them', function() {
           assert(money_cmp('0.00', money_diff('1', '0.5', '0.5')) === 0); 
        });
    });
    describe('#money_prod', function() {
        it('takes operands and multiplies them', function() {
            assert(money_cmp('4', money_prod('2', '2', '1.0')) === 0);
        });
    });
    describe('#money_quot', function() {
        it('takes operands and divides them', function() {
            assert(money_cmp('1', money_quot('4', '2', '2') === 0));
        });
    });
});
