<?php

namespace Tests\Unit;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Runner\Filter\Factory as FilterFactory;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\Models\City;

class CityControllerTest extends TestCase
{

    public function testCreateCity()
    {
        \App\Models\City::create([
            'state_id' => "1",
            'city' => "Canidé"
        ]);
    }
}
