<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Danhmuc;
use  App\Models\Truyen;
use  App\Models\Theloai;


class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list_truyen = Truyen::with('danhmuctruyen','theloai')->orderBy('id', 'DESC')->get(); //da noi quan he trong file model
        return view("Admin.Truyen.index")->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();
        return view("Admin.Truyen.create")->with(compact('danhmuc','theloai'));
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

                'tentruyen' => 'required|unique:truyen|max:255', //unique:truyen:   kiem tra trung lap
                'tacgia' => 'required|max:255', //unique:truyen:   kiem tra trung lap
                'slug' => 'required|unique:truyen|max:255',

                'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048|dimensions:min_width=100, min_height=100, max_width=1000, max_height=1000',

                'tomtat' => 'required',
                'noibat' => 'required',
                'trangthai' => 'required',
                'danhmuc' => 'required',
                'theloai' => 'required',


            ],
            [
                'tentruyen.required' => 'Tên truyện không được bỏ trống',
                'tentruyen.unique' => 'Đã tồn tại truyện, điền danh mục khác',
                'slug.required' => 'lug không được bỏ trống',
                'hinhanh.required' => 'Hình ảnh không được trống',
                'tomtat.required' => 'Tóm tắt không được bỏ trống',
            ]
        );
        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->slug = $data['slug'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->truyen_noibat = $data['noibat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->theloai_id = $data['theloai'];

        //them hinh anh
        $get_image = $request->hinhanh;
        $path = 'public/uploads/truyen';
        $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh('hình.jpg' thì sẽ lấu 'hình')
        $name_image = current(explode('.', $get_name_image)); //tách tên hình ảnh ra như vậy: hinh1.jpg  => hinh1 . jpg
        $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); //lấy tên hình ảnh rand(0,99) thành tên mới + đuôi mở rộng
        $get_image->move($path, $new_image);
        $truyen->hinhanh = $new_image;
        //end them hinh
        $truyen->trangthai = $data['trangthai'];

        $truyen->save();
        return redirect()->back()->with('status', 'Thêm thành công');
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
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $truyen = Truyen::find($id);
        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();
        return view('Admin.Truyen.edit')->with(compact('truyen', 'danhmuc','theloai'));
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

                'tentruyen' => 'required|max:255', //unique:truyen:   kiem tra trung lap
                'tacgia' => 'required|max:255', //unique:truyen:   kiem tra trung lap
                'slug' => 'required|max:255',


                'tomtat' => 'required',
                'trangthai' => 'required',
                'danhmuc' => 'required',
                'theloai' => 'required',


            ],
            [
                'tentruyen.required' => 'Tên truyện không được bỏ trống',
                'tentruyen.unique' => 'Đã tồn tại truyện, điền danh mục khác',
                'slug.required' => 'lug không được bỏ trống',
                'tomtat.required' => 'Tóm tắt không được bỏ trống',
            ]
        );
        $truyen = Truyen::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->slug = $data['slug'];
        $truyen->tomtat = $data['tomtat'];
        $truyen->danhmuc_id = $data['danhmuc'];
        $truyen->theloai_id = $data['theloai'];
        $truyen->trangthai = $data['trangthai'];
        //them hinh anh
        $get_image = $request->hinhanh;
        //kiem tra neu chon hinh anh moi khi cap nhat
        if ($get_image) {

            $path = 'public/uploads/truyen/' . $truyen->hinhanh;
            if (file_exists($path)) {
                unlink($path);
            }
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh('hình.jpg' thì sẽ lấu 'hình')
            $name_image = current(explode('.', $get_name_image)); //tách tên hình ảnh ra như vậy: hinh1.jpg  => hinh1 . jpg
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension(); //lấy tên hình ảnh rand(0,99) thành tên mới + đuôi mở rộng
            $get_image->move($path, $new_image);
            $truyen->hinhanh = $new_image;
        }
        //end them hinh
        $truyen->update();
        return redirect()->back()->with('status', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = Truyen::find($id);
        $path = 'public/uploads/truyen/' . $truyen->hinhanh;
        if (file_exists($path)) {
            unlink($path);
        }
        Truyen::find($id)->delete();
        return redirect()->back()->with('status', 'Xoá thành công');
    }
}
