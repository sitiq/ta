<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends BaseController {
    public function __construct(){
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->isLoggedIn();
    }

    function coba(){
        $this->loadViews("coba");
    }

    function index(){
        $data['dataPeriode'] = $this->dashboard_model->getPeriodeAktif();
        $data['countProyek'] = $this->dashboard_model->getProyekCount();
        $data['countSidang'] = $this->dashboard_model->getSidangCount($data['dataPeriode'][0]->id_periode);
        $data['countYudisium'] = $this->dashboard_model->getYudisiumCount($data['dataPeriode'][0]->id_periode);
        
        $this->global['pageTitle'] = "Elusi : Dashboard";
        $this->loadViews("dashboard",$this->global,$data);
    }

    function pageNotFound() {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    function getNilaiPerPeriode(){
        $arrayPeriodeId = $this->dashboard_model->getArrayIdPeriode(4);
        $dataKomponen = $this->dashboard_model->getKomponenNilai();

        $arrayNilai = array();
        foreach ($dataKomponen as $komponen) {
            array_push($arrayNilai,$komponen->nama);
            foreach ($arrayPeriodeId as $id_periode) {
                $id_komponen = $komponen->id_komponen;
                
                $record = $this->dashboard_model->getPenilaian($id_periode,$id_komponen);
                $count = 1;
                $total_nilai = 0;
                if($record != FALSE) {
                    foreach ($record as $result_nilai) {
                        $total_nilai = $total_nilai + $result_nilai->nilai;
                        $count++;
                    }
                    $rata2 = $total_nilai/$count;
                    $array = array(
                        'nama_periode' => $record[0]->tahun_ajaran . ' ' . $record[0]->semester,
                        'rata2' => $rata2
                    );
                } else {
                    $array = array(
                        'nama_periode' => $record[0]->tahun_ajaran . ' ' . $record[0]->semester,
                        'rata2' => 0
                    );
                }
                array_push($arrayNilai[$komponen->nama],$array);
            }
        }


    }
}
