@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>商品类型 <small>» 列表</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ url('admin/itemtype/create') }}" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> 新增  </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')

                <table id="tags-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>名称</th>
                            <th>状态</th>
                            <th class="hidden-sm">分组</th>
                        </tr>
                     </thead>
                    <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->status }}</td>
                            <td class="hidden-sm">{{ $value->attr_group }}</td>
                        
                            <td>
                                <a href="{{ url('admin/attribute/attrlist/'.$value->id) }} " class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 属性列表
                                </a>
                                <a href="{{ url('admin/itemtype/edit/'.$value->id) }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $("#tags-table").DataTable({
            });
        });
    </script>
@stop