<?php

namespace Tests\Feature;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyFirstTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_index_news_status_success()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function test_admin_index_categories_status_success()
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

    public function test_index_feedback_status_success()
    {
        $response = $this->get(route('feedback.index'));

        $response->assertStatus(200);
    }

    public function test_created_feedback_status_success()
    {
        $data = [
            'email' => 'someEmail',
            'feedback' => 'someFeedback'
        ];
        $response = $this->post(route('feedback.store'), $data);
        $response->assertJson($data)
                 ->assertCreated();
    }

    public function test_created_order_status_success()
    {
        $data = [
            'name' => 'someName',
            'phone' => 'somePhone',
            'email' => 'someEmail',
            'discription' => 'someDiscription'
        ];
        $response = $this->post(route('order.store'), $data);
        $response->assertCreated()
                 ->assertViewIs('order.success');
    }
}
