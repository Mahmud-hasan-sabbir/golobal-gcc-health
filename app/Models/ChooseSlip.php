<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChooseSlip extends Model 
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
        'hospital_ids',
        'city_from',
        'nid',
        'comments',
        'user_id',
        'has_send',
    ];
}
