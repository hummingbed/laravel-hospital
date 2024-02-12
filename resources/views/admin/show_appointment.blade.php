
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container pt-4">
           <div class="my-4">
               <div class="py-4">
                   <div class="mt-4">
                       <div class="py-4">
                           <div class="table-responsive">
                               <table class="table">
                                   <thead>
                                   <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Patient Name</th>
                                       <th scope="col">Email</th>
                                       <th scope="col">Phone</th>
                                       <th scope="col">Date</th>
                                       <th scope="col">Message</th>
                                       <th scope="col">Status</th>
                                       <th scope="col">Approve</th>
                                       <th scope="col">Cancel</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($appointments as $appointment)
                                       <tr>
                                           <th scope="row">{{$appointment->id}}</th>
                                           <td>{{$appointment->user->name}}</td>
                                           <td>{{$appointment->user->email}}</td>
                                           <td>{{$appointment->user->phone}}</td>
                                           <td>{{$appointment->date}}</td>
                                           <td>{{$appointment->message}}</td>
                                           <td>{{$appointment->status}}</td>
                                           <td>
                                               <form action="{{url('approve-appointment', $appointment->id)}}" method="Post">
                                                   @csrf
                                                   <button type="submit" class="form-control btn bg-success mt-3 wow zoomIn">Approve</button>
                                               </form>
                                           </td>
                                           <td>
                                               <form action="{{url('cancel-appointment', $appointment->id)}}" method="Post">
                                                   @csrf
                                                   <button type="submit" class="form-control btn bg-danger mt-3 wow zoomIn">Cancel</button>
                                               </form>
                                           </td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@include('admin.script')
</body>
</html>
