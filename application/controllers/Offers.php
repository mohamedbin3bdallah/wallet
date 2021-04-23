<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

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
	    if(!$this->session->userdata('sid'))
	    { 
			redirect('service');
	    }
		else
		{
			$this->loginuser = $this->Admin_mo->getrowjoinLeftLimit('users.*,usertypes.utprivileges as privileges,langs.lndir as dir','users',array('usertypes'=>'users.uutid=usertypes.utid','langs'=>'users.ulang=langs.lncode'),array('users.uid'=>$this->session->userdata('sid')),'');						$this->item = $this->Admin_mo->getrow('items',array('ieid'=>$this->session->userdata('sid'), 'iactive'=>'1'));
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
		if(strpos($this->loginuser->privileges, ',ofsee,') !== false && in_array('OF',$this->sections))
		{
		$data['title'] = 'offers';				$data['col_num'] = 6;
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$employees = $this->Admin_mo->get('users'); foreach($employees as $employee) { $data['employees'][$employee->uid] = $employee->username; }
		$data['offers'] = $this->Admin_mo->getwhere('offers',array('ofiid'=>$this->item->iid));
		$this->load->view('calenderdate');
		//$data['users'] = $this->Admin_mo->rate('*','users',' where id <> 1');
		$this->load->view('service/header',$data);
		$this->load->view('service/sidemenu',$data);
		$this->load->view('service/topmenu',$data);
		$this->load->view('service/offers',$data);
		$this->load->view('service/footer',$data);
		$this->load->view('messages');
		}
		else
		{
		$data['title'] = 'slides';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('service/header',$data);
		$this->load->view('service/sidemenu',$data);
		$this->load->view('service/topmenu',$data);
		$this->load->view('service/messages',$data);
		$this->load->view('service/footer');
		$this->load->view('messages');
		}
	}

	public function add()
	{
		if(strpos($this->loginuser->privileges, ',ofadd,') !== false && in_array('OF',$this->sections))
		{
		$data['title'] = 'add_offer';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		//$data['users'] = $this->Admin_mo->get('users');
		$this->load->view('service/header-add',$data);
		$this->load->view('service/sidemenu',$data);
		$this->load->view('service/topmenu',$data);
		$this->load->view('service/offer-add',$data);
		$this->load->view('service/footer-add');
		$this->load->view('messages');
		}
		else
		{
		$data['title'] = 'add_offer';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('service/header',$data);
		$this->load->view('service/sidemenu',$data);
		$this->load->view('service/topmenu',$data);
		$this->load->view('service/messages',$data);
		$this->load->view('service/footer');
		$this->load->view('messages');
		}
	}
	
	public function create()
	{
		if(strpos($this->loginuser->privileges, ',ofadd,') !== false && in_array('OF',$this->sections))
		{
		    $this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>', '</div>');
		$this->form_validation->set_rules('title', 'lang:title' , 'trim|required|max_length[255]');
		$this->form_validation->set_rules('desc', 'lang:desc' , 'trim');					$this->form_validation->set_rules('time', 'lang:time' , 'trim|required|is_natural_no_zero');					$this->form_validation->set_rules('price', 'lang:price' , 'trim|required|numeric');
		$this->form_validation->set_rules('file', 'lang:image' , 'callback_imageSize|callback_imageType');
		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'add_offer';
			//$_SESSION['time'] = time(); $_SESSION['message'] = 'inputnotcorrect';
			$data['system'] = $this->mysystem;
			$this->load->view('service/header-add',$data);
			$this->load->view('service/sidemenu',$data);
			$this->load->view('service/topmenu',$data);
			$this->load->view('service/offer-add',$data);
			$this->load->view('service/footer-add');
			$this->load->view('messages');
		}
		else
		{
			$set_arr = array('ofuid'=>$this->session->userdata('sid'), 'ofiid'=>$this->item->iid, 'oftitle'=>set_value('title'), 'ofdesc'=>set_value('desc'), 'offulltime'=>set_value('time'), 'offrom'=>time(), 'ofto'=>(time()+(set_value('time')*86400)), 'ofprice'=>set_value('price'), 'ofactive'=>set_value('active'), 'oftime'=>time());
			if(isset($_FILES['file']['error']) && $_FILES['file']['error'] == 0)
			{
				//$newname = mt_rand();
				$file = $this->uploadimg('file',$this->config->item('offers_folder'),$this->config->item('offers_thumb_folder'), mt_rand());
				if($file)
				{
					$set_arr['ofimg'] = $file;
					$ofid = $this->Admin_mo->set('offers', $set_arr);
					if(empty($ofid))
					{
						$_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong';
						redirect('offers/add', 'refresh');
					}
					else
					{
						$_SESSION['time'] = time(); $_SESSION['message'] = 'success';
						redirect('offers', 'refresh');
					}
				}
				else
				{
					$_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong';
					redirect('offers/add', 'refresh');
				}
			}
			else
			{
				$_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong';
				redirect('offers/add', 'refresh');
			}		
		}
		//redirect('offers/add', 'refresh');
		}
		else
		{
		$data['title'] = 'add_offer';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('service/header',$data);
		$this->load->view('service/sidemenu',$data);
		$this->load->view('service/topmenu',$data);
		$this->load->view('service/messages',$data);
		$this->load->view('service/footer');
		$this->load->view('messages');
		}
	}
	
	public function edit($id)
	{
		if(strpos($this->loginuser->privileges, ',ofedit,') !== false && in_array('OF',$this->sections))
		{
		$id = abs((int)($id));
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$data['offer'] = $this->Admin_mo->getrow('offers',array('ofid'=>$id));
		if(!empty($data['offer']))
		{			$data['title'] = 'edit_offer';
			$this->load->view('service/header-edit',$data);
			$this->load->view('service/sidemenu',$data);
			$this->load->view('service/topmenu',$data);
			$this->load->view('service/offer-edit',$data);
			$this->load->view('service/footer-edit');
			$this->load->view('messages');
		}
		else
		{
			$data['title'] = 'edit_offer';
			$data['admessage'] = 'youhavenoprivls';
			$this->load->view('service/header',$data);
			$this->load->view('service/sidemenu',$data);
			$this->load->view('service/topmenu',$data);
			$this->load->view('service/messages',$data);
			$this->load->view('service/footer');
			$this->load->view('messages');
		}
		}
		else
		{
		$data['title'] = 'edit_offer';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('service/header',$data);
		$this->load->view('service/sidemenu',$data);
		$this->load->view('service/topmenu',$data);
		$this->load->view('service/messages',$data);
		$this->load->view('service/footer');
		$this->load->view('messages');
		}
	}
	
	public function editoffer($id)
	{
		if(strpos($this->loginuser->privileges, ',ofedit,') !== false && in_array('OF',$this->sections))
		{
		$id = abs((int)($id));
		if($id != '')
		{
		    $this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
			$this->config->set_item('language', $this->loginuser->ulang);
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>', '</div>');
			$this->form_validation->set_rules('title', 'lang:title' , 'trim|required|max_length[255]');			$this->form_validation->set_rules('desc', 'lang:desc' , 'trim');						$this->form_validation->set_rules('time', 'lang:time' , 'trim|required|is_natural_no_zero');						$this->form_validation->set_rules('price', 'lang:price' , 'trim|required|numeric');
			if(isset($_FILES['file']['error']) && $_FILES['file']['error'] == 0) $this->form_validation->set_rules('file', 'lang:image' , 'callback_imageSize|callback_imageType');
			if($this->form_validation->run() == FALSE)
			{				$data['title'] = 'edit_offer';
				$data['system'] = $this->mysystem;
				$data['offer'] = $this->Admin_mo->getrow('offers',array('ofid'=>$id));
				$this->load->view('service/header-edit',$data);
				$this->load->view('service/sidemenu',$data);
				$this->load->view('service/topmenu',$data);
				$this->load->view('service/offer-edit',$data);
				$this->load->view('service/footer-edit');
				$this->load->view('messages');
			}
			else
			{
				$update_array = array('ofuid'=>$this->session->userdata('sid'), 'ofiid'=>$this->item->iid, 'oftitle'=>set_value('title'), 'ofdesc'=>set_value('desc'), 'offulltime'=>set_value('time'), 'offrom'=>time(), 'ofto'=>(time()+(set_value('time')*86400)), 'ofprice'=>set_value('price'), 'ofactive'=>set_value('active'), 'oftime'=>time());
				if(isset($_FILES['file']['error']) && $_FILES['file']['error'] == 0)
				{
					//$newname = mt_rand();
					$file = $this->uploadimg('file',$this->config->item('offers_folder'),$this->config->item('offers_thumb_folder'), mt_rand());
					if($file)
					{
						if(set_value('oldimg') != '' && file_exists($this->config->item('offers_folder').set_value('oldimg'))) unlink($this->config->item('offers_folder').set_value('oldimg'));
						if(set_value('oldimg') != '' && file_exists($this->config->item('offers_thumb_folder').set_value('oldimg'))) unlink($this->config->item('offers_thumb_folder').set_value('oldimg'));
						$update_array['ofimg'] = $file;
					}
				}
				if($this->Admin_mo->update('offers', $update_array, array('ofid'=>$id)))
				{
					$_SESSION['time'] = time(); $_SESSION['message'] = 'success';
				}
				else
				{
					$_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong';
				}
				redirect('offers', 'refresh');
			}
		}
		else
		{
			$data['admessage'] = 'Not Saved';
			$_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong';
			redirect('offers', 'refresh');
		}
		//redirect('offers', 'refresh');
		}
		else
		{
		$data['title'] = 'edit_offer';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('service/header',$data);
		$this->load->view('service/sidemenu',$data);
		$this->load->view('service/topmenu',$data);
		$this->load->view('service/messages',$data);
		$this->load->view('service/footers');
		$this->load->view('messages');
		}
	}

	public function del($id)
	{
		$id = abs((int)($id));
		if(strpos($this->loginuser->privileges, ',ofdelete,') !== false && in_array('OF',$this->sections))
		{
		$offer = $this->Admin_mo->getrow('offers', array('ofid'=>$id));
		if(!empty($offer))
		{
			$this->Admin_mo->del('offers', array('ofid'=>$id));
			if($offer->ofimg != '' && file_exists($this->config->item('offers_folder').$offer->ofimg)) unlink($this->config->item('offers_folder').$offer->ofimg);
			if(file_exists($this->config->item('offers_thumb_folder').$offer->ofimg)) unlink($this->config->item('offers_thumb_folder').$offer->ofimg);
			$_SESSION['time'] = time(); $_SESSION['message'] = 'success';
			redirect('offers', 'refresh');
		}
		else
		{
			$data['title'] = 'offers';
			$data['admessage'] = 'youhavenoprivls';
			$data['system'] = $this->mysystem;
			$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
			$this->config->set_item('language', $this->loginuser->ulang);
			$this->load->view('service/header',$data);
			$this->load->view('service/sidemenu',$data);
			$this->load->view('service/topmenu',$data);
			$this->load->view('service/messages',$data);
			$this->load->view('service/footer');
			$this->load->view('messages');
		}
		}
		else
		{
		$data['title'] = 'offers';
		$data['admessage'] = 'youhavenoprivls';
		$data['system'] = $this->mysystem;
		$this->lang->load($this->loginuser->ulang, $this->loginuser->ulang);
		$this->config->set_item('language', $this->loginuser->ulang);
		$this->load->view('service/header',$data);
		$this->load->view('service/sidemenu',$data);
		$this->load->view('service/topmenu',$data);
		$this->load->view('service/messages',$data);
		$this->load->view('service/footer');
		$this->load->view('messages');
		}
	}
	
	public function imageSize()
	{
		if ($_FILES['file']['size'] > 1024000)
		{
			//$this->form_validation->set_message('imageSize', 'يجب ان يكون حجم الصورة 1 ميجا او اقل');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	public function imageType()
	{
		if (!in_array(strtoupper(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)),array('JPG','JPEG','PNG','JIF','BMP','TIF')))
		{
			//$this->form_validation->set_message('imageType', 'يجب ان يكون نوع الملف المرفوع واحد من هذه الانواع : JPG,JPEG,PIG,JIF,BMP,TIF');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function uploadimg($inputfilename,$image_director,$image_director_thumb,$newname)
	{
		$file_extn = pathinfo($_FILES[$inputfilename]['name'], PATHINFO_EXTENSION);
		if(!is_dir($image_director)) $create_image_director = mkdir($image_director);
		$name = $newname.'.'.$file_extn;
		if(move_uploaded_file($_FILES[$inputfilename]["tmp_name"], $image_director.$name))
		{
			if($image_director_thumb != '')
			{
				$this->load->library('Resize');
				$this->resize->construct($image_director.$name);
				$this->resize->resizeImage(210, 210, 'exact');
				$this->resize->saveImage($image_director_thumb.$name, 100);
			}
			return $name;
		}
		else return 0;
	}
}