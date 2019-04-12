<?php  
	/**
	 * summary
	 */
	class Profile extends CI_Controller
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        parent::__construct();

	        $this->load->helper(array('url','form'));
	        $this->load->library('form_validation');
	        $this->load->model('Profile_model');
	    }

	    public function index()
	    {
	    	$info['judul'] = 'Halaman Profile';
	    	$info['user']  = $this->Profile_model->getUserSession();

	    	$this->load->view('templates/header', $info);
	    	$this->load->view('profile/index', $info);
	    	$this->load->view('templates/footer');
	    }
	}
?>