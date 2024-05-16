<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

          // Users Permissions
          Permission::create(['name' => 'view users']);
          Permission::create(['name' => 'create users']);
          Permission::create(['name' => 'edit users']);
          Permission::create(['name' => 'delete users']);
          
  
          //  Role permisions
          Permission::create(['name' => 'view role']);
          Permission::create(['name' => 'create role']);
          Permission::create(['name' => 'edit role']);
          Permission::create(['name' => 'delete role']);
  
          // Tenants Permissions
          Permission::create(['name' => 'view tenants']);
          Permission::create(['name' => 'create tenants']);
          Permission::create(['name' => 'edit tenants']);
          Permission::create(['name' => 'delete tenants']);
  
          // Apartments Permissions
          Permission::create(['name' => 'view apartments']);
          Permission::create(['name' => 'create apartments']);
          Permission::create(['name' => 'edit apartments']);
          Permission::create(['name' => 'delete apartments']);
  
          // Categories Permissions
          Permission::create(['name' => 'view categories']);
          Permission::create(['name' => 'create categories']);
          Permission::create(['name' => 'edit categories']);
          Permission::create(['name' => 'delete categories']);
  
          // Flats Permissions
          Permission::create(['name' => 'view flats']);
          Permission::create(['name' => 'create flats']);
          Permission::create(['name' => 'edit flats']);
          Permission::create(['name' => 'delete flats']);
  
          // Payments Permissions
          Permission::create(['name' => 'view payments']);
          Permission::create(['name' => 'create payments']);
          Permission::create(['name' => 'edit payments']);
          Permission::create(['name' => 'delete payments']);
  
          // Rent Details Permissions
          Permission::create(['name' => 'view mpesa-transactions']);
          Permission::create(['name' => 'create mpesa-transactions']);
          Permission::create(['name' => 'edit mpesa-transactions']);
          Permission::create(['name' => 'delete mpesa-transactions']);
  
          // Rent Details Permissions
          Permission::create(['name' => 'view rent-details']);
          Permission::create(['name' => 'create rent-details']);
          Permission::create(['name' => 'edit rent-details']);
          Permission::create(['name' => 'delete rent-details']);

          // Rent Details Permissions
          Permission::create(['name' => 'view landlords']);
          Permission::create(['name' => 'create landlords']);
          Permission::create(['name' => 'edit landlords']);
          Permission::create(['name' => 'delete landlords']);
  
        
    }
}
