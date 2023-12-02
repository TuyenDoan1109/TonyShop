<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index3</title>
    <style>
        div{width:100px; height: 100px; border:2px solid orange;}
    </style>
</head>
<body>
<div id="myElement">dblclick event</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('body').on('dblclick', '#myElement', function (e){
            e.stopPropagation();
            console.log(5555555555);
        });
    });
</script>


</body>
</html>
