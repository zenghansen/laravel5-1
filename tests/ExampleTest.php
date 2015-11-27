<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use Illuminate\Support\Facades\Cache;


class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/login')
             ->see('Remember me');
    }
    public function testRedis(){
        $response = $this->call('GET', '/redis', ['name' => 'Taylor']);
        var_dump($response);
    }

}
