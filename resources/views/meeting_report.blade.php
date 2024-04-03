<!DOCTYPE html>
<html>

<head>
    <title>Zapisnik sa sastanka</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @page {
            size: A4 portrait;
            margin: 10mm;
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
            font-size: 14px;
            overflow: hidden;
            padding: 3px 10px;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-size: 14px;
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
            width: 240px;
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

            font-size: 14px;
            padding: 5px 5px;
        }

        .report .tg th {
            border-color: #d3d3d3;
            border-style: solid;
            border-width: 1px;

            font-size: 14px;
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
                        <td class="tg-cly1" rowspan="4"><img style="width: 100px; height: auto;" src="{{ public_path('hl-logo.png') }}" alt=""></td>
                        <td class="tg-cly2" rowspan="4"><strong>OBRAZAC<br>Zapisnik sa sastanka</strong></td>
                        <td class="tg-0lax">Klasifikacija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">INTERNO</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax" style="max-width: 20px;">Oznaka</td>
                        <td class="tg-0lax"><span style="font-weight:bold">OBR-UNR-09</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Revizija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1-06/2022</span></td>
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
        <h1>PLAN I PROGRAM REVIZIJE</h1>
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="upper-header" colspan="2">ZAPISNIK SA SASTANKA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tema</td>
                        <td>{{$report->theme}}</td>
                    </tr>
                    <tr>
                        <td>Datum i vrijeme</td>
                        <td>{{$report->datetime}}</td>
                    </tr>
                    <tr>
                        <td>Mjesto</td>
                        <td>{{$report->location}}</td>
                    </tr>
                    <tr>
                        <td>Prisutni</td>
                        <td>{{$report->attendees}}</td>
                    </tr>
                    <tr>
                        <td>Odsutni</td>
                        <td>{{$report->absentees}}</td>
                    </tr>
                    <tr>
                        <td>Zapisničar</td>
                        <td>{{$report->compiled_by}}</td>
                    </tr>
                </tbody>
            </table>

            <table class="tg" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="upper-header">Matrica zadataka</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{!! $report->content !!}</td>
                    </tr>
                </tbody>
            </table>
            <table class="tg" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="font-weight: bold;">R.<br>br.</th>
                        <th style="font-weight: bold;">Zadatak</th>
                        <th style="font-weight: bold;">Odgovorna osoba</th>
                        <th style="font-weight: bold;">Status</th>
                        <th style="font-weight: bold;">Rok</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($report->tasks as $task)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$task['title']}}</td>
                        <td>{{$task['person']}}</td>
                        <td>{{$task['status']}}</td>
                        <td>{{ \Carbon\Carbon::parse($task['deadline'])->format('d.m.Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>
</body>

</html>