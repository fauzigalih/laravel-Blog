@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<main>
  <div class="welcome">
    <p>Welcome, {{ $greating }}</p>
    <p>{{ Auth::user()->name }}</p>
  </div>
  <div class="list-card">
    <div class="blog item-card">
      <div class="header">
        <p class="title">Blog</p>
        <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium commodi fugiat ratione saepe ex, dolores expedita vero architecto nemo voluptate, quod, ducimus corporis odio consequuntur deleniti a aliquam? Temporibus, nostrum.</p>
      </div>
      <div class="body">
        <p>Post<span>: {{ $blog->count() }}</span></p>
        <p>Tag<span>: 56</span></p>
        <p>Views<span>: 2000</span></p>
      </div>
      <a href="{{ url('admin/blog') }}"><p>MORE</p></a>
    </div>
    <div class="project item-card">
      <div class="header">
        <p class="title">Project</p>
        <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium commodi fugiat ratione saepe ex, dolores expedita vero architecto nemo voluptate, quod, ducimus corporis odio consequuntur deleniti a aliquam? Temporibus, nostrum.</p>
      </div>
      <div class="body">
        <p>Post<span>: {{ $project->count() }}</span></p>
        <p>Tag<span>: 56</span></p>
        <p>Views<span>: 2000</span></p>
      </div>
      <a href="{{ url('admin/project') }}"><p>MORE</p></a>
    </div>
    <div class="template item-card">
      <div class="header">
        <p class="title">Template</p>
        <p class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium commodi fugiat ratione saepe ex, dolores expedita vero architecto nemo voluptate, quod, ducimus corporis odio consequuntur deleniti a aliquam? Temporibus, nostrum.</p>
      </div>
      <div class="body">
        <p>Post<span>: {{ $template->count() }}</span></p>
        <p>Tag<span>: 56</span></p>
        <p>Views<span>: 2000</span></p>
      </div>
      <a href="{{ url('admin/template') }}"><p>MORE</p></a>
    </div>
  </div>
</main>
@endsection