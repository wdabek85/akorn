{{--
  Template Name: Usługa (pojedyncza)
--}}

@extends('layouts.app')

@section('content')
  @include('sections.page-hero.index')
  @include('sections.sticky-bar.index', [
    'title' => $pageHero['title'] ?? get_the_title(),
    'subtitle' => $pageHero['description'] ?? '',
  ])
  @include('sections.flexible.index')
@endsection
