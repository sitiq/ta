<?php
/**
 * Created by nad.
 * Date: 27/03/2018
 * Time: 23:14
 * Description:
 */

class dashboard_model extends CI_Model
{
    /**
     * This function is used to get total bimbingan mahasiswa
     * @param number $userId : This is get from user who is logged in
     * @return array $result : This is result
     */
    function getCountBimbingan($userId)
    {
        $this->db->select('d.*, ds.id_user');
        $this->db->from('dosbing d');
        $this->db->join('dosen ds', 'ds.id_dosen = d.id_dosen');
        $this->db->join('mahasiswa m', 'm.id_mahasiswa = d.id_mahasiswa');
        $this->db->join('tugas_akhir ta', 'ta.id_mahasiswa = m.id_mahasiswa');
        $this->db->join('periode p', 'p.id_periode = ta.id_periode');
        $this->db->where('p.status_periode', 1);
        $this->db->where('ds.isDeleted', 0);
        $this->db->where('ds.id_user', $userId);

        $query = $this->db->get();
        return count($query->result());
    }
    /**
     * This function is used to get total pendadaran mahasiswa
     * @param number $userId : This is get from user who is logged in
     * @return array $result : This is result
     */
    function getCountPendadaran($userId)
    {
        $this->db->select('a.id_dosen');
        $this->db->from('anggota_sidang a');
        $this->db->join('dosen ds', 'ds.id_dosen = a.id_dosen');
        $this->db->join('sidang s', 's.id_sidang = a.id_sidang');
        $this->db->join('periode p', 'p.id_periode = s.id_periode');
        $this->db->where('p.status_periode', 1);
        $this->db->where('s.status', 'disetujui');
        $this->db->where('ds.isDeleted', 0);
        $this->db->where('ds.id_user', $userId);

        $query = $this->db->get();
        return count($query->result());
    }
    /**
     * This function is used to get total project
     * @param number $userId : This is get from user who is logged in
     * @return array $result : This is result
     */
    function getCountProyek($userId)
    {
        $this->db->select('p.id_dosen');
        $this->db->from('proyek p');
        $this->db->join('dosen ds', 'ds.id_dosen = p.id_dosen');
        $this->db->where('ds.isDeleted', 0);
        $this->db->where('ds.id_user', $userId);

        $query = $this->db->get();
        return count($query->result());
    }

}