<?php

use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create();
        factory(App\Post::class, 1000)->create();
        factory(App\File::class, 5000)->create();
        factory(App\Comment::class, 10000)->create();
    }
}
