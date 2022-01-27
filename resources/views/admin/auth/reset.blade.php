@extends('admin.layouts.templates.auth')
@section('title','Admin Reset Password')
@section('sub-title','')
@section('content')
    @livewire('admin.auth.reset-password-form',['email' => $email,'token'=>$token])
@endsection
