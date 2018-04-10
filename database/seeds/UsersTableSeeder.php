<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory('App\User', 25)->create();
        $category = factory('App\Category', 5)->create();
        
        $user->each(function ($user) use ($category) {
            factory('App\Profile', 1)->create([
                'user_id' => $user->id,
            ]);
        });

        $user->each(function ($user) use ($category) {
            factory('App\Post', 10)->create([
                'user_id' => $user->id,
                'category_id' => function () use ($category) {
                    return $category->random()->id;
                }
            ]);
        });

        $user->each(function ($user) use ($category) {
            factory('App\Tutorial', 10)->create([
                'user_id' => $user->id,
                'category_id' => function () use ($category) {
                    return $category->random()->id;
                }
            ]);
        });
    }
}
