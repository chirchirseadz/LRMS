<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('c2b_payments')->insert([
            [
                'tenants_id' => 1,
                'TransactionType' => 'PayBill',
                'TransID' => 'ABC123456',
                'TransTime' => '20210520123045',
                'TransAmount' => '1000.00',
                'BusinessShortCode' => '123456',
                'BillRefNumber' => 'INV001',
                'InvoiceNumber' => 'INV12345',
                'OrgAccountBalance' => '5000.00',
                'ThirdPartyTransID' => 'XYZ789',
                'MSISDN' => '254700123456',
                'FirstName' => 'John',
                'MiddleName' => 'Doe',
                'LastName' => 'Smith',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries as needed
        ]);
    }
}
