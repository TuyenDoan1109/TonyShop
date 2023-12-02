<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index2</title>

    {{-- Bootstrap Css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    {{-- Slick Css --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    {{-- Font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>

        #div-1{
            width:500px;
            height: 500px;
            border:2px solid orange;
            box-sizing: border-box;
            margin: auto;
        }
        #div-2{
            width:200px;
            height: 200px;
            border:2px solid orange;
            margin-top: 20px;
        }
        #div-3{
            width:200px;
            height: 200px;
            border:2px solid orange;
            margin-bottom: 20px;
        }
        #div-container{
            width:300px;
            height: 300px;
            border:2px solid green;
        }
        .div-child{
            width:100px;
            height: 100px;
            border:2px solid yellow;
            background: #0ab39c;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="div-1" class="comment">
            <p class="mb-2">Div 1</p>
            <button id="add-div-1" class="mb-2">Add div</button>
            <div id="div-container">
{{--                <div class="div-child">div child 1<i class="fa-solid fa-ellipsis"></i></div>--}}
{{--                <div class="div-child">div child 2</div>--}}
{{--                <div class="div-child">div child 3</div>--}}
{{--                <div class="div-child">div child 4</div>--}}
            </div>
        </div>
        <div id="div-2" class="comment">
            Div 2
            <!-- MODAL TRIGGER -->
            <h4 class="text-center mt-5">MODAL TRIGGER</h4>
{{--            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Launch Modal</button>--}}
            <i class="fa-solid fa-ellipsis" data-toggle="modal" data-target="#myModal"></i>

            <!-- MODAL -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal Title</h5>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus unde veniam harum magnam molestias dignissimos omnis
                            architecto, quod, obcaecati dolorum debitis dolore porro qui, iusto quo accusantium voluptates pariatur illo.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="div-3" class="comment">Div 3</div>
    </div>




    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    {{-- Slick Js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function(){

            $(".comment").on('click', function () {
                // console.log(45345345);
            });

            $('#add-div-1').on('click', function () {
                let html = `
                    <div class="div-child">div child 1<i class="fa-solid fa-ellipsis" data-toggle="modal" data-target="#myModal"></i></div>
                    <div class="div-child">div child 2</div>
                    <div class="div-child">div child 3</div>
                    <div class="div-child">div child 4</div>
                `;
                let divContainer = $('#div-container');
                divContainer.html(html);

                $('#div-container').slick('unslick');
                $('#div-container').slick({
                    arrows: false,
                    infinite: false,
                });
            });

            $('#div-container').slick({
                arrows: false,
                infinite: false,
            });

            $('body').on('change', '#div-container', function () {
                console.log(4545453453453);
            });

        });
    </script>


</body>
</html>
