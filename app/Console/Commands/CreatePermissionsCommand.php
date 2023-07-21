<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

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
        foreach ($permissionsConfig as $guard => $permissions) {
            foreach ($permissions as $permission) {

                if (!Permission::where([
                    ['name', '=', $permission],
                    ['guard_name', '=', $guard],
                ])->exists()) {
                    Permission::create([
                        'name' => $permission,
                        'guard_name' => $guard,
                    ]);
                }
            }
        }
    }
}
