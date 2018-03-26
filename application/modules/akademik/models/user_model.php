<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    function insert($data){
        $this->db->trans_start();
        $this->db->insert('user', $data);
        $insert_id = $this->db->insert_id();
        $data_another_table = array(
            'id_user' => $insert_id,
            'nama' => $data['nama']
        );
        if($data['id_user_role'] == ROLE_MAHASISWA){
            $this->db->insert('mahasiswa', $data_another_table);
        } elseif($data['id_user_role'] == ROLE_DOSEN){
            $this->db->insert('dosen', $data_another_table);
        } elseif($data['id_user_role'] == ROLE_AKADEMIK){
            $this->db->insert('akademik', $data_another_table);
        } elseif($data['id_user_role'] == ROLE_KAPRODI){
            $this->db->insert('kaprodi', $data_another_table);
        }
        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }

    function insert_multiple($data){
        $this->db->trans_start();
        $count = count($data);
        $this->db->insert_batch('user', $data);
        $first_id = $this->db->insert_id();
        $last_id = $first_id + ($count-1);
        $i = 0;
        $data_another_table = array();
        for ($id=$first_id; $id<=$last_id ; $id++) { 
            $data_person = array(
                'id_user' => $id,
                'nama' => $data[$i]['nama']
            );
            array_push($data_another_table,$data_person);
            $i++;
        }
        if($data[0]['id_user_role'] == ROLE_MAHASISWA){    
            $this->db->insert_batch('mahasiswa', $data_another_table);
        } elseif($data[0]['id_user_role'] == ROLE_DOSEN){    
            $this->db->insert_batch('dosen', $data_another_table);
        } elseif($data[0]['id_user_role'] == ROLE_AKADEMIK){    
            $this->db->insert_batch('akademik', $data_another_table);
        } elseif($data[0]['id_user_role'] == ROLE_KAPRODI){    
            $this->db->insert_batch('kaprodi', $data_another_table);
        } 
        
        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }

    function update($data,$id,$role){
        $this->db->trans_start();

        $this->db->where('id_user',$id);
        $this->db->update('user',$data);

        if($role == ROLE_MAHASISWA){
            $data_another_table = array(
                'nama' => $data['nama']
            );
            $this->db->where('id_user',$id);
            $this->db->update('mahasiswa', $data_another_table);
        }
        if($role == ROLE_DOSEN){
            $data_another_table = array(
                'nama' => $data['nama']
            );
            $this->db->where('id_user',$id);
            $this->db->update('dosen', $data_another_table);
        }
        if($role == ROLE_AKADEMIK){
            $data_another_table = array(
                'nama' => $data['nama']
            );
            $this->db->where('id_user',$id);
            $this->db->update('akademik', $data_another_table);
        }
        if($role == ROLE_KAPRODI){
            $data_another_table = array(
                'nama' => $data['nama']
            );
            $this->db->where('id_user',$id);
            $this->db->update('kaprodi', $data_another_table);
        }

        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }

    function checkEmail($email,$userId = 0){
        $this->db->select("email");
        $this->db->from("user");
        $this->db->where("email", $email);   
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("id_user !=", $userId);
        }
        $query = $this->db->get();

        if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
    }

    function checkUsername($username,$userId = 0){
        $this->db->select("username");
        $this->db->from("user");
        $this->db->where("username", $username);   
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("id_user !=", $userId);
        }
        $query = $this->db->get();

        if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
    }

    public function getUserTable($role){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user_role',$role);
        $this->db->where('isDeleted',0);
        $query = $this->db->get();

        return $query->result();
    }

    public function getUser($id){
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('id_user',$id);
        $this->db->where('isDeleted',0);
        $query = $this->db->get();

        return $query->result();
    }

    public function delete($id){
        $this->db->trans_start();
        
        $this->db->set('isDeleted',1);
        $this->db->where('id_user',$id);
        $this->db->update('user');

        $this->db->trans_complete();
        $result = $this->db->trans_status();
        
        return $result;
    }

}