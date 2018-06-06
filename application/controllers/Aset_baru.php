<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_baru extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Aset_baru_model', '', TRUE);
        if($this->session->userdata('id') == ''){
        	redirect(base_url());
        }
    }

	public function index() {
        $data['aset_baru'] = $this->Aset_baru_model->get_all();
        $data['content'] = 'aset-baru/view';

        $this->load->view('layout/wrapper', $data);
    }

    public function add() {
        $data['title'] = 'Tambah';
        $data['aset_baru'] = $this->Aset_baru_model->aset();
        $data['action'] = site_url('aset-baru/save');
        $data['content'] = 'aset-baru/form';
        
        $this->load->view('layout/wrapper', $data);
    }

    public function edit($id) {
        $data['title'] = 'Ubah';
        $data['aset_baru'] = $this->Aset_baru_model->get_by_id($id);
        $data['action'] = site_url('aset-baru/save/' . $id);
        $data['content'] = 'aset-baru/form';
        if($this->Aset_baru_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }

    public function save($id = NULL) {
        if (!$id) {
            $this->Aset_baru_model->insert();
        } else {
            $this->Aset_baru_model->update($id);
        }
        redirect('aset-baru/index');
    }

    public function delete($id) {
        $this->Aset_baru_model->delete($id);
        redirect('aset-baru/index');
    }

    public function detail($id) {
        $data['aset_baru'] = $this->Aset_baru_model->get_detail($id);
        $data['content'] = 'aset-baru/detail';
        if($this->Aset_baru_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }
}
