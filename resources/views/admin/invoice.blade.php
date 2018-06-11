@extends('layouts.master')

@section('run_custom_css_file')
  <link href="{{ asset('styles/magicsuggest-min.css') }}" rel="stylesheet">
@endsection

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
          Создать новый бланк
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
          Бланк расчета
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
      
    <form class="form-horizontal bordered-group" role="form" action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
              <label class="col-sm-2 control-label">ID</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" value="2" disabled>
              </div>
            </div>
          
          <div class="form-group">
              <label class="col-sm-2 control-label">Заголовок расчета</label>
              <div class="col-sm-8">
                <input type="text" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Пациент</label>
              <div class="col-sm-8">
                <select class="form-control" name="patient_type">
                  <option value="1">Новый пациент</option>
                  <option value="2">Госпитализированный пациент</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Дата</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" data-provide="datepicker" name="Date">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Медицинские услуги</label>
              <div class="col-sm-8">
                <input type="text" class="form-control calculate" id="medicine" name="medicine" value="0" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Сервисные услуги</label>
              <div class="col-sm-8">
                <input type="text" class="form-control calculate" id="service" name="service" value="0" required>
              </div>
            </div>

            <div class="row col-md-6 pull-right">
      <div class="form-group form-inline">
        <label class="col-sm-4" >Итого Услуг: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="subtotal" type="number" class="form-control" id="subTotal" placeholder="Итого Услуг">
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Процент: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="percent" type="number" class="form-control" id="tax" placeholder="Процент">
              <div class="input-group-addon">%</div>
        </div>
      </div>
      {{--<div class="form-group form-inline">--}}
        {{--<label class="col-sm-4">Percent Amount: &nbsp;</label>--}}
        {{--<div class="input-group col-sm-6">--}}
          {{--<div class="input-group-addon">Tk.</div>--}}
          {{--<input name="percent_amount" type="text" class="form-control" id="taxAmount" placeholder="Percent">          --}}
        {{--</div>--}}
      {{--</div>--}}

      {{--<div class="form-group form-inline">--}}
        {{--<label class="col-sm-4">Without Percent: &nbsp;</label>--}}
        {{--<div class="input-group col-sm-6">--}}
          {{--<div class="input-group-addon">Tk.</div>--}}
          {{--<input name="without_percent" type="text" class="form-control" id="totalAftertax" placeholder="Without Percen">--}}
        {{--</div>--}}
      {{--</div>--}}
      <div class="form-group form-inline">
        <label class="col-sm-4">Размер скидки: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="discount_amount" type="number" class="form-control" id="discount" value="0">
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4"><button type="button" id="total" class="btn btn-primary">Всего</button></label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="total_paid" type="number" class="form-control" id="totalAmount" placeholder="Всего">
        </div>
      </div>

      <div class="form-group">        
      <label class="col-sm-4"></label>  
      <div class="input-group col-sm-6">
      <input type=submit name="invoice" value="Добавить бланк" class="btn btn-success btn-lg btn-block">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
      </div>
     
      </div>
      </form>

      </div>

            


      </div>
      </div>
    </div>
  </div>
  <!-- /main area -->
</div>

@endsection

@section("run_custom_js_file")
    <script src="{{ asset('scripts/magicsuggest-min.js') }}"></script>
@endsection

@section('run_custom_jquery')
<script type="text/javascript">
  $( document ).ready(function() {
    $(".calculate").keyup(function(){
      var medicine = $("#medicine").val();
      var service = $("#service").val();
      if(medicine != "" && service != "") {
        $("#subTotal").val(parseInt(medicine) + parseInt(service));
      } else {
        $("#subTotal").val("");
      }
    });

    $("#total").click(function() {

      $("#taxAmount").val(function() {
        var result = (parseFloat($("#tax").val()) *  parseFloat($("#subTotal").val()) / 100).toFixed(2)
        if(!isFinite(result)) result = 0 ;
        return result;
      });

      $("#totalAftertax").val(function() {
        var result = (parseFloat($("#subTotal").val()) - parseFloat($("#taxAmount").val())).toFixed(2);
        if(!isFinite(result)) result = 0 ;
        return result;
      });

      $("#totalAmount").val(function() {
        var result = (parseFloat($("#subTotal").val()) - parseFloat($("#taxAmount").val()) - parseFloat($("#discount").val())).toFixed(2);
        if(!isFinite(result)) result = 0 ;
        return result;
      });

    });

});
</script>
@endsection