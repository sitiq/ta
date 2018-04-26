<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_model extends CI_Model{
    public function getProyek($id = NULL){
        $this->db->select("*,p.nama nama_proyek,d.nama nama_dosen");
        $this->db->from('proyek p');
        $this->db->join('dosen d','p.id_dosen=d.id_dosen','inner');
        $this->db->where('p.isDeleted',0);
        if($id != NULL){
            $this->db->where('id_proyek',$id);
        } else {
            $this->db->order_by('p.status DESC');
        }
        $query = $this->db->get();

        return $query->result();
    }

    public function getDosen(){
        $this->db->select("*");
        $this->db->from('dosen');
        $this->db->where('isDeleted',0);
        $query = $this->db->get();

        return $query->result();
    }

    public function getStatus(){
        $this->db->select("status");
        $this->db->from('proyek');
        $query = $this->db->get();

        return $query->result();
    }



    public function insert($data){
        $this->db->trans_start();
        $this->db->insert('proyek', $data);
        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }

    public function update($data,$id){
        $this->db->trans_start();
        $this->db->where('id_proyek',$id);
        $this->db->update('proyek',$data);
        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }

    public function delete($id){
        $this->db->trans_start();
        
        $this->db->set('isDeleted',1);
        $this->db->where('id_proyek',$id);
        $this->db->update('proyek');

        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }

    public function change_status($id,$cond){
        $this->db->trans_start();
        if($cond == 1){
            $this->db->set('status','disetujui');
        } else {
            $this->db->set('status','ditolak');
        }
        $this->db->where('id_proyek',$id);
        $this->db->update('proyek');

        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }
}