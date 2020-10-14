<?php

namespace Database\Factories;

use App\Models\DailyTimesheet;
use App\Models\User;
use App\Models\Projects;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

class DailyTimesheetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DailyTimesheet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            // 'projects_id' => Projects::factory(),
            // 'user_id' => User::factory(),
            'date' => $this->faker->date,
            'hours' => $this->faker->numberBetween($min = 1, $max = 24),
            'notes'=> $this->faker->text($maxNbChars = 10),
        ];
    }
}
