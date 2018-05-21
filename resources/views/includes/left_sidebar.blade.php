<div class="app layout-boxed">

    <!-- sidebar panel -->
    <div class="sidebar-panel offscreen-left">

      <div class="brand">

        <!-- logo -->
        <div class="brand-logo">
          <a href="{{ route('admin.index') }}"><h6>Vetmed</h6></a>
        </div>
        <!-- /logo -->

        <!-- toggle small sidebar menu -->
        <a href="javascript:;" class="toggle-sidebar hidden-xs hamburger-icon" data-toggle="layout-small-menu">
          <span></span>
  	      <span></span>
  	      <span></span>
  	      <span></span>
        </a>
        <!-- /toggle small sidebar menu -->

      </div>

      <!-- main navigation -->
      <nav role="navigation" >

        <ul class="nav">

          <!-- dashboard -->
    
          <li>
            <a href="">
              <i class="fa fa-flask"></i>
              <span>Панель</span>
            </a>

            <ul class="sub-menu">
              <li>
                <a href="{{ route('admin.index') }}">
                  <i class="toggle-accordion"></i>
                  <span>Главная</span>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                  <span>Выйти</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /dashboard -->

          <!-- patient -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>Пациент</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('patient.index') }}">
                  <span>Добавить пациента</span>
                </a>
              </li>
              <li>
                <a href="{{ route('patient.list' , ['patient' => 'out']) }}">
                  <span>Госпитализированные пациенты</span>
                </a>
              </li>
              <li>
                <a href="{{ route('patient.list' , ['patient' => 'admit']) }}">
                  <span>Новые пациенты</span>
                </a>
              </li>
             </ul>
            </li>

          <!-- employee -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-tint"></i>
              <span>Сотрудники</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('employee.index') }}">
                  <span>Добавить сотрудника</span>
                </a>
              </li>
              <li>
                <a href="{{ route('employee.list' , ['employee' => 'doctor']) }}">
                  <span>Список врачей</span>
                </a>
              </li>
              <li>
                <a href="{{ route('employee.list' , ['employee' => 'nurse']) }}">
                  <span>Список медсестер</span>
                </a>
              </li>
              <li>
                <a href="{{ route('employee.list' , ['employee' => 'accountant']) }}">
                  <span>Список администраторов</span>
                </a>
              </li>
              <li>
                <a href="{{ route('employee.list' , ['employee' => 'labStaff']) }}">
                  <span>Список лаборантов</span>
                </a>
              </li>
              <li>
                <a href="{{ route('employee.list' , ['employee' => 'pharmacist']) }}">
                  <span>Список обслуживающего персонала</span>
                </a>
              </li>
             </ul>
            </li>
          <!-- /employee -->

          <!-- Appoinment -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-tag"></i>
              <span>Палаты</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('seat.index') }}">
                  <span>Добавить палату</span>
                </a>
              </li>
              @for($i=1;$i<=3;$i++)
              <li>
                <a href="{{ route('seat.list' , ['seat' => $i ]) }}">
                  <span><?php if($i==1) echo '1 этаж' ;
                              else if($i==2) echo '2 этаж';
                              else if ($i==3) echo '3 этаж';
                        ?></span>
                </a>
              </li>
              @endfor
            </ul>
          </li>
          <!-- /Appoinment -->

          <!-- Report -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-map-marker"></i>
              <span>Отчеты</span>
              {{-- <span class="label label-success pull-right">2</span> --}}
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('report.index') }}">
                  <span>Создать отчет</span>
                </a>
              </li>
              <li>
                <a href="{{ route('report.list') }}">
                  <span>Список отчетов</span>
                </a>
              </li>
              <li>
                <a href="{{ route('reportType.index') }}">
                  <span>Создать новый тип отчета</span>
                </a>
              </li>
              <li>
                <a href="{{ route('reportType.list') }}">
                  <span>Список типов</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /Report -->

          <!-- Operation -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-send"></i>
              <span>Операции</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('operation.index') }}">
                  <span>Добавить новую операцию</span>
                </a>
              </li>
              <li>
                <a href="{{ route('operation.list') }}">
                  <span>Список операций</span>
                </a>
              </li>
              <li>
                <a href="{{ route('operationType.index') }}">
                  <span>Добавить новый тип операции</span>
                </a>
              </li>
              <li>
                <a href="{{ route('operationType.list') }}">
                  <span>Список типов операций</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /Operation -->

          <!-- Invoice -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-toggle-on"></i>
              <span>Бланки рассчета</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="{{ route('admin.invoice') }}">
                  <span>Создать новый бланк</span>
                </a>
              </li>            
              <li>
                <a href="">
                  <span>Список бланков</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /Invoice -->

          <!-- menu levels -->
          <li>
            <a href="javascript:;">
              <i class="fa fa-level-down"></i>
              <span>Menu Levels</span>
            </a>
            <ul class="sub-menu">
              <li>
                <a href="javascript:;">
                  <i class="toggle-accordion"></i>
                  <span>Level 1.1</span>
                </a>
                <ul class="sub-menu">
                  <li>
                    <a href="javascript:;">
                      <i class="toggle-accordion"></i>
                      <span>Level 2.1</span>
                    </a>
                    <ul class="sub-menu">
                      <li>
                        <a href="javascript:;">
                          <span>Level 3.1</span>
                        </a>
                      </li>
                      <li>
                        <a href="javascript:;">
                          <span>Level 3.2</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <span>Level 2.2</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="javascript:;">
                  <span>Level 1.2</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- menu levels -->
        </ul>
      </nav>
      <!-- /main navigation -->

    </div>
    <!-- /sidebar panel -->