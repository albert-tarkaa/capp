@extends('layouts.app')
@section('content')
<div class=row>
    <div class="col-md-5">
         <h3>Add Category</h3>
    {!! Form::open(['action' => 'CategoryController@store','method'=>'POST']) !!}

    <table class="table table-responsive table-condensed">
            <tr>
                    <td> {{Form::label('category','Category Type')}}</td>
                    <td>{{Form::select('category', ['Income' => 'Income', 'Expenditure' => 'Expenditure'], null, ['placeholder' => 'Select Category Type','class'=>'form-control'])}}</td>
                </tr>
        <tr>
            <td> {{Form::label('name','Category')}}</td>
            <td> {{Form::text('name','',['class'=>'form-control','placeholder'=>'Enter Category Here'])}}</td>
        </tr>
        
    </table>
    {{Form::submit('Submit',['class'=>'btn btn-primary' ])}}
    {!! Form::close() !!}
    </div>
    <div class="col-md-7">
        <h3>List of Categories</h3>
        
            @if (count($incomes) > 0 ||count($expenditures) > 0)
            <div style="display:flex;">
            <table class="table table-responsive table-condensed ">
                <tr>
                    <th>Income</th>
                   
                </tr>
                  @foreach ($incomes as $income)
                     <tr>
                        <td>{{$income->category}}</td>
                       
                        <td>
                            <a href="/categories/{{$income->id}}/edit" ><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span></a>
                        </td>
                        <td>
                            {!! Form::open(['action' =>['CategoryController@destroy',$income->id],'method'=>'POST']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::button('<i class="fa fa-trash"></i> ', array(
                            'type' => 'submit',
                            'style'=>'background: none;border: none;color: #3097D1;font-size: 1.3em;font-style: normal;font-weight: 400;line-height: 1;'))}}
                            {!! Form::close() !!}
                        </td>
                       
                    </tr>
                    @endforeach
                   
            </table>

            <table class="table table-responsive table-condensed ">
                <tr>
                    <th>Expenditure</th>
                </tr>
                    @foreach ($expenditures as $expenditure)
                     <tr>
                          <td>{{$expenditure->category}}</td>

                           <td>
                            <a href="/categories/{{$expenditure->id}}/edit" ><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span></a>
                        </td>
                        <td>
                           {!! Form::open(['action' =>['CategoryController@destroy',$expenditure->id],'method'=>'POST']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::button('<i class="fa fa-trash"></i> ', array(
                            'type' => 'submit',
                            'style'=>'background: none;border: none;color: #3097D1;font-size: 1.3em;font-style: normal;font-weight: 400;line-height: 1;'))}}
                            {!! Form::close() !!}
                        </td>
                       </tr>
                    @endforeach
                   
            </table>
            </div>
               
            @else
                <p>No categories added</p>
            @endif

    </div>
</div>
@endsection