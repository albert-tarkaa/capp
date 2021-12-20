@extends('layouts.app')
@section('content')
<div class=row>
    <div class="col-md-12">
         <h3>Enroll Member</h3>
    {!! Form::open(['action' => 'memberController@store','method'=>'POST']) !!}

    <table class="table table-responsive table-condensed">
            <tr>
                    <td> {{Form::label('title','Title')}}</td>
                    <td>{{Form::text('title','', ['placeholder' => 'Enter Title (Optional)','class'=>'form-control'])}}</td>
                     <td> {{Form::label('surname','Surname')}}</td>
                    <td> {{Form::text('surname','',['class'=>'form-control','placeholder'=>'Surname','required'])}}</td>
                </tr>
        <tr>
            <td> {{Form::label('firstname','Firstname')}}</td>
            <td> {{Form::text('firstname','',['class'=>'form-control','placeholder'=>'Firstname','required'])}}</td>
             <td> {{Form::label('middlename','Middlename')}}</td>
            <td> {{Form::text('middlename','',['class'=>'form-control','placeholder'=>'Middlename'])}}</td>
        </tr>
        <tr>
            <td> {{Form::label('dob','Date of Birth')}}</td>
            <td> {{Form::date('dob', \Carbon\Carbon::now(),['class'=>'form-control','required'])}}</td>
             <td> {{Form::label('email','Email')}}</td>
            <td> {{Form::text('email','',['class'=>'form-control','placeholder'=>'email@mail.com','required'])}}</td>
        </tr>
         <tr>
            <td> {{Form::label('phone','Mobile Number')}}</td>
            <td> {{Form::text('phone','',['class'=>'form-control','placeholder'=>'Mobile Number','maxlength'=>'11','required'])}}</td>
             <td> {{Form::label('address','Contact Address')}}</td>
            <td> {{Form::textarea('address','',['class'=>'form-control','placeholder'=>'Contact Address (max 250 characters)','rows'=>'5','maxlength'=>'250','required'])}}</td>
        </tr>
       
    </table>
    {{Form::submit('Submit',['class'=>'btn btn-primary' ])}}
    {!! Form::close() !!}
    </div>
    
</div>
@endsection