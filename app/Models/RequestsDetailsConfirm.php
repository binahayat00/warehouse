<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestsDetailsConfirm extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'requests_detail_id',
        'confirm_id',
        'user_id',
        'confirmed',
    ];

    public function request(){
        return $this->belongsTo(Request::class,'id', 'requests_detail_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function confirm(){
        return $this->belongsTo(Confirm::class,'confirm_id','id');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Verta($value)->format('l d %B %Y H:i:s');
    }
}
