<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_baru_model extends CI_Model {

    private $table = 'aset_baru';

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {    	
        $query = $this->db->get($this->table);
        
        return $query->result_array();
    }

    public function get_by_id($id) {
        $this->db->where('id', $id);
        
        $query = $this->db->get($this->table);
        
        return $query->row_array();
    }

    public function get_by_return($id) {
        $this->db->where('id', $id);
        
        $query = $this->db->get($this->table);
        
        return $query->result_array();
    }
    
    public function get_detail($id) {
        $this->db->where('id', $id);
        
        $query = $this->db->get($this->table);
        
        return $query->row_array();
    }

    public function count() {
        $this->db->from($this->table);
        
        return $this->db->count_all_results();
    }
        
    public function aset() {
        $data = array(
            'id' => '',
            'plant' => '',
            'storage_location' => '',
            'desc_storage' => '',
            'material' => '',
            'material_desc' => '',
            'base_unit' => '',
            'rack' => '',
            'base' => '',
            'correct' => '',
            'stock' => '',
            'picture' => '../box.png',
        );
        
        return $data;
    }
    
    public function insert() {
		$config_upload = array(
			'upload_path' => './assets/img/upload/',
        	'allowed_types' => 'jpg|jpeg|png|gif',
        	'overwrite' => TRUE,
        	'file_name' => $this->id()
        );
        
        $data = array(
            'id' => $this->id(),
            'plant' => $this->input->post('plant'),
            'storage_location' => $this->input->post('storage_location'),
            'desc_storage' => $this->input->post('desc_storage'),
            'material' => $this->input->post('material'),
            'material_desc' => strtoupper($this->input->post('material_desc')),
            'base_unit' => $this->input->post('base_unit'),
            'rack' => $this->input->post('rack'),
            'base' => $this->input->post('base'),
            'correct' => $this->input->post('correct'),
            'stock' => $this->input->post('stock'),
        );

		//UPLOAD IMAGE
        if($this->input->post('picture')){
            $data['picture'] = $this->id() . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $this->upload->initialize($config_upload);
            $this->upload->do_upload('foto');
        }
    
    	//INSERT DATA
        $this->db->insert($this->table, $data);
    }

    public function update($id, $data = array()) {
    	$config_upload = array(
			'upload_path' => './assets/img/upload/',
        	'allowed_types' => 'jpg|jpeg|png|gif',
        	'overwrite' => TRUE,
        	'file_name' => $id
        );
        
        $data = array(
            'id' => $id,
            'plant' => $this->input->post('plant'),
            'storage_location' => $this->input->post('storage_location'),
            'desc_storage' => $this->input->post('desc_storage'),
            'material' => $this->input->post('material'),
            'material_desc' => strtoupper($this->input->post('material_desc')),
            'base_unit' => $this->input->post('base_unit'),
            'rack' => $this->input->post('rack'),
            'base' => $this->input->post('base'),
            'correct' => $this->input->post('correct'),
            'stock' => $this->input->post('stock'),
        );

		//UPDATE IMAGE
        if($this->input->post('picture')){
        	$data['picture'] = $id . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        	array_map('unlink', glob(FCPATH . 'assets/img/upload/' .$id . "*"));
        	$this->upload->initialize($config_upload);
        	$this->upload->do_upload('foto');
        }
        
        //UPDATE DATA
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id) {
        //DELETE IMAGE
    	array_map('unlink', glob(FCPATH . 'assets/img/upload/' .$id . "*"));
    	
    	//DELETE DATA
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
    
    public function add_stok($id, $stok) {
        $this->db->set('stock', 'stock + ' . $stok, FALSE);
        $this->db->where('id', $id);
        $this->db->update($this->table);
    }
    
    public function delete_stok($id, $stok) {
        $this->db->set('stock', 'stock - ' . $stok, FALSE);
        $this->db->where('id', $id);
        $this->db->update($this->table);
    }

    private function id() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        
        $query	= $this->db->get($this->table);
        $row = $query->row_array();
        $id = substr($row['id'], 2) + 1;
        $kode = 'AB';
        
        return $kode . str_pad($id, 5, '0', STR_PAD_LEFT);
    }

    public function stock()
    {
        $this->db->select("id, material_desc as barang, base_unit as unit, stock");
        $this->db->from($this->table);
        $sql = $this->db->get();
        return $sql->result_array();
    }

}
