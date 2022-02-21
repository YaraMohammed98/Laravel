<?php

namespace Database\Factories;
use Carbon\Carbon;
use App\Models\User;
use App\Models\post;  //using the model which connected to database

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    protected $model = post::class;

    /**
     * Define the model's default state.
     
     * @return array
     */
    public function definition()
    {
        return [
            'title' => "Test title",
            'description' =>"Test description",
            'user_id' =>User::all()->random()->id,
            'created_at'=> Carbon::now()->toDateString()
        ];
    }
}
