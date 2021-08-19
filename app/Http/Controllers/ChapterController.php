<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = Chapter::with('truyen')->orderBy('id', 'DESC')->get();
        return view('Admin.Chapter.index')->with(compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyen = Truyen::orderBy('id', 'DESC')->get();
        return view('Admin.Chapter.create')->with(compact('truyen'));
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

                'tenchapter' => 'required|max:255',
                'slug' => 'required|max:255',
                'tomtat' => 'required',
                'noidung' => 'required',
                'truyen_id' => 'required',
                'trangthai' => 'required',

            ],
            [
                'tenchapter.required' => 'Tên chapter không được bỏ trống',
                'tenchapter.unique' => 'Đã tồn tại chapter, điền danh mục khác',
                'slug.required' => 'Slug không được bỏ trống',
                'slug.unique' => 'Slug đã có',
                'noidung.required' => 'Nội dung không được trống',
                'tomtat.required' => 'Tóm tắt không được bỏ trống',
            ]
        );
        $chapter = new Chapter();
        $chapter->tieude = $data['tenchapter'];
        $chapter->slug = $data['slug'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->trangthai = $data['trangthai'];

        $chapter->save();
        return redirect()->back()->with('status', 'Thêm chapter thành công');
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
        $chapter = Chapter::find($id);
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view('Admin.Chapter.edit')->with(compact('truyen','chapter'));

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

                'tenchapter' => 'required|max:255',
                'slug' => 'required|max:255',
                'tomtat' => 'required',
                'noidung' => 'required',
                'truyen_id' => 'required',
                'trangthai' => 'required',

            ],
            [
                'tenchapter.required' => 'Tên chapter không được bỏ trống',
                'tenchapter.unique' => 'Đã tồn tại chapter, điền danh mục khác',
                'slug.required' => 'Slug không được bỏ trống',
                'slug.unique' => 'Slug đã có',
                'noidung.required' => 'Nội dung không được trống',
                'tomtat.required' => 'Tóm tắt không được bỏ trống',
            ]
        );
        $chapter = Chapter::find($id);
        $chapter->tieude = $data['tenchapter'];
        $chapter->slug = $data['slug'];
        $chapter->tomtat = $data['tomtat'];
        $chapter->noidung = $data['noidung'];
        $chapter->truyen_id = $data['truyen_id'];
        $chapter->trangthai = $data['trangthai'];

        $chapter->update();
        return redirect()->back()->with('status', 'Cập nhật chapter thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status', 'Xoá chapter thành công');
    }
}
