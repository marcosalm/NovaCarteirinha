
$(document).ready(function() {  

	// Icon Click Focus
	$('div.icon').click(function(){
		$('input#search').focus();
	});

	// Live Search
	// On Search Submit and Get Results
	function search(val) {
		var query_value = val;
		$('b#search-string').html(query_value);
		if(query_value !== ''){
			$.ajax({
				type: "POST",
				url: "app/historico.php",
				data: { query: query_value },
				cache: false,
				success: function(html){
					$("span#results_h").html(html);
				},
				
			beforeSend: function(){
			 $("span#results_h").html("<p><i class='fa fa-refresh fa-spin'></i> Carregando...</p>");

}			
			});
		}return false;    
	}

	$(".btn_historico").click(function(e) {
	$(".qa-message-content").fadeOut();
	$(this).parent().parent().parent().siblings(".qa-message-content").fadeIn();
			// Set Timeout
		clearTimeout($.data(this, 'timer'));

		// Set Search String
		var search_string = $(this).parent().siblings('input.historico').val();

		// Do Search
		if (search_string == '') {
			$("span#results_h").fadeOut();
			$('h4#results_h-text').fadeOut();
		}else{
			$("span#results_h").fadeIn();
			$('h4#results_h-text').fadeIn();
			$(this).data('timer', setTimeout(search(search_string), 100));
		};
	});
	
	
/* 	$("#search").keyup(function(e) {
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
	}); */
	

});