<?php
include('../../../static/php/conn.php');

//查询单条详情渲染页面
if(isset($_GET['id'])){
       $id=$_GET['id'];
       $sql="delete  from comment where id ='$id'";
       $res= mysqli_query($conn,$sql);
       if($res){
        echo '<script>alert("删除成功"); window.reload();</script>';
       }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <title>评论管理</title>
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
                    url: "../../../admin/php/comment.php",
                    dataType: "json",
                    pagination: true, //分页
                    pageSize: 10,
                    pageNumber: 1,
                    search: false, //显示搜索框
                    contentType: "application/x-www-form-urlencoded",
                    queryParams: null,
                    columns: [ {
                        title: '评论用户名称',
                        field: 'username',
                        align: 'center',
                        valign: 'middle'
                    },{
                        title: '评论内容',
                        field: 'content',
                        align: 'center',
                        valign: 'middle'
                    },{
                        title: '评论时间',
                        field: 'ctime',
                        align: 'center'
                    }, {
                        title: '操作',
                        field: 'oper',
                        align: 'center',
                        formatter: function(value, row) {
                            var d = '<button button="#" mce_href="#" onclick="deleteHotel(\'' +
                                row.id +
                                '\')">删除</button> ';
                            return  d ;
                        }
                    }]
                });
        });

        function addHotel() {
            this.location.href = "addFood.html";
        }

        function editHotel(id) {
            this.location.href = "addFood.html";
        }

        function showHotelInfo() {
            this.location.href = "addFood.html";
        }
    </script>
    <script src="../../../static/js/layer.js"></script>
    <script type="text/javascript">
        function deleteHotel(id) {
            if(confirm("你确定删除嘛？")){
                location.href = "./basic.php?id="+id;
            }
        }
    </script>
</body>

</html>