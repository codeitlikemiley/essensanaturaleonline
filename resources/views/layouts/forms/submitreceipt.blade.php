<script>
$.ajaxSetup({headers:{'X-CSRF-TOKEN':
        $( 'meta[name="csrf-token"]' ).attr( 'content' )}});

function submitReceipt(id){
    var url = $('#postReceiptForm'+ id).attr('action');
    var form = document.querySelector('#postReceiptForm'+ id);
    var formdata = new FormData(form);
        $.ajax({
            url: url,
            dataType:'JSON',
            data: formdata,
            type:'post',
            processData: false,
            contentType: false,
        }).done(function(data){
            
           Materialize.toast(data.message, 4000,'',function () {
            console.log(data);
           });

        }).fail(function () { // if Fail
            var errors = data.responseJSON;

            $.each(errors.message, function(index, error)
            {
             Materialize.toast(error, 4000,'',function(){
                //
            });
            });
            
          });
    }

function deleteOrder(id){
      var url = $('#deleteOrderForm'+ id).attr('action');
      var deleteOrder = $('#deleteOrderForm'+ id).serializeArray();
      $.ajax({
            url: url,
            type:'post',
            dataType: 'JSON',
            data: deleteOrder,

        }).done(function(data){
            $('#deleteOrder'+ id).empty();
            Materialize.toast('Order Deleted!', 4000,'',function(){console.log('Order Deleted!');});
        }).fail(function () { // if Fail
    Materialize.toast('Order Deletion Failed!', 4000,'',function(){console.log('Cart Deletion Failed!');});
          });
    }

    $('.modal-receipt').leanModal({
                dismissible: false, // Modal can be dismissed by clicking outside of the modal
                opacity: '.6', // Opacity of modal background
                in_duration: 300, // Transition in duration
                out_duration: 200, // Transition out duration
                ready: function() { console.log('Open'); }, // Callback for Modal open
                complete: function() { console.log('Closed'); } // Callback for Modal close
                });
    $('.modal-delete').leanModal({
                dismissible: false, // Modal can be dismissed by clicking outside of the modal
                opacity: '.6', // Opacity of modal background
                in_duration: 300, // Transition in duration
                out_duration: 200, // Transition out duration
                ready: function() { console.log('Open'); }, // Callback for Modal open
                complete: function() { console.log('Closed'); } // Callback for Modal close
                });
</script>