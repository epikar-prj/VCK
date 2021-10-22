//태그 전부 제거(웹 에디터)
function fRemoveHtmlTag(string){
	var objReplace = new RegExp();
	objReplace = /[<][^>]*[>]/gi;
	string = string.replace(/\r\n/ig, "");
	string = string.replace(/&nbsp;/ig, "");
	return string.replace(objReplace, "");
}

// 공백제거
function trim(txt) {
	while (txt.indexOf(' ') >= 0) {
		txt = txt.replace(' ','');
	}
	return txt;
}

// 숫자만 입력(ie 8 이하에만 적용됨)
function onlyNumber(){
	if (event.keyCode >= 48 && event.keyCode <= 57){
		event.returnValue = true;
	}else{
		event.returnValue = false;
	}
}
// 숫자만 입력
function onlyNumber2(obj){
	val=obj.value;
	obj.value=val.replace(/[^0-9]/gi, "");
}

// 숫자만 입력했는지 체크
function isCorrectNum(s_val) {
	var inNum = false;

	//var num_check = /[^0-9]/gi;
	var num_check = /^\d{1,5}$/;
	if(num_check.test(s_val)){
		inNum = true;
	}

	return inNum;
}
function isCorrectNum2(s_val) {
	var inNum = false;

	//var num_check = /[^0-9]/gi;
	var num_check = /^\d{1,11}$/;
	if(num_check.test(s_val)){
		inNum = true;
	}

	return inNum;
}

// 전화번호 형식으로 입력했는지 체크
function isCorrectTel(s_val) {
	var inTel = false;

	var tel_check = /^\d{2,4}-\d{3,4}-\d{4}$/;
	if(tel_check.test(s_val)){
		inTel = true;
	}

	return inTel;
}

// 핸드폰 형식으로 입력했는지 체크
function isCorrectHp(s_val) {
	var inHp = false;

	var hp_check = /^\d{3}-\d{3,4}-\d{4}$/;
	if(hp_check.test(s_val)){
		inHp = true;
	}

	return inHp;
}

// 이메일 형식으로 입력했는지 체크
function isCorrectEmail(s_val) {
	var inEmail = false;

	var email_check = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
	if(email_check.test(s_val)){
		inEmail = true;
	}

	return inEmail;
}

// 날짜 형식으로 입력했는지 체크(숫자, 특수문자(하이픈(-)) 입력가능)
function isCorrectDate(s_val) {
	var inDate = false;

	// 0000-00-00 형식으로 입력했는지 확인
	var date_check = /\d{4}-\d{2}-\d{2}/;
	if(date_check.test(s_val)){
		inDate = true;
	}

	return inDate;
}

// 날짜에 하이픈(-) 자동으로 붙이기
function Add_HyphenDate(name, val){
	var valDate
	var str = val.replace(/-/gi, "");
	str = str.replace(/ /gi, "");

	if(val.length >= 8){
		valDate = str.substr(0,4)+"-"+str.substr(4,2)+"-"+str.substr(6,val.length-6);
		eval("document.getElementById('"+name+"').value = valDate;");
	}/*else if(val.length > 0 && val.length < 8){
		alert("날짜를 숫자 8자리(예: 20150101)로 입력해주세요.");
	}*/
}

// 아이디 규칙 체크(운영자관리, 뉴스게시에서 사용함)
function Action_CheckId(s_id) {
	var inRange = false;
	var inNum = false;
	var inSChar = false;
	var inEng = true;


	// 4자리 이상 20자 이하 확인
	if((s_id.length >= 4) && (s_id.length <= 20)) {
		inRange = true;
	}
/*
	// 숫자 포함 여부 확인
	for(i=0; i<s_id.length; i++) {
		if((s_id.charCodeAt(i) >= 48) && (s_id.charCodeAt(i) <= 57)) {
			inNum = true;
			break;
		}
	}

	// 특수문자 포함 여부 확인
	for(i=0; i<s_id.length; i++) {
		if(((s_id.charCodeAt(i) >= 33) && (s_id.charCodeAt(i)<=47)) || ((s_id.charCodeAt(i) >= 58) && (s_id.charCodeAt(i)<=64)) || ((s_id.charCodeAt(i) >= 91) && (s_id.charCodeAt(i)<=96))) {
			inSChar = true;
			break;
		}
	}
*/

	// 영문자 포함 여부 확인
	for(i=0; i<s_id.length; i++) {
		if(((s_id.charCodeAt(i) >= 65) && (s_id.charCodeAt(i)<=90)) || ((s_id.charCodeAt(i) >= 97) && (s_id.charCodeAt(i)<=122))) {
			//inEng = true;
			//break;
		}else{
			inEng = false;
			break;
		}
	}


//	return (inRange&&inNum&&inSChar);
//	return (inRange&&(!inSChar));
	return (inRange&&inEng);
}

// 비밀번호 규칙 체크
function Action_CheckPw(s_pw) {
	var inNum = false;
	var inEng = false;
	var inSChar = false;
	var inRange = false;

	// 6자리 이상 20자 이하 확인
	if((s_pw.length >= 6) && (s_pw.length <= 20)) {
		inRange = true;
	}

	// 숫자 포함 여부 확인
	for(i=0; i<s_pw.length; i++) {
		if((s_pw.charCodeAt(i) >= 48) && (s_pw.charCodeAt(i)<=57)) {
			inNum = true;
			break;
		}
	}

	// 영문자 포함 여부 확인
	for(i=0; i<s_pw.length; i++) {
		if(((s_pw.charCodeAt(i) >= 65) && (s_pw.charCodeAt(i)<=90)) || ((s_pw.charCodeAt(i) >= 97) && (s_pw.charCodeAt(i)<=122))) {
			inEng = true;
			break;
		}
	}
/*
	// 특수문자 포함 여부 확인
	for(i=0; i<s_pw.length; i++) {
		if(((s_pw.charCodeAt(i) >= 33) && (s_pw.charCodeAt(i)<=47)) || ((s_pw.charCodeAt(i) >= 58) && (s_pw.charCodeAt(i)<=64)) || ((s_pw.charCodeAt(i) >= 91) && (s_pw.charCodeAt(i)<=96))) {
			inSChar = true;
			break;
		}
	}
*/
//	return (inRange&&inNum&&inEng&&inSChar);
	return (inRange&&inNum&&inEng);
}


// lnb height
/*
$(function(){
	var winHeight = $(window).outerHeight();
	var headerHeight = $('.header-wrap').outerHeight();
	var lnbHeight = winHeight - headerHeight;

	$('.lnb').css({
		height:lnbHeight
	});
});
*/


function cutStr(theField, i, theCharCounter, maxChars){
	var theField_id = $("#"+theField); var theField_val = theField_id.val();
	var intLength = theField_val.length;							//-- 실제 문자의 길이를 구한다.
	var strChar = theField_val.substr(0,i);			//마지막 문자를 잘라낸다.

	theField_id.val(strChar);
	textCounter(theField,theCharCounter);
	return true;
}

function textCounter(theField, theCharCounter, maxChars){
	var theField_id = $("#"+theField); var theField_val = theField_id.val();
	var theCharCounter_id = $("#"+theCharCounter);
	var strCharCounter = 0;
	var intLength = theField_val.length;

	for (var i = 0; i < intLength; i++){
		var charCode = theField_val.charCodeAt(i);

		if (charCode > 128) { strCharCounter += 2; }
		else { strCharCounter++; }

		if(strCharCounter > maxChars){
			cutStr(theField, i, theCharCounter, maxChars);
		}
	}

	theCharCounter_id.val(strCharCounter);
	if(strCharCounter > maxChars){
		cutStr(theField, i, theCharCounter, maxChars);
		//eval("alert('You can enter up to "+maxChars+" words.')");
		eval("alert('최대 "+maxChars+"byte 초과되었습니다.')");
		theField_id.focus();
	}
}


function Action_Sel_Code_Ajax(sel_id, selVal, selVal2){
	$.ajax({
		type: "POST",
		url: "../inc/sel_category.php",
		data: "val="+selVal,
		//contentType: "application/json; charset=utf-8",
		//dataType: "xml",
		success: function (data) {
			if(data && data != "No Data"){
				var arrData = data.split('|');
				for(i=0; i<arrData.length;i++){
					var arrDataVal = arrData[i].split('::');
					$(sel_id).append('<option value="'+arrDataVal[0]+'">'+arrDataVal[1]+'</option>');
					if(arrDataVal[0] == selVal2){ $(sel_id+" option:eq("+(i+1)+")").attr("selected", "selected"); }
				}
			}
		},
		failure: function (data) {
			alert("데이터가 없습니다.");
		}
	});
}
function Action_Sel_Code_Ajax2(sel_id, selVal, selVal2){
	$.ajax({
		type: "POST",
		url: "../inc/sel_category.php",
		data: "val2="+selVal,
		//contentType: "application/json; charset=utf-8",
		//dataType: "xml",
		success: function (data) {
			if(data && data != "No Data"){
				var arrData = data.split('|');
				for(i=0; i<arrData.length;i++){
					var arrDataVal = arrData[i].split('::');
					$(sel_id).append('<option value="'+arrDataVal[0]+'">'+arrDataVal[1]+'</option>');
					if(arrDataVal[0] == selVal2){ $(sel_id+" option:eq("+(i+1)+")").attr("selected", "selected"); }
				}
			}
		},
		failure: function (data) {
			alert("데이터가 없습니다.");
		}
	});
}



function Action_Row_Revalue(gubun, num){
	var gubun_val = $("#"+gubun).val();
	var sid_arr_cnt = 0;
	var sid_arr = gubun_val.split("|");
	sid_arr_cnt = sid_arr.length;

	var sid_val = "";
	for(s=0; s<sid_arr_cnt; s++){
		if(s != num){ sid_val += sid_arr[s]+"|"; }
	}
	var sid_val_len = sid_val.length;
	if(sid_val_len > 0){ sid_val = sid_val.substr(0, sid_val_len-1); }

	$("#"+gubun).val(sid_val);
}



//입력박스의 name 및 id에 번호 부여
function Action_Rename_Num(name, num){
	var name_arr = name.split("_");
	var name_arr_tcnt = name_arr.length-1;

	var rename = name_arr[0];
	for(a=1; a<name_arr_tcnt; a++){
		//var rename = name_arr[0]+"_" + (parseInt(name_arr[1])+1);
		rename += "_" + name_arr[a];
	}
	rename += "_" + (num);
	//if(name_arr[name_arr_tcnt] > 0){ rename += "_"+name_arr[name_arr_tcnt]; }

	return rename;
}
function Action_Rename_Num2(name, num){
	var name_len = name.length;
	var rename = name.substr(0,(name_len-1)) + (num+1);
	return rename;
}



//입력박스의 name 및 id 재정렬
function Action_Row_Rename(code, type){
	$("#"+code+"_contents_area "+type).each(function(index){
		// 항목명
		$(this).find("span").each(function(idx, obj){
			var span_id = obj.id;

			if(span_id != ""){
				var span_reid = Action_Rename_Num(span_id, index+1);
				$(this).attr("id",span_reid);
			}

			var item_name = $(this).html().substr(0,4)+(index+1);
			$(this).html(item_name);
		});

		// tr - id
		$(this).find("tr").each(function(idx, obj){
			var tr_id = obj.id;

			if(tr_id != ""){
				var tr_reid = Action_Rename_Num(tr_id, index+1);
				$(this).attr("id",tr_reid);
			}
		});

		// label - for
		$(this).find("label").each(function(idx, obj){
			var label_name = $(this).attr('for');

			if($(this).attr('class') == "radio-label"){
				var label_id_arr = label_name.split("_");
				var label_id_arr_cnt = label_id_arr.length-1;
				var label_num = ""; var label_name2 = "";

				$.each(label_id_arr, function (idx2) {
					if(idx2 == label_id_arr_cnt){
						label_num = label_id_arr[idx2];
					}else{
						label_name2 += label_id_arr[idx2] + "_";
					}
				});
				label_name2 = label_name2.substr(0, label_name2.length-1);

				var label_rename = Action_Rename_Num2(label_name2, index);
				label_rename = label_rename + "_" + label_num;
			}else{
				var label_rename = Action_Rename_Num2(label_name, index);
			}

			$(this).attr("for",label_rename);
		});

		// input box - name, id
		$(this).find("input[name]").each(function(idx, obj){
			var input_type = obj.type;
			var input_name = obj.name;
			var input_id = obj.id;
			var input_rename = Action_Rename_Num(input_name, index+1);

			if(input_type == "radio"){
				var input_id_arr = input_id.split("_");
				var input_id_arr_cnt = input_id_arr.length;
				var input_num = input_id_arr[input_id_arr_cnt-1];
				var input_reid = input_rename + "_" + input_num;
				$(this).attr("id",input_reid);
			}else{
				$(this).attr("id",input_rename);
			}

			$(this).attr("name",input_rename);
		});

		// select box - name, id
		$(this).find("select").each(function(idx, obj){
			var select_name = obj.name;
			if(code == "cus"){
				var select_rename = Action_Rename_Num(select_name, index+1);
			}else{
				var select_rename = Action_Rename_Num(select_name, index);
			}

			$(this).attr("name",select_rename);
			$(this).attr("id",select_rename);
		});

		// textarea - name, id
		$(this).find("textarea").each(function(idx, obj){
			var textarea_name = obj.name;
			var textarea_rename = Action_Rename_Num(textarea_name, index+1);
			//var textarea_rename = Action_Rename_Num(textarea_name, index);

			$(this).attr("name",textarea_rename);
			$(this).attr("id",textarea_rename);
		});
	});

}