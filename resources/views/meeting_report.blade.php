<!DOCTYPE html>
<html>

<head>
    <title>Zapisnik sa sastanka</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <style>
        @page {
            size: A4 portrait;

            margin: 25px 40px;
            margin-top: 180px;
        }

        .header {
            position: fixed;
            top: -140px;
            height: 130px;
        }

        footer {
            position: fixed;
            bottom: 20px;
            height: 40px;
        }

        *,
        h1,
        h2,
        h3,
        h4,
        span,
        p,
        li,
        td {
            font-family: DejaVu Sans !important;
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
            border-color: #000;
            border-style: solid;
            border-width: 1px;

            font-size: 11px;
            padding: 5px 5px;
        }

        .report .tg th {
            border-color: #000;
            border-style: solid;
            border-width: 1px;

            font-size: 11px;
            font-weight: normal;
            padding: 5px 5px;
        }

        .report .tg .upper-header {
            background-color: #ffce93;
            border-color: #000;
            font-weight: bold;
            text-align: center;
            vertical-align: top
        }

        table {}

        tr {}

        td {
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
        <h1>ZAPISNIK SA SASTANKA</h1>
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="background-color: #ffce93; width: 130px;">Tema</td>
                        <td>{{$report->theme}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #ffce93;">Datum i vrijeme</td>
                        <td>{{$report->datetime}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #ffce93;">Mjesto</td>
                        <td>{{$report->location}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #ffce93;">Prisutni</td>
                        <td>{{$report->attendees}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #ffce93;">Odsutni</td>
                        <td>{{$report->absentees}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #ffce93;">Zapisničar</td>
                        <td>{{$report->compiled_by}}</td>
                    </tr>
                </tbody>
            </table>

            <table class="tg" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="upper-header">Zapisnik</th>
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
                        <th colspan="5" class="upper-header">Matrica zadataka</th>
                    </tr>
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
            <table style="width: 100%; font-size: 14px; margin-top: 40px;">
                <tr>
                    <td style="font-weight: bold;">Sastavio/la:</td>
                    <td></td>
                    <td style="font-weight: bold;">Odobrio/la:</td>
                </tr>
                <tr>
                    <td style="padding-top: 50px;">Unutarnji/a revizor/ica </td>
                    <td style="width: 150px;"></td>
                    <td style="padding-top: 50px;">Voditelj/ica Samostalne Službe unutarnje revizije</td>
                </tr>
            </table>
        </div>
    <footer>
        <p style="font-size: 9px;">Za status unesite broj od 0 do 4 kako slijedi: 0 - novotvoreni zadatak; 1 - zadatak u tijeku s redovitim izvršavanjem; 2 - zadatak u tijeku s kašnjenjem; 3 - zadatak u planu; 4 - zadatak na čekanju.<br>
            Rok se definira prilikom inicijalne dodjele zadatka. Ako se rok mijenja, izmjena mora biti navedena s obrazloženjem u samom tekstu zapisnika, a u ovu rubriku se unosi novi datum.</p>
    </footer>
</body>

</html>