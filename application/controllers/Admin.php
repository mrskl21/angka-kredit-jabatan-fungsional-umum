<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Admin extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->load->model('table_user');
        $this->load->model('table_regulation');
        $this->load->model('table_element');
    }
	
	public function index()
	{
		$title = "Dashboard";
		$data = $this->table_regulation->all();

		$this->load->view('admin/dashboard', compact('title','data'));
	}
	
	public function add()
	{
		$data['title'] 			= $this->input->post('title');
		$data['slug'] 			= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('title'))));
		$data['number'] 		= $this->input->post('number');
		$data['year'] 			= $this->input->post('year');
		$data['category'] 		= $this->input->post('category');
		$data['entity'] 		= $this->input->post('entity');
		$data['description'] 	= $this->input->post('description');
		$data['publish_date'] 	= $this->input->post('publish_date');
		$data['source'] 		= $this->input->post('source');
        
		$config['upload_path']      = './assets/uploads/files';
		$config['allowed_types']    = "pdf";
		$config['file_name']        = "msc-jft-".time();
        $config['max_size']         = 5000;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if($this->upload->do_upload('file')){
			$size = $this->upload->data('file_size');
			$name = $this->upload->data('file_name');
			if ($size < 2048) {
				$data['file'] = $name;
				$this->session->set_flashdata('success', "Berhasil! Data telah ditambahkan.");
				
			}else{
				$this->session->set_flashdata('warning', "Berhasil! Data ditambah namun Ukuran file terlalu besar.");
			}
		}else{
			$this->session->set_flashdata('warning', "Berhasil! Data ditambah namun File tidak sesuai.");
		}

		$this->table_regulation->add($data);
		redirect("admin");

		
	}
	
	public function detail($id)
	{
		$title = "Dashboard";
		$param['id']				= $id;
		$data 						= $this->table_regulation->get($param);
		$param2['regulation_id']	= $id;
		$element					= $this->table_element->result($param2);

		$this->load->view(
			'admin/detail', 
			compact(
				'title',
				'data',
				'element'
			)
		);
	}

	public function update()
	{
		
	}

	public function update_file()
	{

	}

	public function delete()
	{

	}

	public function upload_element()
	{
		$rid = $this->input->post('regulation_id');

		$config['upload_path']      = './assets/uploads/files/';
        $config['allowed_types']    = 'xls|xlsx|csv';
        $config['max_size']         = 5000;
		$config['file_name']        = "msc-jft-".time();


        
  		$this->load->library('upload', $config);
  		$this->upload->initialize($config);

  		if($this->upload->do_upload('file')){
  			$size = $this->upload->data('file_size');
  			$type = $this->upload->data('file_type');
  			if ($size < 2048) {
                $dokumen = array('upload_data' => $this->upload->data());

                $dokumen = array('file' => $this->upload->data());

                if('csv' == $type){
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $spreadsheet = $reader->load($dokumen['file']['full_path']);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();
                
                $data = array();

				for($i=1;$i<count($sheetData);$i++){
					if($sheetData[$i][1] == "" || $sheetData[$i][2] == "" || $sheetData[$i][3] == ""){
						break;
					}

					$data[$i]['regulation_id']  = $rid;
					$data[$i]['unsur']         	= $sheetData[$i][1];
					$data[$i]['sub_unsur']		= $sheetData[$i][2];
					$data[$i]['uraian']         = $sheetData[$i][3];
					$data[$i]['output']      	= $sheetData[$i][4];
					$data[$i]['kredit']         = $sheetData[$i][5];
					$data[$i]['pelaksana']		= $sheetData[$i][6];
				}

				// echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                // die();
                
                $this->table_element->add_batch($data);
                $this->session->set_flashdata('success',"Berhasil! Data Terupload.");
                redirect("admin/detail/".$rid,'refresh');

            }else{
                $this->session->set_flashdata('error',"Gagal! File Terlalu Besar.");
                redirect("admin/detail/".$rid,'refresh');
            }
  		}else{
            $this->session->set_flashdata('error',"Gagal! Data tidak terinput.");
            redirect("admin/detail/".$rid,'refresh');
        }
	}
	
	public function get_element()
	{
		
	}

	public function clear_element()
	{
		
	}

}
