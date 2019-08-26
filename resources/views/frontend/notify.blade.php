@extends("layouts.frontend")

@section('title')
    Redirecting
@endsection

@section('content')
    <div class="text-center align-self-center text-heading mt-120 pt-120 pb-120">
        @if($is_success)
            <h2 class="mb-3">Payment Successful</h2>
            <p>Your Ride has been successfully booked and a confirmation has been sent to your email.</p>
        @else
            <h2 class="mb-3">OOPs!</h2>
            <p>{{$message}}</p>
        @endif
    </div>
@endsection