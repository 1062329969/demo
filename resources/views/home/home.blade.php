@extends('layouts.common')
@section('content')
    <style>
        .pagination{margin:20px 0}
        .pagination ul{display:inline-block;margin-bottom:0;margin-left:0;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;-webkit-box-shadow:0 1px 2px rgba(0,0,0,.05);-moz-box-shadow:0 1px 2px rgba(0,0,0,.05);box-shadow:0 1px 2px rgba(0,0,0,.05)}
        .pagination ul>li{display:inline}
        .pagination ul>li>a,.pagination ul>li>span{float:left;padding:4px 12px;border:1px solid #ddd;background-color:#fff;text-decoration:none;line-height:20px;border-left-width:0}
        .pagination ul>.active>a,.pagination ul>.active>span,.pagination ul>li>a:focus,.pagination ul>li>a:hover{background-color:#f5f5f5}
        .pagination ul>.active>a,.pagination ul>.active>span{color:#999;cursor:default}
        .pagination ul>.disabled>a,.pagination ul>.disabled>a:focus,.pagination ul>.disabled>a:hover,.pagination ul>.disabled>span{background-color:transparent;color:#999;cursor:default}
        .pagination ul>li:first-child>a,.pagination ul>li:first-child>span{-webkit-border-bottom-left-radius:4px;-moz-border-radius-bottomleft:4px;border-bottom-left-radius:4px;-webkit-border-top-left-radius:4px;-moz-border-radius-topleft:4px;border-top-left-radius:4px;border-left-width:1px}
        .pagination ul>li:last-child>a,.pagination ul>li:last-child>span{-webkit-border-top-right-radius:4px;-moz-border-radius-topright:4px;border-top-right-radius:4px;-webkit-border-bottom-right-radius:4px;-moz-border-radius-bottomright:4px;border-bottom-right-radius:4px}
        .pagination-centered{text-align:center}
        .pagination-right{text-align:right}
        .pagination-large ul>li>a,.pagination-large ul>li>span{padding:11px 19px;font-size:17.5px}
        .pagination-large ul>li:first-child>a,.pagination-large ul>li:first-child>span{-webkit-border-bottom-left-radius:6px;-moz-border-radius-bottomleft:6px;border-bottom-left-radius:6px;-webkit-border-top-left-radius:6px;-moz-border-radius-topleft:6px;border-top-left-radius:6px}
        .pagination-large ul>li:last-child>a,.pagination-large ul>li:last-child>span{-webkit-border-top-right-radius:6px;-moz-border-radius-topright:6px;border-top-right-radius:6px;-webkit-border-bottom-right-radius:6px;-moz-border-radius-bottomright:6px;border-bottom-right-radius:6px}
        .pagination-mini ul>li:first-child>a,.pagination-mini ul>li:first-child>span,.pagination-small ul>li:first-child>a,.pagination-small ul>li:first-child>span{-webkit-border-bottom-left-radius:3px;-moz-border-radius-bottomleft:3px;border-bottom-left-radius:3px;-webkit-border-top-left-radius:3px;-moz-border-radius-topleft:3px;border-top-left-radius:3px}
        .pagination-mini ul>li:last-child>a,.pagination-mini ul>li:last-child>span,.pagination-small ul>li:last-child>a,.pagination-small ul>li:last-child>span{-webkit-border-top-right-radius:3px;-moz-border-radius-topright:3px;border-top-right-radius:3px;-webkit-border-bottom-right-radius:3px;-moz-border-radius-bottomright:3px;border-bottom-right-radius:3px}
        .pagination-small ul>li>a,.pagination-small ul>li>span{padding:2px 10px;font-size:11.9px}
        .pagination-mini ul>li>a,.pagination-mini ul>li>span{padding:0 6px;font-size:10.5px}
    </style>
    @if(Session::has('success'))
        {{ Session::get('success') }}
    @elseif(Session::has('error'))
        {{ Session::get('error') }}
    @endif
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN BASIC PORTLET-->
                    <div class="widget orange">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Advanced Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                <tr>
                                    <th><i class="icon-bullhorn"></i> Company</th>
                                    <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                                    <th><i class="icon-bookmark"></i> Profit</th>
                                    <th><i class=" icon-edit"></i> Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $key=>$sort)
                                    <tr>
                                        <td><a href="#">{{ $sort ->id  }}</a></td>
                                        <td class="hidden-phone">{{ $sort -> name  }}</td>
                                        <td>12120.00$ </td>
                                        <td><span class="label label-important label-mini">Due</span></td>
                                        <td>
                                            <button class="btn btn-success"><i class="icon-ok"></i></button>
                                            <a href="/home/edit/{{ $sort ->id  }}" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                            <button class="btn btn-danger" data="{{ $sort ->id  }}"><i class="icon-trash "></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" class="pagination">{{ $list->links() }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BASIC PORTLET-->
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
<script>
    $(function () {
        $('.btn-danger').click(function () {
            var _id = $(this).attr('data');
            var _self = $(this);
            $.ajax({
                type: "GET",
                url: "/home/delete",
                data: {'id':_id},
                success: function(data){
                    alert(data);
                    _self.parents('tr').remove();
                }
            });
        })
    })
</script>
@endsection
