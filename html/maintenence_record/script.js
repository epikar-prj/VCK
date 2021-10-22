// calendar 함수
function Calendar(el) {

    var $el = $(el);
    var currentMonth = new Date().getMonth() + 1;
    var currentDay = new Date().getDate();

	function calendar(new_year, new_month) {
		// 특정 年月을 시작일부터 조회(year, month, date)
		var d = new Date(new_year, new_month - 1, 1),
			// 월별 일수 구하기
			d_length = 32 - new Date(new_year, new_month - 1, 32).getDate(),
			year = d.getFullYear(),
			month = d.getMonth(),
			date = d.getDate(),
			day = d.getDay();

		var before_d_length = 32 - new Date(new_year, new_month - 2, 32).getDate();
		var before_date_start = before_d_length - day + 1;

		// caption 영역 날짜 표시 객체
		var $caption_year = $el.find('.year'),
			$caption_month = $el.find('.month');
		var $start_day = $el.find('tr td');

		// 테이블 초기화

		$start_day.each(function(i) {
			if (before_date_start > before_d_length)
			{				
				$(this).html('&nbsp;');
				return;
			}
			$(this).html(before_date_start++);

		});

		// 한달치 날짜를 테이블에 시작 요일부터 순서대로 표시
		for (var i = day; i < day + d_length; i++) {
            if ((currentMonth == (month + 1)) && (date < currentDay)) {
                $start_day.eq(i).html(date);
            } else if (i % 7 == 6) {
                $start_day.eq(i).html('<a href="javascript:void(0);" data-date="' + date + '">' + date + '</a>');
            } else if (i % 7 == 0) {
                $start_day.eq(i).html(date);
            } else {
                $start_day.eq(i).html('<a href="javascript:void(0);" data-date="' + date + '">' + date + '</a>');
            }
            

            
                
			date++;
		}

		date_click();

		// caption 날짜 표시
		$caption_year.html(year);
		$caption_month.html(pad(month + 1,2));
	}

	function pad(n, width, z) {
	  z = z || '0';
	  n = n + '';
	  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
	}


	var $prev = $el.find('.prev'),
		$next = $el.find('.next'),
		year = new Date().getFullYear(),
		month = new Date().getMonth() + 1;


	var start_year,
        start_month,
        start_date,
        start_check;

    var end_year,
        end_month,
        end_date,
        end_check;


	calendar(year, month);

	$prev.click(function() {
		calendar(year, --month);
		bring_state();

	});

	$next.click(function() {
		calendar(year, ++month);
		bring_state();
	});

	function bring_state() {
		if (month == select_month) {
			$el.find('td a[data-date="' + select_date + '"]')
				.addClass('on');
		}
	}

	function date_click() {
		$el.find('td a').click(function() {
			var t = this;
			if ($(t).hasClass('on')) {
				// $(t).removeClass('on');
			} else {
				// $el.find('td a').removeClass('on');
				$(t).addClass('on');

                var fixDate = new Date(year, month-1, Number($(t).text()));

                if (!start_check) {
                    start_year = fixDate.getFullYear();
                    start_month = fixDate.getMonth()+1;
                    start_date = fixDate.getDate();
                } else {
                    end_year = fixDate.getFullYear();
                    end_month = fixDate.getMonth()+1;
                    end_date = fixDate.getDate();

                    
                }

				

				//console.log(year, month, select_date);
			}
		});
	}


	this.getStartYear = function() {
		return start_year;
	}

	this.getStartMonth = function() {
		return start_month;
	}

	this.getStartDate = function() {
		return start_date;
    }
    
    this.getEndYear = function() {
		return start_year;
	}

	this.getEndMonth = function() {
		return start_month;
	}

	this.getEndDate = function() {
		return start_date;
	}
}

calendar1 = new Calendar('#calendar1');


$('.calendar_tab .btn').each(function(index){
	$(this).click(function(){

		$('.calendar_tab .btn').not($(this)).removeClass('on')
		$(this).addClass('on');

		$('.calendar').not( $('.calendar').eq(index)).removeClass('on')
		$('.calendar').eq(index).addClass('on');
	});
});