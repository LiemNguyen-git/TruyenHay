<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theloai;
use Carbon\Carbon;
class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloai = Theloai::orderBy('id','DESC')->get();
        return view('Admin.TheLoai.index')->with(compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.TheLoai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = $request->validate(
            [
                'tentheloai' => 'required|unique:theloai|max:255',
                'slug' => 'required|unique:theloai|max:255',
                'tukhoa' => 'required|max:255',
                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                'mota' => 'required|max:255',
                'trangthai' => 'required',
            ],
            [
                'slug.unique' => 'Tên thể loại đã có ,xin điền tên khác',
                'tentheloai.unique' => 'Slug thể loại đã có ,xin điền slug khác',
                'tentheloai.required' => 'Tên thể loại phải có nhé',
                'tukhoa.required' => 'Từ khóa phải có nhé',
                'hinhanh.required' => 'Hình ảnh phải có nhé',
                'mota.required' => 'Mô tả thể loại phải có nhé',
            ]
        );
        // $data = $request->all();
        // dd($data);
        $theloai = new Theloai();
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->tukhoa = $data['tukhoa'];
        $theloai->slug = $data['slug'];
        $theloai->mota = $data['mota'];
        $theloai->trangthai = $data['trangthai'];
        $theloai->created_at = Carbon::now('Asia/Ho_Chi_Minh');
         //them anh vao folder hinh188.jpg
        $get_image = $request->hinhanh;
        $path = 'public/uploads/theloai/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $theloai->hinhanh = $new_image;


        $theloai->save();

        return redirect()->back()->with('status','Thêm thể loại truyện thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theloai = Theloai::find($id);
        return view('Admin.TheLoai.edit')->with(compact('theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = $request->validate(
            [
                'tentheloai' => 'required|max:255',
                'slug' => 'required|max:255',
                'tukhoa' => 'required|max:255',


                'mota' => 'required|max:255',
                'trangthai' => 'required',
            ],
            [
                'tukhoa.required' => 'Từ khóa phải có nhé',
                'tentheloai.required' => 'Tên thể loại phải có nhé',
                'mota.required' => 'Mô tả thể loại phải có nhé',
            ]
        );
        // $data = $request->all();
        // dd($data);
        $theloai = Theloai::find($id);
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->tukhoa = $data['tukhoa'];
        $theloai->slug = $data['slug'];
        $theloai->mota = $data['mota'];
        $theloai->trangthai = $data['trangthai'];
        $get_image = $request->hinhanh;
        if($get_image){

            $path2 = 'public/uploads/theloai/'.$theloai->hinhanh;
            if(file_exists($path2)){
                unlink($path2);
            }
            $path = 'public/uploads/theloai/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

            $theloai->hinhanh = $new_image;
        }
        $theloai->save();

        return redirect()->back()->with('status','Cập nhật thể loại truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theloai = Theloai::find($id);
        $path = 'public/uploads/theloai/'.$theloai->hinhanh;
            if(file_exists($path)){
                unlink($path);
        }
        $theloai->delete();
        return redirect()->back()->with('status','Xóa thể loại truyện thành công');
    }
}
