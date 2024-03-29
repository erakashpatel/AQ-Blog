@extends('layouts.app')

@section('title')
    Index
@endsection

@section('stylesheets')
    <style>
        .scroll {
            max-height: 600px;
            overflow-y: auto;
        }

        .role-badge.badge {
            font-size: 12px;
            width: 120px;
            height: 18px;
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col col-md-9">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <strong>Recent Posts</strong>
                </div>

                <div class="card-body scroll">
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <div class="card" id="recent_post_{{ $loop->index }}">
                                <div class="card-header">
                                    <div class="container" id="post_info">
                                        <span class="font-weight-bolder">{{ $post->title }}</span>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col col-md-3">
                                            <div class="text-center" id="profile_info">
                                                <div class="avatar">
                                                    <img class="rounded-circle"
                                                         src="{{ \AQ_Blog\Util\ImageHelper::getUserAvatar($post->author) }}"
                                                         alt="{{ $post->author->name }}"
                                                         width="128"
                                                         height="100">
                                                    <img
                                                        src="{{ \AQ_Blog\Util\ImageHelper::getUserStatus($post->author) }}"
                                                        class="status" alt="User Status">
                                                </div>

                                                <ul class="list-unstyled mt-2">
                                                    <li class="small"><a href="#"
                                                                         class="text-dark font-weight-bolder"> {{ $post->author->name }}</a>
                                                    </li>

                                                    @foreach($post->author->roles as $role)
                                                        <li class="small">
                                                            @if ($role->hasImageBadge())
                                                                <img
                                                                    src="{{ \AQ_Blog\Util\ImageHelper::getRoleBadge($role) }}"
                                                                    alt="{{ $role->name }}"
                                                                    width="128px"
                                                                    height="30px"
                                                                    class="role-badge">
                                                            @else
                                                                <span class="badge role-badge"
                                                                      style="background-color: {{ \AQ_Blog\Util\ImageHelper::getRoleBadge($role) }}">{{ $role->name }}</span>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col col-md-8 ml-2">
                                            <p class="text-wrap">{{ $post->short_description  }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="container">
                                            <span class="small float-left"><i class="fa fa-clock"></i> {!! \AQ_Blog\Util\DateHelper::getSymbolicDate($post->created_at) !!}</span>

                                            @if (Auth::check())
                                                <div class="float-right">
                                                    <span class="small"><a class="text-dark" href="#"><i
                                                                class="fa fa-edit"></i> Edit</a></span>
                                                    <span class="small"><a class="text-dark" href="#"><i
                                                                class="fa fa-trash"></i> Delete</a></span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                        @endforeach
                    @else
                        <p>There are no posts.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col col-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <strong>Online Users</strong>
                </div>

                <div class="card-body flex-wrap">
                    @foreach($users as $user)
                        @if ($user->online())
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $user->name }}"
                               tabindex="0">
                                <img src="{{ \AQ_Blog\Util\ImageHelper::getUserAvatar($user) }}" alt="{{ $user->name }}"
                                     width="50" height="40">
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection
