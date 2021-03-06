@extends('layouts.default')


@section('headjs')
<script language="javascript" src="/js/LodopFuncs.js"></script>
<object  id="LODOP_OB" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width=0 height=0> 
		<embed id="LODOP_EM" type="application/x-print-lodop" width=0 height=0></embed>
</object>
@stop

@section('main')
	
<div class="row">
 <form action="{{ route('order.addShippingCode', ['printid' => $printid]) }}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="orderid" value="{{ $orders->order_id }}">
          <input type="hidden" name="printid" value="{{ $printid }}">
          
          <p style="font-size:32px;padding-bottom:20px;">请扫描物流单号</p>
          <input type="text" id="code" name="code" value="" class="form-control" style="font-size:32px;height:50px;width:400px;" >
          <button type="submit" class="btn btn-lg btn-success col-lg-12" style="display:none;">确认</button>
  </form>
</div>

<div class="row">
			<dl class="dl-horizontal">
				<dt>订单日期:</dt>
			  <dd>{{$orders->order_created}}</dd>
			  
			  <dt>订单号:</dt>
			  <dd>{{ $orders->taopix_order_id }}</dd>
			  
			  <dt>收货人姓名：</dt>
			  <dd>{{$orders->buy_name}}</dd>
			  
			  <dt>收货人电话：</dt>
			  <dd>{{$orders->buy_tel}}</dd>
			  
			  <dt>收货人城市：</dt>
			  <dd>{{ $orders->buy_province}}</dd>
			  
			  <dt>收货人地址：</dt>
			  <dd>{{ $orders->buy_address}}</dd>
			</dl>
</div>


<div class="row">
	<table class="table table-striped">
  		<tr>
  			<th>#</th>
  			<th>名称</th>
  			<th>商品代码</th>
  			<th>数量</th>
  			<th>价格</th>
  		</tr>
  		
  		<tr>
  			<td>{{ $orders->id }}</td>
  			<td>{{ $orders->name }}</td>
  			<td>{{ $orders->code }}</td>
  			<td>{{ $orders->qty }}</td>
  			<td>{{ $orders->price }}</td>
  		</tr>
	</table>
</div>

@if(count($imglist) > 0)
	
	@foreach($imglist as $value)
	   <img src = "{{ $imgroot }}{{ $value }}" >
	@endforeach
    
	@endif


<script>
	// 打印物流单
	function printNow() 
	{
			var LODOP = getLodop();
			//LODOP.SET_PRINT_MODE("CATCH_PRINT_STATUS",true);
			
			// 当前打印物流单时间
			var date = new Date();
			var msg =  "订单号：" + {{$orders->taopix_order_id}} + " 日期：" + date.getFullYear() + "" +  (date.getMonth() + 1) + "" + date.getDate();
			
			LODOP.PRINT_INIT("雅昌影像物流单");
			LODOP.SET_PRINT_STYLE("FontSize",13);
			LODOP.SET_PRINT_PAGESIZE (1,2300,1270,"");  // 设置打印纸质大小，单位mm(毫米)
			LODOP.ADD_PRINT_TEXTA("sender_name",107,29,100,20,"雅昌影像");
			LODOP.ADD_PRINT_TEXTA("sender_address",137,28,249,45,"");
			LODOP.ADD_PRINT_TEXTA("sender_company",191,28,247,20,"雅昌影像");
			LODOP.ADD_PRINT_TEXTA("sender_tel",216,29,247,20,"400600688");
			LODOP.ADD_PRINT_TEXTA("re_name",111,372,100,20,"{{$orders->buy_name}}");
			LODOP.ADD_PRINT_TEXTA("re_destination",111,533,110,20,"{{ $orders->buy_province}}");
			LODOP.ADD_PRINT_TEXTA("re_address",142,372,253,42,"{{ $orders->buy_address}}");
			LODOP.ADD_PRINT_TEXTA("re_company",192,371,253,20,"");
			LODOP.ADD_PRINT_TEXTA("re_tel",215,372,254,20,"{{ $orders->buy_tel}}");
			LODOP.ADD_PRINT_TEXTA("sender_note",373,372,261,43,"{{ $orders->name }} x{{ $orders->qty }}" + "\n" + msg);
			
			{{-- 如果指定打印机 --}}
			@if(isset($printid))
				if (LODOP.SET_PRINTER_INDEX({{$printid}})) {
						LODOP.PRINT();
				}
			@else
				{{-- 没有则默认打印机打印 --}}
				LODOP.PRINT();
			@endif
			
			//LODOP.PREVIEW();
			
			/*
			//LODOP.PREVIEW();
			
			if( LODOP.GET_VALUE('PRINT_STATUS_OK', job) )
					alert("打印成功");
			else {
					alert("失败~");
			}
			*/
	}
	
	
	function getStatuMessage(statusID) { 
		var messages="";
		if (statusID & 1) messages += "已暂停 -";
		if (statusID & 2) messages += "错误 -";
		if (statusID & 4) messages += "正删除 -";
		if (statusID & 8) messages += "进入队列 -";
		if (statusID & 16) messages += "正在打印 -";
		if (statusID & 32) messages += "脱机 -";
		if (statusID & 64) messages += "缺纸 -";
		if (statusID & 128) messages += "打印结束 -";
		if (statusID & 256) messages += "已删除 -";
		if (statusID & 512) messages += "堵了 -";
		if (statusID & 1024) messages += "用户介入 -";
		if (statusID & 2048) messages += "正在重新启动 -";
		return messages;
	}
	
	
	$(function(){
			$("#code").focus();
	if({{$status}} == 1){
		printNow();
	}		
　　	
　　	
　}); 
</script>
       
@stop


