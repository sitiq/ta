<?php
/**
 * Created by nad.
 * Date: 25/03/2018
 * Time: 05:42
 * Description:
 */

class sidang_model extends CI_Model
{
    /**
     * This function used to get berkas list by id
     * @param number $userId : This is user who is logged in
     * @return array $result : This is mahasiswa information
     */
    function getBerkasInfo($userId)
    {
        $this->db->select('berkas.id_berkas_sidang, berkas.nama_berkas, val.id_valid_sidang,
         val.isValid, val.path, sidang.id_sidang, mahasiswa.id_mahasiswa');
        $this->db->from('berkas_sidang berkas');
        $this->db->join('validasi_berkas_sidang val','val.id_berkas_sidang = berkas.id_berkas_sidang');
        $this->db->join('sidang','sidang.id_sidang = val.id_sidang');
        $this->db->join('mahasiswa','mahasiswa.id_mahasiswa = sidang.id_mahasiswa');
        $this->db->join('user','user.id_user = mahasiswa.id_user');
        $this->db->where('mahasiswa.id_user', $userId);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    /**
     * This function is used to get the nim mahasiswa who is login
     * @param string $id : This is got from who is logged in
     * @return array $result : This is result
     */
    function cekMahasiswa($id)
    {
        $this->db->select('mahasiswa.id_mahasiswa');
        $this->db->from('mahasiswa');
        $this->db->join('user','mahasiswa.id_user = user.id_user');
        $this->db->where('mahasiswa.id_user', $id);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    /**
     * This function is used to add new sidang to system / registration sidang
     * @param array $infoSidang : This is sidang information list
     * @return number $insert_id : This is last inserted id
     */
    function addNewSidang($infoSidang)
    {
        $this->db->trans_start();
        $this->db->insert('sidang', $infoSidang);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }
    /**
     * This function is used to add new validasi berkas to system / registration sidang
     * @param array $infoValidasi : This is validasi information list
     * @return number $insert_id : This is last inserted id
     */
    function addNewValidasi($infoValidasi)
    {
        $this->db->trans_start();
        $this->db->insert('validasi_berkas_sidang', $infoValidasi);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }
    /**
     * This function is used to edit the files in validasi_berkas_sidang table
     * @param array $berkasInfo : This is array files wanna insert to validasi_berkas_sidang field
     * @param number $id_berkas : This is berkas id
     */
    function editBerkas($berkasInfo, $id_berkas)
    {
        $this->db->where('id_valid_sidang', $id_berkas);
        $this->db->update('validasi_berkas_sidang', $berkasInfo);

        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }
}