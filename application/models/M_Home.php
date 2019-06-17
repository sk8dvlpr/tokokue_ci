<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Home extends CI_Model {

	public function getAllProduct($limit = NULL, $offset = NULL)
	{
		$this->db->join('tb_kategori_kue', 'tb_kategori_kue.kd_kategori_kue = tb_kue.kd_kategori_kue');

		$this->db->order_by('tb_kue.tanggal_ditambah', 'DESC');

		return $this->db->get_where('tb_kue', ['status_kue' => 1], $limit, $offset)->result_array();
	}

	public function getProductDetail($id_product)
	{
		$this->db->join('tb_kategori_kue', 'tb_kategori_kue.kd_kategori_kue = tb_kue.kd_kategori_kue');
		$this->db->join('tb_toko', 'tb_toko.id_toko = tb_kue.id_toko');

		$this->db->select('*, tb_kue.photo_path');

		return $this->db->get_where('tb_kue', ['kd_kue' => $id_product, 'status_kue' => 1])->row_array();
	}

	public function getAllProductFilter($category, $price, $date)
	{
		$this->db->join('tb_kategori_kue', 'tb_kategori_kue.kd_kategori_kue = tb_kue.kd_kategori_kue');

		if ($date == NULL)
		{
			$this->db->order_by('tb_kue.tanggal_ditambah', 'desc');
		}
		else
		{
			$this->db->order_by('tb_kue.tanggal_ditambah', $date);
		}

		if ($price == NULL)
		{
			$this->db->order_by('tb_kue.harga_kue', 'asc');
		}
		else
		{
			$this->db->order_by('tb_kue.harga_kue', $price);
		}

		if ($category)
		{
			$this->db->where('tb_kue.kd_kategori_kue', $category);
		}

		return $this->db->get_where('tb_kue', ['status_kue' => 1])->result_array();
	}

	public function getCategoryProduct()
	{
		return $this->db->get_where('tb_kategori_kue')->result_array();
	}
}

/* End of file M_Home.php */
/* Location: ./application/models/M_Home.php */