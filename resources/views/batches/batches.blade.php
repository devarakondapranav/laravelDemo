@extends('layouts.app')

@section('content')
    &nbsp;&nbsp;&nbsp;<a href="/batches/create" class="btn btn-primary">Place new Address verification order</a>
    <br><br>

    
      

    
    @if(count($batches)>0)
        <h3>Your previous orders.</h3>
        <!--<h6>{{$current_user}}</h6> -->

        @foreach($batches as $batch)
        @if($batch->c_id == $current_user)
            <div class="card">
              <div class="card-header">
                Order No: {{$batch->b_id}}
              </div>
              <div class="card-body">
                <h5>Status: {{$batch->status}}</h5>
                <h5 class="card-title">Placed at: {{$batch->created_at}}</h5>
                <p class="card-text"></p>
                <a href="/batches/{{$batch->b_id}}" class="btn btn-primary">More</a>
              </div>
            </div>
            <br>
        @endif
        @endforeach

     @else
        <p>No orders to show</p>
    @endif
    <script type="text/javascript">
      @if($isOrderPlaced)
      $(document).ready(function() {
          Swal.fire(
          'Success!',
          'Your order has been placed!',
          'success')
      });
      @endif
    </script>
@endsection