<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Pegawai_model', '', TRUE);
        $this->load->model('Bagian_model', '', TRUE);
        if($this->session->userdata('id') == ''){
        	redirect(base_url());
        }
    }

	public function index() {
        $data['pegawai'] = $this->Pegawai_model->get_all();
        $data['content'] = 'pegawai/view';

        $this->load->view('layout/wrapper', $data);
    }

    public function add() {
        $data['title'] = 'Tambah';
        $data['pegawai'] = $this->Pegawai_model->pegawai();
        $data['bagian'] = $this->Bagian_model->get_all();
        $data['action'] = site_url('pegawai/save');
        $data['content'] = 'pegawai/form';
        
        $this->load->view('layout/wrapper', $data);
    }

    public function edit($id) {
        $data['title'] = 'Ubah';
        $data['pegawai'] = $this->Pegawai_model->get_by_id($id);
        $data['bagian'] = $this->Bagian_model->get_all();
        $data['action'] = site_url('pegawai/save/' . $id);
        $data['content'] = 'pegawai/form';
        if($this->Pegawai_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }

    public function save($id) {
        if (!$id) {
            $this->Pegawai_model->insert();
        } else {
            $this->Pegawai_model->update($id);
        }
        redirect('pegawai/index');
    }

    public function delete($id) {
        $this->Pegawai_model->delete($id);
        redirect('pegawai/index');
    }

    public function detail($id) {
        $data['pegawai'] = $this->Pegawai_model->get_detail($id);
        $data['content'] = 'pegawai/detail';
        if($this->Pegawai_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }
}
