<?php
/**
 * Created by nad.
 * Date: 22/03/2018
 * Time: 13:15
 * Description:
 */

class pengajuan_model extends CI_Model
{
    /**
     * This function is used to get the mahasiswa listing count
     * @param string $searchText : This is optional search text
     * @return array $result : This is result
     */
    function getProyek()
    {
        $this->db->select('id_proyek, id_dosen, nama');
        $this->db->from('proyek');
        $this->db->where('status', 'disetujui');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function getTa($id_mahasiswa)
    {
        $this->db->select('ta.id_ta, pt.id_pengajuan_ta, pt.pilihan, pt.jenis, p.id_proyek, p.nama, u.id_usulan, u.judul, u.deskripsi, u.bisnis_rule, u.file');
        $this->db->from('tugas_akhir as ta');
        $this->db->join('pengajuan_ta as pt', 'pt.id_ta=ta.id_ta');
        $this->db->join('proyek as p', 'pt.id_proyek=p.id_proyek', 'left');
        $this->db->join('usulan as u', 'pt.id_pengajuan_ta=u.id_pengajuan_ta', 'left');
        $this->db->where('ta.id_mahasiswa', $id_mahasiswa);
        $this->db->or_where('u.isDeleted', 0);
        $this->db->order_by('pt.pilihan');
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function getIdMahasiswa($userId)
    {
        $this->db->select('id_mahasiswa');
        $this->db->from('mahasiswa');
        $this->db->where('id_user', $userId);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    /**
     * This function is used to add data to tugas_akhir table
     * @param $ta_info : This is input ta_info
     * @return array $insert_id : This is get new id_ta
     */
    function addNewTa($ta) {
        $this->db->trans_start();
        $this->db->insert('tugas_akhir', $ta);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    function addNewPengajuanTa($pengajuan_ta) {
        $this->db->trans_start();
        $this->db->insert('pengajuan_ta', $pengajuan_ta);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    function addNewUsulan($usulan) {
        $this->db->trans_start();
        $this->db->insert('usulan', $usulan);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    function editPengajuanTa($pengajuan_ta, $id_pengajuan_ta) {

        $this->db->where('id_pengajuan_ta', $id_pengajuan_ta);
        $this->db->update('pengajuan_ta', $pengajuan_ta);

        return TRUE;
    }

    function editPengajuanTaProyek($pengajuan_ta_proyek, $id_pengajuan_ta_proyek) {

        $this->db->where('id_pengajuan_ta_proyek', $id_pengajuan_ta_proyek);
        $this->db->update('pengajuan_ta_proyek', $pengajuan_ta_proyek);

        return TRUE;
    }

    function editUsulan($usulan, $id_usulan) {

        $this->db->where('id_usulan', $id_usulan);
        $this->db->update('usulan', $usulan);

        return TRUE;
    }
}