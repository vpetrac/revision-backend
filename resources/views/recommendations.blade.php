<!DOCTYPE html>
<html>

<head>
    <title>Findings Report</title>
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

        }

        .tg .tg-0lax {
            text-align: left;
            vertical-align: top;
            width: 120px;
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

            font-size: 11px;
            overflow: hidden;
            padding: 5px 5px;

        }

        .report .tg th {
            border-color: #d3d3d3;
            border-style: solid;
            border-width: 1px;

            font-size: 11px;
            font-weight: normal;
            overflow: hidden;
            padding: 5px 5px;

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
                        <td class="tg-cly2" rowspan="4"><strong>BAZA PREPORUKA</strong></td>
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
                        <td class="tg-mjdq" colspan="8">Revizija: {{$recommendations[0]->revision->code}} - {{$recommendations[0]->revision->name}}</td>
                    </tr>
                    <tr>
                        <td class="tg-sj1f">Broj</td>
                        <td class="tg-sj1f">Preporuka</td>
                        <td class="tg-sj1f">Mjere i aktivnosti</td>
                        <td class="tg-sj1f">Odgovornost za provedbu mjera i aktivnosti</td>
                        <td class="tg-sj1f">Odgovorne osobe</td>
                        <td class="tg-sj1f">Status preporuke</td>
                        <td class="tg-sj1f">Rok provedbe</td>
                        <td class="tg-sj1f">Napomena</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recommendations as $recommendation)
                    <tr>
                        <td class="tg-0pky">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="tg-0pky">{!! $recommendation->content !!}</td>
                        <td class="tg-0pky">{{ $recommendation->activities }}</td>
                        <td class="tg-0pky">
                            @php
                            $responsibilityData = json_decode($recommendation->responsibility, true);
                            $partnerData = json_decode($recommendation->partner, true);

                            $lastResponsibilityIndex = count($responsibilityData) - 1;
                            $lastPartnerIndex = count($partnerData) - 1;
                            @endphp

                            @foreach($responsibilityData as $index => $responsibility)
                            {{ $responsibility['label'] ?? '' }}{{ $index !== $lastResponsibilityIndex ? ',' : '' }}
                            @endforeach

                            <br><br> {{-- Here's that little bit of personal space --}}

                            @foreach($partnerData as $index => $partner)
                            {{ $partner['label'] ?? '' }}{{ $index !== $lastPartnerIndex ? ',' : '' }}
                            @endforeach
                        </td>
                        <td class="tg-0pky">
                            {{ $recommendation->responsible_users }}
                        </td>
                        <td class="tg-0pky">
                            {{ $recommendation->status }}
                        </td>
                        <td class="tg-0pky">
                            @if(is_array($recommendation->deadline) && count($recommendation->deadline))
                            @foreach($recommendation->deadline as $index => $deadline)
                            <span class="{{ $index < count($recommendation->deadline) - 1 ? 'strikethrough' : '' }}">
                                {{ \Carbon\Carbon::parse($deadline['date'])->format('d.m.Y') }}
                            </span><br>
                            @endforeach
                            @endif
                        </td>
                        <td class="tg-0pky">
                            @foreach($recommendation->implementationActivities as $activity)
                            <div>{!! $activity->content !!}</div>
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