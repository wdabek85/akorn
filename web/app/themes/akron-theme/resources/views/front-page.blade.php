@extends('layouts.app')
@section('content')
    @include('sections.hero.index')
    @include('sections.uslugi.index')
    @include('sections.portfolio.index')
    @include('sections.jak-dzialamy.index')
    @include('sections.benefits.index')
    @include('sections.opinie.index')
    @include('sections.cta.index')
    <x-blog-posts />
    @include('sections.newsletter.index')
    @include('sections.kontakt.index')
@endsection