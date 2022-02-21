<?php

namespace Database\Seeders;
use Carbon\Carbon;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\post;  //using the model which connected to database

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        post::factory()
            ->count(500)
            ->create();
    }

        // for($i=0;$i <= 500 ;$i++)
        //    {
        //     post::create([
        //     'title' => "Test title",
        //     'description' =>"Test description",
        //     'user_id' =>User::all()->random()->id,
        //     'created_at'=> Carbon::now()->toDateString()
        //    ]);

      // }
    }

