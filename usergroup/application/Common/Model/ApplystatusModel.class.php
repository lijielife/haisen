<?php
namespace Common\Model;
use Common\Model\CommonModel;
class ApplystatusModel extends CommonModel
{
	protected $_validate = array(
			array('name', 'require', '学生姓名不能为空！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('teacher', 'require', '负责老师不能为空！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('teamleader', 'require', '请选择TeamLeader！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('applycountry', 'require', '申请国家不能为空！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('applytype', 'require', '请选择申请类型！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('school', 'require', '院校不能为空！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('course', 'require', '课程不能为空！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('psstatus', 'require', '请选择ps状态！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('recommendstatus', 'require', '请选择推荐信状态', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('essaystatus', 'require', '请选择Essay状态！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('highschoolscore', 'require', '请选择高中平日成绩！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('alevelscore', 'require', '请选择Alevel成绩！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('alevelbook', 'require', '请选择Alevel证书！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('lanscore', 'require', '请选择语言成绩！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('applystatus', 'require', '请选择申请状态！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
			array('visadata', 'require', '请选择签证资料！', 1, 'regex', CommonModel:: MODEL_BOTH  ),
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

