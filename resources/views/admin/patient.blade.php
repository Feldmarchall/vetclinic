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
          Добавить нового пациента
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
          Данные пациента
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
          <form class="form-horizontal bordered-group" role="form" action="{{ route('patient.save') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-2 control-label">Тип пациента</label>
              <div class="col-sm-8">
                <select class="form-control" name="patient_type">
                  <option value="1">Новый пациент</option>
                  <option value="2">Госпитализированный пациент</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">ID пациента</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="{{ $lastID }}" disabled>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Кличка питомца</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" placeholder="Кличка питомца" value="{{ Request::old('name') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Пол</label>
              <div class="col-sm-8"> 
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio1" value="Male"> Мужской
                </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio2" value="Female"> Женский
                </label>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Дата рождаения</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" data-provide="datepicker" name="birthDate">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Группа крови</label>
              <div class="col-sm-8">
                <select class="form-control" name="bloodGroup">
                  <option value="A+">A+</option>
                  <option value="O+">O+</option>
                  <option value="B+">B+</option>
                  <option value="AB+">AB+</option>
                  <option value="A-">A-</option>
                  <option value="O-">O-</option>
                  <option value="B-">B-</option>
                  <option value="AB-">AB-</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Симптомы</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="symptoms" placeholder="Симптомы" value="{{ Request::old('symptoms') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Лечащий врач</label>
              <div class="col-sm-8">
                <select class="form-control" name="doctor_id">                  
                  @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Размещение</label>
              <div class="col-sm-8">
                <select class="form-control" name="seat_id">
                  @foreach ($seats as $seat)
                    <option value="{{ $seat->id }}">{{ $seat->seatFloor}} -- {{ $seat->seatNo }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Телефон владельца</label>
              <div class="col-sm-8">
                <input class="form-control" type="tel"  required name="mobile" placeholder="телефон" name="mobile">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Request::old('email') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Адрес владельца</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="address" placeholder="Адрес владельца" value="{{ Request::old('address') }}" required>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Фотография питомца</label>
              <div class="col-sm-8">
                <input type="file" name="image">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-success">Добавить пациента</button>
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