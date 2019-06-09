@extends('layouts.app')

@section('page_title')
<a href="{{ url('clients') }}"><i class="fa fa-users"></i> <span>العملاء</span></a>
@endsection
@section('content')


    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">كل العملاء</h3>



                <form class="box-tools pull-right" method="POST" action="{{ url('clients/search') }}">
                    @csrf
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="q" id="q" class="form-control pull-right"  placeholder="Search Client">

                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                </form>

            </div>


            <div class="box-body">
                @include('flash::message')
                @if(count($records))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th  class="text-center">#</th>
                                <th  class="text-center">الإسم</th>
                                <th  class="text-center">الإيميل</th>
                                <th  class="text-center">تاريخ الميلاد</th>
                                <th  class="text-center">الهاتف</th>
                                <th  class="text-center">فصيلة الدم</th>
                                <th  class="text-center">اخر تاريخ تبرع بالدم</th>
                                <th  class="text-center">المدينة</th>
                                <th class="text-center">حذف</th>
                                <th class="text-center">active</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr id="removable{{$record->id}}">
                                    <td  class="text-center">{{$loop->iteration}}</td>
                                    <td  class="text-center">{{$record->name}}</td>
                                    <td  class="text-center">{{$record->email}}</td>
                                    <td  class="text-center">{{$record->birth_of_date}}</td>
                                    <td  class="text-center">{{$record->phone}}</td>
                                    <td  class="text-center">{{ $record->bloodType->name}}</td>
                                    <td  class="text-center">{{$record->last_donation_date}}</td>
                                    <td  class="text-center">{{ $record->city->name}}</td>

                                    <td class="text-center"><!-- button delete -->
                                        {!! Form::open([
                                             'action' =>[ 'ClientController@destroy',$record->id] ,
                                             'method'=>'delete'
                                         ]) !!}

                                        <button  type="submit"
                                                 class="destroy btn btn-danger btn-xs"
                                                 data-toggle="modal"
                                                  data-target="#del_admin2">
                                                  <i class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                        </td>
                                        <td  class="text-center">
                                                <a class="btn btn-<?php if($record->active == 1)
                                                        {echo 'success'; }
                                                        else {echo 'danger'; } ?> btn-xs active_client_link"
                                                        href="{{url(route('clients.edit', $record->id))}}">
                                                        <i class="fa fa-<?php if($record->active == 1)
                                                                                {echo 'check'; }
                                                                                else {echo 'close'; } ?>">
                                                        </i>
                                                </a>
                                                {{-- {{url(route('clients.edit', $record->id))}} --}}
                                        </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>



                    </div>
                @else
                   <p class="text-center"> لا يوجد عملاء !!</p>
                @endif
            </div>

            {{-- <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    {{$records->links()}}
                </div>
            </div> --}}



        </div>




    </section>
@endsection
