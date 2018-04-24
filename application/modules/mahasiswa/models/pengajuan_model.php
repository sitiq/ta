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
     * This function is used to get the periode to access page
     * @return array $result : This is result
     */
    function getPeriode(){
        $this->db->select('id_periode, status_periode, tgl_awal_regis_ta, tgl_akhir_regis_ta');
        $this->db->from('periode');
        $this->db->where('isDeleted',0);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    /**
     * This function is used to get the proyek list
     * @return array $result : This is result
     * where proyek = disetujui AND status pengajuan_ta != diterima AND sidang status_pengambilan != 'terplotting'
     */
    function getProyek()
    {
        $query = $this->db->query
        (
            'SELECT * FROM proyek 
                WHERE id_proyek IN 
                (SELECT a.id_proyek FROM pengajuan_ta a WHERE a.id_proyek 
                NOT IN 
                (SELECT id_proyek FROM pengajuan_ta b WHERE b.status = \'diterima\')) 
                OR id_proyek NOT IN 
                (SELECT id_proyek FROM pengajuan_ta)
                AND proyek.status = \'disetujui\''
        );

        $result = $query->result();
        return $result;
    }
    /**
     * This function is used to get the tugas_akhir by id_mahasiswa
     * @return array $result : This is result
     */
    function getTa($id_mahasiswa)
    {
        $this->db->select('ta.id_ta, pt.id_pengajuan_ta, pt.pilihan, pt.jenis, p.id_proyek, p.nama, u.id_usulan, u.judul, u.deskripsi, u.bisnis_rule, u.file_persetujuan');
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
    /**
     * This function is used to get id_mahasiswa who is logged in
     * @param $userId : This is input id_user
     * @return array $result : This is result
     */
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
    /**
     * This function is used to add data to pengajuan_ta table
     * @param $pengajuan_ta : This is input pengajuan_ta
     * @return array $insert_id : This is get new id_pengajuan_ta
     */
    function addNewPengajuanTa($pengajuan_ta) {
        $this->db->trans_start();
        $this->db->insert('pengajuan_ta', $pengajuan_ta);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }
    /**
     * This function is used to add data to usulan table
     * @param $usulan : This is input usulan
     * @return array $insert_id : This is get new usulan
     */
    function addNewUsulan($usulan) {
        $this->db->trans_start();
        $this->db->insert('usulan', $usulan);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }
    /**
     * This function is used to edit data to pengajuan_ta table
     * @param $pengajuan_ta : This is input pengajuan array
     * @param $id_pengajuan_ta : This is input id_pengajuan_ta where to update
     * @return : true
     */
    function editPengajuanTa($pengajuan_ta, $id_pengajuan_ta) {

        $this->db->where('id_pengajuan_ta', $id_pengajuan_ta);
        $this->db->update('pengajuan_ta', $pengajuan_ta);

        return TRUE;
    }
    /**
     * This function is used to edit data to usulan table
     * @param $usulan : This is input usulan array
     * @param $id_usulan : This is input id_usulan where to update
     * @return : true
     */
    function editUsulan($usulan, $id_usulan) {

        $this->db->where('id_usulan', $id_usulan);
        $this->db->update('usulan', $usulan);

        return TRUE;
    }
}