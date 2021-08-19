<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use App\Models\Danhmuc;
use App\Models\Truyen;
use App\Models\Theloai;


class IndexHomeController extends Controller
{
    public function timkiem_ajax(Request $request){
        $data = $request->all();

        if($data['keywords']){

            $truyen = Truyen::where('trangthai',0)->where('tentruyen','LIKE','%'.$data['keywords'].'%')->get();

            $output = '
            <ul class="dropdown-menu" style="display:block;">'
            ;

            foreach($truyen as $key => $tr){
             $output .= '
             <li class="li_search_ajax"><a href="#">'.$tr->tentruyen.'</a></li>
             ';
         }

         $output .= '</ul>';
         echo $output;
     }
    }
    public function Home()
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();
        $truyen = Truyen::orderBy('id', 'DESC')->where('trangthai', 0)->get();
        return view('pages.home')->with(compact('danhmuc', 'truyen', 'theloai'));
    }

    public function danhmuc($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc_id = Danhmuc::where('slug', $slug)->first();
        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();
        $tendanhmuc = $danhmuc_id->tendanhmuc;

        $truyen = Truyen::orderBy('id', 'DESC')->where('trangthai', 0)->where('danhmuc_id', $danhmuc_id->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc', 'truyen', 'theloai','tendanhmuc'));
    }

    public function theloai($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $theloai_id = Theloai::where('slug', $slug)->first();

        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();

        $tentheloai = $theloai_id->tentheloai;

        $truyen = Truyen::orderBy('id', 'DESC')->where('trangthai', 0)->where('theloai_id', $theloai_id->id)->get();

        return view('pages.theloai')->with(compact('danhmuc', 'truyen', 'theloai','tentheloai'));
    }
    public function xemtruyen($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();

        $truyen = Truyen::with('danhmuctruyen', 'theloai')->where('slug', $slug)->where('trangthai', 0)->first();

        $truyennoibat = Truyen::where('truyen_noibat',1)->take(10)->get();
        $truyenxemnhieu = Truyen::where('truyen_noibat',2)->take(10)->get();
        $truyenmoi = Truyen::where('truyen_noibat',0)->take(10)->get();


        $chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->get();

        $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->id)->first();

        $truyencungdanhmuc = Truyen::with('danhmuctruyen', 'theloai')->where('danhmuc_id', $truyen->danhmuctruyen->id)->whereNotIn('id', [$truyen->id])->get();

        return view('pages.truyen')->with(compact('danhmuc', 'truyen', 'chapter', 'truyencungdanhmuc', 'chapter_dau','truyenmoi', 'theloai','truyennoibat','truyenxemnhieu'));
    }

    public function xemchapter($slug)
    {
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();

        $truyen = Chapter::where('slug', $slug)->first();
        //breadkcrumb
        $truyen_breadcrumd = Truyen::with('danhmuctruyen', 'theloai')->where('id', $truyen->truyen_id)->first();

        ///

        $chapter = Chapter::with('truyen')->where('slug', $slug)->where('truyen_id', $truyen->truyen_id)->first();

        $all_chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->truyen_id)->get();

        $next_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '>', $chapter->id)->min('slug');

        $max_id =  Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'DESC')->first();

        $min_id =  Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('id', 'ASC')->first();

        $previous_chapter = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '<', $chapter->id)->max('slug');

        return view('pages.chapter')->with(compact('danhmuc', 'chapter', 'all_chapter', 'next_chapter', 'previous_chapter', 'max_id', 'min_id', 'theloai','truyen_breadcrumd'));
    }
    public function timkiem(){

        $theloai = Theloai::orderBy('id', 'DESC')->get();

        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();

        $tukhoa = $_GET['tukhoa'];

        $truyen = Truyen::with('danhmuctruyen', 'theloai')->where('tentruyen','LIKE', '%'.$tukhoa.'%')->orWhere('tomtat','LIKE', '%'.$tukhoa.'%')->orWhere('tacgia','LIKE', '%'.$tukhoa.'%')->get();

        return view('pages.timkiem')->with(compact('danhmuc', 'truyen', 'theloai','tukhoa'));

    }
    public function truyennoibat(Request $request){
        $data = $request->all();
        $truyen = Truyen::find($data['truyen_id']);
        $truyen->truyen_noibat = $data['truyennoibat'];
        $truyen->save();

    }
}
