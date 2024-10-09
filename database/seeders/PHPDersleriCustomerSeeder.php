<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Entities\PHPDersleriCustomer;

class PHPDersleriCustomerSeeder extends Seeder
{
    public function run(): void
    {
        PHPDersleriCustomer::create([
            'first_name' => 'Ali',
            'last_name' => 'Veli',
            'email' => 'ali@example.com',
            'phone' => '1234567890',
            'address' => 'Adres 1',
            'city' => 'İstanbul',
            'country' => 'Türkiye',
            'postal_code' => '34000',
            'company' => 'ABC Ltd.',
            'position' => 'Yönetici',
            'notes' => 'Önemli müşteri',
            'debt' => 1000,
            'credit' => 500,
            'balance_debt' => 500,
            'balance_credit' => 0,
            'is_active' => true,
        ]);
    }
}
