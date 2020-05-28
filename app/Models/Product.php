<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, Uuid;
    
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'category',
        'amount'
    ];
    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];
    protected $casts = ['id' => "string"];
    public $incrementing = false;
}
