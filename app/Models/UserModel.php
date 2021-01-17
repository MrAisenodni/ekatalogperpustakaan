<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";

    public function getUser($nis = false)
    {
        if($nis === false){
            return $this->table('user')
                        ->orderBy('nama','ASC')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('user')
                        ->where('nis', $nis)
                        ->get()
                        ->getRowArray();
        }
    }
    function KodeUser(){
        return $this->table('user')
                    ->select('kd_user')
                    ->orderBy('kd_user','DESC')
                    ->limit(1)
                    ->get()
                    ->getRowArray();
    }
    function Login(){
        return $this->table('user')
                    ->select('nis','password')
                    ->get()
                    ->getRowArray();
  }

    function TambahUser($data){
        $query = $this->protect(false)
                      ->table('user')
                      ->insert($data);
        return $query;
    }
    function HapusUser($kd_user){
        $query = $this->table('user')
                      ->where('kd_user',$kd_user)
                      ->delete();
        return $query;
    }
    function UbahUser($data,$nis){
        $query = $this->protect(false)
                      ->table('user')
                      ->set($data)
                      ->where('nis',$nis)
                      ->update();
    }

}
?>
