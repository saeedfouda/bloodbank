@extends('layouts.app')

@section('page_title')
Edit cities
@endsection


@section('content')





    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit cities </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                    {!! Form::model($model,[ 'action' =>[ 'CitiesController@update',$model->id] , 'method'=>'put' ]) !!}

                    @include('cities.form')

                    {!! Form::close() !!}
            </div>
            <!-- /.box-body -->




    </section>


@endsection
