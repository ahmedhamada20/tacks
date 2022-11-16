<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Post\Entities\Post;
use Nwidart\Modules\Facades\Module;

class PostSeeder extends Seeder
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
        DB::table('posts')->truncate();

        for ($i = 1, $ii = 5; $i < $ii; $i++) {
            Post::create([
                'name' => $faker->name,
                'data' => Carbon::now(),
                'user_id' => User::all()->random()->id,
            ]);
        }


        for ($a = 1, $aa = 5; $a < $aa; $a++) {

            Photo::insert([
                'Filename'     => rand(1, 5) . ".jpg",
                'photoable_id' => $a,
                'photoable_type' => 'Modules\Post\Entities\Post'
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
