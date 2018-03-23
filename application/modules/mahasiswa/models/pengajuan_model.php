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
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
}