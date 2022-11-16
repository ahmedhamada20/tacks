<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Comment\Entities\Comment;
use Modules\Post\Entities\Post;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Schema::disableForeignKeyConstraints();
        DB::table('comments')->truncate();

        for ($i = 0, $ii = 20; $i < $ii; $i++) {
            Comment::create([
                'comment' => $faker->unique()->name(),
                'post_id' => Post::all()->random()->id,
                'user_id' => User::all()->random()->id,

            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
