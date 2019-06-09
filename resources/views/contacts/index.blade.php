@extends('layouts.app')
@section('page_title')
تواصل معنا
@endsection

@section('content')



<section class="content">
<div class="row">
<div class="col-md-3">

<div class="box box-solid">
<div class="box-header with-border">
<h3 class="box-title">التواصل</h3>

<div class="box-tools">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button>
</div>
</div>
<div class="box-body no-padding ">
<ul class="nav nav-pills nav-stacked ">
<li class="active "><a href="#"><i class=" fa fa-inbox"></i> Inbox


</ul>
</div>
<!-- /.box-body -->
</div>

</div>
<!-- /.col -->
<div class="col-md-9">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">بريد التواصل</h3>

<div class="box-tools pull-right">
<div class="has-feedback">
<input type="text" class="form-control input-sm" placeholder="Search Mail">
<span class="glyphicon glyphicon-search form-control-feedback"></span>
</div>
</div>
<!-- /.box-tools -->
</div>
<!-- /.box-header -->
<div class="box-body no-padding">
<div class="table-responsive mailbox-messages">
<table class="table table-hover table-striped">
<div class="box-body">
@include('flash::message')
@if(count($records))
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th class="text-center"><i class="fa fa-book" aria-hidden="true"></i></th>
                <th class="text-center">العنوان</th>
                <th class="text-center">الرسالة</th>
                <th class="text-center">اسم العميل</th>
                <th class="text-center">رقم اللفون</th>
                <th class="text-center">حذف</th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $record)
                <tr id="removable{{$record->id}}">
                    <td>{{$loop->iteration}}</td>
                    <td class="text-center">
                        <a class="fa fa-<?php if($record->is_read == 1) {echo 'check text-green'; } else {echo 'close text-red'; } ?>" href="{{url(route('contacts.edit', $record->id))}}"></a>


                    </td>
                    <td class="text-center">{{ $record->title }}</td>
                    <td class="text-center">{{ $record->message }}</td>
                    <td class="text-center">{{optional($record->client)->name}}</td>
                    <td class="text-center">{{ $record->phone }}</td>

                    <td class="text-center"><!-- button delete -->
                        {!! Form::open([
                                'action' =>[ 'ContactController@destroy',$record->id] ,
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
    <p class='text-center h3'>لا توجد رسائل !!</p>
@endif
</div>
</table>
<!-- /.table -->
</div>
<!-- /.mail-box-messages -->
</div>
<!-- /.box-body -->

</div>
<!-- /. box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->


</section>

@endsection
