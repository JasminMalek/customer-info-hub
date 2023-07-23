<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'first_name', 'last_name', 'email',
        'gender', 'phone_number', 'birthday', 'address',
        'postcode', 'city'
    ];

    /**
     * @var array<int, string>
     */
    protected $casts = [
        'birthday' => 'datetime'
    ];

    const GENDER_UNSPECIFIED = 0;
    const GENDER_FEMALE = 1;
    const GENDER_MALE = 2;
    const GENDER_TYPE_ARRAY = [
        self::GENDER_UNSPECIFIED => 'Unspecified',
        self::GENDER_FEMALE => 'Female',
        self::GENDER_MALE => 'Male',
    ];
}
