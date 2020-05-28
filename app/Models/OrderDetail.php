<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{

    use SoftDeletes, Uuid;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'amount',
        'status'
    ];
    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];
    protected $casts = ['id' => "string"];
    public $incrementing = false;

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
