<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInChatTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function unauthenticated_users_cannot_view_messages()
    {
        $this->withExceptionHandling()
             ->get('/chat', [])
             ->assertRedirect('/login');

        $this->withExceptionHandling()
             ->get('/messages', [])
             ->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_users_can_view_messages()
    {
        $this->signIn();

        $this->withExceptionHandling()
             ->get('/messages')
             ->assertStatus(200);
    }
    
    /** @test */
    public function unauthenticated_users_cannot_add_messages()
    {
        $this->withExceptionHandling()
             ->post('/messages', [])
             ->assertRedirect('/login');
    }

     /** @test */
     public function authenticated_users_can_add_messages()
     {
         $this->signIn();

         $message_text = 'Hello My name is Mr. Test';

         $this->withExceptionHandling()
              ->post('/messages', ['message' => $message_text])
              ->assertStatus(201);

        $this->assertDatabaseHas('messages', ['message' => $message_text]);
     }
}
