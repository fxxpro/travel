<?php
include('../../../static/php/conn.php');

//查询单条详情渲染页面
if(isset($_GET['id'])){
       $id=$_GET['id'];
       $sql="delete  from register where id ='$id'";
       $res= mysqli_query($conn,$sql);
       if($res){
        echo '<script>alert("删除成功"); window.reload();</script>';
       }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <title>管理员管理</title>
    <link href="../../../static/css/main.css" rel="stylesheet" type="text/css">
    <link href="../../../static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../../static/css/bootstrap-table.css" rel="stylesheet" type="text/css">
    <script src="../../../static/js/jquery.js"></script>
    <script src="../../../static//js/laydate.js"></script>
    <script src="../../../static/js/bootstrap.min.js"></script>
    <script src="../../../static/js/bootstrap-table.js"></script>
    <script src="../../../static/js/bootstrap-table-zh-CN.min.js"></script>
</head>

<body>
    <div class="tabe_div">
            <p>
                <p class="p_table">
                    <a href="#" class="a_add" id="add_box" onclick="openlayer()">添加</a>
                </p>
                <table data-url="json/data_alae_list.json" id="table" class="table_style" style="margin: 0 auto">
                </table>
    </div>
    <div></div>
    <script type="text/javascript">
        $(function() {
            $('#table')
                .bootstrapTable({
                    method: "get",
                    striped: true,
                    singleSelect: false,
                    url: "../../../admin/php/admin.php",
                    dataType: "json",
                    pagination: true, //分页
                    pageSize: 10,
                    pageNumber: 1,
                    search: false, //显示搜索框
                    contentType: "application/x-www-form-urlencoded",
                    queryParams: null,
                    columns: [ {
                        title: '管理员',
                        field: 'username',
                        align: 'center',
                        valign: 'middle'
                    },{
                        title: '管理员手机号',
                        field: 'phone',
                        align: 'center',
                        valign: 'middle'
                    }, {
                        title: '添加时间',
                        field: 'ctime',
                        align: 'center'
                    }, {
                        title: '操作',
                        field: 'oper',
                        align: 'center',
                        formatter: function(value, row) {
                            var e = '<button button="#" mce_href="#" onclick="openlayer(\'' +
                                row.id +
                                '\')">编辑</button> ';
                            var d = '<button button="#" mce_href="#" onclick="deleteHotel(\'' +
                                row.id +
                                '\')">删除</button> ';
                            return e + d ;
                        }
                    }]
                });
        });
    </script>
    <script src="../../../static/js/layer.js"></script>
    <script type="text/javascript">
        function openlayer(id) {
            if(id){
                layer.open({
                type: 2,
                title: '修改管理员信息',
                shadeClose: true,
                shade: 0.5,
                skin: 'layui-layer-rim',
                closeBtn: 1,
                area: ['80%', '75%'],
                shadeClose: true,
                closeBtn: 1,
                content: 'editAdmin.php?id='+id
                    //iframe的url
            });
            }else{
                layer.open({
                type: 2,
                title: '添加管理员信息',
                shadeClose: true,
                shade: 0.5,
                skin: 'layui-layer-rim',
                //            maxmin: true,
                closeBtn: 1,
                area: ['80%', '75%'],
                shadeClose: true,
                closeBtn: 1,
                content: 'addAdmin.php'
                    //iframe的url
            });
            }
          
        }
        function deleteHotel(id) {
            if(confirm("你确定删除嘛？")){
                location.href = "./basic.php?id="+id;
            }
        }
    </script>
</body>

</html>