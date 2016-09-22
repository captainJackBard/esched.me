<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property UserModel $UserModel
 */
class Admin extends MY_Controller {

    public function __construct(){
        parent::__construct();

        

        $publicUrl = array('login', 'logout',);
        if (!in_array($this->router->method, $publicUrl)) {
            if (!$this->session->Auth) {
                redirect('user/login');
            }
        }
    }

    public function index(){
        // debug($this->session->Auth);
        $data['user'] = $this->UserModel->ProfInfo();
        $data['friends'] = $this->UserModel->getFriends($this->session->Auth['id']);
        $data['activity_post'] = $this->UserModel->getActivityPost();
        // $data['activities'] = $this->UserModel->getActivities();
        // $$data['user']['birthdate'] = $data['user']['birthdate']->format('m-d-Y');

        $activities = array();
        // debug($this->UserModel->getActivities);
        // exit();
        foreach ($this->UserModel->getActivities() as $the) {
            array_push($activities, array(
                ucwords($the['title']),
                $the['lat'],
                $the['long'],
                ucwords($the['address']),
            ));
        }

        $data['activities'] = $activities;

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
                    'img_name'   => $status['img_name'],
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

    public function socialLogIn()
    {
        exit(1);
    }
    
}