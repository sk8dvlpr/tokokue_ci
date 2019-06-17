<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class M_Store extends CI_Model
{
    public function registration($data)
    {
        $this->db->insert('tb_toko', $data);
        return $this->db->affected_rows();
    }

    public function loginStore($email)
    {
        return $this->db->get_where('tb_toko', ['email' => $email])->row_array();
    }

    public function getDataStore($id_toko = NULL)
    {
        if ($id_toko == NULL)
        {
            return $this->db->get('tb_toko')->result_array();
        }
        else
        {
            return $this->db->get_where('tb_toko', ['id_toko' => $id_toko])->row_array();
        }
    }

    public function getDataProducts($kd_kue = NULL)
    {
        $this->db->join('tb_kategori_kue', 'tb_kategori_kue.kd_kategori_kue = tb_kue.kd_kategori_kue');

        if ($kd_kue == NULL)
        {
            return $this->db->get("tb_kue")->result_array();
        }
        else
        {            
            return $this->db->get_where("tb_kue", ['kd_kue' => $kd_kue])->row_array();
        }
    }

    public function getDataProductsByToko($id_toko = NULL)
    {
        if ($id_toko == NULL)
        {
            return $this->db->get("tb_kue")->result_array();
        }
        else
        {   
            $this->db->order_by('tb_kue.tanggal_ditambah', 'DESC');         
            return $this->db->get_where("tb_kue", ['id_toko' => $id_toko])->result_array();
        }
    }

    public function getDataTransaction($id_transaksi = NULL)
    {
        $this->db->join('tb_kue', 'tb_kue.kd_kue = tb_r_transaksi.kd_kue');
        $this->db->join('tb_users', 'tb_users.id_user = tb_r_transaksi.id_user');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_transaksi = tb_r_transaksi.id_transaksi');

        $this->db->select('tb_kue.photo_path, tb_kue.nama_kue, tb_kue.harga_kue, tb_users.nama_depan, tb_users.nama_belakang, tb_users.no_handphone,  tb_users.no_telp, tb_users.alamat, tb_transaksi.status_transaksi, tb_transaksi.status_penerimaan, tb_transaksi.status_pengiriman, tb_transaksi.status_sampai, tb_transaksi.id_transaksi');

        if ($id_transaksi == NULL)
        {
            return $this->db->get("tb_transaksi")->result_array();
        }
        else
        {            
            return $this->db->get_where("tb_r_transaksi", ['tb_r_transaksi.id_transaksi' => $id_transaksi])->result_array();
        }
    }

    public function getDataTransactionByToko($id_toko = NULL)
    {
        $this->db->join('tb_kue', 'tb_kue.kd_kue = tb_r_transaksi.kd_kue');
        $this->db->join('tb_users', 'tb_users.id_user = tb_r_transaksi.id_user');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_transaksi = tb_r_transaksi.id_transaksi');

        $this->db->select('tb_kue.photo_path, tb_kue.nama_kue, tb_kue.harga_kue, tb_users.nama_depan, tb_users.nama_belakang, tb_users.no_handphone,  tb_users.no_telp, tb_users.alamat, tb_transaksi.status_transaksi, tb_transaksi.status_penerimaan, tb_transaksi.status_pengiriman, tb_transaksi.status_sampai, tb_transaksi.id_transaksi, tb_transaksi.tanggal_transaksi');
        $this->db->order_by('tb_transaksi.tanggal_transaksi', 'DESC');

        if ($id_toko == NULL)
        {
            return $this->db->get("tb_transaksi")->result_array();
        }
        else
        {            
            return $this->db->get_where("tb_r_transaksi", ['tb_r_transaksi.id_toko' => $id_toko])->result_array();
        }
    }

    public function getDataProductsCategory($kd_category = NULL)
    {
        if ($kd_category == NULL)
        {
            return $this->db->get("tb_kategori_kue")->result_array();
        }
        else
        {
            return $this->db->get_where("tb_kategori_kue", ['kd_kategori_kue' => $kd_category])->row_array();
        }
    }

    public function addNewProduct($data)
    {
        $this->db->insert('tb_kue', $data);
        return $this->db->affected_rows();
    }

    public function updateProduct($id_product, $data)
    {
        $this->db->update('tb_kue', $data, ['kd_kue' => $id_product]);
        return $this->db->affected_rows();
    }

    public function updateStatusProduct($id_product)
    {
        // First, get data by id
        $data = $this->getDataProducts($id_product);

        // Check old status
        if($data[('status_kue')] == 1)
        {
            // If true change to false
            $this->db->update('tb_kue', ['status_kue' => 0], ['kd_kue' => $id_product]);
            return $this->db->affected_rows();
        }
        else
        {
            // If false change to true
            $this->db->update('tb_kue', ['status_kue' => 1], ['kd_kue' => $id_product]);
            return $this->db->affected_rows();
        }
    }

    public function deleteProduct($id_product)
    {
        $this->db->delete('tb_kue', ['kd_kue' => $id_product]);
        return $this->db->affected_rows();
    }

    public function getTotalProduct($id_toko)
    {
        $this->db->where('id_toko', $id_toko);
        $this->db->from('tb_kue');
        return $this->db->count_all_results();
    }

    public function getTotalTransaction($id_toko)
    {
        $this->db->where('id_toko', $id_toko);
        $this->db->from('tb_r_transaksi');
        return $this->db->count_all_results();
    }

    public function accept_order($id_transaksi)
    {
        $this->db->update('tb_transaksi', ['status_penerimaan' => 1], ['id_transaksi' => $id_transaksi]);
        return $this->db->affected_rows();
    }

    public function send_order($id_transaksi)
    {
        $this->db->update('tb_transaksi', ['status_pengiriman' => 1], ['id_transaksi' => $id_transaksi]);
        return $this->db->affected_rows();
    }

    public function checkDataStoreByEmail($email)
    {
        if ($this->db->get_where('tb_toko', ['email' => $email])->result())
        {
            // If result has some data
            return TRUE;
        }
        else
        {
            // If result does not has some data
            return FALSE;
        }
    }

    public function update_store($id_store, $data)
    {
        $this->db->update('tb_toko', $data, ['id_toko' => $id_store]);
        return $this->db->affected_rows();
    }
}