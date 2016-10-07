<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <title>R-Net Systems - Dispersiones</title>

    <!-- Bootstrap -->
    {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')!!}

    <!-- Menú -->
    {!!Html::style('css/sb-admin.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}

    <!-- jQueryUI -->
    {!!Html::style('http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css')!!}

    <!-- Custom -->
    {!!Html::style('css/custom.css')!!}
  </head>
  <body>

    <div id="wrapper">

      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{!!URL::to('/')!!}"><img src="{!!URL::to('/images/logo.png')!!}"></a>
        </div>
           
        <ul class="nav navbar-top-links navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              {!!Auth::user()->name!!} <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              @include('layouts.menus.usermenu')
            </ul>
          </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
              @include('layouts.menus.mainmenu')
            </ul>
          </div>
        </div>
      </nav>

      <div id="page-wrapper">
        <div id="errors-my-form"></div>
        @include('alerts.success')
        @include('alerts.errors')
        @include('alerts.request')
        @yield('content')
      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {!!Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')!!}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {!!Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js')!!}

    <!-- Menú -->
    {!!Html::script('js/metisMenu.min.js')!!}
    {!!Html::script('js/sb-admin-2.js')!!}

    <!-- jQueryUI -->
    {!!Html::script('http://code.jquery.com/ui/1.11.3/jquery-ui.js')!!}

    <!-- Eliminar Registro -->
    {!!Html::script('js/delete-reg.js')!!}

    @yield('scripts')
  </body>
</html>