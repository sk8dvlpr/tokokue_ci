<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Store', 'store');
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

    // Function to check store session is loggedin or not
    private function checkStoreSession()
    {
        if ($this->session->has_userdata('logged_in'))
        {
            // If has, will pass
            return TRUE;
        }
        else
        {
            // If not, will redirect
            redirect('store');
        }
    }

    // Function to upload product photo
    private function uploadFirstProductPhoto()
    {
        $config['upload_path']      = './assets/img/cake/';
        $config['allowed_types']    = 'jpeg|jpg|png';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('photo'))
        {
            return TRUE;
        }
        else
        {
            // Process when failed
            $this->setAlert('message', 'warning', $this->upload->display_errors());
            redirect('store/products/add');
        }
    }

    // Function to upload profile picture
    private function uploadProfilePicture($id_store, $data)
    {
        $config['upload_path']      = './assets/img/store/';
        $config['allowed_types']    = 'jpeg|jpg|png';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = true;

        $this->upload->initialize($config);

        $old_image = $data['data_session']['photo_path'];

        if ($this->upload->do_upload('photo'))
        {
            if ($old_image != 'default-user.png')
            {
                unlink(FCPATH . 'assets/img/store/'. $old_image);
                return TRUE;   
            }
        }
        else
        {
            // Process when failed
            $this->setAlert('message', 'warning', $this->upload->display_errors());
            redirect('store/profile/update/'.$id_store);
        }
    }

    // Registration account
    public function store_registration()
	{
		if ($this->form_validation->run('store_registration') == FALSE)
        {
            $this->load->view('home/_partials/header');
            $this->load->view('home/_partials/navbar');
            $this->load->view('home/store_registration');
            $this->load->view('home/_partials/footer');
        }
        else
        {
            $data = array (
                'id_toko' => 'STR' . random_string('basic', 5),
                'nama_toko' => htmlspecialchars($this->input->post('storename', TRUE)),
                'tentang_toko' => NULL,
                'alamat_toko' => htmlspecialchars($this->input->post('address', TRUE)),
                'no_telp' => NULL,
                'no_handphone' => htmlspecialchars($this->input->post('phonenumber', TRUE)),
                'toko_buka' => NULL,
                'toko_tutup' => NULL,
                'photo_path' => 'default-user.png',
                'email' => htmlspecialchars($this->input->post('email', TRUE)),
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
                'tanggal_pendaftaran' => date('Y-m-d h:i:s'),
                'status_toko' => 1,
                'facebook_link' => NULL,
                'instagram_link' => NULL,
                'twitter_link' => NULL
            );

            // Saving & Checking data
            if($this->store->registration($data))
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

    // Login Store
    public function index()
    {
        // Check session
        (!$this->session->has_userdata('logged_in')) ? TRUE :  redirect('home');

        // Check form validation
        if($this->form_validation->run('store_login') == FALSE)
        {
            // Before submit process
            $data['title'] = "Store Login";
            $this->load->view('store/login', $data);
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
            $result = $this->store->loginStore($data['email']);

            // Check availability of account
            if ($result)
            {
                if ($result['status_toko'] != FALSE)
                {
                    // Check if password is correct
                    if (password_verify($data['password'], $result['password']))
                    {
                        // Set data for session
                        $session_data = array(
                            'id_toko' => $result['id_toko'],
                            'logged_in' => true
                        );

                        // Set data to session
                        $this->session->set_userdata($session_data);
                        $this->setAlert('message', 'success', 'Welcome back, ' . $result['nama_toko']);
                        redirect('store/dashboard');
                    }
                    else
                    {
                        // If password is not correct
                        $this->setAlert('message', 'warning', 'Password your entered not valid.');
                        redirect('store');
                    }
                }
                else
                {
                    $this->setAlert('message', 'warning', 'Your account is not active, please contact admin to active you account.');
                    redirect('store');
                }
            }
            else
            {
                // If data not valid
                $this->setAlert('message', 'warning', 'Email your entered not valid.');
                redirect('store');
            }
        }
        
    }

    //----- End Login Store -----//

    //----- Logout Store -----//

    public function logout()
    {
        // Destroy session data
        $this->session->sess_destroy();
        redirect('home');
    }

    //----- End Logout Store -----//

    //----- Menu Dashboard -----//

	public function dashboard()
	{
        // Check session
        $this->checkStoreSession();

        $data['title'] = "Dashboard";
        $data['data_session'] = $this->store->getDataStore($this->session->userdata('id_toko'));
        $data['total_product'] = $this->store->getTotalProduct($this->session->userdata('id_toko'));
        $data['total_transaction'] = $this->store->getTotalTransaction($this->session->userdata('id_toko'));

        $this->load->view('store/_partials/header', $data);
        $this->load->view('store/_partials/navbar_top', $data);
        $this->load->view('store/_partials/sidebar');
        $this->load->view('store/dashboard', $data);
        $this->load->view('store/_partials/footer');
    }
    
    //----- End Menu Dashboard -----//

    public function products()
    {
        // Check session
        $this->checkStoreSession();

        $data['title'] = "Products";
        $data['data_session'] = $this->store->getDataStore($this->session->userdata('id_toko'));
        $data['products'] = $this->store->getDataProductsByToko($this->session->userdata('id_toko'));

        $this->load->view('store/_partials/header', $data);
        $this->load->view('store/_partials/navbar_top', $data);
        $this->load->view('store/_partials/sidebar');
        $this->load->view('store/products', $data);
        $this->load->view('store/_partials/footer');
    }

    public function product_view($id_product = NULL)
    {
        // Check session
        $this->checkStoreSession();

        $data['data_session'] = $this->store->getDataStore($this->session->userdata('id_toko'));
        $data['data_product'] = $this->store->getDataProducts($id_product);
        $data['title'] = $data['data_product']['nama_kue'];

        // Check availability of id
        if($id_product && $data['data_product'])
        {
            $this->load->view('store/_partials/header', $data);
            $this->load->view('store/_partials/navbar_top', $data);
            $this->load->view('store/_partials/sidebar');
            $this->load->view('store/products_view', $data);
            $this->load->view('store/_partials/footer');
        }
        else
        {
            // Prosess when id is not available
            redirect('store/products');
        }     
    }

    public function product_status($id_product = NULL)
    {
        // Check session
        $this->checkStoreSession();

        // Check availability of id
        if ($id_product)
        {
            // Saving & Checking data
            if($this->store->updateStatusProduct($id_product))
            {
                // Process when success
                $this->setAlert('message', 'success', 'Status product has been changed.');
                redirect('store/products');
            }
            else
            {
                // Process when failed
                redirect('store/products');
            }
        } 
        else 
        {
            // Prosess when id is not available
            redirect('store/products');
        }        
    }

    public function product_add()
    {
        // Check session
        $this->checkStoreSession();

        $data['title'] = "Add New Product";
        $data['categories'] = $this->store->getDataProductsCategory();
        $data['data_session'] = $this->store->getDataStore($this->session->userdata('id_toko'));

        $datestring = '%Y-%m-%d %h:%i:%s %a';
        $time = time();

        // Form validate action
        if ($this->form_validation->run('products') == false)
        {
            // Before submit process

            $this->load->view('store/_partials/header', $data);
            $this->load->view('store/_partials/navbar_top', $data);
            $this->load->view('store/_partials/sidebar');
            // View main content
            $this->load->view('store/products_add', $data);
            $this->load->view('store/_partials/footer');
        }
        else
        {
            // When submit process

            $photo_profile = NULL;

            if ($_FILES['photo']['name'] != FALSE) 
            {
                // Do upload
                $this->uploadFirstProductPhoto();
                $photo_profile = $this->upload->data('file_name');
            }

            // Get & set data
            $data = array(
                'kd_kue' => 'CAKE' . random_string('basic', 4),
                'kd_kategori_kue' => htmlspecialchars($this->input->post('categories', TRUE)),
                'id_toko' => $data['data_session']['id_toko'],
                'nama_kue' => htmlspecialchars($this->input->post('productname', TRUE)),
                'deskripsi_kue' => $this->input->post('productdesc'),
                'harga_kue' => htmlspecialchars($this->input->post('price', TRUE)),
                'rating_kue' => NULL,
                'photo_path' => $photo_profile,
                'tanggal_ditambah' => date('Y-m-d h:i:s'),
                'status_kue' => 1
            );

            // Saving & Checking data
            if($this->store->addNewProduct($data))
            {
                // Process when success
                $this->setAlert('message', 'success', 'Your product has been added.');
                redirect('store/products');
            }
            else
            {
                // Process when failed
                $this->setAlert('message', 'warning', 'Your product cannot be saved.');
                redirect('store/products/add');
            }
        }
    }

    public function product_update($id_product = NULL)
    {
        // Check session
        $this->checkStoreSession();

        $data['data_session'] = $this->store->getDataStore($this->session->userdata('id_toko'));
        $data['categories'] = $this->store->getDataProductsCategory();
        $data['data_product'] = $this->store->getDataProducts($id_product);
        $data['title'] = $data['data_product']['nama_kue'];

        // Check availability of id
        if($id_product && $data['data_product'])
        {
            // Prosess when id is available

            // Form validate action
            if ($this->form_validation->run('products') == false)
            {
                $this->load->view('store/_partials/header', $data);
                $this->load->view('store/_partials/navbar_top', $data);
                $this->load->view('store/_partials/sidebar');
                $this->load->view('store/products_update', $data);
                $this->load->view('store/_partials/footer');
            }
            else
            {
                // When submit process

                // Get & set data
                $data = array(
                    'kd_kategori_kue' => htmlspecialchars($this->input->post('categories', TRUE)),
                    'nama_kue' => htmlspecialchars($this->input->post('productname', TRUE)),
                    'deskripsi_kue' => $this->input->post('productdesc'),
                    'harga_kue' => htmlspecialchars($this->input->post('price', TRUE)),
                );

                // Saving & Checking data
                if($this->store->updateProduct($id_product, $data))
                {
                    // Process when success
                    $this->setAlert('message', 'success', 'Data product data has been changed.');
                    redirect('store/products');
                }
                else
                {
                    // Process when failed
                    $this->setAlert('message', 'warning', 'Data product data has not changed.');
                    redirect('store/products/update/'.$id_product);
                }
            }
        }
        else
        {
            // Prosess when id is not available
            redirect('store/products');
        }
    }

    public function product_delete($id_product = NULL)
    {
        // Check session
        $this->checkStoreSession();

        $data['data_product'] = $this->store->getDataProducts($id_product);

        // Check availability of id
        if ($id_product && $data['data_product'])
        {
            // Deleting data
            if($this->store->deleteProduct($id_product))
            {
                // Process when success
                
                unlink(FCPATH . 'assets/img/cake/'. $data['data_product']['photo_path']);

                $this->setAlert('message', 'success', 'Your product has been deleted.');
                redirect('store/products');
            }
            else
            {
                // Process when failed
                $this->setAlert('message', 'warning', 'Your product cannot be deleted.');
                redirect('store/products');
            }
        } 
        else 
        {
            // Prosess when id is not available
            redirect('store/products');
        }        
    }

    public function transactions()
    {
        $this->checkStoreSession();

        $data['title'] = "Transactions";
        $data['data_session'] = $this->store->getDataStore($this->session->userdata('id_toko'));
        $data['transactions'] = $this->store->getDataTransactionByToko($this->session->userdata('id_toko'));

        $this->load->view('store/_partials/header', $data);
        $this->load->view('store/_partials/navbar_top', $data);
        $this->load->view('store/_partials/sidebar');
        $this->load->view('store/transaction', $data);
        $this->load->view('store/_partials/footer');
    }

    public function accept_order($id_transaction = NULL)
    {
        $data['data_transaction'] = $this->store->getDataTransaction($id_transaction);

        if ($id_transaction && $data['data_transaction'])
        {
            if ($this->store->accept_order($id_transaction))
            {
                $this->setAlert('message', 'success', 'Order has been received.');
                redirect('store/transactions');
            }
            else
            {
                $this->setAlert('message', 'success', 'Order cannot be received.');
                redirect('store/transactions');
            }
        }
        else
        {
            redirect('store/transactions');
        }
        
    }

    public function send_order($id_transaction = NULL)
    {
        $data['data_transaction'] = $this->store->getDataTransaction($id_transaction);

        if ($id_transaction && $data['data_transaction'])
        {
            if ($this->store->send_order($id_transaction))
            {
                $this->setAlert('message', 'success', 'Order has been sended.');
                redirect('store/transactions');
            }
            else
            {
                $this->setAlert('message', 'success', 'Order cannot be sended.');
                redirect('store/transactions');
            }
        }
        else
        {
            redirect('store/transactions');
        }
    }

    public function profile()
    {
        $this->checkStoreSession();

        $data['title'] = "Profile";
        $data['data_session'] = $this->store->getDataStore($this->session->userdata('id_toko'));

        $this->load->view('store/_partials/header', $data);
        $this->load->view('store/_partials/navbar_top', $data);
        $this->load->view('store/_partials/sidebar');
        $this->load->view('store/profile_store', $data);
        $this->load->view('store/_partials/footer');
    }

    public function profile_update($id_store = NULL)
    {
        // Check session
        $this->checkStoreSession();

        $data['title'] = "Update Profile";
        $data['data_session'] = $this->store->getDataStore($this->session->userdata('id_toko'));

        // Check id
        if($id_store == $this->session->userdata('id_toko'))
        {
            // Prosess when id is available

            // Form validate
            if ($this->form_validation->run('update_profile_store') == false)
            {
                $this->load->view('store/_partials/header', $data);
                $this->load->view('store/_partials/navbar_top', $data);
                $this->load->view('store/_partials/sidebar');
                $this->load->view('store/profile_update', $data);
                $this->load->view('store/_partials/footer');
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
                    if ($this->store->checkDataStoreByEmail($new_email) != TRUE)
                    {
                        // Will pass if result FALSE
                    }
                    else
                    {
                        $this->setAlert('message', 'warning', 'The email you entered is already used.');
                        redirect('store/profile/update/'.$id_store);
                    }
                } 

                // Check for profile picture
                if ($_FILES['photo']['name'] != FALSE) 
                {
                    // Do upload
                    $this->uploadProfilePicture($id_store, $data);
                    $photo_profile = $this->upload->data('file_name');
                }

                // Get & set data
                $data = array(
                    'nama_toko' => htmlspecialchars($this->input->post('nama_toko', TRUE)),
                    'tentang_toko' => htmlspecialchars($this->input->post('tentang_toko', TRUE)),
                    'alamat_toko' => htmlspecialchars($this->input->post('alamat_toko', TRUE)),
                    'no_telp' => htmlspecialchars($this->input->post('no_telp', TRUE)),
                    'no_handphone' => htmlspecialchars($this->input->post('no_handphone', TRUE)),
                    'toko_buka' => htmlspecialchars($this->input->post('toko_buka', TRUE)),
                    'toko_tutup' => htmlspecialchars($this->input->post('toko_tutup', TRUE)),
                    'photo_path' => $photo_profile,
                    'email' => htmlspecialchars($this->input->post('email', TRUE))
                );

                // Saving & Checking data
                if($this->store->update_store($id_store, $data))
                {
                    // Process when success
                    $this->setAlert('message', 'success', 'Profile has been changed.');
                    redirect('store/profile');
                }
                else
                {
                    // Process when failed
                    $this->setAlert('message', 'warning', 'Profile does not changed.');
                    redirect('store/profile/update/'.$id_store);
                }
            }
        }
        else
        {
            // Prosess when id is not available
            redirect('store/profile');
        }
    }

    public function profile_update_password($id_store = null)
    {
        // Check session
        $this->checkStoreSession();

        $data['title'] = "Update Password";
        $data['data_session'] = $this->store->getDataStore($this->session->userdata('id_toko'));

        // Check id
        if($id_store == $this->session->userdata('id_toko'))
        {
            // Prosess when id is available

            // Form validate action
            if ($this->form_validation->run('update_password_profile') == false)
            {
                $this->load->view('store/_partials/header', $data);
                $this->load->view('store/_partials/navbar_top', $data);
                $this->load->view('store/_partials/sidebar');
                $this->load->view('store/profile_update_password');
                $this->load->view('store/_partials/footer');
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

                $result['data_store'] = $this->store->getDataStore($id_store);

                // Check if password is correct
                if (password_verify($oldpassword, $result['data_store']['password']))
                {
                    // Check if new password same with the old password
                    if ($oldpassword != $newpassword)
                    {
                        // Saving & Checking data
                        if($this->store->update_store($id_store, $data))
                        {
                            // Process when success
                            $this->setAlert('message', 'success', 'Password has been changed.');
                            redirect('store/profile');
                        }
                        else
                        {
                            // Process when failed
                            $this->setAlert('message', 'warning', 'Password does not changed.');
                            redirect('store/profile/update_password/'.$id_store);
                        }
                    }
                    else
                    {
                        // If new password have same value with old password
                        $this->setAlert('message', 'warning', 'New password have same value with old password.');
                        redirect('store/profile/update_password/'.$id_store);
                    }
                }
                else
                {
                    // Process when failed
                    $this->setAlert('message', 'warning', 'Old password not valid.');
                    redirect('store/profile/update_password/'.$id_store);
                }
            }
        }
        else
        {
            // Prosess when id is not available
            redirect('store/profile');
        }
    }
}