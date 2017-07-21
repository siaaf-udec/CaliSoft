@extends('layouts.dash')

@php
  $role = auth()->user()->role;
@endphp


@section('content')

  @if ($role == 'admin')

    @include('calisoft.admin.admin-home')

  @elseif ($role == 'student')

    @include('calisoft.student.student-home')

  @else

    @include('calisoft.evaluator.evaluator-dash')

  @endif

@endsection
