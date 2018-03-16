<?php
/**
 * Created by nad.
 * Date: 16/03/2018
 * Time: 09:52
 * Description:
 */

class Profil_model extends CI_Model
{
    function getProfilMhs($id)
    {
        $this->db->select('id_mahasiswa, nim, nama, foto, jumlah_sks, ipk, email, mobile, skill, pengalaman');
        $this->db->from('mahasiswa');
        $this->db->where('id_mahasiswa', $id);
        $query = $this->db->get();

        return $query->result();
    }
}