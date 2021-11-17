<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\App\Bank;

class BankAccount extends Model
{
    use HasFactory;

    public function bank(){
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
