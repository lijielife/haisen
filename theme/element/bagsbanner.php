<?php
$rt = $this->action("bags","_getads",$cid);
if(!empty($rt)){
$i=0;
$str = "";
$ps = array();
$ls = array();
$ts = array();
//foreach($rt as $row){
if(!empty($rt[cat_img])){
	$str .= 'imgUrl0= "'.SITE_URL.$rt[cat_img].'";'."\n";
	$str .= 'imgtext0="'.$rt[cat_url].'";'."\n";
	if(empty($rt[cat_url])) $rt[cat_url] = "http://";
	$str .= 'imgLink0=escape("'.$rt[cat_url].'");'."\n";
	$ps[] = 'imgUrl0';
	$ls[] = 'imgtext0';
	$ts[] = 'imgLink0';
}

if(!empty($rt[cat_img2])){
	$str .= 'imgUrl1= "'.SITE_URL.$rt[cat_img2].'";'."\n";
	$str .= 'imgtext1="'.$rt[cat_url].'";'."\n";
	if(empty($rt[cat_url])) $rt[cat_url] = "http://";
	$str .= 'imgLink1=escape("'.$rt[cat_url].'");'."\n";
	$ps[] = 'imgUrl1';
	$ls[] = 'imgtext1';
	$ts[] = 'imgLink1';
}

//}

$str .= "\nvar pics=".implode('+"|"+',$ps)."\n";
$str .= "var links=".implode('+"|"+',$ls)."\n";
$str .= "var texts=".implode('+"|"+',$ts)."\n";

	$fn = SYS_PATH.'data'.DS.'flashdata2'.DS.'dynfocus'.DS.'data.js';
	$cache = Import::ajincache();
	$cache->SetFunction("banner");
	$cache->SetMode('ads');
	if(file_exists($fn)&&!$cache->GetClose()){
		//include($fn);
	}
	else
	{
		if(is_writable($fn)){
			file_put_contents($fn,$str);
		}else{
			die("警告：请将文件".$fn."修改为可写！");
		}
	}
}
?>
<script type="text/javascript">
var swf_width=300;
var swf_height=614;
</script>
<script type="text/javascript" src="<?php echo SITE_URL;?>data/flashdata2/dynfocus/cycle_image.js"></script>