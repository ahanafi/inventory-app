<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	private $limit = 10;

	public function __construct() {
        parent::__construct();
        $hak_akses = $this->session->userdata;
        if($hak_akses['level'] == "admin" || $hak_akses['level'] == "manager") {
            return TRUE;
        } else {
            if($hak_akses['id'] == "") {
                redirect(base_url());
            } else {
                redirect(base_url('My404'));
            }
        }
    }

	public function pengguna() {
        $data['pengguna'] = $this->Pengguna_model->get_all();
        $data['content'] = 'laporan/pengguna/view';

        $this->load->view('layout/wrapper', $data);
    }
    
    public function cetak_pengguna() {
		$data['pengguna'] = $this->Pengguna_model->get_all();
		$this->load->view('laporan/pengguna/print', $data);
		
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('a4', 'Landscape');
		$this->dompdf->render();
		$this->dompdf->stream("Pengguna.pdf", array('Attachment'=>0));
	}
	
	public function aset() {
        $data['aset'] = $this->Aset_baru_model->get_all();
        $data['content'] = 'laporan/aset-baru/view';

        $this->load->view('layout/wrapper', $data);
    }
    
    public function cetak_aset() {
        $data['aset'] = $this->Aset_baru_model->get_all();
		$html = $this->load->view('laporan/aset-baru/print', $data, TRUE);
		$this->load->library('dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('a4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("Aset.pdf", array('Attachment'=>FALSE));
	}
	
	public function pegawai() {
        $data['pegawai'] = $this->Pegawai_model->get_all();
        $data['content'] = 'laporan/pegawai/view';

        $this->load->view('layout/wrapper', $data);
    }
    
    public function cetak_pegawai() {
        $data['pegawai'] = $this->Pegawai_model->get_all();
		$this->load->view('laporan/pegawai/print', $data);
		
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('a4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("Pegawai.pdf", array('Attachment'=>0));
	}

	public function returned()
	{
		$data['return'] = $this->Return_model->report();
		$data['content'] = "laporan/return/view";
		$this->load->view('layout/wrapper', $data);

		$this->session->set_userdata(array('return' => $this->Return_model->report()));
	}

    public function cetak_return()
    {
        $data['return'] = $this->session->userdata('return');
		$this->load->view('laporan/return/print', $data);
		
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('a4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Return Barang.pdf", array('Attachment'=>0));
	}

	public function penerimaan()
	{
		$data['penerimaan'] = $this->Penerimaan_model->report();
		$data['content'] = "laporan/penerimaan/view";
		$this->load->view('layout/wrapper', $data);

		$this->session->set_userdata(array('penerimaan' => $this->Penerimaan_model->report()));
	}

	public function cetak_penerimaan()
	{
		$data['penerimaan'] = $this->session->userdata('penerimaan');
		$this->load->view('laporan/penerimaan/print', $data);
		
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('a4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Penerimaan Barang.pdf", array('Attachment'=>0));
	}

	public function stock()
	{
		$data['stock'] = $this->Aset_baru_model->stock();
		$data['content'] = "laporan/stock/view";
		$this->load->view('layout/wrapper', $data);
	}

    public function cetak_stock() {
        $data['stock'] = $this->Aset_baru_model->stock();
		$html = $this->load->view('laporan/stock/print', $data, TRUE);
		$this->load->library('dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('a4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("Stock Barang.pdf", array('Attachment'=>FALSE));
	}

	public function pengeluaran()
	{
		$data['pengeluaran'] = $this->Permintaan_model->report_pengeluaran();
		$data['content'] = "laporan/pengeluaran/view";
		$this->load->view('layout/wrapper', $data);

		$this->session->set_userdata(array('pengeluaran' => $this->Permintaan_model->report_pengeluaran()));
	}

	public function cetak_pengeluaran()
	{
		$data['pengeluaran'] = $this->session->userdata('pengeluaran');
		$this->load->view('laporan/pengeluaran/print', $data);
		
		$html = $this->output->get_output();
		
		$this->load->library('dompdf_gen');
		
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('a4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Pengeluaran Barang.pdf", array('Attachment'=>0));
	}

}
