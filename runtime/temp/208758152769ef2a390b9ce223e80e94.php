<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\phpstudy\WWW\test\public/../application/index\view\music\index.html";i:1593415818;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
     
        .container {
            max-width: 32rem;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 150px;
        }
        h1 {
            font-size: 54px;
            color: #333;
            margin: 30px 0 10px;
        }
        h2 {
            font-size: 22px;
            color: #555;
        }
        h3 {
            font-size: 24px;
            color: #555;
        }
        hr {
            display: block;
            width: 7rem;
            height: 1px;
            margin: 2.5rem 0;
            background-color: #eee;
            border: 0;
        }
        a {
            color: #08c;
            text-decoration: none;
        }
        p {
            font-size: 18px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/aplayer@1.10.0/dist/APlayer.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer@1.10.0/dist/APlayer.min.css">

</head>
<body>
    <div class="container">

        <div id="player1" class="aplayer aplayer-withlist"></div>
		
    </div>
	
	
    <script src="https://cdn.jsdelivr.net/npm/jquery"></script>
	
	<script>
		
		var arr=new Array();
		function method_data(arr){
		    
			$.ajax({
					url: 'http://test.com/api/music',
					async: false,
					contentType: "application/json",
				    type: "post",
				    dataType:'json',
					success:function(res){
					   
						// document.write(JSON.stringify(res.data));//JSON.stringify() 方法用于将 JavaScript 值转换为 JSON 字符串。
						// var list = JSON.stringify(res.data);
					    //  console.log(res.data);
						var i = 0;
						$.each(res.data, function(key, value){ //使用jQuery $.each()循环遍历
						arr[i] = value;
						//alert(arr[i].name);
					    i=i+1;
						});	
					}
					
				});
				
			    return arr;
			}
			
			var arr = method_data(arr);
			//alert(arr);
			//console.log(arr);
		
		const ap1 = new APlayer({
		    element: document.getElementById('player1'),
		    mini: false,
		    autoplay: false,
		    lrcType: false,
		    mutex: true,
		    preload: 'metadata',
		    audio: arr
			
		});
	</script>
	
</body>
</html>