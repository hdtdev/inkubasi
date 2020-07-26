<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Tenant_management extends CI_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
    	//here
    	$data['title'] = 'List All Tenants';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tenants'] = $this->db->query("SELECT * FROM user WHERE role_id = 2")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tenant_management/index', $data);
        $this->load->view('templates/footer');
    }

    public function active()
    {
    	//here
    	$data['title'] = 'List Active Tenants';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['active'] = $this->db->query("SELECT * FROM user WHERE role_id = 2 AND is_active = 1")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tenant_management/active', $data);
        $this->load->view('templates/footer');
    }

    public function disable()
    {
    	//here
    	$data['title'] = 'List Non-Active Tenants';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['disable'] = $this->db->query("SELECT * FROM user WHERE role_id = 2 AND is_active = 0")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tenant_management/disable', $data);
        $this->load->view('templates/footer');
    }

    public function do_active($id)
    {
    	//here
    	$this->db->query("UPDATE user SET is_active = 1 WHERE id=$id");
    	redirect('tenant_management/active/');
    }

    public function do_disable($id)
    {
    	//here
    	$this->db->query("UPDATE user SET is_active = 0 WHERE id=$id");
    	redirect('tenant_management/disable/');
    }
}