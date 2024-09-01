<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('123456789')
        ]);

        Role::create(['name' => 'admin']);

        Permission::create(['name' => 'any']);

        $role = Role::findByName('admin');

        $permission = Permission::findByName('any');

        $role->givePermissionTo($permission);

        $user = User::find(1);
        $user->assignRole('admin');


        $this->call([
            CategorySeeder::class,
            ProductSeeder::class
        ]);
    }
}
