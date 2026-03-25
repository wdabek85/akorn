{{--
  Template Name: O nas
--}}

@extends('layouts.app')

@section('content')
  @include('sections.about.hero')
  @include('sections.about.story')
  @include('sections.about.stats')
  @include('sections.benefits.index')
  @include('sections.about.honesty')
  @include('sections.about.partner')
  @include('sections.about.cta')
  @include('sections.kontakt.index')
@endsection
