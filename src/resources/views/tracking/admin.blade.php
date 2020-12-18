@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-clicks-tab" data-toggle="pill" href="#custom-tabs-one-clicks" role="tab" aria-controls="custom-tabs-one-clicks" aria-selected="false">Clicks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-bad-domains-tab" data-toggle="pill" href="#custom-tabs-one-bad-domains" role="tab" aria-controls="custom-tabs-one-bad-domains" aria-selected="true">Bad Domains</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-one-clicks" role="tabpanel" aria-labelledby="custom-tabs-one-clicks-tab">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row"><div class="col-sm-12">
                                        <table style="width: 100%" id="clicks-table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2" aria-sort="ascending">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2">User Agent</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2">IP</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2">Referer</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2">Param1</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2">Param2</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2">Error</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2">Bad Domain</th>
                                            </thead>
                                            <tbody>
                                            @foreach($clicks as $click)
                                                <tr role="row" class="@if($loop->iteration % 2 == 0) even @else odd @endif">
                                                    <td class="dtr-control sorting_1" tabindex="0">{{ $click->id }}</td>
                                                    <td>{{ $click->ua }}</td>
                                                    <td>{{ $click->ip }}</td>
                                                    <td>{{ $click->ref }}</td>
                                                    <td>{{ $click->param1 }}</td>
                                                    <td>{{ $click->param2 }}</td>
                                                    <td>{{ $click->error }}</td>
                                                    <td>{{ $click->bad_domain }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                                <tfoot>
                                                <tr><th>ID</th><th>User Agent</th><th>IP</th><th>Referer</th><th>Param1</th><th>Param2</th><th>Error</th><th>Bad Domain</th></tr>
                                                </tfoot>
                                        </table></div></div>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-bad-domains" role="tabpanel" aria-labelledby="custom-tabs-one-bad-domains-tab">
                            <div class="row">
                                <div class="col-sm-6">
                                    <table style="width:100%" id="bad-domains-table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" aria-sort="ascending">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2">Name</th>
                                        </thead>
                                        <tbody>
                                        @foreach($domains as $domain)
                                            <tr role="row" class="@if($loop->iteration % 2 == 0) even @else odd @endif">
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $domain->id }}</td>
                                                <td>{{ $domain->name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        @if(count($clicks) > 20)
                                            <tfoot>
                                            <tr><th>ID</th><th>Name</th></tr>
                                            </tfoot>
                                        @endif
                                    </table>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card card-primary card-outline">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="fas fa-edit"></i>
                                                Create new bad domain
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="newBadDomainName">Domain name</label>
                                                <input type="text" class="form-control" id="newBadDomainName" placeholder="Enter domain name">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" id="createNewBadDomain" class="btn btn-primary">Create</button>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ mix('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ mix('js/datatables.js') }}"></script>

    <script>
        $(document).ready(function(){
            // BadDomains data table
            let badDomainsTable = $('#bad-domains-table').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [ 10, 20, 100, 200 ],
                pageLength: 20,
                ajax: function(data, callback, settings) {
                    let requestBody = {
                        limit: data.length,
                        offset: data.start,
                        sort_by: data.columns[data.order[0].column].data,
                        order: data.order[0].dir
                    }

                    if (data.search.value) {
                        requestBody.name = data.search.value;
                    }

                    $.get(
                        '{{route('click.bad_domains.index')}}',
                        requestBody,
                        function(res) {
                        // map your server's response to the DataTables format and pass it to
                        // DataTables' callback
                        callback({
                            recordsTotal: res.total_count,
                            recordsFiltered: res.total_count,
                            data: res.data
                        });
                    });
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                ]
            });

            $('#clicks-table tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" style="width: 100%" placeholder="Search '+title+'" />' );
            } );

            let clicksTable = $('#clicks-table').DataTable({
                processing: true,
                serverSide: true,
                sDom: 'lrtip',
                lengthMenu: [ 10, 20, 100, 200 ],
                pageLength: 20,
                initComplete: function () {
                    // Apply the search
                    this.api().columns().every( function () {
                        var that = this;

                        $( 'input', this.footer() ).on( 'keyup change clear', function () {
                            if ( that.search() !== this.value ) {
                                that
                                    .search( this.value )
                                    .draw();
                            }
                        } );
                    } );
                },
                ajax: function(data, callback, settings) {
                    let requestBody = {
                        limit: data.length,
                        offset: data.start,
                        sort_by: data.columns[data.order[0].column].data,
                        order: data.order[0].dir
                    }

                    data.columns.forEach(column => {
                        if (column.search.value) {
                            requestBody[column.data] = column.search.value
                        }
                    });

                    $.get(
                        '{{route('click.clicks.index')}}',
                        requestBody,
                        function(res) {
                            // map your server's response to the DataTables format and pass it to
                            // DataTables' callback
                            callback({
                                recordsTotal: res.total_count,
                                recordsFiltered: res.total_count,
                                data: res.data
                            });
                        });
                },
                columns: [
                    { data: 'id' },
                    { data: 'ua' },
                    { data: 'ip' },
                    { data: 'ref' },
                    { data: 'param1' },
                    { data: 'param2' },
                    { data: 'error' },
                    { data: 'bad_domain' },
                ]
            });

            $(document).on("click", '#createNewBadDomain', function (e) {
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "{{ route("click.bad_domains.store") }}",
                    data: {
                        name: $("#newBadDomainName").val()
                    }
                }).done(function (result) {
                    badDomainsTable.ajax.reload();
                }).fail(function (xhr, result, status) {
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Error: ' + xhr.status,
                        body: xhr.responseText
                    })
                });
            });
        });
    </script>
@endsection
