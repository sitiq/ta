<?php
/**
 * Created by nad.
 * Date: 16/03/2018
 * Time: 09:52
 * Description:
 */

class Profil_model extends CI_Model
{
    /**
     * This function is used to get the nim mahasiswa count
     * @param string $searchText : This is optional search text
     * @return array $result : This is result
     */
    function cekNim($nim)
    {
        $this->db->select('nim, nama');
        $this->db->from('mahasiswa');
        $this->db->where('isDeleted', 0);
        $this->db->where('nim', $nim);
        $query = $this->db->get();

        $result = $query->result();
        return count($result);
    }
    function getProfilMhs($id)
    {
        $this->db->select('id_mahasiswa, nim, nama, foto, jumlah_sks, ipk, email, mobile, skill, pengalaman');
        $this->db->from('mahasiswa');
        $this->db->where('id_mahasiswa', $id);
        $query = $this->db->get();

        return $query->result();
    }
    /**
     * This function is used to update the mahasiswa information
     * @param array $mahasiswaInfo : This is mahasiswas updated information
     * @param number $nim : This is mahasiswa id
     */
    function editProfil($mahasiswaInfo, $id_mahasiswa)
    {
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->update('mahasiswa', $mahasiswaInfo);

        if($this->db->affected_rows() >= 0){
            return true; //add your code here
        }else{
            return false; //add your your code here
        }
    }
}