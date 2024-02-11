<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_number',
        'amount',
        'bank_name',
        'comments',
        'image',
        'status',
        'user_id',
        'has_send',
        'type'
    ];
    public function user(){
        return $this->hasOne(User::class,'id', 'user_id');
    }
}
