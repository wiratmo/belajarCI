<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{
     
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Siswa');
        $this->load->library('form_validation');
    }

    function index()
    {
        $this->load->view('dashboard');
    }

    function daftar_siswa()
    {
        $data['daftar_siswa'] = $this->M_Siswa->get_siswa();
        $this->load->view('daftar_siswa', $data);
    }

    function tambah()
    {
        $this->load->view('form_siswa');
    }

    function add_siswa()
    {
        if($this->M_Siswa->insert_data_siswa())
        {
            redirect(site_url('daftar'));
        } else 
        {
            redirect(site_url('tambah'));
        }
    }

    function edit($id)
    {
        $data['siswa'] = $this->M_Siswa->get_siswa_by_id($id);
        $this->load->view('form_siswa', $data);
    }

    function update_siswa()
    {
        $_id = $this->input->post('id');
        if($this->M_Siswa->update_data_siswa($_id))
        {
            redirect(site_url('daftar'));
        } else 
        {
            redirect(site_url('edit/'.$_id));
        }
    }

    function delete(){
        $_id = $this->input->post('id');
        if($this->M_Siswa->delete_data_siswa($_id))
        {
            redirect(site_url('daftar'));
        } 
        echo "<script> alert('maaf tidak bisa menghapus') </script>";
    }


}