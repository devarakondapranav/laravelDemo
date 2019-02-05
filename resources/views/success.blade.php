@extends('layouts.app')

@section('content')
  
  

  <h1>order placed successfully</h1>
   <script type="text/javascript">
   	
      $(document).ready(function() {
          Swal.fire({
  type: 'success',
  title: 'Success',
  text: 'Order Placed',
  footer: '<a href>Why do I have this issue?</a>'
	}).then(function() {
    window.location = "/batches";
});
});
     
    
   </script>
    
@endsection