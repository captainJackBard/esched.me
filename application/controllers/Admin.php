<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property UserModel $UserModel
 */
class Admin extends MY_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->helper(array('url', 'form', 'fallingpetals'));

        $publicUrl = array('login', 'logout',);
        if (!in_array($this->router->method, $publicUrl)) {
            if (!$this->session->Auth) {
                redirect('user/login');
            }
        }
    }

    public function index(){
        $data['user'] = $this->UserModel->ProfInfo();
        // $$data['user']['birthdate'] = $data['user']['birthdate']->format('m-d-Y');
        return $this->load->view('admin/index',$data);

    }

    public function login(){

        if($this->session->Auth){
            return redirect('dashboard');
        }

        if ($this->input->post('email')) {
            $status = $this->UserModel->login();
            
            
            if ($status['status'] === 'OK') {

                $this->session->set_userdata('Auth', array(
                    'id'         => $status['id'],
                    'email'      => $status['email'],
                    'first_name' => $status['first_name'],
                    'last_name'  => $status['last_name'],
                ));

                return redirect('dashboard');
            } else {

                $this->notifMessage('danger', 'Access Denied!', 'Wrong Email/Password');
                echo $status['message'];
                echo "<br>redirect('user/login')";

                return redirect('user/login');
            }
        }

        $this->load->view('admin/login');
    }

    public function logout(){
        $this->session->unset_userdata('Auth');

        return redirect('user/login');
    }
    
}