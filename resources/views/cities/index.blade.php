@extends('layouts.app')


@section('page_title')
cities
@endsection


@section('content')





    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">List Of cities</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            @include('flash::message')
            <div class="box-body">
                    <a href="{{ url(route('cities.create')) }}" class="btn btn-primary"><i class="fa fa-plus"></i>  New cities</a>


                @if(count($records))

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th class="text-center" >#</th>
                                <th class="text-center" >Name</th>
                                <th class="text-center" >Governorate</th>
                                <th class="text-center" >Edit</th>
                                <th class="text-center" >Delete</th>
                            </thead>
                            <thead>
                                @foreach ($records as $record)
                                    <tr>
                                        <th class="text-center" >{{ $loop->iteration }}</td>
                                        <th class="text-center" >{{ $record->name }}</td>
                                        <th class="text-center" >{{optional($record->governorate)->name}}</td>
                                        <th class="text-center" >
                                            <a href="{{ url(route('cities.edit',$record->id)) }}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                        </td>

                                            <th class="text-center" ><!-- button delete -->
                                            {!! Form::open([
                                                 'action' =>[ 'CitiesController@destroy',$record->id] ,
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
                            </thead>
                        </table>
                    </div>
                    @else

                     <div class="alert alert-danger" role="alert">
                            no data
                        </div>
                @endif




            </div>
            <!-- /.box-body -->




    </section>


@endsection
