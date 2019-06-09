@include('layouts.message')


<div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>


{{-- <div class="form-group">
        <button class="btn btn-primary" type="submit">Create</button>
 </div> --}}

{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
