  jQuery(document).ready(function() {
     $('#is_base_vip_discount').change(function(){
         $("#storediscountsettings-base_vip_discount").prop("disabled", !$(this).is(':checked'));
    }); 
});