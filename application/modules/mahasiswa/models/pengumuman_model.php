<?php
/**
 * Created by nad.
 * Date: 26/03/2018
 * Time: 12:18
 * Description:
 */

class pengumuman_model extends CI_Model
{
    function getPengumumanList($id = NULL){
        $this->db->select("*");
        $this->db->from('pengumuman');
        $this->db->where('isDeleted',0);
        if($id != NULL){
            $this->db->where('id_pengumuman',$id);
        }
        $query = $this->db->get();

        return $query->result();
    }
}