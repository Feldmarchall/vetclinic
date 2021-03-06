@extends('layouts.master')

@section('top_header')
<!-- content panel -->
<div class="main-panel">
  <!-- top header -->
  <header class="header navbar">

    <div class="brand visible-xs">
      <!-- toggle offscreen menu -->
      <div class="toggle-offscreen">
        <a href="#" class="hamburger-icon v2 visible-xs" data-toggle="offscreen" data-move="ltr">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
      <!-- /toggle offscreen menu -->

      <!-- logo -->
      <div class="brand-logo">
        Vetmed
      </div>
      <!-- /logo -->
    </div>

    <ul class="nav navbar-nav hidden-xs">
      <li>
        <p class="navbar-text">
          Добавить новую палату
        </p>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right hidden-xs">

      <li>
        <a href="javascript:;" data-toggle="dropdown">
          <img src="images/avatar.jpg" class="header-avatar img-circle ml10" alt="user" title="user">
          <span class="pull-left">Vetmed</span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              Hello, user
            </a></li>
          <li>
            <a href="{{ url('/logout') }}">Выйти</a>
          </li>
        </ul>

      </li>

    </ul>
  </header>
  <!-- /top header -->
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Информация о палатах
        </div>
        <div class="panel-body">
        <div class="col-lg-12">
        @if(Session::has('success'))
          <div class="alert alert-success">
            {{Session::get('success')}}
          </div>
        @endif
        @if(count($errors) > 0)
        <div>
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
              {{$error}}
            @endforeach
          </ul>
        </div>
      @endif
          <form class="form-horizontal bordered-group" role="form" action="{{ route('seat.save') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-2 control-label">Палата No.</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="seatNo" placeholder="Seat No" value="{{ Request::old('seatNo') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Номер этажа</label>
              <div class="col-sm-8">
                <select class="form-control" name="seatFloor">
                  <option value="1">1 этаж</option>
                  <option value="2">2 этаж</option>
                  <option value="3">3 этаж</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Стоимость/в день</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" data-provide="datepicker" name="rent">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Статус</label>
              <div class="col-sm-8">
                <select class="form-control" name="status">
                  <option value="empty">Свободная</option>
                  <option value="full">Занятая</option>
                </select>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Тип</label>
              <div class="col-sm-8"> 
                <label class="radio-inline">
                  <input type="radio" name="seatType" id="inlineRadio1" value="general"> Общая
                </label>
                <label class="radio-inline">
                  <input type="radio" name="seatType" id="inlineRadio2" value="cabin"> Индивидуальная
                </label>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Фотография</label>
              <div class="col-sm-8">
                <input type="file" name="image">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-success">Добавить палату</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection