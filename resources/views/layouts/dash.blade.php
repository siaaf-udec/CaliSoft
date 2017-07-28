@extends('material.layouts.dashboard')

{{--
  Dash del usuario, los links cambian segun el rol del usuario
--}}
@php
  $role = auth()->user()->role;
@endphp

@section('links')
  @if ($role == 'admin')

    @include('calisoft.admin.admin-dash')

  @elseif ($role == 'student')

    @include('calisoft.student.student-dash')

  @else

    @include('calisoft.evaluator.evaluator-dash')

  @endif
@endsection

@push('styles')
    <link rel="stylesheet" href="/assets/global/plugins/bootstrap-toastr/toastr.min.css">
 @endpush

@push('plugins')
    <script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
    <script>
        window.pusherKey = "{{ config('broadcasting.connections.pusher.key') }}";
        window.userId = "{{ auth()->id() }}";
        Object.assign(toastr.options, {
            positionClass: "toast-bottom-right",
            timeOut: 10000,
        })
    </script>
@endpush
