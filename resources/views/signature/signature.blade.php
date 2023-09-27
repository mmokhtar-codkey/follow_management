<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <title>Signature Pad demo</title>

    <meta name="description"
        content="Signature Pad - HTML5 canvas based smooth signature drawing using variable width spline interpolation.">

    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="css/signature-pad.css">


    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="css/ie9.css">
  <![endif]-->

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-39365077-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>

<body onselectstart="return false">

    @if (session('success'))
        <div class="alert alert-success">
            <span>{{ session('success') }}</span>
        </div>
    @endif
    <form id="signature-pad" class="signature-pad" method="POST" action="{{ route('signpad.save') }}">
        @csrf
        <div class="signature-pad--body" id="sig">
            <canvas></canvas>
        </div>
        <div class="signature-pad--footer">
            <div class="signature-pad--actions">
                <div>
                    <button type="button" id="clear" class="button clear" data-action="clear">Clear</button>
                    {{-- <textarea id="signature" name="signed" style="display: block"></textarea> --}}
                    <button type="button" class="button" data-action="change-color">Change color</button>
                    <button type="button" class="button" data-action="undo">Undo</button>
                </div>
                <div>
                    <button class="btn btn-primary" style="float: left;"> حفظ </button>
                    <button type="button" class="button save" data-action="save-png">Save as PNG</button>
                    <button type="button" class="button save" data-action="save-jpg">Save as JPG</button>
                    <button type="button" class="button save" data-action="save-svg">Save as SVG</button>
                </div>
            </div>
        </div>
    </form>
    <script src="js/signature_pad.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">
         var sig = $('#sig').signature({
            syncField: '#signature',
            syncFormat: 'PNG'
        });
    </script>
</body>

</html>
