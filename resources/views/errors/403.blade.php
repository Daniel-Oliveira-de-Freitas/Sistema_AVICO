@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __('Usuário não está autorizado' ?: 'Forbidden'))
