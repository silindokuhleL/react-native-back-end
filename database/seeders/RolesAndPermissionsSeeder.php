<?php

namespace Database\Seeders;

use App\PermissionEnum;
use App\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach (PermissionEnum::cases() as $permission) {
            Permission::create(['name' => $permission->value]);
        }

        $adminRole = Role::create(['name' => RoleEnum::ADMIN->value]);
        $adminRole->givePermissionTo(PermissionEnum::cases());

        $salonOwnerRole = Role::create(['name' => RoleEnum::SALON_OWNER->value]);
        $salonOwnerRole->givePermissionTo([
            PermissionEnum::VIEW_FINANCIAL_REPORTS->value,
            PermissionEnum::MANAGE_APPOINTMENTS->value,
        ]);

        $receptionistRole = Role::create(['name' => RoleEnum::RECEPTIONIST->value]);
        $receptionistRole->givePermissionTo([
            PermissionEnum::SCHEDULE_APPOINTMENTS->value,
            PermissionEnum::PROCESS_PAYMENTS->value,
        ]);

        $stylistRole = Role::create(['name' => RoleEnum::STYLIST->value]);
        $stylistRole->givePermissionTo([
            PermissionEnum::VIEW_OWN_SCHEDULE->value,
            PermissionEnum::UPDATE_SERVICE_STATUS->value,
        ]);

        $inventoryManagerRole = Role::create(['name' => RoleEnum::INVENTORY_MANAGER->value]);
        $inventoryManagerRole->givePermissionTo([
            PermissionEnum::MANAGE_INVENTORY->value,
        ]);

        $marketingManagerRole = Role::create(['name' => RoleEnum::MARKETING_MANAGER->value]);
        $marketingManagerRole->givePermissionTo([
            PermissionEnum::MANAGE_PROMOTIONS->value,
            PermissionEnum::SEND_MARKETING_CAMPAIGNS->value,
        ]);

        $accountantRole = Role::create(['name' => RoleEnum::ACCOUNTANT->value]);
        $accountantRole->givePermissionTo([
            PermissionEnum::MANAGE_PAYROLL->value,
            PermissionEnum::VIEW_FINANCIAL_DATA->value,
        ]);

        $customerRole = Role::create(['name' => RoleEnum::CUSTOMER->value]);
        $customerRole->givePermissionTo([
            PermissionEnum::BOOK_APPOINTMENTS->value,
            PermissionEnum::VIEW_OWN_HISTORY->value,
        ]);
    }
}
