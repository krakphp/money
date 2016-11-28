<?php

use Krak\Money;

function describeCalculator(Money\Calculator $calc, $name) {
    describe($name, function() use ($calc) {
        beforeEach(function() use ($calc) {
            $this->calc = $calc;
        });
        describe('->add', function() {
            it('adds the arguments', function() {
                assert(money\f($this->calc->add(1.00, 2.00)) == 3.00);
            });
        });
        describe('->sub', function() {
            it('subtracts the arguments', function() {
                assert(money\f($this->calc->sub(2.00, 1.00)) == 1.00);
            });
        });
        describe('->mul', function() {
            it('multiplies the arguments', function() {
                assert(money\f($this->calc->mul(2.00, 2.00)) == 4.00);
            });
        });
        describe('->div', function() {
            it('divides the arguments', function() {
                assert(money\f($this->calc->div(2.00, 2.00)) == 1.00);
            });
        });
        describe('->cmp', function() {
            it('compares the arguments like strcmp', function() {
                assert($this->calc->cmp(2.00, 1.00) > 0);
            });
        });
    });
}

describe('Money', function() {
    describe('#calc', function() {
        it('returns a cache calc instance based on precision', function() {
            assert(money\calc() === money\calc() && money\calc() !== money\calc(1));
        });
    });
    describe('#preciseCalc', function() {
        it('returns a cached instance of the FloatCalculator', function() {
            assert(money\preciseCalc() === money\preciseCalc() && money\preciseCalc() instanceof Money\FloatCalculator);
        });
    });
    describe('#f', function() {
        it('formats money by rounding it to two decimal places', function() {
            assert(money\f(12.015) === 12.02);
        });
    });
    describeCalculator(new Money\BCMathCalculator(), 'BCMathCalculator');
    describeCalculator(new Money\FloatCalculator(), 'FloatCalculator');
    describe('AbstractCalculator', function() {
        beforeEach(function() {
            $this->calc = new Money\BCMathCalculator();
        });
        describe('->sum', function() {
            it('calculates the sum from set of values', function() {
                assert(money\f($this->calc->sum(1,2,3)) == 6.00);
            });
        });
        describe('->diff', function() {
            it('calculates the difference from set of values', function() {
                assert(money\f($this->calc->diff(6, 3, 2)) == 1.00);
            });
        });
        describe('->quot', function() {
            it('calculates the quotient from set of values', function() {
                assert(money\f($this->calc->quot(6, 2, 2)) == 1.50);
            });
        });
        describe('->prod', function() {
            it('calculates the product from set of values', function() {
                assert(money\f($this->calc->prod(6, 2, 2)) == 24.00);
            });
        });
        describe('->max', function() {
            it('calculates the max from set of values', function() {
                assert(money\f($this->calc->max(2, 5, 3)) == 5.00);
            });
        });
        describe('->min', function() {
            it('calculates the min from set of values', function() {
                assert(money\f($this->calc->min(4, 2, 3)) == 2.00);
            });
        });
    });
});
