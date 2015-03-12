<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('backend/css/bootstrap.min.css') }}

    <!-- Custom CSS -->
    {{ HTML::style('backend/css/sb-admin.css') }}

    <!-- Custom Fonts -->
    {{ HTML::style('backend/font-awesome-4.1.0/css/font-awesome.min.css') }}

    @yield('css')

    <!-- jQuery Version 1.11.0 -->
    {{ HTML::script('backend/js/jquery-1.11.0.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('backend/js/bootstrap.min.js') }}

    @yield('scripts')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">{{ Session::get('country_tag') }}</a>
            </div>

         

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Confide::user()->username }}  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       

                        <li>
                            <a href="{{ url('users/logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
                $menu_list = array(
                    'room' =>
                        array(
                            'collapse' => false,
                            'name' => 'Rooms',
                            'link' => url('admin/room')
                        ),
                    'date_price' =>
                        array(
                            'collapse' => false,
                            'name' => 'Precio y Fechas',
                            'link' => url('admin/date_price/edit')
                        ),
                    'date_block' =>
                        array(
                            'collapse' => false,
                            'name' => 'Bloquear Dias',
                            'link' => url('admin/date_block/edit')
                        ),
                    'terminos' =>
                        array(
                            'collapse' => false,
                            'name' => 'Terminos y condiciones',
                            'link' => url('admin/config/edit/1')
                        )
                );                

            ?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php 

                    $elementCollapse = NULL; 
                    $menu = (isset($menu) ? $menu : null);

                    ?>
                    @foreach($menu_list as $key => $value)

                        <?php $classActive = ($menu == $key ? 'active' : NULL); ?>

                        @if($value['collapse'])
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#{{ $value['data_target']  }}" ><i class="fa fa-fw fa-arrows-v"></i> {{ $value['name'] }} <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="{{ $value['data_target']  }}" class="collapse {{ $key }}">
                            <?php $padlock = true; ?>
                            @foreach($value['data'] as $dKey => $dValue)

                                <?php $classActiveSub = ($menu == $dKey ? 'active' : NULL); ?>

                                <?php
                                    if($classActiveSub and $padlock)
                                    {
                                        $padlock = false;
                                        $elementCollapse = $key;
                                    }
                                ?>

                                <li class="{{ $classActiveSub }}">
                                    <a href="{{ $dValue['link'] }}">&nbsp;&nbsp;<i class="fa fa-fw fa-file"></i>&nbsp;{{ $dValue['name'] }}</a>
                                </li>
                            @endforeach


                            </ul>
                        </li>


                        @else
                            <li class="{{ $classActive }}">
                                <a href="{{ $value['link'] }}"><i class="fa fa-fw fa-file"></i> {{ $value['name'] }}</a>
                            </li>
                        @endif


                    @endforeach

                </ul>

                @if($elementCollapse)
                    <script>
                        $(document).ready(function() {
                            $(".{{ $elementCollapse }}").collapse('show');
                        });

                    </script>
                @endif
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                @yield('header')
                <!-- /.row -->

                <!-- Page Content -->
                @yield('content')
                <!-- End Content -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->





</body>

</html>
