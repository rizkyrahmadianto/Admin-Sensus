<?php  
    defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * summary
	 */
	class Person extends CI_Controller
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        parent::__construct();
	    }

	    public function index()
	    {
	    	$info['judul']  		= "Halaman Data Penduduk";
            $info['tampil_daerah']	= $this->Person_model->ambilDaerah();
            
            $config['base_url']     = base_url().'person/index';
            $config['total_rows']   = $this->db->count_all('person');
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
            $info['person'] = $this->Person_model->getAllPerson($config['per_page'], $info['page']);
        
            $info['pagination'] = $this->pagination->create_links();

            if ($this->input->post('cari', true)) {
                $info['person'] = $this->Person_model->getCariPerson($config['per_page'], $info['page']);
            }

            $this->load->view('templates/header', $info);
            $this->load->view('person/index', $info);
            $this->load->view('templates/footer');
	    }

	    public function tambah()
	    {
	    	$info['judul']          = "Tambah Data Penduduk";
            $info['name_result']    = "Nama penduduk tidak boleh sama dengan sebelumnya !";
            $info['option_region'] 	= $this->Person_model->getOptionRegion();

            $this->form_validation->set_rules('name', 'nama penduduk', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('alamat', 'alamat penduduk', 'trim|required|min_length[10]');
            $this->form_validation->set_rules('gaji', 'gaji penduduk', 'trim|required|min_length[3]');

            //Rubah Format Uang
            $uang       = $this->input->post('gaji', true);
            $rubah_uang = preg_replace('/\D/', '', $uang); 

            $file = [
            	"name" 		=> $this->input->post('name', true),
            	"region_id" => $this->input->post('daerah', true),
            	"address" 	=> $this->input->post('alamat', true),
            	"income"	=> $rubah_uang,
            ];

            $person_name = $this->input->post('name', true);
            $name_check  = $this->Person_model->checkDataSama('name', $person_name);

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $info);
                $this->load->view('person/tambah');
                $this->load->view('templates/footer');
            } else {
                if ($name_check == TRUE) {
                    $this->load->view('templates/header', $info);
                    $this->load->view('person/tambah', $info);
                    $this->load->view('templates/footer');
                } else {
                    $this->Person_model->tambahDataPerson($file);
                    $this->session->set_flashdata('success','ditambahkan !');
                    redirect('person','refresh');
                }
            }
	    }

	    public function detail($id)
	    {
	    	$info['judul']  = 'Detail Penduduk';
            $info['detail'] = $this->Person_model->getPersonById($id);
            /*$info['daerah'] = $this->Person_model->getRegionById();*/
            $info['option_region']  = $this->Person_model->getOptionRegion();

            $this->load->view('templates/header', $info);
            $this->load->view('person/detail', $info);
            $this->load->view('templates/footer');
	    }

	    public function edit($id)
	    {
	    	$info['judul']          = "Edit Data Penduduk";
            $info['person']         = $this->Person_model->getPersonById($id);
            $info['option_region'] 	= $this->Person_model->getOptionRegion();

            $this->form_validation->set_rules('name', 'nama penduduk', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('alamat', 'alamat penduduk', 'trim|required|min_length[10]');
            $this->form_validation->set_rules('gaji', 'gaji penduduk', 'trim|required|min_length[3]');

            $uang       = $this->input->post('gaji', true);
            $rubah_uang = preg_replace('/\D/', '', $uang);

            $file = [
            	"name" 		=> $this->input->post('name', true),
            	"region_id" => $this->input->post('daerah', true),
            	"address" 	=> $this->input->post('alamat', true),
            	"income"	=> $rubah_uang
            ];

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $info);
                $this->load->view('person/edit');
                $this->load->view('templates/footer');
            } else {
                $this->Person_model->updateDataPerson($file);
                $this->session->set_flashdata('success','diupdate !');
                redirect('person','refresh');
            }
	    }

	    public function hapus($id)
	    {
	    	$this->Person_model->hapusDataPerson($id);
            $this->session->set_flashdata('success', 'dihapus !');
            redirect('person','refresh');
	    }
	}
?>