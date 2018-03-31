<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Profil_model extends CI_Model
{
    /**
     * This function is used to get the mahasiswa list
     * @param number $userId : This is get from user who is logged in
     * @return array $result : This is result
     */
    function getMahasiswa($userId)
    {
        $this->db->select('id_mahasiswa, nim, nama, foto, jumlah_sks, ipk, email, mobile, skill, pengalaman');
        $this->db->from('mahasiswa');
        $this->db->where('id_user', $userId);
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
    }

    /**
     * This function is used to get mahasiswa
     * @param number $id : This is get from user who is logged in
     * @return array $result : This is result
     */
    function cekNim($id)
    {
        $this->db->select('nim, nama');
        $this->db->from('mahasiswa');
        $this->db->where('id_mahasiswa', $id);
        $query = $this->db->get();
        
        $result = $query->result();
        return count($result);
    }
    
	/**
     * This function used to get mahasiswa information by id
     * @param number $id : This is mahasiswa id
     * @return array $result : This is mahasiswa information
     */
    function getProfilInfo($id)
    {
        $this->db->select('id_mahasiswa, nama');
        $this->db->from('mahasiswa');
        $this->db->where('isDeleted', 0);
        $this->db->where('id_mahasiswa', $id);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * This function is used to edit the mahasiswa information
     * @param array $mahasiswaInfo : This is mahasiswas updated information
     * @param number $id_mahasiswa : This is mahasiswa id
     * @return true if row in table increase
     */
    function editProfil($mahasiswaInfo, $id_mahasiswa)
    {
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->update('mahasiswa', $mahasiswaInfo);
        
        if($this->db->affected_rows() >= 0){
			return true;
		}else{
			return false;
		}
    }
}