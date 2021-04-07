<html>

<head>
    <title>Resep Obat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        @page {
            max-width: 498.90pt;
            max-height: 354.33pt;
            box-sizing: border-box;
            padding: 0;
            border: 0;
            font-family: 'sans-serif';
        }

        .head {
            border: 1px solid black;
            margin-top: -35px;
            width: 120%;
            margin-left: -38px;
        }

        .head__text {
            position: relative;
            width: 50%;
            left : 30%;
            text-align: center;
            padding-top: 10px;
        }

        .head__image{
            width:25%;
            height :30%;
            padding-left: 20px;
            padding-top: 0px;
            position: absolute;
        }

        .head h4 {
            font-size: 16px;
        }

        .head h5 {
            margin-top: -5px;
            font-size: 13px;
        }

        .head p {
            font-size: 10px;
        }

        .body {
            border: 1px solid black;
            width: 120%;
            margin-left: -38px;
            height: 160px
        }

        .body__top {
            padding: 0px 5px 0px 5px;
        }

        .body__top .right p {
            float: right;
            font-size: 15px;
        }

        .body__top .left p {
            float: left;
            font-size: 15px;
        }

        .body__content {
            margin-top: 10px;
            padding: 0px 5px 0px 5px;
        }

        .body__content .right {
            float: right;
            width: 50%;
        }

        .body__content .right img {
            margin-left: 70px;
        }

        .body__content .left {
            width: 50%;
            min-height: 30px;
            float: left;
            text-align: center;
        }

        .span-text {
            font-size: 15px;

        }

    </style>
</head>

@foreach ($resep as $item)
<body>
    <div id="main">
        <div class="head">
        <div class="head__image">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIEAAABYCAYAAADSkZS3AAAACXBIWXMAAAsTAAALEwEAmpwYAAAGymlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDUgNzkuMTYzNDk5LCAyMDE4LzA4LzEzLTE2OjQwOjIyICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOSAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDIxLTAyLTA4VDIyOjM0OjE3KzA3OjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAyMS0wMi0xMVQyMzoxNDozNiswNzowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyMS0wMi0xMVQyMzoxNDozNiswNzowMCIgZGM6Zm9ybWF0PSJpbWFnZS9wbmciIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo4NWM4OTU4OS04OTUzLTdjNGMtOGQzYy05NDNkODU4OTk5YjUiIHhtcE1NOkRvY3VtZW50SUQ9ImFkb2JlOmRvY2lkOnBob3Rvc2hvcDo1ZjhiZTBmMy0xOGU5LTgyNDEtYmI1Yi1mNWM0OTRhYTgzYmMiIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpkYTQ1YTI0MC1mNWFjLWZlNGUtODM2NC1iZDNkZmU5YjFjNTEiPiA8eG1wTU06SGlzdG9yeT4gPHJkZjpTZXE+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJjcmVhdGVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOmRhNDVhMjQwLWY1YWMtZmU0ZS04MzY0LWJkM2RmZTliMWM1MSIgc3RFdnQ6d2hlbj0iMjAyMS0wMi0wOFQyMjozNDoxNyswNzowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTkgKFdpbmRvd3MpIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDoxOGU2ODcxMC1hNDU5LTZiNDUtYWRiOS02NTUwYWZhMWE4ZTYiIHN0RXZ0OndoZW49IjIwMjEtMDItMTFUMjE6NDE6NTQrMDc6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE5IChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6ODVjODk1ODktODk1My03YzRjLThkM2MtOTQzZDg1ODk5OWI1IiBzdEV2dDp3aGVuPSIyMDIxLTAyLTExVDIzOjE0OjM2KzA3OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+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"
                alt="" />
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
                    <p>No : {{$item->id_resep}}</p>
                </div>
                <div class="left">
                    <p>Tanggal : {{$item->created_at}}</p>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="body__content">
                <div class="right">
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($item->id)) !!} ">
                </div>
                <div class="left">
                    <span class="span-text">
                    Nama : {{$item->resep->pasien->nama_pasien}}
                    </span> <br />
                    <span class="span-text">
                    {{$item->obat->nama_obat}}</span> <br />
                    <span class="span-text">
                    {{$item->aturan_pakai}} kali sehari</span> <br/>
                    <span class="span-text">
                    {{$item->waktu_minum}}</span>
                </div>
                <div style="clear:both"></div>
                
            </div>
        </div>
        
    </div>
</body>
@endforeach
</html>
