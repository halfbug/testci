<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

    var $data;
    function __construct() {
        parent::__construct();



        // Load user model
        $this->load->model('user');

       // $this->load->view('user_authentication/index');

    }


    public function index(){
        // Include the google api php libraries
		
		// include_once APPPATH."libraries/google-api-php-client/src/Google/autoload.php"; 

		
		
		
        include_once APPPATH."libraries/google-api-php-client/src/Google_Client.php";
       include_once APPPATH."libraries/google-api-php-client/src/contrib/Google_Oauth2Service.php";
        
        // Google Project API Credentials
        $clientId = '496496584433-hbenq8iuihfim4302cameud58bc14jh6.apps.googleusercontent.com';
        $clientSecret = 'CovKqAj_JEVGIvMUdc-yBulT';
       // $redirectUrl = base_url() . 'user_authentication/index/';
		     $redirectUrl = 'http://localhost/testci-master/';

        
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to codexworld.com');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
			;
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['given_name'];
            $userData['last_name'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = $userProfile['link'];
            $userData['picture_url'] = $userProfile['picture'];
            // Insert or update user data
            $userID = $this->user->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
        } else {
            $data['authUrl'] = $gClient->createAuthUrl();
        }
        $this->load->view('header');
        $this->load->view('user_authentication/index',$data);
        $this->load->view('footer');
    }
    
    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
redirect(base_url());
    }

    public function user_update()
    {
        $id = $this->input->get_post('id');
        $this->form_validation->set_error_delimiters('<div>', '</div>');

        // Set the validation rules
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        // If the validation worked
        if ($this->form_validation->run())
        {
            $data['latitude'] = $this->input->get_post('latitude');
            $data['longitude'] = $this->input->get_post('longitude');
            $data['address'] = $this->input->get_post('address');

            if($this->user->update($id,$data))
            {
                $_SESSION['msg_success'][] = 'Data Updated...';

                redirect('welcome/user_update?id='.$id);
            }
        }

        $this->data['update_data'] = $this->user->get_user_by_id($id);

        $this->load->view('user_update', $this->data);
    }
}