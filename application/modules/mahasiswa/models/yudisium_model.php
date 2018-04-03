<?php
/**
 * Created by nad.
 * Date: 25/03/2018
 * Time: 06:33
 * Description:
 */

class yudisium_model extends CI_Model
{
    function getPeriode(){
        $this->db->select('p.tanggal_awal_regis, p.tanggal_akhir_regis');
        $this->db->from('periode p');
        // $this->db->join('yudisium y','y.id_periode = p.id_periode');
        $this->db->where('jenis','yudisium');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    function getBerkasInfo($userId)
    {
        $this->db->select('berkas.id_berkas_yudisium, berkas.nama_berkas, val.id_valid_yudisium,
         val.isValid, val.path, yudisium.id_yudisium, mahasiswa.id_mahasiswa');
        $this->db->from('berkas_yudisium berkas');
        $this->db->join('validasi_berkas_yudisium val','val.id_berkas_yudisium = berkas.id_berkas_yudisium');
        $this->db->join('yudisium','yudisium.id_yudisium = val.id_yudisium');
        $this->db->join('periode','periode.id_periode = yudisium.id_periode');
        $this->db->join('mahasiswa','mahasiswa.id_mahasiswa = yudisium.id_mahasiswa');
        $this->db->join('user','user.id_user = mahasiswa.id_user');
        $this->db->where('mahasiswa.id_user', $userId);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function cekMahasiswa($userId)
    {
        $this->db->select('mahasiswa.id_mahasiswa');
        $this->db->from('mahasiswa');
        $this->db->join('user','mahasiswa.id_user = user.id_user');
        $this->db->where('mahasiswa.id_user', $userId);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    /**
     * This function is used to add new project to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewYudisium($infoYudisium)
    {
        $this->db->trans_start();
        $this->db->insert('yudisium', $infoYudisium);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }
    /**
     * This function is used to add new project to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewValidasi($id)
    {
        $this->db->trans_start();
        $this->db->insert('validasi_berkas_yudisium', $id);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }
    /**
     * This function is used to update the mahasiswa information
     * @param array $berkasInfo : This is mahasiswas updated information
     * @param number $nim : This is mahasiswa id
     */
    function editBerkas($berkasInfo, $id_berkas)
    {
        $this->db->where('id_valid_yudisium', $id_berkas);
        $this->db->update('validasi_berkas_yudisium', $berkasInfo);

        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }
}