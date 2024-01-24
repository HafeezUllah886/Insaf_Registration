<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class permissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'View Users']);
        Permission::create(['name' => 'Add User']);
        Permission::create(['name' => 'Edit User']);
        Permission::create(['name' => 'Change Others Password']);
        Permission::create(['name' => 'View Admin Account']);
        Permission::create(['name' => 'Assign Permissions To User']);
        Permission::create(['name' => 'Add Role']);
        Permission::create(['name' => 'View Roles']);
        Permission::create(['name' => 'Edit Role']);
        Permission::create(['name' => 'Delete Role']);
        Permission::create(['name' => 'Assign Role To User']);
        Permission::create(['name' => 'View Activity Logs']);
        Permission::create(['name' => 'View Purchase History']);
        Permission::create(['name' => 'Create Purchase']);
        Permission::create(['name' => 'Edit Purchase']);
        Permission::create(['name' => 'Delete Purchase Items']);
        Permission::create(['name' => 'View Sale History']);
        Permission::create(['name' => 'Create Sale']);
        Permission::create(['name' => 'Edit Sale']);
        Permission::create(['name' => 'Delete Sale Items']);
        Permission::create(['name' => 'View Warehouses']);
        Permission::create(['name' => 'Add Warehouse']);
        Permission::create(['name' => 'Edit Warehouse']);
        Permission::create(['name' => 'View Products']);
        Permission::create(['name' => 'Add Product']);
        Permission::create(['name' => 'Edit Product']);
        Permission::create(['name' => 'Delete Product']);
        Permission::create(['name' => 'View Accounts']);
        Permission::create(['name' => 'Add Account']);
        Permission::create(['name' => 'Edit Account']);
        Permission::create(['name' => 'View Accounts Statements']);
        Permission::create(['name' => 'View Deposits']);
        Permission::create(['name' => 'Add Deposit']);
        Permission::create(['name' => 'Delete Deposit']);
        Permission::create(['name' => 'View Withdraws']);
        Permission::create(['name' => 'Add Withdraw']);
        Permission::create(['name' => 'Delete Withdraw']);
        Permission::create(['name' => 'View Transfers']);
        Permission::create(['name' => 'Create Transfer']);
        Permission::create(['name' => 'Delete Transfer']);
        Permission::create(['name' => 'View Expenses']);
        Permission::create(['name' => 'Create Expense']);
        Permission::create(['name' => 'Delete Expense']);
        Permission::create(['name' => 'Change Basic Settings']);
        Permission::create(['name' => 'Change Profile Settings']);
        Permission::create(['name' => 'Change Own Password']);
        Permission::create(['name' => 'View Dashboard Monthly Expense']);
        Permission::create(['name' => 'View Dashboard Customer Dues']);
        Permission::create(['name' => 'View Dashboard Supplier Dues']);
        Permission::create(['name' => 'View Dashboard Monthly Sale']);
        Permission::create(['name' => 'View Dashboard Total Sale']);
        Permission::create(['name' => 'View Dashboard Total Bank']);
        Permission::create(['name' => 'View Dashboard Income & Expense']);
        Permission::create(['name' => 'View Dashboard Top Selling']);
        Permission::create(['name' => 'View Dashboard Transactions']);

        $role = Role::findByName('Admin');
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
    }
}
