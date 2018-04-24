<html>
<head>
	<title>选班排班系统</title>
	<?php include '../format/head.php'; ?>
	<style>
			body {
			  padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
	</style>

</head>
<body>
	<?php include '../format/menu.php'; ?>
	<script>
		var p = document.getElementById('select_class');
		p.setAttribute('class', 'active'); 
	</script>

    <div class="container-fluid">
    <div class="row-fluid">

    <?php include './menu_shift.php'; ?>
    <script>
      var p = document.getElementById('table');
      p.setAttribute('class', 'active'); 
    </script>

    <div class="span9">
        <div class="hero-unit">
            <h1>当前当班表</h1>
            <p>收班出版板块</p>
            <!-- <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p> -->
        </div> 
        <p>往期当班表</p>
        <hr>
    </div><!--/.fluid-container-->

</body>
</html>
