<?php namespace App\Models;

use CodeIgniter\Model;

class PustakaModel extends Model
{
    protected $table = "pustaka";

    public function getPustaka($term = false)
    {
        if($term === false){
            return $this->table('pustaka')
                        ->orderBy('kd_buku','ASC')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('pustaka')
                        ->like('judul', $term)
                        ->orLike('pengarang', $term)
                        ->orLike('penerbit', $term)
                        ->orLike('tahun', $term)
                        ->get()
                        ->getResultArray();
        }
    }
    public function getPustakaJoin($term = false)
    {
        if($term === false){
            return $this->table('pustaka')
                        // ->join('rak')
                        ->orderBy('kd_buku','ASC')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('pustaka')
                        ->like('judul', $term)
                        ->orLike('pengarang', $term)
                        ->orLike('penerbit', $term)
                        ->orLike('tahun', $term)
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
    function UbahBuku($data,$kd){
        $query = $this->protect(false)
                      ->table('pustaka')
                      ->set($data)
                      ->where('kd_buku',$kd)
                      ->update();
        return $query;
    }

}
?>
