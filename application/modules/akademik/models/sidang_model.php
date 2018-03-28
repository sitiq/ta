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
        $this->db->select('s.id_sidang, s.status, m.nim, m.nama, m.id_mahasiswa');
        $this->db->from('sidang s');
        $this->db->join('mahasiswa as m', 'm.id_mahasiswa = s.id_mahasiswa','left');
        if ($sidangId!=null){
            $this->db->where('id_sidang', $sidangId);
        }
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
}