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
