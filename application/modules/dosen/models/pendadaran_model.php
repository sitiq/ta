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
        $this->db->select('j.tanggal, j.waktu, j.ruang, m.nim, m.nama, v.path, 
        p.id_penilaian, s.nilai_akhir_sidang, p.nilai_akhir_dosen');
        $this->db->from('sidang s');
        $this->db->join('mahasiswa m', 'm.id_mahasiswa = s.id_mahasiswa');
        $this->db->join('jadwal_sidang j', 'j.id_sidang = s.id_sidang');
        $this->db->join('validasi_berkas_sidang v', 'v.id_sidang = s.id_sidang');
        $this->db->join('anggota_sidang a', 'a.id_sidang = s.id_sidang');
        $this->db->join('penilaian p', 'p.id_anggota_sidang = a.id_anggota_sidang');
        $this->db->join('dosen d', 'd.id_dosen = a.id_dosen');
        $this->db->join('user u', 'u.id_user = d.id_user');
        $this->db->where('u.id_user',$userId);
        $this->db->where('v.id_berkas_sidang',8);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    function getMahasiswaInfo()
    {
        $this->db->select('s.id_sidang, m.id_mahasiswa');
        $this->db->from('sidang s');
        $this->db->join('mahasiswa m','m.id_mahasiswa = s.id_mahasiswa');

        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function getNilaiInfo($userId)
    {
        $this->db->select('p.id_sidang, p.id_penilaian, p.nilai_akhir_dosen, k.id_komponen, k.nama nama_nilai,
         kn.id_komponen_nilai, kn.nilai, a.id_anggota_sidang');
        $this->db->from('penilaian p');
        $this->db->join('anggota_sidang a', 'a.id_anggota_sidang = p.id_anggota_sidang');
        $this->db->join('dosen d', 'd.id_dosen = a.id_dosen');
        $this->db->join('user u', 'u.id_user = d.id_user');
        $this->db->join('komponen_nilai kn', 'kn.id_penilaian = p.id_penilaian');
        $this->db->join('komponen k', 'k.id_komponen = kn.id_komponen');
        $this->db->where('u.id_user',$userId);
        $this->db->where('k.isDeleted',0);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    function getRevisiInfo($userId)
    {
        $this->db->select('r.path');
        $this->db->from('revisi_sidang r');
        $this->db->join('anggota_sidang a', 'a.id_anggota_sidang = r.id_anggota_sidang');
        $this->db->join('dosen d', 'd.id_dosen = a.id_dosen');
        $this->db->join('user u', 'u.id_user = d.id_user');
        $this->db->where('u.id_user',$userId);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function editKomponenNilai($data, $idKomponenNilai)
    {
        $this->db->where('id_komponen_nilai', $idKomponenNilai);
        $this->db->update('komponen_nilai', $data);
        return TRUE;
    }

    function editPenilaian($total, $penilaianId)
    {
        $this->db->set('nilai_akhir_dosen',$total);
        $this->db->where('id_penilaian', $penilaianId);
        $this->db->update('penilaian');
        return TRUE;
    }
    function editSidang($nilaiAkhir, $sidangId)
    {
        $this->db->set('nilai_akhir_sidang', "nilai_akhir_sidang + $nilaiAkhir", false);
        $this->db->where('id_sidang', $sidangId);
        $this->db->update('sidang');
        return TRUE;
    }
    function addNewRevisi($revisiInfo)
    {
        $this->db->trans_start();
        $this->db->insert('revisi_sidang', $revisiInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function addPesan($pesanInfo)
    {
        $this->db->trans_start();
        $this->db->insert('log_pesan', $pesanInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
}