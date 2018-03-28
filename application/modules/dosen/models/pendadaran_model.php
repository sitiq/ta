<?php
/**
 * Created by nad.
 * Date: 26/03/2018
 * Time: 13:56
 * Description:
 */

class pendadaran_model extends CI_Model
{
    function getSidang($userId)
    {
        $this->db->select('sidang.id_sidang,j.tanggal, j.waktu, j.ruang, m.nim, m.nama, sidang.nilai_akhir_sidang, v.path');
        $this->db->from('sidang');
        $this->db->join('anggota_sidang a','a.id_sidang = sidang.id_sidang');
        $this->db->join('jadwal_sidang j','j.id_sidang = sidang.id_sidang');
        $this->db->join('validasi_berkas_sidang v','v.id_sidang = sidang.id_sidang');
        $this->db->join('mahasiswa m','m.id_mahasiswa = sidang.id_mahasiswa');
        $this->db->join('dosen d','d.id_dosen = a.id_dosen');
        $this->db->where('d.id_user', $userId);
        $this->db->where('sidang.status', 'disetujui');
        $this->db->where('v.id_berkas_sidang', 8);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
}