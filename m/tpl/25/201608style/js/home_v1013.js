$(function(){
    TouchSlide({
        slideCell:"#focus",
        titCell:".hd_img ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell:".bd_img ul",
        effect:"leftLoop",
        autoPage:true,//自动分页
        autoPlay:true //自动播放
    });
    //最底部是否出现一键到最上功能
    $(window).scroll(function(){
        if($(document).scrollTop()>50){
            $(".btntop").css("display","block");
        }else{
            $(".btntop").css("display","none");
        }
    });
    //一键到最上
    $(".btntop").click(function(){
        $("body,html").animate({scrollTop:0})
    });
    //单击选择项，然后自动执行
    //$(".search_keywords").click();
    function search_keyword(){
        var keywords=$(this).text();
        $(".search .sea").val(keywords);
        $(".back").trigger("click");//正式直接调搜索
        location.href='/search/?s_words='+keywords.toString();

    }
    //清除清除记录
    $(".ul-btn").click(function(){
        $(".searchBox .list ul").load("/home/getSearch/",{is_clear:1},function(){$(".search_keywords").live('click',search_keyword)});
    });
    //单击搜索图标按钮
    $(".btn").click(function(){
        var keywords=$(".search .sea").val();
        if(keywords == null || keywords == undefined || keywords == '')
        {
            jAlert('请输入搜索关键字');
            return false;
        }
        location.href='/search/?s_words='+keywords.toString();

    });
    //单击文本框，打开搜索下拉框
    $(".search .sea").click(function(){
        $(".searchBox").slideDown();
        $("a.logo").hide();
        if($("#showBack").val()==1){
            $(".back").show();
        }
        $(".search").css("width","85%");
    });

    //返回并折叠搜索下拉框
    $(".back").click(function(){
        $(".searchBox").slideUp();
        $("a.logo").show();
        $(".back").hide();
        $(".search").css("width","55%");
    });
    $(".searchBox .list ul").load("/home/getSearch/",function(){$(".search_keywords").live('click',search_keyword)});
    $(".submenu li:last").css({"border-right":"0","margin-right":"0","padding-right":"0"});

    //当搜索输入框失去焦点时执行
    $(".search .sea").blur(function(){
        $(".searchBox").slideUp();
        $("a.logo").show();
        $(".back").hide();
        $(".search").css("width","55%");
    })
})

