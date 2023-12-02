<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        {{-- Bootstrap Css --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        {{-- Font-awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            #myElement{width:100px; height: 100px; border:2px solid orange;}
        </style>
    </head>
<body>
    <div class="container">
        <h3 style="text-align: center">Click-and-hold in jQuery</h3>
        <div id="myElement">Hold and see in console</div>
    </div>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            (function($) {
                function startTrigger(e) {
                    var $elem = $(this);
                    $elem.data('mouseheld_timeout', setTimeout(function() {
                        $elem.trigger('mouseheld');
                    }, e.data));
                }

                function stopTrigger() {
                    var $elem = $(this);
                    clearTimeout($elem.data('mouseheld_timeout'));
                }


                var mouseheld = $.event.special.mouseheld = {
                    setup: function(data) {
                        // the first binding of a mouseheld event on an element will trigger this
                        // lets bind our event handlers
                        var $this = $(this);
                        $this.bind('mousedown', +data || mouseheld.time, startTrigger);
                        $this.bind('mouseleave mouseup', stopTrigger);
                    },
                    teardown: function() {
                        var $this = $(this);
                        $this.unbind('mousedown', startTrigger);
                        $this.unbind('mouseleave mouseup', stopTrigger);
                    },
                    time: 750 // default to 750ms
                };
            })(jQuery);

            // usage
            $("#myElement").bind('mouseheld', function(e) {
                console.log('Held', e);
            })
        });
    </script>
</body>
</html>
