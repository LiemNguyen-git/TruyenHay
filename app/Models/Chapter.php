<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    public $timestamps= false; // tao thoi gian
    protected $fillable =[
        'truyen_id','tieude','slug', 'tomtat', 'noidung','trangthai'
    ];
    protected $primaryKey = 'id';
    protected $table='chapter';

    public function truyen(){
        return $this->belongsTo('App\Models\Truyen');
    }
}
