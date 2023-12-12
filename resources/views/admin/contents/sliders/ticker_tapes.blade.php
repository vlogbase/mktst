@extends('admin.layouts.templates.panel')
@section('title','Ticker Tapes')
@section('sub-title','')
@section('content')
    	    				<!--begin::Row-->
                            <div class="row gy-5 g-xl-8">
                                <!--begin::Col-->
                                <div class="col-xl-12">
                                    <div class="card shadow-sm">
                                        <div class="card-header">
                                            <h3 class="card-title">Add Ticker Tape</h3>
                                        </div>
                                        <div class="card-body">
                                            @livewire('admin.sliders.ticker-tape-add')
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            @livewire('admin.sliders.ticker-tape-list')
@endsection
