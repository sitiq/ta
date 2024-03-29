<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
/**
 * Created by nad.
 * Date: 23/03/2018
 * Time: 18:22
 * Description:
 */

class ChangePassword extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('change_password_model');
        $this->isLoggedIn();
        $this->isDosen();
    }

    /**
     * This function is used to load the change password screen
     */
    function index()
    {
        if($this->isDosen() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->global['pageTitle'] = "Elusi : Ubah Password";

            $this->loadViews("change_password", $this->global, NULL, NULL);
        }
    }


    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        if($this->isDosen() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
            $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
            $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');

            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }
            else
            {
                $oldPassword = $this->input->post('oldPassword');
                $newPassword = $this->input->post('newPassword');

                $resultPas = $this->change_password_model->matchOldPassword($this->vendorId, $oldPassword);

                if(empty($resultPas))
                {
                    $this->session->set_flashdata('nomatch', 'Your old password not correct');
                    redirect('dosen/changepassword');
                }
                else
                {
                    $usersData = array('password'=>getHashedPassword($newPassword), 'updatedDtm'=>date('Y-m-d H:i:s'));

                    $result = $this->change_password_model->changePassword($this->vendorId, $usersData);

                    if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                    else { $this->session->set_flashdata('error', 'Password updation failed'); }

                    redirect('dosen/changepassword');
                }
            }
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
?>