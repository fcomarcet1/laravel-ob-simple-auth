<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserHistory extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'user_historic';

    protected $fillable = [
        'user_id',
        'action',
        'modified_by',
    ];

}
