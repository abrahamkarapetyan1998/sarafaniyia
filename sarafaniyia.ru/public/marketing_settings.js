  jQuery(document).ready(function() {
     $('#is_base_vip_discount').change(function(){
         $("#storediscountsettings-base_vip_discount").prop("disabled", !$(this).is(':checked'));
    }); 

$('#is_max_discount').change(function(){
         $("#storediscountsettings-max_discount").prop("disabled", !$(this).is(':checked'));
    }); 

$('#is_pay_for_invite').change(function(){
         $("#storediscountsettings-points_for_invite").prop("disabled", !$(this).is(':checked'));
         $("#storediscountsettings-max_invites_rewarded").prop("disabled", !$(this).is(':checked'));
    }); 

$('#is_rewarded_for_enter').change(function(){
         $("#storediscountsettings-points_for_enter").prop("disabled", !$(this).is(':checked'));
    }); 

$('#is_reward_for_cashier').change(function(){
         $("#storediscountsettings-cashier_reward").prop("disabled", !$(this).is(':checked'));
    }); 

$('#is_report_send').change(function(){
         $("#storediscountsettings-email_for_report_send").prop("disabled", !$(this).is(':checked'));
    }); 
});