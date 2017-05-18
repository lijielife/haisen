<?php
namespace Common\Model;
use Common\Model\CommonModel;
class FinanceModel extends CommonModel
{
	protected $_validate = array(
			array('name', 'require', '学生姓名不能为空！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('applycountry', 'require', '申请国家不能为空！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('payment', 'require', '缴费不能为空！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
	);
	protected $_auto = array(
	    array('addtime','mGetDate',CommonModel:: MODEL_INSERT,'callback'),
	    array('userid','mGetUserid',CommonModel::MODEL_INSERT,'callback')
	);
	//用于获取用户id
	function mGetUserid() {
		return $_SESSION['ADMIN_ID'];
	}
	//用于获取时间，格式为2012-02-03 12:12:12,注意,方法不能为private
	function mGetDate() {
		return time();
	}
	protected function _before_write(&$data) {
		parent::_before_write($data);
	}
}

