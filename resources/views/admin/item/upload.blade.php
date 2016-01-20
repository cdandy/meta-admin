@extends('admin.layout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="{{ URL::asset('js/plupload.full.min.js') }}"></script>
<p>
        <button id="browse">选择文件</button>
        <button id="start_upload">开始上传</button>
    </p>
    <script>



    //实例化一个plupload上传对象
    var uploader = new plupload.Uploader({
        browse_button : 'browse', //触发文件选择对话框的按钮，为那个元素id
        url : "{{ url('admin/item/upload') }}", //服务器端的上传页面地址
        flash_swf_url : 'js/Moxie.swf', //swf文件，当需要使用swf方式进行上传时需要配置该参数
        silverlight_xap_url : 'js/Moxie.xap', //silverlight文件，当需要使用silverlight方式进行上传时需要配置该参数
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });    

    //在实例对象上调用init()方法进行初始化
    uploader.init();

    //绑定各种事件，并在事件监听函数中做你想做的事
    uploader.bind('FilesAdded',function(uploader,files){
        //每个事件监听函数都会传入一些很有用的参数，
        //我们可以利用这些参数提供的信息来做比如更新UI，提示上传进度等操作
    });
    uploader.bind('UploadProgress',function(uploader,file){
        //每个事件监听函数都会传入一些很有用的参数，
        //我们可以利用这些参数提供的信息来做比如更新UI，提示上传进度等操作
    });
    //......
    //......

    //最后给"开始上传"按钮注册事件
    document.getElementById('start_upload').onclick = function(){
        uploader.start(); //调用实例对象的start()方法开始上传文件，当然你也可以在其他地方调用该方法
    }

    </script>
    
    @stop