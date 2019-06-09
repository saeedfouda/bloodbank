@include('layouts.message')

{!! Form::open([ 'action' =>[ 'PostsController@update',$post->id] , 'method'=>'PUT','files' => true ]) !!}



 <div class="form-group">
    {{ Form::label('العنوان') }}
    {{ Form::text('title', $post->title, [ 'placeholder'=>'Enter Post Title', 'class'=>'form-control' ]) }}
</div>

<div class="form-group">
    {{ Form::label('المحتوى') }}
    {{ Form::textarea('body', $post->body, [ 'placeholder'=>'Enter Post Title', 'class'=>'form-control ckeditor' ]) }}
</div>

<div class="form-group">
    {!! Form::label('Category') !!}
    <select name="category_id" id="category" class="form-control">
            @foreach ($categories as $category)
            <option @if ($category->id == $post->category_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group" style="position: relative;">
        <label for="image" class="btn btn-primary btn-sm"><i class="fa fa-camera"></i> Choose image</label>
        {!! Form::file('image', ['class' => 'hidden image', 'id' => 'image']) !!}
        <span class="btn btn-danger btn-sm delete_img"><i class="fa fa-close"></i> Delete image</span>
    </div>
    <div class="image_content" style="max-width: 50px; margin-bottom: 10px">
            <img src="{{ asset('images/posts/'.$post->image) }}" alt="" style="max-width: 100%">
    </div>



{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}

{!! Form::close() !!}
