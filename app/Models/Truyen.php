<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    public $timestamps= false; // tao thoi gian
    protected $fillable =[
        'tentruyen','slug', 'tomtat', 'hinhanh','danhmuc_id','trangthai','theloai_id','truyen_noibat'
    ];
    protected $primaryKey = 'id';
    protected $table='truyen';

    public function danhmuctruyen(){
        return $this->belongsTo('App\Models\Danhmuc','danhmuc_id','id'); //1 truyen thuoc 1 danh muc
    }

    public function chapter(){
        return $this->hasMany('App\Models\Chapter','truyen_id','id');
    }

    public function theloai(){
        return $this->belongsTo('App\Models\Theloai','theloai_id','id'); //1 truyen thuoc 1 danh muc
    }
}
