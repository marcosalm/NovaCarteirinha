
$(document).ready(function() {  

	// Icon Click Focus
	$('div.icon').click(function(){
		$('input#search').focus();
	});

	// Live Search
	// On Search Submit and Get Results
	function search() {
		var query_value = $('input#search').val();
		$('b#search-string').html(query_value);
		if(query_value !== ''){
			$.ajax({
				type: "POST",
				url: "/NovaCarteirinha/admin/search",
				data: { query: query_value },
				cache: false,
				success: function(html){
					$("span#results").html(html);
				},
				
			beforeSend: function(){
			 $("span#results").html("<p><i class='fa fa-refresh fa-spin'></i> Carregando...</p>");

}			
			});
		}return false;    
	}

	$("#btn_search").click(function(e) {
		// Set Timeout
		clearTimeout($.data(this, 'timer'));

		// Set Search String
		var search_string = $('input#search').val();

		// Do Search
		if (search_string == '') {
			$("span#results").fadeOut();
			$('h4#results-text').fadeOut();
		}else{
			$("span#results").fadeIn();
			$('h4#results-text').fadeIn();
			$(this).data('timer', setTimeout(search, 100));
		};
	});
	$("#search").keyup(function(e) {
	 if(e.keyCode == 13) {
		// Set Timeout
		clearTimeout($.data(this, 'timer'));

		// Set Search String
		var search_string = $('input#search').val();

		// Do Search
		if (search_string == '') {
			$("span#results").fadeOut();
			$('h4#results-text').fadeOut();
		}else{
			$("span#results").fadeIn();
			$('h4#results-text').fadeIn();
			$(this).data('timer', setTimeout(search, 100));
		};
		}
	});
	

});