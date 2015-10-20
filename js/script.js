year = 2013; i = 3;
flag = true;
$(window).scroll(function() {
	if($(window).scrollTop() + $(window).height() == $(document).height()){
		if(flag){
			flag = false;
			$('#loader').show();
			setTimeout(function(){ 
				$('#loader').hide();
				$('#timeline-conatiner').append( '<li class="year">'+year+'</li>');
				$('#timeline-conatiner').append( $('#'+i).html() );
				if(i==6)i=0;
				i++; year--;
				flag = true;
			}, 800);
		}
		
	}
});	
	