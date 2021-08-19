<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmuc;

class DanhmucTruyen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuctruyen = Danhmuc::orderBy('id','DESC')->get();

        return view('Admin.DanhmucTruyen.index')->with(compact('danhmuctruyen'));//compact: kèm theo tất cả danh mục truyện
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.DanhmucTruyen.create');
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

                'tendanhmuc' => 'required|unique:danhmuc|max:255', //unique: kiem tra trung lap
                'slug'=>'required|unique:danhmuc|max:255',
                'mota' => 'required|max:255',
                'trangthai'=>'required',
            ],
            [
                'tendanhmuc.required' => 'Danh mục không được bỏ trống',
                'tendanhmuc.unique' => 'Đã tồn tại DM, điền danh mục khác',
                'slug.required' => 'slug không được bỏ trống',
                'mota.required' => 'Mô tả không được bỏ trống',
            ]
        );
        $danhmuctruyen= new Danhmuc();
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slug = $data['slug'];
        $danhmuctruyen->mota= $data['mota'];
        $danhmuctruyen->trangthai= $data['trangthai'];
        $danhmuctruyen->save();
        return redirect()->back()->with('status','Thêm thành công');
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
        $danhmuc= Danhmuc::find($id);
        return view('Admin.DanhmucTruyen.edit')->with(compact('danhmuc'));//compact: kèm theo tất cả danh mục truyện

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

                'tendanhmuc' => 'required|max:255', //|unique:danhmuc|: kiem tra trung lap
                'slug'=>'required|max:255',
                'mota' => 'required|max:255',
                'trangthai'=>'required',
            ],
            [
                'tendanhmuc.required' => 'Danh mục không được bỏ trống',
                'tendanhmuc.unique' => 'Đã tồn tại DM, điền danh mục khác',
                'slug.required' => 'slug không được bỏ trống',
                'mota.required' => 'Mô tả không được bỏ trống',
            ]
        );
        $danhmuctruyen= Danhmuc::find($id);
        $danhmuctruyen->tendanhmuc = $data['tendanhmuc'];
        $danhmuctruyen->slug = $data['slug'];
        $danhmuctruyen->mota= $data['mota'];
        $danhmuctruyen->trangthai= $data['trangthai'];
        $danhmuctruyen->update();
        return redirect()->back()->with('status','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Danhmuc::find($id)->delete();
        return redirect()->back()->with('status', 'Xoá thành công');
    }
}
