<?php
/**
 * Created by nad.
 * Date: 25/03/2018
 * Time: 06:33
 * Description:
 */

class yudisium_model extends BaseController
{
    function getBerkasInfo()
    {
        $this->db->select('berkas.id_berkas_yudisium, berkas.nama_berkas, val.isValid, val.path');
        $this->db->from('berkas_yudisium berkas');
        $this->db->join('validasi_berkas_yudisium val','val.id_berkas_yudisium = berkas.id_berkas_yudisium');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }
}