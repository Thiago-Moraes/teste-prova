<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

    use SoftDeletes, Uuid;

    protected $fillable = [
        'name',
        'phone',
        'cell_phone'
    ];
    protected $dates = ['deleted_at'];
    protected $casts = ['id' => "string", "is_active" => "boolean"];
    public $incrementing = false;

    public function order()
    {
        return $this->belongsMany(Order::class);
    }
}
