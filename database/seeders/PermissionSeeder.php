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

           // Roles Permissions
          Permission::create(['name' => 'view roles']);
          Permission::create(['name' => 'create roles']);
          Permission::create(['name' => 'edit roles']);
          Permission::create(['name' => 'delete roles']);
          
           // bioData Permissions
          Permission::create(['name' => 'view bioData']);
          Permission::create(['name' => 'create bioData']);
          Permission::create(['name' => 'edit bioData']);
          Permission::create(['name' => 'delete bioData']);
          
           // opdCash Permissions
          Permission::create(['name' => 'view opdCash']);
          Permission::create(['name' => 'create opdCash']);
          Permission::create(['name' => 'edit opdCash']);
          Permission::create(['name' => 'delete opdCash']);

           // opdCorporate Permissions
          Permission::create(['name' => 'view opdCorporate']);
          Permission::create(['name' => 'create opdCorporate']);
          Permission::create(['name' => 'edit opdCorporate']);
          Permission::create(['name' => 'delete opdCorporate']);
          
           // opdCopay Permissions
          Permission::create(['name' => 'view opdCopay']);
          Permission::create(['name' => 'create opdCopay']);
          Permission::create(['name' => 'edit opdCopay']);
          Permission::create(['name' => 'delete opdCopay']);
          
           // selfRequest Permissions
          Permission::create(['name' => 'view selfRequest']);
          Permission::create(['name' => 'create selfRequest']);
          Permission::create(['name' => 'edit selfRequest']);
          Permission::create(['name' => 'delete selfRequest']);
          
           // vitals Permissions
          Permission::create(['name' => 'view vitals']);
          Permission::create(['name' => 'create vitals']);
          Permission::create(['name' => 'edit vitals']);
          Permission::create(['name' => 'delete vitals']);
          
           // hypertension Permissions
          Permission::create(['name' => 'view hypertension']);
          Permission::create(['name' => 'create hypertension']);
          Permission::create(['name' => 'edit hypertension']);
          Permission::create(['name' => 'delete hypertension']);
          
           // opdDischarge Permissions
          Permission::create(['name' => 'view opdDischarge']);
          Permission::create(['name' => 'create opdDischarge']);
          Permission::create(['name' => 'edit opdDischarge']);
          Permission::create(['name' => 'delete opdDischarge']);
          
           // receipts Permissions
          Permission::create(['name' => 'view receipts']);
          Permission::create(['name' => 'create receipts']);
          Permission::create(['name' => 'edit receipts']);
          Permission::create(['name' => 'delete receipts']);
          
           // invoice Permissions
          Permission::create(['name' => 'view invoice']);
          Permission::create(['name' => 'create invoice']);
          Permission::create(['name' => 'edit invoice']);
          Permission::create(['name' => 'delete invoice']);

           // otherIncome Permissions
          Permission::create(['name' => 'view otherIncome']);
          Permission::create(['name' => 'create otherIncome']);
          Permission::create(['name' => 'edit otherIncome']);
          Permission::create(['name' => 'delete otherIncome']);
          
           // otherIncome Permissions
          Permission::create(['name' => 'view otherIncome']);
          Permission::create(['name' => 'create otherIncome']);
          Permission::create(['name' => 'edit otherIncome']);
          Permission::create(['name' => 'delete otherIncome']);
          
  
         
  
        
    }
}
