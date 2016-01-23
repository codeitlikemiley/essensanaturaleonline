<script type="text/javascript">
(function($){
  $(function(){       //Start of function
  $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  $('ul.tabs').tabs(); 
   $('select').material_select();

  // initialize sidenav button
   $('.button-collapse').sideNav({
      menuWidth: 2000, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }); //End Button Collapse

   // modal trigger in Navbar Shopcart for bottomsheet
   $('#nav-cart').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: '.6', // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { console.log('Open'); }, // Callback for Modal open
      complete: function() { console.log('Closed'); } // Callback for Modal close
      });  // End MOdal Trigger

   // modal trigger in Pagination For Product Add Qty Modal
   $('.modal-pagination').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: '.6', // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { console.log('Open'); }, // Callback for Modal open
      complete: function() { console.log('Closed'); } // Callback for Modal close
      });


   // initialize parallax
   $('.parallax').parallax();
   // initialize slider
   $('.slider').slider();
   // Open and Close Nav Search Bar
   $("#searchable").click(function() {
      $("#navsearch").toggle();
      $("#q").focus();
    });
   // Close on Blur Nav Bar
   $( "#q" ).blur(function(){
    $( "#navsearch" ).toggle();
   });

   



    });// end of document ready
})(jQuery);
function buttonloader(v)
    {

    if(v == 'on'){

     $('.buttonloader').hide();
     $('.loading').show();

    }
    else{

     $('.loading').hide();
     $('.buttonloader').show();

    }
    }

    $.ajaxSetup({headers:{'X-CSRF-TOKEN':
        $( 'meta[name="csrf-token"]' ).attr( 'content' )}});
    // Prevent Pressing Enter on Qty Input
    $('.qtype').on('keypress', function(e) {
        return e.which !== 13;
    });

  function addProduct(id){
    var url = $('#form'+ id).attr('action');
    var formdata = $('#form' + id).serializeArray();
    buttonloader('on');
        $.ajax({
            url: url,
            dataType:'JSON',
            data: formdata,
            type:'post',
        }).done(function(data){
            $('#qty'+id).val('1');
            $('#myCart').empty();
            $('#myCart').html(data);
            $('.qtype').on('keypress', function(e) {
        return e.which !== 13;
            });
            Materialize.toast('Product Added!', 4000,'',function(){console.log('Product Added!');});
            buttonloader('off');
        }).fail(function () { // if Fail
    Materialize.toast('Product Not Added!', 4000,'',function(){console.log('Product Not Found!');});
            buttonloader('off');
          });
    }
    function updateProduct(id){
    var url = $('#updateItemForm' + id).attr('action');
    var updatedata = $('#updateItemForm' + id).serializeArray();
        $.ajax({
            url: url,
            dataType:'JSON',
            data: updatedata,
            type:'post',
        }).done(function(data){
            $('#updateQty'+id).val();
            $('#myCart').empty();
            $('#myCart').html(data);
            $('.qtype').on('keypress', function(e) {
            return e.which !== 13;
            });
            Materialize.toast('Product Updated!', 4000,'',function(){console.log('Product Added!');});
        }).fail(function () { // if Fail
    Materialize.toast('Product Not Updated!', 4000,'',function(){console.log('Product Not Found!');});
          });
    }
    function removeCart(){
      var destroydata = $('#destroyCart').serializeArray();
      $.ajax({
            url: 'destroyCart',
            type:'post',
            dataType: 'JSON',
            data: destroydata,

        }).done(function(data){
            $('#myCart').empty();
            $('#myCart').html(data);
            $('.qtype').on('keypress', function(e) {
            return e.which !== 13;
            });
            Materialize.toast('Cart Removed!', 4000,'',function(){console.log('Cart Removed!');});
        }).fail(function () { // if Fail
    Materialize.toast('Cart Deletion Failed', 4000,'',function(){console.log('Cart Deletion Failed!');});
          });
    }

    function removeProduct(id){
      var itemData = $('#removeItemForm'+id).serializeArray();
      var url = $('#removeItemForm'+id).attr('action');
      $.ajax({
            url: url,
            type:'post',
            dataType: 'JSON',
            data: itemData,

        }).done(function(data){
            $('#myCart').empty();
            $('#myCart').html(data);
            $('.qtype').on('keypress', function(e) {
            return e.which !== 13;
            });
            Materialize.toast('Product Removed!', 4000,'',function(){console.log('Cart Removed!');});
        }).fail(function () { // if Fail
    Materialize.toast('Product Deletion Failed', 4000,'',function(){console.log('Cart Deletion Failed!');});
          });
    }


</script>
