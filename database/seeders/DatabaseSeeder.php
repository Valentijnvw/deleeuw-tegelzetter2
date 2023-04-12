<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
Use \Carbon\Carbon;

use App\Models\User;
use App\Models\Opdracht;
use App\Models\MoneybirdContact;

use App\Services\MoneybirdContactService;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $aannemerRole = Role::firstOrCreate(['name' => 'Aannemer']);
        $plannerRole = Role::firstOrCreate(['name' => 'Planner']);
        $klantRole = Role::firstOrCreate(['name' => 'Klant']);
        // Role::firstOrCreate(['name' => 'klant']);

        // Create test users
        $admin = User::factory()->create([
            'email' => 'admin@gmail.com',
        ]);
        $admin->assignRole($adminRole);

        $aannemer = User::factory()->create([
            'email' => 'aannemer@gmail.com'
        ]);
        $aannemer->assignRole($aannemerRole);

        $planner = User::factory()->create([
            'email' => 'planner@gmail.com',
        ]);
        $planner->assignRole($plannerRole);

        $klant = User::factory()->create([
            'email' => 'valentijnvanwinden@gmail.com',
        ]);
        $klant->assignRole($klantRole);

        Opdracht::factory()->count(3)->create([
            'klant_moneybird_id' => '376587614757586698',
        ]);

        function assignNewPermissions(Role $role, Array $names) {
            foreach($names as $name) {
                $permission = Permission::firstOrCreate([
                    'name' => $name
                ]);
                $role->givePermissionTo($permission);
            }
        }
        // assignNewPermissions($planner, [
        //     "opdrachten.*",
        //     ""
        // ]);

        // Permission::insert($permissions->toArray());

        // Store the contact in moneybird_contacts
        $contact = new MoneybirdContactService(376587614757586698);
        $contact->insertOrUpdateContact();

        
    }
}
