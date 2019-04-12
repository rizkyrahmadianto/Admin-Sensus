<?php  
	/**
	 * summary
	 */
	class Profile_model extends CI_Model
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        parent::__construct();
	    }

        public function getUserSession()
        {
            return $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        }
	}
?>