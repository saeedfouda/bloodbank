@extends('layouts.app')
@inject('client', 'App\Models\Client')
@inject('orders', 'App\Models\Order')
@inject('posts', 'App\Models\Post')
@inject('governorate', 'App\Models\Governorate')
@inject('cities', 'App\Models\City')
@inject('category', 'App\Models\Category')
@inject('Contact', 'App\Models\Contact')
@inject('users', 'App\User')

@section('page_title')
           Dashbord
@endsection
@section('small_title')
           Statistics
@endsection

@section('content')





  <!-- Main content -->
  <section class="content">

        <div class="row">

                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                              <div class="inner">
                                <h3>{{ $client->count() }}</h3>

                                <p>Clients Registrations</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-person-add"></i>
                              </div>
                              <a href="{{ url('clients') }}" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                              </a>
                            </div>
                          </div>

                <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                  <div class="inner">
                                    <h3>{{ $orders->count() }}<sup style="font-size: 20px"> <i class="fa fa-thumbs-o-up"></i></sup></h3>

                                    <p>Donation Requests</p>
                                  </div>
                                  <div class="icon">
                                        <i class="fa fa-line-chart"></i>
                                  </div>
                                  <a href="{{ url('donations') }}" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                  </a>
                                </div>
                              </div>

                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-green ">
                                      <div class="inner">
                                        <h3>{{ $category->count() }}</h3>

                                        <p>Category</p>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-clone" aria-hidden="true"></i>
                                      </div>
                                      <a href="{{ url('Category') }}" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                      </a>
                                    </div>
                                  </div>

                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-green ">
                                      <div class="inner">
                                        <h3>{{ $posts->count() }}</h3>

                                        <p>Posts</p>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-files-o"></i>
                                      </div>
                                      <a href="{{ url('posts') }}" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                      </a>
                                    </div>
                                  </div>


                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                      <div class="inner">
                                        <h3>{{ $governorate->count() }}</h3>

                                        <p>Governorate</p>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-bookmark-o"></i>
                                      </div>
                                      <a href="{{ url('governorate') }}" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                      </a>
                                    </div>
                                  </div>
                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-aqua">
                                      <div class="inner">
                                        <h3>{{ $cities->count() }}<sup style="font-size: 20px"> </sup></h3>

                                        <p>City</p>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-bookmark-o"></i>
                                      </div>
                                      <a href="{{ url('cities') }}" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                      </a>
                                    </div>
                                  </div>
                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-yellow">
                                      <div class="inner">
                                        <h3>{{ $Contact->count() }}</h3>

                                        <p>Contact </p>
                                      </div>
                                      <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                      </div>
                                      <a href="{{ url('contacts') }}" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                      </a>
                                    </div>
                                  </div>

                <div class="col-lg-3 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-yellow">
                                      <div class="inner">
                                        <h3>{{ $users->count() }}</h3>

                                        <p>Admin </p>
                                      </div>
                                      <div class="icon">
                                        <i class="ion ion-social-buffer" aria-hidden="true"></i>
                                      </div>
                                      <a href="{{ url('users') }}" class="small-box-footer">
                                        More info <i class="fa fa-arrow-circle-right"></i>
                                      </a>
                                    </div>
                                  </div>



          </div>


{{--
           <section class="content">
            <div class="row">
              <div class="col-md-3">
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h4 class="box-title">Draggable Events</h4>
                  </div>
                  <div class="box-body">
                    <!-- the events -->
                    <div id="external-events">
                      <div class="external-event bg-green ui-draggable ui-draggable-handle" style="position: relative;">Lunch</div>
                      <div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative;">Go home</div>
                      <div class="external-event bg-aqua ui-draggable ui-draggable-handle" style="position: relative;">Do homework</div>
                      <div class="external-event bg-light-blue ui-draggable ui-draggable-handle" style="position: relative;">Work on UI design</div>
                      <div class="external-event bg-red ui-draggable ui-draggable-handle" style="position: relative;">Sleep tight</div>
                      <div class="checkbox">
                        <label for="drop-remove">
                          <input type="checkbox" id="drop-remove">
                          remove after drop
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /. box -->
                <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Create Event</h3>
                  </div>
                  <div class="box-body">
                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                      <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                      <ul class="fc-color-picker" id="color-chooser">
                        <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                        <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                      </ul>
                    </div>
                    <!-- /btn-group -->
                    <div class="input-group">
                      <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                      <div class="input-group-btn">
                        <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                      </div>
                      <!-- /btn-group -->
                    </div>
                    <!-- /input-group -->
                  </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="box box-primary">
                  <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id="calendar" class="fc fc-unthemed fc-ltr"><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left" aria-label="prev"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right" aria-label="next"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div><button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled" disabled="">today</button></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">day</button></div></div><div class="fc-center"><h2>May 2019</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table class=""><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header"><table class=""><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 576px;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week fc-widget-content" style="height: 96px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2019-04-28"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2019-04-29"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2019-04-30"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2019-05-01"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2019-05-02"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2019-05-03"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2019-05-04"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2019-04-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-mon fc-other-month fc-past" data-date="2019-04-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2019-04-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-wed fc-past" data-date="2019-05-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-thu fc-past" data-date="2019-05-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-fri fc-past" data-date="2019-05-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-sat fc-past" data-date="2019-05-04"><span class="fc-day-number">4</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#f56954;border-color:#f56954"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">All Day Event</span></div></a></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 96px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2019-05-05"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2019-05-06"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2019-05-07"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2019-05-08"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2019-05-09"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2019-05-10"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2019-05-11"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2019-05-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-mon fc-past" data-date="2019-05-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-tue fc-past" data-date="2019-05-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-wed fc-past" data-date="2019-05-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-thu fc-past" data-date="2019-05-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-fri fc-past" data-date="2019-05-10"><span class="fc-day-number">10</span></td><td class="fc-day-top fc-sat fc-past" data-date="2019-05-11"><span class="fc-day-number">11</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 96px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2019-05-12"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2019-05-13"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2019-05-14"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2019-05-15"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2019-05-16"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2019-05-17"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2019-05-18"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2019-05-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-mon fc-past" data-date="2019-05-13"><span class="fc-day-number">13</span></td><td class="fc-day-top fc-tue fc-past" data-date="2019-05-14"><span class="fc-day-number">14</span></td><td class="fc-day-top fc-wed fc-past" data-date="2019-05-15"><span class="fc-day-number">15</span></td><td class="fc-day-top fc-thu fc-past" data-date="2019-05-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-fri fc-past" data-date="2019-05-17"><span class="fc-day-number">17</span></td><td class="fc-day-top fc-sat fc-past" data-date="2019-05-18"><span class="fc-day-number">18</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 96px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2019-05-19"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2019-05-20"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2019-05-21"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2019-05-22"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2019-05-23"></td><td class="fc-day fc-widget-content fc-fri fc-today " data-date="2019-05-24"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2019-05-25"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2019-05-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-mon fc-past" data-date="2019-05-20"><span class="fc-day-number">20</span></td><td class="fc-day-top fc-tue fc-past" data-date="2019-05-21"><span class="fc-day-number">21</span></td><td class="fc-day-top fc-wed fc-past" data-date="2019-05-22"><span class="fc-day-number">22</span></td><td class="fc-day-top fc-thu fc-past" data-date="2019-05-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-fri fc-today " data-date="2019-05-24"><span class="fc-day-number">24</span></td><td class="fc-day-top fc-sat fc-future" data-date="2019-05-25"><span class="fc-day-number">25</span></td></tr></thead><tbody><tr><td class="fc-event-container" colspan="3"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#f39c12;border-color:#f39c12"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Long Event</span></div></a></td><td rowspan="2"></td><td rowspan="2"></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#0073b7;border-color:#0073b7"><div class="fc-content"><span class="fc-time">10:30a</span> <span class="fc-title">Meeting</span></div></a></td><td class="fc-event-container" rowspan="2"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#00a65a;border-color:#00a65a"><div class="fc-content"><span class="fc-time">7p</span> <span class="fc-title">Birthday Party</span></div></a></td></tr><tr><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" style="background-color:#00c0ef;border-color:#00c0ef"><div class="fc-content"><span class="fc-time">12p</span> <span class="fc-title">Lunch</span></div></a></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 96px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2019-05-26"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2019-05-27"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2019-05-28"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2019-05-29"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2019-05-30"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2019-05-31"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2019-06-01"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2019-05-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-mon fc-future" data-date="2019-05-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-tue fc-future" data-date="2019-05-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-wed fc-future" data-date="2019-05-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-thu fc-future" data-date="2019-05-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-fri fc-future" data-date="2019-05-31"><span class="fc-day-number">31</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2019-06-01"><span class="fc-day-number">1</span></td></tr></thead><tbody><tr><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" href="http://google.com/" style="background-color:#3c8dbc;border-color:#3c8dbc"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Click for Google</span></div></a></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 96px;"><div class="fc-bg"><table class=""><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2019-06-02"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2019-06-03"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2019-06-04"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2019-06-05"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2019-06-06"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2019-06-07"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2019-06-08"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-future" data-date="2019-06-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-mon fc-other-month fc-future" data-date="2019-06-03"><span class="fc-day-number">3</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2019-06-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2019-06-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2019-06-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2019-06-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2019-06-08"><span class="fc-day-number">8</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /. box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </section>



          <script>
            $(function () {

              /* initialize the external events
               -----------------------------------------------------------------*/
              function init_events(ele) {
                ele.each(function () {

                  // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                  // it doesn't need to have a start or end
                  var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                  }

                  // store the Event Object in the DOM element so we can get to it later
                  $(this).data('eventObject', eventObject)

                  // make the event draggable using jQuery UI
                  $(this).draggable({
                    zIndex        : 1070,
                    revert        : true, // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                  })

                })
              }

              init_events($('#external-events div.external-event'))

              /* initialize the calendar
               -----------------------------------------------------------------*/
              //Date for the calendar events (dummy data)
              var date = new Date()
              var d    = date.getDate(),
                  m    = date.getMonth(),
                  y    = date.getFullYear()
              $('#calendar').fullCalendar({
                header    : {
                  left  : 'prev,next today',
                  center: 'title',
                  right : 'month,agendaWeek,agendaDay'
                },
                buttonText: {
                  today: 'today',
                  month: 'month',
                  week : 'week',
                  day  : 'day'
                },
                //Random default events
                events    : [
                  {
                    title          : 'All Day Event',
                    start          : new Date(y, m, 1),
                    backgroundColor: '#f56954', //red
                    borderColor    : '#f56954' //red
                  },
                  {
                    title          : 'Long Event',
                    start          : new Date(y, m, d - 5),
                    end            : new Date(y, m, d - 2),
                    backgroundColor: '#f39c12', //yellow
                    borderColor    : '#f39c12' //yellow
                  },
                  {
                    title          : 'Meeting',
                    start          : new Date(y, m, d, 10, 30),
                    allDay         : false,
                    backgroundColor: '#0073b7', //Blue
                    borderColor    : '#0073b7' //Blue
                  },
                  {
                    title          : 'Lunch',
                    start          : new Date(y, m, d, 12, 0),
                    end            : new Date(y, m, d, 14, 0),
                    allDay         : false,
                    backgroundColor: '#00c0ef', //Info (aqua)
                    borderColor    : '#00c0ef' //Info (aqua)
                  },
                  {
                    title          : 'Birthday Party',
                    start          : new Date(y, m, d + 1, 19, 0),
                    end            : new Date(y, m, d + 1, 22, 30),
                    allDay         : false,
                    backgroundColor: '#00a65a', //Success (green)
                    borderColor    : '#00a65a' //Success (green)
                  },
                  {
                    title          : 'Click for Google',
                    start          : new Date(y, m, 28),
                    end            : new Date(y, m, 29),
                    url            : 'http://google.com/',
                    backgroundColor: '#3c8dbc', //Primary (light-blue)
                    borderColor    : '#3c8dbc' //Primary (light-blue)
                  }
                ],
                editable  : true,
                droppable : true, // this allows things to be dropped onto the calendar !!!
                drop      : function (date, allDay) { // this function is called when something is dropped

                  // retrieve the dropped element's stored Event Object
                  var originalEventObject = $(this).data('eventObject')

                  // we need to copy it, so that multiple events don't have a reference to the same object
                  var copiedEventObject = $.extend({}, originalEventObject)

                  // assign it the date that was reported
                  copiedEventObject.start           = date
                  copiedEventObject.allDay          = allDay
                  copiedEventObject.backgroundColor = $(this).css('background-color')
                  copiedEventObject.borderColor     = $(this).css('border-color')

                  // render the event on the calendar
                  // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                  $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

                  // is the "remove after drop" checkbox checked?
                  if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove()
                  }

                }
              })

              /* ADDING EVENTS */
              var currColor = '#3c8dbc' //Red by default
              //Color chooser button
              var colorChooser = $('#color-chooser-btn')
              $('#color-chooser > li > a').click(function (e) {
                e.preventDefault()
                //Save color
                currColor = $(this).css('color')
                //Add color effect to button
                $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
              })
              $('#add-new-event').click(function (e) {
                e.preventDefault()
                //Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                  return
                }

                //Create events
                var event = $('<div />')
                event.css({
                  'background-color': currColor,
                  'border-color'    : currColor,
                  'color'           : '#fff'
                }).addClass('external-event')
                event.html(val)
                $('#external-events').prepend(event)

                //Add draggable funtionality
                init_events(event)

                //Remove event from text input
                $('#new-event').val('')
              })
            })
          </script> --}}

  </section>


@endsection
