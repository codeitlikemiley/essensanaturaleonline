<script>
var modal = $('.modal-itemorder').leanModal({
                dismissible: false, // Modal can be dismissed by clicking outside of the modal
                opacity: '.6', // Opacity of modal background
                in_duration: 300, // Transition in duration
                out_duration: 200, // Transition out duration
                ready: function() { console.log('View Order Items'); }, // Callback for Modal open
                complete: function() { console.log('Closed Order Items'); } // Callback for Modal close
                });
function viewItemOrder(id){
var url = $('#itemOrderForm'+ id).attr('action');
var formdata = $('#itemOrderForm'+ id).serializeArray();
$.ajax({
            url: url,
            dataType:'JSON',
            data: formdata,
            type:'post',
        }).done(function(data){
            $('#itemOrderModal'+ id).empty();
            $('#itemOrderModal'+ id).html(data.html);
            
           Materialize.toast(data.message, 4000,'',function () {
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
</script>