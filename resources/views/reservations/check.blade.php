@extends('layouts.app')

@section('title', 'Reservation')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Reservation check</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="{{ route('reservations.index') }}" method="GET">
                    <input type="hidden" name="action" value="filter" required>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="guest_email">Guest Email</label>
                            <input type="email" class="form-control" name="guest_email" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Check-in Date</label>
                            <input type="date" class="form-control" name="start_date" required>
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