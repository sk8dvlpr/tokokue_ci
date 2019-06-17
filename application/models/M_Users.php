<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class M_Users extends CI_Model
{
    private $_table = 'tb_users';

    //----- Model for user registration -----//

    public function registration($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows();
    }

    public function loginUsers($email)
    {
        return $this->db->get_where('tb_users', ['email' => $email])->row_array();
    }

    public function getDataUsers($id_user = NULL)
    {
        if ($id_user == NULL)
        {
            return $this->db->get('tb_users')->result_array();
        }
        else
        {
            return $this->db->get_where('tb_users', ['id_user' => $id_user])->row_array();
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

    public function getDataCart($cart_id = NULL)
    {
        $this->db->join('tb_kue', 'tb_kue.kd_kue = tb_keranjang.kd_kue');
        $this->db->join('tb_toko', 'tb_toko.id_toko = tb_kue.id_toko');
        $this->db->select('tb_keranjang.id_keranjang, tb_keranjang.id_user, tb_kue.kd_kue, tb_kue.harga_kue, tb_toko.id_toko');

        if ($cart_id == NULL)
        {
            return $this->db->get("tb_keranjang")->result_array();
        }
        else
        {            
            return $this->db->get_where("tb_keranjang", ['id_keranjang' => $cart_id])->row_array();
        }
    }

    public function getDataCartByUser($id_user = NULL)
    {
        $this->db->join('tb_kue', 'tb_kue.kd_kue = tb_keranjang.kd_kue');
        $this->db->join('tb_toko', 'tb_toko.id_toko = tb_kue.id_toko');
        $this->db->select('tb_kue.photo_path, tb_kue.nama_kue, tb_kue.harga_kue, tb_toko.nama_toko, tb_toko.no_handphone,  tb_toko.no_telp, tb_keranjang.status_keranjang, tb_keranjang.id_keranjang');

        if ($id_user == NULL)
        {
            return $this->db->get("tb_keranjang")->result_array();
        }
        else
        {            
            return $this->db->get_where("tb_keranjang", ['id_user' => $id_user, 'status_keranjang' => 1])->result_array();
        }
    }

    public function getDataTransaction($id_transaksi = NULL)
    {
        $this->db->join('tb_kue', 'tb_kue.kd_kue = tb_r_transaksi.kd_kue');
        $this->db->join('tb_toko', 'tb_toko.id_toko = tb_r_transaksi.id_toko');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_transaksi = tb_r_transaksi.id_transaksi');

        $this->db->select('tb_kue.photo_path, tb_kue.nama_kue, tb_kue.harga_kue, tb_toko.nama_toko, tb_toko.no_handphone,  tb_toko.no_telp, tb_transaksi.status_transaksi, tb_transaksi.status_penerimaan, tb_transaksi.status_pengiriman, tb_transaksi.status_sampai, tb_transaksi.id_transaksi');

        if ($id_transaksi == NULL)
        {
            return $this->db->get("tb_transaksi")->result_array();
        }
        else
        {            
            return $this->db->get_where("tb_r_transaksi", ['tb_r_transaksi.id_transaksi' => $id_transaksi])->result_array();
        }
    }

    public function getDataTransactionByUser($id_user = NULL)
    {
        $this->db->join('tb_kue', 'tb_kue.kd_kue = tb_r_transaksi.kd_kue');
        $this->db->join('tb_toko', 'tb_toko.id_toko = tb_r_transaksi.id_toko');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_transaksi = tb_r_transaksi.id_transaksi');

        $this->db->select('tb_kue.photo_path, tb_kue.nama_kue, tb_kue.harga_kue, tb_toko.nama_toko, tb_toko.no_handphone,  tb_toko.no_telp, tb_transaksi.status_transaksi, tb_transaksi.status_penerimaan, tb_transaksi.status_pengiriman, tb_transaksi.status_sampai, tb_transaksi.id_transaksi, tb_transaksi.tanggal_transaksi');
        $this->db->order_by('tb_transaksi.tanggal_transaksi', 'DESC');

        if ($id_user == NULL)
        {
            return $this->db->get("tb_transaksi")->result_array();
        }
        else
        {            
            return $this->db->get_where("tb_r_transaksi", ['id_user' => $id_user])->result_array();
        }
    }

    public function checkCart($id_product, $id_user)
    {
        $this->db->where('status_keranjang !=', 0);
        return $this->db->get_where('tb_keranjang', ['kd_kue' => $id_product, 'id_user' => $id_user])->row_array();
    }

    public function addCart($data)
    {
        $this->db->insert('tb_keranjang', $data);
        return $this->db->affected_rows();
    }

    public function updateCart($cart_id)
    {
        $this->db->update('tb_keranjang', ['status_keranjang' => 0], ['id_keranjang' => $cart_id]);
        return $this->db->affected_rows();
    }

    public function deleteCart($cart_id)
    {
        $this->db->delete('tb_keranjang', ['id_keranjang' => $cart_id]);
        return $this->db->affected_rows();
    }

    public function transaction($data)
    {
        $this->db->insert('tb_transaksi', $data);
        return $this->db->affected_rows();
    }

    public function transaction_relation($data)
    {
        $this->db->insert('tb_r_transaksi', $data);
        return $this->db->affected_rows();
    }

    public function order_arrived($id_transaksi)
    {
        $this->db->update('tb_transaksi', ['status_sampai' => 1, 'status_transaksi' => 1], ['id_transaksi' => $id_transaksi]);
        return $this->db->affected_rows();
    }

    public function checkDataUsersByEmail($email)
    {
        if ($this->db->get_where('tb_users', ['email' => $email])->result())
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

    public function update_users($id_user, $data)
    {
        $this->db->update('tb_users', $data, ['id_user' => $id_user]);
        return $this->db->affected_rows();
    }    
}