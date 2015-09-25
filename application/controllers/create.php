<?php

class Create extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}

	public function index() {
		$this->form_validation->set_rules('url_address', $this->lang->line('create_url_address'), 'required|min_length[1]|max_length[1000]|trim');

		if ($this->form_validation->run() == false) {
			$page_data = array(
				'success_fail' => null,
				'encoded_url' => false
			);

			$this->load->view('common/header');
			$this->load->view('nav/top_nav');
			$this->load->view('create/create', $page_data);
			$this->load->view('common/footer');
		} else {
			$data = array(
				'url_address' => $this->input->post('url_address')
			);

			$this->load->model('Urls_model');

			if ($res = $this->Urls_model->save_url($data)) {
				$page_data['success_fail'] = 'success';
				$page_data['encoded_url'] = $res;
			} else {
				$page_data['success_data'] = 'fail';
			}

			$page_data['encoded_url'] = base_url($res);

			$this->load->view('common/header');
			$this->load->view('nav/top_nav');
			$this->load->view('create/create', $page_data);
			$this->load->view('common/footer');
		}
	}
}