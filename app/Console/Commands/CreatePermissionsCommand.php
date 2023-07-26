<?php

namespace App\Console\Commands;

use App\Models\Manager;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'disbleer:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command for creating whole permissions related to DISBLEER system.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $permissionsConfig = config('permissions');
        $role = [];

        if (!Role::where([
            ['name', '=', 'Super Manager'],
            ['guard_name', '=', 'manager'],
        ])->exists()) {
            $role = Role::create([
                'name' => 'Super Manager',
                'guard_name' => 'manager',
            ]);
        } else {
            $role = Role::where([
                ['name', '=', 'Super Manager'],
                ['guard_name', '=', 'manager'],
            ])->first();

            $manager = Manager::where('email', 'disbleer@hophearts.com.ps')->first();
            $manager->assignRole($role);
        }

        foreach ($permissionsConfig as $guard => $permissions) {
            foreach ($permissions as $permission) {

                if (!Permission::where([
                    ['name', '=', $permission],
                    ['guard_name', '=', $guard],
                ])->exists()) {
                    $permission = Permission::create([
                        'name' => $permission,
                        'guard_name' => $guard,
                    ]);

                    if ($guard == 'manager')
                        $role->givePermissionTo($permission);
                }
            }
        }
    }
}
