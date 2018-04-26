<?php
/**
 * Created by nad.
 * Date: 27/03/2018
 * Time: 07:10
 * Description:
 */

class Yudisium extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->load->model('yudisium_model');
        $this->isLoggedIn();
    }

    function index()
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $data['yudisiumInfo'] = $this->yudisium_model->getYudisiumInfo();
            $this->loadViews("dashboard_yudisium", $this->global, $data, NULL);
        }
    }
    function detail($yudisiumId = NULL)
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($yudisiumId == null)
            {
                redirect('akademik/yudisium');
            }
            $data['yudisiumInfo'] = $this->yudisium_model->getYudisiumInfo($yudisiumId);
            $data['berkasInfo'] = $this->yudisium_model->getBerkas($yudisiumId);
            $this->loadViews("edit_yudisium", $this->global, $data, NULL);
        }
    }
    function accept($idValidYudisium=null, $idYudisium)
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            if (!empty($idValidYudisium)) {
                $berkasInfo = array(
                    'id_valid_yudisium' => $idValidYudisium,
                    'isValid' => 2,
                );

                $result = $this->yudisium_model->accBerkas($berkasInfo, $idValidYudisium);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'Berkas diterima');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menerima berkas');
                }
                redirect('akademik/yudisium/detail/'.$idYudisium);
//                $this->detail($idMhs);
            }
        }
    }
    /**
     * This function is used to add new message to the system
     */
    function pesan($idValidYudisium=null , $idYudisium)
    {
        if($this->isAkademik() == TRUE)
        {$this->loadThis();}
        else
        {
            $this->load->library('form_validation');
            $idMhs = $this->input->post('id_mahasiswa');
            $this->form_validation->set_rules('nama','Judul','trim|required|max_length[128]');
            $this->form_validation->set_rules('deskripsi','Pesan','trim|required|max_length[128]');
            if($this->form_validation->run() == FALSE)
            {$this->detail($idYudisium);}
            else
            {
                if (!empty($idValidYudisium)) {
                    $berkasInfo = array(
                        'id_valid_yudisium' => $idValidYudisium,
                        'isValid' => 3,
                    );
                    $result = $this->yudisium_model->decBerkas($berkasInfo, $idValidYudisium);
                    if ($result == true) {
                        $this->session->set_flashdata('success', 'Berkas berhasil ditolak!');
                    } else {
                        $this->session->set_flashdata('error', 'Berkas gagal ditolak!');
                    }
                    redirect('akademik/yudisium/detail/'.$idYudisium);
                }
                $nama = $this->input->post('nama');
                $deskripsi = $this->input->post('deskripsi');
                $pesanInfo = array('id_mahasiswa'=>$idMhs, 'nama'=>$nama, 'deskripsi'=>$deskripsi);
                $result = $this->yudisium_model->addPesan($pesanInfo);
                if($result > 0)
                {$this->session->set_flashdata('success', 'Revisi berhasill dikirim!');}
                else{$this->session->set_flashdata('error', 'Revisi gagal dikirim!');}
                redirect('akademik/yudisium/detail/'.$idYudisium);
            }
        }
    }
    /**
     * This function is used to change status yudisium to accepted
     */
    function status($idYudisium, $idMhs)
    {
        if($this->isAkademik() == TRUE)
        {
            $this->loadThis();
        }
        else {
            if (!empty($idYudisium)) {
                $statusInfo = array(
                    'id_yudisium' => $idYudisium,
                    'status' => 'disetujui'
                );

                $status = $this->yudisium_model->status($statusInfo, $idYudisium);
                $pesanInfo = array(
                    'id_mahasiswa'=>$idMhs,
                    'nama'=>'Pendaftaran Yudisium',
                    'deskripsi'=>'Berkas yudisium anda telah diterima, silahkan menghubungi pihak akademik untuk lebih lanjut'
                );

                $result = $this->yudisium_model->addPesan($pesanInfo);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'Yudisium berhasil diterima!');
                } else {
                    $this->session->set_flashdata('error', 'Yudisium gagal diterima!');
                }
                redirect('akademik/yudisium/detail/'.$idYudisium);
//                $this->detail($idMhs);
            }else{echo "Alhamdulillah";}
        }
    }
    /**
     * This function is used to load the 404 page not found
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}