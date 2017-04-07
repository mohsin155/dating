// Google Analytics Event tracking codes - jQuery must be installed
// UNIVERSAL TRACKING CODE EXAMPLE: ga('send', 'event', 'category', 'action', 'opt_label', opt_value, {'nonInteraction': 1});
// The codes below are common examples and can be modified, combined or added to as needed

 $('#country').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('api/get-state-list')}}?country_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $("#state").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    $('#state').on('change',function(){
    var stateID = $(this).val();    
    if(stateID){
        $.ajax({
           type:"GET",
           url:"{{url('api/get-city-list')}}?state_id="+stateID,
           success:function(res){               
            if(res){
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#city").empty();
    }
        
   });
   
$(document).ready(function(){ 

//FIND links ending in .pdf

$('a[href$="pdf"]').each(function() {

// ADD GA tracking code to links
$(this).attr('onclick', "ga('send', 'event', 'PDF', 'Clicked', jQuery(this).attr('href'), {'nonInteraction': 1});");
$(this).attr('target', '_blank'); // OPTIONAL: ADD target blank
});

//FIND links to DOCs, XLS, PPT if used

$('a[href$=".doc"], a[href$=".docx"], a[href$=".xls"], a[href$=".xlsx"], a[href$=".ppt"], a[href$=".pptx"]').each(function() {

// ADD GA tracking code to links
$(this).attr('onclick', "ga('send', 'event', 'Media', 'Clicked', jQuery(this).attr('href'), {'nonInteraction': 1});");
}); 

//FIND links that start with http

$('a[href^="http"]').each(function() {

// ADD GA tracking code to links
$(this).attr('onclick', "ga(jQuery(this).attr('subscribe'), {'nonInteraction': 1});");
$(this).attr('target', '_blank'); // OPTIONAL: ADD target blank
});


 // Gets a reference to the form element, assuming 
 // it contains the id attribute "signup-form". 
 var form = document.getElementById('mc-embedded-subscribe-form');
 // Adds a listener for the "submit" event.
 form.addEventListener('submit', function(event) { 
// Prevents the browser from submiting the form 
// and thus unloading the current page. 
event.preventDefault();
// Sends the event to Google Analytics and 
// resubmits the form once the hit is done.
ga('send', 'event', 'Signup Form', 'submit', { hitCallback: function()
{ form.submit(); }
});
});
}); 