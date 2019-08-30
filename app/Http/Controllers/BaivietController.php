<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BaivietController extends Controller
{
    public $lang='vi';	
    public function index(){	
        return view('_index')->with('lang',$this->lang);
    }    

    public function detail($id){
        settype($id, "int"); if ($id<=0) return ;
        $kq = DB::select("select *,TenTL from tin,theloai where idTin=$id and tin.idTL = theloai.idTL");
        $ctTin=$kq[0];
        return view('_detail')
        ->with('title',$ctTin->TieuDe)
        ->with('ctTin',$ctTin)
        ->with('lang', $this->lang)
        ;
     }

     function cat($TenKD){		
        $TenKD =  strip_tags(trim($TenKD));
        $kq = DB::select("select idLT, Ten as TenLT from loaitin where Ten_KhongDau =?",array($TenKD));
        if (count($kq)==0) die("Không biết loại tin");
        $idLT= $kq[0]->idLT;
        $TenLT = $kq[0]->TenLT;
        $lt = DB::table('tin')
        ->select('idTin', 'TieuDe','TomTat','SoLanXem','Ngay','urlHinh')
        ->where('idLT', '=', $idLT)->where('AnHien',1)
        ->orderBy('idTin','desc')
        ->paginate(6);
        $d=array('lang'=>$this->lang,'title'=>$TenLT,'TenLT'=>$TenLT,'listtin'=>$lt);
        return view('_cat',$d);
    }//cat
      
     
}
