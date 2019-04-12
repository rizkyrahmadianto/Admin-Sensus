<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home_model extends CI_Model
    {
        /* public function __construct()
        {
            
        } */

        public function getAllData($limit, $offset)
        {
            $keyword = $this->input->post('cari', true);
            
            //coba materi count if dan sum if
            //https://jagowebdev.com/menghitung-fieldkolom-pada-tabel-mysql-dengan-kondisi-tertentu-menggunakan-count-if/
            
            $this->db->select('regions.id AS regid, regions.name AS regname, COUNT(*) AS jumlah, SUM(person.income) AS total, AVG(person.income) AS rata_rata');
            $this->db->from('regions');
            $this->db->join('person','regions.id = person.region_id');
            $this->db->group_by('regions.id');

            $this->db->order_by('regions.name', 'ASC');
            $this->db->limit($limit, $offset);
            $this->db->or_like('regions.name', $keyword);

            $query = $this->db->get();
            return $query->result_array();
        }

        public function getTotalRow()
        {
            $this->db->select('COUNT(*)');
            $this->db->from('regions');
            $this->db->join('person','regions.id = person.region_id');
            //$this->db->group_by('regions.id');
            return $this->db->count_all_results();
        }

        public function getCariData($limit, $offset)
        {
            $keyword = $this->input->post('cari', true);
            $this->db->or_like('name', $keyword);

            return $this->db->get('regions', $limit, $offset)->result_array();
        }
    }
?>