@extends('layouts.app')
@section('content')

<div class=row>
   
    <h3>Add an entry</h3>
    {!! Form::open(['action' => 'EntryController@store','method'=>'POST']) !!}
      {{ csrf_field() }}
     <div class="col-md-8">
    <table class="table table-responsive table-condensed">
        <tr>
           
            <td> {{Form::textarea('entry','',['class'=>'form-control','placeholder'=>'Income or Expenditure description here (Max 250 characters)','rows'=>'5','maxlength'=>'250'])}}</td>
           
        </tr>
    </table>
    
    <hr>
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
     </div>
     <div class="col-md-4">
    <table class="table-responsive table-condensed">
        <tr>
             <td> {{Form::label('amount','Amount:')}}</td>
           <td>{{ Form::number('amount', 'value',['class'=>'form-control','placeholder'=>'123456'])}}</td>
        </tr>
        <tr>
            <td> {{Form::label('category','Category Type')}}</td>
            <td>{{Form::select('category', ['Income' => 'Income', 'Expenditure' => 'Expenditure'], null, ['placeholder' => 'Select Type','class'=>'form-control'])}}</td>
        </tr>
         <tr> 
            <td> {{Form::label('type','Category')}}</td>
            <td>{{ Form::select('type',[], null, ['placeholder' => 'Select category type first','class'=>'form-control']) }}</td>
        </tr>
    </table>
     </div>
    
    {!! Form::close() !!}
    <script src="{{ asset('js/jquery.js') }}"></script>
   <script> $(document).ready(function() {
        $('select[name="category"]').on('change', function() {
            var category_type = $(this).val();
                if (category_type) {
                     $.ajax({
                        url: '/entries/getCategory/' + category_type,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                        
                        $('select[name="type"]').empty();
                        $.each(data,function(key,value){
                        	$('select[name="type"]').append('<option value="'+key+'">'+value+'</option>');
                        });
                    }
                });
            }else{
                $('select[name="type"]').empty();
            }
        })
    }) 
</script>
</div>
<div class="row">
    <hr>
    <h3>Recent Entries</h3>
    <div class="col-md-12">
        @if (count($entries) > 0)
            <table class="table table-responsive table-hover table-condensed">
                <thead>
                        <tr>
                        <th  class="col-md-1">#</th>
                        <th  class="col-md-5">Entry</th>
                        <th  class="col-md-2">Amount</th>
                        <th  class="col-md-1">Category</th>
                        <th  class="col-md-2">Category Type</th>
                        <th  class="col-md-1">Logged by</th>
                    </tr>
                    </thead>
                     @foreach ($entries as $entry)
                   <tbody>
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$entry->entry}}</td>
                        <td>N{{ number_format($entry->amount,2, '. ', ', ') }}</td>
                        <td>{{$entry->category}}</td>
                        <td>{{$entry->category_type}}</td>
                        <td>{{$entry->name}}</td>
                    </tr>
                   </tbody>
                @endforeach
               
            </table>
             {{$entries->links()}}
        @else
                    <p>No entries found</p>
        @endif
    </div>
</div>
@endsection