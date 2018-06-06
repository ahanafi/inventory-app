<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returned extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$hak_akses = $this->session->userdata;
        if($hak_akses['level'] == "admin" || $hak_akses['level'] == "gudang") {
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
		$data['content'] = "return/view";
		$data['return'] = $this->Return_model->get_all();
		$this->load->view('layout/wrapper', $data);
	}

	public function add()
	{
		$id = $this->uri->segment(3);
		$data['title'] = "Tambah Return Barang";
		$data['action'] = site_url('return/save');
		$data['return'] = $this->Return_model->returned();
		$data['aset_baru'] = $this->Aset_baru_model->get_all();
		$data['purchasing'] = $this->Purchasing_model->get_all();
		$data['aset'] = $this->Aset_baru_model->get_by_return($id);
		$data['content'] = "return/form";
		$this->load->view('layout/wrapper', $data);
	}

	public function edit($id)
	{
		$id_aset = $this->uri->segment(4);
		$data['title'] = "Edit Return Barang";
		$data['action'] = site_url('return/save/'. $id);
		$data['return'] = $this->Return_model->get_by_id($id);
		/*echo json_encode($data['return']);
		die();*/
		$data['aset_baru'] = $this->Aset_baru_model->get_all();
		$data['purchasing'] = $this->Purchasing_model->get_all();
		$data['aset'] = $this->Aset_baru_model->get_by_return($id_aset);
		$data['content'] = "return/form";
		$this->load->view('layout/wrapper', $data);
	}

	public function save($id = NULL)
	{
		if (!$id) {
			$this->Return_model->insert();
		} else {
			$this->Return_model->update($id);
		}
		redirect(site_url('return'));
	}

}

/* End of file Return.php */
/* Location: ./application/controllers/Return.php */