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

@section('pageTitle', 'Family')

@section('actionBar')
    
@endSection

@section('pageContent')


<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
                <h3 class="box-title m-b-0 black">Table Jemaat</h3>
                <hr>
                <div class="table-responsive">
                    <table id="myTableJemaat" class="table table-striped">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <!-- <th>Family ID</th> -->
                            <th>Status Keanggotaan</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <!-- <th>No telp</th>
                            <th>Status</th>
                            <th>Pekerjaan</th>
                            <th>Hobi</th> -->
                            <th>Umur</th>
                            <th>Divisi</th>
                            <!-- <th>Photo</th> -->
                            <th>Baptis</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($jemaats as $jemaat)
                            <tr>
                                <td>{{$jemaat->id}}</td>
                                <!-- <td>{{$jemaat->family_id}} - {{$jemaat->family->kepala_keluarga}}</td> -->
                                <td>{{$jemaat->status_keanggotaan}}</td>
                                <td>{{$jemaat->nama}}</td>
                                <td>{{$jemaat->tempat_lahir}}, {{$jemaat->tanggal_lahir}}</td>
                                <td>{{$jemaat->jenis_kelamin}}</td>
                                <td>{{$jemaat->alamat}}</td>
                                <!-- <td>{{$jemaat->no_telp}}</td>
                                <td>{{$jemaat->status}}</td>
                                <td>{{$jemaat->pekerjaan}}</td>
                                <td>{{$jemaat->hobi}}</td> -->
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
                                    @endif
                                </td>
                                <!-- <td><img src="{{asset('storage/'.$jemaat->photo)}}" height="50"/></td> -->
                                <td>{{$jemaat->baptis}}</td>
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
@endsection
