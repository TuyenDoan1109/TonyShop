<!-- Jquery JS-->
<script src="{{asset('backend/vendor/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap JS-->
<script src="{{asset('backend/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

<!-- Vendor JS       -->
<script src="{{asset('backend/vendor/slick/slick.min.js')}}"></script>
<script src="{{asset('backend/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('backend/vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('backend/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('backend/vendor/counter-up/jquery.counterup.min.js')}}"></script>
<script src="{{asset('backend/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('backend/vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{asset('backend/vendor/select2/select2.min.js')}}"></script>

@yield('customJs')

<!-- SweetAlert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Main JS-->
<script src="{{asset('backend/js/main.js')}}"></script>

<script>
    @if(session('alert-error'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: "{{session('alert-error')}}",
            timerProgressBar: true,
            timer: 3000,
            showCloseButton: false,
            showConfirmButton: false,
        });
    @endif

    @if(session('alert-success'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{session('alert-success')}}",
            timerProgressBar: true,
            timer: 3000,
            showCloseButton: false,
            showConfirmButton: false,
        });
    @endif

    $(document).ready(function(){
        $('.submitDeleteForm').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents().children('form');
            Swal.fire({
                title: '',
                text: "Bạn có chắc chắn muốn xoá không ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Có',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            });
        });
    });


</script>
