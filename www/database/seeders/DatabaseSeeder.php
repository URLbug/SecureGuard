<?php

namespace Database\Seeders;

use App\Enum\GroupPremission;
use App\Models\Group;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::query()->find(1);

        if($user) {
           $user->delete();
        }

        foreach(Group::all() as $group) {
            $group->delete();
        }

        $group = Group::query();

        $group->create([
            'title'      => 'admin',
            'permission' => GroupPremission::ADMIN,
        ]);

        $group->create([
            'title'      => 'moderator',
            'permission' => GroupPremission::MODERATOR,
        ]);

        $group->create([
            'title'      => 'user',
            'permission' => GroupPremission::USER,
        ]);

        User::factory()->create([
            'active'       => true,
            'username'     => 'admin',
            'password'     => 'admin',
            'groupId'      => 1,
        ]);
    }
}
