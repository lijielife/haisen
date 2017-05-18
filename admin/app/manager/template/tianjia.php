<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL ?>css/style.css" media="all" />
<link type="text/css" rel="stylesheet" href="<?php echo ADMIN_URL ?>css/content.css" media="all" /> 
<script type="text/javascript" src="<?php echo ADMIN_URL ?>js/Area.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_URL ?>js/AreaData_min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_URL ?>js/jquery-1.7.min.js"></script>
<script charset="utf-8" src="http://map.qq.com/api/js?v=1"></script>
<script type="text/javascript">
$(function (){
    initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '32', '0', '0');
});


//得到地区码
function getAreaID(){
    var area = 0;          
    if($("#seachdistrict").val() != "0"){
        area = $("#seachdistrict").val();                
    }else if ($("#seachcity").val() != "0"){
        area = $("#seachcity").val();
    }else{
        area = $("#seachprov").val();
    }
    return area;
}


//根据地区码查询地区名
function getAreaNamebyID(areaID){
    var areaName = "";
    if(areaID.length == 2){
        areaName = area_array[areaID];
        $("#province").val(area_array[areaID]);
    }else if(areaID.length == 4){
        var index1 = areaID.substring(0, 2);
        areaName = area_array[index1] + " " + sub_array[index1][areaID];
        $("#province").val(area_array[index1]);
        $("#city").val(sub_array[index1][areaID]);
    }else if(areaID.length == 6){
        var index1 = areaID.substring(0, 2);
        var index2 = areaID.substring(0, 4);
        areaName = area_array[index1] + " " + sub_array[index1][index2] + " " + sub_arr[index2][areaID];
        $("#province").val(area_array[index1]);
        $("#city").val(sub_array[index1][index2]);
        $("#district").val(sub_arr[index2][areaID]);
    }
    return areaName;
}

var geocoder,map,marker = null;
var init = function() {
    var center = new soso.maps.LatLng(<?php echo isset($rt['latitude']) ? $rt['latitude'] : '31.675396';?>,<?php echo isset($rt['longitude']) ? $rt['longitude'] : '120.737695';?>);
    map = new soso.maps.Map(document.getElementById('container'),{
        center: center,
        zoomLevel: 15
    });
    geocoder = new soso.maps.Geocoder();
    var label;
    map.setCursor("default");
    soso.maps.Event.addListener(map,"mousedown",function(){
        map.setCursor("default");
    });
    //绑定点击事件
    soso.maps.Event.addListener(map,"click",function(){
      $("#longitude").val($("#longitude1").val());
      $("#latitude").val($("#latitude1").val());
    });
    //给map绑定mousemove事件
    soso.maps.Event.addListener(map,"mousemove",function(e){
        var gl=e.latLng;
        if(!label){
            label=new soso.maps.Label({
                map:map,
                position:gl
            });
        }else{
            label.setContent(
                gl.getLat().toFixed(6)+","+gl.getLng().toFixed(6)
                
            )
                
        }
        setLabelPoi(label,gl);
    });
    soso.maps.Event.addListener(map,"mouseout",function(e){
        label&&label.setMap(null);
    });
    function setLabelPoi(lab,latlng){
        lab.setMap(map);
        //根据地理坐标获取相对地图容器的像素坐标。
        var point=map.fromLatLngToContainerPixel(latlng);
        var pointN=new soso.maps.Point(
            point.getX()+15,
            point.getY()+30
        );
        //根据相对地图容器的像素坐标获取地理坐标。
        var gl=map.fromContainerPixelToLatLng(pointN);
        lab.setPosition(gl);
        lab.setContent(
            latlng.getLat().toFixed(6)+","+latlng.getLng().toFixed(6)
        );
        $("#longitude1").val(latlng.getLng().toFixed(6));
        $("#latitude1").val(latlng.getLat().toFixed(6));
        
    };
}

function codeAddress() {
    var address = getAreaNamebyID(getAreaID())+$("#address").val();
    
    geocoder.geocode({'address': address}, function(results, status) {
        if (status == soso.maps.GeocoderStatus.OK) {
            map.setCenter(results.location);
            if (marker != null) {
                marker.setMap(null);
            }
            marker = new soso.maps.Marker({
                map: map,
                position:results.location
            });
        } else {
            alert("检索没有结果，原因: " + status);
        }
    });
}

</script>

<body onLoad="init()">
<div class="main" style="height:auto;padding-top:1px;">
    <div class="contentbox">
    
<form id="form1" name="form1" method="post" action="">
<input type="hidden" id="longitude1"/>
<input type="hidden" id="latitude1"/>
<table cellspacing="2" cellpadding="5" width="100%">
     <tr>
        <th colspan="2" align="left"><?php echo $type=='edit' ? '修改' : '添加';?>店铺</th>
    </tr>
<!--       <tr > 
    <td class="label">店铺logo</td>
    <td>
     <input name="store_pic" id="store_pic" type="hidden" value="<?php echo isset($rt['store_pic']) ? $rt['store_pic'] : '';?>"/>
        <iframe id="iframe_t" name="iframe_t" border="0" src="upload.php?action=<?php echo isset($rt['store_pic'])&&!empty($rt['store_pic'])? 'show' : '';?>&ty=store_pic&files=<?php echo isset($rt['store_pic']) ? $rt['store_pic'] : '';?>" scrolling="no" width="445" frameborder="0" height="25"></iframe>
    </td>
    </tr>  -->  
    <tr>
        <td class="label" width="15%">店铺名称:</td>
        <td width="85%">
            <input name="store_name" id="store_name"  type="text" style="width:280px;" value="<?php echo isset($rt['store_name']) ? $rt['store_name'] : '';?>">
        </td>
    </tr>
    <tr>
        <td class="label" width="15%">账号:</td>
        <td width="85%">
            <input name="username" id="username"  type="text" style="width:280px;" value="<?php echo isset($rt['username']) ? $rt['username'] : '';?>">
        </td>
    </tr>
    <tr>
        <td class="label" width="15%">密码:</td>
        <td width="85%">
            <input name="password" id="password"  type="password" style="width:280px;" value=""> <?php if( $type == 'edit' ) echo '空代表不修改密码';?>
        </td>
    </tr>
      <tr>
        <td  class="label">店铺电话:</td>
        <td><input name="phone" id="phone" value="<?php echo isset($rt['phone']) ? $rt['phone'] : '';?>" type="text" style="width:280px;" onkeyup='this.value=this.value.replace(/\D/gi,"")'></td>
  </tr>    
<tr style="display:none">
          <td height="30" align="right" bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">地址：</td>
          <td bgcolor="#FFFFFF" style=" border-bottom:1px #CCCCCC dashed">
         <select id="seachprov"  onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>&nbsp;&nbsp;
        <select id="seachcity"  onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;
        <span id="seachdistrict_div">
            <select id="seachdistrict"></select>
        </span>
            <input id="province" type="hidden" name="province">
            <input id="city" type="hidden" name="city">
            <input id="district" type="hidden" name="district"> 
         </td>
        </tr>
        <tr>
          <td class="label">店铺状态：</td>
          <td>
          <input name="status" type="text" id="status" value="<?php echo isset($rt['status']) ? $rt['status'] : '';?>"/>1为开启，2为关闭
         </td>
        </tr>
        <tr>
          <td class="label">所属分类：</td>
          <td>
          <select name="class_id" id="class_id">

          <?php foreach ($rt_fen as $key => $value): ?>
              <option value="<?php echo $value['class_id'];?>" <?php if( $rt['class_id'] == $value['class_id'] ) echo "selected";?>  ><?php echo $value['class_name'];?></option>
          <?php endforeach ?>
          </select>
         </td>
        </tr>
        <tr>
          <td class="label">所属钱包：</td>
          <td>
          <select name="wallet_id" id="wallet_id">
          <?php foreach ($rts_wallet as $key => $value): ?>
              <option value="<?php echo $value['wallet_id'];?>" <?php if( $rt['wallet_id'] == $value['wallet_id'] ) echo "selected";?>  ><?php echo $value['wallet_name'];?></option>
          <?php endforeach ?>
          </select>
         </td>
        </tr>
        <tr>
            <td class="label">店铺详细地址：</td>
            <td>
            <input name="address" id="address" value="<?php echo isset($rt['address']) ? $rt['address'] : '';?>" style="width:280px;" type="text" />&nbsp;&nbsp;<input type="button" onClick="codeAddress()" value="定位"/>
             </td>
        </tr>
        <tr>
          <td class="label" height="30" >经度：</td>
          <td>
          <input name="longitude" type="text" id="longitude" value="<?php echo isset($rt['longitude']) ? $rt['longitude'] : '';?>" readonly="readonly"/>（点击地图定位经度）
         </td>
        </tr>
        <tr>
          <td class="label">纬度：</td>
          <td>
          <input name="latitude" type="text" id="latitude" value="<?php echo isset($rt['latitude']) ? $rt['latitude'] : '';?>" readonly="readonly"/>（点击地图定位纬度）
         </td>
        </tr>
        <tr>
          <td class="label">位置：</td>
          <td >
          <div id="container" style="width:500px; height:400px"></div>
         </td>
        </tr>
  <tr><td class="label" ></td><td>
<input  type="hidden" id="store_id" value="<?php echo isset($rt['store_id']) ? $rt['store_id'] : "";?>"/>
<input  type="submit" id="submit" value=" <?php echo $type=='edit' ? '修改' : '添加';?> "></td></tr>
</table>
</form>
</div>
</div>


<?php  $thisurl = ADMIN_URL.'manager.php'; ?>
<script type="text/javascript">
    $('#submit').click(function(){
        //store_pic  = $('#store_pic').val();
        store_name = $('#store_name').val();
        username   = $('#username').val();
        password   = $('#password').val();
        phone      = $('#phone').val();
        status     = $('#status').val();
        class_id   = $('#class_id').val();
        wallet_id  = $('#wallet_id').val();
        address    = $('#address').val();
        longitude  = $('#longitude').val();
        latitude   = $('#latitude').val();
        store_id   = $('#store_id').val();
        if(store_name == "" || username =="" || phone ==""|| status ==""|| class_id == "" || wallet_id ==""|| address ==""|| longitude ==""|| latitude ==""){
            alert("请输入完整信息！");
           return false;
        }
        if(longitude == "" || latitude =="" ){
            alert("请点击地图定位经维度！");
           return false;
        }
        $.post('<?php echo $thisurl;?>',{action:'adddp',store_name:store_name,username:username,password:password,phone:phone,status:status,class_id:class_id,wallet_id:wallet_id,address:address,longitude:longitude,latitude:latitude,store_id:store_id},function(data){ 
            if(!data){
              alert("<?php echo $type=='edit' ? '修改' : '添加';?>成功！");
              location.reload();
            }else{
              alert("<?php echo $type=='edit' ? '修改' : '添加';?>失败！");
              location.reload();
            }
        },'json');
        return false;
    });
    
//});
</script>


</body>

