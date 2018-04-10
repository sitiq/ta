<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('user_model');
    }

    public function add_user($role){
        $data = array(
            'nama' =>trim($this->input->post('fname')),
            'username' => trim($this->input->post('username')),
            'password' => getHashedPassword(trim($this->input->post('password'))),
            'id_user_role' => $role  
        );
        $result = $this->user_model->insert($data);
        if($result){
            $this->session->set_flashdata('success', 'User baru telah dibuat');
        } else {
            $this->session->set_flashdata('error', 'User gagal dibuat. Masalah database');
        };
        if($role == ROLE_MAHASISWA){
            redirect('akademik/akun_mahasiswa/');
        } elseif($role == ROLE_DOSEN){
            redirect('akademik/akun_dosen/');
        } elseif($role == ROLE_AKADEMIK){
            redirect('akademik/akun_akademik/');
        } elseif($role == ROLE_KAPRODI){
            redirect('akademik/akun_kaprodi/');
        } 
    }

    public function upload_data_user(){
        date_default_timezone_set("Asia/Jakarta");
        $new_name = date("YmdHis") . "-" . $_FILES["file_excel"]['name'];

        $config['upload_path']          = './uploads/data_users';
        $config['allowed_types']        = 'xlsx';
        $config['file_name'] = $new_name;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("file_excel")) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            if($this->input->post('role') == ROLE_MAHASISWA){
                redirect('akademik/akun_mahasiswa/add_form');
            } elseif($this->input->post('role') == ROLE_DOSEN){
                redirect('akademik/akun_mahasiswa/add_form');
            } elseif($this->input->post('role') == ROLE_AKADEMIK){
                redirect('akademik/akun_mahasiswa/add_form');
            } elseif($this->input->post('role') == ROLE_KAPRODI){
                redirect('akademik/akun_mahasiswa/add_form');
            }
        } else {
            $this->global['pageTitle'] = "Elusi : Add New User"; 

            $data['dataThead'] = array();
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load("./uploads/data_users/" . $new_name);
            //$spreadsheet = $reader->load("./uploads/data_users/book1.xlsx");
            $data['file_name'] = $new_name;
            $data['role'] = $this->input->post('role');
            $worksheet = $spreadsheet->getActiveSheet();
            
            $data['dataThead'] = $spreadsheet->getActiveSheet()->rangeToArray(
            'A1:'. $worksheet->getHighestColumn() . '1',     // The worksheet range that we want to retrieve
            NULL,        // Value that should be returned for empty cells
            TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
            TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
            TRUE         // Should the array be indexed by cell row and cell column
            );

            $this->loadViews("upload_user",$this->global,$data);
        }    
    }

    public function upload_submit(){
        $filename = $this->input->post('file_name');
        $column_fname = $this->input->post('fname');
        $column_username = $this->input->post('username');
        $data = array();
        $this->load->model('user_model');
        $role = $this->input->post('role');

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load("./uploads/data_users/" . $filename);

        $worksheet = $spreadsheet->getActiveSheet();

        $highestRow = $worksheet->getHighestRow();
        for ($row = 2; $row <= $highestRow; ++$row) {
            $full_username = explode("/",trim($worksheet->getCell($column_username . $row)->getValue()));
            $username = (empty($full_username[1]) ? $full_username[0] : $full_username[1]);
            $check = $this->user_model->checkUsername($username);
            if($check){
                continue;
            } else {
                $dataUser = array(
                    'nama' => $worksheet->getCell($column_fname . $row)->getValue(),
                    'username' => $username,
                    'password' => $username,
                    'id_user_role' => $role
                );
                array_push($data,$dataUser);
            }
        }

        if(empty($data)){
            $this->session->set_flashdata('error', 'Seluruh data yang diimpor sudah ada di database');
        } else {
            $result = $this->user_model->insert_multiple($data);
            if($result){
                $this->session->set_flashdata('success', 'User telah berhasil dibuat');
            } else {
                $this->session->set_flashdata('error', 'User gagal dibuat');
            };
        }


        //echo $data[0]['nama'];
        //$count = count($data);
        // foreach ($data as $dataPerson) {
        //     foreach ($dataPerson as $key => $value) {
        //         echo $key . '=' . $value . '<br>';
        //     }
        //     echo '<br>';
        // }
        //var_dump($data);
        
        
        if($role == ROLE_MAHASISWA){
            redirect('akademik/akun_mahasiswa/');
        } elseif($role == ROLE_DOSEN){
            redirect('akademik/akun_dosen/');
        } elseif($role == ROLE_AKADEMIK){
            redirect('akademik/akun_akademik/');
        } elseif($role == ROLE_KAPRODI){
            redirect('akademik/akun_kaprodi/');
        }

    }

    public function edit_user(){
        if(empty($this->input->post('password'))){   
            $data = array(
                'nama' =>trim($this->input->post('fname')),
                'username' => trim($this->input->post('username'))
            );
        } else {
            $data = array(
                'nama' => trim($this->input->post('fname')),
                'username' => trim($this->input->post('username')),
                'password' => getHashedPassword(trim($this->input->post('password')))
            );
        }
        $user_id = $this->input->post('userId');
        $result = $this->user_model->update($data,$user_id,$this->input->post('role'));
        if($result){
            $this->session->set_flashdata('success', 'User telah berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'User gagal diubah');
        };

        $role = $this->input->post('role');
        if($role == ROLE_MAHASISWA){
            redirect('akademik/akun_mahasiswa/');
        } elseif($role == ROLE_DOSEN){
            redirect('akademik/akun_dosen/');
        } elseif($role == ROLE_AKADEMIK){
            redirect('akademik/akun_akademik/');
        } elseif($role == ROLE_KAPRODI){
            redirect('akademik/akun_kaprodi/');
        }
    }

    public function checkEmailExists(){
        //if (array_key_exists('email', $_POST)) {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmail($email);
        } else {
            $result = $this->user_model->checkEmail($email, $userId);
        }

        if ($result) {
            echo json_encode(FALSE);
        } else {
            echo json_encode(TRUE);
        }
    }
    
    public function checkUsernameExists(){
        //if (array_key_exists('email', $_POST)) {
        $userId = $this->input->post("userId");
        $username = $this->input->post("username");

        if(empty($userId)){
            $result = $this->user_model->checkUsername($username);
        } else {
            $result = $this->user_model->checkUsername($username, $userId);
        }

        if ($result) {
            echo json_encode(FALSE);
        } else {
            echo json_encode(TRUE);
        }
    }

    public function delete_user(){
        $user_id = $this->input->post("userId");
        $role = $this->input->post('role');
        $result = $this->user_model->delete($user_id);
        if($result){
            $this->session->set_flashdata('success', 'User telah dihapus');
        } else {
            $this->session->set_flashdata('error', 'User gagal dihapus');
        };
        $role = $this->input->post('role');
        if($role == ROLE_MAHASISWA){
            redirect('akademik/akun_mahasiswa/');
        } elseif($role == ROLE_DOSEN){
            redirect('akademik/akun_dosen/');
        } elseif($role == ROLE_AKADEMIK){
            redirect('akademik/akun_akademik/');
        } elseif($role == ROLE_KAPRODI){
            redirect('akademik/akun_kaprodi/');
        } 

        redirect('akademik/akun_mahasiswa/');
    }
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Elusi : 404 - Page Not Found';
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}