<?php
/**
 * Created by nad.
 * Date: 02/04/2018
 * Time: 19:18
 * Description:
 */

class berkas_model extends CI_Model
{
    public function getBerkas($id = NULL){
        $this->db->select("*");
        $this->db->from('berkas_sidang');
        if($id != NULL){
            $this->db->where('id_berkas_sidang',$id);
        }
        $query = $this->db->get();

        return $query->result();
    }

    public function insert($data)
    {
        $this->db->trans_start();
        $this->db->insert('berkas_sidang', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function update($data,$id){
        $this->db->trans_start();
        $this->db->where('id_berkas_sidang',$id);
        $this->db->update('berkas_sidang',$data);
        $this->db->trans_complete();
        $result = $this->db->trans_status();

        return $result;
    }

    public function off($id){
        $this->db->trans_start();

        $this->db->set('isDeleted',1);
        $this->db->where('id_berkas_sidang',$id);
        $this->db->update('berkas_sidang');

        $this->db->trans_complete();
        $result = $this->db->trans_status();

        return $result;
    }
    public function on($id){
        $this->db->trans_start();

        $this->db->set('isDeleted',0);
        $this->db->where('id_berkas_sidang',$id);
        $this->db->update('berkas_sidang');

        $this->db->trans_complete();
        $result = $this->db->trans_status();

        return $result;
    }
}