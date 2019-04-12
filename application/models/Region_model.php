<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Region_model extends CI_Model
    {
        /* public function __construct()
        {
            
        } */

        public function getRegionById($id)
        {
            return $this->db->get_where('regions', ['id' => $id])->row_array();
        }

        public function getAllRegion($limit, $offset)
        {
            $this->db->order_by('created_at', 'desc');
            $query = $this->db->get('regions', $limit, $offset);
            return $query->result_array();
        }

        public function getCariRegion($limit, $offset)
        {
            $keyword = $this->input->post('cari', true);
            $this->db->like('id', $keyword);
            $this->db->or_like('name', $keyword);

            return $this->db->get('regions', $limit, $offset)->result_array();
        }

        public function checkDataSama($value, $data)
        {
            $this->db->select($value);
            $this->db->where($value, $data);

            $query = $this->db->get('regions');

            if ($query->num_rows() > 0) {

                return TRUE;

            } else {

                return FALSE;
                
            }
        }

        public function tambahDataRegion($file)
        {
            $this->db->set('created_at', 'NOW()', FALSE);
            $this->db->insert('regions', $file);
        }

        public function updateDataRegion($file)
        {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('regions', $file);
        }

        public function hapusDataRegion($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('regions');
        }
    }
?>