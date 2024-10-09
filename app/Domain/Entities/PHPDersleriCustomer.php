<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class PHPDersleriCustomer extends Model
{
    protected $table = 'php_dersleri_customers';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'postal_code',
        'company',
        'position',
        'notes',
        'debt',
        'credit',
        'balance_debt',
        'balance_credit',
        'is_active',
    ];

    public function updateBalances()
    {
        $this->balance_debt = max(0, $this->debt - $this->credit);
        $this->balance_credit = max(0, $this->credit - $this->debt);
        $this->save();
    }
}
