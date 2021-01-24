<?php namespace App\Models;

use CodeIgniter\Model;

class RakModel extends Model
{
    protected $table = "rak";

    public function getRak($term = false)
    {
        if($term === false){
            return $this->table('rak')
                        ->orderBy('kd_rak','ASC')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('rak')
                        ->like('kd_rak', $term)
                        ->orLike('nama', $term)
                        ->orLike('jenis', $term)
                        ->get()
                        ->getResultArray();
        }
    }
    public function getRakKode($kd_rak) {
        return $this->table('rak')
                    ->where('kd_rak',$kd_rak)
                    ->get()
                    ->getRowArray();
    }
    function KodeRak(){
        return $this->table('rak')
                    ->select('kd_rak')
                    ->orderBy('kd_rak','DESC')
                    ->limit(1)
                    ->get()
                    ->getRowArray();
  }

    function TambahRak($data){
        $query = $this->protect(false)
                      ->table('rak')
                      ->insert($data);
        return $query;
    }
    function HapusRak($kd){
        $query = $this->table('rak')
                      ->where('kd_rak',$kd)
                      ->delete();
        return $query;
    }
    function UbahRak($data,$kd){
        $query = $this->protect(false)
                      ->table('rak')
                      ->set($data)
                      ->where('kd_rak',$kd)
                      ->update();
        return $query;
    }

}
?>
