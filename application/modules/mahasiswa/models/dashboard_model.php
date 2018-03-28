<?php
/**
 * Created by nad.
 * Date: 27/03/2018
 * Time: 21:41
 * Description:
 */

class dashboard_model extends CI_Model
{
    function getPesanList($userId){
        $this->db->select("l.*, m.id_mahasiswa, u.id_user");
        $this->db->from('log_pesan l');
        $this->db->join('mahasiswa m','m.id_mahasiswa = l.id_mahasiswa');
        $this->db->join('user u','u.id_user = m.id_user');
        $this->db->where('u.id_user',$userId);
        $this->db->order_by('l.createdDtm','desc');
        $query = $this->db->get();

        return $query->result();
    }
}