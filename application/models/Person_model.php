<?php  
	/**
	 * summary
	 */
	class Person_model extends CI_Model
	{
	    /**
	     * summary
	     */
	    /*public function __construct()
	    {
	        
	    }*/

	    public function getRegionById($id)
	    {
	    	return $this->db->get_where('regions', ['id' => $id])->row_array();
	    }

	    public function ambilDaerah()
	    {
	    	$query = $this->db->get('regions');
			return $query->result_array();
	    }

	    public function getPersonById($id)
	    {
	    	return $this->db->get_where('person', ['id' => $id])->row_array();
	    }

	    public function getAllPerson($limit, $offset)
	    {
	    	$this->db->order_by('created_at', 'desc');
            $query = $this->db->get('person', $limit, $offset);
            return $query->result_array();
	    }

	    public function getCariPerson($limit, $offset)
	    {
	    	$keyword = $this->input->post('cari', true);
            $this->db->like('id', $keyword);
            $this->db->or_like('name', $keyword);
            $this->db->or_like('region_id', $keyword);
            $this->db->or_like('address', $keyword);

            return $this->db->get('person', $limit, $offset)->result_array();
	    }

	    public function getOptionRegion()
	    {
	    	$this->db->order_by('name', 'asc');
			$query = $this->db->get('regions');
			return $query->result_array();
	    }

	    public function checkDataSama($value, $data)
	    {
	    	$this->db->select($value);
            $this->db->where($value, $data);

            $query = $this->db->get('person');

            if ($query->num_rows() > 0) {

                return TRUE;

            } else {

                return FALSE;
                
            }
	    }

	    public function tambahDataPerson($file)
	    {
	    	$this->db->set('created_at', 'NOW()', FALSE);
            $this->db->insert('person', $file);
	    }

	    public function updateDataPerson($file)
	    {
	    	$this->db->where('id', $this->input->post('id'));
            $this->db->update('person', $file);
	    }

	    public function hapusDataPerson($id)
	    {
	    	$this->db->where('id', $id);
            $this->db->delete('person');
	    }
	}
?>