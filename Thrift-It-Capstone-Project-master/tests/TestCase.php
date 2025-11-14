<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\View;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    protected function setUp(): void
    {
        parent::setUp();
        
        // Disable middleware for all tests
        $this->withoutMiddleware();
        
        // Share an empty error bag with all views
        View::share('errors', new ViewErrorBag);
    }
}
