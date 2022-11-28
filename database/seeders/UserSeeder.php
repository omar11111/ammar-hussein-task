<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=User::factory(10)->create();
        for ($i=0; $i < $users->count(); $i++) {
            Post::create([
                'title' =>Str::random(10),
                'text'  =>Str::random(20),
                'user_id'=> $users[$i]->id

            ]);
        }
    }
}
