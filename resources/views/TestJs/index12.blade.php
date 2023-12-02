<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index12</title>

    {{-- Bootstrap Css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    {{-- Font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="text-center mt-5">TABLE FIXED DATA</h4>
                {{--
                NOTE: + Click to add more row
                    + Click to add more in 1 row
                --}}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                <input type="checkbox" name="" id="">
                            </th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Role</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $btnClassArr = ['success', 'danger', 'warning', 'primary'];
                        $adminArr = [
                            '1' => 'Admin1',
                            '2' => 'Admin2',
                            '3' => 'Admin3',
                            '4' => 'Admin4',
                            '5' => 'Admin5',
                        ];
                        $roleArr = [
                            'danger' => 'Admin',
                            'warning' => 'Moderator',
                            'primary' => 'User',
                            'success' => 'Member',
                        ];
                        @endphp

                        @for($i = 1; $i <= 10; $i++)
                            <tr class="row-tr" data-id="row-{{$i}}">
                                <th scope="row">{{ $i }}</th>
                                <th scope="row">
                                    <input type="checkbox" name="" id="" class="check-row">
                                </th>
                                <td>John - {{ $i }}</td>
                                <td>Doe - {{ $i }}</td>
                                <td>jdoe{{ $i }}@gmail.com</td>
                                <td class="age">{{ rand(1, 100) }}</td>
                                <td>
                                    @php
                                        $k1 = array_rand($roleArr);
                                        $v1 = $roleArr[$k1];
                                    @endphp
                                    <button value="{{ $v1 }}" class="btn btn-{{ $k1 }} role">{{ $v1 }}</button>
                                </td>
                                <td>
                                    <select class="type" name="" id="">
                                        @php
                                        $randNum = rand(1, 5);
                                        @endphp
                                        @foreach($adminArr as $key1 => $item1)
                                            <option
                                                value="{{ $key1 }}"
                                                @if($key1 == $randNum) selected @endif
                                            >
                                                {{ $item1 }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('.check-row').on('click', function () {

                // Get attribute data-id clicked
                let dataId = $(this).closest('.row-tr').data('id');
                // console.log(dataId);

                // Get age
                let age = $(this).closest('.row-tr').find('.age').text();
                // let age = $(this).parents('.row-tr').find('.age').text();   // SAME
                // console.log(age);

                // Get age of next row clicked
                let ageNext = $(this).parents('.row-tr').next().find('.age').text();
                // console.log(ageNext);

                // Get age of previous row clicked
                let agePrevious = $(this).parents('.row-tr').prev().find('.age').text();
                // console.log(agePrevious);


            });

            // Count Member
            let memberCount = 0;
            $('.row-tr').each(function(i, obj) {
                let roleText = $(obj).children().eq(6).text().trim();
                // console.log(roleText);
                if(roleText == 'Member') {
                    memberCount++;
                }
            });
            // console.log(memberCount);

            // Count Type when change
            function CountEachType() {
                let admin1Count = 0;
                let admin2Count = 0;
                let admin3Count = 0;
                let admin4Count = 0;
                let admin5Count = 0;
                $('.row-tr').each(function(i, obj) {
                    let typeVal = $(obj).children().eq(7).find('select').val();
                    // console.log(typeVal);

                    switch(typeVal) {
                        case '1':
                            admin1Count++;
                            break;
                        case '2':
                            admin2Count++;
                            break;
                        case '3':
                            admin3Count++;
                            break;
                        case '4':
                            admin4Count++;
                            break;
                        case '5':
                            admin5Count++;
                            break;
                    }

                });
                console.log('admin1:', admin1Count);
                console.log('admin2:', admin2Count);
                console.log('admin3:', admin3Count);
                console.log('admin4:', admin4Count);
                console.log('admin5:', admin5Count);
            }
            $('.type').on('change', function () {
                CountEachType();
            });


        });
    </script>


</body>
</html>
