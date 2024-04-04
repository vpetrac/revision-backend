<table class="tg" style="width: 100%;">
    <tbody>
        <tr style="background-color: #bcd4c3;">
            <td class="s0" dir="ltr" rowspan="3">R.B</td>
            <td class="s0" dir="ltr" rowspan="3">OZNAKA REVIZIJE</td>
            <td class="s0" dir="ltr" rowspan="3">NAZIV REVIZIJE</td>
            <td class="s0" dir="ltr" rowspan="3">UR. BROJ (konačno izvješće)</td>
            <td class="s0" dir="ltr" rowspan="3">REVIZOR / REVIZORSKI TIM</td>
            <td class="s0" dir="ltr" rowspan="3">SUPERVIZIJA</td>
            <td class="s0" dir="ltr" colspan="2" rowspan="2">RAZDOBLJE TRAJANJA REVIZIJE</td>
            <td class="s0" dir="ltr" colspan="2" rowspan="2">DATUM REALIZACIJE NACRTA REVIZIJSKOG IZVJEŠĆA</td>
            <td class="s0" dir="ltr" rowspan="3">DATUM IZDAVANJA KONAČNOG REVIZIJSKOG IZVJEŠĆA(datum sa
                Odluke-odobrenje Uprave)</td>
            <td class="s0" dir="ltr" rowspan="3">UKUPNO PREPORUKA</td>
            <td class="s0" dir="ltr" colspan="6">BROJ DANIH PREPORUKA</td>
            <td class="s0" dir="ltr" rowspan="3">ROKOVI PROVEDBE PREPORUKE(datumi iz Plana djelovanja)</td>
            <td class="s0" dir="ltr" colspan="19">PRAĆENJE PREPORUKE</td>
        </tr>
        <tr style="background-color: #bcd4c3;">
            <td class="s0" dir="ltr" colspan="2">Visoki važnost (V)</td>
            <td class="s0" dir="ltr" colspan="2">Srednja važnost (S)</td>
            <td class="s0" dir="ltr" colspan="2">Niska važnost (N)</td>
            <td class="s0" dir="ltr" rowspan="2">Početak praćenja</td>
            <td class="s0" dir="ltr" rowspan="2">Završetak praćenja</td>
            <td class="s0" dir="ltr" rowspan="2">DATUMI PROVEDBE PREPORUKE</td>
            <td class="s0" dir="ltr" colspan="3">Broj praćenih preporuka</td>
            <td class="s0" dir="ltr" colspan="3">Broj provedenih preporuka</td>
            <td class="s0" dir="ltr" colspan="3">Broj djelomično provedenih preporuka</td>
            <td class="s0" dir="ltr" colspan="3">Broj neprovedenih preporuka</td>
            <td class="s0" dir="ltr" colspan="3">Broj preporuka koje više nisu relevantne</td>
            <td rowspan="2" class="s1 softmerge" dir="ltr">Broj preporuka koje je potrebno dalje
                pratiti
            </td>
        </tr>
        <tr style="background-color: #bcd4c3;">
            <td class="s1 softmerge" dir="ltr">
                <div class="softmerge-inner" style="width:200px;left:-104px">Početak(datum slanja obavijesti o
                    početku revizije)</div>
            </td>
            <td class="s2 softmerge" dir="ltr">
                <div class="softmerge-inner" style="width:99px;left:-3px">Završetak(datum izrade Odluke-Konačno
                    izvješće</div>
            </td>
            <td class="s0" dir="ltr">Planirani</td>
            <td class="s0" dir="ltr">Ostvareni</td>
            <td class="s0" dir="ltr">Ukupno V</td>
            <td class="s0" dir="ltr">Prihvaćeno</td>
            <td class="s0" dir="ltr">Ukupno S</td>
            <td class="s0" dir="ltr">Prihvaćeno</td>
            <td class="s0" dir="ltr">Ukupno N</td>
            <td class="s0" dir="ltr">Prihvaćeno</td>
            <td class="s0" dir="ltr">V</td>
            <td class="s0" dir="ltr">S</td>
            <td class="s0" dir="ltr">N</td>
            <td class="s0" dir="ltr">V</td>
            <td class="s0" dir="ltr">S</td>
            <td class="s0" dir="ltr">N</td>
            <td class="s0" dir="ltr">V</td>
            <td class="s0" dir="ltr">S</td>
            <td class="s0" dir="ltr">N</td>
            <td class="s0" dir="ltr">V</td>
            <td class="s0" dir="ltr">S</td>
            <td class="s0" dir="ltr">N</td>
            <td class="s0" dir="ltr">V</td>
            <td class="s0" dir="ltr">S</td>
            <td class="s0" dir="ltr">N</td>

        </tr>
        @foreach($revisions as $revision)
        <tr>
            <td class="s3">{{$loop->index + 1}}.</td>
            <td class="s3">{{$revision->code}}</td>
            <td class="s3">{{$revision->name}}</td>
            <td class="s3"></td>
            <td class="s3">{{$revision->auditTeamHead}}<br><br>
                @php
                $subjects = json_decode($revision->subjects, true);
                $subjectNames = array_column($subjects, 'label');
                @endphp
                {{ implode(', ', $subjectNames) }}
            </td>
            <td class="s3">{{$revision->supervisor}}</td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3">{{ !empty($revision->planned_draft_of_revision_report) ? \Carbon\Carbon::parse($revision->planned_draft_of_revision_report)->format('d.m.Y') : '' }}</td>
            <td class="s3">{{ !empty($revision->actual_draft_of_revision_report) ? \Carbon\Carbon::parse($revision->actual_draft_of_revision_report)->format('d.m.Y') : '' }}</td>
            <td class="s3">{{ !empty($revision->actual_final_revision_report) ? \Carbon\Carbon::parse($revision->actual_final_revision_report)->format('d.m.Y') : '' }}</td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
            <td class="s3"></td>
        </tr>
        @endforeach
    </tbody>
</table>