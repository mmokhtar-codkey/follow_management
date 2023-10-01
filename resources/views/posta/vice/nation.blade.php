@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    @include('layouts.success')
    @include('layouts.error')
    <div class="row" style="direction: rtl">
        <div class="col-12 col-md-12 col-lg-12">
            <form class="needs-validation" action="{{ route('CatNation.create') }}" method="POST"enctype="multipart/form-data">
                @csrf
                <div class="card card-primary">
                    <div class="card-header">
                        <h4> اضافة تعاون دولي </h4>
                        <div class="card-header-action">
                            <a href="{{ route('nationVice.index') }}" class="btn btn-warning"> الكل
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card card-secondary">
                    <div class="card-body " id="work_experience">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> الإسم </label>
                                <input style="height: calc(2.25rem + 6px);" type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row" style="direction: rtl">
        <div class="col-12 col-md-12 col-lg-12">
            <form class="needs-validation" novalidate="" action="{{ route('nationVice.create') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card card-secondary">
                    <div class="card-body " id="work_experience">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> عنوان </label>
                                <input style="height: calc(2.25rem + 6px);" type="text"
                                    name="title"  class="form-control" id="title" value="{{ old('title') }}">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> القسم الرئيسي </label>
                                <select class="form-control" name="ncategory_id">
                                    <option value="" disabled selected>اختر </option>
                                    @isset($cat_nation)
                                        @if ($cat_nation && $cat_nation->count() > 0)
                                            @foreach ($cat_nation as $catnation)
                                                <option value="{{ $catnation->id }}">
                                                    {{ $catnation->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    @endisset
                                </select>

                                @error('ncategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label> بشأن </label>
                                <textarea  cols="3" rows="3" type="text"
                                    name="description" id="description"  class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> التاريخ </label>
                                <input style="height: calc(2.25rem + 6px);" type="date"
                                    name="date" class="form-control" id="date" value="{{ old('date') }}">
                                    @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label> الملف الوارد </label>
                                <input style="height: calc(2.25rem + 6px);" multiple type="file"
                                    name="attach[]" accept="image/*" class="form-control" >
                                    @error('attach')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">حفظ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    {{-- <script>
        function addWorkRow() {
            var elements = document.getElementsByClassName('work-xp-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("work-xp").length < 4) {
                const div = document.createElement('div');
                div.className = 'form-row';
                div.innerHTML =
                    `
            <div class="form-group col-md-11">
                <input type="text" class="form-control" name="name[]" placeholder=" اسم الجهة الفرعية ">
            </div>
                <input type="button" class="btn btn-danger" style="width:50px; height: 35px;" value="x" onclick="removeWorkRow(this)" /> `;;
                document.getElementById('work_experience').appendChild(div);
                if (document.getElementsByClassName("work-xp").length == 4) {
                    document.getElementById("addWork-btn").style.display = "none";
                }
                if (document.getElementsByClassName("work-xp").length != 4) {
                    document.getElementById("addWork-btn").style.display = "block";
                }
            } else {
                alert("برجاء ملء البيانات!");
            }
        }

        function removeWorkRow(input) {
            confirm("متأكد؟") ? document.getElementById('work_experience').removeChild(input.parentNode) : 0;
            if (document.getElementsByClassName("work-xp").length != 4) {
                document.getElementById("addWork-btn").style.display = "block";
            }
        }
    </script>
    <script>
        $('.option').hide();
        $('#city').on('change', function(e) {
            $('.option').hide();
            $('.city-' + e.target.value).show();
        });
    </script> --}}
@endsection
