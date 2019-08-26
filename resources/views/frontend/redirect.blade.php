@extends("layouts.frontend")

@section('title')
    Redirecting
@endsection

@section('content')
    <div class="text-center align-self-center text-heading mt-120 pt-120 pb-120">
        <form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
            <input type="hidden" name="appId" value="{{$data['appId']}}"/>
            <input type="hidden" name="orderId" value="{{$data['orderId']}}"/>
            <input type="hidden" name="orderAmount" value="{{$data['orderAmount']}}"/>
            <input type="hidden" name="orderCurrency" value="INR"/>
            <input type="hidden" name="orderNote" value="{{$data['orderNote']}}"/>
            <input type="hidden" name="customerName" value="{{$data['customerName']}}"/>
            <input type="hidden" name="customerEmail" value="{{$data['customerEmail']}}"/>
            <input type="hidden" name="customerPhone" value="{{$data['customerPhone']}}"/>
            <input type="hidden" name="returnUrl" value="{{route('return')}}"/>
            <input type="hidden" name="notifyUrl" value="{{route('notify')}}"/>
            <input type="hidden" name="signature" value="{{$data['signature']}}"/>
        </form>
        <h2>Redirecting...</h2>
        <div class="spinner-border text-warning mt-3 mb-5" role="status">
            <span class="sr-only">Redirecting...</span>
        </div>
        <p>You are being redirected to the payment gateway</p>
        <button id="submit" class="btn btn-outline-warning">Continue <i class="fa fa-arrow-right"></i></button>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(()=>{
            (function redirectToPaymentGateway(){
                document.getElementById("redirectForm").submit()
            })();
            document.querySelector("#submit").addEventListener("click", redirectToPaymentGateway);
        });
    </script>
@endsection