  jQuery(document).ready(function() {
     $('#isMonday').change(function(){
        var w1 = document.getElementById("w1");
        var w2 = document.getElementById("w2");
        var w3 = document.getElementById("w3");
        var w4 = document.getElementById("w4");
        var w5 = document.getElementById("isMondayRest");
        if (w1.disabled){
          w1.disabled = false;
          w2.disabled = false;
          w5.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
          w3.disabled = true;
          w4.disabled = true;
          w5.disabled = true;
          w5.checked = false;
        }
    }); 

    $('#isMondayRest').change(function(){
        var w0 = document.getElementById("isMondayRest");
        var w1 = document.getElementById("w3");
        var w2 = document.getElementById("w4");
        if (w0.checked){
          w1.disabled = false;
          w2.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
        }
    }); 

    $('#isTuesday').change(function(){
        var w1 = document.getElementById("w5");
        var w2 = document.getElementById("w6");
        var w3 = document.getElementById("w7");
        var w4 = document.getElementById("w8");
        var w5 = document.getElementById("isTuesdayRest");
        if (w1.disabled){
          w1.disabled = false;
          w2.disabled = false;
          w5.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
          w3.disabled = true;
          w4.disabled = true;
          w5.disabled = true;
          w5.checked = false;
        }
    }); 

    $('#isTuesdayRest').change(function(){
        var w0 = document.getElementById("isTuesdayRest");
        var w1 = document.getElementById("w7");
        var w2 = document.getElementById("w8");
        if (w0.checked){
          w1.disabled = false;
          w2.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
        }
    }); 

    $('#isWednesday').change(function(){
        var w1 = document.getElementById("w9");
        var w2 = document.getElementById("w10");
        var w3 = document.getElementById("w11");
        var w4 = document.getElementById("w12");
        var w5 = document.getElementById("isWednesdayRest");
        if (w1.disabled){
          w1.disabled = false;
          w2.disabled = false;
          w5.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
          w3.disabled = true;
          w4.disabled = true;
          w5.disabled = true;
          w5.checked = false;
        }
    }); 

    $('#isWednesdayRest').change(function(){
        var w0 = document.getElementById("isWednesdayRest");
        var w1 = document.getElementById("w11");
        var w2 = document.getElementById("w12");
        if (w0.checked){
          w1.disabled = false;
          w2.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
        }
    }); 

    $('#isThursday').change(function(){
        var w1 = document.getElementById("w13");
        var w2 = document.getElementById("w14");
        var w3 = document.getElementById("w15");
        var w4 = document.getElementById("w16");
        var w5 = document.getElementById("isThursdayRest");
        if (w1.disabled){
          w1.disabled = false;
          w2.disabled = false;
          w5.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
          w3.disabled = true;
          w4.disabled = true;
          w5.disabled = true;
          w5.checked = false;
        }
    }); 

    $('#isThursdayRest').change(function(){
        var w0 = document.getElementById("isThursdayRest");
        var w1 = document.getElementById("w15");
        var w2 = document.getElementById("w16");
        if (w0.checked){
          w1.disabled = false;
          w2.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
        }
    }); 
      
    $('#isFriday').change(function(){
        var w1 = document.getElementById("w17");
        var w2 = document.getElementById("w18");
        var w3 = document.getElementById("w19");
        var w4 = document.getElementById("w20");
        var w5 = document.getElementById("isFridayRest");
        if (w1.disabled){
          w1.disabled = false;
          w2.disabled = false;
          w5.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
          w3.disabled = true;
          w4.disabled = true;
          w5.disabled = true;
          w5.checked = false;
        }
    }); 

    $('#isFridayRest').change(function(){
        var w0 = document.getElementById("isFridayRest");
        var w1 = document.getElementById("w19");
        var w2 = document.getElementById("w20");
        if (w0.checked){
          w1.disabled = false;
          w2.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
        }
    }); 

    $('#isSaturday').change(function(){
        var w1 = document.getElementById("w21");
        var w2 = document.getElementById("w22");
        var w3 = document.getElementById("w23");
        var w4 = document.getElementById("w24");
        var w5 = document.getElementById("isSaturdayRest");
        if (w1.disabled){
          w1.disabled = false;
          w2.disabled = false;
          w5.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
          w3.disabled = true;
          w4.disabled = true;
          w5.disabled = true;
          w5.checked = false;
        }
    }); 

    $('#isSaturdayRest').change(function(){
        var w0 = document.getElementById("isSaturdayRest");
        var w1 = document.getElementById("w23");
        var w2 = document.getElementById("w24");
        if (w0.checked){
          w1.disabled = false;
          w2.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
        }
    }); 

    $('#isSunday').change(function(){
        var w1 = document.getElementById("w25");
        var w2 = document.getElementById("w26");
        var w3 = document.getElementById("w27");
        var w4 = document.getElementById("w28");
        var w5 = document.getElementById("isSundayRest");
        if (w1.disabled){
          w1.disabled = false;
          w2.disabled = false;
          w5.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
          w3.disabled = true;
          w4.disabled = true;
          w5.disabled = true;
          w5.checked = false;
        }
    }); 

    $('#isSundayRest').change(function(){
        var w0 = document.getElementById("isSundayRest");
        var w1 = document.getElementById("w27");
        var w2 = document.getElementById("w28");
        if (w0.checked){
          w1.disabled = false;
          w2.disabled = false;
        } else {
          w1.disabled = true;
          w2.disabled = true;
        }
    });     

      $('#isAllDay').change(function(){
        var w0 = document.getElementById("isAllDay");
        var w1 = document.getElementById("isMonday");
        var w2 = document.getElementById("isTuesday");
        var w3 = document.getElementById("isWednesday");
        var w4 = document.getElementById("isThursday");
        var w5 = document.getElementById("isFriday");
        var w6 = document.getElementById("isSaturday");
        var w7 = document.getElementById("isSunday");
        var w8_1 = document.getElementById("isMondayRest");
        var w8_2 = document.getElementById("isTuesdayRest");
        var w8_3 = document.getElementById("isWednesdayRest");
        var w8_4 = document.getElementById("isThursdayRest");
        var w8_5 = document.getElementById("isFridayRest");
        var w8_6 = document.getElementById("isSaturdayRest");
        var w8_7 = document.getElementById("isSundayRest");
        var w9 = document.getElementById("w1");
        var w10 = document.getElementById("w2");
        var w11 = document.getElementById("w3");
        var w12 = document.getElementById("w4");
        var w13 = document.getElementById("w5");
        var w14 = document.getElementById("w6");
        var w15 = document.getElementById("w7");
        var w16 = document.getElementById("w8");
        var w17 = document.getElementById("w9");
        var w18 = document.getElementById("w10");
        var w19 = document.getElementById("w11");
        var w20 = document.getElementById("w12");
        var w21 = document.getElementById("w13");
        var w22 = document.getElementById("w14");
        var w23 = document.getElementById("w15");
        var w24 = document.getElementById("w16");
        var w25 = document.getElementById("w17");
        var w26 = document.getElementById("w18");
        var w27 = document.getElementById("w19");
        var w28 = document.getElementById("w20");
        var w29 = document.getElementById("w21");
        var w30 = document.getElementById("w22");
        var w31 = document.getElementById("w23");
        var w32 = document.getElementById("w24");
        var w33 = document.getElementById("w25");
        var w34 = document.getElementById("w26");
        var w35 = document.getElementById("w27");
        var w36 = document.getElementById("w28");
       
        if (w0.checked){
          w0.value = "1";
          w1.disabled = true;
          w2.disabled = true;
          w3.disabled = true;
          w4.disabled = true;
          w5.disabled = true;
          w6.disabled = true;
          w7.disabled = true;
          w1.checked = false;
          w2.checked = false;
          w3.checked = false;
          w4.checked = false;
          w5.checked = false;
          w6.checked = false;
          w7.checked = false;
          w8_1.disabled = true;
          w8_1.checked = false;
          w8_2.disabled = true;
          w8_2.checked = false;
          w8_3.disabled = true;
          w8_3.checked = false;
          w8_4.disabled = true;
          w8_4.checked = false;
          w8_5.disabled = true;
          w8_5.checked = false;
          w8_6.disabled = true;
          w8_6.checked = false;
          w8_7.disabled = true;
          w8_7.checked = false;
          w9.disabled = true;
          w10.disabled = true;
          w11.disabled = true;
          w12.disabled = true;
          w13.disabled = true;
          w14.disabled = true;
          w15.disabled = true;
          w16.disabled = true;
          w17.disabled = true;
          w18.disabled = true;
          w19.disabled = true;
          w20.disabled = true;
          w21.disabled = true;
          w22.disabled = true;
          w23.disabled = true;
          w24.disabled = true;
          w25.disabled = true;
          w26.disabled = true;
          w27.disabled = true;
          w28.disabled = true;
          w29.disabled = true;
          w30.disabled = true;
          w31.disabled = true;
          w32.disabled = true;
          w33.disabled = true;
          w34.disabled = true;
          w35.disabled = true;
          w36.disabled = true;
        } else {
          w0.value = "0";
          w1.disabled = false;
          w2.disabled = false;
          w3.disabled = false;
          w4.disabled = false;
          w5.disabled = false;
          w6.disabled = false;
          w7.disabled = false;
        } 
    }); 
});