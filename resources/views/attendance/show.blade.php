@extends('layouts.app')
@section('content') 

 {!! Form::open(['action' => 'AttendanceController@records','method'=>'POST']) !!}
 <div class="row">
     <div class="col-xs-12">
         <span class="well well-sm center-block text-center">Please select a date to display the attendance records</span><br/>
         <br/>
         <table class="table table-responsive table-condensed">
             <tr>
                <td> {{Form::label('date','Date')}}</td>
                <td class="col-xs-4"> {{Form::date('date', \Carbon\Carbon::now()->toDateString(),['class'=>'form-control','required'])}}</td>
                  <td class="col-xs-7"> {{Form::submit('Submit',['class'=>'btn btn-primary' ])}}</td>
             </tr>
         </table>
     </div>
 </div>
  {!! Form::close() !!}

  <div class="row">
    <hr>
   
    <div class="col-xs-12">
        @if (isset($entries) && count($entries) > 0)
         <h3>Attendance for {{$post}}</h3>
            <table class="table table-responsive table-hover table-condensed">
                <thead>
                        <tr>
                        <th  class="col-xs-1">#</th>
                        <th  class="col-xs-2">Title</th>
                        <th  class="col-xs-2">Surname</th>
                        <th  class="col-xs-1">Firstname</th>
                        <th  class="col-xs-2">Middlename</th>
                        <th  class="col-xs-1">Email</th>
                       
                    </tr>
                    </thead>
                     @foreach ($entries as $entry)
                   <tbody>
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$entry->title}}</td>
                        <td>{{$entry->surname}}</td>
                        <td>{{$entry->firstname}}</td>
                        <td>{{$entry->middlename}}</td>
                        <td>{{$entry->email}}</td>
                        
                    </tr>
                   </tbody>
                @endforeach
               
            </table>
             {{$entries->links()}}
        @else
                    <p>No records found</p>
        @endif
    </div>
</div>
@endsection