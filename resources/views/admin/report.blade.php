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
          Добавить новую услугу
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
              Hello, {{ Auth::user()->name }}
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
          Игфрмация о отчете
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
          <form class="form-horizontal bordered-group" role="form" action="{{ route('report.save') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-2 control-label">Пациент</label>
              <div class="col-sm-8">
                <select class="form-control" name="patient_id">
                  <option value="1">Барбос</option>
                  <option value="2">Хан</option>
                  <option value="3">Барсик</option>
                  <option value="4">Мурка</option>
                  <option value="5">Хан</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Тип услуги</label>
              <div class="col-sm-8">
                <select class="form-control" name="reportType_id">
                  <option value="1">Анализ крови</option>
                  <option value="2">Анализ на паразиты</option>
                  <option value="3">Анализ общий</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Описание</label>
              <div class="col-sm-8">
                <textarea class="form-control" rows="5" name="description"></textarea>
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
                <button type="submit" class="btn btn-success">Добавить услугу</button>
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