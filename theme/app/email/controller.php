<?php
class EmailController extends Controller{
 	function  __construct() {
          
	}
	
   function send_register($rt=array()){
   				$datanew['name'] = '亲爱的'.$rt['user_name'];
				$datanew['email'] = $rt['email'];
				$datanew['subject'] = '用户注册成功,请激活账户！';
				$this->set('rt',$rt);
				$datanew['content'] = $this->fetch('email_tpl/register',true);
				$datanew['type'] = 1;
				$datanew['notification'] = false;
				if(Import::basic()->ecshop_sendemail($datanew)){
				
				}else{
					//Import::error()
				}
				unset($datanew);
   }
   
   function edit_password($rt=array()){
   				$datanew['name'] = '亲爱的'.$rt['user_name'];
				$datanew['email'] = $rt['email'];
				$datanew['subject'] = '密码已经修改成功！';
				$this->set('rt',$rt);
				$datanew['content'] = $this->fetch('email_tpl/edit_password',true);
				$datanew['type'] = 1;
				$datanew['notification'] = false;
				Import::basic()->ecshop_sendemail($datanew);
				unset($datanew);
   }
   
   function find_password($rt=array()){
   				$datanew['name'] = '亲爱的'.$rt['user_name'];
				$datanew['email'] = $rt['email'];
				$datanew['subject'] = '密码找回，请查收！';
				$this->set('rt',$rt);
				$datanew['content'] = $this->fetch('email_tpl/find_password',true);
				$datanew['type'] = 1;
				$datanew['notification'] = false;
				Import::basic()->ecshop_sendemail($datanew);
				unset($datanew);
   }
   
}
?>