@extends('errors.v_layout_error')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Sedang Loading, Karena Terlalu Banyak Permintaan'))

