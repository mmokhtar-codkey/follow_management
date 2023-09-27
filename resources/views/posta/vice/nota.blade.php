@extends('layouts.admin')
@section('css')
    <style>
        #btn {
            width: 100%;
            height: 100%;
        }
        #one {
            display: none;
        }

        #two {
            display: none;
        }
    </style>
@endsection
@section('content')
    @include('layouts.success')
    @include('layouts.error')
    <div style="direction: rtl">
        <div class="col-12 col-md-12 col-lg-12">
            <form class="needs-validation" action="{{ route('CatNote.create') }}" method="POST"enctype="multipart/form-data">
                @csrf
                <div class="card card-primary">
                    <div class="card-header">
                        <h4> اضافة نوتة </h4>
                        <div class="card-header-action">
                            <a href="{{ route('noteVice.index') }}" class="btn btn-primary">الرئيسية</a>
                        </div>
                    </div>
                </div>
                <div class="card card-secondary">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"> الإســــــم </label>
                            <div class="col-md-9">
                                <input style="height: calc(2.25rem + 6px);" type="text" name="name"
                                    class="form-control" id="name">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit" id="btn">حفظ</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"> اختر  النوتة </label>
                            <div class="col-md-9">
                                <select class="form-control" id="nota" onChange="hola();">
                                    <option disabled selected>اختر القسم الرئيسي </option>
                                    @isset($cat_note)
                                        @if ($cat_note && $cat_note->count() > 0)
                                            @foreach ($cat_note as $catnote)
                                                <option value="{{ $catnote->id }}">
                                                    {{ $catnote->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row" id="one">
        <div class="col-4 col-md-4 col-lg-4" style="direction: rtl">
            <form class="needs-validation" action="{{ route('noteVice.create') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card card-secondary">
                    <div class="card-header">
                        <h4> بيانات احصائية </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <select class="form-control" name="ncategory_id">
                                <option value="" disabled selected>اختر القسم الرئيسي </option>
                                @isset($cat_note)
                                    @if ($cat_note && $cat_note->count() > 0)
                                        @foreach ($cat_note as $catnote)
                                            <option value="{{ $catnote->id }}">
                                                {{ $catnote->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                @endisset
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <select class="form-control" name="ncategory_id">
                                <option value="" disabled selected>اختر القسم الفرعي </option>
                                @isset($cat_note)
                                    @if ($cat_note && $cat_note->count() > 0)
                                        @foreach ($cat_note as $catnote)
                                            <option value="{{ $catnote->id }}">
                                                {{ $catnote->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                @endisset
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card card-secondary">
                    <div class="card-header">
                        <h4> بيانات احصائية </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <select class="form-control" name="ncategory_id">
                                <option value="" disabled selected>اختر القسم الرئيسي </option>
                                @isset($cat_note)
                                    @if ($cat_note && $cat_note->count() > 0)
                                        @foreach ($cat_note as $catnote)
                                            <option value="{{ $catnote->id }}">
                                                {{ $catnote->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                @endisset
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <select class="form-control" name="ncategory_id">
                                <option value="" disabled selected>اختر القسم الفرعي </option>
                                @isset($cat_note)
                                    @if ($cat_note && $cat_note->count() > 0)
                                        @foreach ($cat_note as $catnote)
                                            <option value="{{ $catnote->id }}">
                                                {{ $catnote->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                @endisset
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-8 col-md-8 col-lg-8" style="direction: rtl">
            <form class="needs-validation" action="{{ route('noteVice.create') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card card-secondary">
                    <div class="card-header">
                        <h4> بيانات احصائية </h4>
                    </div>
                    <div class="card-body" id="work_experience">
                        <div class="form-row work-xp">
                            <div class="form-group col-md-4">
                                <label> عنوان </label>
                                <input type="text" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> الرقم </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> قيمة مالية (ان وجد) </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"> بشأن </label>
                            <div class="col-md-11">
                                <textarea cols="3" rows="3" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="text-left">
                            <a href="javascript:void(0)" id="addWork-btn" onclick="adddataRow()" class="btn btn-success"><i
                                    class="fas fa-plus"> اضافة بيان </i> </a>
                        </div>
                    </div>
                </div>
                <div class="card card-secondary">
                    <div class="card-header">
                        <h4> بيانات </h4>
                    </div>
                    <div class="card-body" id="data">
                        <div class="form-row data-xp">
                            <div class="form-group col-md-4">
                                <label> عنوان </label>
                                <input type="text" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> الرقم </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> قيمة مالية (ان وجد) </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"> بشأن </label>
                            <div class="col-md-11">
                                <textarea cols="3" rows="3" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="text-left">
                            <a href="javascript:void(0)" id="added-btn" onclick="addedRow()" class="btn btn-success"><i
                                    class="fas fa-plus"> اضافة بيان </i> </a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        {{-- <div class="col-12 col-md-12 col-lg-12" style="direction: rtl">
            <div class="card card-secondary">
                <div class="card-header">
                    <h4> جدول بيان </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> #</th>
                                    <th> 0</th>
                                    <th>0</th>
                                    <th>0</th>
                                    <th>0</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row" id="two">

        <div class="col-12 col-md-12 col-lg-12" style="direction: rtl">
            <form class="needs-validation" action="{{ route('noteVice.create') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card card-secondary">
                    <div class="card-header">
                        <h4> بيانات احصائية </h4>
                    </div>
                    <div class="card-body" id="work_experience">
                        <div class="form-row work-xp">
                            <div class="form-group col-md-4">
                                <label> عنوان </label>
                                <input type="text" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> الرقم </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> قيمة مالية (ان وجد) </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"> بشأن </label>
                            <div class="col-md-11">
                                <textarea cols="3" rows="3" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="text-left">
                            <a href="javascript:void(0)" id="addWork-btn" onclick="adddataRow()" class="btn btn-success"><i
                                    class="fas fa-plus"> اضافة بيان </i> </a>
                        </div>
                    </div>
                </div>
                <div class="card card-secondary">
                    <div class="card-header">
                        <h4> بيانات </h4>
                    </div>
                    <div class="card-body" id="data">
                        <div class="form-row data-xp">
                            <div class="form-group col-md-4">
                                <label> عنوان </label>
                                <input type="text" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> الرقم </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> قيمة مالية (ان وجد) </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"> بشأن </label>
                            <div class="col-md-11">
                                <textarea cols="3" rows="3" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="text-left">
                            <a href="javascript:void(0)" id="added-btn" onclick="addedRow()" class="btn btn-success"><i
                                    class="fas fa-plus"> اضافة بيان </i> </a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        {{-- <div class="col-12 col-md-12 col-lg-12" style="direction: rtl">
            <div class="card card-secondary">
                <div class="card-header">
                    <h4> جدول بيان </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> #</th>
                                    <th> 0</th>
                                    <th>0</th>
                                    <th>0</th>
                                    <th>0</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
@section('script')
    <script>
        function adddataRow() {
            var elements = document.getElementsByClassName('work-xp-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("work-xp").length < 4) {
                const div = document.createElement('div');
                div.className = 'form-group';
                div.innerHTML =
                    `
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label> عنوان </label>
                                <input type="text" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> الرقم </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> قيمة مالية (ان وجد) </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"> بشأن </label>
                            <div class="col-md-11">
                                <textarea cols="3" rows="3" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-danger text-left" onclick="removeWorkRow(this)"><i class="fas fa-plus"> حذف بيان </i> </a>
                         `;
                document.getElementById('work_experience').appendChild(div);
                if (document.getElementsByClassName("work-xp").length == 4) {
                    document.getElementById("addWork-btn").style.display = "none";
                }
                if (document.getElementsByClassName("work_experience").length != 4) {
                    document.getElementById("addWork-btn").style.display = "inline-block";
                }
            } else {
                alert("برجاء ملء البيانات!");
            }
        }

        function addedRow() {
            var elements = document.getElementsByClassName('data-xp-input');
            var empty = "no"
            for (var i = 0; i < elements.length; i++) {
                if (elements[i].value == "") {
                    empty = "yes"
                }
            }

            if (empty == "no" && document.getElementsByClassName("data-xp").length < 4) {
                const div = document.createElement('div');
                div.className = 'form-group';
                div.innerHTML =
                    `
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label> عنوان </label>
                                <input type="text" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> الرقم </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label> قيمة مالية (ان وجد) </label>
                                <input type="number" name="title"class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label"> بشأن </label>
                            <div class="col-md-11">
                                <textarea cols="3" rows="3" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-danger text-left" onclick="removedataRow(this)"><i class="fas fa-plus"> حذف بيان </i> </a>
                         `;
                document.getElementById('data').appendChild(div);
                if (document.getElementsByClassName("data-xp").length == 4) {
                    document.getElementById("added-btn").style.display = "none";
                }
                if (document.getElementsByClassName("data").length != 4) {
                    document.getElementById("added-btn").style.display = "inline-block";
                }
            } else {
                alert("برجاء ملء البيانات!");
            }
        }

        function removeWorkRow(a) {
            confirm("متأكد؟") ? document.getElementById('work_experience').removeChild(a.parentNode) : 0;
            if (document.getElementsByClassName("work-xp").length != 4) {
                document.getElementById("addWork-btn").style.display = "inline-block";
            }
        }

        function removedataRow(a) {
            confirm("متأكد؟") ? document.getElementById('data').removeChild(a.parentNode) : 0;
            if (document.getElementsByClassName("data-xp").length != 4) {
                document.getElementById("added-btn").style.display = "inline-block";
            }
        }
    </script>
    <script>
        $('.option').hide();
        $('#city').on('change', function(e) {
            $('.option').hide();
            $('.city-' + e.target.value).show();
        });
    </script>
<script>
    function hola() {
        var nota = document.getElementById("nota");
        var notavalue = nota.options[nota.selectedIndex].value;
        var mdivone = document.getElementById("one");
        var mdivtwo = document.getElementById("two");

        switch(notavalue){
            case '1':
        {
            mdivone.style.display = "flex";
            mdivtwo.style.display = "none";
            document.getElementById("one").disabled = true;
        }
        break;
        case '2':
        {
            mdivone.style.display = "none";
            mdivtwo.style.display = "flex";
            document.getElementById("one").disabled = false;
        }
        break;
        }


        // if (notavalue == 1) {

        // } else {
        //     mdivone.style.display = "none";
        //     mdivtwo.style.display = "flex";
        //     document.getElementById("one").disabled = false;
        // }
    }
</script>
@endsection
