@extends('layouts.master')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Dashboard</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark"><a class="opacity-5 text-dark" href="javascript:;">Pembayaran</a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pembayaran Baru</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Pembayaran Baru</h6>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5>Pembayaran Baru</h5>
            </div>
            <div class="card-body pt-0">
                <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        @if (Auth::user()->role == 'admin')
                        <div class="col-12">
                            <label for="name" class="form-label">Nama Customer</label>
                            <select class="form-control" name="customer_id" id="choices-customer">
                                <option selected disabled>Pilih Customer</option>
                                @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->user->name . ' - ' . $customer->room->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <div class="col-12">
                            <label for="name" class="form-label">Nama Customer</label>
                            <select class="form-control" name="customer_id" id="choices-customer" disabled>
                                <option value="{{ $customer->id }}" selected>{{ $customer->user->name . ' - ' . $customer->room->name }}</option>
                            </select>
                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                        </div>
                        @endif
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <label for="month" class="form-label">Bulan</label>
                            <select class="form-control" name="month[]" id="choices-month" multiple>
                                <option>Januari 2021</option>
                                <option>Februari 2021</option>
                                <option>Maret 2021</option>
                                <option>April 2021</option>
                                <option>Mei 2021</option>
                                <option>Juni 2021</option>
                                <option>Juli 2021</option>
                                <option>Agustus 2021</option>
                                <option>September 2021</option>
                                <option>Oktober 2021</option>
                                <option>November 2021</option>
                                <option>Desember 2021</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <label for="description" class="form-label">Total</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="total" name="total" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->role == 'customer')
                    <div class="row mt-4">
                        <div class="col-12">
                            <label for="evidence" class="form-label">Bukti Transfer</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="evidence" name="evidence" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row mt-4">
                        <div class="col-12">
                            <label for="description" class="form-label">Keterangan</label>
                            <p class="form-text text-muted text-xs ms-1 d-inline">
                                (optional)
                            </p>
                            <div class="input-group">
                                <textarea id="description" name="description" class="form-control" cols="30" rows="5" onfocus="focused(this)" onfocusout="defocused(this)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('transactions.index') }}" class="btn btn-light m-0">Cancel</a>
                        <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    if (document.getElementById('choices-customer')) {
        var tags = document.getElementById('choices-customer');
        const examples = new Choices(tags, {
            searchEnabled: true,
            searchPlaceholderValue: 'Search...',
            shouldSort: false,
        });
    };

    if (document.getElementById('choices-month')) {
        var element = document.getElementById('choices-month');
        const example = new Choices(element, {
            searchEnabled: true,
            removeItemButton: true,
            shouldSort: false,
        });
    };
</script>
@endpush