
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hệ thống quản lí học bạ điện tử-BKElectronic</title>
    <base href="{{asset('')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="admin_asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin_asset/css/datepicker3.css" rel="stylesheet">
    <link href="admin_asset/css/styles.css" rel="stylesheet">

    <!--Icons-->
    <script src="admin_asset/js/lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="admin_asset/ckeditor/ckeditor.js"></script>
</head>

<body>

@include('admin.layout.header')

@include('admin.layout.melu')

@yield('content');
</div>
</div>
<script src="admin_asset/js/jquery-1.11.1.min.js"></script>
<script src="admin_asset/js/bootstrap.min.js"></script>
<script src="admin_asset/js/chart.min.js"></script>
<script src="admin_asset/js/chart-data.js"></script>
<script src="admin_asset/js/easypiechart.js"></script>
<script src="admin_asset/js/easypiechart-data.js"></script>
<script src="admin_asset/js/bootstrap-datepicker.js"></script>
<script src="admin_asset/js/bootstrap-table.js"></script>
<link rel="stylesheet" href="admin_asset/css/bootstrap-table.css"/>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768)
            $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767)
            $('#sidebar-collapse').collapse('hide')
    })
</script>
@yield('script')
</body>

</html>