<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchasing extends CI_Controller {

	private $aset = array();

	public function __construct()
	{
		parent::__construct();
		foreach($this->Aset_baru_model->get_all() as $data){
            $this->aset[$data['id']] = array(
                'material'  => $data['material'],
                'name' => $data['material_desc'],
                'type' => $data['base_unit']
            );
        }
        
        $hak_akses = $this->session->userdata;
        if($hak_akses['level'] == "admin" || $hak_akses['level'] == "purchasing") {
            return TRUE;
        } else {
            if($hak_akses['id'] == "") {
                redirect(base_url());
            } else {
                redirect(base_url('My404'));
            }
        }
	}

	public function index()
	{
		$data['content'] = "purchase/view";
		$data['purchasing'] = $this->Purchasing_model->get_all();
		$this->load->view('layout/wrapper', $data);
	}

	public function add()
	{
		$data['content'] = "purchase/form";
		$data['title'] = "Order";
		$data['action'] = site_url('purchasing/save');
		$data['purchasing'] = $this->Purchasing_model->purchase();
		$data['aset_baru'] = $this->Aset_baru_model->get_all();
		$this->load->view('layout/wrapper', $data);
	}

	public function edit($id)
	{
		$data['content'] = "purchase/form";
		$data['title'] = "Edit PO";
		$data['action'] = site_url('purchasing/save/'.$id);
		$data['purchasing'] = $this->Purchasing_model->get_by_id($id);
		$data['aset_baru'] = $this->Aset_baru_model->get_all();
		$this->load->view('layout/wrapper', $data);
	}

	public function save($id = NULL)
	{
		if(!$id) {
			$this->Purchasing_model->insert();
		} else {
			$this->Purchasing_model->update($id);
		}

		redirect(site_url('purchasing'));
	}

    public function delete($id) {
	    $this->Purchasing_model->delete($id);
		redirect('purchasing/index');
    }

}

/* End of file Purchasing.php */
/* Location: ./application/controllers/Purchasing.php */