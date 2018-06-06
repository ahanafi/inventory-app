<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian_model extends CI_Model {

    private $table = 'bagian';

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
    	$this->db->order_by("bagian", "ASC");
    	
        $query = $this->db->get($this->table);
        
        return $query->result_array();
    }

    public function get_by_id($id) {
        $this->db->where('id', $id);
        
        $query = $this->db->get($this->table);
        
        return $query->row_array();
    }

    public function count() {
        $this->db->from($this->table);
        
        return $this->db->count_all_results();
    }
        
    public function bagian() {
        $data = array(
            'id' => '',
            'bagian' => '',
        );
        
        return $data;
    }
    
    public function insert() {    	
        $data = array(
            'id' => $this->id(),
            'bagian' => $this->input->post('bagian'),
        );
        $this->db->insert($this->table, $data);
    }

    public function update($id) {
        $data = array(
            'id' => $id,
            'bagian' => $this->input->post('bagian'),
        );

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    private function id() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        
        $query	= $this->db->get($this->table);
        $row = $query->row_array();
        $id = substr($row['id'], 2) + 1;
        $kode = 'DV';
        
        return $kode . str_pad($id, 5, '0', STR_PAD_LEFT);
    }

}
