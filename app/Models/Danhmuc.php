<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;
    public $timestamps= false; // tao thoi gian
    protected $fillable =[
        'tendanhmuc','slug_DM', 'mota', 'trangthai'
    ];
    protected $primaryKey = 'id';
    protected $table='danhmuc';

    public function truyen(){
        return $this->hasMany('App\Models\Truyen');//1 danhmuc thi co nhieu chuyen
    }
}
