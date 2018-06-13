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
          Стисок всех отчетов
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
          Информация о услуге
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
              <th>Название услуги</th>
              <th>Просмотреть</th>
              <th>Редактировать</th>
              <th>Удалить</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Название услуги</th>
              <th>Просмотреть</th>
              <th>Редактировать</th>
              <th>Удалить</th>
            </tr>          
            </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($reports as $report)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $report->reportNo or 'Диагностика' }}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Просмотреть</button></a></td>
              <div class="PrintArea modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Информация о услуге</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>Название услуги</p>
                          <p>Стоимость</p>
                          <p>Описание</p>
                          <p>Пациент</p>
                          <p>Фотография</p>
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $report->name or 'Диагностика'}}</p>
                          <p> : {{ $report->cost or '200' }}</p>
                          <p> : {{ $report->description }}</p>
                          <p> : {{ $report->patient_id }}</p>
                          <p>  <img class="img-responsive" src="{{ asset('images/reports/'.$report->image) }}" ></p>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer no-border">
                      <button id="" class="btn btn-info print_button">Печать</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
                      <h4 class="modal-title">Редактировать информацию</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row mb25">
                      <form class="form-horizontal bordered-group" role="form" action="{{ route('report.update') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-3 control-label">Пациент</label>
              <div class="col-sm-8">
                <select class="form-control" name="patient_id">
                  <option value="1" {{ $report->patient_id == '1' ? 'selected' : ''}}>Хан</option>
                  <option value="2" {{ $report->patient_id == '2' ? 'selected' : ''}}>Ганс</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Тип услуги</label>
              <div class="col-sm-8">
                <select class="form-control" name="reportType_id">
                  <option value="1" {{ $report->reportType_id == '1' ? 'selected' : ''}}>Диагностика</option>
                  <option value="2" {{ $report->reportType_id == '2' ? 'selected' : ''}}>Стерилизация</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Описание</label>
              <div class="col-sm-8">
                <textarea class="form-control" rows="5" name="description">{{ Request::old('description') ? Request::old('description') : isset($report) ? $report->description : '' }}</textarea>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Фотография</label>
              <div class="col-sm-8">
                <img src="{{ asset('images/reports/'.$report->image) }}" class="img-responsive" alt="">
                <input class="mt25" type="file" name="image">
              </div>
            </div>
            
            <div class="modal-footer no-border">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
              <button type="submit" class="btn btn-success">Обновить</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <input type="hidden" name="report_id" value="{{ $report->id }}">
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
                    <h4 class="modal-title">Удалить информацию об услуге</h4>
                  </div>
                  <div class="modal-body">
                      Вы уверенны ?
                  </div>
                  <form action="{{ route('report.delete') }}" method="">
                  <div class="modal-footer no-border">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
                    <button type="submit" class="btn btn-primary">Да</button>
                    <input type="hidden" name="report_id" value="{{ $report->id }}">
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
              @if($reports->currentPage() !== 1)
                <li class="previous"><a href="{{ $reports->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($reports->currentPage() !== $reports->lastPage() && $reports->hasPages())
                <li class="next"><a href="{{ $reports->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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