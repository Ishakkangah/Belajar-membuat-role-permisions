<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { 
       return   [
                'name' => $this->faker->name(),
                'email' => $this->faker->unique()->safeEmail(),
                'orang_tua_wali_id' => rand(1,2),
                'thumbnail' => 'profile.png',
                'alamat_id' => rand(1,2),
                'program_id' => rand(1,3),
                'angkatan_id' => rand(1,3),
                'asal_sekolah_id' => rand(1,2),
                'mahasiswa_asing_id' => rand(1,2),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ];
        }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
