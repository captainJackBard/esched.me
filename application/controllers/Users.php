<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Users $Users
 */
class Users extends MY_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->helper(array('url', 'form', 'fallingpetals'));
        $this->load->library('email');
    }


    public function profile()
    {   
        if($this->input->post()){
            if($this->UserModel->updateProfile($this->input->post())){

                $data['user'] = $this->UserModel->ProfInfo();
                $this->notifMessage('success', 'Success!', 'Profile updated successfully.');

                $this->session->set_userdata('Auth', array(
                    'id'         => $data['user']['id'],
                    'email'      => $data['user']['email'],
                    'first_name' => $data['user']['first_name'],
                    'last_name'  => $data['user']['last_name'],
                    ));

                return redirect('dashboard');
            }
        }
        return redirect('dashboard');
    }

    public function password()
    {   
        $data['user'] = $this->UserModel->ProfInfo();

        // debug($data);
        if($this->input->post()){
            // do conditions for passwords here
            if(sha1($this->input->post('old_password')) != $data['user']['password']){
                $this->notifMessage('warning', 'Update Failed', 'Incorrect Password.');
                return redirect('password');
            }elseif ($this->input->post('new_password') != $this->input->post('conf_password')) {
                // password did not match
                $this->notifMessage('warning', 'Update Failed', 'Password did not match.');
                return redirect('password');
            }elseif(strlen($this->input->post('new_password')) < 5){
                // must be atleast 6 chars long
                $this->notifMessage('warning', 'Update Failed', 'Password must contain atleast 6 characters.');
                return redirect('password');
            }else{
                if($this->UserModel->updatePassword($this->input->post())){
                    $this->notifMessage('success', 'Success', 'Password has been changed.');
                    return redirect('password');
                }else{
                    $this->notifMessage('danger', 'Oops!', 'Something went wrong. Please Contact support immediately.');
                    return redirect('password');
                }
            }
        }

        return $this->load->view('users/password',$data);
    }

    public function searches()
    {
        $data = array();

        if($this->input->post()){
            $data['results'] = $this->UserModel->searches($this->input->post('search'));
        }

        return $this->load->view('users/searches',$data);
    }

    //view other users profile
    public function view($id)
    {
        if($this->input->post()){
            switch ($this->input->post('type')) {
                case 'add':
                    $this->UserModel->addAsFriend($id);
                    break;

                case 'cancel':
                    $this->UserModel->deleteFriend($id);
                    break;
                

                case 'accept':
                     $this->UserModel->acceptFR($id);
                    break;

                default:
                    # code...
                    break;
            }
        }
        $data['user'] = $this->UserModel->getUserInfo($id);
        $data['status'] = $this->UserModel->friendStatus($id);
        return $this->load->view('users/view',$data);
    }

    //accept FR or delete
    public function friendRQ($id)
    {

        if($this->input->post()){
            switch ($this->input->post('type')) {
                case 'accept':
                    $this->UserModel->acceptFR($id);
                    break;
                
                default:
                    $this->UserModel->deleteFriend($id);
                    break;
            }
        }

        return redirect('view/'.$id);
    }

    public function register()
    {
        if($this->input->post()){
            
            if($this->UserModel->checkEmail($this->input->post('email'))){
                $this->notifMessage('warning', 'Registration Failed', 'Email already in use. Please enter a different email.');
                return redirect('register');
            }elseif($this->input->post('password') != $this->input->post('conf_password')){
                // notif old password does not match
                $this->notifMessage('warning', 'Registration Failed', 'Password did not match.');
                return redirect('register');
            }elseif(strlen($this->input->post('password')) < 5){
                //put notif here password must have 6 charactrers
                echo 'Password must contain atleast 6 characters';
                $this->notifMessage('warning', 'Registration Failed', 'Password must contain atleast 6 characters');
                return redirect('register');
            }else{
                
                if($this->UserModel->register($this->input->post())){

                    $this->email->to($this->input->post('email'));
                    $this->email->subject('Welcome to eSched.me');
                    $this->email->message('Your Account username is : '.$this->input->post('email').' and password is : '.$this->input->post('password'));
                    $this->email->send();
                    $this->notifMessage('success', 'Success', 'Registration Successful. Please Log in.');
                    return redirect('admin/login');
                }else{
                    $this->notifMessage('danger', 'Oops!', 'Something went wrong. Please contact support or try again later.');
                    return redirect('register');
                }
            }
        }

        return $this->load->view('users/register');
    }
    
}