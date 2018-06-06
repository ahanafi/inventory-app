<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Bagian_model', '', TRUE);
        if($this->session->userdata('id') == ''){
        	redirect(base_url());
        }
    }

	public function index() {
        $data['bagian'] = $this->Bagian_model->get_all();
        $data['content'] = 'bagian/view';

        $this->load->view('layout/wrapper', $data);
    }

    public function add() {
        $data['title'] = 'Tambah';
        $data['bagian'] = $this->Bagian_model->bagian();
        $data['action'] = site_url('bagian/save');
        $data['content'] = 'bagian/form';
        
        $this->load->view('layout/wrapper', $data);
    }

    public function edit($id) {
        $data['title'] = 'Ubah';
        $data['bagian'] = $this->Bagian_model->get_by_id($id);
        $data['action'] = site_url('bagian/save/' . $id);
        $data['content'] = 'bagian/form';
        if($this->Bagian_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }

    public function save($id) {
        if (!$id) {
            $this->Bagian_model->insert();
        } else {
            $this->Bagian_model->update($id);
        }
        redirect('bagian/index');
    }

    public function delete($id) {
        $this->Bagian_model->delete($id);
        redirect('bagian/index');
    }

    public function detail($id) {
        $data['bagian'] = $this->Bagian_model->get_by_id($id);
        $data['content'] = 'bagian/detail';
        if($this->Bagian_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }
}
