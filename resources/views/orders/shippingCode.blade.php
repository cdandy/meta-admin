@extends('layouts.default')

@section('main')
<a class="brand" href="{{ URL::route('orders.index') }}">物流单号</a>

 <form action="{{ URL('orders/addShippingCode')}}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="orderid" value="{{ $orderid  }}"> 
          <label>物流单号</label>
          <input type="text" id="code" name="code" class="form-control" >
          <button type="submit" class="btn btn-lg btn-success col-lg-12">确认</button>
  </form>
			
@endsection
