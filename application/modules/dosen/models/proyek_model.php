<?php
/**
 * Created by nad.
 * Date: 22/03/2018
 * Time: 21:15
 * Description:
 */

class proyek_model extends CI_Model
{
    function proyekList($dosen)
    {
        $this->db->select('BaseTbl.id_proyek, BaseTbl.nama, BaseTbl.klien, BaseTbl.status, Dosen.nama');
        $this->db->from('proyek as BaseTbl');
        $this->db->join('dosen as Dosen', 'Dosen.id_dosen = BaseTbl.id_proyek','left');
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->where('BaseTbl.status', 'disetujui');
        $this->db->where('BaseTbl.id_dosen', $dosen);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
    function getProyekInfo($dosenId)
    {
        $this->db->select('id_proyek, nama, klien, status, id_dosen');
        $this->db->from('proyek');
        $this->db->where('isDeleted', 0);
        $this->db->where('id_dosen', $dosenId);
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
    /**
     * This function is used to add new project to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewProject($proyekInfo)
    {
        $this->db->trans_start();
        $this->db->insert('proyek', $proyekInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

}