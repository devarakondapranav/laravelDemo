@extends('layouts.app')

@section('content')
    <table>
        <thead>
        <th>First Name</th>
        
        <th>E-Mail</th>
        <th>Corporate</th>
        <th>Manager</th>
        <th>Admin</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                
    {{ Form::open(array('action' => 'BatchController@postAdminAssignRoles', 'method' => 'POST')) }}
                    <td>{{ $user->name }}</td>
                    
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    <td><input type="checkbox" {{ $user->hasRole('CorporateClient') ? 'checked' : '' }} name="role_user"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Manager') ? 'checked' : '' }} name="role_author"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                    {{ csrf_field() }}
                    <td><input type="submit" value="Assign"></td>
        {{ Form::close() }}

                

                <!--
                {!! Form::open(['url' => '/admin/assign', 'method' =>'post']) !!}
                     <td>{{ $user->name }}</td>
                     <td>{!! Form::label('email', $user->email) !!}</td>
                     <td>{!!Form::checkbox('role_user', ' ',  $user->hasRole('CorporateClient') ? 'checked' : ''   ) !!}</td>
                     <td>{!! Form::checkbox('role_author', ' ', $user->hasRole('Manager') ? 'checked' : '' )!!}</td>
                     <td>{!!Form::checkbox('role_admin', ' ', $user->hasRole('Admin') ? 'checked' : '' )!!}</td>
                     <td>{!!Form::submit('Assign role!')!!}</td>
                {!! Form::close() !!}
                -->


            </tr>
        @endforeach
        </tbody>

    </table>
@endsection