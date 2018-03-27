<?php
/**
 * Created by nad.
 * Date: 26/03/2018
 * Time: 21:25
 * Description:
 */

class yudisium_model extends CI_Model
{
    function getYudisiumInfo($yudisiumId=NULL)
    {
        $this->db->select('y.id_yudisium, y.status, m.nim, m.nama, m.id_mahasiswa');
        $this->db->from('yudisium y');
        $this->db->join('mahasiswa as m', 'm.id_mahasiswa = y.id_mahasiswa','left');
        if ($yudisiumId!=null){
            $this->db->where('id_yudisium', $yudisiumId);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function getBerkas($idMhs)
    {
        $this->db->select('*');
        $this->db->from('validasi_berkas_yudisium v');
        $this->db->join('berkas_yudisium b','b.id_berkas_yudisium = v.id_berkas_yudisium');
        $this->db->where('id_yudisium',$idMhs);
        $query = $this->db->get();
        return $query->result();
    }
    function accBerkas($berkasInfo, $idValidYudisium)
    {
        $this->db->where('id_valid_yudisium', $idValidYudisium);
        $this->db->update('validasi_berkas_yudisium', $berkasInfo);
        return true;
    }
    function addLogPesan($yudisiumInfo)
    {
        $this->db->trans_start();
        $this->db->insert('log_pesan', $yudisiumInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
}