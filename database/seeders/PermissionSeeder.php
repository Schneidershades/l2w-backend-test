<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        $this->command->info('Default Permissions added.');

        // Confirm roles needed
        if ($this->command->confirm('Create Roles for user, default is admin and user? [y|N]', true)) {

            // Ask for roles from input
            $input_roles = $this->command->ask('Enter roles in comma separate format.', 'Admin,Student,Instructor');

            // Explode roles
            $roles_array = explode(',', $input_roles);

            // add roles
            foreach($roles_array as $role) {

                $role = Role::Create(['name' => trim($role)]);

                if( $role->name == 'Admin' ) {
                    $role->syncPermissions(Permission::all());
                    $this->command->info('Super Admin granted all the permissions');
                }

                if($role->name == 'Student'){
                    $role->givePermissionTo(['take_quiz']);
                    $this->command->info('Student granted permissions');
                }

                if($role->name == 'Instructor'){
                    $role->givePermissionTo(['show_quiz', 'edit_quiz', 'create_quiz', 'show_score']);
                    $this->command->info('Instructor granted permissions');
                }
                // create one user for each role
                $this->createUser($role);
            }

            $this->command->info('Roles ' . $input_roles . ' added successfully');

        } else {
            Role::firstOrCreate(['name' => 'User']);
            $this->command->info('Added only default user role.');
        }
    }
    private function createUser($role)
    {
        if( $role->name == 'Admin') {
            $user = User::Create([
                'first_name'                   => 'Schneider',
                'last_name'                     => 'Komolafe',
                'email'                         => 'buskoms@yahoo.com',
                'password'                      => 'password',
                'role'                          => $role->name,
            ]);
            $user->assignRole($role->name);
            $this->command->info('Here is your admin details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "password"');
        }
    }
}
