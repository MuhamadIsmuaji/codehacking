@extends('layouts.app2')

@section('content')
	<h1>Users</h1>

	@if(Session::has('deleted_user')) 
		<div>
			{{session('deleted_user')}}
		</div>
	@endif

	<div>
		<a href="{{route('users.create')}}">Create Users</a>
	</div>
	<table border="1" cellspacing="0" cellpadding="10">
		<thead>
			<tr>
				<th>ID</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Status</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>
		<tbody>
		@if($users)
			@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>

						@if($user->photo)
							<img height="100px" src="{{$user->photo->file}}">
						@else
							No User Photo
						@endif

					</td>
					<td>
						<a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a>
					</td>
					<td>{{$user->email}}</td>
					<td>{{$user->role->name}}</td>
					<td>{{$user->is_active}}</td>
					<td>{{$user->created_at->diffForHumans()}}</td>
					<td>{{$user->updated_at->diffForHumans()}}</td>
				</tr>
			@endforeach
		@endif
		</tbody>
	</table>
@endsection()