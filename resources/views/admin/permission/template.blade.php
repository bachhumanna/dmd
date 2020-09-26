@extends('layouts.main')

@section('meta')
@include('common.meta')
@endsection


@section('global_mandatory_style')
@include('common.global_style')
@endsection



@section('theme_style')
@include('common.theme_style')
@endsection

@section('page_specific_css')
@include('permission.page_specific_css')
@endsection

@section('logo')
@include('common.logo')
@endsection

@section('top_menu')
@include('common.top_menu')
@endsection

@section('sidebar_menu')
@include('common.sidebar_menu')
@endsection


@section('bread_crumb')
@include('common.bread_crumb')
@endsection

@section('actions')
@include('common.actions')
@endsection

@section('body')
    @yield('body')
@endsection

@section('footer')
@include('common.footer')
@endsection

@section('core_js')
@include('common.core_js')
@endsection

@section('layout_js')
@include('common.layout_js')
@endsection

@section('page_specific_js')
@include('permission.page_specific_js')
@endsection