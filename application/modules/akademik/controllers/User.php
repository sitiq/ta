<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends BaseController
{
    public function __construct() {
        parent::__construct();
        $this->isLoggedIn();
        $this->load->model('user_model');
    }

    public function add_user($role){
        if($role == ROLE_MAHASISWA){
            $data = array(
                'nama' => trim($this->input->post('fname')),
                'username' => trim($this->input->post('username')),
                'password' => getHashedPassword(trim($this->input->post('password'))),
                'id_user_role' => $role,
                'nomor_induk' => trim($this->input->post('nim')),
            );
        } elseif($role = ROLE_DOSEN || $role = ROLE_KAPRODI){
            $data = array(
                'nama' => trim($this->input->post('fname')),
                'username' => trim($this->input->post('username')),
                'password' => getHashedPassword(trim($this->input->post('password'))),
                'id_user_role' => $role,
                'nomor_induk' => trim($this->input->post('nid')),
            );
        } else {
            $data = array(
                'nama' => trim($this->input->post('fname')),
                'username' => trim($this->input->post('username')),
                'password' => getHashedPassword(trim($this->input->post('password'))),
                'id_user_role' => $role
            );
        }
            
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

    public function upload_data_user($role){
        date_default_timezone_set("Asia/Jakarta");
        if($_FILES["file_excel"]){
            $new_name = date("YmdHis") . "-" . $_FILES["file_excel"]['name'];
        } else {
            if($role == ROLE_MAHASISWA) {
                $this->session->set_flashdata('error', 'Pilih file (.xlsx) terlebih dahulu');
                redirect('akademik/akun_mahasiswa/add_form');
            } elseif($role == ROLE_DOSEN) {
                $this->session->set_flashdata('error', 'Pilih file (.xlsx) terlebih dahulu');
                redirect('akademik/akun_dosen/add_form');
            } elseif($role == ROLE_AKADEMIK) {
                $this->session->set_flashdata('error', 'Pilih file (.xlsx) terlebih dahulu');
                redirect('akademik/akun_akademik/add_form');
            }
        }


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
        $prodi = $this->input->post('prodi');
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
                    'nomor_induk' => trim($worksheet->getCell($column_username . $row)->getValue()),
                    'username' => $username,
                    'password' => getHashedPassword(trim($username)),
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

    public function edit_user($role){
        if($role == ROLE_MAHASISWA){
            if(empty($this->input->post('password'))){   
                $data = array(
                    'nama' =>trim($this->input->post('fname')),
                    'username' => trim($this->input->post('username')),
                    'nim' => trim($this->input->post('nim'))
                );
            } else {
                $data = array(
                    'nama' => trim($this->input->post('fname')),
                    'username' => trim($this->input->post('username')),
                    'nim' => trim($this->input->post('nim')),
                    'password' => getHashedPassword(trim($this->input->post('password')))
                );
            }
        } elseif($role == ROLE_DOSEN || $role == ROLE_KAPRODI) {
            if(empty($this->input->post('password'))){   
                $data = array(
                    'nama' => trim($this->input->post('fname')),
                    'username' => trim($this->input->post('username')),
                    'nid' => trim($this->input->post('nid'))
                );
            } else {
                $data = array(
                    'nama' => trim($this->input->post('fname')),
                    'username' => trim($this->input->post('username')),
                    'nid' => trim($this->input->post('nid')),
                    'password' => getHashedPassword(trim($this->input->post('password')))
                );
            }
        } else {
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
        }
        $user_id = $this->input->post('userId');
        $result = $this->user_model->update($data,$user_id,$role);
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

    public function checkNIMExists(){
        //if (array_key_exists('email', $_POST)) {
        $userId = $this->input->post("userId");
        $nim = $this->input->post("nim");

        if(empty($userId)){
            $result = $this->user_model->checkNIM($nim);
        } else {
            $result = $this->user_model->checkNIM($nim, $userId);
        }

        if ($result) {
            echo json_encode(FALSE);
        } else {
            echo json_encode(TRUE);
        }
    }

    public function checkNIDExists(){
        //if (array_key_exists('email', $_POST)) {
        $userId = $this->input->post("userId");
        $nid = $this->input->post("nid");

        if(empty($userId)){
            $result = $this->user_model->checkNID($nid);
        } else {
            $result = $this->user_model->checkNID($nid, $userId);
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