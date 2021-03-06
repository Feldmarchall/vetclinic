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
                        Список всех бланков
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
                            Название всех бланков
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
                                        <th>Имя панициента</th>
                                        <th>Дата</th>
                                        <th>Редактировать</th>
                                        <th>Удалить</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Имя панициента</th>
                                        <th>Дата</th>
                                        <th>Редактировать</th>
                                        <th>Удалить</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i =1 ; ?>
                                    @foreach ($invoices as $invoice)
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>{{ $invoice->patient_type }}</td>
                                            <td>{{ $invoice->Date }}</td>
                                            <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Просмотреть</button></a></td>
                                            <div class="PrintArea modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title">Информация о бланке</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-xs-1"></div>
                                                                <div class="col-xs-4">
                                                                    <p>Имя папиента</p>
                                                                    <p>Дата</p>
                                                                    <p>Медицинские услуги</p>
                                                                    <p>Сервисные услуги</p>
                                                                    <p>Всего</p>
                                                                </div>
                                                                <div class="col-xs-7">
                                                                    <p> : {{ $invoice->patient_type }}</p>
                                                                    <p> : {{ $invoice->Date }}</p>
                                                                    <p> : {{ $invoice->medicine }}</p>
                                                                    <p> : {{ $invoice->service }}</p>
                                                                    <p> : {{ $invoice->total_paid }}</p>
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
                                                                <form class="form-horizontal bordered-group" role="form" action="{{ route('invoice.update') }}" method="post" enctype="multipart/form-data">

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Имя панициента</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control" name="name" placeholder="" value="{{ Request::old('patient_type') ? Request::old('patient_type') : isset($invoice) ? $invoice->patient_type : '' }} " required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">Дата</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control" name="cost" value="{{ Request::old('Date') ? Request::old('Date') : isset($invoice) ? $invoice->Date : '' }} ">
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer no-border clear">
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
                                                                        <button type="submit" class="btn btn-success">Обновить</button>
                                                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                                        <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
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
                                                                    <h4 class="modal-title">Удалить информацию</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Вы уверенны ?
                                                                </div>
                                                                <form action="{{ route('invoice.delete') }}" method="">
                                                                    <div class="modal-footer no-border">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
                                                                        <button type="submit" class="btn btn-primary">Да</button>
                                                                        <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
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
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /main area -->
            </div>
            <!-- /content panel -->
@endsection