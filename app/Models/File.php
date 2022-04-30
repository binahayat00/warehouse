<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'filesCategory_id',
        'name',
        'url',
        'file',
        'user_id',
        'description',
    ];

    public function request_detail(){
        $this->belongsTo(RequestDetail::class);
    }
    
}
