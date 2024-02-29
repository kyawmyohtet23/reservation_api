@extends('admin.layouts.master')


@section('content')
    <div class="container-fluid mt-4">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-primary ">
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Total_person</th>
                    <th>Reserve_date</th>
                    <th>Reserve_time</th>
                    <th class="text-center">Status</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $loop->iteration }} .</td>
                    <td>{{ $reservation->name }}</td>
                    <td>{{ $reservation->phone }}</td>
                    <td>{{ $reservation->email }}</td>
                    <td>{{ $reservation->total_person }}</td>
                    <td>{{ $reservation->reserve_date }}</td>
                    <td>{{ date('h:i A', strtotime($reservation->reserve_time)) }}</td>
                    <td>
                        <form action="{{ route('status') }}" method="POST" onsubmit="return confirm('Are you sure you want to change status?')">
                            @csrf
                            <input type="hidden" name="id" value="{{ $reservation->id }}">
                            <select name="status" id="status" class="btn btn-sm @if ($reservation->status == 'Pending')
                                btn-dark
                            @endif 
                            @if ($reservation->status == 'Success')
                                btn-success
                            @endif
                            @if ($reservation->status == 'Cancel')
                                btn-danger
                            @endif">
                                <option value="Pending" {{ $reservation->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Success" {{ $reservation->status == 'Success' ? 'selected' : '' }}>Success</option>
                                <option value="Cancel" {{ $reservation->status == 'Cancel' ? 'selected' : '' }}>Cancel</option>
                            </select>

                            <button class="btn btn-sm btn-outline-primary" type="submit">
                                change
                            </button>
                        </form>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-reservation-id="{{ $reservation->id }}">
                            <i class="bi bi-eye-fill"></i>
                        </button>

                        <a href="" type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="" class="d-inline-block">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
    <script>
$(document).ready(function() {
    $('.btn-secondary').click(function() {
        var reservationId = $(this).data('reservation-id');
        var url = '{{ route("reservation.detail", ":id") }}'; // Define the URL with a placeholder for the reservation ID
        url = url.replace(':id', reservationId); // Replace the placeholder with the actual reservation ID
        $.ajax({
            url: url, // Use the constructed URL
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Update modal content with reservation details
                // console.log(response);
                $('#exampleModal .modal-body').html('<p>Name: ' + response.reservation.name + '</p>' +
                    '<p>Phone: ' + response.reservation.phone + '</p>' +
                    '<p>Email: ' + response.reservation.email + '</p>' +
                    '<p>Total Persons: ' + response.reservation.total_person + '</p>' +
                    '<p>Reservation Date: ' + response.reservation.reserve_date + '</p>' +
                    '<p>Reservation Time: ' + response.reservation.reserve_time + '</p>');
                // Show modal
                $('#exampleModal').modal('show');
            },
            error: function(xhr) {
                console.log(xhr.responseText); // Log any errors
            }
        });
    });
});


    </script>
@endsection