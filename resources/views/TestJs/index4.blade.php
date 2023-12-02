<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Index4</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Unicons CDN Link for Icons -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
        <link rel="stylesheet" href="{{ asset('TestJs/Css/style4.css') }}">
    </head>
<body>

    {{--
     Source code: https://www.codingnepalweb.com/tags-input-box-html-javascript/

     --}}
    <div class="wrapper">
        <div class="title">
            <img src="{{ asset('TestJs/Images/index4/tag.svg') }}" alt="icon">
            <h2>Tags</h2>
        </div>
        <div class="content">
            <p>Press enter or add a comma after each tag</p>
            <ul><input type="text" spellcheck="false"></ul>
        </div>
        <div class="details">
            <p><span>10</span> tags are remaining</p>
            <button>Remove All</button>
        </div>
    </div>
    <script src="{{ asset('TestJs/Js/script4.js') }}"></script>
</body>
</html>
