<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * App controller class
 *
 */
class MY_Controller extends CI_Controller {


    public $navs;

    public $friends = array();

    public $img;

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper(array('url', 'form', 'fallingpetals'));
        $this->load->library(array('user_agent','upload'));

        $this->friends = $this->UserModel->friendReq($this->session->Auth['id']);

        if(empty($this->session->Auth['img_name'])){
            $this->img = base_url().'prof_imgs/'.'default.png';
        } else{
            $this->img = base_url().'prof_imgs/'.$this->session->Auth['img_name'];
        }

    }


    public function notifMessage($type, $notif, $msg){
        $notif = array(
            'type'  => $type,
            'notif' => $notif,
            'msg'   => $msg,
        );
        
        $notifMsgs = $this->session->set_flashdata('data', $notif);
        return $notifMsgs;
    }

    // public function ajaxFriendRequest(){
    //     echo json_encode($this->friends);
    // }

}