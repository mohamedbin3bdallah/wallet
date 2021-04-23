<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partnerships extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
    {
		parent::__construct();
		$this->mysystem = $this->Admin_mo->getrow('system',array('id'=>'1'));
	    if(!$this->session->userdata('uid'))
	    { 
			redirect('home');
	    }
		else
		{
			$this->loginuser = $this->Admin_mo->getrowjoinLeftLimit('users.*,usertypes.utprivileges as privileges,langs.lndir as dir','users',array('usertypes'=>'users.uutid=usertypes.utid','langs'=>'users.ulang=langs.lncode'),array('users.uid'=>$this->session->userdata('uid')),'');
			$this->sections = array();
			$sections = $this->Admin_mo->getwhere('sections',array('scactive'=>'1'));
			if(!empty($sections))
			{
				foreach($sections as $section) { $this->sections[$section->scid] = $section->sccode; }
			}
		}
	}

	public function index()
	{
		if(strpos($this->loginuser->privileges, ',pssee,') !== false && in_array('PS',$this->sections))
		{
		$data['admessage'] = '';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$employees = $this->Admin_mo->get('users'); foreach($employees as $employee) { $data['employees'][$employee->uid] = $employee->username; }
		$data['partnerships'] = $this->Admin_mo->get('partnerships');		
		$this->load->view('calenderdate');
		//$data['users'] = $this->Admin_mo->rate('*','users',' where id <> 1');
		$this->load->view('headers/partnerships',$data);
		$this->load->view('sidemenu',$data);
		$this->load->view('topmenu',$data);
		$this->load->view('admin/partnerships',$data);
		$this->load->view('footers/partnerships');
		$this->load->view('messages',$data);
		}
		else
		{
		$data['title'] = 'partnerships';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('headers/partnerships',$data);
		$this->load->view('sidemenu',$data);
		$this->load->view('topmenu',$data);
		$this->load->view('admin/messages',$data);
		$this->load->view('footers/partnerships');
		$this->load->view('messages');
		}
	}

	public function add()
	{
		if(strpos($this->loginuser->privileges, ',psadd,') !== false && in_array('PS',$this->sections))
		{
		$data['admessage'] = '';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		//$data['users'] = $this->Admin_mo->get('users');		
		$this->load->view('headers/partnership-add',$data);
		$this->load->view('sidemenu',$data);
		$this->load->view('topmenu',$data);
		$this->load->view('admin/partnership-add',$data);
		$this->load->view('footers/partnership-add');
		$this->load->view('messages',$data);
		}
		else
		{
		$data['title'] = 'partnerships';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('headers/partnerships',$data);
		$this->load->view('sidemenu',$data);
		$this->load->view('topmenu',$data);
		$this->load->view('admin/messages',$data);
		$this->load->view('footers/partnerships');
		$this->load->view('messages');
		}
	}
	
	public function create()
	{
		if(strpos($this->loginuser->privileges, ',psadd,') !== false && in_array('PS',$this->sections))
		{
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>', '</div>');
		$this->form_validation->set_rules('title', 'lang:title' , 'trim|required|max_length[255]');				$this->form_validation->set_rules('time', 'lang:time' , 'trim|required|is_natural_no_zero');					$this->form_validation->set_rules('price', 'lang:price' , 'trim|required|numeric');
		if($this->form_validation->run() == FALSE)
		{
			//$data['admessage'] = 'validation error';
			//$_SESSION['time'] = time(); $_SESSION['message'] = 'inputnotcorrect';
			 $data['system'] = $this->mysystem;			 
			$this->load->view('headers/partnership-add',$data);
			$this->load->view('sidemenu',$data);
			$this->load->view('topmenu',$data);
			$this->load->view('admin/partnership-add',$data);
			$this->load->view('footers/partnership-add');
			$this->load->view('messages',$data);
		}
		else
		{

			$set_arr = array('psuid'=>$this->session->userdata('uid'), 'pstitle'=>set_value('title'), 'psduration'=>set_value('time'),  'psprice'=>set_value('price'), 'psactive'=>set_value('active'), 'pstime'=>time());
			$psid = $this->Admin_mo->set('partnerships', $set_arr);
			if(empty($psid))
			{
				$_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong';
				redirect('partnerships/add', 'refresh');
			}
			else
			{
				$_SESSION['time'] = time(); $_SESSION['message'] = 'success';
				redirect('partnerships', 'refresh');
			}
		}
		//redirect('partnerships/add', 'refresh');
		}
		else
		{
		$data['title'] = 'partnerships';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('headers/partnerships',$data);
		$this->load->view('sidemenu',$data);
		$this->load->view('topmenu',$data);
		$this->load->view('admin/messages',$data);
		$this->load->view('footers/partnerships');
		$this->load->view('messages');
		}
	}
	
	public function edit($id)
	{
		if(strpos($this->loginuser->privileges, ',psedit,') !== false && in_array('PS',$this->sections))
		{
		$id = abs((int)($id));
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$data['partnership'] = $this->Admin_mo->getrow('partnerships',array('psid'=>$id));
		if(!empty($data['partnership']))
		{
			$this->load->view('headers/partnership-edit',$data);
			$this->load->view('sidemenu',$data);
			$this->load->view('topmenu',$data);
			$this->load->view('admin/partnership-edit',$data);
			$this->load->view('footers/partnership-edit');
			$this->load->view('messages',$data);
		}
		else
		{
			$data['title'] = 'partnerships';
			$data['admessage'] = 'youhavenoprivls';
			$this->load->view('headers/partnerships',$data);
			$this->load->view('sidemenu',$data);
			$this->load->view('topmenu',$data);
			$this->load->view('admin/messages',$data);
			$this->load->view('footers/partnerships');
			$this->load->view('messages');
		}
		}
		else
		{
		$data['title'] = 'partnerships';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('headers/partnerships',$data);
		$this->load->view('sidemenu',$data);
		$this->load->view('topmenu',$data);
		$this->load->view('admin/messages',$data);
		$this->load->view('footers/partnerships');
		$this->load->view('messages');
		}
	}
	
	public function editpartnership($id)
	{
		if(strpos($this->loginuser->privileges, ',psedit,') !== false && in_array('PS',$this->sections))
		{
		$id = abs((int)($id));
		if($id != '')
		{
		    $this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
			$this->config->set_item('language', $this->loginuser->ulang);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>', '</div>');
			$this->form_validation->set_rules('title', 'lang:title' , 'trim|required|max_length[255]');						$this->form_validation->set_rules('time', 'lang:time' , 'trim|required|is_natural_no_zero');						$this->form_validation->set_rules('price', 'lang:price' , 'trim|required|numeric');
			if($this->form_validation->run() == FALSE)
			{
				$data['system'] = $this->mysystem;				
				$data['partnership'] = $this->Admin_mo->getrow('partnerships',array('psid'=>$id));
				$this->load->view('headers/partnership-edit',$data);
				$this->load->view('sidemenu',$data);
				$this->load->view('topmenu',$data);
				$this->load->view('admin/partnership-edit',$data);
				$this->load->view('footers/partnership-edit');
				$this->load->view('messages',$data);
			}
			else
			{
					$update_array = array('psuid'=>$this->session->userdata('uid'), 'pstitle'=>set_value('title'), 'psduration'=>set_value('time'),  'psprice'=>set_value('price'), 'psactive'=>set_value('active'), 'pstime'=>time());
					if($this->Admin_mo->update('partnerships', $update_array, array('psid'=>$id)))
					{
						$_SESSION['time'] = time(); $_SESSION['message'] = 'success';
					}
					else
					{
						$_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong';
					}
					redirect('partnerships', 'refresh');
			}
		}
		else
		{
			$data['admessage'] = 'Not Saved';
			$_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong';
			redirect('partnerships', 'refresh');
		}
		//redirect('about', 'refresh');
		}
		else
		{
		$data['title'] = 'partnerships';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('headers/partnerships',$data);
		$this->load->view('sidemenu',$data);
		$this->load->view('topmenu',$data);
		$this->load->view('admin/messages',$data);
		$this->load->view('footers/partnerships');
		$this->load->view('messages');
		}
	}
	public function del($id)
	{
		$id = abs((int)($id));
		if(strpos($this->loginuser->privileges, ',psdelete,') !== false && in_array('PS',$this->sections))
		{
		$partnership = $this->Admin_mo->getrow('partnerships', array('psid'=>$id));
		if(!empty($partnership))
		{
			$this->Admin_mo->del('partnerships', array('psid'=>$id));
			$_SESSION['time'] = time(); $_SESSION['message'] = 'success';
			redirect('partnerships', 'refresh');
		}
		else
		{
			$data['title'] = 'partnerships';
			$data['admessage'] = 'youhavenoprivls';
			$data['system'] = $this->mysystem;
			$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
			$this->config->set_item('language', $this->loginuser->ulang);
			$this->load->view('headers/partnerships',$data);
			$this->load->view('sidemenu',$data);
			$this->load->view('topmenu',$data);
			$this->load->view('admin/messages',$data);
			$this->load->view('footers/partnerships');
			$this->load->view('messages');
		}
		}
		else
		{
		$data['title'] = 'partnerships';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('headers/partnerships',$data);
		$this->load->view('sidemenu',$data);
		$this->load->view('topmenu',$data);
		$this->load->view('admin/messages',$data);
		$this->load->view('footers/partnerships');
		$this->load->view('messages');
		}
	}
}