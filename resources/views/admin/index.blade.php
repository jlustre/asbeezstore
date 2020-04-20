@extends('layouts.admin.master')

@section('content')
    @include('partials.pagehdr')
    {{-- Sample contents --}}
    @include('partials.admin.samplecontent1')
    @include('partials.admin.samplecontent2')
    @include('partials.admin.samplecontent3')
@endsection
