
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
				buttonloader('off');
			}).fail(function () { // if Fail
        Materialize.toast('Product Could Not Be Loaded!', 4000,'',function(){console.log('Product Not Found!');});
        	buttonloader('off');
    });
		}
</script>