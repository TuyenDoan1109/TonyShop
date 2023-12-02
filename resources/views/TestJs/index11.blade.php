<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Index 11</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('TestJS/Css/style11.css') }}">
    </head>
    <body>
        <div class="container">

            {{-- Simple list --}}
            <div class="row">
                <div class="col">
                    <h4 class="text-center">Table 1 ( Simple list )</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="simpleList">
                            @for($i = 1; $i <= 10; $i++)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>TOM - {{ $i }}</td>
                                    <td>Doe</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">level 1</option>
                                            <option value="">level 2</option>
                                            <option value="">level 3</option>
                                            <option value="">level 4</option>
                                        </select>
                                    </td>
                                </tr>
                            @endfor


                        </tbody>
                    </table>
                </div>
            </div>
            {{-- END Simple list --}}

            <br>
            <br>
            <hr>
            <hr>
            <br>
            <br>

            {{-- Shared lists --}}
            <h4 class="text-center">Shared lists</h4>
            <div class="row">
                {{-- table 2.1 --}}
                <div class="col-6">
                    <h6>Table 2.1</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="example2Left">
                            @for($i = 1; $i <= 5; $i++)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>John - {{ $i }}</td>
                                    <td>Doe</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">level 1</option>
                                            <option value="">level 2</option>
                                            <option value="">level 3</option>
                                            <option value="">level 4</option>
                                        </select>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                {{-- table 2.2 --}}
                <div class="col-6">
                    <h6>Table 2.2</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="example2Right">
                            @for($i = 1; $i <= 5; $i++)
                                <tr style="background: #0ab39c">
                                    <th scope="row">{{ $i }}</th>
                                    <td>Mary - {{ $i }}</td>
                                    <td>Doe</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">level 1</option>
                                            <option value="">level 2</option>
                                            <option value="">level 3</option>
                                            <option value="">level 4</option>
                                        </select>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- END Shared lists --}}

            <br>
            <br>
            <hr>
            <hr>
            <br>
            <br>

            {{-- Cloning --}}
            <h4 class="text-center">Cloning</h4>
            <div class="row">
                {{-- table 3.1 --}}
                <div class="col-6">
                    <h4>Table 3.1</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="example3Left">
                            @for($i = 1; $i <= 5; $i++)
                                <tr style="background: #eecf31">
                                    <th scope="row">{{ $i }}</th>
                                    <td>Tuyn - {{ $i }}</td>
                                    <td>Doe</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">level 1</option>
                                            <option value="">level 2</option>
                                            <option value="">level 3</option>
                                            <option value="">level 4</option>
                                        </select>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                {{-- table 2.2 --}}
                <div class="col-6">
                    <h4>Table 3.2</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="example3Right">
                            @for($i = 1; $i <= 5; $i++)
                                <tr style="background: #4bbd52">
                                    <th scope="row">{{ $i }}</th>
                                    <td>Kin - {{ $i }}</td>
                                    <td>Doe</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">level 1</option>
                                            <option value="">level 2</option>
                                            <option value="">level 3</option>
                                            <option value="">level 4</option>
                                        </select>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- END Cloning --}}

            <br>
            <br>
            <hr>
            <hr>
            <br>
            <br>

            {{-- Handle  --}}
            <div class="row">
                <div class="col">
                    <h4 class="text-center">Table 4 ( Handle )</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                            <tbody id="example5">
                            @for($i = 1; $i <= 5; $i++)
                                <tr style="background: #ada2dc">
                                    <th scope="row">
                                        <i class="fas fa-arrows-alt handle"></i>
                                    </th>
                                    <td>TOM - {{ $i }}</td>
                                    <td>Doe</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">level 1</option>
                                            <option value="">level 2</option>
                                            <option value="">level 3</option>
                                            <option value="">level 4</option>
                                        </select>
                                    </td>
                                </tr>
                            @endfor


                            </tbody>
                    </table>
                </div>
            </div>
            {{-- END Handle  --}}

            <br>
            <br>
            <hr>
            <hr>
            <br>
            <br>

            {{-- Filter  --}}
            <div class="row">
                <div class="col">
                    <h4 class="text-center">Table 5 ( Filter )</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="example6">
                            @for($i = 1; $i <= 5; $i++)
                                <tr
                                    @if($i == 2)
                                        style="background: red;"
                                        class="filtered"
                                    @else
                                        style="background: #ada2dc;"
                                    @endif
                                >
                                    <th scope="row">{{ $i }}</th>
                                    <td>TOM - {{ $i }}</td>
                                    <td>Doe</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">level 1</option>
                                            <option value="">level 2</option>
                                            <option value="">level 3</option>
                                            <option value="">level 4</option>
                                        </select>
                                    </td>
                                </tr>
                            @endfor


                        </tbody>
                    </table>
                </div>
            </div>
            {{-- END Filter  --}}

            <br>
            <br>
            <hr>
            <hr>
            <br>
            <br>

            {{-- Grid --}}
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Grid</h2>
                    <div id="gridDemo" class="box-contain d-flex flex-wrap p-3" style="height: 600px; border: #e4606d solid 1px; align-content: space-around;">
                        @for($i = 1; $i <= 25; $i++)
                            <div class="box mr-2 p-3" style="width: 100px; height: 100px; border: #0e51cb solid 1px">Box {{ $i }}</div>
                        @endfor
                    </div>
                </div>
            </div>
            {{-- END Grid --}}

            <br>
            <br>
            <hr>
            <hr>
            <br>
            <br>

            {{-- MultiDrag --}}
            <div class="row">
                <div class="col">
                    <h2 class="text-center">MultiDrag</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="multiDragDemo">
                            @for($i = 1; $i <= 15; $i++)
                                <tr style="background: #2dc7b4">
                                    <th scope="row">{{ $i }}</th>
                                    <td>JONNY - {{ $i }}</td>
                                    <td>Doe</td>
                                    <td>
                                        <select name="" id="">
                                            <option value="">level 1</option>
                                            <option value="">level 2</option>
                                            <option value="">level 3</option>
                                            <option value="">level 4</option>
                                        </select>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>

                </div>
            </div>
            {{-- END MultiDrag --}}

            <br>
            <br>
            <hr>
            <hr>
            <br>
            <br>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

        <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

        <script>

            // Simple list
            Sortable.create(simpleList, {
                animation: 150,
                ghostClass: 'blue-background-class'
            });
            // END Simple list

            // Shared lists
            new Sortable(example2Left, {
                group: 'shared', // set both lists to same group
                animation: 150
            });

            new Sortable(example2Right, {
                group: 'shared',
                animation: 150
            });
            // END Shared lists

            // Cloning
            new Sortable(example3Left, {
                group: {
                    name: 'shared',
                    pull: 'clone' // To clone: set pull to 'clone'
                },
                animation: 150
            });

            new Sortable(example3Right, {
                group: {
                    name: 'shared',
                    pull: 'clone'
                },
                animation: 150
            });
            // END Cloning

            // Handle
            new Sortable(example5, {
                handle: '.handle', // handle's class
                animation: 150
            });
            // END Handle

            // Filter
            new Sortable(example6, {
                filter: '.filtered', // 'filtered' class is not draggable
                animation: 150
            });
            // END Filter

            // Grid demo
            new Sortable(gridDemo, {
                animation: 150,
                ghostClass: 'blue-background-class'
            });
            // END Grid demo

            // MultiDrag demo
            new Sortable(multiDragDemo, {
                multiDrag: true,
                selectedClass: 'selected',
                fallbackTolerance: 3, // So that we can select items on mobile
                animation: 150
            });
            // END MultiDrag demo

        </script>


    </body>
</html>
