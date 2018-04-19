<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
    public function getPeriodeAktif(){
        $this->db->select("*");
        $this->db->from('periode');
        $this->db->where('isDeleted',0);
        $this->db->where('status_periode',1);
        $query = $this->db->get();
        if( $query->num_rows() > 0 ){ return $query->result(); } else { return FALSE; }
    }

    public function getProyekCount(){
        $this->db->select("*");
        $this->db->from('proyek p');
        $this->db->join('dosen d','p.id_dosen=d.id_dosen','inner');
        $this->db->where('p.isDeleted',0);

        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getSidangCount($id_periode){
        $this->db->select("*");
        $this->db->from('sidang');
        $this->db->where('id_periode',$id_periode);
        
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getYudisiumCount($id_periode){
        $this->db->select("*");
        $this->db->from('yudisium');
        $this->db->where('id_periode',$id_periode);
        
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getPeriodeId($semester,$tahun_ajaran){
        $this->db->select("id_periode");
        $this->db->from('periode');
        $this->db->where('semester',$semester);
        $this->db->where('tahun_ajaran',$tahun_ajaran);
        $this->db->where('jenis','ta');
        $query = $this->db->get();

        if( $query->num_rows() > 0 ){ return $query->result()[0]->id_periode; } else { return FALSE; }
    }

    public function getArrayIdPeriode($count) {
        $this->db->select("*");
        $this->db->from('periode');
        $this->db->where('status_periode','1');

        $query = $this->db->get();
        
        if($query->num_rows() > 0) { $periode = $query->result(); } else { return FALSE; }
        $semester = $periode[0]->semester;
        $tahun_ajaran = $periode[0]->tahun_ajaran;

        $thn1 = explode('/',$tahun_ajaran)[0];
        $thn2 = explode('/',$tahun_ajaran)[1];

        //Genap 2017/2018
        $array_id_periode = array();
        array_push($array_id_periode,$periode[0]->id_periode);
        for ($i=1; $i <= $count-1; $i++) {
            if($recent_semester == 'ganjil'){
                $thn1 = $thn1 - 1;
                $thn2 = $thn2 - 1;
                $tahun_ajaran = $thn1 . '/' . $thn2;
                $id_periode = $this->getPeriodeId('genap',$tahun_ajaran);
                if($id_periode != FALSE) {
                    array_push($array_id_periode,$id_periode);
                } else {
                    break;
                }
            } else {
                $id_periode = $this->getPeriodeId('ganjil',$tahun_ajaran);
                if($id_periode != FALSE) {
                    array_push($array_id_periode,$id_periode);
                } else {
                    break;
                }
            }
        }
        return $array_id_periode;
    }

    public function getPenilaian($id_periode,$id_komponen){
        $this->db->select('*');
        $this->db->from('periode p');
        $this->db->join('sidang s','p.id_periode=s.id_periode','inner');
        $this->db->join('penilaian pn','pn.id_sidang=s.sidang','inner');
        $this->db->join('komponen_nilai kn','k.id_penilaian=pn.id_penilaian','inner');
        $this->db->join('komponen k','k.id_komponen=kn.id_komponen','inner');
        $this->db->where('p.id_periode',$id_periode);
        $this->db->where('k.id_komponen',$id_komponen);
        $query = $this->db->get();

        if($query->num_rows > 0){ return $query->result(); } else { return FALSE; }
    }
}
