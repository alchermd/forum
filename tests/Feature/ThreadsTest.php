<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_browse_all_threads()
    {
        $threads = factory(\App\Thread::class, 3)->create();

        $result = $this->get('/threads');

        $threads->each(function ($thread) use ($result) {
            $result->assertSee($thread->title);
        });
    }

    /** @test */
    public function a_user_can_read_a_specific_thread()
    {
        $thread = factory(\App\Thread::class)->create();

        $response = $this->get('/threads/' . $thread->id);

        $response->assertSee($thread->title);
        $response->assertSee($thread->body);
    }
}
