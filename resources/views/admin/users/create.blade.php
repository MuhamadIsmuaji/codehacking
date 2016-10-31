@extends('layouts.app2')

@section('content')
	<h1>Create Users</h1>
	
	<table>
		{!! Form::open(['action' => 'AdminUsersController@store', 'method' => 'POST', 'files' => true]) !!}
		<tbody>
			<tr>
				<td>{!! Form::label('name', 'Name : ', []) !!}</td>
				<td>{!! Form::text('name', null, []) !!}</td>
			</tr>
			<tr>
				<td>{!! Form::label('email', 'Email : ', []) !!}</td>
				<td>{!! Form::text('email', null, []) !!}</td>
			</tr>
			<tr>
				<td>{!! Form::label('role_id', 'Role : ', []) !!}</td>
				<td>{!! Form::select('role_id', ['' => 'Choose Options'] + $roles, null, []) !!}</td>
			</tr>
			<tr>
				<td>{!! Form::label('is_active', 'Status : ', []) !!}</td>
				<td>{!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], 0, []) !!}</td>
			</tr>
			<tr>
				<td>{!! Form::label('password', 'Password : ', []) !!}</td>
				<td>{!! Form::password('password', null, []) !!}</td>
			</tr>
			<tr>
				<td>{!! Form::label('file', 'Picture : ', []) !!}</td>
				<td>{!! Form::file('file', []) !!}</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					{!! Form::submit('Create User', []) !!}
				</td>
			</tr>
		</tbody>
		{!! Form::close() !!}
	</table>

	@include('includes.form_error')

@endsection