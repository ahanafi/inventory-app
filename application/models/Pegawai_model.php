<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    private $table = 'pegawai';

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
    	$this->db->order_by("nama", "ASC");
    	
        $query = $this->db->get($this->table);
        
        return $query->result_array();
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

    public function count() {
        $this->db->from($this->table);
        
        return $this->db->count_all_results();
    }

    public function pegawai() {
        $data = array(
            'id' => '',
            'nama' => '',
            'bagian' => '',
            'email' => '',
            'telepon' => '',
            'alamat' => '',
            'jenis_kelamin' => '',
            'foto' => '../profile.gif',
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
            'nama' => $this->input->post('nama'),
            'bagian' => $this->input->post('bagian'),
            'email' => $this->input->post('email'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        );
        
    	//UPLOAD IMAGE
        if($this->input->post('foto_label')){
        	$data['foto'] = $this->id() . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        	$this->upload->initialize($config_upload);
        	$this->upload->do_upload('foto');
        }
        
    	//INSERT DATA
        $this->db->insert($this->table, $data);
    }

    public function update($id) {
        $config_upload = array(
			'upload_path' => './assets/img/upload/',
        	'allowed_types' => 'jpg|jpeg|png|gif',
        	'overwrite' => TRUE,
        	'file_name' => $id
        );
        
        $data = array(
            'id' => $id,
            'nama' => $this->input->post('nama'),
            'bagian' => $this->input->post('bagian'),
            'email' => $this->input->post('email'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        );
        
        //UPDATE IMAGE
        if($this->input->post('foto_label')){
        	$data['foto'] = $id . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
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

    private function id() {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        
        $query	= $this->db->get($this->table);
        $row = $query->row_array();
        $id = substr($row['id'], 2) + 1;
        $kode = 'PG';
        
        return $kode . str_pad($id, 5, '0', STR_PAD_LEFT);
    }

}
