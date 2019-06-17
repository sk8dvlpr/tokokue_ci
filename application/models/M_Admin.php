<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class M_Admin extends CI_Model
{
    // Function to get admin position
    public function getAdminPosition()
    {
        return $this->db->get('tb_admin_position')->result_array();
    }

    // Function to get data admin account
    public function getDataAdmin($id_admin = NULL)
    {
        // Join table tb_admin_position with table tb_admin
        $this->db->join('tb_admin_position', 'tb_admin_position.id_position = tb_admin.id_position');

        // Check param
        if ($id_admin == NULL)
        {
            // Return data when param null
            return $this->db->get('tb_admin')->result_array();
        }
        else
        {
            // Return data when param true
            return $this->db->get_where('tb_admin', ['id_admin' => $id_admin])->row_array();
        }
    }

    // Function to check availablity email account
    public function checkDataAdminByEmail($email)
    {
        if ($this->db->get_where('tb_admin', ['email' => $email])->result())
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

    // Function to check availablity email account
    public function checkDataAdminByUsername($username)
    {
        if ($this->db->get_where('tb_admin', ['username' => $username])->result())
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

    // Function to check availablity of admin account
    public function loginAdmin($data)
    {
        // Join table tb_admin_position with table tb_admin
        $this->db->join('tb_admin_position', 'tb_admin_position.id_position = tb_admin.id_position');

        // OR statement
        $this->db->or_where('username', $data['username']);
        $this->db->or_where('email', $data['email']);
        
        return $this->db->get('tb_admin')->row_array();
    }

    // Function to add new admin account
    public function addNewAdmin($data)
    {
        $this->db->insert('tb_admin', $data);
        return $this->db->affected_rows();
    }

    // Function to update admin account data
    public function updateAdmin($id_admin, $data)
    {
        $this->db->update('tb_admin', $data, ['id_admin' => $id_admin]);
        return $this->db->affected_rows();
    }

    // Function to update status admin account
    public function updateStatusAdmin($id_admin)
    {
        // First, get data by id
        $data = $this->getDataAdmin($id_admin);

        // Check old status
        if($data[('admin_status')] == 1)
        {
            // If true change to false
            $this->db->update('tb_admin', ['admin_status' => 0], ['id_admin' => $id_admin]);
            return $this->db->affected_rows();
        }
        else
        {
            // If false change to true
            $this->db->update('tb_admin', ['admin_status' => 1], ['id_admin' => $id_admin]);
            return $this->db->affected_rows();
        }
    }

    // Function to delete admin account data
    public function deleteAdmin($id_admin)
    {
        $this->db->delete('tb_admin', ['id_admin' => $id_admin]);
        return $this->db->affected_rows();
    }

    // Function to get data users account
    public function getDataUsers($id_user = NULL)
    {
        // Check param
        if ($id_user == NULL)
        {
            // Return data when param null
            return $this->db->get('tb_users')->result_array();
        }
        else
        {
            // Return data when param true
            return $this->db->get_where('tb_users', ['id_user' => $id_user])->row_array();
        }
    }

    // Function to update status user account
    public function updateStatusUser($id_user)
    {
        // First, get data by id
        $data = $this->getDataUsers($id_user);

        // Check old status
        if($data[('status_user')] == 1)
        {
            // If true change to false
            $this->db->update('tb_users', ['status_user' => 0], ['id_user' => $id_user]);
            return $this->db->affected_rows();
        }
        else
        {
            // If false change to true
            $this->db->update('tb_users', ['status_user' => 1], ['id_user' => $id_user]);
            return $this->db->affected_rows();
        }
    }

    // Function to delete user account data
    public function deleteUser($id_user)
    {
        $this->db->delete('tb_users', ['id_user' => $id_user]);
        return $this->db->affected_rows();
    }

    // Function to get data store account
    public function getDataStore($id_store = NULL)
    {
        // Check param
        if ($id_store == NULL)
        {
            // Return data when param null
            return $this->db->get('tb_toko')->result_array();
        }
        else
        {
            // Return data when param true
            return $this->db->get_where('tb_toko', ['id_toko' => $id_store])->row_array();
        }
    }

    // Function to update status store account
    public function updateStatusStore($id_store)
    {
        // First, get data by id
        $data = $this->getDataStore($id_store);

        // Check old status
        if($data[('status_toko')] == 1)
        {
            // If true change to false
            $this->db->update('tb_toko', ['status_toko' => 0], ['id_toko' => $id_store]);
            $this->db->update('tb_kue', ['status_kue' => 0], ['id_toko' => $id_store]);
            return $this->db->affected_rows();
        }
        else
        {
            // If false change to true
            $this->db->update('tb_toko', ['status_toko' => 1], ['id_toko' => $id_store]);
            return $this->db->affected_rows();
        }
    }

    // Function to delete store account data
    public function deleteStore($id_store)
    {
        $this->db->delete('tb_toko', ['id_toko' => $id_store]);
        return $this->db->affected_rows();
    }

    // Function to get total users
    public function getTotalUsers()
    {
        return $this->db->count_all('tb_users');
    }

    // Function to get total store
    public function getTotalStore()
    {
        return $this->db->count_all('tb_toko');
    }

    // Function to get total transaction
    public function getTotalTransaction()
    {
        return $this->db->count_all('tb_transaksi');
    }

    public function getDataTransaction()
    {
        $this->db->join('tb_kue', 'tb_kue.kd_kue = tb_r_transaksi.kd_kue');
        $this->db->join('tb_users', 'tb_users.id_user = tb_r_transaksi.id_user');
        $this->db->join('tb_toko', 'tb_toko.id_toko = tb_r_transaksi.id_toko');
        $this->db->join('tb_transaksi', 'tb_transaksi.id_transaksi = tb_r_transaksi.id_transaksi');

        $this->db->select('tb_toko.nama_toko, tb_kue.nama_kue, tb_kue.harga_kue, tb_users.nama_depan, tb_users.nama_belakang, tb_users.no_handphone,  tb_users.no_telp, tb_users.alamat, tb_transaksi.status_transaksi, tb_transaksi.status_penerimaan, tb_transaksi.status_pengiriman, tb_transaksi.status_sampai, tb_transaksi.id_transaksi');

        return $this->db->get("tb_r_transaksi")->result_array();
    }
}