{{--
  Template Name: Usługi (zbiorcza)
--}}

@extends('layouts.app')

@section('content')
  @include('sections.page-hero.index')
  @include('sections.uslugi-grid.index')
  @include('sections.proces.index')
  @include('sections.cta.index')
  @include('sections.kontakt.index')
  @include('sections.newsletter.index')
@endsection
