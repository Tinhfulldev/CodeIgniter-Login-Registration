<?php

class Member_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    /*
    	insert()
		Inserts post-validation form data to db.Members, registering a new
		member.

		db.Members | id | username | password | registered | pin | balance | group |
    */
    function insert()
    {
    	// Load data for insert
    	$data = array(
    		// post('form_field', Boolean), Boolean = TRUE enables
    		// XSS Filtering to sanitize data
    		'username' => $this->input->post('username', TRUE),
    		'password' => $this->pass_hash($this->input->post('username', TRUE), $this->input->post('password', TRUE)),
    		'pin'	   => $this->input->post('pin', TRUE),
    		'balance'  => 0,
    		'group'	   => 1
    		);

    	// Add new member
    	$this->db->insert('members', $data);
    }

    /*
		pass_hash($username, $password)
		Argument: plain-text username and password from form
		Return: sha1(), hash combination of lowercase username and password
    */
    function pass_hash($username, $password)
    {
    	return sha1(strtolower($username) . $password);
    }

}

?>