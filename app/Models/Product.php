<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'Attributes',
        'worn',
        'descriptions',
        'file_id',
        'category_id',
        'rayvarz_id',
        'technical_index_id'
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'Attributes' => 'json',
    ];

    public function request_detail(){
        return $this->belongsTo(RequestDetail::class,'product_id','id');
    }
}
