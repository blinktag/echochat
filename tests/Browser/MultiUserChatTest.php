<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\CreatesApplication;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MultiUserChatTest extends DuskTestCase
{

    use CreatesApplication;
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user1 = factory(User::class)->create([
            'name' => 'John Doe'
        ]);
        $user2 = factory(User::class)->create([
            'name' => 'Mary Smith'
        ]);

        $this->browse(function ($first, $second) use ($user1, $user2) {
            $first->loginAs($user1)
                    ->visit('/chat')
                    ->waitFor('.chat-composer');

            $second->loginAs($user2)
                    ->visit('/chat')
                    ->waitFor('.chat-composer')
                    ->type('#message', 'Hey John!')
                    ->press('Send');

            $first->waitForText('Hey John!')
                    ->assertSee('Mary Smith');
        });
    }
}
