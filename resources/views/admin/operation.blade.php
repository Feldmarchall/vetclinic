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
          Добавить новую операцию
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
          Информация о операции
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
          <form class="form-horizontal bordered-group" role="form" action="{{ route('operation.save') }}" method="post">

            <div class="form-group">
              <label class="col-sm-2 control-label">Пациент</label>
              <div class="col-sm-8">
                <select class="form-control" name="patient_id">
                  @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Тип операции</label>
              <div class="col-sm-8">
                <select class="form-control" name="operationType_id">
                  <option value="1">Стерилизация</option>
                  <option value="2">Коронарное шунтирование</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Проводящий врач</label>
              <div class="col-sm-8">
                <select class="form-control" name="doctor_id">
                  @foreach ($doctors as $doctor)
                    @if($doctor->status == 'free')
                      <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Операционная</label>
              <div class="col-sm-8">
                <select class="form-control" name="seat_id">
                  @foreach ($seats as $seat)
                    <option value="{{ $seat->id }}">{{ $seat->seatFloor}} -- {{ $seat->seatNo}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Дата проведения</label>
              <div class="col-sm-8">
                <input type="text" name="date" class="form-control" placeholder="формат : Y-M-D">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Время проведения</label>
              <div class="col-sm-8">
                <input type="text" name="time" class="form-control" placeholder="формат : H:M:S">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Описание</label>
              <div class="col-sm-8">
                <textarea class="form-control" rows="5" name="description"></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-success">Добавить операцию</button>
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