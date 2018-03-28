<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ta_model extends CI_Model{
    public function getTA($id = NULL){
        $this->db->select("*");
        $this->db->from('tugas_akhir ta');
        $this->db->join('mahasiswa m','m.id_mahasiswa = ta.id_mahasiswa','inner');
        $this->db->join('periode p','p.id_periode = ta.id_periode','inner');
        if($id != NULL){
            $this->db->where('id_ta',$id);
        }
        $query = $this->db->get();

        return $query->result();
    }

    public function getPengajuanTA($id_ta,$status = NULL){
        $this->db->select("*");
        $this->db->from('pengajuan_ta');
        $this->db->where('id_ta',$id_ta);
        if($status != NULL){
            $this->db->where('status',$status);
        }
        $this->db->order_by('pilihan', 'ASC');
        $query = $this->db->get();

        return $query->result();
    }

    public function getProyek($id_proyek){
        $this->db->select("*,p.nama nama_proyek,d.nama nama_dosen");
        $this->db->from('proyek p');
        $this->db->join('dosen d','d.id_dosen = p.id_dosen','inner');
        $this->db->where('id_proyek',$id_proyek);
        $query = $this->db->get();

        return $query->result();
    }

    public function getUsulan($id_pengajuan_ta){
        $this->db->select("*");
        $this->db->from('usulan');
        $this->db->where('id_pengajuan_ta',$id_pengajuan_ta);
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

    public function check_proyek($id_proyek){
        $this->db->select("*");
        $this->db->from('pengajuan_ta');
        $this->db->where('id_proyek',$id_proyek);
        $this->db->where('status','diterima');
        $query = $this->db->get();

        if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
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

    public function accept_status($id_ta,$id_pengajuan_ta,$id_mahasiswa,$data){
        $this->db->trans_start();
        /* Update tabel pengajuan_ta*/
        $this->db->where('id_pengajuan_ta',$id_pengajuan_ta);
        $this->db->update('pengajuan_ta',$data);

        $data_another_row = array(
            'status' => 'ditolak'
        );
        $this->db->where('id_pengajuan_ta !=', $id_pengajuan_ta);
        $this->db->where('id_ta',$id_ta);
        $this->db->update('pengajuan_ta',$data_another_row);
        
        /* Update tabel tugas_akhir*/
        $data_ta = array(
            'status_pengambilan' => 'terplotting'
        );
        
        $this->db->where('id_ta',$id_ta);
        $this->db->update('tugas_akhir',$data_ta);
        
        $this->db->select('*');
        $this->db->from('pengajuan_ta');
        $this->db->where('id_pengajuan_ta',$id_pengajuan_ta);
        $query = $this->db->get();
        
        if($query->result()[0]->jenis == 'proyek'){
            $result = $this->getProyek($query->result()[0]->id_proyek);
            $judul_ta = $result[0]->nama_proyek;
            $nama_dosen = $result[0]->nama_dosen;

            /* Insert tabel dosbing*/
            $data_dosbing = array(
                'id_dosen' => $result[0]->id_dosen,
                'id_mahasiswa' => $id_mahasiswa
            );
            $this->db->insert('dosbing',$data_dosbing);

        } else {
            $result = $this->getUsulan($id_pengajuan_ta);
            $judul_ta = $result[0]->judul;
            $nama_dosen = $this->getDosen($result[0]->id_dosen);

            /* Insert tabel dosbing*/
            $data_dosbing = array(
                'id_dosen' => $result[0]->id_dosen,
                'id_mahasiswa' => $id_mahasiswa
            );
            $this->db->insert('dosbing',$data_dosbing);
        }

        /* Insert tabel log */
        $data_log = array(
            'id_mahasiswa' => $id_mahasiswa,
            'nama' => 'Tugas akhir terplotting',
            'deskripsi' => 'Tugas akhir anda telah terplotting <br>
                            <table>
                            <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td><strong>'. $judul_ta .'</strong></td>
                            <tr>
                            <tr>
                            <td>Dosen Pembimbing</td>
                            <td>:</td>
                            <td><strong>'. $nama_dosen .'</strong></td>
                            <tr>
                            </table> '
        );

        $this->db->insert('log_pesan',$data_log);

       
        $this->db->trans_complete();
        
        $result = $this->db->trans_status();
        
        return $result;
    }
}