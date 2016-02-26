<script type="text/javascript">
(function($){
  $(function(){       //Start of function
  $('.collapsible').collapsible({
      accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  $('ul.tabs').tabs(); 
   $('select').material_select();

  // initialize sidenav button
   $('.button-collapse').sideNav({
      menuWidth: 280, // Default is 240
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

   $('#navbtnmodal').leanModal({
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
loadStyleSheet('css/vendor.css');
loadicon('https://fonts.googleapis.com/icon?family=Material+Icons');
   function loadStyleSheet(src) {
    if (document.createStyleSheet){
        document.createStyleSheet(src);
    }
    else {
        $("head").append($("<link rel='stylesheet' href='"+src+"' type='text/css' media='screen,projection' />"));
    }
};
function loadicon(src) {
    if (document.createStyleSheet){
        document.createStyleSheet(src);
    }
    else {
        $("head").append($("<link rel='stylesheet' href='"+src+"' />"));
    }
};



    });// end of document ready
})(jQuery);


</script>
