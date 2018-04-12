<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        $data = array(
            'content' => 'welcome_message'
        );
		$this->load->view('layouts/wrapper', $data);
	}
}
