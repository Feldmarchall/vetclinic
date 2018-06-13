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
          Список всех операций
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
              <th>Тип операции</th>
              <th>Просмотреть</th>
              <th>Редактировать</th>
              <th>Удалить</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Тип операции</th>
              <th>Просмотреть</th>
              <th>Редактировать</th>
              <th>Удалить</th>
            </tr>          
            </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($operations as $operation)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $operation->operationNo or 'Стерилизация' }}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Просмотреть</button></a></td>
              <div class="PrintArea modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Информация о операции</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>Тип операции</p>
                          <p>Пациент</p>
                          <p>Проводящий врач</p>
                          <p>Операционная</p>
                          <p>Дата проведения</p>
                          <p>Время проведения</p>
                          <p>Цена операции</p>
                          <p>Описание</p>
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $operation->name or 'Стерилизация'}}</p>
                          <p> : {{ $operation->patient or 'Барбос'}}</p>
                          <P> : {{ $operation->doctor or 'Маленков И.В.'}}</P>
                          <p> : {{ $operation->seat or 'Палата №4'}}</p>
                          <p> : {{ $operation->date or '24.05.18'}}</p>
                          <p> : {{ $operation->time or '11 00'}}</p>
                          <p> : {{ $operation->charge or '2000' }}</p>
                          <p> : {{ $operation->description or 'Стерилизация питомца' }}</p>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer no-border">
                      <button id="" class="btn btn-info print_button">Печать</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <td><a data-toggle="modal" data-target="#edit<?php echo $i; ?>" href=""><button type="button" class="btn btn-info">Edit</button></a></td>
              <div class="modal" id="edit<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Редактировать информацию</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row mb25">
                      <form class="form-horizontal bordered-group" role="form" action="{{ route('operation.update') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-3 control-label">Пациент</label>
              <div class="col-sm-8">
                <select class="form-control" name="patient_id">
                  @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Тип услуги</label>
              <div class="col-sm-8">
                <select class="form-control" name="operationType_id">
                  <option value="1">Диагностика</option>
                  <option value="2">Стерилизация</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Проводящий врач</label>
              <div class="col-sm-8">
                <select class="form-control" name="doctor_id">
                  <option value="1">Иващенко С.М.</option>
                  <option value="2">Иванов И.К.</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Выбрать палату</label>
              <div class="col-sm-8">
                <select class="form-control" name="seat_id">
                  <option value="1">Палата №4</option>
                  <option value="2">Палата №5</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Дата проведения</label>
              <div class="col-sm-8">
                <input type="text" name="date" class="form-control" placeholder="формат : Y-M-D">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Время проведения</label>
              <div class="col-sm-8">
                <input type="text" name="time" class="form-control" placeholder="формат : H:M:S">
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Описание</label>
              <div class="col-sm-8">
                <textarea class="form-control" rows="5" name="Описание"></textarea>
              </div>
            </div>
            
            <div class="modal-footer no-border clear">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <input type="hidden" name="operation_id" value="{{ $operation->id }}">
            </div>
                  </div>
                </div>
              </div>
               </form>
              

              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
              <div class="modal" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete Operations Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                  <form action="{{ route('operation.delete') }}" method="">
                  <div class="modal-footer no-border">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <input type="hidden" name="operation_id" value="{{ $operation->id }}">
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
              @if($operations->currentPage() !== 1)
                <li class="previous"><a href="{{ $operations->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($operations->currentPage() !== $operations->lastPage() && $operations->hasPages())
                <li class="next"><a href="{{ $operations->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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