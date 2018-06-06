<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

	public function __construct() {
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
		$this->cart->destroy();

		$data['content'] = "penerimaan/view";
		$data['purchasing'] = $this->Purchasing_model->get_all();
		$this->load->view('layout/wrapper', $data);
	}

    public function accept($id)
    {
        $this->Penerimaan_model->insert($id);
    	redirect(site_url('penerimaan'));
    }


}

/* End of file Permintaan.php */
/* Location: ./application/controllers/Permintaan.php */