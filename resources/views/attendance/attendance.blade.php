@extends('layouts.app')
@section('content') 

 {!! Form::open(['action' => 'AttendanceController@store','method'=>'POST']) !!}
 <div class="row">
     <div class="col-xs-4">
         <table class="table table-responsive table-condensed">
             <tr>
                <td> {{Form::label('date','Date')}}</td>
                <td> {{Form::date('date', \Carbon\Carbon::now(),['class'=>'form-control','required'])}}</td>
             </tr>
         </table>
     </div>
 </div>
   <div class="row">
    <h3>Members Register</h3>
    <div class="col-xs-12">
      
        @if (count($members) > 0)
         {{-- <h4>Attendance for today: {{ \Carbon\Carbon::now()->toFormattedDateString()}}</h4> --}}
            <table class="table table-responsive table-hover table-condensed">
                <thead>
                        <tr>
                        <th  class="col-xs-1">#</th>
                        <th  class="col-xs-2">Title</th>
                        <th  class="col-xs-2">Surname</th>
                        <th  class="col-xs-2">Firstname</th>
                        <th  class="col-xs-2">MiddleName</th>
                        <th  class="col-xs-2">Email</th>
                        <td class="col-xs-1">Attendance(Tick)</td>
                    </tr>
                    </thead>

                    @for ($i=0; $i < count($members); $i++) { 
                        <tbody>
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$members[$i]['title']}}</td>
                                <td>{{$members[$i]['surname']}}</td>
                                <td>{{$members[$i]['firstname']}}</td>
                                <td>{{$members[$i]['middlename']}}</td>
                                <td>{{$members[$i]['email']}}</td>
                                {{Form::hidden("collection[$i][id]", $members[$i]['id'])}}
                                <td>{{Form::hidden("collection[$i][id]", $members[$i]['id'])}}</td>
                                <td>{{Form::checkbox("collection[$i][attendance]", 1)}}</td>
                            </tr>
                        </tbody>
                     } @endfor
            </table>
              {{Form::submit('Submit',['class'=>'btn btn-primary' ])}}
        @else 
        No members enrolled at the moment
        @endif
       
    </div>
    </div>
   
 {!! Form::close() !!}
@endsection