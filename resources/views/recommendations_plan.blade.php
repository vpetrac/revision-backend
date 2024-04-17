<!DOCTYPE html>
<html>

<head>
    <title>Plan djelovanja</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @page {
            size: A4 landscape;

            margin: 25px 40px;
            margin-top: 25px;
        }

        header {
            position: fixed;
            top: -150px;
            height: 140px;
        }

        * {
            font-family: DejaVu Sans;
        }

        body {

            margin: 0;
        }

        h1 {
            font-size: 18px;
            padding-top: 6px;
            padding-bottom: 6px;
        }

        .data table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .data th,
        .data td {
            border: 1px solid black;
            padding: 2px;
            text-align: left;
            overflow: hidden;

        }

        .data th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-size: 11px;
            overflow: hidden;
            padding: 3px 10px;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-size: 11px;
            font-weight: normal;
            overflow: hidden;
            padding: 3px 10px;
        }

        .tg .tg-cly1 {
            text-align: left;
            vertical-align: middle;
            width: 150px;
        }

        .tg .tg-cly2 {
            text-align: left;
            vertical-align: middle;
            width: 340px;
        }

        .tg .tg-0lax {
            text-align: left;
            vertical-align: top;
            width: 120px;
        }

        .strikethrough {
            text-decoration: line-through;
        }


        .report .tg {
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 30px;
        }

        .report .tg td {
            border-color: #d3d3d3;
            border-style: solid;
            border-width: 1px;

            font-size: 11px;
            padding: 5px 5px;
        }

        .report .tg th {
            border-color: #d3d3d3;
            border-style: solid;
            border-width: 1px;

            font-size: 11px;
            font-weight: normal;
            padding: 5px 5px;
        }

        .report .tg .upper-header {
            background-color: #ffce93;
            border-color: #d3d3d3;
            font-weight: bold;
            text-align: center;
            vertical-align: top
        }

        table {
            page-break-after: auto;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        td {
            page-break-inside: avoid;
            page-break-after: auto;
            word-wrap: break-word;
            vertical-align: top;
        }

        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 50px">
                    <col style="width: 800px">
                    <col style="width: 40px">
                    <col style="width: 40px">
                </colgroup>
                <tbody>
                    <tr>
                        <td class="tg-cly1" rowspan="4"><img style="width: 100px; height: auto;" src="{{ storage_path('/app/public/logos/app-logo.png') }}" alt=""></td>
                        <td class="tg-cly2" rowspan="4"><strong>OBRAZAC<br>Plan djelovanja</strong></td>
                        <td class="tg-0lax">Klasifikacija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">INTERNO</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax" style="max-width: 20px;">Oznaka</td>
                        <td class="tg-0lax"><span style="font-weight:bold">OBR-UNR-11</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Revizija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1-05/2022</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Stranica</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1/1</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="report">
        <h1>PLAN DJELOVANJA</h1>
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="upper-header" colspan="2">OPĆI PODACI O REVIZIJI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: bold; width: 300px;">Naziv revizije</td>
                        <td>{{$revision->name}}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Oznaka iz Godišnjeg plana / šifra revizije</td>
                        <td>{{$revision->code}}</td>
                    </tr>

                </tbody>
            </table>
            <table class="tg" style="width: 100%;">
                <thead>
                    <tr>
                        <td style="font-size: 8px; text-align: center;">1</td>
                        <th style="font-size: 8px; text-align: center;">2</th>
                        <th style="font-size: 8px; text-align: center;">3</th>
                        <th style="font-size: 8px; text-align: center;">4</th>
                        <th style="font-size: 8px; text-align: center;">5</th>
                        <th style="font-size: 8px; text-align: center;">6</th>
                    </tr>
                    <tr>
                        <th style="font-weight: bold;">R.<br>br.</th>
                        <th style="font-weight: bold;">PREPORUKA</th>
                        <th style="font-weight: bold;">Važnost</th>
                        <th style="font-weight: bold;">Aktivnosti za provedbu preporuke</th>
                        <th style="font-weight: bold;">Osobe zadužene za provedbu</th>
                        <th style="font-weight: bold;">Rok za provedbu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($revision->recommendations as $recommendation)
                    <tr>
                        <td>{{$loop->index + 1}}.</td>
                        <td>{!! $recommendation->content !!}</td>
                        <td style="background-color: #ffce93">{{$recommendation->importance}}</td>
                        <td>{{$recommendation->activities}}</td>
                        <td>{{$recommendation->activities}}</td>
                        <td>
                            @if(is_array($recommendation->deadline) && count($recommendation->deadline))
                            @foreach($recommendation->deadline as $index => $deadline)
                            <span class="{{ $index < count($recommendation->deadline) - 1 ? 'strikethrough' : '' }}">
                                {{ \Carbon\Carbon::parse($deadline['date'])->format('d.m.Y') }}
                            </span><br>
                            @endforeach
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 80px">
                    <col style="width: 95px">
                    <col style="width: 104px">
                    <col style="width: 122px">
                    <col style="width: 134px">
                </colgroup>
                <thead>
                    <tr>
                        <th></th>
                        <th>Datum:</th>
                        <th>Ime i prezime:</th>
                        <th>Funkcija:</th>
                        <th>Potpis:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Izradio:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Odobrio:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

</body>

</html>