<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index 9</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />

    {{-- Font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="text-center">JavaScript Arrays</h4>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>

        // Example array
        const array1 = ['hello', 'world', 'welcome'];
        const array2 = new Array("eat", "sleep");   // Same as above, but slow down performance

        // empty array
        const myList = [];

        // array of numbers
        const numberArray = [ 2, 4, 6, 8];

        // array of strings
        const stringArray = [ 'eat', 'work', 'sleep'];

        // array with mixed data types
        const newData = ['work', 'exercise', 1, true];

        // You can also store arrays, functions and other objects inside an array
        const newData2 = [
            {'task1': 'exercise'},
            [1, 2 ,3],
            function hello() { console.log('hello')}
        ];

        const myArray = ['h', 'e', 'l', 'l', 'o'];
        console.log(myArray[0]);  // "h"

        // add an element at the end
        let dailyActivities = ['eat', 'sleep'];
        dailyActivities.push('exercise');
        console.log(dailyActivities); //  ['eat', 'sleep', 'exercise']

        // iterating over the studentsData
        let studentsData2 = [
            ['Jack', 24],
            ['Sara', 23],
        ];
        studentsData2.forEach((student) => {
            student.forEach((data) => {
                console.log(data);
            });
        });

        // forEach with Arrays
        let students = ['John', 'Sara', 'Jack'];
        // using forEach
        students.forEach(myFunction);
        function myFunction(item) {
            console.log('student:', item);
        }

        // with arrow function and callback
        const students2 = ['John', 'Sara', 'Jack'];
        students2.forEach(element => {
            console.log('element:', element);
        });

        // using for loop
        const arrayItems = ['item1', 'item2', 'item3'];
        const copyItems = [];
        for (let i = 0; i < arrayItems.length; i++) {
            copyItems.push(arrayItems[i]);
        }
        console.log('copyItems', copyItems);

        // using forEach
        const arrayItems2 = ['item1', 'item2', 'item3'];
        const copyItems2 = [];
        arrayItems2.forEach(function(item){
            copyItems2.push(item);
        })
        console.log('copyItems2', copyItems2);










        // multidimensional array
        const data = [
            [1, 2, 3],
            [1, 3, 4],
            [4, 5, 6]
        ];
        let studentsData = [
            ['Jack', 24],
            ['Sara', 23],
            ['Peter', 24]
        ];

        // Access Elements of an Array
        let x = [
            ['Jack', 24],
            ['Sara', 23],
            ['Peter', 24]
        ];
        console.log(x[0]); // ["Jack", 24]
        console.log(x[0][0]); // Jack


    </script>
</body>
</html>
