<?php

use Illuminate\Database\Seeder;

class capnhatTenKhongDau extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {        
        $kq = DB::table("loaitin")->pluck('Ten','idLT');
        foreach($kq as $idLT=>$Ten) {        
            $tenKD= Str::slug($Ten);
            DB::table('loaitin')->where('idLT', $idLT)->update(['Ten_KhongDau' => $tenKD]);
        }
      }
      
}
