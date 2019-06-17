<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Home', 'home');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index()
	{
		$data['title'] = "Home";
		$data['products'] = $this->home->getAllProduct(12);

		$this->load->view('home/_partials/header', $data);
		$this->load->view('home/_partials/navbar');
		$this->load->view('home/home_page', $data);
		$this->load->view('home/_partials/footer');
	}

	public function login()
	{
		$data['title'] = "Login";

		$this->load->view('home/_partials/header', $data);
		$this->load->view('home/_partials/navbar');
		$this->load->view('home/login');
		$this->load->view('home/_partials/footer');
  	}

	public function registration()
	{
		$data['title'] = "Registration";

		$this->load->view('home/_partials/header', $data);
		$this->load->view('home/_partials/navbar');
		$this->load->view('home/registration');
		$this->load->view('home/_partials/footer');
  	}

  	public function detail($id_product = NULL)
  	{
  		if ($id_product)
  		{
  			$data['product'] = $this->home->getProductDetail($id_product);
  			$data['title'] = $data['product']['nama_kue'];

  			$this->load->view('home/_partials/header', $data);
			$this->load->view('home/_partials/navbar');
			$this->load->view('home/detail', $data);
			$this->load->view('home/_partials/footer');
  		}
  		else
  		{
  			redirect('home');
  		}
  	}

  	public function category($offset = 0)
	{
		$products = $this->db->get('tb_kue');

		$config['base_url'] = base_url() . 'home/category';
		$config['total_rows'] = $products->num_rows();
		$config['per_page'] = 6;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;

		$config['full_tag_open'] = '<ul class="pagination justify-content-center mt-3">';
		$config['full_tag_close'] = '</ul>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';

		$config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['first_link'] = '<span aria-hidden="true">&laquo; awal </span>';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '<span aria-hidden="true"> akhir &raquo;</span>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);
		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $offset;

		$data['title'] = "Category";
		$data['products'] = $this->home->getAllProduct($config['per_page'],$offset);
		$data['categories'] = $this->home->getCategoryProduct();

		$this->load->view('home/_partials/header', $data);
		$this->load->view('home/_partials/navbar');
		$this->load->view('home/category', $data);
		$this->load->view('home/_partials/footer');
	}

	public function filter()
	{
		$data['title'] = "Filter";
		$data['categories'] = $this->home->getCategoryProduct();

		if (empty($this->input->post('category')) AND empty($this->input->post('price')) AND empty($this->input->post('date')))
		{
			$data['products'] = $this->home->getAllProduct();
		}
		else
		{
			$data['products'] = $this->home->getAllProductFilter($this->input->post('category'), $this->input->post('price'), $this->input->post('date'));
		}
		
		$this->load->view('home/_partials/header', $data);
		$this->load->view('home/_partials/navbar');
		$this->load->view('home/filter', $data);
		$this->load->view('home/_partials/footer');
	}
}
