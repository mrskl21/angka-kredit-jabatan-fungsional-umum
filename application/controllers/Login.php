<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->load->model('table_user');
        $this->load->model('table_regulation');
        $this->load->model('table_element');
    }
	
	public function index()
	{
		if(($this->session->userdata('logged_in'))){
            redirect('admin');
		}

		$title = "Login";

		$this->load->view('admin/login', compact('title'));
	}

	public function validate()
	{
		$username = $this->input->post('username');
        $password = $this->input->post('password');
        
		$data = array(
			'username' => $username,
			'password' => md5($password)
        );

		// echo "<pre>";
		// echo print_r(
		// 	compact(
		// 		'data'
		// 	)
		// );
		// echo "</pre>";
		// die();

		$validate = $this->table_user->get($data);
        if ($validate == TRUE)
        {
            $session_data = array(
                'id' 	        => $validate->id,
                'fullname'	    => $validate->fullname
            );
            $this->session->set_userdata('logged_in',$session_data);
            $this->session->set_flashdata('success', "Selamat Datang!");
            redirect('admin', $session_data);
        }
        else

        {
            $this->session->set_flashdata('error', "Masuk Gagal! anda belum terdaftar atau email/kata sandi anda salah");
            redirect('admin/login');
        }
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
        $this->session->set_flashdata('warning', "Logged out !");
    	redirect('admin/login');
	}

}
