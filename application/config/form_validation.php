<?php

$config = array (
    'form_admin_login' => 
        array (
            array (
                'field' => 'admin',
                'label' => 'Admin',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Email or Username cannot be empty.'
                )
            ),
            array (
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Password cannot be empty.'
                )
            )
        ),
    'form_login' => 
        array (
            array (
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Email cannot be empty.'
                )
            ),
            array (
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Password cannot be empty.'
                )
            )
        ),
    'store_login' => 
        array (
            array (
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Email cannot be empty.'
                )
            ),
            array (
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Password cannot be empty.'
                )
            )
        ),
    'users_login' => 
        array (
            array (
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Email cannot be empty.'
                )
            ),
            array (
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Password cannot be empty.'
                )
            )
        ),
    'add_new_admin' => 
        array (
            array (
                'field' => 'position',
                'label' => 'Position',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Position cannot be empty.'
                )
            ),
            array (
                'field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Firstname cannot be empty.'
                )
            ),
            array (
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'trim'
            ),
            array (
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim'
            ),
            array (
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email|is_unique[tb_admin.email]',
                'errors' => array (
                    'required' => 'Email cannot be empty.',
                    'valid_email' => 'Email entered is not valid.',
                    'is_unique' => 'Email has been registered'
                )
            ),
            array (
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[8]',
                'errors' => array (
                    'required' => 'Password cannot be empty.',
                    'min_length' => 'The entered password at least 8 characters.'
                )
            )
        ),
    'products' => 
        array (
            array (
                'field' => 'categories',
                'label' => 'Categories',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Kategori tidak boleh kosong.'
                )
            ),
            array (
                'field' => 'productname',
                'label' => 'Product Name',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Nama Produk tidak boleh kosong.'
                )
            ),
            array (
                'field' => 'productdesc',
                'label' => 'Product Desc',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Deskripsi tidak boleh kosong.'
                )
            ),
            array (
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Harga tidak boleh kosong.'
                )
            )
        ),
    'update_account_admin' =>
        array (
            array (
                'field' => 'position',
                'label' => 'Position',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Position cannot be empty.'
                )
            ),
            array (
                'field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Firstname cannot be empty.'
                )
            ),
            array (
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'trim'
            ),
            array (
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email',
                'errors' => array (
                    'required' => 'Email cannot be empty.',
                    'valid_email' => 'Email entered is not valid.'
                )
            ),
        ),
    'update_profile_admin' =>
        array (
            array (
                'field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Firstname cannot be empty.'
                )
            ),
            array (
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'trim'
            ),
            array (
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email',
                'errors' => array (
                    'required' => 'Email cannot be empty.',
                    'valid_email' => 'Email entered is not valid.'
                )
            )
        ),
    'update_profile_store' =>
        array (
            array (
                'field' => 'nama_toko',
                'label' => 'Nama Toko',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Nama Toko cannot be empty.'
                )
            ),
            array (
                'field' => 'alamat_toko',
                'label' => 'Alamat Toko',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Alamat toko cannot be empty.'
                )
            ),
            array (
                'field' => 'no_handphone',
                'label' => 'No Handphone',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'No Handphone cannot be empty.'
                )
            ),
            array (
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email',
                'errors' => array (
                    'required' => 'Email cannot be empty.',
                    'valid_email' => 'Email entered is not valid.'
                )
            )
        ),
    'update_profile_users' =>
        array (
            array (
                'field' => 'nama_depan',
                'label' => 'Nama Depan',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Nama Depan cannot be empty.'
                )
            ),
            array (
                'field' => 'nama_belakang',
                'label' => 'Nama Belakang',
                'rules' => 'trim'
            ),
            array (
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Alamat cannot be empty.'
                )
            ),
            array (
                'field' => 'no_handphone',
                'label' => 'No Handphone',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'No Handphone cannot be empty.'
                )
            ),
            array (
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email',
                'errors' => array (
                    'required' => 'Email cannot be empty.',
                    'valid_email' => 'Email entered is not valid.'
                )
            )
        ),
    'update_password_profile' =>
        array (
            array (
                'field' => 'oldpassword',
                'label' => 'Old Password',
                'rules' => 'required|trim|min_length[8]',
                'errors' => array (
                    'required' => 'Old password cannot be empty.',
                    'min_length' => 'The entered password at least 8 characters.'
                )
            ),
            array (
                'field' => 'newpassword',
                'label' => 'New Password',
                'rules' => 'required|trim|matches[renewpassword]|min_length[8]',
                'errors' => array (
                    'required' => 'New password cannot be empty.',
                    'matches' => 'The entered password didn`t match.',
                    'min_length' => 'The entered password at least 8 characters.'
                )
            ),
            array (
                'field' => 'renewpassword',
                'label' => 'Repeat New Password',
                'rules' => 'required|trim|matches[newpassword]',
                'errors' => array (
                    'required' => 'Repeat New password cannot be empty.',
                    'matches' => 'The entered password didn`t match.'
                )
            )
        ),
    'user_registration' =>
        array (
            array (
                'field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Nama Depan tidak boleh kosong.'
                )
            ),
            array (
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'trim'
            ),
            array (
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Alamat tidak boleh kosong.'
                )
            ),
            array (
                'field' => 'phonenumber',
                'label' => 'Phone Number',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Nomor Handphone tidak boleh kosong.'
                )
            ),
            array (
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email|is_unique[tb_users.email]',
                'errors' => array (
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Email tidak valid.',
                    'is_unique' => 'Email sudah terdaftar'
                )
            ),
            array (
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|matches[repassword]|min_length[8]',
                'errors' => array (
                    'required' => 'Password tidak boleh kosong.',
                    'matches' => 'Password yang dimasukkan tidak sama.',
                    'min_length' => 'Password minimal 8 karakter.'
                )
            ),
            array (
                'field' => 'repassword',
                'label' => 'Repeat Password',
                'rules' => 'required|trim|matches[password]',
                'errors' => array (
                    'required' => 'Password tidak boleh kosong.',
                    'matches' => 'Password yang dimasukkan tidak sama.'
                )
            )
        ),
    'store_registration' =>
        array (
            array (
                'field' => 'storename',
                'label' => 'Store Name',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Nama Toko tidak boleh kosong.'
                )
            ),
            array (
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Alamat Toko tidak boleh kosong.'
                )
            ),
            array (
                'field' => 'phonenumber',
                'label' => 'Phone Number',
                'rules' => 'required|trim',
                'errors' => array (
                    'required' => 'Nomor Handphone tidak boleh kosong.'
                )
            ),
            array (
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email|is_unique[tb_users.email]',
                'errors' => array (
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Email tidak valid.',
                    'is_unique' => 'Email sudah terdaftar'
                )
            ),
            array (
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|matches[repassword]|min_length[8]',
                'errors' => array (
                    'required' => 'Password tidak boleh kosong.',
                    'matches' => 'Password yang dimasukkan tidak sama.',
                    'min_length' => 'Password minimal 8 karakter.'
                )
            ),
            array (
                'field' => 'repassword',
                'label' => 'Repeat Password',
                'rules' => 'required|trim|matches[password]',
                'errors' => array (
                    'required' => 'Password tidak boleh kosong.',
                    'matches' => 'Password yang dimasukkan tidak sama.'
                )
            )
        )
);