<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BaivietController extends Controller
{
    public $lang='vi';	
    public function index(){
        $this->lang= session()->get('lang');
        if ($this->lang==null) $this->lang='vi';		
        \App::setLocale($this->lang);
        
        return view('_index')->with('lang',$this->lang);
    }    

    public function detail($id){
        $this->lang= session()->get('lang');
        if ($this->lang==null) $this->lang='vi';		
        \App::setLocale($this->lang);

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
        $this->lang= session()->get('lang');
        if ($this->lang==null) $this->lang='vi';		
        \App::setLocale($this->lang); 
        
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
      
    function search($Keyword){		
        $Keyword =  strip_tags(trim($Keyword));
        $lt = DB::select("select * from tin where TieuDe LIKE '%Keyword%' or TomTat LIKE '%Keyword%' AND AnHien = 1 ORDER BY idTin")
        ->paginate(6);
        if (count($lt)==0) die("Không tìm thấy tin nào chứa $Keyword");
        $d=array('lang'=>$this->lang,'listtin'=>$lt);
        return view('_search',$d);
      }

      function lienhe(){
        $d=array('lang'=>$this->lang,'title'=>'Liên hệ');
        return view('_lienhe',$d);
    }    

      public function changeLanguage($lang){		
        \Session::put('lang', $lang);		
        return redirect()->route('/'); 
    //return redirect()->back();
    }
    
      
}
