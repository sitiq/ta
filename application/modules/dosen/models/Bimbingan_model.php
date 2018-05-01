<?php
/**
 * Created by nad.
 * Date: 26/03/2018
 * Time: 16:50
 * Description:
 */

class Bimbingan_model extends CI_Model
{
    /**
     * This function is used to get the bimbingan list
     * @param number $userId : This is get from user who is logged in
     * @return array $result : This is result
     */
    function getBimbingan($userId)
    {
        $this->db->select('m.id_mahasiswa, m.nim, m.nama, p.nama nama_proyek, u.judul nama_usulan, 
                           s.id_sidang, t.id_ta, y.id_yudisium');
        $this->db->from('dosbing ds');
        $this->db->join('dosen d','d.id_dosen = ds.id_dosen');
        $this->db->join('proyek p','p.id_dosen = ds.id_dosen');
        $this->db->join('mahasiswa m','m.id_mahasiswa = ds.id_mahasiswa');
        $this->db->join('tugas_akhir t','t.id_mahasiswa = m.id_mahasiswa','left');
        $this->db->join('sidang s','s.id_mahasiswa = m.id_mahasiswa','left');
        $this->db->join('yudisium y','y.id_mahasiswa = m.id_mahasiswa','left');
        $this->db->join('pengajuan_ta ta','ta.id_ta = t.id_ta','left');
        $this->db->join('usulan u','u.id_pengajuan_ta = ta.id_pengajuan_ta','left');
        $this->db->group_by('m.nama');
        $this->db->where('d.id_user', $userId);
        $this->db->where('p.status', 'disetujui');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    /**
     * This function is used to get the detail mahasiswa
     * @param number $idMhs : This is get mahasiswa by id
     * @return array $result : This is result
     */
    function getMahasiswa($idMhs)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('id_mahasiswa',$idMhs);
        $query = $this->db->get();

        return $query->result();
    }
}