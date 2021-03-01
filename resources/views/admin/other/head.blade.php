<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 3 | Dashboard</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.css')}}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<script src="{{asset('js/tinymce/tinymce.min.js')}}"  referrerpolicy="origin" ></script>
{{--<link rel="stylesheet" href="{{asset('js/tinymce/skins/ui/oxide/skin.min.css')}}" />--}}
{{--<script src="{{asset('js/tinymce/themes/silver/theme.min.js')}}"></script>--}}

<script>
    tinymce.init({
        selector: 'textarea',
        height: 500,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        image_advtab: true ,

        filemanager_crossdomain: true,
        external_filemanager_path:"/js/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "/js/filemanager/plugin.min.js"}
});</script>
