<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_model extends CI_Model {

	protected $table = "permintaan";

	public function get_all()
	{
		$this->db->select("tanggal, pegawai.nama as pegawai, status,". $this->table.".id");
		$this->db->from($this->table);
		$this->db->join("pegawai", "pegawai.id = ".$this->table.".pegawai");
		$sql = $this->db->get();
		return $sql->result_array();
	}

    public function get_pengeluaran()
    {
        $this->db->select("tanggal, pegawai.nama as pegawai, status,". $this->table.".id");
        $this->db->from($this->table);
        $this->db->join("pegawai", "pegawai.id = ".$this->table.".pegawai");
        $this->db->where('status', 1);
        $sql = $this->db->get();
        return $sql->result_array();
    }

    public function get_belum_acc()
    {
        $this->db->select("tanggal, pegawai.nama as pegawai, status,". $this->table.".id");
        $this->db->from($this->table);
        $this->db->join("pegawai", "pegawai.id = ".$this->table.".pegawai");
        $this->db->where($this->table.".status", 0);
        $sql = $this->db->get();
        return $sql->result_array();
    }

	public function permintaan()
	{
        $data = array(
            'id' => '',
            'pegawai' => '',
            'tanggal' => date('Y-m-d'),
        );
        
        return $data;
	}

    public function insert() {
        $data = array(
            'id' => $this->id(),
            'pegawai' => $this->input->post('pegawai'),
            'tanggal' => $this->input->post('tanggal'),
            'status' => 0
        );
        
        $this->db->trans_start();
        
        //INSERT permintaan
		$id_permintaan = $data['id'];
        $this->db->insert($this->table, $data);

		//INSERT permintaan_detail
        foreach ($this->cart->contents() as $data) {
            $aset = array(
                'id' => $this->id_detail(),
                'permintaan' => $id_permintaan,
                'aset' => $data['id'],
                'jumlah' => $data['qty'],
            );

            //$this->Aset_baru_model->delete_stok($data['id'], $data['qty']);
            $this->db->insert($this->table . '_detail', $aset);
        }
        $this->db->trans_complete();
    }

    private function id() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        
        $query	= $this->db->get($this->table);
        $row = $query->row_array();
        $id = substr($row['id'], 2) + 1;
        $kode = 'PM';
        
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
    	$this->db->trans_start();
    	
    	$this->db->where('permintaan', $id);
        $query = $this->db->get($this->table . "_detail");
        
        foreach($query->result_array() as $data){
        	$this->Aset_baru_model->add_stok($data['aset'], $data['jumlah']);
        }
        
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        
        $this->db->trans_complete();
    }

    public function get_by_id($id) {
        $this->db->where('id', $id);
        
        $query = $this->db->get($this->table);
        
        return $query->row_array();
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
        $data = array(
            'id' => $id,
            'pegawai' => $this->input->post('pegawai'),
            'tanggal' => $this->input->post('tanggal'),
        );
        
        $this->db->trans_start();
        
        //UPDATE peminjaman
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        
        //ADD stok aset
		$query = $this->db->get_where($this->table . "_detail", array('permintaan' => $id));
        foreach($query->result_array() as $data){
        	$this->Aset_baru_model->add_stok($data['aset'], $data['jumlah']);
        }
        
        //DELETE OLD peminjaman_detail
        $this->db->delete($this->table . '_detail', array('permintaan' => $id)); 

		//INSERT NEW peminjaman_detail
        foreach ($this->cart->contents() as $data) {
            $aset = array(
                'id' => $this->id_detail(),
                'permintaan' => $id,
                'aset' => $data['id'],
                'jumlah' => $data['qty'],
            );
            $this->Aset_baru_model->delete_stok($data['id'], $data['qty']);
            $this->db->insert($this->table . '_detail', $aset);
        }
        $this->db->trans_complete();
    }

    public function update_status($id) {
        $this->db->trans_start();
        
        $this->db->select("aset, id, jumlah");
        $this->db->from($this->table."_detail");
        $this->db->where('permintaan', $id);
        $permintaan = $this->db->get()->result_array();

        foreach ($permintaan as $data) {
            $this->Aset_baru_model->delete_stok($data['aset'], $data['jumlah']);
        }
        $this->db->where('id', $id);
        $this->db->update($this->table, array('status' => 1));

        $this->db->trans_complete();
    }

    public function delete_status($id) {
        $this->db->trans_start();
        
        $this->db->select("aset, id, jumlah");
        $this->db->from($this->table."_detail");
        $this->db->where('permintaan', $id);
        $permintaan = $this->db->get()->result_array();

        foreach ($permintaan as $data) {
            $this->Aset_baru_model->add_stok($data['aset'], $data['jumlah']);
        }
        $this->db->where('id', $id);
        $this->db->update($this->table, array('status' => 0));

        $this->db->trans_complete();
    }
    

    public function report_pengeluaran() {
        $date1 = substr($this->input->post('tanggal'), 0, 10);
        $date2 = substr($this->input->post('tanggal'), -10);
    
        if($date1 && $date2){
            $this->db->select($this->table.".*, aset_baru.material_desc as aset, pegawai.nama as pegawai");
            $this->db->from($this->table);
            $this->db->join($this->table."_detail", $this->table.".id = ".$this->table."_detail.".$this->table);
            $this->db->join("aset_baru", "aset_baru.id = ".$this->table."_detail.aset");
            $this->db->join("pegawai", "pegawai.id = ".$this->table.".pegawai");
            $this->db->where($this->table.'.tanggal >=', $date1);
            $this->db->where($this->table.'.tanggal <=', $date2);
            $this->db->where("status", 1);
            
            $this->db->order_by("tanggal", "DESC");
            
            $data = $this->db->get();
            if ($data->num_rows() > 0) {
                return $data->result_array();
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

}

/* End of file Permintaan_model.php */
/* Location: ./application/models/Permintaan_model.php */