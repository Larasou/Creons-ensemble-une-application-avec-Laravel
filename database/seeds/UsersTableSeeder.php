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
        visits('App\Post')->reset();

        $user = factory('App\User', 25)->create();
        $category = factory('App\Category', 5)->create();
        
        $user->each(function ($user) {
            factory('App\Profile', 1)->create([
                'user_id' => $user->id,
            ]);
        });

        $user->each(function ($userID) use ($category, $user) {
            $posts = factory('App\Post', 10)->create([
                'user_id' => $userID->id,
                'category_id' => function () use ($category) {
                    return $category->random()->id;
                }
            ]);
            $posts->each(function ($post) use ($user) {
                factory('App\Comment', 10)->create([
                    'user_id' => function () use ($user) {
                        return $user->random()->id;
                    },
                    'commentable_id' => $post->id,
                    'commentable_type' => get_class($post),
                ]);

                $post->load('tagged')->tag(array_random([
                    'Voiture', 'Maman', 'Papa', 'Vélo', 'Voiture', 'Nuage', 'Ordinateur', 'Cloud'
                ], 3));
            });

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
