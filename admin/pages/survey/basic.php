<?php
include('../../../static/php/conn.php');

//查询单条详情渲染页面
if(isset($_GET['id'])){
       $id=$_GET['id'];
       $sql="delete  from  survey where id ='$id'";
       $res= mysqli_query($conn,$sql);
       if($res){
        echo '<script>alert("删除成功"); window.reload();</script>';
       }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
<title>概况添加</title>
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
    <p class="p_table">
    <p class="p_table">
                    <a href="#" class="a_add" id="add_box" onclick="openlayer()">添加</a>
                </p>
    <table data-url="json/data_alae_list.json" id="table" class="table_style" style="margin: 0 auto" >
    </table>
</div>
<div></div>
<script>
    !function () {
        laydate.skin('danlan'); //切换皮肤，请查看skins下面皮肤库
        laydate({ elem: '#demo' });
        laydate({ elem: '#demo1' }); //绑定元素
    } ();
</script>

<script type="text/javascript">
    $(function() {
        $('#table')
            .bootstrapTable({
                method: "get",
                striped: true,
                singleSelect: false,
                url: "../../../admin/php/survey.php",
                dataType: "json",
                // pagination: true, //分页
                // pageSize: 10,
                // pageNumber: 1,
                search: false, //显示搜索框
                contentType: "application/x-www-form-urlencoded",
                queryParams: null,
                columns: [
                    {
                        title: '概况名称',
                        field: 'name',
                        align: 'center',
                        valign: 'middle'
                    },
                    {
                        title: '添加时间',
                        field: 'ctime',
                        align: 'center',
                        valign: 'middle'
                    },
                    {
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
                            return e + d;
                        }
                    }
                ]
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
    function openlayer(id) {
        if(id){
            layer.open({
            type: 2,
            title: '修改概况信息',
            shadeClose: true,
            shade: 0.5,
            skin: 'layui-layer-rim',
            //            maxmin: true,
            closeBtn: 1,
            area: ['80%', '75%'],
            shadeClose: true,
            closeBtn: 1,
            content: 'editSurvey.php?id='+id
            //iframe的url
          });
        }else{
            layer.open({
            type: 2,
            title: '添加概况信息',
            shadeClose: true,
            shade: 0.5,
            skin: 'layui-layer-rim',
            //            maxmin: true,
            closeBtn: 1,
            area: ['80%', '75%'],
            shadeClose: true,
            closeBtn: 1,
            content: 'addSurvey.php'
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
