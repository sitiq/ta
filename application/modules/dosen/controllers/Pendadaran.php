<?php
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 14:07
 * Description:
 */

class Pendadaran extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pendadaran_model');
        $this->isLoggedIn();
    }
    /**
     * This function is used to load the profil list
     */
    function index()
    {
        if($this->isDosen() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = $this->vendorId;
            $userRole = $this->role;
            $data['pendadaranInfo'] = $this->pendadaran_model->getSidang($userId);
            $data['userId'] = $userId;
            $data['userRole'] = $userRole;
            $this->global['pageTitle'] = "Elusi : Pendadaran";

            $this->loadViews("uji", $this->global, $data, NULL);
        }
    }
    function nilai()
    {
        if($this->isDosen() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $userId = $this->vendorId;
            $data['nilaiInfo'] = $this->pendadaran_model->getNilaiInfo($userId);
            $this->global['pageTitle'] = "Elusi : Sidang";
            $this->loadViews("nilai", $this->global, $data, NULL);
        }
    }
    function submitNilai()
    {
        if ($this->isDosen() == true)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            $last_index = $this->input->post('last_index');
            $id_penilaian = $this->input->post('id_penilaian');
            $id_sidang = $this->input->post('id_sidang');
            echo $last_index;
            $total = 0;
            for ( $i = 1; $i < $last_index; $i++ )
            {
                $this->form_validation->set_rules('radio_'.$i,'Nilai wajib terisi semua!','trim|required|numeric');
                $radio_value = $this->input->post('radio_'.$i);
                $array_explode = explode(' ',$radio_value);
//                var_dump($array_explode);
                $id_komponen_nilai_value = $array_explode[0];
                $id_nilai_value = $array_explode[1];
                $data = array(
                    'nilai' => $id_nilai_value
                );
                $result1 = $this->pendadaran_model->updateNilai($data, $id_komponen_nilai_value);
                $total = $total+($id_nilai_value/10);
            }

            $result2 = $this->pendadaran_model->editPenilaian($total, $id_penilaian);
            $nilai_akhir_sidang = $total/3;

            $result = $this->pendadaran_model->editSidang($nilai_akhir_sidang ,$id_sidang);

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Sidang berhasil dinilai!');
            }
            else
            {
                $this->session->set_flashdata('error', 'Sidang gagal dinilai!');
            }
            redirect('dosen/pendadaran/nilai');
        }
    }
}