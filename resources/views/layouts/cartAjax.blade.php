<script type="text/javascript">
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
            $('#checkoutnavbtn').show();
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
            $('#checkoutnavbtn').hide();
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