

    $.ajaxSetup({headers:{'X-CSRF-TOKEN':
        $( 'meta[name="csrf-token"]' ).attr( 'content' )}});

    function pageloader(v){
      if(v == 'on'){
        $('#search_form').css({
          opacity : 0.2
        });
        $('#pageloader').show();
      }else{
        $('#search_form').css({
          opacity : 1
        });
        $('#pageloader').hide();
      }
    }

     // ajax call for autocomplete
   $( "#q" ).autocomplete({
    source: "search/autocomplete",
    minLength: 3,
    autoFocus: true,
    select: function(event, ui) {
      $('#q').val(ui.item.value);

    }
  });

    // autocomplete added behavior
    $( "input[name='q']" ).on( "focus", function(){
        $( "input[name='q']" ).css( "color", "#e57373" );
        $( "input[name='q']" ).val();
        $( ".ui-autocomplete" ).show();
    });

    $( "input[name='q']" ).change(function(){
      $( ".ui-autocomplete" ).empty();
    });

    // ajax call for search sponsorlink
    $("#search_form").submit(function(e){
                e.preventDefault();
                var url = $('#search_form').attr('action');
                var search_form = $('#search_form').serializeArray();
                pageloader('on');
                $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: search_form,
                        success: function(data){
                        // stop the loader
                        pageloader('off');

                        $('#pageloader').addClass('teal lighten-2').fadeIn(2000, function(){
                          $(this).hide();
                          $(this).removeClass("teal lighten-2");
                        });

                        var name = data.productdata.name;
                        console.log(name);

                        var price = data.productdata.price;
                        console.log(price);

                        var description = data.productdata.description;
                        console.log(description);

                        var image = data.productdata.image;
                        console.log(image);

                        var rating_cache = data.productdata.rating_cache;
                        console.log(rating_cache);
                        var rating_count = data.productdata.rating_count;
                        console.log(rating_count);

                        // fill the input value with search value
                        $( "input[name='q']" ).val(name);

                        // Append All Data to View Below this Code

                        // Show Toast Message
                        Materialize.toast(data.message, 4000,'',function(){console.log('Product Found');});

                        },
                        error: function(data){

                        pageloader('off');
                        var data = data.responseJSON;

                        console.log(data);
                        Materialize.toast(data.message, 4000,'',function(){console.log('Product Not Found!');});



                        } // END ERROR
                      });


        });



