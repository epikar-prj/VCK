var map;
var markers = [];
var winW;
var latlng;
var mapContainer;
var change_check = "on";
var resize_check = "off";
var myposition_check;


$(window).on('load',function(){
    
    setTimeout(function() { 
        if (!$("#map").find(".info_box_wrap").length) {
            showroom_list();
        }
    }, 1000); 
	
	$('#area').change(function(){
		$('#area').css('color','#333');
	});

	$('#area').change(function (){
		change_check = "off";
		$('.info_box_wrap').hide();
		var select = $('#area').children("option:selected").val();
		if(select == '전체'){
			showroom_list();
		}else{
			get_result_list('showroom',select,select);
		};
	});

	$('#search_input').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);

		var keyword = $('#search_input').val();
		
		if(keycode == '13'){
			var search_type = 'showroom';

			if(!keyword){
				alert('검색어를 입력해주세요');
				//$('#search_input').focus();
				return false;
			}

			change_check = "off";
			var select = $('#area').children("option:selected").val();

			get_result_list(search_type,keyword,select);
			map_list_show();
			marker_info_close();

			$('#search_input').blur();
		}
		event.stopPropagation();
    });
    
    $(".showroom > li.list_btn").on('click', function(e) {
        //console.log(1234)
        if ($('.showroom li').is(":animated")) {

            e.stopPropagation();
            // e.stopImmediatePropagation();
            e.preventDefault();
        }
    })
    var varUA = navigator.userAgent.toLowerCase(); //userAgent 값 얻기
    if (varUA.indexOf("iphone")>-1||varUA.indexOf("ipad")>-1||varUA.indexOf("ipod")>-1) { 
        
        list_toggle = new Function("$('.showroom > li .list_btn').on('click',function(){ " +
                    "if ($('.showroom li').find('.list_cont').is(':animated')) { return false; }" +
                    "var result_info = $(this).parent().find('.list_cont').css('display'); " +
                    "if(result_info == 'block'){ " +
                        "$(this).parent().find('.list_cont').slideUp(function(){ " +
                            "$(this).parent().removeClass('ov'); " +
                        "}); " +
                        "marker_info_close(); " +
                    "}else if(result_info == 'none'){ " +
                        "$('.showroom li').find('.list_cont').slideUp('200'); " +
                        "$('.showroom li').removeClass('ov');" +
                        "$(this).parent().addClass('ov'); " +
                        "$(this).parent().find('.list_cont').slideDown('200'); " +
                    "} " +
                "}); list_delete(); return false;")

        list_delete = function(){
            var list_total = $('.total_num').text();
            var list_total_num = Number(list_total) - 1;
            var list_length = $('.showroom li').length;
            $('.showroom > li:gt('+list_total_num+')').hide();

        }

    }

    

});


