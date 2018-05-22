<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends WebController {
	
	public function __construct(){
       parent::__construct();
       $this->load->model("get_model");
	}

	public function index() {
		$this->loadView('home');
	}

	public function about() {
		$this->loadView('about');
	}

	public function products() {
		$this->loadView('products');
	}

	public function sellers() {
		$this->loadView('sellers');
	}

	public function contact() {
		$this->loadView('contact');
	}

	public function error() {
		$this->loadView('contact');
	}

	public function send_contact() {
		$name    = $this->input->post('name');
		$message =
				"<br/>Nome: ".$name.
				"<br/>Telefone: ".$this->input->post('phone').
				"<br/>Email: ".$this->input->post('email').
				"<br/>Mensagem:<br/>".$this->input->post('description').
				"<br/><br/>Este é um e-mail automático, para entrar em contato com ".$name.', favor usar o e-mail '.$this->input->post('email');

		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "_#############_";
		$config['smtp_port'] = "587";
		$config['smtp_user'] = "_#############_"; 
		$config['smtp_pass'] = "_#############_";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$ci->email->initialize($config);

		$this->email->from('_#############_', $name);
		$this->email->to('_#############_');

		$this->email->subject('SITE - Contato via formulário de contatos.');
		$this->email->message($message);

		if(!$this->email->send()) {
			$this->session->set_flashdata('negado', 'Mensagem');
			redirect('main');
		} else {
			$this->session->set_flashdata('sucesso', 'Mensagem');
			redirect('main/contact');
		}
	}
}
