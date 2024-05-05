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
                    <h3 class="card-title">Add New</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="{{ route('rooms.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="card-body">
                        <div class="form-group">
                            <label for="room_number">Room Number</label>
                            <input type="number" class="form-control @error('room_number') is-invalid @enderror" id="room_number" placeholder="Number" name="room_number" value="{{ old('task') }}" required>
                            @error('room_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                                <option value="single" {{ old('type') == 'single' ? 'selected' : '' }}>Single</option>
                                <option value="double" {{ old('type') == 'double' ? 'selected' : '' }}>Double</option>
                                <option value="suite" {{ old('type') == 'suite' ? 'selected' : '' }}>Suite</option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3" placeholder="Description" >{{ old('description') }}</textarea>
                            @error('description')
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