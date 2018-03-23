<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:45
 * Description:
 */

class profil_model extends CI_Model
{
    /**
     * This function is used to get the dosen listing count
     * @param string $searchText : This is optional search text
     * @return array $result : This is result
     */
    function getdosen($userId)
    {
        $this->db->select('id_dosen, nid, nama, foto, email, mobile, skill');
        $this->db->from('dosen');
        $this->db->where('id_user', $userId);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    /**
     * This function is used to get the nim dosen count
     * @param string $searchText : This is optional search text
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
     * @param number $nim : This is dosen id
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
     * @param number $nim : This is dosen id
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
}