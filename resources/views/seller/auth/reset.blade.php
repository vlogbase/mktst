@extends('admin.layouts.templates.auth')
@section('title','Brand Owner System')
@section('sub-title','')
@section('content')
   
@livewire('seller.auth.reset',['email' => $email,'token'=>$token])
@endsection
