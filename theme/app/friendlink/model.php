<?php
class FriendlinkModel extends Model{
     var $validate = array(
        'comicname' =>'noempty',
        'rolename'  =>'noempty',
        'email'     =>array('noempty', 'email'),
     );
} 
?>