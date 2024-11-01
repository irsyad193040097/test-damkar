<h4 align="center">{{$data->judul}}</h4>
<p style="font-size: 13px;"><i>{{Carbon\Carbon::parse($data->tanggal)->translatedFormat('l, d F Y')}}</i></p>

{!! $data->isi_pengumuman !!}