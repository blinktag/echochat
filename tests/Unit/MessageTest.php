<?php

namespace Tests\Unit;

use App\Message;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MessageTest extends TestCase
{
    use DatabaseMigrations;

    protected $message;

    public function setUp()
    {
        parent::setUp();
        $this->message = new Message();
    }

    /** @test */
    public function message_belongs_to_user()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->message->user());
    }
}
