<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Pengguna_model', '', TRUE);
        if($this->session->userdata('id') == ''){
        	redirect(base_url());
        }
        if($this->session->userdata('level') != "admin"){
        	redirect('My404');
        }
    }

	public function index() {
        $data['pengguna'] = $this->Pengguna_model->get_all();
        $data['content'] = 'pengguna/view';

        $this->load->view('layout/wrapper', $data);
    }

    public function add() {
        $data['title'] = 'Tambah';
        $data['pengguna'] = $this->Pengguna_model->pengguna();
        $data['action'] = site_url('pengguna/save');
        $data['content'] = 'pengguna/form';
        
        $this->load->view('layout/wrapper', $data);
    }

    public function edit($id) {
        $data['title'] = 'Ubah';
        $data['pengguna'] = $this->Pengguna_model->get_by_id($id);
        $data['action'] = site_url('pengguna/save/' . $id);
        $data['content'] = 'pengguna/form';
        if($this->Pengguna_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }

    public function save($id) {
        if (!$id) {
            $this->Pengguna_model->insert();
        } else {
            $this->Pengguna_model->update($id);
        }
        redirect('pengguna/index');
    }

    public function delete($id) {
        $this->Pengguna_model->delete($id);
        redirect('pengguna/index');
    }

    public function detail($id) {
        $data['pengguna'] = $this->Pengguna_model->get_by_id($id);
        $data['content'] = 'pengguna/detail';
        if($this->Pengguna_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }
}
