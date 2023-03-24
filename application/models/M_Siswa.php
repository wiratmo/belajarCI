<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Siswa extends CI_Model
{
    protected $_table = 'siswa';
    protected $rules = [
        [
            'field' => 'nis',
            'label' => 'NIS',
            'rules' => 'required|min_length[4]|is_unique[siswa.nis]|integer'
        ], 
        [
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|min_length[5]'
        ],
        [
            'field' => 'kelas',
            'label' => 'Kelas',
            'rules' => 'required|in_list[x rpl a,x rpl b,x rpl c]'
        ]
        ];
    
    public function __construct()
    {
        $this->load->library('form_validation');
    }
    
    public function get_siswa(){
        $query = $this->db->get($this->_table);
        return $query->result();
    } 

    public function get_siswa_by_id($id){
        $query = $this->db->get_where($this->_table, ['id'=> $id]);
        return $query->row();
    }

    private function validation(){
        $this->form_validation->set_rules($this->rules);
        
        if ($this->form_validation->run() == TRUE){

            $siswa = [
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas')
            ];

            return $siswa;
        }

        return FALSE;
    }

    private function insert_siswa($data){
        $this->db->insert($this->_table, $data);
        return TRUE;
    }

    public function insert_data_siswa(){
        $validation_siswa = $this->validation();
        if ($validation_siswa)
        {
            return $this->insert_siswa($validation_siswa);
        } else 
        {
            return FALSE;
        }
    }

    private function update_siswa($data, $id){
        $this->db->where('id', $id);
        $this->db->update($this->_table, $data);
        return TRUE;
    }

    public function update_data_siswa($id){
        $validation_siswa = $this->validation();
        if ($validation_siswa)
        {
            return $this->update_siswa($validation_siswa, $id);
        } else 
        {
            return FALSE;
        }
    }

    public function delete_data_siswa($id){
        if ($this->db->delete($this->_table, array('id' => $id)))
        {
            return TRUE;
        } 
        return FALSE;
    }
}