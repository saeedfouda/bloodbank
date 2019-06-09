@extends('layouts.app')


@section('page_title')
<a href="{{ url('posts') }}"><i class="fa fa-edit"></i> <span>المقالات</span></a>

@endsection


@section('content')





<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">قائمه المقالات المنشوره</h3>

<div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
        <i class="fa fa-minus"></i></button>
    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
</div>

</div>
@include('flash::message')
@include('sweet::alert')
<div class="box-body">

<div class="box-header with-border">

    <a href="{{ url(route('posts.create')) }}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i>   اضافه مقال جديد</a>


    <form class="box-tools pull-right" method="POST" action="{{ url('posts/search') }}">
        @csrf
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="q" id="q" class="form-control pull-right" placeholder="Search Client">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
    </form>


    </div>

@if(count($records))

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th class="text-center">#</th>
                <th class="text-center">العنوان</th>
                <th class="text-center">المحتوى</th>
                <th class="text-center">القسم</th>
                <th class="text-center">الصورة</th>
                <th class="text-center">تعديل</th>
                <th class="text-center">حذف</th>
                <th class="text-center">مشاهده</th>
            </thead>
            <thead>
                {{-- @foreach ($records as $record)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $record->title }}</td>
                        <td class="text-center">{!! $record->body !!}</td>
                        <td class="text-center">{{optional($record->Category)->name}}</td>
                        <td class="text-center">
                                <img src="{{asset('/uploads/' . $record->image)}}" style="width:100px; height:100px">
                        </td>

                        <td class="text-center">
                            <a href="{{ url(route('posts.edit',$record->id)) }}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                        </td>


                            <td><!-- button delete -->
                            {!! Form::open([
                                    'action' =>[ 'PostsController@destroy',$record->id] ,
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
                @endforeach --}}
                @foreach ($records as $record)
                <tr class="tr_{{$record->id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$record->title}}</td>
                    <td>{!! \Illuminate\Support\Str::limit($record->body, 60)!!}</td>
                    <td>{{  $record->category->name}}</td>
                    <td class="text-center"><img style="width:50px; height:50px" src="{{ asset('images/posts/'.$record->image) }}" alt=""></td>
                    <td class="text-center">
                            <a href="{{ url(route('posts.edit',$record->id)) }}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                        </td>


                            <td><!-- button delete -->
                            {!! Form::open([
                                    'action' =>[ 'PostsController@destroy',$record->id] ,
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
                    <td class="text-center"><a class="btn btn-primary btn-sm" href="{{url(route('posts.show', $record->id))}}"><i class="fa fa-angle-double-right"></i></a></td>
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
