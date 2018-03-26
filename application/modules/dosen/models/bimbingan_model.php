<?php
/**
 * Created by nad.
 * Date: 26/03/2018
 * Time: 16:50
 * Description:
 */

class bimbingan_model extends CI_Model
{
    function getBimbingan($userId)
    {
        $this->db->select('dosbing.id_dosen, m.nim, m.nama, s.id_sidang, y.id_yudisium, t.id_ta, pr.nama nama_proyek, u.judul nama_usulan');
        $this->db->from('dosbing');
        $this->db->join('dosen d','d.id_dosen = dosbing.id_dosen');
        $this->db->join('mahasiswa m','m.id_mahasiswa = dosbing.id_mahasiswa');
        $this->db->join('sidang s','s.id_mahasiswa = m.id_mahasiswa');
        $this->db->join('yudisium y','y.id_mahasiswa = m.id_mahasiswa');
        $this->db->join('tugas_akhir t','t.id_mahasiswa = m.id_mahasiswa');
        $this->db->join('pengajuan_ta p','p.id_ta = t.id_ta');
        $this->db->join('pengajuan_ta_proyek pta','pta.id_pengajuan_ta = p.id_ta','left');
        $this->db->join('proyek pr','pr.id_proyek = pta.id_proyek');
        $this->db->join('usulan u','u.id_pengajuan_ta = p.id_ta','left');
        $this->db->where('t.status_pengambilan','terplotting');
        $this->db->where('s.status','disetujui');
        $this->db->where('y.status','disetujui');
        $this->db->where('p.status', 'diterima');
        $this->db->where('d.id_user', $userId);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
}