<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index13</title>

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
            <h4 class="text-center mt-5">TABLE AJAX DATA</h4>
            {{--
            NOTE: + Click to add more row
                + Click to add more in 1 row
            --}}
            <button id="add-more-row" class="btn btn-success mb-3">Add More Row</button>
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
                    <th>Comment</th>
                    <th>Delete Part</th>
                </tr>
                </thead>
                <tbody id="body-table">
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
                    function rand_color() {
                        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                    }
                    $color1 = '#1545bb';
                    $color2 = '#ab1a8a';
                @endphp

                @for($i = 1; $i <= 5; $i++)
                    <tr class="row-tr row-{{ $i }}" id="row-{{ $i }}" data-id="row-{{$i}}">
                        <th scope="row">{{ $i }}</th>
                        <th scope="row">
                            <input type="checkbox" name="" id="" class="check-row"><br>
                            <button class="btn btn-sm btn-primary clone-row">Clone Row</button>
                            <button class="btn btn-sm btn-warning clone-part">Clone Part</button>
                        </th>
                        <td style="background: {{ rand_color() }};">John - {{ $i }}</td>
                        <td
                            class="last-name"
                            style="background:
                                @php
                                    if(($i % 2) == 0) {
                                        echo $color1;
                                    } else {
                                        echo $color2;
                                    }
                                @endphp
                            "
                        >
                            Doe - {{ $i }}
                        </td>
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
                        <td>
                            <input type="text" value="ABC">
                        </td>
                        <td></td>
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
        $('body').on('click', '.check-row', function () {

            // Get attribute data-id clicked
            let dataId = $(this).closest('.row-tr').data('id');
            console.log('data-id:', dataId);

            // Get age
            let age = $(this).closest('.row-tr').find('.age').text();
            // let age = $(this).parents('.row-tr').find('.age').text();   // SAME
            console.log('age:', age);

            // Get age of next row clicked
            let ageNext = $(this).parents('.row-tr').next().find('.age').text();
            // console.log(ageNext);

            // Get age of previous row clicked
            let agePrevious = $(this).parents('.row-tr').prev().find('.age').text();
            // console.log(agePrevious);


        });

        // Count Member
        function CountMember() {
            let memberCount = 0;
            $('.row-tr').each(function(i, obj) {
                let roleText = $(obj).children().eq(6).text().trim();
                // console.log(roleText);
                if(roleText == 'Member') {
                    memberCount++;
                }
            });
            console.log('memberCount', memberCount);
        }
        CountMember();

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

        // Click to add more row
        $('#add-more-row').on('click', function () {
            let html = `
                <tr class="row-tr row-6" data-id="row-6" id="row-6">
                    <th scope="row">6</th>
                    <th scope="row">
                        <input type="checkbox" name="" id="" class="check-row">
                        <br>
                        <button class="btn btn-sm btn-primary clone-row">Clone Row</button>
                        <button class="btn btn-sm btn-warning clone-part">Clone Part</button>
                    </th>
                    <td>John - 6</td>
                    <td>Doe - 6</td>
                    <td>jdoe6@gmail.com</td>
                    <td class="age">66</td>
                    <td>
                        <button value="" class="btn btn-success role">Member</button>
                    </td>
                    <td>
                        <select class="type" name="" id="">
                            <option value="1">Admin1</option>
                            <option selected value="2">Admin2</option>
                            <option value="3">Admin3</option>
                            <option value="4">Admin4</option>
                            <option value="5">Admin5</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" value="ABC">
                    </td>
                    <td></td>
                </tr>

                <tr class="row-tr row-7" data-id="row-7" id="row-7">
                    <th scope="row">7</th>
                    <th scope="row">
                        <input type="checkbox" name="" id="" class="check-row">
                        <br>
                        <button class="btn btn-sm btn-primary clone-row">Clone Row</button>
                        <button class="btn btn-sm btn-warning clone-part">Clone Part</button>
                    </th>
                    <td>John - 7</td>
                    <td>Doe - 7</td>
                    <td>jdoe7@gmail.com</td>
                    <td class="age">77</td>
                    <td>
                        <button value="" class="btn btn-primary role">User</button>
                    </td>
                    <td>
                        <select class="type" name="" id="">
                            <option value="1">Admin1</option>
                            <option value="2">Admin2</option>
                            <option value="3">Admin3</option>
                            <option selected value="4">Admin4</option>
                            <option value="5">Admin5</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" value="ABC">
                    </td>
                    <td></td>
                </tr>

                <tr class="row-tr row-8" data-id="row-8" id="row-8">
                    <th scope="row">8</th>
                    <th scope="row">
                        <input type="checkbox" name="" id="" class="check-row">
                        <br>
                        <button class="btn btn-sm btn-primary clone-row">Clone Row</button>
                        <button class="btn btn-sm btn-warning clone-part">Clone Part</button>
                    </th>
                    <td>John - 8</td>
                    <td>Doe - 8</td>
                    <td>jdoe8@gmail.com</td>
                    <td class="age">88</td>
                    <td>
                        <button value="" class="btn btn-warning role">Moderator</button>
                    </td>
                    <td>
                        <select class="type" name="" id="">
                            <option value="1">Admin1</option>
                            <option value="2">Admin2</option>
                            <option value="3">Admin3</option>
                            <option value="4">Admin4</option>
                            <option selected value="5">Admin5</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" value="ABC">
                    </td>
                    <td></td>
                </tr>
            `;
            $('#body-table').append(html);
            CountMember();
            CountEachType();
        });

        // Click Clone Row button
        $('body').on('click', '.clone-row', function () {
            let rowTr = $(this).parents('.row-tr');
            rowTr.clone().insertAfter(rowTr);
        });

        // Click Clone Part button
        $('body').on('click', '.clone-part', function () {
            let rowTr = $(this).parents('.row-tr');
            let rowId = rowTr.attr('id');
            let rowTrRowspan = rowTr.children().eq(0).attr('rowspan');
            let lastRow = $('.' + rowId).last();
            let clone = rowTr.clone().insertAfter(lastRow);
            clone.addClass(rowId);

            //Get random color
            let back1 = ["#ff0000","blue","gray"];
            let rand1 = back1[Math.floor(Math.random() * back1.length)];
            clone.css({"backgroundColor": rand1, "color": "white"});
            clone.removeClass('main-row');

            let childTdClones = clone.children();
            // console.log(clone);
            childTdClones.eq(0).remove();
            childTdClones.eq(1).remove();
            childTdClones.eq(2).remove();
            childTdClones.eq(3).remove();
            childTdClones.eq(4).remove();
            childTdClones.eq(5).remove();
            childTdClones.eq(6).remove();
            childTdClones.eq(7).find('select option:selected').removeAttr('selected');
            childTdClones.eq(8).find('input').val('');
            let btn = '<button class="btn btn-sm btn-danger delete-part">Delete Part</button>';
            childTdClones.eq(9).html(btn);

            if(rowTrRowspan) {
                rowTr.children().eq(0).attr('rowspan', parseInt(rowTrRowspan) + 1);
                rowTr.children().eq(1).attr('rowspan', parseInt(rowTrRowspan) + 1);
                rowTr.children().eq(2).attr('rowspan', parseInt(rowTrRowspan) + 1);
                rowTr.children().eq(3).attr('rowspan', parseInt(rowTrRowspan) + 1);
                rowTr.children().eq(4).attr('rowspan', parseInt(rowTrRowspan) + 1);
                rowTr.children().eq(5).attr('rowspan', parseInt(rowTrRowspan) + 1);
                rowTr.children().eq(6).attr('rowspan', parseInt(rowTrRowspan) + 1);

                childTdClones.eq(9).append(parseInt(rowTrRowspan) + 1);
            } else {
                rowTr.children().eq(0).attr('rowspan', 2);
                rowTr.children().eq(1).attr('rowspan', 2);
                rowTr.children().eq(2).attr('rowspan', 2);
                rowTr.children().eq(3).attr('rowspan', 2);
                rowTr.children().eq(4).attr('rowspan', 2);
                rowTr.children().eq(5).attr('rowspan', 2);
                rowTr.children().eq(6).attr('rowspan', 2);

                childTdClones.eq(9).append(2);
            }
        });

        // Click Clone Part button
        $('body').on('click', '.delete-part', function () {
            let rowDelete = $(this).closest('tr');
            let dataId = rowDelete.attr('data-id');
            let mainRow = $('.' + dataId).first();
            let rowSpan = mainRow.children().eq(0).attr('rowspan');
            mainRow.children().eq(0).attr('rowspan', parseInt(rowSpan) - 1);
            mainRow.children().eq(1).attr('rowspan', parseInt(rowSpan) - 1);
            mainRow.children().eq(2).attr('rowspan', parseInt(rowSpan) - 1);
            mainRow.children().eq(3).attr('rowspan', parseInt(rowSpan) - 1);
            mainRow.children().eq(4).attr('rowspan', parseInt(rowSpan) - 1);
            mainRow.children().eq(5).attr('rowspan', parseInt(rowSpan) - 1);
            mainRow.children().eq(6).attr('rowspan', parseInt(rowSpan) - 1);
            rowDelete.remove();
        });

        // Count Last Name by background color
        let color1Count = 0;
        let color2Count = 0;
        $('.last-name').each(function() {
            if($(this).css('background-color') == '#1545bb' || $(this).css('background-color') == 'rgb(21, 69, 187)'){
                color1Count++;
            }
            if($(this).css('background') == '#ab1a8a' || $(this).css('background-color') == 'rgb(171, 26, 138)'){
                color2Count++;
            }
        });
        console.log('color1Count: ', color1Count);
        console.log('color2Count: ', color2Count);

    });
</script>


</body>
</html>
