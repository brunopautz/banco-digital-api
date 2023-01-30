<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_valid_account()
    {
        $response = $this->post('/api/account', [
            "account" => "00000-1"
        ]);

        $response->assertStatus(200);
    }

    public function test_return_datas_account()
    {
        $response = $this->get('/api/account/00000-1');

        $response->assertStatus(200);
    }

    public function test_desposit_account()
    {
        $response = $this->post('/api/account/00000-1/deposit', [
            "account" => "00000-1",
            "value" => 125.50
        ]);

        $response->assertStatus(200);
    }

    public function test_saque_account()
    {
        $response = $this->post('/api/account/00000-1/saque', [
            "account" => "00000-1",
            "value" => 100
        ]);

        $response->assertStatus(200);
    }
}
