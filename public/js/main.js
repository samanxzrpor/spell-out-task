
  jQuery(document).ready(function(){
    jQuery('#form').submit(function(e){
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
       jQuery.ajax({
          url: "{{ route('convrt) }}",
          method: 'post',
          data: {
             name: jQuery('#name').val(),
             type: jQuery('#type').val(),
             price: jQuery('#price').val()
          },
          success: function(result){
             console.log(result);
          }});
       });
    });



$(document).ready(function () {

    $("#form").submit(function (event) {

        event.preventDefault();

      let formData = {
        number: $("#number").val(),
        language: $("#language").val(),
      };

      $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  
      
      $.ajax({

        type: "POST",
        url: $("#form").attr("action"),
        data: formData,
        dataType: "json",
        encode: true,
        success: function(response) { 

            alert(response);
            // $("#res").html(response);
        },
      });
  
    });
  });