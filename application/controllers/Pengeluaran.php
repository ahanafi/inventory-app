<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

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
		$data['content'] = "pengeluaran/view";
		$data['permintaan'] = $this->Permintaan_model->get_pengeluaran();
		$this->load->view('layout/wrapper', $data);
	}

	public function add()
	{
		$id = $this->uri->segment(3);
		$data['title'] = "Tambah Pengeluaran Barang";
		$data['action'] = site_url('pengeluaran/save');
		$data['aset_baru'] = $this->Aset_baru_model->get_all();
		$data['pengeluaran'] = $this->Permintaan_model->permintaan();
		$data['permintaan'] = $this->Permintaan_model->get_belum_acc();
		$data['content'] = "pengeluaran/form";
		$data['permintaan_detail'] = $this->Permintaan_model->get_permintaan_detail($id);
		$this->load->view('layout/wrapper', $data);
	}

	public function save($id = NULL)
	{
		if (!$id) {
			$permintaan = explode("/", $this->input->post('permintaan'));
			$id = end($permintaan);
			$this->Permintaan_model->update_status($id);
		} else {
			$this->Permintaan_model->update_status($id);
		}
		redirect(site_url('pengeluaran'));
	}

	public function detail($id)
	{
		$data['permintaan'] = $this->Permintaan_model->get_by_id($id);
		$data['aset'] = $this->Permintaan_model->get_permintaan_detail($id);
		$data['content'] = "pengeluaran/detail";
		$this->load->view('layout/wrapper', $data);
	}

	public function delete($id)
	{
		$this->Permintaan_model->delete_status($id);
		redirect(site_url('pengeluaran'));
	}
}

/* End of file Pengeluaran.php */
/* Location: ./application/controllers/Pengeluaran.php */