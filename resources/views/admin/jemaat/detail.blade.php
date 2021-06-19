@extends('admin.layouts.wrapper')

@section('seoTag')
    <meta name="description" content="">
    <meta name="author" content="">
@endsection

@section('pluginLink')
    <!-- toast CSS -->
    <link href="{{ asset('admin-assets/plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('admin-assets/plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('admin-assets/plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="{{ asset('admin-assets/plugins/bower_components/calendar/dist/fullcalendar.css') }}" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="{{ asset('admin-assets/css/animate.css') }}" rel="stylesheet">
@endsection

@section('pageTitle', 'Jemaat Details')

@section('actionBar')
    
@endSection

@section('crumbList')
    <li class="active">Jemaat</li>
    <li class="active">Details</li>
@endsection

@section('pageContent')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                <form action="{{ route('admin.jemaat.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="id" type="hidden" value="{{ (isset($jemaat->id)?$jemaat->id:"") }}"/>
                        <div class="form-body">
                            <h3 class="box-title black">Form Data Jemaat</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Kepala Keluarga</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="family_id" data-placeholder="Pilih Kepala Keluarga">
                                            <option disabled {{ (isset($jemaat->family_id)?"":"selected") }}>Pilih Kepala Keluarga</option>
                                            @foreach($families as $family)
                                                @if(isset($jemaat->family_id))
                                                    <option value="{{ $family->id }}" {{ (($jemaat->family_id == $family->id) ? "selected" : "") }}>{{ $family->id }} - {{$family->kepala_keluarga}}</option>
                                                @else
                                                    <option value="{{ $family->id }}">{{ $family->id }} - {{$family->kepala_keluarga}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group @error('nik') has-error @enderror">
                                        <label class="control-label">NIK</label>
                                        <input type="tel" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" value="{{ (isset($jemaat->nik) ? $jemaat->nik : "") }}" aria-describedby="nik" maxlength="16" placeholder="Masukan NIK">
                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Status Keanggotaan</label>
                                        <select class="form-control" name="status_keanggotaan" id="status_keanggotaan" data-placeholder="Pilih Status Keanggotaan">
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>     
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" value="{{ (isset($jemaat->nama) ? $jemaat->nama : "") }}" aria-describedby="jemaat" placeholder="Masukan Nama">
                                
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{ (isset($jemaat->tempat_lahir) ? $jemaat->tempat_lahir : "") }}" aria-describedby="tempat_lahir" placeholder="Masukan Tempat Lahir">     
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tanggal Lahir</label>
                                        <input class="form-control" type="date" name="tanggal_lahir" value="{{ (isset($jemaat->tanggal_lahir) ? $jemaat->tanggal_lahir : "") }}" id="example-date-input">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="Lelaki">Lelaki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <hr>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label class="control-label">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ (isset($jemaat->alamat) ? $jemaat->alamat : "") }}" aria-describedby="jemaat" placeholder="Masukan Alamat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">No Telfon</label>
                                        <input type="tel" name="no_telp" class="form-control" id="no_telp" value="{{ (isset($jemaat->no_telp) ? $jemaat->no_telp : "") }}" aria-describedby="jemaat" placeholder="Masukan No Telfon">

                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1">Sudah Menikah</option>
                                            <option value="2">Belum Menikah</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Pekerjaan</label>
                                        <select class="form-control" name="pekerjaan" id="pekerjaan">
                                            <option value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Guru / Dosen">Guru / Dosen</option>
                                            <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                                            <option value="Belum / Tidak Bekerja">Belum / Tidak Bekerja</option>
                                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                        </select>    
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Hobi</label>
                                        <input type="text" name="hobi" class="form-control" id="hobi" value="{{ (isset($jemaat->hobi) ? $jemaat->hobi : "") }}" aria-describedby="hobi" placeholder="Masukan Hobi">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Baptis</label>
                                        <select class="form-control" name="baptis" id="baptis">
                                            <option value="Baptis">Sudah Baptis Selam</option>
                                            <option value="Percik">Sudah Baptis Percik</option>
                                            <option value="Belum">Belum di Baptis</option>
                                        </select>
                                    </div>
                                </div>

                                
                                <!--/span-->
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pluginScript')
    <!--Wave Effects -->
    <script src="{{ asset('admin-assets/js/waves.js') }}"></script>
    <!--Counter js -->
    <script src="{{ asset('admin-assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
    <!--Morris JavaScript -->
    <script src="{{ asset('admin-assets/plugins/bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bower_components/morrisjs/morris.js') }}"></script>
    <!-- chartist chart -->
    <script src="{{ asset('admin-assets/plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!-- Calendar JavaScript -->
    <script src="{{ asset('admin-assets/plugins/bower_components/moment/moment.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bower_components/calendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/bower_components/calendar/dist/cal-init.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>

@endsection

@section('customScript')
    <script type="text/javascript">
        (function() {
            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });
        })();
    </script>
{{--    <script>--}}
{{--        $('select').selectpicker();--}}
{{--    </script>--}}

@endsection

