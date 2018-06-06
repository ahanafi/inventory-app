<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Return_model extends CI_Model {

	protected $table = "return";

	public function get_all()
	{
        $this->db->select($this->table.".*, aset_baru.id as asetid, aset_baru.material_desc as aset, ".$this->table.".jumlah as jrt");
        $this->db->from($this->table);
        $this->db->join("aset_baru", "aset_baru.id = return.aset");
		$sql = $this->db->get();
		return $sql->result_array();

	}

	public function returned(){
        $data = array(
            'id' => '',
            'aset' => '',
            'jumlah' => '',
            'tanggal' => date('Y-m-d'),
            'keterangan' => '',
        );
        
        return $data;
	}

    public function insert() {
        $pc = explode("/", $this->input->post('aset'));
        $jumlah_po = $this->input->post('jumlah_po');
        $jumlah = $this->input->post('jumlah');
        $aset = end($pc);

        $data = array(
            'id' => $this->id(),
            'aset' => $aset,
            'tanggal' => $this->input->post('tanggal'),
            'jumlah' => $jumlah,
            'keterangan' => $this->input->post('keterangan')
        );        

        $this->db->insert($this->table, $data);
        
        $this->db->set('stock', 'stock -'.$jumlah, FALSE);
        $this->db->where('id', $aset);
        $this->db->update("aset_baru");
    }

    public function update($id) {
        $pc = explode("/", $this->input->post('aset'));
        $jumlah_po = $this->input->post('jumlah_po');
        $jumlah = $this->input->post('jumlah');
        $aset = end($pc);

        $data = array(
            'aset' => $aset,
            'tanggal' => $this->input->post('tanggal'),
            'jumlah' => $jumlah,
            'keterangan' => $this->input->post('keterangan')
        );

        $return = $this->db->get_where($this->table, array('id' => $id))->row();

        if($jumlah < $return->jumlah) {
            $stock_tambahan = $return->jumlah - $jumlah;
            //Ditambahin data asetnya
            $this->Aset_baru_model->add_stok($aset, $stock_tambahan);
        } else {
            $stock_tambahan = $jumlah - $return->jumlah;
            //Dikurangin data asetnya
            $this->Aset_baru_model->delete_stok($aset, $stock_tambahan);
        }

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    private function id() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        
        $query	= $this->db->get($this->table);
        $row = $query->row_array();
        $id = substr($row['id'], 2) + 1;
        $kode = 'RT';
        
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

    public function get_by_id($id) {
        $this->db->select($this->table.".*, aset_baru.material_desc, aset_baru.stock");
        $this->db->from($this->table);
        $this->db->join("aset_baru", "aset_baru.id = return.aset");
        $this->db->where($this->table.'.id', $id);
        $query = $this->db->get();
        
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

    public function update_status($id) {
        $data = array(
            'status' => 1
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function report() {
        $date1 = substr($this->input->post('tanggal'), 0, 10);
        $date2 = substr($this->input->post('tanggal'), -10);
    
        if($date1 && $date2){
            $this->db->select($this->table.".*, purchasing.id as purchase, purchasing.aset, purchasing.status, aset_baru.material_desc as aset, purchasing.jumlah as jpo, ".$this->table.".jumlah as jrt");
            $this->db->from($this->table);
            $this->db->join("purchasing", $this->table.".purchase = purchasing.id");
            $this->db->join("aset_baru", "aset_baru.id = purchasing.aset");
            $this->db->where($this->table.'.tanggal >=', $date1);
            $this->db->where($this->table.'.tanggal <=', $date2);
            
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