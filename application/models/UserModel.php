<?php
class UserModel extends CI_Model {
    public $generatedPass;

    public function __construct()
    {
        parent::__construct();
        $this->today = date('Y-m-d H:i:s');
    }
/**
 * This is our login method to test users credentials
 *
 * @return array
 */
    public function login()
    {
        $data = array(
            'status' => 'ERROR',
            'message' => 'Invalid request'
        );

        $query = $this->db->get_where('users', array(
            'email' => $this->input->post('email')
        ));

        if (!$query->row()) {
            $data['message'] = 'Invalid user';
            return $data;
        }


        $user = $query->row_array();
        
        return array(
                'status' => 'OK',
                'message' => 'Login success',
                'id' => $user['id'],
                'first_name' => $user['first_name'],
                'last_name'  => $user['last_name'],
                'email' => $user['email']
            );

        // if (sha1($this->input->post('password')) === $user['password']) {
        //     return array(
        //         'status' => 'OK',
        //         'message' => 'Login success',
        //         'id' => $user['id'],
        //         'first_name' => $user['first_name'],
        //         'last_name'  => $user['last_name'],
        //         'email' => $user['email']
        //     );
        // }
        

        $data['message'] = 'Incorrect password';
        return $data;
    }



    public function ProfInfo()
    {

        $query = $this->db->get_where('users',array(
            'email' => $this->session->Auth['email']
            ));

        return $query->row_array();
    }

    public function register($data)
    {

        $insert = array(
            'last_name'   => strtolower($data['last_name']),
            'first_name'  => strtolower($data['first_name']),
            'birthdate'  => $data['bday'],
            'email'       => strtolower($data['email']),
            'password'    => sha1($data['password']),
            'created'     => $this->today,
            'modified'    => $this->today,
            );

        if($this->db->insert('users',$insert)){
            return true;
        }else{
            return false;
        }

    }

    public function checkEmail($data){
        $query = $this->db->get_where('users',array(
            'email' => $data,
            ));

        if($query->row_array()){
            return true;
        } else{
            return false;
        }
    }

    public function updateProfile($data){
        $update = array(
            
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'about_me'   => $data['about_me'],
            'occupation' => $data['occupation'],
            'modified'   => $this->today
        );
        
        $this->db->where('id',$this->session->Auth['id']);
        if($this->db->update('users',$update)){
            return true;
        } else{
            return false;
        }
    }

    public function updatePassword($data)
    {
        $update = array(
            
            'password'   => sha1($data['new_password']),
            'modified'   => $this->today
        );
        
        $this->db->where('id',$this->session->Auth['id']);
        if($this->db->update('users',$update)){
            return true;
        } else{
            return false;
        }
            
    }

    public function searches($search)
    {
        $search = strtolower($search);
        $query = $this->db->query("SELECT * FROM users WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email LIKE '%$search%'");
        $result= $query->result_array();

        if(!empty($result)){
            return $result;
        }else{
            return false;
        }
    }

    public function getUserInfo($id)
    {
        $query = $this->db->get_where('users',array(
            'id' => $id,
            ));
        return $query->row_array();
    }

    // gets all friend request of the logged in user
    // $id is USERS id
    public function friendReq($id)
    {
        $this->db->select('users.*,relationship.friend_id as my_id, relationship.user_id as u_id, relationship.status as r_status, relationship.id as r_id, relationship.modified as r_mod');
        $this->db->from('users');
        $this->db->join('relationship', 'users.id = relationship.user_id', 'left');
        // $this->db->or_where('relationship.user_id = '.$id);
        $this->db->where('relationship.friend_id = '.$id);
        $this->db->where('relationship.status = "pending"');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    // asks to be friends
    public function addAsFriend($id)
    {
        $insert = array(
            'user_id' => $this->session->Auth['id'],
            'friend_id' => $id,
            'status' => 'pending',
            'created' => $this->today,
            'modified' => $this->today,
            );

        if($this->db->insert('relationship',$insert)){
            return true;
        }else{
            return false;
        }
    }

    //cancel or unfriend
    public function deleteFriend($id)
    {
        $this->db->where("(`user_id` =". $id." AND `friend_id` =".$this->session->Auth['id'].")");
        $this->db->or_where("(`user_id` =".$this->session->Auth['id']." AND `friend_id` = ".$id.")");
        if($this->db->delete('relationship')){
            return true;
        }else{
            return false;
        }
    }

    public function friendStatus($id)
    {   
        $this->db->where("(`user_id` =". $id." AND `friend_id` =".$this->session->Auth['id'].")");
        $this->db->or_where("(`user_id` =".$this->session->Auth['id']." AND `friend_id` = ".$id.")");
        $query = $this->db->get('relationship');
        // echo $this->db->last_query();
        // exit();
        return $query->row_array();
    }

    // $id = ID of friend
    public function acceptFR($id)
    {
        $data = array(
            'status' => 'friend',
            'modified' => $this->today,
            );
        $this->db->where("(`user_id` =". $id." AND `friend_id` =".$this->session->Auth['id'].")");
        $this->db->or_where("(`user_id` =".$this->session->Auth['id']." AND `friend_id` = ".$id.")");
        if($this->db->update('relationship',$data)){
            return true;
        } else{
            return false;
        }
    }



    /**
 * Eto ay ang subok method
 *
 * @param int $id Param for Id
 *
 * @return wala Wala eh
 */
    public function subok($id)
    {
    }
}