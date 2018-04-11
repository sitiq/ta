<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Profil_model extends CI_Model
{
    /**
     * This function is used to get the dosen list
     * @param number $userId : This is get from user who is logged in
     * @return array $result : This is result
     */
    function getDosen($userId)
    {
        $this->db->select('id_dosen, nid, nama, foto, email, mobile, skill');
        $this->db->from('dosen');
        $this->db->where('id_user', $userId);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    /**
     * This function is used to get the nid dosen
     * @param number $id : This is to get nid and nama dosen
     * @return array $result : This is result
     */
    function cekNid($id)
    {
        $this->db->select('nid, nama');
        $this->db->from('dosen');
        $this->db->where('id_dosen', $id);
        $query = $this->db->get();

        $result = $query->result();
        return count($result);
    }

    /**
     * This function used to get dosen information by id
     * @param number $id : This is dosen id
     * @return array $result : This is dosen information
     */
    function getProfilInfo($id)
    {
        $this->db->select('id_dosen, nama');
        $this->db->from('dosen');
        $this->db->where('isDeleted', 0);
        $this->db->where('id_dosen', $id);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function is used to update the dosen information
     * @param array $dosenInfo : This is dosens updated information
     * @return array $result : This is result
     */
    function editProfil($dosenInfo, $id_dosen)
    {
        $this->db->where('id_dosen', $id_dosen);
        $this->db->update('dosen', $dosenInfo);

        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is user updated information
     * @return array $result : This is result
     */
    function editUser($userInfo, $id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $userInfo);

        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }
}