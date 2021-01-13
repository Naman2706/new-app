@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Student Details') }}</div>
                @if($flag == "Delete")
                	<div class="alert alert-danger">
                            {{ $message }}
                        </div>	
            	@elseif($flag=="Update")
            		<div class="alert alert-success">
                            {{ $message }}
                        </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Id</th>
					      <th scope="col">Edit</th>
					      <th scope="col">Delete</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Address</th>
					      <th scope="col">Percentage</th>
					      <th scope="col">Contact No</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($students as $student)
					    <tr>
					      <th scope="row">{{$student->id}}</th>
					      <td>
					      	<form method="POST" action="{{ route('student.destroy', $student->id) }}">
					      		@csrf
					      		@method('DELETE')
					      		<button type="submit" class="btn btn-danger" name="delete">Delete</button>
					      	</form>
					      </td>
					      <td>
					      	<form method="get" action="{{ route('student.show', $student->id) }}">
					      		<button type="submit" class="btn btn-success" name="edit">Edit</button>
					      	</form></td>
					      <td>{{$student->name}}</td>
					      <td>{{$student->email}}</td>
					      <td>{{$student->address}}</td>
					      <td>{{$student->percentage}}</td>
					      <td>{{$student->contactno}}</td>
					    </tr>
					    	@endforeach
					  </tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')