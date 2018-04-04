<?php
/**
 * Created by nad.
 * Date: 27/03/2018
 * Time: 07:10
 * Description:
 */

class sidang_model extends CI_Model
{
    /**
     * This function is used to get the mahasiswa sidang list
     * @param number $sidangId : This is get to know where is want to get data
     * @return array $result : This is result
     */
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
    /**
     * This function is used to get the dosen info
     * @return array $result : This is result
     */
    function getDosen($id_dosbing)
    {
        $this->db->select('id_dosen, nama');
        $this->db->from('dosen');
        $this->db->where('isDeleted', 0);
        $this->db->where_not_in('id_dosen', $id_dosbing);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * This function is used to get the anggota_sidang info where is ketua
     * @return array $result : This is result
     */
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
    /**
     * This function is used to get the anggota_sidang info where is sekretaris
     * @return array $result : This is result
     */
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
    /**
     * This function is used to get the berkas info
     * @param number $idMhs : This is id mahasiswa having berkas
     * @return array $result : This is result
     */
    function getBerkas($idMhs)
    {
        $this->db->select('*');
        $this->db->from('validasi_berkas_sidang v');
        $this->db->join('berkas_sidang b','b.id_berkas_sidang = v.id_berkas_sidang');
        $this->db->where('id_sidang',$idMhs);
        $query = $this->db->get();
        return $query->result();
    }
    /**
     * This function is used to edit status sidang to be accepted
     * @param array $berkasInfo : Status where accepted
     * @param array $idValidSidang : Where is id wanna change to be accepted
     * @return bool true : where affected row increase
     */
    function accSidang($berkasInfo, $idValidSidang)
    {
        $this->db->where('id_valid_sidang', $idValidSidang);
        $this->db->update('sidang', $berkasInfo);
        return true;
    }
    /**
     * This function is used to edit status berkas sidang to accepted
     * @param array $berkasInfo : Status where accepted
     * @param array $idValidSidang : Where is id wanna change to be accepted
     * @return bool true : where affected row increase
     */
    function accBerkas($berkasInfo, $idValidSidang)
    {
        $this->db->where('id_valid_sidang', $idValidSidang);
        $this->db->update('validasi_berkas_sidang', $berkasInfo);
        return true;
    }
    /**
     * This function is used to edit status berkas sidang to declined
     * @param array $berkasInfo : Status where declined
     * @param array $idValidSidang : Where is id wanna change to be declined
     * @return bool true : where affected row increase
     */
    function decBerkas($berkasInfo, $idValidSidang)
    {
        $this->db->where('id_valid_sidang', $idValidSidang);
        $this->db->update('validasi_berkas_sidang', $berkasInfo);
        return true;
    }
    /**
     * This function is used to add new pesan to system
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
    /**
     * This function is used to add new scehdule to system
     * @return number $insert_id : This is last inserted id
     */
    function addJadwal($jadwalInfo)
    {
        $this->db->trans_start();
        $this->db->insert('jadwal_sidang', $jadwalInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    /**
     * This function is used to add new member to system
     * @return number $insert_id : This is last inserted id
     */
    function addAnggota($anggotaInfo)
    {
        $this->db->trans_start();
        $this->db->insert('anggota_sidang', $anggotaInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    /**
     * This function is used to add new average total 3 dosen to system
     * @return number $insert_id : This is last inserted id
     */
    function addPenilaian($infoPenilaian)
    {
        $this->db->trans_start();
        $this->db->insert('penilaian', $infoPenilaian);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    /**
     * This function is used to add new 10 list
     * @return number $insert_id : This is last inserted id
     */
    function addNewKomponenNilai($id)
    {
        $this->db->trans_start();
        $this->db->insert('komponen_nilai', $id);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    /**
     * This function is used to edit status berkas sidang to declined
     * @param array $sidangInfo : Status where declined
     * @param array $idSidang : Where is id wanna change to be declined
     * @return bool true : where affected row increase
     */
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
    /**
     * This function is used to edit jadwal sidang and status sidang become accepted
     * @param array $jadwalInfo : jadwal where plotting
     * @param array $idValidSidang : Where is id wanna change to be declined
     * @return bool true : where affected row increase
     */
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
    /**
     * This function is used to edit anggota sidang
     * @param array $anggotaInfo : info anggota sidang
     * @param array $idRole : Where is role wanna change to be declined
     * @return bool true : where affected row increase
     */
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
    /**
     * This function is used to edit ketua sidang
     * @param array $anggotaInfo : info ketua sidang
     * @param array $idRole : Where is role wanna change to be declined
     * @return bool true : where affected row increase
     */
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
    /**
     * This function is used to edit sekretaris sidang
     * @param array $anggotaInfo : info sekretaris sidang
     * @param array $idRole : Where is role wanna change to be declined
     * @return bool true : where affected row increase
     */
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