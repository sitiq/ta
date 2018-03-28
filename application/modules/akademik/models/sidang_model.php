<?php
/**
 * Created by nad.
 * Date: 27/03/2018
 * Time: 07:10
 * Description:
 */

class sidang_model extends CI_Model
{
    function getSidangInfo($sidangId=NULL)
    {
        $this->db->select('s.id_sidang, s.status, m.nim, m.nama, m.id_mahasiswa, j.tanggal, j.ruang, j.waktu,
        ds.id_dosen, d.nama nama_dosbing');
        $this->db->from('sidang s');
        $this->db->join('mahasiswa m', 'm.id_mahasiswa = s.id_mahasiswa','left');
        $this->db->join('dosbing ds', 'ds.id_mahasiswa = m.id_mahasiswa','left');
        $this->db->join('dosen d', 'd.id_dosen = ds.id_dosen','left');
        $this->db->join('jadwal_sidang j', 'j.id_sidang = s.id_sidang','left');
        $this->db->join('anggota_sidang a', 'a.id_sidang = s.id_sidang','left');
        $this->db->group_by('m.nim');
        if ($sidangId!=null){
            $this->db->where('s.id_sidang', $sidangId);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function getDosen()
    {
        $this->db->select('id_dosen, nama');
        $this->db->from('dosen');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        return $query->result();
    }
    function getPengujiKetua()
    {
        $this->db->select('a.id_dosen, a.role, d.nama');
        $this->db->from('anggota_sidang a');
        $this->db->join('dosen d','d.id_dosen = a.id_dosen');
        $this->db->join('sidang s','s.id_sidang = a.id_sidang');
        $this->db->where('d.isDeleted', 0);
        $this->db->where('a.role', 'ketua');
        $query = $this->db->get();
        return $query->result();
    }
    function getPengujiSekre()
    {
        $this->db->select('a.id_dosen, a.role, d.nama');
        $this->db->from('anggota_sidang a');
        $this->db->join('dosen d','d.id_dosen = a.id_dosen');
        $this->db->join('sidang s','s.id_sidang = a.id_sidang');
        $this->db->where('d.isDeleted', 0);
        $this->db->where('a.role', 'sekretaris');
        $query = $this->db->get();
        return $query->result();
    }
    function getBerkas($idMhs)
    {
        $this->db->select('*');
        $this->db->from('validasi_berkas_sidang v');
        $this->db->join('berkas_sidang b','b.id_berkas_sidang = v.id_berkas_sidang');
        $this->db->where('id_sidang',$idMhs);
        $query = $this->db->get();
        return $query->result();
    }
    function accSidang($berkasInfo, $idValidSidang)
    {
        $this->db->where('id_valid_sidang', $idValidSidang);
        $this->db->update('sidang', $berkasInfo);
        return true;
    }
    function accBerkas($berkasInfo, $idValidSidang)
    {
        $this->db->where('id_valid_sidang', $idValidSidang);
        $this->db->update('validasi_berkas_sidang', $berkasInfo);
        return true;
    }
    /**
     * This function is used to decline file to system
     * @return number $insert_id : This is last inserted id
     */
    function decBerkas($berkasInfo, $idValidSidang)
    {
        $this->db->where('id_valid_sidang', $idValidSidang);
        $this->db->update('validasi_berkas_sidang', $berkasInfo);
        return true;
    }
    /**
     * This function is used to add new project to system
     * @return number $insert_id : This is last inserted id
     */
    function addPesan($pesanInfo)
    {
        $this->db->trans_start();
        $this->db->insert('log_pesan', $pesanInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function addJadwal($jadwalInfo)
    {
        $this->db->trans_start();
        $this->db->insert('jadwal_sidang', $jadwalInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function addAnggota($anggotaInfo)
    {
        $this->db->trans_start();
        $this->db->insert('anggota_sidang', $anggotaInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function addPenilaian($infoPenilaian)
    {
        $this->db->trans_start();
        $this->db->insert('penilaian', $infoPenilaian);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function addNewKomponenNilai($id)
    {
        $this->db->trans_start();
        $this->db->insert('komponen_nilai', $id);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    function editStatus($sidangInfo, $idSidang)
    {
        $this->db->where('id_sidang', $idSidang);
        $this->db->update('sidang', $sidangInfo);

        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }
    function editJadwal($jadwalInfo, $idSidang)
    {
        $this->db->where('id_sidang', $idSidang);
        $this->db->update('jadwal_sidang', $jadwalInfo);

        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }
    function editAnggota($anggotaInfo, $idRole)
    {
        $this->db->where('role', $idRole);
        $this->db->update('anggota_sidang', $anggotaInfo);

        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }
    function editKetua($ketuaInfo, $idRole)
    {
        $this->db->where('role', $idRole);
        $this->db->update('anggota_sidang', $ketuaInfo);

        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }
    function editSekre($sekreInfo, $idRole)
    {
        $this->db->where('role', $idRole);
        $this->db->update('anggota_sidang', $sekreInfo);

        if($this->db->affected_rows() >= 0){
            return true;
        }else{
            return false;
        }
    }
}