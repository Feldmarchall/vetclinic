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
          Список всех палат
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
          Информация о палате
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
              <th>No. палаты</th>
              <th>Статус</th>
              <th>Просмотреть</th>
              <th>Редактировать</th>
              <th>Удалить</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>No. палаты</th>
              <th>Статус</th>
              <th>Просмотреть</th>
              <th>Редактировать</th>
              <th>Удалить</th>
            </tr>          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($seats as $seat)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $seat->seatNo }}</td>
              <td>
                {{ $seat->status == 'empty' ? 'Свободная' : ''}}
                {{ $seat->status == 'full' ? 'Занятая' : ''}}
              </td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Просмотреть</button></a></td>
              <div class="PrintArea modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Информация о палате</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>No. палаты</p>
                          <p>No. этажа</p>
                          <p>Стоимость/в день</p>
                          <p>Тип</p>
                          <p>Статус</p>
                          <p>Фотография</p>
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $seat->seatNo }}</p>
                          <p> : {{ ucfirst($seat->seatFloor) }}</p>
                          <p> : {{ $seat->rent }}</p>
                          <p> :
                            {{ $seat->seatType == 'general' ? 'Общая' : ''}}
                            {{ $seat->seatType == 'cabin' ? 'Индивидуальная' : ''}}
                          </p>
                          <p> :
                            {{ $seat->status == 'empty' ? 'Свободная' : ''}}
                            {{ $seat->status == 'full' ? 'Занятая' : ''}}
                          </p>
                          <p> : <img class="img-responsive" src="{{ asset('images/seats/'.$seat->image) }}" ></p>
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
                      <form class="form-horizontal bordered-group" role="form" action="{{ route('seat.update') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-3 control-label">No. палаты</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="seatNo" placeholder="No. палаты" value="{{ Request::old('seatNo') ? Request::old('seatNo') : isset($seat) ? $seat->seatNo : '' }} " required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Номер этажа</label>
              <div class="col-sm-8">
                <select class="form-control" name="seatFloor">
                  <option value="1" {{ $seat->seatFloor == '1' ? 'selected' : ''}}>1 этаж</option>
                  <option value="2" {{ $seat->seatFloor == '2' ? 'selected' : ''}}>2 этаж</option>
                  <option value="3" {{ $seat->seatFloor == '3' ? 'selected' : ''}}>3 этаж</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Стоимость/в день</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="rent" value="{{ Request::old('rent') ? Request::old('rent') : isset($seat) ? $seat->rent : '' }} ">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Статус</label>
              <div class="col-sm-8">
                <select class="form-control" name="status">
                  <option value="empty" {{ $seat->status == 'empty' ? 'selected' : ''}}>Свободная</option>
                  <option value="full" {{ $seat->status == 'full' ? 'selected' : ''}}>Занятая</option>
                </select>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Тип</label>
              <div class="col-sm-8"> 
                <label class="radio-inline">
                  <input type="radio" name="seatType" id="inlineRadio1" value="general" {{ $seat->seatType == 'general' ? 'checked' : ''}}> Общая
                </label>
                <label class="radio-inline">
                  <input type="radio" name="seatType" id="inlineRadio2" value="cabin" {{ $seat->seatType == 'cabin' ? 'checked' : ''}}> Индивидуальная
                </label>
              </div>
            </div>


            <div class="form-group clear">
              <label class="col-sm-3 control-label">Фотография</label>
              <div class="col-sm-8">
                <img src="{{ asset('images/seats/'.$seat->image) }}" class="img-responsive" alt="">
                <input class="mt25" type="file" name="image">
              </div>
            </div>
            
            <div class="modal-footer no-border">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
              <button type="submit" class="btn btn-success">Обновить</button>
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <input type="hidden" name="seat_id" value="{{ $seat->id }}">
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
                    <h4 class="modal-title">Удалить информацию о палате</h4>
                  </div>
                  <div class="modal-body">
                      Вы уверенны ?
                  </div>
                  <form action="{{ route('seat.delete') }}" method="">
                  <div class="modal-footer no-border">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
                    <button type="submit" class="btn btn-primary">Да</button>
                    <input type="hidden" name="seat_id" value="{{ $seat->id }}">
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
              @if($seats->currentPage() !== 1)
                <li class="previous"><a href="{{ $seats->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($seats->currentPage() !== $seats->lastPage() && $seats->hasPages())
                <li class="next"><a href="{{ $seats->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
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