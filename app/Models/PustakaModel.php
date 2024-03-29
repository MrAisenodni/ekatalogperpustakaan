<?php namespace App\Models;

use CodeIgniter\Model;

class PustakaModel extends Model
{
    protected $table = "pustaka";

    public function getPustaka($term = false)
    {
        if($term === false){
            return $this->table('pustaka')
                        ->join('rak', 'pustaka.kd_rak = rak.kd_rak')
                        ->orderBy('kd_buku','ASC')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('pustaka')
                        ->join('rak', 'pustaka.kd_rak = rak.kd_rak')
                        ->like('judul', $term)
                        ->orLike('pengarang', $term)
                        ->orLike('penerbit', $term)
                        ->orLike('tahun', $term)
                        ->get()
                        ->getResultArray();
        }
    }
    public function getPustakaKode($kd_buku) {
        return $this->table('buku')
                    ->join('rak','pustaka.kd_rak = rak.kd_rak')
                    ->where('kd_buku',$kd_buku)
                    ->get()
                    ->getRowArray();
    }
    public function getPustakaHistory($kd_buku){
        return $this->table('history_pustaka')
                    ->join('buku','buku.kd_buku = history_pustaka.buku')
                    ->join('rak','rak.kd_rak = history_pustaka.kd_rak')
                    ->where('kd_buku',$kd_buku)
                    ->get()
                    ->getRowArray();
    }
    public function getSearch($kd = false)
    {
      if($kd === false){
          return $this->table('pustaka')
                      ->join('rak', 'pustaka.kd_rak = rak.kd_rak')
                      ->orderBy('kd_buku','ASC')
                      ->get()
                      ->getResultArray();
      } else {
          return $this->table('pustaka')
                      ->join('rak', 'pustaka.kd_rak = rak.kd_rak')
                      ->where('kd_buku', $kd)
                      ->get()
                      ->getResultArray();
      }
    }
    function KodeBuku(){
        return $this->table('pustaka')
                    ->select('kd_buku')
                    ->orderBy('kd_buku','DESC')
                    ->limit(1)
                    ->get()
                    ->getRowArray();
  }

    function TambahBuku($data){
          $query = $this->protect(false)
                        ->table('pustaka')
                        ->insert($data);
          
          return $query;
    }
    function HapusBuku($kd){
        $query = $this->table('pustaka')
                      ->where('kd_buku',$kd)
                      ->delete();
        return $query;
    }
    function UbahBuku($data,$kd_buku){
        $query = $this->protect(false)
                      ->table('pustaka')
                      ->set($data)
                      ->where('kd_buku',$kd_buku)
                      ->update();
        return $query;
    }
}
?>
