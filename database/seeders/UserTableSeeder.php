<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
       $users = [
           [
               'name'      => 'admin',
               'email'     => 'admin@admin.com',
               'password'  => bcrypt('password')
           ]
       ];
       foreach($users as $user) {
           User::create($user);
       }
    }
}
