<div class="widget">
    <div class="widget-title" style="background-color: {{ ApplicationHelper::getSetting()->theme_color }}">
        <h3 class="text-white text-center">Kepala Dinas Pemadam Kebakaran kab. Bandung Barat</h3>
    </div>
    <div class="widget-body">
        <div class="media">
            <img src="{{ Storage::url(ApplicationHelper::getSetting()->logo_3) }}">
        </div>
    </div>
</div>

{{-- pengumuman --}}
<div class="widget">
    <div class="widget-title" style="background-color: {{ ApplicationHelper::getSetting()->theme_color }}">
        <h3 class="text-white">Pengumuman</h3>
    </div>
    <div class="widget-body">
        <div class="media text-center">
            @foreach($pengumuman as $p)
                <div class="card__post__content p-3 card__post__body-border-all">
                    <div class="card__post__author-info mb-2">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <span class="text-primary">
                                    Admin
                                </span>
                            </li>
                            <li class="list-inline-item">
                                <span class="text-dark text-capitalize">
                                    {{Carbon\Carbon::parse($p->tanggal)->translatedFormat('l, d F Y')}}
                                </span>
                            </li>

                        </ul>
                    </div>
                    <div class="card__post__title">
                        <h5>{{$p->judul}}</h5>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-sm btn-info text-white"href="#modalpengumuman" data-toggle="modal" class="mr-5" data-id="{{$p->id}}" title="Pengumuman">Lihat</a>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</div>
{{-- ================ --}}

{{-- statistik pengunjung --}}
<div class="widget">
    <div class="widget-title" style="background-color: {{ ApplicationHelper::getSetting()->theme_color }}">
        <h3 class="text-white">Statistik Pengunjung</h3>
    </div>
    <div class="widget-body">
        <div class="media text-center">
            <p style="font-size: 60px; font-weight: bolder;margin-bottom:0" class="text-success">{{ ApplicationHelper::getTodayVisitors() }}</p>
            <p class="text-success" style="margin-top: 0">Pengunjung Hari Ini</p>
            <hr>
            <p style="font-size: 60px; font-weight: bolder;margin-bottom:0" class="text-primary">{{ ApplicationHelper::getTotalVisitors() }}</p>
            <p class="text-primary" style="margin-top: 0">Total Pengunjung</p>
        </div>
    </div>
</div>
{{-- ========================= --}}

<!-- Modal Pengumuman -->
<div class="modal fade" id="modalpengumuman" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content modal-lg">
			<div class="modal-header">
				<h4 class="modal-title">Pengumuman</h4>
			</div>
			<div class="modal-body" style="overflow-y: auto; height: 60vh;">
				<div class="fetched-data2"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
