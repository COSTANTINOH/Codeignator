<?php
defined('BASEPATH') or exit('No direct script access allowed');

// class Main extends CI_Controller {

// 	//collection of functions

// 	public function index(){
// 		// echo 'text costa';
// 		// $this->test1();
// 		$this->load->model("main_model");
// 		$data['title'] = "Costantino Gwaka";
// 		$data['test'] = "Costantino Dionis Gwaka";
// 		$data['model_data'] = $this->main_model->test_main();
// 		$this->load->view('main_view',$data);
// 		// echo $this->main_model->test_main();
// 	}

// 	public function test1(){
// 		echo 'text costa test 1';
// 	}

// }

class Main extends CI_Controller
{

	public function index()
	{
		$this->load->model('main_model');
		$data["fetch_users"] = $this->main_model->fetch_users();
		// $this->load->view('main_view');
		$this->load->view('main_view', $data);
	}

	public function form_validation()
	{
		// echo 'OK';
		$this->load->library('form_validation');
		$this->form_validation->set_rules("fname", "First Name", 'required|alpha'); //set more than rules
		$this->form_validation->set_rules("mname", "Middle Name", 'required|alpha'); //set more than rules
		$this->form_validation->set_rules("lname", "Last Name", 'required|alpha'); //set more than rules

		if ($this->form_validation->run()) {
			//trues
			$this->load->model('main_model');

			//receive data from form
			$data = array(
				"fname" => $this->input->post("fname"),
				"lname" => $this->input->post("mname"),
				"last" => $this->input->post("lname"),
			);

			if($this->input->post("update")){
				$this->main_model->update_data($data,$this->input->post("hidden_id"));
				redirect(base_url() . "main/updated");
			}
			
			if($this->input->post("insert")){
				//insert data to model_data
				$this->main_model->insert($data);
				//if success full inserrt
				redirect(base_url() . "main/inserted");
			}
			
		} else {
			$this->index();
		}
	}

	public function inserted()
	{
		$this->index();
	}

	public function delete_data(){
		$id = $this->uri->segment(3); //http://localhost/ci3/delete_data/{id} segement 3
		$this->load->model("main_model");
		$this->main_model->delete_data($id);
		redirect(base_url() . "main/deleted");
	}

	public function deleted(){
		$this->index();
	}


	public function update_data(){
		$user_id = $this->uri->segment(3);
		$this->load->model('main_model');
		$data['user_data'] = $this->main_model->fetch_single_data($user_id);
		$data["fetch_users"] = $this->main_model->fetch_users();
		$this->load->view('main_view', $data);
	}

	public function updated(){
		$this->index();
	}



	//FORM VALidations libray





}
