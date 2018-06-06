<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchasing_model extends CI_Model {

	protected $table = "purchasing";

	public function get_all()
	{
		$this->db->select("tanggal, aset_baru.material_desc as aset, jumlah, purchasing.id, status");
		$this->db->from($this->table);
		$this->db->join("aset_baru", "aset_baru.id = ".$this->table.".aset");
		$sql = $this->db->get();
		
        return $sql->result_array();
	}

	public function purchase()
	{
        $data = array(
            'id' => '',
            'tanggal' => date('Y-m-d'),
            'status' => '',
            'jumlah' => '',
        );
        
        return $data;
	}

    public function insert() {
        $aset = $this->input->post('aset');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $data = array(
            'id' => $this->id(),
            'aset' => $aset,
            'tanggal' => $tanggal,
            'jumlah'    => $jumlah,
            'status' => 0
        );

        $this->db->insert($this->table, $data);
        $this->Aset_baru_model->add_stok($aset, $jumlah);
    }

    private function id() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        
        $query	= $this->db->get($this->table);
        $row = $query->row_array();
        $id = substr($row['id'], 2) + 1;
        $kode = 'PR';
        
        return $kode . str_pad($id, 5, '0', STR_PAD_LEFT);
    }

    private function id_detail() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        
        $query	= $this->db->get($this->table . "_detail");
        $row = $query->row_array();
        $id = $row['id'] + 1;
        
        return str_pad($id, 7, '0', STR_PAD_LEFT);
    }

    public function delete($id) {   	
        $this->db->delete($this->table, array('id' => $id));
    }

    public function get_by_id($id) {
        $this->db->select("tanggal, aset_baru.material_desc as aset, jumlah, purchasing.id, status");
        $this->db->from($this->table);
        $this->db->join("aset_baru", "aset_baru.id = ".$this->table.".aset");
        $this->db->where($this->table.".id", $id);
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function get_detail($id) {
        $this->db->where('id', $id);
        
        $query = $this->db->get($this->table);
        
        return $query->row_array();
    }

    public function get_permintaan_detail($id) {
    	$this->db->select("aset_baru.id as aset, aset_baru.material_desc as aset_merk, aset_baru.base_unit as aset_type, permintaan_detail.jumlah");
    	$this->db->from($this->table."_detail");
    	$this->db->join($this->table, $this->table.".id = ".$this->table."_detail.".$this->table);
    	$this->db->join("aset_baru", $this->table."_detail.aset = aset_baru.id");
    	$this->db->where($this->table, $id);
    	$query = $this->db->get();
        
        return $query->result_array();
    }

    public function update($id) {
        $aset = $this->input->post('aset');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $data = array(
            'id' => $id,
            'aset' => $aset,
            'tanggal' => $tanggal,
            'jumlah'    => $jumlah,
            'status' => 0
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function update_status($id) {
        $data = array(
            'status' => 1
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }    

}

/* End of file Permintaan_model.php */
/* Location: ./application/models/Permintaan_model.php */