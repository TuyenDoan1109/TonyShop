<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Index8</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bevacqua/dragula@3.7.3/dist/dragula.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/bevacqua/dragula@3.7.3/dist/dragula.min.js"></script>
        <script src="{{ asset('TestJs/Js/script8.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('TestJs/Css/style8.css') }}">

    </head>
    <body onload="init()">
        {{--
         SOURCE: https://www.youtube.com/watch?v=4Mo340tYlPw
         --}}
        <div id="dragParentParent">
            <div id="dragparent">
                <div class="dragthing">
                    Lorem ipsum dolor sit amet.
                </div>

                <div class="dragthing">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, vitae!
                </div>

                <div class="dragthing">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam incidunt inventore iste maiores nemo obcaecati odio quis sint sunt velit.
                </div>

                <div class="dragthing">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cum doloribus earum esse exercitationem explicabo nostrum, placeat quaerat. Aliquid, animi assumenda cumque dignissimos numquam quam vitae. Blanditiis obcaecati quisquam ullam?
                </div>
            </div>

            <div id="dragparent2">
                <div class="dragthing2">
                    Lorem ipsum dolor sit amet.
                </div>

                <div class="dragthing2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, vitae!
                </div>

                <div class="dragthing2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam incidunt inventore iste maiores nemo obcaecati odio quis sint sunt velit.
                </div>

                <div class="dragthing2">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cum doloribus earum esse exercitationem explicabo nostrum, placeat quaerat. Aliquid, animi assumenda cumque dignissimos numquam quam vitae. Blanditiis obcaecati quisquam ullam?
                </div>
            </div>
        </div>


    </body>
</html>
