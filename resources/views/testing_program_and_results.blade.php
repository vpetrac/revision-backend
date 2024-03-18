<!DOCTYPE html>
<html>

<head>
    <title>Program i rezultati testiranja</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @page {
            size: A4 landscape;
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
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 3px 10px;
            word-break: normal;
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

            font-size: 14px;
            padding: 5px 5px;
            word-break: normal;
        }

        .report .tg th {
            border-color: #d3d3d3;
            border-style: solid;
            border-width: 1px;

            font-size: 14px;
            font-weight: normal;
            padding: 5px 5px;
            word-break: normal;
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
                        <td class="tg-cly2" rowspan="4"><strong>OBRAZAC<br>Program i rezultati testiranje</strong></td>
                        <td class="tg-0lax">Klasifikacija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">INTERNO</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax" style="max-width: 20px;">Oznaka</td>
                        <td class="tg-0lax"><span style="font-weight:bold">OBR-UNR-12</span></td>
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
        <h1>PROGRAM I REZULTATI TESTIRANJA</h1>
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="upper-header" colspan="2">OPĆI PODACI O REVIZIJI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: bold;">Naziv revizije</td>
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
                        <th style="font-weight: bold;">Glavni rizici</th>
                        <th style="font-weight: bold;">Mogući uzroci rizika</th>
                        <th style="font-weight: bold;">Moguće posljedice rizika</th>
                        <th style="font-weight: bold;">Očekivane kontrole</th>
                        <th style="font-weight: bold;">Postojeće kontrole</th>
                        <th style="font-weight: bold;">Svrha testa</th>
                        <th style="font-weight: bold;">Metoda testiranja</th>
                        <th style="font-weight: bold;">Pitanja za testiranja</th>
                        <th style="font-weight: bold;">Rezultati testiranja</th>
                        <th style="font-weight: bold;">Zaključci za potrebe formuliranja nacrta nalaza</th>
                        <th style="font-weight: bold;">Ref. na radnu dokum.</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($revision->programs as $program)
                    <tr>
                        <td>{{$program->risk_description}}</td>
                        <td>{{$program->possible_risk_causes}}</td>
                        <td>{{$program->possible_risk_consequences}}</td>
                        <td>{{$program->expected_controls}}</td>
                        <td>{{$program->existing_controls}}</td>
                        <td>{{$program->test_purpose}}</td>
                        <td>{{$program->testing_method}}</td>
                        <td>{{$program->testing_questions}}</td>
                        <td>{{$program->testing_results}}</td>
                        <td>{{$program->conclusions_for_drafting_report}}</td>
                        <td>{{$program->references_to_working_documents}}</td>
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