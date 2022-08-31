<?php

namespace Tests\Feature;

use App\Services\Tenders\TendersService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TendersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tenders_get()
    {
        $response = $this->get('/api/tenders/get');

        $response->assertStatus(200);
    }

    public function test_tenders_list()
    {
        $response = $this->get('/api/tenders/list');

        $response->assertStatus(200);
    }

    public function test_tenders_post()
    {
        $response = $this->post('/api/tenders/create', [
            'id'=>123456,
            'number'=>123456,
            'status'=>'Закрыто',
            'name'=>'test',
        ]);

        $response->assertStatus(200);
    }
}
