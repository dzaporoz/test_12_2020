@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card @if($click->error > 0) card-red @else card-green @endif">
                <div class="card-header">
                    <h3 class="box-title">Click data</h3>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Parameter</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>ID</td>
                            <td>{{ $click->id }}</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>User-Agent</td>
                            <td>{{ $click->ua }}</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>IP</td>
                            <td>{{ $click->ip }}</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Referer</td>
                            <td>{{ $click->ref }}</td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Param 1</td>
                            <td>{{ $click->param1 }}</td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>Param 2</td>
                            <td>{{ $click->param2 }}</td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td>Error</td>
                            <td>{{ $click->error }}</td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td>Bad domain</td>
                            <td>{{ $click->bad_domain }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(session('error'))
        <script>
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Error',
                body: '{{ session('error') }}'
            })
        </script>
    @endif

    @if(session('redirect'))
        <script>
            setTimeout(function () {
                window.location = {{ session('redirect') }};
            }, 5000);
        </script>
    @endif
@endsection
