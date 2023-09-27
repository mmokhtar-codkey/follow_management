<!DOCTYPE html>
<html lang="en">
<!-- datatables.html  21 Nov 2019 03:55:21 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>مكتب السيد المحافظ</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/bundles/owlcarousel2/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='images/logo/aswan.png' />
    <style>
        @media print {
            #print_Button {
                display: none;
            }
            #sign_Button {
                display: none;
            }
        }
        #signatur {
            display: block;
        }
        h6{
            font-size: 25px !important;
        }

        .table.table-bordered td{
            padding: 15px 15px !important;
        }

        .table.table-bordered td,
        .table.table-bordered th {
            height: 40px !important;

        }

        h6,
        label {
            color: #000 !important;
        }
    </style>
</head>

<body class="light theme-white dark-sidebar sidebar-gone">
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @include('layouts.sidbar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <form class="needs-validation" novalidate=""
                            action="{{ route('bosta.update', $Gsignatur->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-secondary"
                                        style="border-right: 63px solid #ffa426;border-top:0px;">
                                        <div class="card-header">
                                            <h4> تأشيرة السيد المحافظ </h4>
                                            <div class="card-header-action">
                                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info"
                                                    href="#"><i class="fas fa-minus"></i></a>
                                                <a href="{{ route('bosta.index') }}" class="btn btn-danger"> عودة ->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="card">
                                        <div class="collapse show" id="mycard-collapse">
                                            <div class="card-body">
                                                <div class="owl-carousel owl-theme slider" id="slider1">
                                                    <div><img
                                                            alt="image"src="{{ URL::to('/' . $Gsignatur->posta_file) }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div> --}}
                                    @isset($Gsign)
                                        @foreach ($Gsign as $num => $GS)
                                            <div class="card card-secondary" id="print">
                                                <div class="card-header">
                                                    <h4> جهة الوارد : <span> ( {{ $GS->side_name }})</span> </h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row col-md-12">
                                                        <div class=" col-md-4">
                                                            <h6 style="float: left;"> التاريخ : <span> (
                                                                    {{ $GS->posta_date }} )</span> </h6>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <h6> رقم المكاتبة : <span> ( {{ $GS->posta_num }} )</span>
                                                            </h6>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                    </div>
                                                    <div class="row col-md-12" style="margin-top: -25px;">
                                                        <div class=" col-md-4">
                                                            <h6 style="float: left;"> تاريخ الوارد : <span> (
                                                                    {{ $GS->bosta_recive }} )</span>
                                                            </h6>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <h6> رقم المكتب : <span> ( {{ $GS->posta_office_num }} )</span>
                                                            </h6>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered"
                                                            style="height: 50px !important;">
                                                            <tbody style="height: 50px;">
                                                                @foreach ($Sign_decision as $SD)
                                                                    <tr style="border: 2px solid;">
                                                                        <td class="text-bold-700"
                                                                            style="border-right: 2px solid;width:5%">
                                                                            @if ($SD->mgenral == 'السيد السكرتير العام')
                                                                                <input type="checkbox" checked
                                                                                    name="mgenral"
                                                                                    value="السيد السكرتير العام"
                                                                                    style="width: 35px;height: 35px;"  disabled>
                                                                            @else
                                                                                <input type="checkbox" name="mgenral"
                                                                                    value="السيد السكرتير العام"
                                                                                    style="width: 35px;height: 35px;" disabled>
                                                                            @endif

                                                                        </td>
                                                                        <td class="text-bold-700"
                                                                            style="border-right: 2px solid;">
                                                                            <h6> السيد السكرتير العام </h6>
                                                                        </td>
                                                                        <td class="text-bold-700"
                                                                            style="border-right: 2px solid;width:5%">
                                                                            @if ($SD->mgenral_state == 1)
                                                                                <input type="radio" checked
                                                                                    name="mgenral_state" value="1"
                                                                                    style="width: 35px;height: 35px;" disabled>
                                                                            @else
                                                                                <input type="radio" name="mgenral_state"
                                                                                    value="1"
                                                                                    style="width: 35px;height: 35px;" disabled>
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-bold-700"
                                                                            style="border-right: 2px solid;width:5%">
                                                                            @if ($SD->govice == 'السيد نائب المحافظ')
                                                                                <input type="checkbox" checked
                                                                                    name="govice"
                                                                                    value="السيد نائب المحافظ"
                                                                                    style="width: 35px;height: 35px;" disabled>
                                                                            @else
                                                                                <input type="checkbox" name="govice"
                                                                                    value="السيد نائب المحافظ"
                                                                                    style="width: 35px;height: 35px;" disabled>
                                                                            @endif
                                                                        </td>
                                                                        <td class="text-bold-700">
                                                                            <h6> السيد نائب المحافظ </h6>
                                                                        </td>
                                                                        <td class="text-bold-700"
                                                                            style="border-right: 2px solid;width:5%">
                                                                            @if ($SD->govice_state == 1)
                                                                                <input type="radio" checked
                                                                                    name="govice_state" value="1"
                                                                                    style="width: 35px;height: 35px;" disabled>
                                                                            @else
                                                                                <input type="radio" name="govice_state"
                                                                                    value="1"
                                                                                    style="width: 35px;height: 35px;"disabled>
                                                                            @endif
                                                                        </td>

                                                                    </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div>
                                                        <br>
                                                        <h6> <span> ( الجهات المعنية )</span> </h6>
                                                        <br>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tbody>
                                                                @isset($side)
                                                                    @foreach ($side as $GS)
                                                                        <tr style="border: 2px solid;">
                                                                            <td class="text-bold-700"
                                                                                style="border-right: 2px solid;width:5%">
                                                                                @foreach ($GS->posta_state as $ps)
                                                                                    @if ($ps->bosta_id == $GS->id)
                                                                                        <input type="checkbox" checked name="side_mean[]" value="{{ $GS->side_mean }}" style="width: 35px;height: 35px;" disabled>
                                                                                    @else
                                                                                        <input type="checkbox" name="side_mean[]" value="{{ $GS->side_mean }}"style="width: 35px;height: 35px;" disabled>
                                                                                    @endif
                                                                                @endforeach
                                                                            </td>

                                                                            <td class="text-bold-700">
                                                                                <h6> {{ $GS->side_mean }}</h6>
                                                                            </td>
                                                                            <td class="text-bold-700" style="border-left: 2px solid;width:5%">
                                                                                @foreach ($GS->posta_prority as $pp)
                                                                                    @if ($pp->bosta_id == $GS->id)
                                                                                    <input type="checkbox" checked name="priority[]" value="1" style="width: 35px;height: 35px;" disabled>
                                                                                       @else
                                                                                       <input type="checkbox" name="priority[]" value="1" style="width: 35px;height: 35px;" disabled>
                                                                                       @endif
                                                                                @endforeach

                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endisset
                                                                @isset($other)
                                                                    @foreach ($other as $others)
                                                                        <tr style="border: 2px solid;">
                                                                            <td class="text-bold-700" style="border-right: 2px solid;width:5%">
                                                                                <input type="checkbox" checked value="{{ $others->state }}"  style="width: 35px;height: 35px;" disabled>
                                                                            </td>
                                                                            <td class="text-bold-700">
                                                                                <h6> {{ $others->side_mean }}</h6>
                                                                            </td>
                                                                            <td class="text-bold-700" style="border-left: 2px solid;width:5%">
                                                                                @if ($others->prority == 1 )
                                                                                <input type="checkbox" checked  style="width: 35px;height: 35px;" disabled>
                                                                                    @else
                                                                                    <input type="checkbox" style="width: 35px;height: 35px;" disabled>
                                                                                    @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endisset
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <br>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="font-size: 25px;"> قرار السيد الوزير المحافظ </label>
                                                            @foreach ($Sign_decision as $Sign_decisions)
                                                                <textarea class="form-control" cols="10" rows="5" name="vice_decision" style="text-align: right;font-size: 20px;                                                                " disabled> {{ $Sign_decisions->vice_decision }} </textarea>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-row">
                                                        <div class="form-group col-2"
                                                            style=" border-radius: 100px;border: 1px solid #000; height: 175px;">
                                                            <h6 style="text-align: center;margin-top: 35px;">متابعة</h6>
                                                            @foreach ($Sign_decision as $Sign_decisions)
                                                                <input class="form-control" type="date" lang="fr-CA"
                                                                    name="follow_date"
                                                                    value="{{ $Sign_decisions->follow_date }}"
                                                                    style="border: 0px; border-bottom: 1px solid;font-size: 20px !important;
                                                                    text-align: center !important;" disabled>
                                                            @endforeach
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            @foreach ($sign as $signs)
                                                                <div id="signatur"><img
                                                                        alt="image"src="{{ URL::to($signs->signature) }}" width: -webkit-fill-available;>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        {{-- <button type="button" class="btn btn-primary"
                                                            onclick="myFunction()" id="sign_Button"> اضافة توقيع </button> --}}
                                                            <button type="button" class="btn btn-danger" id="print_Button" onclick="printDiv()">  طباعة التأشيرة </button>

                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                @include('layouts.setting')
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/owlcarousel2/dist/owl.carousel.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/owl-carousel.js"></script>
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif

    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>
    <script>
        function myFunction() {
            document.getElementById("signatur").style.display = "block";
        }

        function myFunction2() {
            document.getElementById("signatur").style.display = "none";
        }
    </script>
</body>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->

</html>
