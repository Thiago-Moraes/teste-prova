<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, Uuid;

    protected $fillable = [
        'status',
        'client_id'
    ];
    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];
    protected $casts = ['id' => "string"];
    public $incrementing = false;

    public function detail()
    {
        return $this->belongsToMany(OrderDetail::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
