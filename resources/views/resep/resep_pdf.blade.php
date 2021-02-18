<html>
<head>
	<title>Resep Obat</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
    @page {
        max-width: 249.45pt;
        max-height: 354.33pt;
        box-sizing: border-box;
        padding: 0;
        border: 0;
        font-family : 'sans-serif';
    }
    .head {
        border: 1px solid black;
        margin-top:-42px;
        width : 120%;
        margin-left : -38px;
    }
    .head__text{
        text-align : center;
        padding-top : 10px;
    }
    .head h4{
        font-size : 16px;
    }
    .head h5{
        margin-top : -5px;
        font-size :13px;
    }
    .head p{
        margin-top : -5px;
        font-size :10px;
    }
    .body{
        border: 1px solid black;
        width : 120%;
        margin-left : -38px;
        height : 170px
    }
    .body__top{
        padding : 0px 5px 0px 5px;
    }
    .body__top .right p{
        float : right;
        font-size : 15px;
    }
    .body__top .left p{
        float : left;
        font-size : 15px;
    }
    .body__content{
        margin-top : 10px;
        padding : 0px 5px 0px 5px;
    }
    .body__content .right { 
        float : right;
        width : 50%;
    }
    .body__content .right img {
       margin-left : 70px;
    }
    .body__content .left{
        width : 50%;
        min-height: 30px;
        float : left;
        text-align : center;
    }
    .span-text{
        font-size : 15px;
        
    }
	</style>
</head>
<body>
   <div id="main">
        <div class="head">
            <div class="head__image">
                <img src="" alt=""/>
            </div>
            <div class="head__text">
                <h4><strong>Apotek</strong></h4>
                <h5><strong>Laboratorium MFFM UGM<strong></h5>
                <p>Jl. Sekip Utara Yogyakarta</p>
            </div>
        </div>
        <div class="body">
            <div class="body__top">
                <div class="right">
                   <p>No : 120</p>
                </div>
                <div class="left">
                    <p>Tanggal : 18/02/2021</p>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="body__content">
                <div class="right">
                    <img src="data:image/png;base64, {!! base64_encode($qr) !!} ">
                </div>
                <div class="left">
                    <span class="span-text">Nama : Murdi</span> <br />
                    <span class="span-text">Amlodine Tablet 10 mg</span> <br />
                    <span class="span-text">2kali sehari</span>  <br />
                    <span class="span-text">Sesudah Makan</span>
                </div>
                <div style="clear:both"></div>
            </div>
        </div>
   </div>
</body>
</html>