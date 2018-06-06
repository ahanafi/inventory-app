<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {

	private $aset = array();

	public function __construct() {
        parent::__construct();
        $this->load->model('Aset_baru_model', '', TRUE);
        $this->load->model('Permintaan_model', '', TRUE);
        $this->load->model('Pegawai_model', '', TRUE);

        foreach($this->Aset_baru_model->get_all() as $data){
            $this->aset[$data['id']] = array(
                'material'  => $data['material'],
                'name' => $data['material_desc'],
                'type' => $data['base_unit']
            );
        }
        $hak_akses = $this->session->userdata;
        if($hak_akses['level'] == "admin" || $hak_akses['level'] == "produksi") {
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
		$data['content'] = "permintaan/view";
		$data['permintaan'] = $this->Permintaan_model->get_all();
		$this->load->view('layout/wrapper', $data);
	}

	public function add()
	{
		$data['title'] = "Tambah Permintaan";
		$data['action'] = site_url("permintaan/save");
		$data['content'] = "permintaan/form";
		$data['permintaan']['tanggal'] = date('Y-m-d');
		$data['pegawai'] = $this->Pegawai_model->get_all();
		$data['aset_baru'] = $this->Aset_baru_model->get_all();
		
		$this->session->set_flashdata('pegawai', $this->session->flashdata('pegawai'));

		$this->load->view('layout/wrapper', $data);
	}

    public function add_cart($id = NULL) {
    	$this->session->set_flashdata('pegawai', $this->input->post('id_pegawai'));

        if (!$id) {
        	$stok_aset = array();
			$jumlah_pesanan = array();
		    foreach($this->Aset_baru_model->get_all() as $row){
		    	$stok_aset[$row['id']] = $row['stock'];
		    }
		    
		    foreach($this->cart->contents() as $row){
		    	$jumlah_pesanan[$row['id']] = $row['qty'];
		    }
		    
            $jumlah = $this->input->post('jumlah');
            $aset_pilihan = $this->input->post('aset');

		    if($jumlah + $jumlah_pesanan[$aset_pilihan] > $stok_aset[$aset_pilihan]){
		    	$data_session = array(
		    		'cek_stok'	=> 'kosong',
		    		'stok'		=> $stok_aset[$aset_pilihan] - $jumlah_pesanan[$aset_pilihan],
		    		'kurang'	=> $stok_aset[$aset_pilihan] - ($jumlah + $jumlah_pesanan[$aset_pilihan]),
		    	);
				$this->session->set_flashdata($data_session);
		    }else{
				$cart = array(
				    'id' => $this->input->post('aset'),
				    'name' => $this->aset[$this->input->post('aset')]['name'],
				    'price' => 0,
				    'qty' => $this->input->post('jumlah'),
				    'options' => array(
                        'type' => $this->aset[$this->input->post('aset')]['type']
                    )
				);

				$this->cart->insert($cart);
		    }
            redirect('permintaan/add');
        } else {
	        $stok_aset = array();
			$jumlah_pesanan = array();
			
		    foreach($this->Aset_baru_model->get_all() as $row){
			    foreach($this->Permintaan_model->get_permintaan_detail($id) as $row2){
        			if($row['id'] == $row2['aset']){
        				$stok_aset[$row['id']] = $row['stock'] + $row2['jumlah'];
        				break;
        			}else{
        				$stok_aset[$row['id']] = $row['stock'];
        				break;
        			}
        		}
		    }
		    
		    foreach($this->cart->contents() as $row){
		    	$jumlah_pesanan[$row['id']] = $row['qty'];
		    }
		    
            $jumlah = $this->input->post('jumlah');
            $aset_pilihan = $this->input->post('aset');

		    if($jumlah + $jumlah_pesanan[$aset_pilihan] > $stok_aset[$aset_pilihan]){
				$this->session->set_flashdata('cek_stok', 'kosong');
		    }else{
				$cart = array(
				    'id' => $this->input->post('aset'),
				    'name' => $this->aset[$this->input->post('aset')]['name'],
				    'price' => 0,
				    'qty' => $this->input->post('jumlah'),
				    'options' => array('type' => $this->aset[$this->input->post('aset')]['type'])
				);
				$this->cart->insert($cart);
		    }
		    
            redirect('permintaan/edit/' . $id);
        }
    }

    public function delete_cart() {
    	$this->session->set_flashdata('pegawai', $this->session->flashdata('pegawai'));
    	
        $data = array(
            'rowid' => $this->uri->segment(3),
            'qty' => 0
        );
        $this->cart->update($data);
        if (!$this->uri->segment(4)) {
            redirect('permintaan/add');
        } else {
            redirect('permintaan/edit/' . $this->uri->segment(4));
        }
    }

    public function save($id = NULL) {
    	if($this->cart->contents()){
		    if (!$id) {
		        $this->Permintaan_model->insert();
		    } else {
		        $this->Permintaan_model->update($id);
		    }
		    redirect('permintaan/index');
        }else{
        	$this->session->set_flashdata('error_aset', TRUE);
        	if (!$id) {
		        redirect('permintaan/add');
		    } else {
		        redirect('permintaan/update/' . $id);
		    }
        }
    }

    public function delete($id) {
	    $this->Permintaan_model->delete($id);
		redirect('permintaan/index');
    }

    public function detail($id) {
        $data['permintaan'] = $this->Permintaan_model->get_detail($id);
        $data['aset'] = $this->Permintaan_model->get_permintaan_detail($id);
        $data['content'] = 'permintaan/detail';

        if($this->Permintaan_model->get_by_id($id)){
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }

    public function edit($id) {
        $data['title'] = 'Ubah';
        $data['permintaan'] = $this->Permintaan_model->get_by_id($id);
        $data['pegawai'] = $this->Pegawai_model->get_all();
        $data['aset_baru'] = $this->Aset_baru_model->get_all();
        $data['action'] = site_url('permintaan/save/' . $id);
        $data['content'] = 'permintaan/form';
        $data['stok'] = array('name' => '', 'data' => '');
        if($this->Permintaan_model->get_by_id($id)){
        	if($this->session->flashdata('pegawai')){
        		$this->session->set_flashdata('pegawai', $this->session->flashdata('pegawai'));
        	}else{
        		$this->session->set_flashdata('pegawai', $data['permintaan']['pegawai']);
        		$cart = array();
		    	foreach($this->Permintaan_model->get_permintaan_detail($id) as $row){
					$cart[] = array(
						'id' => $row['aset'],
						'name' => $row['aset_merk'],
						'price' => 0,
						'qty' => $row['jumlah'],
						'options' => array('type' => $row['aset_type'])
					);
				}
				$this->cart->insert($cart);
        	}
		    
        	$this->load->view('layout/wrapper', $data);
        }else{
        	redirect('My404');
        }
    }

    public function accept($id)
    {
    	$this->Permintaan_model->update_status($id);
    	redirect(site_url('permintaan'),'refresh');
    }


}

/* End of file Permintaan.php */
/* Location: ./application/controllers/Permintaan.php */