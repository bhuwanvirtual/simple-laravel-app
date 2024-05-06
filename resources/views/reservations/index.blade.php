@extends('layouts.app')

@section('title', 'Reservation')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Reservations</h3>
                        @if (isset($_GET['action']) && $_GET['action'] == 'filter')
                            <div style="
                                text-align: right;
                            "><a href="{{ route('reservations.index') }}" style="
                                text-decoration: underline;
                                color: #007bff;
                            ">Clear Filter</a></div>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Room Number</th>
                                    <th>Booked By</th>
                                    <th>Booked Date</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $key => $reservation)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $reservation->room->room_number }}</td>
                                        <td>{{ $reservation->guest_name }}</td>
                                        <td>{{ date('jS F Y h:i:s A', strtotime($reservation->created_at)) }}</td>
                                        <td>{{ date('jS F Y', strtotime($reservation->start_date)) }}</td>
                                        <td>{{ date('jS F Y', strtotime($reservation->end_date)) }}</td>
                                        <td>
                                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this reservation?')">
                                                    <i class="fa fa-ban"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.N</th>
                                    <th>Room Number</th>
                                    <th>Book By</th>
                                    <th>Book Date</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ url('/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('/') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('/') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
@endsection