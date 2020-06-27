<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang_model extends CI_Model 
{
	public function getAllBarang()
	{
		
		return $this->db->get('barang')->result_array();
	
	}

	public function tambahDataBarang()
    {
    	$data = [
    		"serialnumber" 		=> $this->input->post('serialnumber',true),
        	"merk" 				=> $this->input->post('merk',true),
        	"type" 				=> $this->input->post('type',true),
        	"sncharger"			=> $this->input->post('sncharger',true),
        	"jenisperangkat"    => $this->input->post('jenisperangkat',true),
        	"kapasitasharddisk" => $this->input->post('kapasitasharddisk',true),
        	"kapasitasmemory"   => $this->input->post('kapasitasmemory',true),
        	"os"    			=> $this->input->post('os',true),
        	"stok" 		   		=> $this->input->post('stok',true),
        	"kondisi"    		=> $this->input->post('kondisi',true)
    	];

        return $this->db->insert('barang', $data);
    }

    public function ubahDataBarang()
    {
    	$data = [
    		"serialnumber" 		=> $this->input->post('serialnumber',true),
        	"merk" 				=> $this->input->post('merk',true),
        	"type" 				=> $this->input->post('type',true),
        	"sncharger"			=> $this->input->post('sncharger',true),
        	"jenisperangkat"    => $this->input->post('jenisperangkat',true),
        	"kapasitasharddisk" => $this->input->post('kapasitasharddisk',true),
        	"kapasitasmemory"   => $this->input->post('kapasitasmemory',true),
        	"os"    			=> $this->input->post('os',true),
        	"stok" 		   		=> $this->input->post('stok',true),
        	"kondisi"    		=> $this->input->post('kondisi',true)
    	];

	    $this->db->where('serialnumber', $serialnumber);
        return $this->db->update('barang', $data);
    }

    public function hapusDataBarang($serialnumber)
    {
        $this->db->where('serialnumber', $serialnumber);
        return $this->db->delete('barang');
    }
}