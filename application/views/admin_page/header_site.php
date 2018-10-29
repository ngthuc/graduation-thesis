  <!-- Cascading Style Sheets -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/main_style.css'); ?>">
  <!-- Cascading Style Sheets -->

  <!-- Javascript -->
    <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- <script src="<?php // echo base_url('public/js/main.js'); ?>" charset="utf-8"></script> -->
  <!-- Javascript -->

  <!-- Internal Cascading Style Sheets or Javascript -->
    <script type="text/javascript">
      $(document).ajaxStart(function() {
         Pace.restart();
       });
    </script>
    <script type="text/javascript">
      window.setTimeout(function() {
          $("#alert-out").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 2000);

      function makeAjaxCall(url, form, callback){
         $.ajax({
             type: "post",
             url: url,
             cache: false,
             data: $(form).serialize(),
             success: function(json){
               var obj = jQuery.parseJSON(json);
               $(callback).html('<div class="alert alert-'+obj['STATUS']+'" id="alert-out">'+obj['MESSAGE']+'</div>');
               location.reload();
             }
         });
      }

      $(document).click(function(e) {
      if (!$(e.target).is('a')) {
          $('.collapse').collapse('hide');
        }
      });

      // Checkall Function for checkbox
      function checkall(source,name) {
        checkboxes = document.getElementsByName(name);
        for(var i=0, n=checkboxes.length;i<n;i++) {
          checkboxes[i].checked = source.checked;
        }
      }
    </script>
  <!-- Internal Cascading Style Sheets or Javascript -->

  <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="<?php echo base_url('public/libraries/bootstrap-3.3.7-dist/css/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('public/libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js'); ?>" charset="utf-8"></script> -->
  <!-- Bootstrap -->

  <!-- Libraries -->
    <!-- jQuery -->
      <!-- <script src="<?php echo base_url('public/libraries/jquery-3.2.1/jquery-3.2.1.min.js'); ?>" charset="utf-8"></script> -->
    <!-- jQuery -->

    <!-- Font Awesome -->
      <!-- <link rel="stylesheet" href="<?php echo base_url('public/libraries/fontawesome-free-5.2.0-web/css/all.min.css'); ?>">
      <script src="<?php echo base_url('public/libraries/fontawesome-free-5.2.0-web/js/all.min.js'); ?>"></script> -->
    <!-- Font Awesome -->
  <!-- Libraries -->

  <!-- Extensions -->
    <!-- Notify.js -->
      <!-- Initial -->
        <script src="<?php echo base_url('public/libraries/notify.js/notify.min.js'); ?>"></script>
      <!-- Initial -->
    <!-- Notify.js -->

    <!-- DataTables 1.10.16 -->
      <!-- Include DataTables 1.10.16 -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/extensions/DataTables-1.10.16/datatables.min.css'); ?>"/>
        <script type="text/javascript" src="<?php echo base_url('public/extensions/DataTables-1.10.16/datatables.min.js'); ?>"></script>
      <!-- Include DataTables 1.10.16 -->
      <!-- Using DataTables -->
        <script type="text/javascript">
        // $(document).ready(function () {
        //     $('.datatables').DataTable({
        //       "language" : {
        //         "url" : "//cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json"
        //     }
        //   });
        // });

        $(document).ready(function () {
            $('#datatables').DataTable({
              "language" : {
                "url" : "//cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json"
            }
          });
        });
        </script>
      <!-- Using DataTables -->
    <!-- DataTable 1.10.16 -->

    <!-- TinyMCE -->
      <!-- Include TinyMCE -->
        <script src="<?php echo base_url('public/extensions/tinymce/tinymce.min.js'); ?>"></script>
      <!-- Include TinyMCE -->

      <!-- Init TinyMCE as function -->
        <script>
          function makeTinymce(selector,width=680,height=300,theme="modern") {
            tinymce.init({
              selector: selector,
              width: width,
              height: height,
              theme: theme,
              extended_valid_elements: "table[class=table table-bordered]",
              plugins: [
                   "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                   "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                   "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
              ],
              toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
              toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
              image_advtab: true ,
              image_dimensions: false,
              image_class_list: [{title: 'Responsive', value: 'img-responsive'}],
              external_filemanager_path:"<?=base_url();?>public/filemanager/",
          		external_plugins: { "filemanager" : "<?=base_url();?>public/filemanager/plugin.min.js"},
              // external_filemanager_path:"<?php echo base_url('filemanager/'); ?>",
              filemanager_title:"Responsive Filemanager" ,
              // external_plugins: { "filemanager" : "<?php echo base_url('filemanager/plugin.min.js'); ?>"}
            });
          }
        </script>
      <!-- Init TinyMCE as function -->
    <!-- TinyMCE -->

    <!-- AdminLTE -->
      <!-- Initial -->
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/Ionicons/css/ionicons.min.css'); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/dist/css/AdminLTE.min.css'); ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/dist/css/skins/_all-skins.min.css'); ?>">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/morris.js/morris.css'); ?>">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/jvectormap/jquery-jvectormap.css'); ?>">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
        <!-- jQuery 3 -->
        <!-- <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/jquery/dist/jquery.min.js'); ?>"></script> -->
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
        <!-- Morris.js charts -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/raphael/raphael.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/morris.js/morris.min.js'); ?>"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/jquery-knob/dist/jquery.knob.min.js'); ?>"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/moment/min/moment.min.js'); ?>"></script>
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
        <!-- Slimscroll -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/dist/js/adminlte.min.js'); ?>"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/dist/js/pages/dashboard.js'); ?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/dist/js/demo.js'); ?>"></script>
        <!-- PACE -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/bower_components/PACE/pace.min.js'); ?>"></script>
        <!-- Pace style -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/plugins/pace/pace.min.css'); ?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url('public/extensions/AdminLTE-2.4.5/plugins/iCheck/square/blue.css'); ?>">
        <!-- iCheck -->
        <script src="<?php echo base_url('public/extensions/AdminLTE-2.4.5/plugins/iCheck/icheck.min.js'); ?>"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <!-- Initial -->

      <!-- Tooltip -->
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button);
        </script>
      <!-- Tooltip -->
    <!-- AdminLTE -->
  <!-- Extensions -->
