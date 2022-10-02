<?php

namespace Tests\Support\Pages;

use Tests\Support\AcceptanceTester;

abstract class BasePage
{
    protected AcceptanceTester $I;

    public function __construct(AcceptanceTester $I)
    {
        $this->I = $I;
    }
}