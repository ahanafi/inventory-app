<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	private $user;

	public function __construct() {
        parent::__construct();
        $this->load->model('Aset_baru_model', '', TRUE);
        $this->load->model('Pengguna_model', '', TRUE);
        $this->load->model('Permintaan_model', '', TRUE);
    }

	public function index() {
		if ($this->session->userdata('id') == "") {
            $this->login();
        } else {
            $aset = $this->Aset_baru_model->get_all();
            
        	foreach($aset as $row){
                $data['stok']['name'][] = array($row['material_desc']);
        		$data['stok']['data'][] = array(intval($row['stock']));
        	}
       	
            $data['content'] = 'home';
            $this->load->view('layout/wrapper', $data);
        }
        $this->session->unset_userdata('login');
	}
	
	public function login() {
        $data['action'] = site_url('site/check/');
        $data['pengguna'] = $this->Pengguna_model->get_all();
        $this->load->view('login', $data);
    }
    
    public function logout() {
    	$this->session->unset_userdata($this->user);
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function check() {
		$this->user = $this->Pengguna_model->login();
		if ($this->user) {
			$this->session->set_userdata($this->user);
			redirect(base_url());
		}else{
			//$this->session->set_userdata(array('login' => 'login'));
			echo "<script>alert('Username atau Password Salah!');history.go(-1);</script>";
		}
    }
    
    private function getBulan($bulan){
		switch ($bulan){
			case 01: return "Januari"; break;
			case 02: return "Februari"; break;
			case 03: return "Maret"; break;
			case 04: return "April"; break;
			case 05: return "Mei"; break;
			case 06: return "Juni"; break;
			case 07: return "Juli"; break;
			case 08: return "Agustus"; break;
			case 09: return "September"; break;
			case 10: return "Oktober"; break;
			case 11: return "November"; break;
			case 12: return "Desember"; break;
		}
	}
}
