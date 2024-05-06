@extends('layouts.app')

@section('title', 'Room')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Avaibility Check</h3>
                        @if (isset($_GET['action']) && $_GET['action'] == 'filter')
                            <div style="
                                text-align: right;
                            "><a
                                    href="{{ route('reservations.index') }}"
                                    style="
                                text-decoration: underline;
                                color: #007bff;
                            ">Clear Filter</a></div>
                        @endif
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form action="{{ route('rooms.index') }}" method="GET">
                        <input type="hidden" name="action" value="filter" required>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="start_date">Check-in Date</label>
                                <input type="date" class="form-control" name="start_date"
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="end_date">Check-out Date</label>
                                <input type="date" class="form-control" name="end_date" value=""
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Check</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
