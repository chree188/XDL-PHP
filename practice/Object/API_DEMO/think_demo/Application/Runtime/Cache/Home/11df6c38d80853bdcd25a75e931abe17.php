<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>BTC行情</title>
    <style>
        .container{
            width: 1000px;
            margin: 0 auto;
            padding: 30px;
            background-color: #eef;
        }
        #price{
            font-size:100px;
            color:#f00;
            font-family: 'monaco';
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>火币网行情</h1>
        <hr>
        <div id="price">正在更新数据...</div>
    </div>

    <script src="/practice/Object/API_DEMO/think_demo/Public/Js/jquery-2.1.4.min.js"></script>
    <script>
        $(function(){
            getajax();

            function getajax(){
                $.ajax({
                    url:"<?php echo U('Bitcoin/getInfo');?>",
                    type:'get',
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('#price').html(data.datas.ticker.buy);
                    }
                })
                $('#price').fadeToggle(3000);
            }
            setInterval(getajax,3000);
        })

    </script>
</body>
</html>