<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{

    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/api/documentation')
                ->click('#operations-Products-get_api_products')
                ->press('Try it out')
                ->press('Execute')
                ->assertSee(200);
        });
    }

}
