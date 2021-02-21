<?php

namespace Wilsenhc\RifValidation\Tests\Rules;

use Orchestra\Testbench\TestCase;

use Wilsenhc\RifValidation\Rules\Rif;
use Wilsenhc\RifValidation\RifValidationServiceProvider;

class RifTest extends TestCase
{
    /**
     * @var  \Wilsenhc\RifValidation\Rules\Rif  $rule
     */
    protected $rule;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->rule = new Rif();
    }

    protected function getPackageProviders($app)
    {
        return [
            RifValidationServiceProvider::class,
        ];
    }

    /** @test */
    public function it_will_return_true_if_rif_is_valid()
    {
        // Valid RIF of "Universidad de Carabobo"
        $rif = 'G-20000041-4';

        $this->assertTrue($this->rule->passes('rif', $rif));

        // Valid RIF of "Banesco Banco Universal"
        $rif = 'J-07013380-5';

        $this->assertTrue($this->rule->passes('rif', $rif));

        // Valid RIF of "Nicolas Maduro Moros"
        $rif = 'V-05892464-0';

        $this->assertTrue($this->rule->passes('rif', $rif));
    }
    }
}