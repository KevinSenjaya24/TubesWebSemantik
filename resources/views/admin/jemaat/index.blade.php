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

@section('pageTitle', 'Jemaat Management')

@section('actionBar')
    <a href="{{ route('admin.jemaat.detail','add') }}" class="btn btn-outline btn-info pull-right m-l-20 waves-effect waves-light">Add</a>
@endSection

@section('pageContent')
    @if (session('success'))
        <br><br>
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <br><br>
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
                <h3 class="box-title m-b-0 black">Table Jemaat</h3>
                <hr>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped" >
                        <thead>
                            <tr>    
                            <th>NIK</th>
                            <th>Kepala Keluarga</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No telp</th>
                            <th>Status</th>
                            <th>Pekerjaan</th>
                            <th>Hobi</th>
                            <th>Umur</th>
                            <th>Divisi</th>
                            <th>Status Keanggotaan</th>
                            <th>Baptis</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($jemaats as $jemaat)
                            <tr>
                                <td>{{$jemaat->nik}}</td>
                                <td>{{$jemaat->family->kepala_keluarga}}</td>
                                <td>{{$jemaat->nama}}</td>
                                <td>{{$jemaat->tempat_lahir}}, {{$jemaat->tanggal_lahir}}</td>
                                <td>{{$jemaat->jenis_kelamin}}</td>
                                <td>{{$jemaat->alamat}}</td>
                                <td>{{$jemaat->no_telp}}</td>
                                <td>{{$jemaat->status}}</td>
                                <td>{{$jemaat->pekerjaan}}</td>
                                <td>{{$jemaat->hobi}}</td>
                                <td>
                                    <?php
                                        $dob = $jemaat->tanggal_lahir;
                                        $diff = date('Y') - date('Y', strtotime($dob));
                                        echo $diff;
                                    ?>
                                </td>
                                <td>
                                    @if($diff >= 0 && $diff <=5)
                                        Batita & Balita
                                    @elseif($diff >= 6 && $diff <=12)
                                        Sekolah Minggu
                                    @elseif($diff >= 13 && $diff <=15)
                                        Tunas Remaja
                                    @elseif($diff >=16 && $diff <=18)
                                        Remaja
                                    @elseif($diff >=19 && $diff <=30)
                                        Pemuda
                                    @elseif($diff >=30)
                                        Perkarya atau Perkawan
                                    @endif
                                </td>
                                <td>{{$jemaat->status_keanggotaan}}</td>
                                <td>{{$jemaat->baptis}}</td>
                                
                                <td>
                                    
                                    <a href="{{ route('admin.jemaat.detail',$jemaat->id) }}" name="edit_id" value="{{$jemaat->id}}">
                                        <button class="btn btn-primary">
                                            <i class="mdi mdi-border-color"></i>
                                        </button>
                                    </a>
                                    <form method="POST" action="{{route('admin.jemaat.delete', $jemaat->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                            <i class="mdi mdi-delete-circle"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection

@section('customScript')
    <script type="text/javascript">
        (function() {
            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });
        })();
    </script>
    
@endsection
