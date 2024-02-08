@if(Route::has('login'))
    @auth
<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        <form class="main-form" action="{{url('appointment')}}" method="post">
            @csrf
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" name="user_id" class="form-control" value="{{ auth()->user()->name }}" readonly>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="doctor" id="doctor" class="custom-select">
                        @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }} - {{ $doctor->speciality }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="tel" name="number" value="{{ auth()->user()->phone }}" class="form-control" readonly>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                </div>
            </div>

            <button type="submit" class="form-control btn bg-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
{{--        @else--}}
{{--            <h5 class="text-center wow fadeInUp">Log in to make an appointment</h5>--}}
    </div>
</div>
    @endauth
@endif
