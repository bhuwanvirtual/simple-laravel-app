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
                    <h3 class="card-title">Add New</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="{{ route('reservations.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="card-body">
                        <div class="form-group">
                            <label for="room_id">Room Number</label>
                            <select class="form-control @error('room_id') is-invalid @enderror" name="room_id" id="room_id" required>
                                <option value="">Select Room Number</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->room_number }}</option>
                                @endforeach
                            </select>
                            @error('room_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="start_date">Check-in Date</label>
                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="start_date">Check-out Date</label>
                            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }} required>
                            @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guest_name">Guest name</label>
                            <input type="text" class="form-control @error('guest_name') is-invalid @enderror" id="guest_name" name="guest_name" value="{{ old('guest_name') }}" required>
                            @error('guest_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guest_email">Guest Email</label>
                            <input type="guest_email" class="form-control @error('guest_email') is-invalid @enderror" id="guest_email" name="guest_email" value="{{ old('guest_email') }}" required>
                            @error('guest_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="guest_phone_number">Guest Phone</label>
                            <input type="tel" class="form-control @error('guest_phone_number') is-invalid @enderror" id="guest_phone_number" name="guest_phone_number" value="{{ old('guest_phone_number') }}" required>
                            @error('guest_phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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