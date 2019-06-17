<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Users', 'users');
        date_default_timezone_set("Asia/Bangkok");
    }

    // Function for alert message
    private function setAlert($name = NULL, $status = NULL, $message = NULL)
    {
        if ($status == 'success')
        {
            // For success alert
            return $this->session->set_flashdata($name, '<div class="alert alert-success alert-dismissible" style="margin-bottom:5px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> '. $message .'</div>');
        }
        elseif ($status == 'warning')
        {
            // For warning alert
            return $this->session->set_flashdata($name, '<div class="alert alert-warning alert-dismissible" style="margin-bottom:5px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Warning!</strong> '. $message .'</div>');
        }
        else
        {
            // For danger alert
            return $this->session->set_flashdata($name, '<div class="alert alert-danger alert-dismissible" style="margin-bottom:5px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Danger!</strong> '. $message .'</div>');
        }
    }

    private function checkUsersSession()
    {
        if ($this->session->has_userdata('logged_in'))
        {
            // If has, will pass
            return TRUE;
        }
        else
        {
            // If not, will redirect
            redirect('users');
        }
    }

    private function uploadProfilePicture($id_user, $data)
    {
        $config['upload_path']      = './assets/img/users/';
        $config['allowed_types']    = 'jpeg|jpg|png';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = true;

        $this->upload->initialize($config);

        $old_image = $data['data_session']['photo_path'];

        if ($this->upload->do_upload('photo'))
        {
            if ($old_image != 'default-user.png')
            {
                unlink(FCPATH . 'assets/img/users/'. $old_image);
                return TRUE;   
            }
        }
        else
        {
            // Process when failed
            $this->setAlert('message', 'warning', $this->upload->display_errors());
            redirect('users/profile/update/'.$id_user);
        }
    }
    
    public function user_registration()
	{
        if ($this->form_validation->run('user_registration') == FALSE)
        {
            $this->load->view('home/_partials/header');
            $this->load->view('home/_partials/navbar');
            $this->load->view('home/user_registration');
            $this->load->view('home/_partials/footer');
        }
        else
        {
            $data = array (
                'id_user' => 'USR' . random_string('basic', 5),
                'nama_depan' => htmlspecialchars($this->input->post('firstname', TRUE)),
                'nama_belakang' => htmlspecialchars($this->input->post('lastname', TRUE)),
                'alamat' => htmlspecialchars($this->input->post('address', TRUE)),
                'no_telp' => NULL,
                'no_handphone' => htmlspecialchars($this->input->post('phonenumber', TRUE)),
                'photo_path' => 'default-user.png',
                'email' => htmlspecialchars($this->input->post('email', TRUE)),
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
                'tanggal_pendaftaran' => date('Y-m-d h:i:s'),
                'status_user' => 1
            );

            // Saving & Checking data
            if($this->users->registration($data))
            {
                // Process when success
                $this->setAlert('message', 'success', 'Akun anda sudah berhasil dibuat.');
                redirect('registration/user');
            }
            else
            {
                // Process when failed
                $this->setAlert('message', 'warning', 'Akun anda gagal dibuat.');
                redirect('registration/user');
            }
        }
	}

    public function index()
    {
        // Check session
        (!$this->session->has_userdata('logged_in')) ? TRUE :  redirect('home');

        // Check form validation
        if($this->form_validation->run('users_login') == FALSE)
        {
            // Before submit process
            $this->load->view('users/login');
        }
        else
        {
            // When submit process

            // Get data
            $data = array (
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => $this->input->post('password', true)
            );

            // Send data to model
            $result = $this->users->loginUsers($data['email']);

            // Check availability of account
            if ($result)
            {
                if ($result['status_user'] != FALSE)
                {
                    // Check if password is correct
                    if (password_verify($data['password'], $result['password']))
                    {
                        // Set data for session
                        $session_data = array(
                            'id_user' => $result['id_user'],
                            'logged_in' => true
                        );

                        // Set data to session
                        $this->session->set_userdata($session_data);
                        $this->setAlert('message', 'success', 'Welcome back, ' . $result['nama_belakang']);
                        redirect('home');
                    }
                    else
                    {
                        // If password is not correct
                        $this->setAlert('message', 'warning', 'Password your entered not valid.');
                        redirect('users');
                    }
                }
                else
                {
                    $this->setAlert('message', 'warning', 'Your account is not active, please contact admin to active you account.');
                    redirect('users');
                }
            }
            else
            {
                // If data not valid
                $this->setAlert('message', 'warning', 'Email your entered not valid.');
                redirect('users');
            }
        }
    }

    public function logout()
    {
        // Destroy session data
        $this->session->sess_destroy();
        redirect('home');
    }

    public function dashboard()
    {
        // Check session
        $this->checkUsersSession();

        $data['title'] = "Dashboard";
        $data['data_session'] = $this->users->getDataUsers($this->session->userdata('id_user'));

        $this->load->view('users/_partials/header', $data);
        $this->load->view('users/_partials/navbar_top', $data);
        $this->load->view('users/_partials/sidebar');
        $this->load->view('users/dashboard');
        $this->load->view('users/_partials/footer');
    }

    public function carts()
    {
        $this->checkUsersSession();

        $data['title'] = "Carts";
        $data['data_session'] = $this->users->getDataUsers($this->session->userdata('id_user'));
        $data['carts'] = $this->users->getDataCartByUser($this->session->userdata('id_user'));

        $this->load->view('users/_partials/header', $data);
        $this->load->view('users/_partials/navbar_top', $data);
        $this->load->view('users/_partials/sidebar');
        $this->load->view('users/carts', $data);
        $this->load->view('users/_partials/footer');
    }

    public function order($cart_id = NULL)
    {
        $data['data_cart'] = $this->users->getDataCart($cart_id);

        if ($cart_id && $data['data_cart'])
        {
            $result = $this->users->getDataCart($cart_id);

            $data1 = array (
                'id_transaksi' => $this->uuid->v4(),
                'tanggal_transaksi' => date('Y-m-d h:i:s'),
                'quantitiy' => 1,
                'total_harga' => $result['harga_kue'],
                'status_transaksi' => 0,
                'status_penerimaan' => 0,
                'status_pengiriman' => 0,
                'status_sampai' => 0
            );

            $data2 = array (
                'id_transaksi' => $data1['id_transaksi'],
                'id_user' =>  $result['id_user'],
                'id_toko' => $result['id_toko'],
                'kd_kue' => $result['kd_kue']
            );

            $this->users->transaction($data1);
            $this->users->transaction_relation($data2);
            $this->users->updateCart($cart_id);
            $this->setAlert('message', 'success', 'Product has been added to your order.');
            redirect('users/carts');
        }
        else
        {
            redirect('users/carts');
        }
        
    }

    public function addCart($id_product = NULL)
    {
        $data['data_product'] = $this->users->getDataProducts($id_product);

        if (!($this->session->has_userdata('id_toko') || $this->session->has_userdata('id_user')))
        {
            $this->setAlert('message', 'warning', 'Anda harus login terlebih dahulu!');
            redirect('users');
        }

        if ($id_product && $data['data_product'])
        {
            $check = $this->users->checkCart($id_product, $this->session->userdata('id_user'));

            if (!$check)
            {
                $data = array (
                    'id_keranjang' => $this->uuid->v4(),
                    'id_user' => $this->session->userdata('id_user'),
                    'kd_kue' => $id_product,
                    'status_keranjang' => 1
                );

                $this->users->addCart($data);
                $this->setAlert('message', 'success', 'Product has been added to your cart.');
                redirect('home');
            }
            else
            {
                $this->setAlert('message', 'warning', 'Product already added to your cart.');
                redirect('home');
            }
        }
        else
        {
            redirect('home');
        }
    }

    public function deleteCart($cart_id)
    {
        $data['data_cart'] = $this->users->getDataCart($cart_id);

        if ($cart_id && $data['data_cart'])
        {
            if($this->users->deleteCart($cart_id))
            {
                $this->setAlert('message', 'success', 'Product on your cart has been deleted.');
                redirect('users/carts');
            }
            else
            {
                $this->setAlert('message', 'warning', 'Product on your cart cannot be deleted.');
                redirect('users/carts');
            }
        }
        else
        {
            redirect('home');
        }
    }

    public function transactions()
    {
        $this->checkUsersSession();

        $data['title'] = "Transactions";
        $data['data_session'] = $this->users->getDataUsers($this->session->userdata('id_user'));
        $data['transactions'] = $this->users->getDataTransactionByUser($this->session->userdata('id_user'));

        $this->load->view('users/_partials/header', $data);
        $this->load->view('users/_partials/navbar_top', $data);
        $this->load->view('users/_partials/sidebar');
        $this->load->view('users/transaction', $data);
        $this->load->view('users/_partials/footer');
    }

    public function order_arrived($id_transaction = NULL)
    {
        $data['data_transaction'] = $this->users->getDataTransaction($id_transaction);

        if ($id_transaction && $data['data_transaction'])
        {
            if ($this->users->order_arrived($id_transaction))
            {
                $this->setAlert('message', 'success', 'Your transaction has been success.');
                redirect('users/transactions');
            }
            else
            {
                $this->setAlert('message', 'success', 'Your transaction cannot be success.');
                redirect('users/transactions');
            }
        }
        else
        {
            redirect('users/transactions');
        }
    }

    public function profile()
    {
        $this->checkUsersSession();

        $data['title'] = "Profile";
        $data['data_session'] = $this->users->getDataUsers($this->session->userdata('id_user'));

        $this->load->view('users/_partials/header', $data);
        $this->load->view('users/_partials/navbar_top', $data);
        $this->load->view('users/_partials/sidebar');
        $this->load->view('users/profile_users', $data);
        $this->load->view('users/_partials/footer');
    }

    public function profile_update($id_user = NULL)
    {
        // Check session
        $this->checkUsersSession();

        $data['title'] = "Update Profile";
        $data['data_session'] = $this->users->getDataUsers($this->session->userdata('id_user'));

        // Check id
        if($id_user == $this->session->userdata('id_user'))
        {
            // Prosess when id is available

            // Form validate
            if ($this->form_validation->run('update_profile_users') == false)
            {
                $this->load->view('users/_partials/header', $data);
                $this->load->view('users/_partials/navbar_top', $data);
                $this->load->view('users/_partials/sidebar');
                $this->load->view('users/profile_update', $data);
                $this->load->view('users/_partials/footer');
            }
            else
            {
                // When submit process

                $old_email = $data['data_session']['email'];
                $photo_profile = $data['data_session']['photo_path'];

                $new_email = htmlspecialchars($this->input->post('email', TRUE));           
                
                // Check for email input
                if ($new_email != $old_email)
                {
                    // Check for email availability
                    if ($this->users->checkDataUsersByEmail($new_email) != TRUE)
                    {
                        // Will pass if result FALSE
                    }
                    else
                    {
                        $this->setAlert('message', 'warning', 'The email you entered is already used.');
                        redirect('users/profile/update/'.$id_user);
                    }
                } 

                // Check for profile picture
                if ($_FILES['photo']['name'] != FALSE) 
                {
                    // Do upload
                    $this->uploadProfilePicture($id_user, $data);
                    $photo_profile = $this->upload->data('file_name');
                }

                // Get & set data
                $data = array(
                    'nama_depan' => htmlspecialchars($this->input->post('nama_depan', TRUE)),
                    'nama_belakang' => htmlspecialchars($this->input->post('nama_belakang', TRUE)),
                    'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                    'no_telp' => htmlspecialchars($this->input->post('no_telp', TRUE)),
                    'no_handphone' => htmlspecialchars($this->input->post('no_handphone', TRUE)),
                    'email' => htmlspecialchars($this->input->post('email', TRUE)),
                    'photo_path' => $photo_profile

                );

                // Saving & Checking data
                if($this->users->update_users($id_user, $data))
                {
                    // Process when success
                    $this->setAlert('message', 'success', 'Profile has been changed.');
                    redirect('users/profile');
                }
                else
                {
                    // Process when failed
                    $this->setAlert('message', 'warning', 'Profile does not changed.');
                    redirect('users/profile/update/'.$id_user);
                }
            }
        }
        else
        {
            // Prosess when id is not available
            redirect('users/profile');
        }
    }

    public function profile_update_password($id_user = null)
    {
        // Check session
        $this->checkUsersSession();

        $data['title'] = "Update Password";
        $data['data_session'] = $this->users->getDataUsers($this->session->userdata('id_user'));

        // Check id
        if($id_user == $this->session->userdata('id_user'))
        {
            // Prosess when id is available

            // Form validate action
            if ($this->form_validation->run('update_password_profile') == false)
            {
                $this->load->view('users/_partials/header', $data);
                $this->load->view('users/_partials/navbar_top', $data);
                $this->load->view('users/_partials/sidebar');
                $this->load->view('users/profile_update_password');
                $this->load->view('users/_partials/footer');
            }
            else
            {
                // When submit process

                $oldpassword = $this->input->post('oldpassword', true);
                $newpassword = $this->input->post('newpassword', true);

                // Set data
                $data = array (
                    'password' => password_hash($this->input->post('newpassword', TRUE), PASSWORD_DEFAULT)
                );

                $result['data_user'] = $this->users->getDataUsers($id_user);

                // Check if password is correct
                if (password_verify($oldpassword, $result['data_user']['password']))
                {
                    // Check if new password same with the old password
                    if ($oldpassword != $newpassword)
                    {
                        // Saving & Checking data
                        if($this->users->update_users($id_user, $data))
                        {
                            // Process when success
                            $this->setAlert('message', 'success', 'Password has been changed.');
                            redirect('users/profile');
                        }
                        else
                        {
                            // Process when failed
                            $this->setAlert('message', 'warning', 'Password does not changed.');
                            redirect('users/profile/update_password/'.$id_user);
                        }
                    }
                    else
                    {
                        // If new password have same value with old password
                        $this->setAlert('message', 'warning', 'New password have same value with old password.');
                        redirect('users/profile/update_password/'.$id_user);
                    }
                }
                else
                {
                    // Process when failed
                    $this->setAlert('message', 'warning', 'Old password not valid.');
                    redirect('users/profile/update_password/'.$id_user);
                }
            }
        }
        else
        {
            // Prosess when id is not available
            redirect('users/profile');
        }
    }
}
