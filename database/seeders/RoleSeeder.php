<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']); 
        Permission::create(['name' => 'admin.web.inicio'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.web.quienes'])->assignRole($role1);
        Permission::create(['name' => 'admin.web.nosotros'])->assignRole($role2);

        User::create([
                'name' => 'Martin Trujillo',
                'email' => 'martin.trujillo@uni.pe',
                'password' => bcrypt('12345678')
            ])
            ->assignRole('Admin');

        User::create([
                'name' => 'Luis Salazar',
                'email' => 'luis.salazar@uni.pe',
                'password' => bcrypt('12345678')
            ])
            ->assignRole('User');

    }
}
