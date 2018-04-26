<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ta_model extends CI_Model{
    public function getTA($id = NULL){
        $this->db->select("*");
        $this->db->from('tugas_akhir ta');
        $this->db->join('mahasiswa m','m.id_mahasiswa = ta.id_mahasiswa','inner');
        $this->db->join('periode p','p.id_periode = ta.id_periode','inner');
        if($id != NULL){
            $this->db->where('id_ta',$id);
        } else {
            $this->db->order_by('ta.status_pengambilan, ta.createdDtm DESC');
        }
        $query = $this->db->get();

        return $query->result();
    }

    public function isMasaRegisTA(){
        $this->db->select("*");
        $this->db->from("periode");
        $this->db->where("status_periode",1);
        $result = $this->db->get()->result();
        
        $tanggal_sekarang = date("Y-m-d");
        $status_regis_ta = $tanggal_sekarang >= $result[0]->tgl_awal_regis_ta && $tanggal_sekarang <= $result[0]->tgl_akhir_regis_ta;
    
        return $status_regis_ta;
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

    public function getProyek($id_proyek = NULL){
        if($id_proyek == NULL) {
            $query = $this->db->query
            (
                'SELECT *,p.nama nama_proyek,d.nama nama_dosen FROM proyek p
                INNER JOIN dosen d ON d.id_dosen = p.id_dosen
                WHERE p.id_proyek 
                NOT IN (
                SELECT id_proyek FROM pengajuan_ta pt WHERE pt.status = \'diterima\' AND id_proyek IS NOT NULL
                ) AND p.status = \'disetujui\''
            );
        }
        
        if($id_proyek != NULL){
            $this->db->select("*,p.nama nama_proyek,d.nama nama_dosen");
            $this->db->from('proyek p');
            $this->db->join('dosen d','d.id_dosen = p.id_dosen','inner');
            $this->db->where('id_proyek',$id_proyek);
            $query = $this->db->get();
        }

        return $query->result();
    }

    public function getUsulan($id_pengajuan_ta){
        $this->db->select("*");
        $this->db->from('usulan');
        $this->db->where('id_pengajuan_ta',$id_pengajuan_ta);
        $query = $this->db->get();

        return $query->result();
    }

    public function getDosen($id_dosen = NULL){
        $this->db->select("*");
        $this->db->from('dosen');
        $this->db->where('isDeleted',0);
        if($id_dosen != NULL){
            $this->db->where('id_dosen',$id_dosen);
        }
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

    public function terima_ta($id_ta,$id_pengajuan_ta = NULL,$id_mahasiswa,$data,$id_proyek = NULL,$id_dosen = NULL){
        $this->db->trans_start();

        if($id_pengajuan_ta != NULL){
            /* Update tabel pengajuan_ta*/
            $this->db->where('id_pengajuan_ta',$id_pengajuan_ta);
            $this->db->update('pengajuan_ta',$data);

            $this->db->where('id_pengajuan_ta !=', $id_pengajuan_ta);
            $this->db->where('id_ta',$id_ta);
            $this->db->delete('pengajuan_ta');
        } else {
            $this->db->where('id_ta',$id_ta);
            $this->db->delete('pengajuan_ta',$data_another_row);
            
            /* Insert tabel pengajuan_ta */
            $this->db->insert('pengajuan_ta',$data);
        }
        
        
        /* Update tabel tugas_akhir*/
        $data_ta = array(
            'status_pengambilan' => 'terplotting'
        );
        
        $this->db->where('id_ta',$id_ta);
        $this->db->update('tugas_akhir',$data_ta);
        
        if($id_proyek != NULL){
            $result = $this->getProyek($id_proyek);
            $judul_ta = $result[0]->nama_proyek;
            $nama_dosen = $result[0]->nama_dosen;

            /* Insert tabel dosbing*/
            $data_dosbing = array(
                'id_dosen' => $result[0]->id_dosen,
                'id_mahasiswa' => $id_mahasiswa
            );
            $this->db->insert('dosbing',$data_dosbing);

        } elseif($id_dosen != NULL) {
            $this->db->where('id_pengajuan_ta',$id_pengajuan_ta);
            $this->db->update('usulan',array('id_dosen' => $id_dosen));

            $result = $this->getUsulan($id_pengajuan_ta);
            $judul_ta = $result[0]->judul;
            $nama_dosen = $this->getDosen($id_dosen)[0]->nama;

            /* Insert tabel dosbing*/
            $data_dosbing = array(
                'id_dosen' => $id_dosen,
                'id_mahasiswa' => $id_mahasiswa
            );
            $this->db->insert('dosbing',$data_dosbing);
        }

        /* Insert tabel log */
        $data_log = array(
            'id_mahasiswa' => $id_mahasiswa,
            'nama' => 'Tugas akhir terplotting',
            'deskripsi' => 'Tugas akhir anda telah terplotting dengan judul dan dosbing sebagai berikut<br>
                            <table>
                            <tr>
                            <td style="padding: 5px;" ><h4>Judul</h4></td>
                            <td style="padding: 5px;" ><h4>:</h4></td>
                            <td style="padding: 5px;" ><h4><strong>'. $judul_ta .'</strong></h4></td>
                            </tr>
                            </tr>
                            <td style="padding: 5px;" ><h4>Dosen Pembimbing</h4></td>
                            <td style="padding: 5px;" ><h4>:</h4></td>
                            <td style="padding: 5px;" ><h4><strong>'. $nama_dosen .'</strong></h4></td>
                            <tr>
                            </table> '
        );

        $this->db->insert('log_pesan',$data_log);

       
        $this->db->trans_complete();
        
        $result = $this->db->trans_status();
        
        return $result;
    }

    public function edit_dosbing($id_mahasiswa, $id_pengajuan_ta, $id_dosen){
        $this->db->trans_start();

        /* Update tabel dosbing */
        $this->db->where('id_mahasiswa',$id_mahasiswa);
        $this->db->update('dosbing',array('id_dosen' => $id_dosen));

        /* Update tabel usulan */
        $this->db->where('id_pengajuan_ta',$id_pengajuan_ta);
        $this->db->update('usulan',array('id_dosen' => $id_dosen));

        $this->db->trans_complete();

        $result = $this->db->trans_status();
        
        return $result;
    }
}