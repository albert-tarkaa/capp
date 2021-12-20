@extends('layouts.app')
@section('content')

<h3>Edit Category</h3><hr>
{!! Form::open(['action' => ['CategoryController@update',$categories->id],'method'=>'POST']) !!}

    <table class="table table-responsive table-condensed">
            <tr>
                    <td> {{Form::label('category','Category Type')}}</td>
                    <td>{{Form::select('category', ['Income' => 'Income', 'Expenditure' => 'Expenditure'], $categories->category_type, ['class'=>'form-control'])}}</td>
                </tr>
        <tr>
            <td> {{Form::label('name','Category')}}</td>
            <td> {{Form::text('name',$categories->category,['class'=>'form-control'])}}</td>
        </tr>
        <tr>
            <td> <label class="h4 " type="button"> <a href="/categories/create"><i class="fa fa-undo"></i>&nbsp; Back</a></label></td>
            <td>{{Form::hidden('_method','PUT')}}{{Form::submit('Update',['class'=>'btn btn-primary' ])}}
{!! Form::close() !!}
            </td>
        </tr>
    </table>
    {!! Form::close() !!}
@endsection