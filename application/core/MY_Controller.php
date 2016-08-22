<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * App controller class
 *
 */
class MY_Controller extends CI_Controller {


    public $navs;

    public $friends = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');

        $this->friends = $this->UserModel->friendReq($this->session->Auth['id']);

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

}