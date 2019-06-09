@include('layouts.message')

{!! Form::open(['route' => 'posts.store', 'method' => 'POST', 'files' => true, 'class' => 'create_post_form']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Post title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Post title']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Post body', ['class' => 'control-label']) !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control ckeditor ', 'placeholder' => 'Post body']) !!}
                    {{-- ckeditor --}}
                </div>
                <div class="form-group">
                        {!! Form::label('Category') !!}
                        {!! Form::select('category_id',App\Models\Category::pluck('name' , 'id' ),null,['class'=>'form-control','placeholder'=>'Select category']) !!}
                    </div>

                    <div class="form-group" style="position: relative;">
                            <label for="image" class="btn btn-primary btn-sm"><i class="fa fa-camera"></i> Choose image</label>
                            {!! Form::file('image', ['class' => 'hidden image', 'id' => 'image']) !!}
                            <span class="btn btn-danger btn-sm delete_img"><i class="fa fa-close"></i> Delete image</span>
                        </div>

                <div class="image_content"></div>

                {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}

                {!! Form::close() !!}




