<?php namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    protected $table = "history";

    public function getHistory($term = false)
    {
        if($nis === false){
            return $this->table('history')
                        ->orderBy('tgl_akses','ASC')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('history')
                        ->like('aksi', $term)
                        ->get()
                        ->getRowArray();
        }
    }
    function TambahHistory($input){
        $query = $this->protect(false)
                      ->table('history')
                      ->insert($input);
        return $query;
    }
    // function HapusUser($nis){
    //     $query = $this->table('user')
    //                   ->where('nis',$nis)
    //                   ->delete();
    //     return $query;
    // }
    // function UbahUser($data,$nis){
    //     $query = $this->protect(false)
    //                   ->table('user')
    //                   ->set($data)
    //                   ->where('nis',$nis)
    //                   ->update();
    // }

}
?>
