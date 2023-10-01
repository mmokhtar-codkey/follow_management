@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="assets/bundles/owlcarousel2/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="assets/bundles/owlcarousel2/dist/assets/owl.theme.default.min.css">
@endsection
@section('content')

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4> تعليمات سيادة المحافظ </h4>
                    </div>
                    <div class="card-body" style="direction: rtl">
                        <form class="needs-validation" action="{{ route('vicecommnt_media.create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <input type="text" value="{{ $media->id }}" name="media_id" hidden>
                                <div class="form-group col-md-12">
                                    <label> تعليمات معالي الوزير / المحافظ</label>
                                    <select class="form-control select2" id="project" name="comment"
                                        style="width: 100%;">
                                        <option value="" disabled selected> اختر من التعليمات
                                        </option>
                                        <option value="تصديق"> تصديق </option>
                                        <option value="إرسال للجهات الخرجية "> إرسال للجهات الخرجية </option>
                                        <option value="إعتذار "> إعتذار </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label> تعليمات اخري </label>
                                    <textarea name="other" cols="3" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="float: right;">حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h4> {{ $media->title }} </h4>
                    </div>
                    <div class="card-body">
                        <span class="date pull-left">تاريخ : {{ $media->date }}</span>
                        <h4 style="color: #000;"> {{ $media->description }} : بشأن </h5>
                    </div>
                </div>
                <div class="card card-secondary">
                    <div class="card-body">
                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                            @isset($media)
                                @foreach (explode('|', $media->attach) as $file)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <a href="{{ URL::to('vice/media/' . $file) }}" data-sub-html="Demo Description">
                                            <img class="img-responsive thumbnail" src="{{ URL::to('vice/media/' . $file) }}"
                                                alt="" style="width: 100%;
                                                height: 85%; border-radius: 5px;">
                                        </a>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            toastr.success("{{ Session::get('error') }}");
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('table.table').DataTable();
        });
    </script>
    <!-- Custom JS File -->
    <script src="assets/bundles/owlcarousel2/dist/owl.carousel.min.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/page/owl-carousel.js"></script>
    <script src="assets/bundles/lightgallery/dist/js/lightgallery-all.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/light-gallery.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        function hola() {
            var mselect = document.getElementById("mselect");
            var mselectvalue = mselect.options[mselect.selectedIndex].value;
            var mdivside = document.getElementById("import_side");
            var mdivinside = document.getElementById("import_inside");


            if (mselectvalue == 1) {
                mdivside.style.display = "block";
                mdivtwo.style.display = "none";

            } else {
                mdivone.style.display = "none";
                mdivtwo.style.display = "block";

            }
        }
    </script>
    <script>
        function myFunction() {
            document.getElementById("import_side").style.display = "none";
            document.getElementById("import_inside").style.display = "block";
        }

        function myFunction2() {
            document.getElementById("import_side").style.display = "block";
            document.getElementById("import_inside").style.display = "none";
        }
    </script>
@endsection
