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
          Список пациентов
        </p>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right hidden-xs">

      <li>
        <a href="javascript:;" data-toggle="dropdown">
          <img src="{{ asset('images/avatar.jpg') }}" class="header-avatar img-circle ml10" alt="user" title="user">
          <span class="pull-left">Vetmed</span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="{{ route('admin.index') }}">Dashboard</a>
          </li>
          <li>
            <a href="signin.html">Logout</a>
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
          Информация о пациентах
        </div>
        <div class="panel-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
      @endif
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Кличка питомца</th>
              <th>ID</th>
              <th>Телефон владельца</th>
              <th>Просмотреть</th>
              <th>Редактировать</th>
              <th>Удалить</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Кличка питомца</th>
              <th>ID</th>
              <th>Телефон владельца</th>
              <th>Просмотреть</th>
              <th>Редактировать</th>
              <th>Удалить</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($patients as $patient)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $patient->name }}</td>
              <td>{{ $patient->id }}</td>
              <td>{{ $patient->mobile }}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Просмотреть</button></a></td>
              <div class="modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Информация о пациенте</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>Кличка питомца</p>
                          <p>Тип пациента</p>
                          <p>ID пациента</p>
                          <p>Пол</p>
                          <p>Дата рождения</p>
                          <p>Blood Group</p>
                          <p>Симптомы</p>
                          <p>Лечащий врач</p>
                          <p>Время поступления</p>
                          <p>Размещение</p>
                          <p>Телефон владельца</p>
                          <p>Email</p>
                          <p>Адрес владельца</p>
                          <p>Фотография питомца</p>
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $patient->name }}</p>
                          <p> : @if($patient->patient_type == 1)
                                 Out Patient 
                                @elseif($patient->patient_type == 2)
                                 Admit Patient
                                @endif
                          </p>
                          <p> : {{ $patient->id or '101' }}</p>
                          <p> : {{ $patient->gender }}</p>
                          <p> : {{ $patient->birthDate }}</p>
                          <p> : {{ $patient->bloodGroup }}</p>
                          <p> : {{ $patient->symptoms }}</p>
                          <p> : {{ $patient->employee->name }}</p>
                          <p> : {{ $patient->created_at }}</p>
                          <p> : {{ $patient->seat->seatFloor }} -- {{ $patient->seat->seatNo }}</p>
                          <p> : {{ $patient->mobile }} </p>
                          <p> : {{ $patient->email }}</p>
                          <p> : {{ $patient->address }}</p>
                          <p> : <img class="img-responsive" src="{{ asset('images/patients/'.$patient->image) }}" ></p>
                </div>
                      </div>
                    </div>
                    <div class="modal-footer no-border">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <td><a data-toggle="modal" data-target="#edit<?php echo $i; ?>" href=""><button type="button" class="btn btn-info">Редактировать</button></a></td>
              <div class="modal" id="edit<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Edit Information</h4>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal bordered-group" role="form" action="{{ route('patient.update') }}" method="post" enctype="multipart/form-data">

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Тип пациента</label>
              <div class="col-sm-8">
                <select class="form-control" name="patient_type">
                  <option value="1" {{ $patient->patient_type == '1' ? 'selected' : ''}}>Новый пациент</option>
                  <option value="2" {{ $patient->patient_type == '2' ? 'selected' : ''}}>Госпитализированный пациент</option>
                </select>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">ID пациента</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="{{ $patient->id }}" disabled>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Кличка питомца</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" placeholder="Кличка питомца" value="{{ Request::old('name') ? Request::old('name') : isset($patient) ? $patient->name : '' }}" required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Пол</label>
              <div class="col-sm-8"> 
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio1" value="Male" {{ $patient->gender == 'Male' ? 'checked' : ''}}> Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio2" value="Female" {{ $patient->gender == 'Female' ? 'checked' : ''}}> Female
                </label>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Дата рождения</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" data-provide="datepicker" name="birthDate" value="{{ Request::old('birthDate') ? Request::old('birthDate') : isset($patient) ? $patient->birthDate : '' }}" required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Blood Group</label>
              <div class="col-sm-8">
                <select class="form-control" name="bloodGroup">
                  <option value="A+" {{ $patient->bloodGroup == 'A+' ? 'selected' : ''}}>A+</option>
                  <option value="O+" {{ $patient->bloodGroup == 'O+' ? 'selected' : ''}}>O+</option>
                  <option value="B+" {{ $patient->bloodGroup == 'B+' ? 'selected' : ''}}>B+</option>
                  <option value="AB+" {{ $patient->bloodGroup == 'AB+' ? 'selected' : ''}}>AB+</option>
                  <option value="A-" {{ $patient->bloodGroup == 'A-' ? 'selected' : ''}}>A-</option>
                  <option value="B-" {{ $patient->bloodGroup == 'B-' ? 'selected' : ''}}>B-</option>
                  <option value="O-" {{ $patient->bloodGroup == 'O-' ? 'selected' : ''}}>O-</option>
                  <option value="AB-" {{ $patient->bloodGroup == 'AB-' ? 'selected' : ''}}>AB-</option>
                </select>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Симптомы</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="symptoms" placeholder="Symptoms" value="{{ Request::old('symptoms') ? Request::old('symptoms') : isset($patient) ? $patient->symptoms : '' }}" required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Лечащий врач</label>
              <div class="col-sm-8">
                <select class="form-control" name="doctor_id">
                  @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $employee->id == $patient->employee->id ? 'selected' : ''}}>{{ $employee->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Размещение</label>
              <div class="col-sm-8">
                <select class="form-control" name="seat_id">
                  @foreach ($seats as $seat)
                    <option value="{{ $seat->id }}" {{ $seat->id == $patient->seat->id ? "selected" : ''}}>{{ $seat->seatFloor}} -- {{ $seat->seatNo}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Телефон владельца</label>
              <div class="col-sm-8">
                <input class="form-control" type="tel" pattern="^\d{11}$" required name="mobile" name="mobile" value="{{ Request::old('mobile') ? Request::old('mobile') : isset($patient) ? $patient->mobile : '' }}">
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Request::old('email') ? Request::old('email') : isset($patient) ? $patient->email : '' }}">
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Адрес владельца</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="address" placeholder="Address" value="{{ Request::old('address') ? Request::old('address') : isset($patient) ? $patient->address : '' }}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Фотография питомца</label>
              <div class="col-sm-8">
                <img src="{{ asset('images/patients/'.$patient->image) }}" class="img-responsive" alt="">
                <input class="mt25" type="file" name="image">
              </div>
            </div>

                    </div>
                    <div class="modal-footer no-border">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
                      <button type="submit" class="btn btn-success">Обновить</button>
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                      <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                    </div>
                  </div>
                </div>
              </div>
               </form>
              

              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Удалить</button></a></td>
              <div class="modal" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Удалить пациента</h4>
                  </div>
                  <div class="modal-body">
                      Вы уверенны ?
                  </div>
                  <form action="{{ route('patient.delete') }}" method="">
                  <div class="modal-footer no-border">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
                    <button type="submit" class="btn btn-primary">Да</button>
                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                  </div>
                  </form>
                </div>
              </div>
              </div>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
        <section>
        <nav>
          <ul class="pager">
              @if($patients->currentPage() !== 1)
                <li class="previous"><a href="{{ $patients->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($patients->currentPage() !== $patients->lastPage() && $patients->hasPages())
                <li class="next"><a href="{{ $patients->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
              @endif
          </ul>
        </nav>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection