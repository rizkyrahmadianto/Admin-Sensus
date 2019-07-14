<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
        } 

        public function index()
        {
            $info['judul'] = 'Halaman Home';

            $config['base_url']     = base_url().'home/index';
            /*$config['total_rows']   = $this->db->count_all('person');*/
            /*$config['total_rows']   = $this->db->count_all('person','regions');*/
            $config['total_rows']   = $this->Home_model->getTotalRow();
            $config['per_page']     = 5;
            $config['uri_segment']  = 3;
            $choice = $config['total_rows'] / $config['per_page'];
            $config['num_links']    = floor($choice);

            $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></div>';

            $config['first_link']       = 'First';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tag_close']  = '</span></li>';

            $config['last_link']        = 'Last';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tag_close']   = '</span></li>';

            $config['next_link']        = '&gt;';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';

            $config['prev_link']        = '&lt;';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tag_close']   = '</span></li>';

            $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';

            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            
            $this->pagination->initialize($config);

            $info['page']   = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $info['data']   = $this->Home_model->getAllData($config['per_page'], $info['page']);
        
            $info['pagination'] = $this->pagination->create_links();

            if ($this->input->post('cari', true)) {
                $info['data'] = $this->Home_model->getAllData($config['per_page'], $info['page']);
            }

            $this->load->view('templates/header', $info);
            $this->load->view('home/index', $info);
            $this->load->view('templates/footer');
        }
    }
    
?>