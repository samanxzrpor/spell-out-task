<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Spill</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="card-div">
        <div class="title">عدد مورد نظر را وارد کنید</div>
        <form id="form" >
            @csrf
            <div class="fields">
                <div class="number">
                    <input type="text" name="number" class="number-input" placeholder="Number">
                </div>
                <div class="language">
                    <input type="text" name="language" class="language-input" placeholder="Language">
                </div>
            </div>

            <div class="res">

            </div>
            <input type="submit" class="spill-button" value="Change">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
  
   $("#form").on('submit' ,function(e){
 
       e.preventDefault();

       var data = $('form').serialize();

       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       $.ajax({
          url: "{{ route('convert')}}",
          type: "post",
          dataType: 'json',
          data: data,
          success: function(data, text){
            console.log(data);
          },
          error : function(request, status, error){
            console.log(request);
          }
       });
 
   });
</script>
</body>
</html>