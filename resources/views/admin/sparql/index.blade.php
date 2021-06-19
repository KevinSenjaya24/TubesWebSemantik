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

@section('pageTitle', 'SPARQL Management')

@section('actionBar')


<button type="button" class="btn btn-outline btn-info pull-right m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#construct">
    Construct
</button>
<button type="button" class="btn btn-outline btn-info pull-right m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#describe">
    Describe
</button>
<button type="button" class="btn btn-outline btn-info pull-right m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#ask">
    Ask
</button>
<button type="button" class="btn btn-outline btn-info pull-right m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#delete">
    Delete
</button>
<button type="button" class="btn btn-outline btn-info pull-right m-l-20 waves-effect waves-light" data-toggle="modal" data-target="#tabelpelayanan">
    Add
</button>
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

   

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                <form action="{{ route('admin.sparql.delete') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <h3 class="box-title black">Form Delete Details</h3>
                            <hr>
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="category">Dataset</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="dataset">
                                            
                                            <option value="praktikum12" >Praktikum12</option>
                                            <option value="people" >People</option>
                                            <option value="jobs" >Jobs</option>
                                            <option value="employement" >Employement</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Prefix1</label>
                                        <input type="text" name="prefix1" class="form-control" id="prefix1" aria-describedby="post" placeholder="Enter prefix1">     
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Prefix2</label>
                                        <input type="text" name="prefix2" class="form-control" id="prefix2" aria-describedby="post" placeholder="Enter prefix2">     
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Subject</label>
                                        <input type="text" name="subject" class="form-control" id="subject" aria-describedby="post" placeholder="Enter subject">     
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Predicate</label>
                                        <input type="text" name="predicate" class="form-control" id="predicate" aria-describedby="post" placeholder="Enter predicate">     
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Object</label>
                                        <input type="text" name="object" class="form-control" id="object" aria-describedby="post" placeholder="Enter object">     
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save changes</button>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="construct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                <form action="{{ route('admin.construct.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <h3 class="box-title black">Form Construct Details</h3>
                            <hr>
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="category">Dataset</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="dataset">
                                            
                                            <option value="praktikum12" >Praktikum12</option>
                                            <option value="people" >People</option>
                                            <option value="jobs" >Jobs</option>
                                            <option value="employement" >Employement</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Prefix1</label>
                                        <input type="text" name="prefix1" class="form-control" id="prefix1" aria-describedby="post" placeholder="Enter prefix1">     
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Prefix2</label>
                                        <input type="text" name="prefix2" class="form-control" id="prefix2" aria-describedby="post" placeholder="Enter prefix2">     
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Subject</label>
                                        <input type="text" name="subject" class="form-control" id="subject" aria-describedby="post" placeholder="Enter subject">     
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Predicate</label>
                                        <input type="text" name="predicate" class="form-control" id="predicate" aria-describedby="post" placeholder="Enter predicate">     
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Object</label>
                                        <input type="text" name="object" class="form-control" id="object" aria-describedby="post" placeholder="Enter object">     
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save changes</button>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="describe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                <form action="{{ route('admin.describe.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <h3 class="box-title black">Form Describe Details</h3>
                            <hr>
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Subject</label>
                                        <input type="text" name="subject" class="form-control" id="subject" aria-describedby="post" placeholder="Enter subject">     
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Predicate</label>
                                        <input type="text" name="predicate" class="form-control" id="predicate" aria-describedby="post" placeholder="Enter predicate">     
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Object</label>
                                        <input type="text" name="object" class="form-control" id="object" aria-describedby="post" placeholder="Enter object">     
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save changes</button>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="ask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                <form action="{{ route('admin.ask.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <h3 class="box-title black">Form Ask Details</h3>
                            <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
                            
                            
                            <hr>
                            <div class="row">
                            <div class="col-md-12">
                                    <!-- <div class="form-group">
                                        <label class="control-label" for="category">Dataset</label>
                                        <select id="select1" class="form-control selectpicker" data-live-search="true" name="dataset">
                                            <option value="praktikum12" >Praktikum12</option>
                                            <option value="people" >People</option>
                                            <option value="jobs" >Jobs</option>
                                            <option value="employement" >Employement</option>
                                            
                                        </select>
                                    </div> -->
                                </div>
                                <!--/span-->
                                <!--/span-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Subject</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="subject">
                                        <!-- <input type="text" id="selected"> -->
                                        
                                        @foreach($data['results']['bindings'] as $result)
                                            <option value="{{$result['s']['value']}}" >{{$result['s']['value']}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Predicate</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="object">
                                        @foreach($data['results']['bindings'] as $result)
                                            <option value="{{$result['p']['value']}}" >{{$result['p']['value']}}</option>
                                        @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Object</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="predicate">
                                        @foreach($data['results']['bindings'] as $result)
                                            <option value="{{$result['o']['value']}}" >{{$result['o']['value']}}</option>
                                        @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save changes</button>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    <div class="modal fade" id="tabelpelayanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                <form action="{{ route('admin.sparql.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <h3 class="box-title black">Form Post Details</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="category">Dataset</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="dataset">
                                            
                                            <option value="praktikum12" >Praktikum12</option>
                                            <option value="people" >People</option>
                                            <option value="jobs" >Jobs</option>
                                            <option value="employement" >Employement</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Prefix1</label>
                                        <input type="text" name="prefix1" class="form-control" id="prefix1" aria-describedby="post" placeholder="Enter prefix1">     
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Prefix2</label>
                                        <input type="text" name="prefix2" class="form-control" id="prefix2" aria-describedby="post" placeholder="Enter prefix2">     
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Subject</label>
                                        <input type="text" name="subject" class="form-control" id="subject" aria-describedby="post" placeholder="Enter subject">     
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Predicate</label>
                                        <input type="text" name="predicate" class="form-control" id="predicate" aria-describedby="post" placeholder="Enter predicate">     
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Object</label>
                                        <input type="text" name="object" class="form-control" id="object" aria-describedby="post" placeholder="Enter object">     
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save changes</button>
                        </div>
                    </form>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
            <h3 class="box-title m-b-0 black">Table All</h3>
            <hr>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                        <th>Subject</th>
                        <th>Predikat</th>
                        <th>Object</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data['results']['bindings'] as $result)
                        
                        <tr>
                            
                            <td>{{$result['s']['value']}}</td>
                            <td>{{$result['p']['value']}}</td>
                            <td>{{$result['o']['value']}}</td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
            <h3 class="box-title m-b-0 black">Table People</h3>
            <hr>
            <div class="table-responsive">
                <table id="myTable1" class="table table-striped">
                    <thead>
                        <tr>
                        <th>Subject</th>
                        <th>Predikat</th>
                        <th>Object</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($peoples['results']['bindings'] as $result)
                        
                        <tr>
                            <td>{{$result['s']['value']}}</td>
                            <td>{{$result['p']['value']}}</td>
                            <td>{{$result['o']['value']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
            <h3 class="box-title m-b-0 black">Table Employements</h3>
            <hr>
            <div class="table-responsive">
                <table id="myTable2" class="table table-striped">
                    <thead>
                        <tr>
                        <th>Subject</th>
                        <th>Predikat</th>
                        <th>Object</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($employements['results']['bindings'] as $result)
                        
                        <tr>
                            <td>{{$result['s']['value']}}</td>
                            <td>{{$result['p']['value']}}</td>
                            <td>{{$result['o']['value']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
            <h3 class="box-title m-b-0 black">Table Jobs</h3>
            <hr>
            <div class="table-responsive">
                <table id="myTable3" class="table table-striped">
                    <thead>
                        <tr>
                        <th>Subject</th>
                        <th>Predikat</th>
                        <th>Object</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs['results']['bindings'] as $result)
                        
                        <tr>
                            <td>{{$result['s']['value']}}</td>
                            <td>{{$result['p']['value']}}</td>
                            <td>{{$result['o']['value']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="panel panel-info">
        <div class="panel-wrapper collapse in" aria-expanded="true">
            <div class="panel-body">
            <h3 class="box-title m-b-0 black">Table Relationship</h3>
            <hr>
            <div class="table-responsive">
                <table id="myTable4" class="table table-striped">
                    <thead>
                        <tr>
                        <th>Subject</th>
                        <th>Predikat</th>
                        <th>Object</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($results1['results']['bindings'] as $result)
                        
                        <tr>
                            <td>{{$result['s']['value']}}</td>
                            <td>
                            @if($result['p']['value'] == 'http://example.org#loves')
                                Loves
                            @elseif($result['p']['value'] == 'http://example.org#hasFriend')
                                HasFriend
                            @endif
                            </td>
                            <td>{{$result['o']['value']}}</td>
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
    <script>
        $('#select1').on('change', function() {
            $('#selected').val( this.value );
        });
    </script>
@endsection
