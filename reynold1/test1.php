<?php
include 'connect1.php';
?>
<html>
<head>
<script src="js/jquery.min.js"></script>
<script src="js/jExpand.js"></script>
<script>
$("#report").jExpand();
</script>
<style type="text/css">
        body { font-family:Arial, Helvetica, Sans-Serif; font-size:0.8em;}
        #report { border-collapse:collapse;}
        #report h4 { margin:0px; padding:0px;}
        #report img { float:right;}
        #report ul { margin:10px 0 10px 40px; padding:0px;}
        #report th { background:#7CB8E2 url(images/header_bkg.png) repeat-x scroll center left; color:#fff; padding:7px 15px; text-align:left;}
        #report td { background:#C7DDEE none repeat-x scroll center left; color:#000; padding:7px 15px; }
        #report tr.odd td { background:#fff url(images/row_bkg.png) repeat-x scroll center left; cursor:pointer; }
        #report div.arrow { background:transparent url(images/arrows.png) no-repeat scroll 0px -16px; width:16px; height:16px; display:block;}
        #report div.up { background-position:0px 0px;}
    </style>
<link rel='icon' href='images/favicon.png' type='image/png' sizes='16x16'>
</head>
<body>
    <table id="report">
        <tr>
            <th>Country</th>
            <th>Population</th>
            <th>Area</th>
            <th>Official languages</th>
            <th></th>
        </tr>
        <tr>
            <td>United States of America</td>
            <td>306,939,000</td>
            <td>9,826,630 km2</td>
            <td>English</td>
            <td><div class="arrow"></div></td>
        </tr>
</body>
</html>
