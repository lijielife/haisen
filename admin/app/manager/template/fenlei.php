<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL ?>css/style.css" media="all" />
<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL ?>css/content.css" media="all" /> 
<script type="text/javascript" src="<?php echo ADMIN_URL ?>js/jquery-1.7.min.js"></script>
<body>
<div class="main" style="height:auto;padding-top:1px;">
    <div class="contentbox">
<form id="form1" name="form1" method="post" action="">
<table cellspacing="2" cellpadding="5" width="100%">
    <tr>
        <th colspan="2" align="left"><?php echo $type=='edit' ? '修改' : '添加'; ?>分类</th>
    </tr>
    <tr>
        <td class="label" width="15%">分类名称:</td>
        <td width="85%">
        <input name="class_name" id="class_name"  type="text" style="width:280px;" value="<?php echo isset($rt['class_name']) ? $rt['class_name'] : '';?>">
        </td>
    </tr>
    <tr>
        <td class="label" width="15%">距离显示范围（km）:</td>
        <td width="85%">
        <input type="text" name="range" id="range" style="width:80px;" value="<?php echo isset($rt['range']) ? $rt['range'] : ''; ?>">
        距离显示范围（km）,大于此值将不显示
        </td>
    </tr>
    <tr>
        <td class="label" width="15%">分类排序:</td>
        <td width="85%">
        <input name="class_sort" id="class_sort"  type="text" style="width:80px;" value="<?php echo isset($rt['class_sort']) ? $rt['class_sort'] : '';?>">
        数值越大，排序越靠前
        </td>
    </tr>
<tr>
<td class="label"></td>
<td>
<input type="hidden" id="id" value="<?php echo isset($rt['class_id']) ? $rt['class_id'] : ""; ?>"/>
<input type="submit" id="submit" value=" <?php echo $type=='edit' ? '修改' : '添加'; ?> ">
</td>
</tr>

</table>
</form>
</div>
</div>
<?php  $thisurl = ADMIN_URL.'manager.php'; ?>
<script type="text/javascript">
    $('#submit').click(function(){
        class_name = $('#class_name').val();
        id = $('#id').val();
        range = $('#range').val();
        class_sort = $('#class_sort').val();
        if ( class_name == "" )
        {
            alert("请输入完整信息！");
            return false;
        }
        var post_data = {
            action: 'addfen',
            class_name: class_name,
            range: range,
            class_sort: class_sort,
            id: id
        }
        $.post( '<?php echo $thisurl;?>', post_data, function( data ) { 
            if ( ! data )
            {
                alert("<?php echo $type=='edit' ? '修改' : '添加';?>成功！");
                location.reload();
            }
            else
            {
                alert("<?php echo $type=='edit' ? '修改' : '添加';?>失败！");
                location.reload();
            }
        },'json');
        return false;
    });
    
//});
</script>


</body>

