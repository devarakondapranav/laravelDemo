@extends('layouts.app')

@section('content')
    <div class="card text-center">
    <div class="card-header">
      Order no: {{$batch->b_id}}
    </div>
    @foreach($avs as $av)
      <div class="card-body">
        <h5 class="card-title">{{$av->first_name }}  {{$av->last_name}}</h5>

        <p class="card-text">Status: {{$av->status}}</p>
        <p class="card-text">Type: Address Verification</p>
        <hr>
        
      </div>
    @endforeach
    <div class="card-footer text-muted">
     This order was placed on: {{$avs[0]->created_at}}
    </div>
</div>
@endsection