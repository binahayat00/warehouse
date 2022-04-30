<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDetail extends Model
{
    use HasFactory;
    
    protected $table = 'requests_details';
    protected $fillable = [
        'request_id',
        'product_id',
        'status_id',
        'file_id',
        'delivery_id',
        'warehouses_id',
        'location',
        'worn_amount',
        'amount',
        'worn',
        'confirmed',
        'descriptions',
    ];
    
    public function request(){
        return $this->belongsTo(Request::class);
    }

    public function product(){
        return $this->hasOne(Product::class,'id', 'product_id');
    }
    
    public function status(){
        return $this->hasOne(Status::class,'id','status_id');
    }

    public function file(){
        return $this->hasMany(File::class,'id','file_id');
    }

    public function delivery(){
        return $this->hasMany(Delivery::class,'id','delivery_id');
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class,'warehouses_id','id');
    }

    public function request_detail_confirm(){
        return $this->hasMany(RequestsDetailsConfirm::class,'requests_detail_id', 'id');
    }
    
    public function getUpdatedAtAttribute($value)
    {
        return Verta($value)->format('l d %B %Y H:i:s');
    }
}
