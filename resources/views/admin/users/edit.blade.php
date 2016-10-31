@extends('layouts.app2')

@section('content')
	<h1>Edit Users</h1>
	
	<div>
		@if($user->photo)
			<img height="100px" src="{{$user->photo->file}}">
		@else
			No User Photo
		@endif
	</div>

	<div>
		{!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
			{!! Form::submit('Delete User', []) !!}
		{!! Form::close() !!}
	</div>

	<table>
		{!! Form::model($user,['action' => ['AdminUsersController@update', $user->id], 'method' => 'PATCH', 'files' => true]) !!}
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
				<td>{!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], null, []) !!}</td>
			</tr>
			<tr>
				<td>{!! Form::label('password', 'Password : ', []) !!}</td>
				<td>{!! Form::password('password', null, []) !!}</td>
			</tr>
			<tr>
				<td>{!! Form::label('photo_id', 'Picture : ', []) !!}</td>
				<td>{!! Form::file('photo_id', []) !!}</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					{!! Form::submit('Update User', []) !!}
				</td>
			</tr>
		</tbody>
		{!! Form::close() !!}
	</table>

	@include('includes.form_error')

@endsection