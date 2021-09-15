  jQuery(document).ready(function() {
     $('#isEmail').change(function(){
         $("#vacancy-email").prop("disabled", !$(this).is(':checked'));
    }); 
});