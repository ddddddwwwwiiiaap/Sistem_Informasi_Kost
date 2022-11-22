@extends('layouts.master')

@section('content')
<div class="row">
    @foreach($boardinghouses as $bourdinghouse)
        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-column h-100">
                                <p class="mb-1 pt-2 text-bold">Bougenville Kost</p>
                                <h5 class="font-weight-bolder">Aturan</h5>
                                <div class="mb-2">
                                    {!! $bourdinghouse->rule !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach($customers as $customer)
        @if($customer->user->id == Auth::user()->id)
            <div class="col-lg-6 mb-lg-0 mt-md-0 mt-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex flex-column h-100">
                                    <p class="mb-1 pt-2 text-bold">Informasi Kamar Anda</p>
                                    <h5 class="font-weight-bolder">{{ $customer->room->name }}</h5>
                                    <dl class="row">
                                        <dt class="col-sm-4">Tipe Kamar</dt>
                                        <dd class="col-sm-8">{{ $customer->room->roomtype->name }}</dd>

                                        <dt class="col-sm-4">Fasilitas</dt>
                                        <dd class="col-sm-8">
                                            @foreach ($customer->room->roomtype->facility as $facility)
                                                {{ $facility->name . ($loop->last ? '.' : ', ') }}
                                            @endforeach
                                        </dd>

                                        <dt class="col-sm-4">Harga</dt>
                                        <dd class="col-sm-8">Rp
                                            {{ number_format($customer->room->roomType->price,0,',','.') }}
                                        </dd>
                                    </dl>
                                    <hr class="mb-3 mt-0">
                                    <dl class="row">
                                        <dt class="col-sm-4">Nama Penyewa</dt>
                                        <dd class="col-sm-8">{{ Auth::user()->name }}</dd>

                                        <dt class="col-sm-4">Jenis Kelamin</dt>
                                        <dd class="col-sm-8">
                                            @if($customer->gender == 'L')
                                                <div class="col-sm-8">Laki Laki</div>
                                            @else
                                                <div class="col-sm-8">Perempuan</div>
                                            @endif
                                        </dd>

                                        <dt class="col-sm-4">Email Akun</dt>
                                        <dd class="col-sm-8">{{ Auth::user()->email }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
<div class="row mt-4">
    <div class="col-lg-5 mt-md-0 mt-4">
        <div class="card h-100 mb-3">
            <div class="card-header pb-0 px-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-0">Transaksi Anda</h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <i class="far fa-calendar-alt me-2"></i>
                        <small>23 - 30 March 2020</small>
                    </div>
                </div>
            </div>
            <div class="card-body pt-4 p-3">
                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button
                                class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                    class="fas fa-arrow-down"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Netflix</h6>
                                <span class="text-xs">27 March 2020, at 12:30 PM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                            - $ 2,500
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button
                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                    class="fas fa-arrow-up"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Apple</h6>
                                <span class="text-xs">27 March 2020, at 04:30 AM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            + $ 2,000
                        </div>
                    </li>
                </ul>
                <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button
                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                    class="fas fa-arrow-up"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Stripe</h6>
                                <span class="text-xs">26 March 2020, at 13:45 PM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            + $ 750
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button
                                class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                    class="fas fa-arrow-up"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                                <span class="text-xs">26 March 2020, at 08:30 AM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            + $ 2,500
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button
                                class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                    class="fas fa-exclamation"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                                <span class="text-xs">26 March 2020, at 05:00 AM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                            Pending
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-7 mt-md-0 mt-4">
        <div class="card widget-calendar">
            <!-- Card header -->
            <div class="card-header p-3 pb-0">
                <h6 class="mb-0">Calendar</h6>
                <div class="d-flex">
                    <div class="p text-sm font-weight-bold mb-0 widget-calendar-day"></div>
                    <span>,&nbsp;</span>
                    <div class="p text-sm font-weight-bold mb-1 widget-calendar-year"></div>
                </div>
                <hr class="horizontal dark mb-0">
            </div>
            <!-- Card body -->
            <div class="card-body p-3">
                <div data-toggle="widget-calendar"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script>
@endpush
