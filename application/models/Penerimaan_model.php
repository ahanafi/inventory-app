<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan_model extends CI_Model {

    protected $table = "penerimaan";

    public function get_all()
    {
        $this->db->select("tanggal, aset_baru.material_desc as aset, jumlah, purchasing.id, status");
        $this->db->from($this->table);
        $this->db->join("aset_baru", "aset_baru.id = ".$this->table.".aset");
        $sql = $this->db->get();
        
        return $sql->result_array();
    }

    public function insert($id) {
        $tanggal = date('Y-m-d');
        $data = array(
            'id' => $this->id(),
            'purchase' => $id,
            'tanggal' => $tanggal,
        );

        $this->db->insert($this->table, $data);
        $this->Purchasing_model->update_status($id);
    }

    private function id() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        
        $query  = $this->db->get($this->table);
        $row = $query->row_array();
        $id = substr($row['id'], 2) + 1;
        $kode = 'PN';
        
        return $kode . str_pad($id, 5, '0', STR_PAD_LEFT);
    }

    private function id_detail() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        
        $query  = $this->db->get($this->table . "_detail");
        $row = $query->row_array();
        $id = $row['id'] + 1;
        
        return str_pad($id, 7, '0', STR_PAD_LEFT);
    }

    public function delete($id) {       
        $this->db->delete($this->table, array('id' => $id));
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

    public function report() {
        $date1 = substr($this->input->post('tanggal'), 0, 10);
        $date2 = substr($this->input->post('tanggal'), -10);
    
        if($date1 && $date2){
            $this->db->select($this->table.".*, purchase, purchasing.aset, purchasing.jumlah, purchasing.tanggal as tanggal_beli, aset_baru.material_desc as barang");
            $this->db->from($this->table);
            $this->db->join("purchasing", "purchasing.id = ".$this->table.".purchase");
            $this->db->join("aset_baru", "purchasing.aset = aset_baru.id");
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