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
				url: "/NovaCarteirinha/pos_e_pesquisa/limbo_search",
				data: { query: query_value },
				cache: false,
				success: function(html){
					$("span#results_l").html(html);
				},
				
			beforeSend: function(){
			 $("span#results_l").html("<p><i class='fa fa-refresh fa-spin'></i> Carregando...</p>");

}			
			});
		}return false;    
	}

	$(".btn_limbo").click(function(e) {
	$(".qa-message-content").fadeOut();
	$(this).parent().parent().parent().siblings(".qa-message-content").fadeIn();
			// Set Timeout
		clearTimeout($.data(this, 'timer'));

		// Set Search String
		var search_string = $(this).parent().siblings('input.posepesquisa').val();

		// Do Search
		if (search_string == '') {
			$("span#results_l").fadeOut();
			$('h4#results_l-text').fadeOut();
		}else{
			$("span#results_l").fadeIn();
			$('h4#results_l-text').fadeIn();
			$(this).data('timer', setTimeout(search(search_string), 100));
		};
	});
});