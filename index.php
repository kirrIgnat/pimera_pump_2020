<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
<body>

<!-- <form name="test" method="get" action="php/getvalues.php"> -->
<p><input id="send" type="submit" value="Показать PDF"> </p>
<div class="inner"></div>
</body>
<script src="libs/jquery-3.4.1.js"></script>
<script type="text/javascript">
	$('#send').click(function() {
            //var fio = "asta";
           $.ajax({
              //  url: "drawCharts.php",
                //type: "POST",
					// async: false,
                //data: ({id: $('#text').val()}),
                //dataType: "json",
                success: function(){
						//pump = JSON.parse(data);
						document.location.href = "pdfGen.php";
                },
                error: function(){
                    console.log("Error");
                }
            });
        });
		  //document.location.href = "finish.php";
		 
</script>
</html>