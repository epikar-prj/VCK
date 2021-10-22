function validate_email(email_) {
    var reg_email = /^([0-9a-zA-Z_\.-]+)@([0-9a-zA-Z_-]+)(\.[0-9a-zA-Z_-]+){1,2}$/;
    if(!reg_email.test(email_)) {
        return false;
    } else {
        return true;
    }                            
}

function phoneFormat(_hp){
    return _hp.replace(/(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/,"$1-$2-$3");
}

function phoneFomatter(num,type){
    var formatNum = '';

    if(num.length==11){
        if(type==0){
            formatNum = num.replace(/(\d{3})(\d{4})(\d{4})/, '$1-****-$3');
        }else{
            formatNum = num.replace(/(\d{3})(\d{4})(\d{4})/, '$1-$2-$3');
        }
    }else if(num.length==8){
        formatNum = num.replace(/(\d{4})(\d{4})/, '$1-$2');
    }else{
        if(num.indexOf('02')==0){
            if(type==0){
                formatNum = num.replace(/(\d{2})(\d{4})(\d{4})/, '$1-****-$3');
            }else{
                formatNum = num.replace(/(\d{2})(\d{4})(\d{4})/, '$1-$2-$3');
            }
        }else{
            if(type==0){
                formatNum = num.replace(/(\d{3})(\d{3})(\d{4})/, '$1-***-$3');
            }else{
                formatNum = num.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
            }
        }
    }
    return formatNum;
}

function chkPW(pw){
    var num = pw.search(/[0-9]/g);
    var eng = pw.search(/[a-z]/ig);
    var spe = pw.search(/[\{\}\[\]\/?.,;:|\)*~`!^\_\-+<>@\#$%&\\\=\(\'\"]/gi);

    var numCnt = pw.match(/[0-9]/g) ? pw.match(/[0-9]/g).length : 0;
    var engmCnt = pw.match(/[a-z]/ig) ? pw.match(/[a-z]/ig).length : 0;
    var speCnt = pw.match(/[\{\}\[\]\/?.,;:|\)*~`!^\_\-+<>@\#$%&\\\=\(\'\"]/gi) ? pw.match(/[\{\}\[\]\/?.,;:|\)*~`!^\_\-+<>@\#$%&\\\=\(\'\"]/gi).length : 0;

    if(pw.length < 8){
        alert("비밀번호는 공백 없이 8자리 이상 영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
        return false;
    }else if(pw.search(/\s/) != -1){
        alert("비밀번호는 공백 없이 8자리 이상 영문, 숫자, 특수문자를 혼합하여 입력해주세요.");
        return false;
    }else if(pw.length > (numCnt + engmCnt + speCnt) ){
        alert("비밀번호에 사용할 수 없는 문자가 포함되어있습니다.");
        return false;
    }else if(num < 0 ){
		alert("비밀번호에 숫자가 1개 이상 포함되어야 합니다.");
        return false;
    }else if(eng < 0 ){
		alert("비밀번호에 영문이 1개 이상 포함되어야 합니다.");
        return false;	
    }else if(spe < 0 ){
		alert("비밀번호에 특수문자가 1개 이상 포함되어야 합니다.");
        return false;	
    }else {
        return true;
    }
}

function chkPW2(pw){
    var num = pw.search(/[0-9]/g);
    var eng = pw.search(/[a-z]/ig);
    var spe = pw.search(/[\{\}\[\]\/?.,;:|\)*~`!^\-+<>@\#$%&\\\=\(\'\"]/gi);

    var numCnt = pw.match(/[0-9]/g) ? pw.match(/[0-9]/g).length : 0;
    var engmCnt = pw.match(/[a-z]/ig) ? pw.match(/[a-z]/ig).length : 0;
    var speCnt = pw.match(/[\{\}\[\]\/?.,;:|\)*~`!^\_\-+<>@\#$%&\\\=\(\'\"]/gi) ? pw.match(/[\{\}\[\]\/?.,;:|\)*~`!^\_\-+<>@\#$%&\\\=\(\'\"]/gi).length : 0;

    if(pw.length < 8){
        return false;
    }else if(pw.search(/\s/) != -1){
        return false;
    }else if(pw.length > (numCnt + engmCnt + speCnt) ){
        return false;
    }else if(num < 0 || eng < 0 || spe < 0 ){
        return false;
    }else {
        return true;
    }
}

function onlyNumber(){
    if((event.keyCode<48)||(event.keyCode>57)) {
        event.returnValue=false;
    } 
    

}

function maxLengthCheck(object){
    if (object.value.length > object.maxLength){
        object.value = object.value.slice(0, object.maxLength);
    }    
}


function getOS() {
    var userAgent = window.navigator.userAgent,
        platform = window.navigator.platform,
        macosPlatforms = ['Macintosh', 'MacIntel', 'MacPPC', 'Mac68K'],
        windowsPlatforms = ['Win32', 'Win64', 'Windows', 'WinCE'],
        iosPlatforms = ['iPhone', 'iPad', 'iPod'],
        os = null;
  
    if (macosPlatforms.indexOf(platform) !== -1) {
      os = 'Mac OS';
    } else if (iosPlatforms.indexOf(platform) !== -1) {
      os = 'iOS';
    } else if (windowsPlatforms.indexOf(platform) !== -1) {
      os = 'Windows';
    } else if (/Android/.test(userAgent)) {
      os = 'Android';
    } else if (!os && /Linux/.test(platform)) {
      os = 'Linux';
    }
  
    return os;
  }


function pad(n, width) {
    n = n + '';
    return n.length >= width ? n : new Array(width - n.length + 1).join('0') + n;
}


function b64DecodeUnicode(str) {
  return decodeURIComponent(Array.prototype.map.call(atob(str), function(c) {
      return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2)
  }).join(''))
}

function b64_to_utf8( str ) {
  var result = decodeURIComponent(escape(window.atob( str )));
  console.log(result)
  return result
  
}

function keyDown(e) { 
var e = window.event || e;
var key = e.keyCode;
//space pressed
    if (key == 32) { //space
    e.preventDefault();
    }
        
}

function replaceAll(str, searchStr, replaceStr) {
    return str.split(searchStr).join(replaceStr);
}

window.applicationCache.addEventListener('downloading', function() {

  console.log('리소스 다운로드중입니다.');

}, false);



window.applicationCache.addEventListener('progress', function() {

  console.log('각각의 리소스 다운로드중입니다.');

}, false);



window.applicationCache.addEventListener('updateready', function() {

  console.log("캐싱이 완료되었습니다.");

  window.applicationCache.swapCache();

}, false);