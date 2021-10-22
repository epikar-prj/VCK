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
            service_list();
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
			service_list();
		}else{
			get_result_list('service',select,select);
		};
	});


	$('#search_input').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);

		var keyword = $('#search_input').val();
		
		if(keycode == '13'){
			var search_type = 'service';

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


var varUA = navigator.userAgent.toLowerCase(); //userAgent 값 얻기
 
 
if (varUA.indexOf("iphone")>-1||varUA.indexOf("ipad")>-1||varUA.indexOf("ipod")>-1) { 
	var list_toggle_new = list_toggle;

}


$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}

var mode = $.urlParam("mode");
console.log(mode);

if (mode == "list") {
    map_list_show();
}

});




