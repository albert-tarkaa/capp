@extends('layouts.app')
@section('content') 
  
        <div class="row">
    <h3>Members Register</h3>
    <div class="col-md-12">
        @if (count($members) > 0)
            <table class="table table-responsive table-hover table-condensed">
                <thead>
                        <tr>
                        <th  class="col-md-1">#</th>
                        <th  class="col-md-2">Title</th>
                        <th  class="col-md-2">Surname</th>
                        <th  class="col-md-2">Firstname</th>
                        <th  class="col-md-1">MiddleName</th>
                        <th  class="col-md-1">DOB</th>
                        <th  class="col-md-2">Email</th>
                        <th  class="col-md-1">Phone</th>
                    </tr>
                    </thead>
                     @foreach ($members as $member)
                   <tbody>
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$member->title}}</td>
                        <td>{{$member->surname}}</td>
                        <td>{{$member->firstname}}</td>
                        <td>{{$member->middlename}}</td>
                        <td>{{$member->DOB}}</td>
                        <td>{{$member->email}}</td>
                        <td>{{$member->phone}}</td>
                    </tr>
                   </tbody>
                @endforeach
               
            </table>
             {{$members->links()}}
        @else
                    <p>No records found</p>
        @endif
    </div>

    </div>
@endsection