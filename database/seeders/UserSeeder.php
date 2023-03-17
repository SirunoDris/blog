<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'=> "admin",
            'email'=> "admin@admin.com",
            'password'=> Hash::make('123456789'),
            'role_id'=> '1',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        User::factory(20)->create();
    }
}
