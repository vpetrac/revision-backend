<!DOCTYPE html>
<html>

<head>
    <title>Findings Report</title>
    <meta charset="UTF-8">

    <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;

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
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 3px 10px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 3px 10px;
            word-break: normal;
        }

        .tg .tg-cly1 {
            text-align: left;
            vertical-align: middle
        }

        .tg .tg-0lax {
            text-align: left;
            vertical-align: top;
            width: 150px;
        }

        @media screen and (max-width: 767px) {
            .tg {
                width: auto !important;
            }

            .tg col {
                width: auto !important;
            }

            .tg-wrap {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }

        .strikethrough {
            text-decoration: line-through;
        }


        .report .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .report .tg td {
            border-color: #d3d3d3;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 5px 5px;
            word-break: normal;
        }

        .report .tg th {
            border-color: #d3d3d3;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 5px 5px;
            word-break: normal;
        }

        .report .tg .tg-mjdq {
            background-color: #ffce93;
            border-color: #d3d3d3;
            font-weight: bold;
            text-align: left;
            vertical-align: top
        }

        .report .tg .tg-sj1f {
            background-color: #f5ffe7;
            border-color: #d3d3d3;
            font-weight: bold;
            text-align: left;
            vertical-align: top
        }

        @media screen and (max-width: 767px) {
            .report .tg {
                width: auto !important;
            }

            .report .tg col {
                width: auto !important;
            }

            .report .tg-wrap {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <colgroup>
                    <col style="width: 100px">
                    <col style="width: 800px">
                    <col style="width: 40px">
                    <col style="width: 40px">
                </colgroup>
                <tbody>
                    <tr>
                        <td class="tg-cly1" rowspan="4"><img style="width: 100px; height: auto;" src="{{ public_path('hl-logo.png') }}" alt=""></td>
                        <td class="tg-cly1" rowspan="4"><strong>BAZA PREPORUKA</strong></td>
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
        <h1>BAZA PREPORUKA</h1>
        <div class="tg-wrap">
            <table class="tg" style="width: 100%;">
                <thead>
                    <tr>
                        <td class="tg-mjdq" colspan="8">Revizija:</td>
                    </tr>
                    <tr>
                        <td class="tg-sj1f" rowspan="2">Broj</td>
                        <td class="tg-sj1f" rowspan="2">Preporuka</td>
                        <td class="tg-sj1f" rowspan="2">Mjere i aktivnosti</td>
                        <td class="tg-sj1f" colspan="2">Odgovornost za provedbu mjera i aktivnosti</td>
                        <td class="tg-sj1f" rowspan="2">Status preporuke</td>
                        <td class="tg-sj1f" rowspan="2">Rok provedbe</td>
                        <td class="tg-sj1f" rowspan="2">Napomena</td>
                    </tr>
                    <tr>
                        <td class="tg-sj1f">Nositelj</td>
                        <td class="tg-sj1f">U suradnji sa</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($findings as $finding)
                    <tr>
                        <td class="tg-0pky"></td>
                        <td class="tg-0pky">{{ $finding->recommendations }}</td>
                        <td class="tg-0pky">{{ $finding->activities }}</td>
                        <td class="tg-0pky">{{ $finding->responsibility }}</td>
                        <td class="tg-0pky"></td>
                        <td class="tg-0pky">
                            {{ $finding->status }}
                        </td>
                        <td class="tg-0pky">
                            @if(is_array($finding->deadline) && count($finding->deadline))
                            @foreach($finding->deadline as $index => $deadline)
                            <span class="{{ $index < count($finding->deadline) - 1 ? 'strikethrough' : '' }}">
                                {{ \Carbon\Carbon::parse($deadline['date'])->format('d.m.Y') }}
                            </span><br>
                            @endforeach
                            @endif
                        </td>
                        <td class="tg-0pky">
                            @foreach($finding->implementationActivities as $activity)
                            <div>{{ strip_tags($activity->content) }}</div>
                            <br>
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>