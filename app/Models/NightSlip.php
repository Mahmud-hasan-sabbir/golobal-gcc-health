<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NightSlip extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'passport_no',
        'gender',
        'birth_date',
        'passport_issue_date',
        'passport_expiry_date',
        'passport_issue_place',
        'traveling_to',
        'visa_type',
        'traveling_from',
        'marital_status',
        'nationality',
        'position_applied',
        'city_from',
        'nid',
        'comments',
        'user_id',
        'has_send',
    ];
    public function user(){
        return $this->hasOne(User::class,'id', 'user_id');
    }
    public function jobPost(){
        return $this->hasOne(Job::class,'id', 'position_applied');
    }
}
