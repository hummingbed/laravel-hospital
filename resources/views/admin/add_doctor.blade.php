

<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="container-fluid page-body-wrapper ">
            <div class="container">
                <div class="pt-1">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>

                <form class="p-4" action="{{url('upload-doctor')}}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="pt-4">
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ $error }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="form-group mt-4">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control text-white" style="background-color: #1e293b;" name="name"  placeholder="Enter Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="tel" class="form-control text-white" name="phone" style="background-color: #1e293b;" id="PhoneNumber" aria-describedby="Phone Number" placeholder="Enter phone number">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control text-white" name="email" style="background-color: #1e293b;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="speciality">Speciality</label>
                        <select name="speciality" class="form-control text-white"  style="background-color: #1e293b;">
                            <option value="Gynaecologist">Gynaecologist</option>
                            <option value="Pediatrician">Pediatrician</option>
                            <option value="Eye Optician">Eye Optician</option>
                            <option value="Ear Optician">Ear Optician</option>
                            <option value="Dentist">Dentist</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Room Number">Room Number</label>
                        <input type="number" name="room" class="form-control text-white" style="background-color: #1e293b;" placeholder="Enter Room Number">
                    </div>

                    <div class="form-group">
                        <label for="Doctor Photo">Doctor Photo</label>
                        <input type="file"  name="file" class="form-control text-white" style="background-color: #1e293b;">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-info">Submit</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@include('admin.script')
</body>
</html>
