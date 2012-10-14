<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();

		// Models
		$this->load->model('Member_model', 'member');
	}


	/*
		index()
		Displays home page of the website
	*/
	public function index()
	{
		$this->load->view('home');
	}

	/*
		register()
		Displays registration form
	*/
	function register()
	{
		// Are CCP Headers set ? If so then show registration else
		if(isset($_SERVER['HTTP_EVE_CHARNAME']))
		{
			$data['character'] = $_SERVER['HTTP_EVE_CHARNAME'];
			$this->load->view('register', $data);
		} else {
			// Inform user they need to be logged in game to be able to register
			$data['unknown'] = 'You need to register using the ingame browser.';
			$this->load->view('register', $data);
		}
		
	}

	/*
		process()
		Process registration form for new member registration.
	*/
	function process()
	{
		// Setup form validation rules
		$config = array(
				array(
					'field' => 'username',
					'label' => 'Username',
					'rules' => 'required|is_unique[members.username]'
					),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required|min_length[6]|max_length[60]'
					),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required|min_length[6]|max_length[60]|matches[password]'
					),
				array(
					'field' => 'pin',
					'label' => 'PIN',
					'rules' => 'required|min_length[4]|max_length[49]|numeric'
					)
			);

		// Load form validation setup
		$this->form_validation->set_rules($config);

		// Run and validate the form input
		if($this->form_validation->run() == false)
		{
			$this->load->view('register');
		} else {
			// Input has passed validation, process the registration
			$this->member->insert();

			// Reaload view
			$data['succsses'] = 'You have been registered you may now login and start playing.';
			$this->load->view('register', $data);
		}
	}

	

}
