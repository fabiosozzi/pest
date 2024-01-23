<?php

describe('ARCH', function () {
    it('verify that dd() and dump() is not used in code', function () {
        $this->expect(['dd', 'dump'])
            ->not
            ->toBeUsed();
    });

    it('verify that env() is not used in code', function () {
        $this->expect(['env'])
            ->not
            ->toBeUsed();
    });
});
