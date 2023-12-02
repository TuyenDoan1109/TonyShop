<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index14</title>

    {{-- Bootstrap Css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    {{-- Font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('TestJS/Css/style14.css') }}">
</head>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        {{-- TABLE LEFT --}}
                        <div class="col-6">
                            <h4 class="text-center mt-5">TABLE LEFT</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody id="tableLeft">
                                    @for($i = 1; $i <= 20; $i++)
                                        <tr style="background: #28a745;">
                                            <th scope="row">
                                                <i class="fas fa-arrows-alt handle"></i>
                                            </th>
                                            <td>John - {{ $i }}</td>
                                            <td>Doe - {{ $i }}</td>
                                            <td>jdoe{{ $i }}@gmail.com</td>
                                        </tr>
                                    @endfor

                                </tbody>
                            </table>
                        </div>
                        {{-- END TABLE LEFT --}}

                        {{-- TABLE RIGHT --}}
                        <div class="col-6">
                            <h4 class="text-center mt-5">TABLE RIGHT</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody id="tableRight">
                                    <tr>
                                        <td colspan="4">
                                            <div class="d-flex">
                                                <input type="text" class="mr-5" value="1">
                                                <button class="btn btn-sm btn-danger">X</button>
                                            </div>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">
                                            <div class="d-flex">
                                                <input type="text" class="mr-5" value="2">
                                                <button class="btn btn-sm btn-danger">X</button>
                                            </div>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- END TABLE RIGHT --}}

                    </div>
                </div>
            </div>

        </div>

        {{-- JS --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

        <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

        <script>

        </script>

    </body>
</html>
