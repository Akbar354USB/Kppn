<p>Yth. {{ $recipient->name }}</p>
<p>Jangan Lupa Mengisi Absen!</p>
{{-- @if (isset($type) && $type == 'datang')
    <p>Ke kantor lewat jalan rame,
        Salam pagi dari teman sekantor.
        Absen datang jangan terlambat rame,
        Biar KPPN Majene makin kompak dan gesit bekerja kantor!</p>
@else
    <p>Beli kerupuk di pasar Majene,
        Dapat bonus cabe dua.
        Absen pulang jangan kelupaan deh,
        Supaya data KPPN Majene tetap rapi semua!</p>
@endif --}}
{!! nl2br($body) !!}

<p>Terima kasih.</p>
<p>Salam,</p>
<p><b><i>Sistem Reminder KPPN Majene</i></b></p>
