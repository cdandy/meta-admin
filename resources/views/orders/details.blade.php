@extends('layouts.default')

@section('main')


 <h4>订单信息(order)</h4>
<div class="row">
  <div class="span12">
   
    <div class="row">
      <div class="span4">订单号  ： {{ $orders->taopix_order_id }}</div>
      <div class="span4">联系人名称：{{$orders->buy_name}}</div>
      <div class="span4">用户id: {{ $orders->taopix_uid }}</div>
      <div class="span4">电话号码: {{$orders->buy_tel}}</div>
      <div class="span4">邮箱: {{$orders->buy_email}}</div>
      <div class="span4">地址: {{ $orders->buy_address}}</div>
      <div class="span4">订单日期: {{ $orders->order_created}}</div>
      <div class="span4">优惠劵名称: {{$orders->voucher_name}}</div>
      <div class="span4">优惠劵码: {{$orders->voucher_code}}</div>
      <div class="span4">优惠金额: {{$orders->voucher_price}}</div>
      <div class="span4">支付方式: {{$orders->pay_name}}</div>
      <div class="span4">支付交易id: {{$orders->pay_order_id}}</div>
      <div class="span4">支付状态: {{$orders->pay_status}}</div>
      <div class="span4">物流价格: {{$orders->shipping_total}}</div>
      <div class="span4">物流单号: {{$orders->shipping_code}}</div>
      <div class="span4">订单总计: {{$orders->total}}</div>
      <div class="span4">实际支付总金额: {{$orders->pay_total}}</div>
      
      <div class="span4">物流类型 {{$orders->shipping_name}}</div>
      <div class="span8">备注: {{$orders->remark}}</div>
      
    </div>

  </div>
    </div>
    
    <br>
   <h4> 产品(item)</h4>
       
     <div class="row">
  <div class="span12">
   
    <div class="row">
      <div class="span4">订单号  ： {{ $orders->taopix_order_id }}</div>
      <div class="span4">名称：{{ $orders->name }}</div>
      <div class="span4">数量: {{ $orders->qty }}</div>
      <div class="span4">价格: {{ $orders->price }}</div>
      <div class="span4">商品代码: {{ $orders->code }}</div>
    </div>
  </div>
    </div>
	
	@if(count($imglist) > 0)
	
	@foreach($imglist as $value)
	   <img src = "{{ $imgroot }}{{ $value }}" >
	@endforeach
    
	@endif
	
			
@endsection