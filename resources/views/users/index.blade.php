@extends('layouts.app')

@section('page_title')
<a href="{{ url('users') }}"><i class="fa fa-users"></i> <span>المديرين</span></a>
@endsection
@section('content')


    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">كل المديرين</h3>



                <form class="box-tools pull-right" method="POST" action="{{ url('users/search') }}">
                    @csrf
                        <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="q" id="q" class="form-control pull-right" placeholder="Search Client">

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
                                <th class="text-center">حذف</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr id="removable{{$record->id}}">
                                    <td  class="text-center">{{$loop->iteration}}</td>
                                    <td  class="text-center">{{$record->name}}</td>
                                    <td  class="text-center">{{$record->email}}</td>


                                    <td class="text-center"><!-- button delete -->
                                        {!! Form::open([
                                             'action' =>[ 'UserController@destroy',$record->id] ,
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


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                   <p class="text-center"> لا يوجد مديرين !!</p>
                @endif
            </div>

        </div>


    </section>
@endsection
