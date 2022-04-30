<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'status_id',
        'unit_id',
        'confirmed',
        'descriptions',
        'date',
    ];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function request_detail(){
        return $this->hasMany(RequestDetail::class);
    }

    public function request_confirm(){
        return $this->hasMany(RequestsConfirm::class,'request_id', 'id');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Verta($value)->format('l d %B %Y H:i:s');
    }
}
