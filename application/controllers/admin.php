<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author : Joyonto Roy
 *	date	: 20 August, 2013
 *	University Of Dhaka, Bangladesh
 *   Nulled By Vokey 
 *	Ekattor School & College Management System
 *	http://codecanyon.net/user/joyontaroy
 */

class Admin extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
		$this->load->database();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
    }
    
    /***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
		$page_data['vaccinations']   = $this->db->get('vaccination')->result_array();
        $page_data['page_title'] = get_phrase('admin_dashboard');
        $this->load->view('index', $page_data);
    }
    
/****MANAGE ANIMAL OWNERS*****/
    function owner($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
			$data['district']     = $this->input->post('district');
            $data['animals']       = $this->input->post('animals');
            $data['email']       = $this->input->post('email');
            $data['password']    = $this->input->post('password');
            $this->db->insert('owner', $data);
            $owner_id = mysql_insert_id();
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/owner_image/' . $owner_id . '.jpg');
            $this->email_model->account_opening_email('owner', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?admin/owner/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
            $data['phone']       = $this->input->post('phone');
			$data['district']     = $this->input->post('district');
            $data['animals']       = $this->input->post('animals');
            $data['email']       = $this->input->post('email');
            $data['password']    = $this->input->post('password');
            
            $this->db->where('owner_id', $param2);
            $this->db->update('owner', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/owner_image/' . $param2 . '.jpg');
            redirect(base_url() . 'index.php?admin/owner/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_owner_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('owner', array(
                'owner_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('owner_id', $param2);
            $this->db->delete('owner');
            redirect(base_url() . 'index.php?admin/owner/', 'refresh');
        }
        $page_data['owners']   = $this->db->get('owner')->result_array();
        $page_data['page_name']  = 'owner';
        $page_data['page_title'] = get_phrase('manage_animal_owners');
        $this->load->view('index', $page_data);
    }
    
    /****MANAGE VET STAFF*****/
    function staff($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
			$data['district']     = $this->input->post('district');
			$data['education']     = $this->input->post('education');
			$data['rank']     = $this->input->post('rank');
			$data['specialization']     = $this->input->post('specialization');
			$data['DOR']     = $this->input->post('DOR');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $data['password']    = $this->input->post('password');
            $this->db->insert('staff', $data);
            $staff_id = mysql_insert_id();
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/staff_image/' . $staff_id . '.jpg');
            $this->email_model->account_opening_email('staff', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            redirect(base_url() . 'index.php?admin/staff/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']        = $this->input->post('name');
            $data['birthday']    = $this->input->post('birthday');
            $data['sex']         = $this->input->post('sex');
            $data['address']     = $this->input->post('address');
			$data['district']     = $this->input->post('district');
			$data['education']     = $this->input->post('education');
			$data['rank']     = $this->input->post('rank');
			$data['specialization']     = $this->input->post('specialization');
			$data['DOR']     = $this->input->post('DOR');
            $data['phone']       = $this->input->post('phone');
            $data['email']       = $this->input->post('email');
            $data['password']    = $this->input->post('password');
            
            $this->db->where('staff_id', $param2);
            $this->db->update('staff', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/staff_image/' . $param2 . '.jpg');
            redirect(base_url() . 'index.php?admin/staff/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_staff_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('staff', array(
                'staff_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('staff_id', $param2);
            $this->db->delete('staff');
            redirect(base_url() . 'index.php?admin/staff/', 'refresh');
        }
        $page_data['teachers']   = $this->db->get('staff')->result_array();
        $page_data['page_name']  = 'staff';
        $page_data['page_title'] = get_phrase('manage_staff');
        $this->load->view('index', $page_data);
    }
    
    /****MANAGE DISEASES*****/
    function disease($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']       = $this->input->post('name');
            $data['vaccine_id']   = $this->input->post('vaccine_id');
            $data['staff_id'] = $this->input->post('staff_id');
			$data['symptoms'] = $this->input->post('symptoms');
            $this->db->insert('disease', $data);
            redirect(base_url() . 'index.php?admin/disease/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']       = $this->input->post('name');
            $data['vaccine_id']   = $this->input->post('vaccine_id');
            $data['staff_id'] = $this->input->post('staff_id');
			$data['symptoms'] = $this->input->post('symptoms');
            
            $this->db->where('disease_id', $param2);
            $this->db->update('disease', $data);
            redirect(base_url() . 'index.php?admin/disease/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('disease', array(
                'disease_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('disease_id', $param2);
            $this->db->delete('disease');
            redirect(base_url() . 'index.php?admin/disease/', 'refresh');
        }
        $page_data['diseases']   = $this->db->get('disease')->result_array();
        $page_data['page_name']  = 'disease';
        $page_data['page_title'] = get_phrase('manage_diseases');
        $this->load->view('index', $page_data);
    }
   
/****MANAGE ANIMALS*****/
    function animal($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['type']       = $this->input->post('type');
            $data['category']   = $this->input->post('category');
            $data['owner_id'] = $this->input->post('owner_id');
			$data['district'] = $this->input->post('district');
			$data['DOB'] = $this->input->post('DOB');
            $this->db->insert('animal', $data);
            redirect(base_url() . 'index.php?admin/animal/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['type']       = $this->input->post('type');
            $data['category']   = $this->input->post('category');
            $data['owner_id'] = $this->input->post('owner_id');
			$data['district'] = $this->input->post('district');
			$data['DOB'] = $this->input->post('DOB');
            
            $this->db->where('animal_id', $param2);
            $this->db->update('animal', $data);
            redirect(base_url() . 'index.php?admin/animal/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('animal', array(
                'animal_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('animal_id', $param2);
            $this->db->delete('animal');
            redirect(base_url() . 'index.php?admin/animal/', 'refresh');
        }
        $page_data['animals']   = $this->db->get('animal')->result_array();
        $page_data['page_name']  = 'animal';
        $page_data['page_title'] = get_phrase('manage_animals');
        $this->load->view('index', $page_data);
    }
   
   /****MANAGE ANIMAL PRODUCTS*****/
    function product($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']       = $this->input->post('name');
            $data['abattoir']   = $this->input->post('abattoir');
            $data['owner_id'] = $this->input->post('owner_id');
			$data['staff_id'] = $this->input->post('staff_id');
			$data['animal_id'] = $this->input->post('animal_id');
			$data['district'] = $this->input->post('district');
			$data['DOI'] = $this->input->post('DOI');
			$data['last_vaccination'] = $this->input->post('last_vaccination');
            $this->db->insert('product', $data);
            redirect(base_url() . 'index.php?admin/product/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']       = $this->input->post('name');
            $data['abattoir']   = $this->input->post('abattoir');
            $data['owner_id'] = $this->input->post('owner_id');
			$data['staff_id'] = $this->input->post('staff_id');
			$data['animal_id'] = $this->input->post('animal_id');
			$data['district'] = $this->input->post('district');
			$data['DOI'] = $this->input->post('DOI');
			$data['last_vaccination'] = $this->input->post('last_vaccination');
            
            $this->db->where('product_id', $param2);
            $this->db->update('product', $data);
            redirect(base_url() . 'index.php?admin/product/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('product', array(
                'product_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('product_id', $param2);
            $this->db->delete('product');
            redirect(base_url() . 'index.php?admin/product/', 'refresh');
        }
        $page_data['products']   = $this->db->get('product')->result_array();
        $page_data['page_name']  = 'product';
        $page_data['page_title'] = get_phrase('manage_animal_products');
        $this->load->view('index', $page_data);
    }
   
	/****CAPTURE OUTBREAK*****/
    function outbreak($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['district_id']       = $this->input->post('district');
            $data['county_id']   = $this->input->post('county');
            $data['disease_id'] = $this->input->post('disease_id');
			$data['subcounty_id']       = $this->input->post('subcounty');
            $data['parish_id']   = $this->input->post('parish');
            $data['village'] = $this->input->post('village');
			$data['symptoms']   = $this->input->post('symptoms');
            $data['infected'] = $this->input->post('infected');
			$data['DOC'] = $this->input->post('DOC');
			$data['cattle'] = $this->input->post('cattle');
			$data['sheep'] = $this->input->post('sheep');
			$data['goats'] = $this->input->post('goats');
			$data['poultry'] = $this->input->post('poultry');
			$data['donkeys'] = $this->input->post('donkeys');
			$data['pets'] = $this->input->post('pets');
			
            $this->db->insert('outbreak', $data);
            redirect(base_url() . 'index.php?admin/outbreak/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['district_id']       = $this->input->post('district');
            $data['county_id']   = $this->input->post('county');
            $data['disease_id'] = $this->input->post('disease_id');
			$data['subcounty_id']       = $this->input->post('subcounty');
            $data['parish_id']   = $this->input->post('parish');
            $data['village'] = $this->input->post('village');
			$data['symptoms']   = $this->input->post('symptoms');
            $data['infected'] = $this->input->post('infected');
			$data['DOC'] = $this->input->post('DOC');
			$data['cattle'] = $this->input->post('cattle');
			$data['sheep'] = $this->input->post('sheep');
			$data['goats'] = $this->input->post('goats');
			$data['poultry'] = $this->input->post('poultry');
			$data['donkeys'] = $this->input->post('donkeys');
			$data['pets'] = $this->input->post('pets');
            
            $this->db->where('outbreak_id', $param2);
            $this->db->update('outbreak', $data);
            redirect(base_url() . 'index.php?admin/outbreak/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('outbreak', array(
                'outbreak_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('outbreak_id', $param2);
            $this->db->delete('outbreak');
            redirect(base_url() . 'index.php?admin/outbreak/', 'refresh');
        }
        $page_data['outbreaks']   = $this->db->get('outbreak')->result_array();
        $page_data['page_name']  = 'outbreak';
        $page_data['page_title'] = get_phrase('capture_disease_outbreak');
        $this->load->view('index', $page_data);
    }
	
	/****OUTBREAK REPORT*****/
    function outbreak_report($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['district_id']       = $this->input->post('district');
            $data['county_id']   = $this->input->post('county');
            $data['disease_id'] = $this->input->post('disease_id');
			$data['subcounty_id']       = $this->input->post('subcounty');
            $data['parish_id']   = $this->input->post('parish');
            $data['village'] = $this->input->post('village');
			$data['symptoms']   = $this->input->post('symptoms');
			$data['photo'] = $this->input->post('photo');
            $data['infected'] = $this->input->post('infected');
			$data['DOC'] = $this->input->post('DOC');
			$data['cattle'] = $this->input->post('cattle');
			$data['sheep'] = $this->input->post('sheep');
			$data['goats'] = $this->input->post('goats');
			$data['poultry'] = $this->input->post('poultry');
			$data['donkeys'] = $this->input->post('donkeys');
			$data['pets'] = $this->input->post('pets');
			
            $this->db->insert('outbreak', $data);
            redirect(base_url() . 'index.php?admin/outbreak_report/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['district_id']       = $this->input->post('district');
            $data['county_id']   = $this->input->post('county');
            $data['disease_id'] = $this->input->post('disease_id');
			$data['subcounty_id']       = $this->input->post('subcounty');
            $data['parish_id']   = $this->input->post('parish');
            $data['village'] = $this->input->post('village');
			$data['symptoms']   = $this->input->post('symptoms');
			$data['photo'] = $this->input->post('photo');
            $data['infected'] = $this->input->post('infected');
			$data['DOC'] = $this->input->post('DOC');
			$data['cattle'] = $this->input->post('cattle');
			$data['sheep'] = $this->input->post('sheep');
			$data['goats'] = $this->input->post('goats');
			$data['poultry'] = $this->input->post('poultry');
			$data['donkeys'] = $this->input->post('donkeys');
			$data['pets'] = $this->input->post('pets');
            
            $this->db->where('outbreak_id', $param2);
            $this->db->update('outbreak', $data);
            redirect(base_url() . 'index.php?admin/outbreak_report/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('outbreak', array(
                'outbreak_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('outbreak_id', $param2);
            $this->db->delete('outbreak');
            redirect(base_url() . 'index.php?admin/outbreak_report/', 'refresh');
        }
        $page_data['outbreaks']   = $this->db->get('outbreak')->result_array();
        $page_data['page_name']  = 'outbreak_report';
        $page_data['page_title'] = get_phrase('disease_outbreak_report');
        $this->load->view('index', $page_data);
    }
	
    /****MANAGE VACCINES*****/
    function vaccines($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']         = $this->input->post('name');
			$data['type']         = $this->input->post('type');
			$data['category']         = $this->input->post('category');
			$data['manufacturer']         = $this->input->post('manufacturer');
			$data['DOM']         = $this->input->post('DOM');
            $data['staff_id']   = $this->input->post('staff_id');
            $this->db->insert('vaccine', $data);
            redirect(base_url() . 'index.php?admin/vaccines/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']         = $this->input->post('name');
			$data['type']         = $this->input->post('type');
			$data['category']         = $this->input->post('category');
			$data['manufacturer']         = $this->input->post('manufacturer');
			$data['DOM']         = $this->input->post('DOM');
            $data['staff_id']   = $this->input->post('staff_id');
            
            $this->db->where('vaccine_id', $param2);
            $this->db->update('vaccine', $data);
            redirect(base_url() . 'index.php?admin/vaccines/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('vaccine', array(
                'vaccine_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('vaccine_id', $param2);
            $this->db->delete('vaccine');
            redirect(base_url() . 'index.php?admin/vaccines/', 'refresh');
        }
        $page_data['vaccines']    = $this->db->get('vaccine')->result_array();
        $page_data['page_name']  = 'vaccine';
        $page_data['page_title'] = get_phrase('manage_vaccines');
        $this->load->view('index', $page_data);
    }
    
	/****APPLY VACCINE*****/
    function vaccination($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['district_id']       = $this->input->post('district');
            $data['county_id']   = $this->input->post('county');
            $data['vaccine_id'] = $this->input->post('vaccine_id');
			$data['subcounty_id']       = $this->input->post('subcounty');
            $data['parish_id']   = $this->input->post('parish');
            $data['village'] = $this->input->post('village');
			$data['cattle_adults']   = $this->input->post('cattle_adults');
            $data['cattle_calves'] = $this->input->post('cattle_calves');
			$data['sheep'] = $this->input->post('sheep');
			$data['goats'] = $this->input->post('goats');
			$data['poultry'] = $this->input->post('poultry');
			$data['donkeys'] = $this->input->post('donkeys');
			$data['pets'] = $this->input->post('pets');
			$data['DOR'] = $this->input->post('DOR');
			
            $this->db->insert('vaccination', $data);
            redirect(base_url() . 'index.php?admin/vaccination/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['district_id']       = $this->input->post('district');
            $data['county_id']   = $this->input->post('county');
            $data['vaccine_id'] = $this->input->post('vaccine_id');
			$data['subcounty_id']       = $this->input->post('subcounty');
            $data['parish_id']   = $this->input->post('parish');
            $data['village'] = $this->input->post('village');
			$data['cattle_adults']   = $this->input->post('cattle_adults');
            $data['cattle_calves'] = $this->input->post('cattle_calves');
			$data['sheep'] = $this->input->post('sheep');
			$data['goats'] = $this->input->post('goats');
			$data['poultry'] = $this->input->post('poultry');
			$data['donkeys'] = $this->input->post('donkeys');
			$data['pets'] = $this->input->post('pets');
			$data['DOR'] = $this->input->post('DOR');
            
            $this->db->where('vaccination_id', $param2);
            $this->db->update('vaccination', $data);
            redirect(base_url() . 'index.php?admin/vaccination/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('vaccination', array(
                'vaccination_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('vaccination_id', $param2);
            $this->db->delete('vaccination');
            redirect(base_url() . 'index.php?admin/vaccination/', 'refresh');
        }
        $page_data['vaccinations']   = $this->db->get('vaccination')->result_array();
        $page_data['page_name']  = 'vaccination';
        $page_data['page_title'] = get_phrase('vaccination');
        $this->load->view('index', $page_data);
    }
	
	/****VACCINATION REPORT*****/
    function vaccination_report($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['district_id']       = $this->input->post('district');
            $data['county_id']   = $this->input->post('county');
            $data['vaccine_id'] = $this->input->post('vaccine_id');
			$data['subcounty_id']       = $this->input->post('subcounty');
            $data['parish_id']   = $this->input->post('parish');
            $data['village'] = $this->input->post('village');
			$data['cattle_adults']   = $this->input->post('cattle_adults');
            $data['cattle_calves'] = $this->input->post('cattle_calves');
			$data['sheep'] = $this->input->post('sheep');
			$data['goats'] = $this->input->post('goats');
			$data['poultry'] = $this->input->post('poultry');
			$data['donkeys'] = $this->input->post('donkeys');
			$data['pets'] = $this->input->post('pets');
			$data['DOR'] = $this->input->post('DOR');
			
            $this->db->insert('vaccination', $data);
            redirect(base_url() . 'index.php?admin/vaccination/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['district_id']       = $this->input->post('district');
            $data['county_id']   = $this->input->post('county');
            $data['vaccine_id'] = $this->input->post('vaccine_id');
			$data['subcounty_id']       = $this->input->post('subcounty');
            $data['parish_id']   = $this->input->post('parish');
            $data['village'] = $this->input->post('village');
			$data['cattle_adults']   = $this->input->post('cattle_adults');
            $data['cattle_calves'] = $this->input->post('cattle_calves');
			$data['sheep'] = $this->input->post('sheep');
			$data['goats'] = $this->input->post('goats');
			$data['poultry'] = $this->input->post('poultry');
			$data['donkeys'] = $this->input->post('donkeys');
			$data['pets'] = $this->input->post('pets');
			$data['DOR'] = $this->input->post('DOR');
            
            $this->db->where('vaccination_id', $param2);
            $this->db->update('vaccination', $data);
            redirect(base_url() . 'index.php?admin/vaccination/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('vaccination', array(
                'vaccination_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('vaccination_id', $param2);
            $this->db->delete('vaccination');
            redirect(base_url() . 'index.php?admin/vaccination/', 'refresh');
        }
        $page_data['vaccination_report']   = $this->db->get('vaccination')->result_array();
        $page_data['page_name']  = 'vaccination_report';
        $page_data['page_title'] = get_phrase('vaccination_report');
        $this->load->view('index', $page_data);
    }
  
    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/
    function noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->insert('noticeboard', $data);
            redirect(base_url() . 'index.php?admin/noticeboard/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->where('notice_id', $param2);
            $this->db->update('noticeboard', $data);
            $this->session->set_flashdata('flash_message', get_phrase('notice_updated'));
            redirect(base_url() . 'index.php?admin/noticeboard/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('noticeboard', array(
                'notice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('notice_id', $param2);
            $this->db->delete('noticeboard');
            redirect(base_url() . 'index.php?admin/noticeboard/', 'refresh');
        }
        $page_data['page_name']  = 'noticeboard';
        $page_data['page_title'] = get_phrase('manage_noticeboard');
        $page_data['notices']    = $this->db->get('noticeboard')->result_array();
        $this->load->view('index', $page_data);
    }
    
    /*****SITE/SYSTEM SETTINGS*********/
    function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        
        if ($param2 == 'do_update') {
            $this->db->where('type', $param1);
            $this->db->update('settings', array(
                'description' => $this->input->post('description')
            ));
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }
        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('index', $page_data);
    }
    
    /*****LANGUAGE SETTINGS*********/
    function manage_language($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		
		if ($param1 == 'edit_phrase') {
			$page_data['edit_profile'] 	= $param2;	
		}
		if ($param1 == 'update_phrase') {
			$language	=	$param2;
			$total_phrase	=	$this->input->post('total_phrase');
			for($i = 1 ; $i < $total_phrase ; $i++)
			{
				//$data[$language]	=	$this->input->post('phrase').$i;
				$this->db->where('phrase_id' , $i);
				$this->db->update('language' , array($language => $this->input->post('phrase'.$i)));
			}
			redirect(base_url() . 'index.php?admin/manage_language/edit_phrase/'.$language, 'refresh');
		}
		if ($param1 == 'do_update') {
			$language        = $this->input->post('language');
			$data[$language] = $this->input->post('phrase');
			$this->db->where('phrase_id', $param2);
			$this->db->update('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
		}
		if ($param1 == 'add_phrase') {
			$data['phrase'] = $this->input->post('phrase');
			$this->db->insert('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
		}
		if ($param1 == 'add_language') {
			$language = $this->input->post('language');
			$this->load->dbforge();
			$fields = array(
				$language => array(
					'type' => 'LONGTEXT'
				)
			);
			$this->dbforge->add_column('language', $fields);
			
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
		}
		if ($param1 == 'delete_language') {
			$language = $param2;
			$this->load->dbforge();
			$this->dbforge->drop_column('language', $language);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			
			redirect(base_url() . 'index.php?admin/manage_language/', 'refresh');
		}
		$page_data['page_name']        = 'manage_language';
		$page_data['page_title']       = get_phrase('manage_language');
		//$page_data['language_phrases'] = $this->db->get('language')->result_array();
		$this->load->view('index', $page_data);	
    }
    
    /*****BACKUP / RESTORE / DELETE DATA PAGE**********/
    function backup_restore($operation = '', $type = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($operation == 'create') {
            $this->crud_model->create_backup($type);
        }
        if ($operation == 'restore') {
            $this->crud_model->restore_backup();
            $this->session->set_flashdata('backup_message', 'Backup Restored');
            redirect(base_url() . 'index.php?admin/backup_restore/', 'refresh');
        }
        if ($operation == 'delete') {
            $this->crud_model->truncate($type);
            $this->session->set_flashdata('backup_message', 'Data removed');
            redirect(base_url() . 'index.php?admin/backup_restore/', 'refresh');
        }
        
        $page_data['page_info']  = 'Create backup / restore from backup';
        $page_data['page_name']  = 'backup_restore';
        $page_data['page_title'] = get_phrase('manage_backup_restore');
        $this->load->view('index', $page_data);
    }
    
    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']  = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            
            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $data);
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = $this->input->post('password');
            $data['new_password']         = $this->input->post('new_password');
            $data['confirm_new_password'] = $this->input->post('confirm_new_password');
            
            $current_password = $this->db->get_where('admin', array(
                'admin_id' => $this->session->userdata('admin_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('admin_id', $this->session->userdata('admin_id'));
                $this->db->update('admin', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('admin', array(
            'admin_id' => $this->session->userdata('admin_id')
        ))->result_array();
        $this->load->view('index', $page_data);
    }
    
}
