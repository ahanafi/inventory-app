<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Pengguna_model', '', TRUE);
        if($this->session->userdata('id') == ''){
        	redirect(base_url());
        }
    }
    
    public function profile() {
    	$id = $this->session->userdata('id');
        $data['pengguna'] = $this->Pengguna_model->get_by_id($id);
        $data['content'] = 'user/profile';
        if($this->Pengguna_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }

    public function edit() {
    	$id = $this->session->userdata('id');
        $data['title'] = 'Edit Profile';
        $data['pengguna'] = $this->Pengguna_model->get_by_id($id);
        $data['action'] = site_url('user/save');
        $data['content'] = 'user/form';
        if($this->Pengguna_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }
    
    public function edit_password() {
    	$id = $this->session->userdata('id');
        $data['title'] = 'Ubah Password';
        $data['pengguna'] = $this->Pengguna_model->pengguna();
        $data['password'] = $this->Pengguna_model->get_by_id($id)['password'];
        $data['action'] = site_url('user/save_password');
        $data['content'] = 'user/form_password';
        if($this->Pengguna_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }

    public function save() {
        $this->Pengguna_model->update($this->session->userdata('id'));
        redirect('user/profile');
    }
    
    public function save_password() {
        $this->Pengguna_model->update_password($this->session->userdata('id'));
        $this->session->set_userdata(array('password' => md5($this->input->post('password'))));
        redirect('user/profile');
    }
}
