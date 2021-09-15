jQuery(document).ready(function() {
    $('#isAvailable').change(function(){
        var service_time_input = document.getElementById("pricelistitem-service_time");
        if(service_time_input.disabled) {
            service_time_input.disabled = false;
        } else {
            service_time_input.disabled = true;
        }
    });
});