<?php

namespace Backpack\Vercel;

use Backpack\Vercel\Facades\Banner;
use Backpack\Vercel\ServiceProvider;
use Orchestra\Testbench\TestCase;

class Page extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'banner' => Banner::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
