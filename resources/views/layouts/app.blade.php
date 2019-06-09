<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" type="image/png" href="{{asset('adminlte/img/bank.png')}}"/>
    <link href="{{asset('adminlte/img/bank.png')}}" rel="apple-touch-icon">

    <title>تطبيق بنك الدم</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap/dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminlte/plugins/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{asset('adminlte/css/AdminLTE-rtl.min.css')}}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/rtl.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600&display=swap&subset=arabic" rel="stylesheet">


  <!-- fullCalendar -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fullcalendar/dist/fullcalendar.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">
  <!-- Theme style -->


    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">



  <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
        @inject('client', 'App\Models\Client')

<!-- Site wrapper -->
<div class="wrapper">
        @inject('Contact', 'App\Models\Contact')
  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>B</b>Bk</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>تطبيق بنك  </b>الدم</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('adminlte/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('adminlte/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  {{ auth()->user()->name }}
                  <small>Member since {{ auth()->user()->created_at }}</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="text-center">
                    <form action="{{ url('logout') }}" method="post" id='signoutForm'>
                        @csrf

                            <script type="">
                            function submitSignout() {
                                document.getElementById('signoutForm').submit();

                            }
                        </script>
                        {!! Form::open(['method' => 'post', 'url' => url('logout'),'id'=>'signoutForm']) !!}

                        {!! Form::close() !!}

                    </form>
                        <a href="#" onclick="submitSignout()">
                                <i class="fa fa-sign-out"></i> تسجيل الخروج
                            </a>

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->
  {{-- @include('sweetalert::alert') --}}
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('adminlte/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>

        </div>
      </div>


      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li><a href="{{ url('settings') }}"><i class="fa fa-cog"></i> <span>الإعدادات</span></a></li>

        <li>
            <a href="{{ url('contacts') }}">
              <i class="fa fa-envelope"></i> <span>تواصل معنا</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-red">{{ $Contact->where('is_read', 0)->count() }}</small>


              </span>
            </a>
          </li>


        <li><a href="{{url('user/change-password')}}"><i class="fa fa-key"></i> <span class="text-bold">تغيير كلمة المرور </span></a></li>

        <li>
            <a href="{{ url('clients') }}">
                <i class="fa fa-users"></i> <span>العملاء</span>
              <span class="pull-right-container">
                    <small class="label pull-right bg-red">{{ $client->where('active', 0)->count() }}</small>
                    <small class="label pull-right bg-green">{{ $client->where('active', 1)->count() }}</small>

              </span>
            </a>
          </li>


        <li class="treeview">
            <a href="#">
              <i class="fa fa-list"></i> <span>الأقسام</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">

                <li ><a href="{{ url('Category') }}"><i class="fa fa-list"></i> الأقسام</a></li>
                <li class="active"><a href="{{ url(route('Category.create')) }}"><i class="fa fa-plus"></i> اضافه الأقسام </a></li>
            </ul>
          </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>المقالات</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">

            <li ><a href="{{ url('posts') }}"><i class="fa fa-edit"></i> المقالات</a></li>
            <li class="active"><a href="{{ url(route('posts.create')) }}"><i class="fa fa-plus"></i> اضافه المقالات</a></li>

          </ul>
        </li>


          {{-- <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>العملاء</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">

                <li ><a href="{{ url('clients') }}"><i class="fa fa-users"></i> العملاء المسجلين</a></li>
                <li class="active"><a href="#"><i class="fa fa-plus"></i> اضافه العملاء </a></li>
            </ul>
          </li> --}}


          <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i> <span>المحافظات</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">
                <li><a href="{{ url('governorate') }}"><i class="fa fa-book"></i> <span>المحافظات</span></a></li>
              <li class="active"><a href="{{ url(route('governorate.create')) }}"><i class="fa fa-plus"></i> اضافه المحافظات</a></li>
            </ul>
          </li>


          <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i> <span>المدن</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">
                <li><a href="{{ url('cities') }}"><i class="fa fa-book"></i> <span>المدن</span></a></li>
              <li class="active"><a href="{{ url(route('cities.create')) }}"><i class="fa fa-plus"></i> اضافة المدن</a></li>
            </ul>
          </li>




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
        <h1>
          @yield('page_title')
          <small>@yield('small_title')</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
          <li class="active">@yield('page_title')</li>
        </ol>
      </section>
    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b> Version </b> 3.0.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="#"> Saeed Fouda </a>.</strong> All rights
    reserved .
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

{{-- <!-- Morris.js charts -->
<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('plugins/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script> --}}



<script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.buttons.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="{{ asset('adminlte/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('adminlte/plugins/fullcalendar/dist/fullcalendar.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('adminlte/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('adminlte/js/pages/dashboard.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

<script src="{{asset('adminlte/plugins/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('adminlte/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('adminlte/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('adminlte/plugins/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/js/demo.js') }}"></script>
<script src="{{asset('adminlte/plugins/jquery-confirm/jquery.confirm.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('js/ibnfarouk.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script src="{{asset('adminlte/js.js')}}"></script>

@stack('js')
@stack('css')


<script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
      </script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>
<style>
    .swal2-popup{
        font-size: 1.5rem !important;
    }
</style>

<script>
    @if (session()->has('flash_notification.message'))
    @if(session()->get('flash_notification.level') == "success")
    Swal.fire({
        title: "نجحت العملية!",
        text: "{!! session('flash_notification.message') !!}",
        type: "success",
        confirmButtonText: "حسناً"
    });
    @else
    Swal.fire({
        title: "فشلت العملية!",
        text: "{!! session('flash_notification.message') !!}",
        type: "error",
        confirmButtonText: "حسناً"
    });
    @endif
    @endif
</script>

</body>
</html>
