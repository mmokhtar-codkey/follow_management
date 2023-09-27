<html>

<head>
    <title>Laravel Signature Pad Example - MyNotePaper.com</title>
    <link rel="stylesheet" type="text/css"href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <meta name="description"
        content="Signature Pad - HTML5 canvas based smooth signature drawing using variable width spline interpolation.">

    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js" ></script>

    <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 offset-md-12 mt-5">
                <div class="card" style="direction: rtl;text-align: right;">
                    <div class="card-header">
                        <h5> اضافة تأشيرة السيد المحافظ الإلكترونية </h5>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('signpad.save') }}">
                            @csrf
                            {{-- <div class="col-md-12">
                                 <label class="" for="">Name:</label>
                                 <input type="text" name="name" class="form-group" value="">
                            </div> --}}
                            <div class="col-md-12">
                                <label>التوقيع الإلكتروني:</label>
                                <br />
                                <div id="sig"></div>
                                <br /><br />
                                <button id="clear" class="btn btn-danger btn-sm"> مسح </button>
                                <textarea id="signature" name="signed" style="display: none"></textarea>
                            </div>
                            <br />
                            <button class="btn btn-primary" style="float: left;"> حفظ </button>
                        </form>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="custom_thead">
                                <th> # </th>
                                <th> التوقيع الإلكتروني </th>
                                <th> تفاصيل </th>
                            </thead>
                            <tbody>
                                @foreach ($sign as $num => $Sign)
                                    <tr>
                                        <td>{{ $num + 1 }}</td>
                                        <td>
                                            <a href="{{ URL::to( $Sign->signature) }}"
                                                data-sub-html="Demo Description">
                                                <img class="img-responsive thumbnail"
                                                    src="{{ URL::to( $Sign->signature) }}" alt=""
                                                    style="width: 50%">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('signature.delete', $Sign->id) }}"
                                                class="btn btn-danger btn-sm"> مسح </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });

    </script>
</body>

</html>
