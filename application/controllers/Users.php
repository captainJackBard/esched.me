<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Users $Users
 */
class Users extends MY_Controller {

    public function __construct(){
        parent::__construct();

        // $this->load->helper(array('url', 'form', 'fallingpetals','smiley'));;
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
                    'img_name'   => $data['user']['img_name'],
                    ));

                return redirect('dashboard');
            }
        }
        return redirect('dashboard');
    }

    public function password()
    {   
        

        // debug($data);
        if($this->input->post()){
            $data['user'] = $this->UserModel->ProfInfo();
            
            // do conditions for passwords here
            if(sha1($this->input->post('old_password')) != $data['user']['password']){
                $this->notifMessage('warning', 'Update Failed', 'Incorrect Password.');
                
            }elseif ($this->input->post('new_password') != $this->input->post('conf_password')) {
                // password did not match
                $this->notifMessage('warning', 'Update Failed', 'Password did not match.');
                
            }elseif(strlen($this->input->post('new_password')) < 5){
                // must be atleast 6 chars long
                $this->notifMessage('warning', 'Update Failed', 'Password must contain atleast 6 characters.');
                
            }else{
                if($this->UserModel->updatePassword($this->input->post())){
                    $this->notifMessage('success', 'Success', 'Password has been changed.');
                    
                }else{
                    $this->notifMessage('danger', 'Oops!', 'Something went wrong. Please Contact support immediately.');
                    
                }
            }
        }
        // $this->load->view('users/password',$data);
        return redirect('dashboard');
        
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

        if($this->session->Auth['id'] == $id){
            return redirect('dashboard');
        }

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

    public function addActivity()
    {
        // if($this->input->post()){
        //     debug($this->input->post());
        //     exit();
        // }

        if ($this->input->post()) {
            
            $address   = $this->input->post('address');
            
            $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&key='.GOOGLE_KEY.'&sensor=false');
            $geo = json_decode($geo, true);
            
            $lat = $geo['results'][0]['geometry']['location']['lat'];
            $long = $geo['results'][0]['geometry']['location']['lng'];
            
            if($lat && $long){
                if($this->UserModel->addActivity($this->input->post(),$lat,$long)){
                    $this->notifMessage('success', 'Success', 'Activity Added.');
                }
            }else{
                $this->notifMessage('danger', 'Failed', 'Error on Fetching Coordinates.');
            }
        }

        return redirect('dashboard');
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
    
    public function changeDp()
    {
        
        if(!empty($_FILES)) {

            $type;

            switch ($_FILES['img']['type']) {
                case 'image/png':
                    $type = '.png';
                    break;
                case 'image/jpeg':
                    $type = '.jpg';
                    break;
                default:
                $this->notifMessage('danger', 'Failed', 'Sorry. You can only upload PNGs and JPGs images.');
                return redirect('/');
                break;
            }

            // debug($_FILES);
            if(!empty($this->session->Auth['img_name'])){
                unlink("./prof_imgs/".$this->session->Auth['img_name']);
            }
            $config['file_name'] = sha1($this->today).$type;
            $config['upload_path'] = './prof_imgs/';
            $config['allowed_types'] = 'jpg|png';
//            $config['max_size']   = '100';
            // $config['max_width']  = '500';
            // $config['max_height']  = '500';
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('img')) {
                // failed uploading prof image
                $error = array('error' => $this->upload->display_errors());
                $this->notifMessage('danger', 'Failed', 'Failed to upload image. Image may be too large');
                return redirect('/');
                // TODO fix me to show error message properly
            } else {
                // succes uploading img
                if($this->UserModel->changeDp($config['file_name'])){
                    if($this->UserModel->ProfInfo()){

                        $data['user'] = $this->UserModel->ProfInfo();
                        $this->notifMessage('success', 'Success!', 'Profile updated successfully.');
                        $this->session->set_userdata('Auth', array(
                            'id'         => $data['user']['id'],
                            'email'      => $data['user']['email'],
                            'first_name' => $data['user']['first_name'],
                            'last_name'  => $data['user']['last_name'],
                            'img_name'   => $data['user']['img_name'],
                            ));
                    }
                }
                $this->notifMessage('success', 'Success', 'Picture Changed!');
                return redirect('/');

            }
        }
    }

    public function CreateGroup()
    {
        debug($this->input->post());
        if($this->UserModel->createGroup($this->input->post())){
            $this->notifMessage('success','Success!','Group Created.');
        } else{
            $this->notifMessage('danger','Failed!','Group Failed to Create.');
        }
        return redirect('/');
        
    }

    // MESSAGING
    public function sendMessage()
    {
        return redirect($this->agent->referrer(),'refresh');
    }

    public function ajaxFriendRequest()
    {
        
        echo json_encode($this->friends);
    }

    public function ajaxFriendRequestSeenUpdate()
    {  
        $this->UserModel->friendReqSeenUpdate();
    }

}