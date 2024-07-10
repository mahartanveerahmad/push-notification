<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Other Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
</head>
<body>
    
   <span style="font-wight:bold; font-size:40px">Title:</span><span id="selectedOption"></span><br>
    <span style="font-wight:bold; font-size:40px">Author:</span><span id="selectedOption2"></span>

    <script>
        setTimeout(() => {
            window.Echo.channel('postchannel')
                .listen('PostCreatedEvent', (e) => {
                    document.getElementById('selectedOption').innerHTML = `${e.title}`;
                    document.getElementById('selectedOption2').innerHTML = `${e.author}`;
                    toastr.success('Successfully updated'+'<br>Title: '+e.title + '<br>Author: ' + e.author);
                });
        }, 600);
    </script>
</body>
</html>
