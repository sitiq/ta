<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Periode_model extends CI_Model{
    public function getPeriode($id = NULL){
        $this->db->select("*");
        $this->db->from('periode');
        $this->db->where('isDeleted',0);
        if($id != NULL){
            $this->db->where('id_periode',$id);
        }
        $query = $this->db->get();

        return $query->result();
    }

    public function insert($data){
        $this->db->trans_start();
        $this->db->insert('periode', $data);
        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }

    public function update($data,$id){
        $this->db->trans_start();
        $this->db->where('id_periode',$id);
        $this->db->update('periode',$data);
        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }

    public function delete($id){
        $this->db->trans_start();
        
        $this->db->set('isDeleted',1);
        $this->db->where('id_periode',$id);
        $this->db->update('periode');

        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }
}