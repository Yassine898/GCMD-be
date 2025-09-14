<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;
    protected $fillable = ['first_name','last_name','email','money_paid_monthly'];

    public function wallet(){
        return $this->hasOne(Wallet::class);
        }

    public function paids(){
        return $this->hasMany(Payement::class);
    }
}
