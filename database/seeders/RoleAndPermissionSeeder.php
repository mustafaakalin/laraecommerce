<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions



        Permission::create(['name'=> 'viewAny-user']);
        Permission::create(['name'=> 'view-user']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name'=> 'restore-user']);
        Permission::create(['name'=> 'forceDelete-user']);


        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
        Role::create(['name' => 'user'])->givePermissionTo(['viewAny-user','view-user','update-user']);




        // create demo users
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'Ved Prakash',
            'email' => 'ved@gmail.com',
        ])->assignRole('user');
    }
}
