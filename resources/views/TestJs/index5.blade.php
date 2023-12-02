<!DOCTYPE html>
<html lang="en">

<head>
    <title>Index5</title>
    <style>
        .tags-input {
            display: inline-block;
            position: relative;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            box-shadow: 2px 2px 5px #00000033;
            width: 50%;
        }

        .tags-input ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .tags-input li {
            display: inline-block;
            background-color: #f2f2f2;
            color: #333;
            border-radius: 20px;
            padding: 5px 10px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .tags-input input[type="text"] {
            border: none;
            outline: none;
            padding: 5px;
            font-size: 14px;
        }

        .tags-input input[type="text"]:focus {
            outline: none;
        }

        .tags-input .delete-button {
            background-color: transparent;
            border: none;
            color: #999;
            cursor: pointer;
            margin-left: 5px;
        }
    </style>
</head>

<body>

    {{--
    SOURCE: https://www.geeksforgeeks.org/how-to-create-tags-input-box-in-html-css-and-javascript/
    --}}
    <div class="tags-input">
        <ul id="tags"></ul>
        <input type="text" id="input-tag" placeholder="Enter tag name" />
    </div>

    <script>

        // Get the tags and input elements from the DOM
        const tags = document.getElementById('tags');
        const input = document.getElementById('input-tag');

        // Add an event listener for keydown on the input element
        input.addEventListener('keydown', function (event) {

            // Check if the key pressed is 'Enter'
            if (event.key === 'Enter') {

                // Prevent the default action of the keypress
                // event (submitting the form)
                event.preventDefault();

                // Create a new list item element for the tag
                const tag = document.createElement('li');

                // Get the trimmed value of the input element
                const tagContent = input.value.trim();

                // If the trimmed value is not an empty string
                if (tagContent !== '') {

                    // Set the text content of the tag to
                    // the trimmed value
                    tag.innerText = tagContent;

                    // Add a delete button to the tag
                    tag.innerHTML += '<button class="delete-button">X</button>';

                    // Append the tag to the tags list
                    tags.appendChild(tag);

                    // Clear the input element's value
                    input.value = '';
                }
            }
        });

        // Add an event listener for click on the tags list
        tags.addEventListener('click', function (event) {

            // If the clicked element has the class 'delete-button'
            if (event.target.classList.contains('delete-button')) {

                // Remove the parent element (the tag)
                event.target.parentNode.remove();
            }
        });
    </script>
</body>

</html>








