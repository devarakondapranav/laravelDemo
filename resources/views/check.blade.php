@extends('layouts.app')

@section('content')
    <form action="/check" method="POST">
        Name: <input type="text" name="first_name">
        <input type="submit" name="submit">
    </form>
@endsection