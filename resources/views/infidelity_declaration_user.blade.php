@php
$subjects = json_decode($revision->subjects, true);
array_unshift($subjects, ['label' => $revision->auditTeamHead]); // Adding auditTeamHead as the first subject
$list = $infidelityList;
@endphp


<!DOCTYPE html>
<html>

<head>
    <title>Izjave o neovisnosti</title>
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
                        <td class="tg-cly1" rowspan="4"><img style="width: 100px; height: auto;" src="{{ storage_path('/app/public/logos/app-logo.png') }}" alt=""></td>
                        <td class="tg-cly2" rowspan="4"><strong>OBRAZAC<br>Izjava o neovisnosti</strong></td>
                        <td class="tg-0lax">Klasifikacija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">INTERNO</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax" style="max-width: 20px;">Oznaka</td>
                        <td class="tg-0lax"><span style="font-weight:bold">OBR-UNR-03</span></td>
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
        <h1>IZJAVA O NEOVISNOSTI</h1>
        <div class="tg-wrap">


            <table class="tg" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="upper-header" colspan="2">OPĆI PODACI O REVIZIJI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Naziv revizije</td>
                        <td>{{$revision->name}}</td>
                    </tr>
                    <tr>
                        <td>Oznaka iz Godišnjeg plana / šifra revizije</td>
                        <td>{{$revision->code}}</td>
                    </tr>
                    <tr>
                        <td>Revizor/ica</td>
                        <td>{{ $list->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Datum</td>
                        <td>{{ now()->format('d.m.Y') }}</td>
                    </tr>
                </tbody>
            </table>

            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 25px">
                    <col style="width: 338px">
                    <col style="width: 58px">
                    <col style="width: 53px">
                </colgroup>
                <thead>
                    <tr>
                        <th colspan="2"></th>
                        <th>DA</th>
                        <th>NE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list->content as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}.</td>
                        <td>{{ $item['question'] }}</td>
                        <td style="text-align: center;">@if ($item['answer'] === 1) X @else &nbsp; @endif</td>
                        <td style="text-align: center;">@if ($item['answer'] === 0) X @else &nbsp; @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="tg" style="width: 100%;">
                <tr>
                    <td>Potvrđujem da ću, ako se za vrijeme obavljanja revizije pojavi bilo kakav osobni, vanjski ili organizacijski sukob interesa koji može utjecati na moju neovisnost rada i nepristrano izvještavanje o nalazima, odmah pisanim putem obavijestiti voditelja Samostalne Službe unutarnje revizije.</td>
                </tr>
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
                        <td>Izradio / la:</td>
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
