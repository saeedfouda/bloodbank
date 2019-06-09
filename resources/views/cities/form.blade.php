@include('layouts.message')

   <div class="form-group">
    {{ Form::label('name') }}
    {{ Form::text('name', null, [ 'placeholder'=>'Enter Post name', 'class'=>'form-control' ]) }}
</div>



<div class="form-group">
    {!! Form::label('Governorate') !!}
    {!! Form::select('governorate_id',App\Models\Governorate::pluck('name' , 'id' ),null,['class'=>'form-control','placeholder'=>'Select governorate']) !!}
 </div>






{{-- <div class="form-group">
        <button class="btn btn-primary" type="submit">Create</button>
 </div> --}}

{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
