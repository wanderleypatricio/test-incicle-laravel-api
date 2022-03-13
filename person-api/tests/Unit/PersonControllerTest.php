<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PersonControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_list_all_persons()
    {
        $response = $this->get('/api/person');

        $response->assertStatus(200);
    }

    public function test_making_an_api_request()
    {
        $response = $this->json(
            'POST',
            '/person',
            [
                'name' => 'teste nome',
                'cpf' => '645745778',
                'state' => 'CE',
                'city' => 'Aracati'
            ]
        );

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
    }
}
