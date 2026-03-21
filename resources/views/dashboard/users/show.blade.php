@extends('admin.master')
@section('header')
<div class="breadcrumb">
    <h1>User Profile</h1>
    <ul>
        <li><a href="">Pages</a></li>
        <li>User Profile</li>
    </ul>
</div>
@stop
@section('content')
<div class="separator-breadcrumb border-top"></div>
                <div class="card user-profile o-hidden mb-4">
                <div class="header-cover" style="background-image: url('{{asset('adminlte/images/photo-wide-4.jpg')}}')"></div>
                    <div class="user-info"><img class="profile-picture avatar-lg mb-2" src="{{asset('adminlte/images/faces/1.jpg')}}" alt="" />
                        <p class="m-0 text-24">{{$user->name}}</p>
                        <p class="text-muted m-0">{{$user->getRoleNames()->implode(', ')}}</p>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs profile-nav mb-4" id="profileTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a></li>
                            <li class="nav-item"><a class="nav-link" id="friends-tab" data-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false">Publicacones</a></li>
                            <li class="nav-item"><a class="nav-link" id="roles-tab" data-toggle="tab" href="#roles" role="tab" aria-controls="roles" aria-selected="false">Roles</a></li>
                            <li class="nav-item"><a class="nav-link" id="permisos-tab" data-toggle="tab" href="#permisos" role="tab" aria-controls="permisos" aria-selected="false">Permisos Extras</a></li>
                        </ul>
                        <div class="tab-content" id="profileTabContent">
                            <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="about-tab">
                                <h4>Información Personal</h4>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, commodi quam! Provident quis voluptate asperiores ullam, quidem odio pariatur. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem, nulla eos?
                                    Cum non ex voluptate corporis id asperiores doloribus dignissimos blanditiis iusto qui repellendus deleniti aliquam, vel quae eligendi explicabo.
                                </p>
                                <hr />
                                <div class="row">
                                    <div class="col-md-4 col-6">
                                        <div class="mb-4">
                                            <p class="text-primary mb-1"><i class="i-Calendar text-16 mr-1"></i> Cumpleaños</p><span>1 Jan, 1994</span>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-primary mb-1"><i class="i-Edit-Map text-16 mr-1"></i> Lugar de nacimiento</p><span>Dhaka, DB</span>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> vive en</p><span>Dhaka, DB</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="mb-4">
                                            <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Genero</p><span>Hombre</span>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p><span>{{ $user->email}}</span>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-primary mb-1"><i class="i-Cloud-Weather text-16 mr-1"></i> Website</p><span>www.ui-lib.com</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="mb-4">
                                            <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 mr-1"></i> Profession</p><span>Digital Marketer</span>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-primary mb-1"><i class="i-Professor text-16 mr-1"></i> Experience</p><span>8 Years</span>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-primary mb-1"><i class="i-Home1 text-16 mr-1"></i> School</p><span>School of Digital Marketing</span>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <h4>Other Info</h4>
                                <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum dolore labore reiciendis ab quo ducimus reprehenderit natus debitis, provident ad iure sed aut animi dolor incidunt voluptatem. Blanditiis, nobis aut.</p>
                                <div class="row">
                                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Plane text-32 text-primary"></i>
                                        <p class="text-16 mt-1">Travelling</p>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Camera text-32 text-primary"></i>
                                        <p class="text-16 mt-1">Photography</p>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Car-3 text-32 text-primary"></i>
                                        <p class="text-16 mt-1">Driving</p>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Gamepad-2 text-32 text-primary"></i>
                                        <p class="text-16 mt-1">Gaming</p>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Music-Note-2 text-32 text-primary"></i>
                                        <p class="text-16 mt-1">Music</p>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-6 text-center"><i class="i-Shopping-Bag text-32 text-primary"></i>
                                        <p class="text-16 mt-1">Shopping</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends-tab">
                                <div class="row">
                                    @forelse ($user->posts as $post)
                                        <div class="col-md-3">
                                            <div class="card card-profile-1 mb-4">
                                                <div class="card-body text-center">
                                                    <h5 class="m-0">{{$post->title}}</h5>
                                                    <p class="mt-0">Publicado el {{ $post->published_at->format('d/m/Y') }}</p>
                                                    <p>{{$post->excerpt}}</p>
                                                    <a href="{{route('post.show', $post)}}" target="_blank"><button class="btn btn-primary btn-rounded">ir al post</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="col-md-12">
                                            <div class="card card-profile-1 mb-4">
                                                <div class="card-body text-center">
                                                    <h5 class="m-0">No tiene ningun publicacion</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane fade" id="roles" role="tabpanel" aria-labelledby="roles-tab">
                                <div class="row">
                                    @forelse ($user->roles as $role)
                                        <div class="col-md-3">
                                            <div class="card card-profile-1 mb-4">
                                                <div class="card-body text-center">
                                                    <h5 class="m-0">{{$role->name}}</h5>
                                                    @if ($role->permissions->count())
                                                        <p>Permisos: {{$role->permissions->pluck('name')->implode(', ')}}</p>
                                                    @endif
                                                    {{-- <p class="mt-0">Publicado el {{ $post->published_at->format('d/m/Y') }}</p> --}}
                                                    
                                                    {{-- <a href="{{route('post.show', $post)}}" target="_blank"><button class="btn btn-primary btn-rounded">ir al post</button></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="col-md-12">
                                            <div class="card card-profile-1 mb-4">
                                                <div class="card-body text-center">
                                                    <h5 class="m-0">No tiene ningun rol</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="tab-pane fade" id="permisos" role="tabpanel" aria-labelledby="permisos-tab">
                                <div class="row">
                                    @forelse ($user->permissions as $permission)
                                        <div class="col-md-3">
                                            <div class="card card-profile-1 mb-4">
                                                <div class="card-body text-center">
                                                    <h5 class="m-0">{{$permission->name}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="col-md-12">
                                            <div class="card card-profile-1 mb-4">
                                                <div class="card-body text-center">
                                                    <h5 class="m-0">No tiene ningun permiso adicional</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
@endsection