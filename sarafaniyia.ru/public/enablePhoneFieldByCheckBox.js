  jQuery(document).ready(function() {
     $('#isPhone').change(function(){
         $("#vacancy-phone").prop("disabled", !$(this).is(':checked'));
    }); 
});