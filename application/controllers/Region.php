<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Region extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $info['judul']  = "Halaman Data Region";
            /*$info['region'] = $this->Region_model->getAllRegion();*/
            
            $config['base_url']     = base_url().'region';
            $config['total_rows']   = $this->db->count_all('regions');
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
            $info['region'] = $this->Region_model->getAllRegion($config['per_page'], $info['page']);
        
            $info['pagination'] = $this->pagination->create_links();

            if ($this->input->post('cari', true)) {
                $info['region'] = $this->Region_model->getCariRegion($config['per_page'], $info['page']);
            }

            $this->load->view('templates/header', $info);
            $this->load->view('region/index', $info);
            $this->load->view('templates/footer');
        }

        public function tambah()
        {
            $info['judul']          = "Tambah Data Region";
            $info['name_result']    = "Nama region tidak boleh sama dengan sebelumnya !";

            $this->form_validation->set_rules('name', 'nama region', 'trim|required|min_length[3]');

            $file = ["name" => $this->input->post('name', true)];

            $region_name = $this->input->post('name', true);
            $name_check  = $this->Region_model->checkDataSama('name', $region_name);

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $info);
                $this->load->view('region/tambah');
                $this->load->view('templates/footer');
            } else {
                if ($name_check == TRUE) {
                    $this->load->view('templates/header', $info);
                    $this->load->view('region/tambah', $info);
                    $this->load->view('templates/footer');
                } else {
                    $this->Region_model->tambahDataRegion($file);
                    $this->session->set_flashdata('success','ditambahkan !');
                    redirect('region','refresh');
                }
            }
        }

        public function edit($id)
        {
            $info['judul']          = "Edit Data Region";
            $info['name_result']    = "Nama region tidak boleh sama dengan sebelumnya !";
            $info['region']         = $this->Region_model->getRegionById($id);

            $this->form_validation->set_rules('name', 'nama region', 'trim|required|min_length[3]');

            $file = ["name" => $this->input->post('name', true)];

            $region_name = $this->input->post('name', true);
            $name_check  = $this->Region_model->checkDataSama('name', $region_name);

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $info);
                $this->load->view('region/edit');
                $this->load->view('templates/footer');
            } else {
                if ($name_check == TRUE) {
                    $this->load->view('templates/header', $info);
                    $this->load->view('region/edit', $info);
                    $this->load->view('templates/footer');
                } else {
                    $this->Region_model->updateDataRegion($file);
                    $this->session->set_flashdata('success','diupdate !');
                    redirect('region','refresh');
                }
            }
        }

        public function detail($id)
        {
            $info['jusul']  = 'Detail Region';
            $info['detail'] = $this->Region_model->getRegionById($id);

            $this->load->view('templates/header', $info);
            $this->load->view('region/detail', $info);
            $this->load->view('templates/footer');
        }

        public function hapus($id)
        {
            $this->Region_model->hapusDataRegion($id);
            $this->session->set_flashdata('success', 'dihapus !');
            redirect('region','refresh');
        }
    }
    
?>