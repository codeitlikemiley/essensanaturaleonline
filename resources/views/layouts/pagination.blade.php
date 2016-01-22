
<script>
		/*==================== PAGINATION =========================*/
		
		$(window).on('hashchange',function(){
			page = window.location.hash.replace('#','');	
			// getProducts(page);
		});
		$(document).on('click','.pagination a', function(e){
			e.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			getProducts(page);
			location.hash = page;
		});
		function getProducts(page){
			buttonloader('on');
			$.ajax({
				url: '/api/products?page=' + page
			}).done(function(data){
				$('.productAjax').html(data);
				
				// modal trigger in Pagination For Product Add Qty Modal
				// Re Initialize Modal Every time you Get New Paginated Products
				$('.modal-pagination').leanModal({
      			dismissible: true, // Modal can be dismissed by clicking outside of the modal
      			opacity: '.6', // Opacity of modal background
      			in_duration: 300, // Transition in duration
      			out_duration: 200, // Transition out duration
      			ready: function() { console.log('Open'); }, // Callback for Modal open
      			complete: function() { console.log('Closed'); } // Callback for Modal close
      			});
      			$('form input').on('keypress', function(e) {
      if($('.qtype')){
        return e.which !== 13;
      }
    
    });
				
				
				buttonloader('off');
			}).fail(function () { // if Fail
        Materialize.toast('Product Could Not Be Loaded!', 4000,'',function(){console.log('Product Not Found!');});
        	buttonloader('off');
    });
		}
</script>