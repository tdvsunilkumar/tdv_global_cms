<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ (isset($title))?$title:config('app.name', 'Laravel') }}</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{$admin_asset_path}}vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{$admin_asset_path}}vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{$admin_asset_path}}vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{$admin_asset_path}}vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{$admin_asset_path}}vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{$admin_asset_path}}vendors/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="{{$admin_asset_path}}css/own.css">
    <link rel="stylesheet" href="{{$admin_asset_path}}assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.31/example1/colorbox.min.css">
        <link rel="stylesheet" href="{{$admin_asset_path}}vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{$admin_asset_path}}vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="{{$admin_asset_path}}ckeditor/ckeditor.js"></script>
     
    <script type="text/javascript" src="{{$admin_asset_path}}packages/barryvdh/elfinder/js/standalonepopup.js"></script>
    <script type="text/javascript" src="{{$admin_asset_path}}packages/barryvdh/elfinder/js/elfinder.min.js"></script>
    <script type="text/javascript" src="{{$admin_asset_path}}colorbox/jquery.colorbox-min.js"></script>
    <script type="text/javascript" src="{{$admin_asset_path}}codemirror/lib/codemirror.js" ></script>
    <link rel="stylesheet" href="{{$admin_asset_path}}codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="{{$admin_asset_path}}codemirror/theme/monokai.css">
    <script src="{{$admin_asset_path}}codemirror/mode/css/css.js" type="text/javascript" charset="utf-8"></script>

</head>