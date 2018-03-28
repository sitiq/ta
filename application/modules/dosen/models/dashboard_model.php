<?php
/**
 * Created by nad.
 * Date: 27/03/2018
 * Time: 23:14
 * Description:
 */

class dashboard_model extends CI_Model
{
    function getCountBimbingan($userId)
    {
        $this->db->select('d.*, ds.id_user');
        $this->db->from('dosbing d');
        $this->db->join('dosen ds', 'ds.id_dosen = d.id_dosen');
        $this->db->where('ds.isDeleted', 0);
        $this->db->where('ds.id_user', $userId);

        $query = $this->db->get();
        return count($query->result());
    }
    function getCountPendadaran($userId)
    {
        $this->db->select('a.id_dosen');
        $this->db->from('anggota_sidang a');
        $this->db->join('dosen ds', 'ds.id_dosen = a.id_dosen');
        $this->db->where('ds.isDeleted', 0);
        $this->db->where('ds.id_user', $userId);

        $query = $this->db->get();
        return count($query->result());
    }
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