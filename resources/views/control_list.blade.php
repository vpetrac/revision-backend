<!DOCTYPE html>
<html>

<head>
    <title>Kontrolna lista</title>
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

        h2 {
            font-size: 14px;
            padding-top: 3px;
            padding-bottom: 3px;
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
            border-color: #000;
            border-style: solid;
            border-width: 1px;

            font-size: 14px;
            padding: 5px 5px;
        }

        .report .tg th {
            border-color: #000;
            border-style: solid;
            border-width: 1px;

            font-size: 14px;
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

        table {
            page-break-after: auto;
            border-color: #000;
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

        .orange {
            background-color: #ffce93;
        }

        .gray {
            background-color: #CDCDCD;
        }
    </style>
</head>

<body>
    <header class="header">
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
                        <td class="tg-cly2" rowspan="4"><strong>OBRAZAC<br>Kontrolna lista</strong></td>
                        <td class="tg-0lax">Klasifikacija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">INTERNO</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax" style="max-width: 20px;">Oznaka</td>
                        <td class="tg-0lax"><span style="font-weight:bold">OBR-UNR-05</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Revizija</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1-05/2022</span></td>
                    </tr>
                    <tr>
                        <td class="tg-0lax">Stranica</td>
                        <td class="tg-0lax"><span style="font-weight:bold">1/4</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </header>
    <h1>KONTROLNA LISTA</h1>
    @foreach ($controlLists as $controlList)
    <!-- Assuming 'content' is a JSON-encoded string that needs to be decoded -->
    @php
    $content = $controlList->content;
    @endphp

    @foreach ($content as $section)
    <div class="report">
        <h2>{{ $section['title'] }}</h2>

        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 25px">
                    <col style="width: 338px">
                    <col style="width: 58px">
                    <col style="width: 53px">
                    <col style="width: 53px">
                </colgroup>
                <thead>
                    <tr>
                        <th class="orange" colspan="2">{{ $section['title'] }}</th>
                        <th class="orange">DA</th>
                        <th class="orange">NE</th>
                        <th class="orange">N/P</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($section['subsections'] as $subsection)
                    <tr>
                        <th class="gray" colspan="5">{{ $subsection['title'] }}</th>
                    </tr>
                    @foreach ($subsection['questions'] as $question)
                    @foreach ($subsection['questions'] as $question)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $question['text'] }}</td>
                        <td>{{ isset($question['answer']) && $question['answer'] == "DA" ? 'X' : '' }}</td>
                        <td>{{ isset($question['answer']) && $question['answer'] == "NE" ? 'X' : '' }}</td>
                        <td>{{ isset($question['answer']) && $question['answer'] == "N/P" ? 'X' : '' }}</td>
                    </tr>
                    @endforeach
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    @endforeach
    @endforeach
    <table class="tg" style="width: 100%; max-width:100;">
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
                <td>Voditelj revizijskog tima:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Supervizor:</td>
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