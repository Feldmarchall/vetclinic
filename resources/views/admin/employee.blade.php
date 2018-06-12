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
          Добавить нового сотрудника
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
          Информация о сотруднике
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
          <form class="form-horizontal bordered-group" role="form" action="{{ route('employee.save') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-2 control-label">Должность сотрудника</label>
              <div class="col-sm-8">
                <select class="form-control" name="employee_type">
                  <option value="doctor">Врач</option>
                  <option value="nurse">Медсестра</option>
                  <option value="accountant">Администратор</option>
                  <option value="Lab Staff">Лаботант</option>
                  {{--<option value="pharmacist">Pharmacist</option>--}}
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Имя</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ Request::old('name') }}" required>
              </div>
            </div>
            

            <div class="form-group">
              <label class="col-sm-2 control-label">Стаж</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="degree" placeholder="Стаж" value="{{ Request::old('degree') }}" required>
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
              <label class="col-sm-2 control-label">Дата рождения</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" data-provide="datepicker" name="birthDate">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Специализация</label>
              <div class="col-sm-8">
                <select class="form-control" name="specialist">
                  <option value="1">Другая</option>
                  <option value="medicine">Терапевтия</option>
                  <option value="orthopedics">Диагностика</option>
                  <option value="neurologiest">Стационар</option>
                </select>
              </div>
            </div>

            {{--<div class="form-group">--}}
              {{--<label class="col-sm-2 control-label">Visiting Charge</label>--}}
              {{--<div class="col-sm-8">--}}
                {{--<input type="number" class="form-control" name="charge" placeholder="visiting charge" value="{{ Request::old('charge') }}">--}}
              {{--</div>--}}
            {{--</div>--}}

            <div class="form-group">
              <label class="col-sm-2 control-label">Телефон</label>
              <div class="col-sm-8">
                <input class="form-control" type="tel" required name="mobile" placeholder="(формат: xxx-xxx-xxx-xx)" name="mobile">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Request::old('email') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Домашний адрес</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="hAddress" placeholder="Домашний адрес" value="{{ Request::old('hAddress') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Адрес в клинике</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="oAddress" placeholder="Адрес в клинике" value="{{ Request::old('oAddress') }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Статус працівника</label>
              <div class="col-sm-8">
                <select class="form-control" name="status">
                  <option value="free">Вільний</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Фотография </label>
              <div class="col-sm-8">
                <input type="file" name="image">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="submit" class="btn btn-success">Добавить сотрудника</button>
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