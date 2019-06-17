<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Admin', 'admin');
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

    // Function to check email when update admin account data
    private function checkEmailOnUpdateAdmin($id_admin, $email)
    {
        if($this->admin->checkDataAdminByEmail($email) == TRUE)
        {
            // When email input has same input with email on database
            $this->setAlert('message', 'warning', 'The email you entered has been used');
            redirect('admin/account/admin/update/'.$id_admin);
        }
        else
        {
            // Pass process
            return TRUE;
        }
    }

    // Function to check admin session is loggedin or not
    private function checkAdminSession()
    {
        if ($this->session->has_userdata('logged_in'))
        {
            // If has, will pass
            return TRUE;
        }
        else
        {
            // If not, will redirect
            redirect('admin');
        }
    }

    // Function to upload profile picture
    private function uploadProfilePicture($id_admin, $data)
    {
        $config['upload_path']      = './assets/img/admin/';
        $config['allowed_types']    = 'jpeg|jpg|png';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = true;

        $this->upload->initialize($config);

        $old_image = $data['admin']['photo_profile'];

        if ($this->upload->do_upload('photo'))
        {
            if ($old_image != 'default-user.png')
            {
                unlink(FCPATH . 'assets/img/admin/'. $old_image);
                return TRUE;   
            }
        }
        else
        {
            // Process when failed
            $this->setAlert('message', 'warning', $this->upload->display_errors());
            redirect('admin/profile/update/'.$id_admin);
        }
    }

    //----- Login Admin -----//

    public function index()
    {
        // Check session
        (!$this->session->has_userdata('logged_in')) ? TRUE : redirect('admin/dashboard');

        // Form validation
        if($this->form_validation->run('form_admin_login') == FALSE)
        {
            $data['title'] = "Login";
            $this->load->view('admin/login', $data);
        }
        else
        {
            // When submit process

            // Get data
            $data = array (
                'username' => htmlspecialchars($this->input->post('admin', true)),
                'email' => htmlspecialchars($this->input->post('admin', true)),
                'password' => $this->input->post('password', true)
            );

            // Send data to model
            $result = $this->admin->loginAdmin($data);

            // Check availability of account
            if ($result)
            {
                if ($result['admin_status'] != FALSE)
                {
                    // Check if password is correct
                    if (password_verify($data['password'], $result['password']))
                    {
                        // Set data for session
                        $session_data = array(
                            'id_admin' => $result['id_admin'],
                            'logged_in' => true
                        );

                        // Set data to session
                        $this->session->set_userdata($session_data);
                        $this->setAlert('message', 'success', 'Welcome back, ' . $result['firstname']);
                        redirect('admin/dashboard');
                    }
                    else
                    {
                        // If password is not correct
                        $this->setAlert('message', 'warning', 'Password your entered not valid.');
                        redirect('admin');
                    }
                }
                else
                {
                    // If admin status false
                    $this->setAlert('message', 'warning', 'Your account is not active, please contact your manager to active you account.');
                    redirect('admin');
                }
            }
            else
            {
                // If data not valid
                $this->setAlert('message', 'warning', 'Email or username your entered not valid.');
                redirect('admin');
            }
        }
    }

    //----- ./Login Admin -----//

    //----- Logout Admin -----//

    public function logout()
    {
        // Destroy session data
        $this->session->sess_destroy();
        redirect('admin');
    }

    //----- ./Logout Admin -----//

    //----- Dashboard -----//

	public function dashboard()
	{
        // Check session
        $this->checkAdminSession();

        $data['title'] = "Dashboard";
        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));
        $data['total_users'] = $this->admin->getTotalUsers();
        $data['total_toko'] = $this->admin->getTotalStore();
        $data['total_transaction'] = $this->admin->getTotalTransaction();

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/navbar_top', $data);
        $this->load->view('admin/_partials/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/_partials/footer');
    }
    
    //----- ./Dashboard -----//

    //----- Profile Admin -----//

    public function profile_admin()
    {
        // Check session
        $this->checkAdminSession();

        $data['title'] = "Profile";
        $data['admin'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));
        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));        

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/navbar_top', $data);
        $this->load->view('admin/_partials/sidebar');
        $this->load->view('admin/profile_admin', $data);
        $this->load->view('admin/_partials/footer');
    }

    //----- ./Profile Admin -----//

    //----- Update Profile -----//

    public function profile_update($id_admin = NULL)
    {
        // Check session
        $this->checkAdminSession();

        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));

        // Check id
        if($id_admin == $this->session->userdata('id_admin'))
        {
            // Prosess when id is available

            $data['title'] = "Update Profile";
            $data['admin'] = $this->admin->getDataAdmin($id_admin);

            // Form validate
            if ($this->form_validation->run('update_profile_admin') == false)
            {
                $this->load->view('admin/_partials/header', $data);
                $this->load->view('admin/_partials/navbar_top', $data);
                $this->load->view('admin/_partials/sidebar');
                $this->load->view('admin/profile_update', $data);
                $this->load->view('admin/_partials/footer');
            }
            else
            {
                // When submit process

                $old_email = $data['admin']['email'];
                $old_username = $data['admin']['username'];
                $photo_profile = $data['admin']['photo_profile'];

                $new_email = htmlspecialchars($this->input->post('email', TRUE));
                $new_username = htmlspecialchars($this->input->post('username', TRUE));

                // Check for username input
                if ($new_username != $old_username)
                {
                    // Check for username availability
                    if ($this->admin->checkDataAdminByUsername($new_username) != TRUE)
                    {
                        // Will pass if result FALSE
                    }
                    else
                    {
                        $this->setAlert('message', 'warning', 'The username you entered is already used.');
                        redirect('admin/profile/update/'.$id_admin);
                    }
                }            
                
                // Check for email input
                if ($new_email != $old_email)
                {
                    // Check for email availability
                    if ($this->admin->checkDataAdminByEmail($new_email) != TRUE)
                    {
                        // Will pass if result FALSE
                    }
                    else
                    {
                        $this->setAlert('message', 'warning', 'The email you entered is already used.');
                        redirect('admin/profile/update/'.$id_admin);
                    }
                } 

                // Check for profile picture
                if ($_FILES['photo']['name'] != FALSE) 
                {
                    // Do upload
                    $this->uploadProfilePicture($id_admin, $data);
                    $photo_profile = $this->upload->data('file_name');
                }

                // Get & set data
                $data = array(
                    'firstname' => htmlspecialchars($this->input->post('firstname', TRUE)),
                    'lastname' => htmlspecialchars($this->input->post('lastname', TRUE)),
                    'username' => htmlspecialchars($this->input->post('username', TRUE)),
                    'email' => htmlspecialchars($this->input->post('email', TRUE)),
                    'photo_profile' => $photo_profile

                );

                // Saving & Checking data
                if($this->admin->updateAdmin($id_admin, $data))
                {
                    // Process when success
                    $this->setAlert('message', 'success', 'Profile has been changed.');
                    redirect('admin/profile');
                }
                else
                {
                    // Process when failed
                    $this->setAlert('message', 'warning', 'Profile does not changed.');
                    redirect('admin/profile/update/'.$id_admin);
                }
            }
        }
        else
        {
            // Prosess when id is not available
            redirect('admin/profile');
        }
    }

    //----- ./Update Profile -----//

    //----- Update Password -----//

    public function profile_update_password($id_admin = null)
    {
        // Check session
        $this->checkAdminSession();

        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));

        // Check id
        if($id_admin == $this->session->userdata('id_admin'))
        {
            // Prosess when id is available

            // Form validate action
            if ($this->form_validation->run('update_password_profile') == false)
            {
                $this->load->view('admin/_partials/header');
                $this->load->view('admin/_partials/navbar_top', $data);
                $this->load->view('admin/_partials/sidebar');
                $this->load->view('admin/profile_update_password');
                $this->load->view('admin/_partials/footer');
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

                // Get admin account data by id
                $result['admin'] = $this->admin->getDataAdmin($id_admin);

                // Check if password is correct
                if (password_verify($oldpassword, $result['admin']['password']))
                {
                    // Check if new password same with the old password
                    if ($oldpassword != $newpassword)
                    {
                        // Saving & Checking data
                        if($this->admin->updateAdmin($id_admin, $data))
                        {
                            // Process when success
                            $this->setAlert('message', 'success', 'Password has been changed.');
                            redirect('admin/profile');
                        }
                        else
                        {
                            // Process when failed
                            $this->setAlert('message', 'warning', 'Password does not changed.');
                            redirect('admin/profile/update_password/'.$id_admin);
                        }
                    }
                    else
                    {
                        // If new password have same value with old password
                        $this->setAlert('message', 'warning', 'New password have same value with old password.');
                        redirect('admin/profile/update_password/'.$id_admin);
                    }
                }
                else
                {
                    // Process when failed
                    $this->setAlert('message', 'warning', 'Old password not valid.');
                    redirect('admin/profile/update_password/'.$id_admin);
                }
            }
        }
        else
        {
            // Prosess when id is not available
            redirect('admin/profile');
        }
    }

    //----- ./Update Password -----//
    
    /* 
    | --------------------------------------------------
    | Menu Admin Account
    | --------------------------------------------------
    |
    | Method or Function
    | 1. account_admin          = Method to view all admin account data.
    | 2. account_admin_view     = Method to view admin account data perid.
    | 3. account_admin_status   = Method to change admin status.
    | 4. account_admin_add      = Method to add new admin account.
    | 5. account_admin_update   = Method to update admin account data.
    | 6. account_admin_delete   = Method to delete admin account.
    |
    */

    public function account_admin()
    {
        // Check session
        $this->checkAdminSession();

        $data['title'] = "Admin Account";
        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));
        $data['admin'] = $this->admin->getDataAdmin();

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/navbar_top', $data);
        $this->load->view('admin/_partials/sidebar');
        $this->load->view('admin/account_admin', $data);
        $this->load->view('admin/_partials/footer');
    }

    public function account_admin_view($id_admin = NULL)
    {
        // Check session
        $this->checkAdminSession();

        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));
        $data['admin'] = $this->admin->getDataAdmin($id_admin);
        $data['title'] = $data['admin']['firstname'] . " " . $data['admin']['lastname'];

        // Check availability of id
        if($id_admin && $data['admin'])
        {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/_partials/navbar_top', $data);
            $this->load->view('admin/_partials/sidebar');
            $this->load->view('admin/account_admin_view', $data);
            $this->load->view('admin/_partials/footer');
        }
        else
        {
            // Prosess when id is not available
            redirect('admin/account/admin');
        }     
    }

    public function account_admin_status($id_admin = NULL)
    {
        // Check session
        $this->checkAdminSession();

        // Check availability of id
        if ($id_admin)
        {
            // Saving & Checking data
            if($this->admin->updateStatusAdmin($id_admin))
            {
                // Process when success
                $this->setAlert('message', 'success', 'Admin account data has been changed.');
                redirect('admin/account/admin');
            }
            else
            {
                redirect('admin/account/admin');
            }
        } 
        else 
        {
            // Prosess when id is not available
            redirect('admin/account/admin');
        }        
    }

    public function account_admin_add()
    {
        // Check session
        $this->checkAdminSession();

        $data['title'] = "Add New Admin";
        $data['admin_position'] = $this->admin->getAdminPosition();
        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));

        // Form validate action
        if ($this->form_validation->run('add_new_admin') == false)
        {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/_partials/navbar_top', $data);
            $this->load->view('admin/_partials/sidebar');
            $this->load->view('admin/account_admin_add', $data);
            $this->load->view('admin/_partials/footer');
        }
        else
        {
            // When submit process 

            // Get & set data
            $data = array(
                'id_admin' => 'ADMIN' . random_string('basic', 3),
                'id_position' => htmlspecialchars($this->input->post('position', TRUE)),
                'firstname' => htmlspecialchars($this->input->post('firstname', TRUE)),
                'lastname' => htmlspecialchars($this->input->post('lastname', TRUE)),
                'username' => null,
                'email' => htmlspecialchars($this->input->post('email', TRUE)),
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
                'admin_status' => 1,
                'date_created' => date('Y-m-d h:i:s'),
                'photo_profile' => 'default-user.png'
            );

            // Saving & Checking data
            if($this->admin->addNewAdmin($data))
            {
                // Process when success
                $this->setAlert('message', 'success', 'Admin account has been created.');
                redirect('admin/account/admin');
            }
            else
            {
                // Process when failed
                $this->setAlert('message', 'warning', 'Admin account cannot be saved.');
                redirect('admin/account/admin/add');
            }
        }
    }

    public function account_admin_update($id_admin = NULL)
    {
        // Check session
        $this->checkAdminSession();

        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));
        $data['admin_position'] = $this->admin->getAdminPosition();
        $data['admin'] = $this->admin->getDataAdmin($id_admin);

        // Check availability of id
        if($id_admin && $data['admin'])
        {
            // Form validate action
            if ($this->form_validation->run('update_account_admin') == false)
            {
                $this->load->view('admin/_partials/header');
                $this->load->view('admin/_partials/navbar_top', $data);
                $this->load->view('admin/_partials/sidebar');
                $this->load->view('admin/account_admin_update', $data);
                $this->load->view('admin/_partials/footer');
            }
            else
            {
                // When submit process

                $actual_email = htmlspecialchars($this->input->post('actual_email', TRUE));
                $email = htmlspecialchars($this->input->post('email', TRUE));

                // If email input has change or not
                if ($actual_email == $email)
                {
                    // If not change
                    // Get & set data
                    $data = array(
                        'id_position' => htmlspecialchars($this->input->post('position', TRUE)),
                        'firstname' => htmlspecialchars($this->input->post('firstname', TRUE)),
                        'lastname' => htmlspecialchars($this->input->post('lastname', TRUE)),
                        'email' => $actual_email
                    );

                    // Saving & Checking data
                    if($this->admin->updateAdmin($id_admin, $data))
                    {
                        // Process when success
                        $this->setAlert('message', 'success', 'Admin account data has been changed.');
                        redirect('admin/account/admin');
                    }
                    else
                    {
                        // Process when failed
                        $this->setAlert('message', 'warning', 'Admin account data has not changed.');
                        redirect('admin/account/admin/update/'.$id_admin);
                    }
                }
                else
                {
                    // If change, check email input again with email on database
                    // Whether the same or not
                    $this->checkEmailOnUpdateAdmin($id_admin, $email);

                    // Get & set data
                    $data = array(
                        'id_position' => htmlspecialchars($this->input->post('position', TRUE)),
                        'firstname' => htmlspecialchars($this->input->post('firstname', TRUE)),
                        'lastname' => htmlspecialchars($this->input->post('lastname', TRUE)),
                        'email' => $email
                    );

                    // Saving & Checking data
                    if($this->admin->updateAdmin($id_admin, $data))
                    {
                        // Process when success
                        $this->setAlert('message', 'success', 'Admin account data has been changed.');
                        redirect('admin/account/admin');
                    }
                    else
                    {
                        // Process when failed
                        $this->setAlert('message', 'warning', 'Admin account data cannot be saved.');
                        redirect('admin/account/admin/update/'.$id_admin);
                    }
                }
            }
        }
        else
        {
            // Prosess when id is not available
            redirect('admin/account/admin');
        }
    }

    public function account_admin_delete($id_admin = NULL)
    {
        // Check session
        $this->checkAdminSession();

        // Check availability of id
        if ($id_admin)
        {
            // Deleting data
            if($this->admin->deleteAdmin($id_admin))
            {
                // Process when success
                $this->setAlert('message', 'success', 'Admin account data has been deleted.');
                redirect('admin/account/admin');
            }
            else
            {
                redirect('admin/account/admin');
            }
        } 
        else 
        {
            // Prosess when id is not available
            redirect('admin/account/admin');
        }        
    }

    //----- ./Menu Admin Account -----//

    /* 
    | --------------------------------------------------
    | Menu Store Account
    | --------------------------------------------------
    |
    | Method or Function
    | 1. account_store          = Method to view all store account data.
    | 2. account_store_view     = Method to view store account data perid.
    | 3. account_store_status   = Method to change store status.
    | 4. account_store_delete   = Method to delete store account.
    |
    */

    public function account_store()
    {
        // Check session
        $this->checkAdminSession();

        $data['title'] = "Store Account";
        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));
        $data['store'] = $this->admin->getDataStore();

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/navbar_top', $data);
        $this->load->view('admin/_partials/sidebar');
        $this->load->view('admin/account_store', $data);
        $this->load->view('admin/_partials/footer');
    }

    public function account_store_view($id_store = NULL)
    {
        // Check session
        $this->checkAdminSession();

        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));
        $data['store'] = $this->admin->getDataStore($id_store);
        $data['title'] = $data['store']['nama_toko'];

        // Check availability of id
        if($id_store && $data['store'])
        {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/_partials/navbar_top', $data);
            $this->load->view('admin/_partials/sidebar');
            $this->load->view('admin/account_store_view', $data);
            $this->load->view('admin/_partials/footer');
        }
        else
        {
            // Prosess when id is not available
            redirect('admin/account/store');
        }     
    }

    public function account_store_status($id_store = NULL)
    {
        // Check session
        $this->checkAdminSession();

        // Check availability of id
        if ($id_store)
        {
            // Saving & Checking data
            if($this->admin->updateStatusStore($id_store))
            {
                // Process when success
                $this->setAlert('message', 'success', 'Store account data has been changed.');
                redirect('admin/account/store');
            }
            else
            {
                // Process when failed
                redirect('admin/account/store');
            }
        } 
        else 
        {
            // Prosess when id is not available
            redirect('admin/account/store');
        }        
    }

    public function account_store_delete($id_store = NULL)
    {
        // Check session
        $this->checkAdminSession();

        // Check availability of id
        if ($id_store)
        {
            // Deleting data
            if($this->admin->deleteUser($id_store))
            {
                // Process when success
                $this->setAlert('message', 'success', 'Store account data has been deleted.');
                redirect('admin/account/store');
            }
            else
            {
                // Process when failed
                redirect('admin/account/store');
            }
        } 
        else 
        {
            // Prosess when id is not available
            redirect('admin/account/store');
        }        
    }

    //----- ./Menu Admin Account -----//

    /* 
    | --------------------------------------------------
    | Menu Users Account
    | --------------------------------------------------
    |
    | Method or Function
    | 1. account_users         = Method to view all user account data.
    | 2. account_user_view     = Method to view user account data perid.
    | 3. account_user_status   = Method to change user status.
    | 4. account_user_delete   = Method to delete user account.
    |
    */

    public function account_users()
    {
        // Check session
        $this->checkAdminSession();

        $data['title'] = "User Account";
        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));
        $data['users'] = $this->admin->getDataUsers();

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/navbar_top', $data);
        $this->load->view('admin/_partials/sidebar');
        $this->load->view('admin/account_users', $data);
        $this->load->view('admin/_partials/footer');
    }

    public function account_user_view($id_user = NULL)
    {
        // Check session
        $this->checkAdminSession();

        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));
        $data['user'] = $this->admin->getDataUsers($id_user);
        $data['title'] = $data['user']['nama_depan'] . " " . $data['user']['nama_belakang'];

        // Check availability of id
        if($id_user && $data['user'])
        {
            $this->load->view('admin/_partials/header', $data);
            $this->load->view('admin/_partials/navbar_top', $data);
            $this->load->view('admin/_partials/sidebar');
            $this->load->view('admin/account_user_view', $data);
            $this->load->view('admin/_partials/footer');
        }
        else
        {
            // Prosess when id is not available
            redirect('admin/account/users');
        }     
    }

    public function account_user_status($id_user = NULL)
    {
        // Check session
        $this->checkAdminSession();

        // Check availability of id
        if ($id_user)
        {
            // Saving & Checking data
            if($this->admin->updateStatusUser($id_user))
            {
                // Process when success
                $this->setAlert('message', 'success', 'User account data has been changed.');
                redirect('admin/account/users');
            }
            else
            {
                // Process when failed
                redirect('admin/account/users');
            }
        } 
        else 
        {
            // Prosess when id is not available
            redirect('admin/account/users');
        }        
    }

    public function account_user_delete($id_user = NULL)
    {
        // Check session
        $this->checkAdminSession();

        // Check availability of id
        if ($id_user)
        {
            // Deleting data
            if($this->admin->deleteUser($id_user))
            {
                // Process when success
                $this->setAlert('message', 'success', 'User account data has been deleted.');
                redirect('admin/account/users');
            }
            else
            {
                // Process when failed
                redirect('admin/account/users');
            }
        } 
        else 
        {
            // Prosess when id is not available
            redirect('admin/account/users');
        }        
    }

    //----- ./Menu Admin Account -----//
    
    public function transactions()
    {
        $this->checkAdminSession();

        $data['title'] = "Transactions";
        $data['data_session'] = $this->admin->getDataAdmin($this->session->userdata('id_admin'));
        $data['transactions'] = $this->admin->getDataTransaction();

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/navbar_top', $data);
        $this->load->view('admin/_partials/sidebar');
        $this->load->view('admin/transaction', $data);
        $this->load->view('admin/_partials/footer');
    }
}
