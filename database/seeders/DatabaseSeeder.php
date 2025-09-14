<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Payement;
use App\Models\Wallet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);
        Admin::create([
            'user_id' => $user->id,
        ]);

        $members= Member::factory(3)->create(['email'=>'yassinealilti18@gmail.com'])->each(function ($member){
            Wallet::create([
                'balance'=>0,
                'member_id'=>$member->id
            ]);
            Payement::factory(5)->create([
                'member_id'=>$member->id
            ]);
        });
    }
}
