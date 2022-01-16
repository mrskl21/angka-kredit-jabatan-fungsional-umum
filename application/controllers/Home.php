<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->load->model('table_regulation');
        $this->load->model('table_element');
    }
	
	public function index()
	{
		$title = "Home";
		$data = $this->table_regulation->all();

		$this->load->view(
			'home', 
			compact(
				'title',
				'data'
			)
		);
	}

	public function detail($id)
	{
		$title = "Dashboard";
		$param['id']				= $id;
		$data 						= $this->table_regulation->get($param);
		$param2['regulation_id']	= $id;
		$element					= $this->table_element->result($param2);

		$this->load->view(
			'detail', 
			compact(
				'title',
				'data',
				'element'
			)
		);
	}

	// public function get_data()
	// {
	// 	$data = $this->table_street_lights->all();
	// 	echo json_encode($data);
	// }

	public function about()
	{
		$title = "About";

		$this->load->view(
			'about', 
			compact(
				'title'
			)
		);
	}
}
