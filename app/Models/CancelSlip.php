<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelSlip extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'passport_no',
        'gcc_slip_no',
        'comments',
        'user_id',
        'has_send',
    ];
    public function user(){
        return $this->hasOne(User::class,'id', 'user_id');
    }
}
