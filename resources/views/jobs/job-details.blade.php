@extends('layouts.app')
@section('content')


@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Well Done!</strong> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Warning!</strong> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif ($message = Session::get('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

    @auth

        @foreach (Auth::user()->roles as $role)
            @if ($role->name == 'Admin')
                <a href="{{ route('jobs.index') }}">
                    <div class="d-block"
                        style="position: absolute; margin-left:3%; text-align:center; height: 110px; width:110px; background:skyblue; border-radius:50%">
                        <i class="fas fa-home  justify-content-center" style="font-size: 80px"></i>
                        <small>Return to admin space</small>
                    </div>
                </a>
            @endif
        @endforeach
    @endauth


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="icon-home fa"></i></a></li>
                        <li class="breadcrumb-item"><a href="job-list.html">Jobs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $job->category->name }}</li>
                    </ol>
                </nav>
                <div class="pull-right backtolist"><a href="javascript:history.go(-1)"> <i
                            class="fa fa-angle-double-left"></i> {{ __('home.back') }}</a></div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 page-content col-thin-right">
                <div class="inner inner-box ads-details-wrapper">
                    <h2> {{ $job->title }} </h2>
                    <span class="info-row"> <span class="date"><i class=" icon-clock"> </i>
                            {{ __('posted') }}:
                            {{ $job->created_at->format('Y-m-d : h:m') }}</span> - <span class="___class_+?20___">
                            {{ $job->jobtype->name }} </span> - <span class="item-location"><i
                                class="fa fa-map-marker-alt"></i> {{ $job->city->name }} </span> </span>

                    <div class="Ads-Details ">
                        <div class="row">
                            <div class="ads-details-info jobs-details-info col-md-8">
                                {!! $job->description !!}
                            </div>
                            <div class="col-md-4">
                                <aside class="panel panel-body panel-details job-summery">
                                    <ul>

                                        <li>
                                            <p class=" no-margin "><strong>{{ __('home.category') }}:</strong>
                                                {{ $job->category->name }} </p>
                                        </li>
                                        {{-- <li><p class=" no-margin "><strong>Start Date:</strong> ASAP </p></li> --}}
                                        {{-- <li><p class=" no-margin "><strong>Company:</strong> {{ $job->user->name }} </p>
                                        </li> --}}
                                        <li>
                                            <p class=" no-margin "><strong>{{ __('home.salary') }}:</strong>
                                                {{ $job->salary }} a {{ $job->salarytype->name }}</p>
                                        </li>
                                        <li>
                                            <p class="no-margin"><strong>{{ __('home.Work_type') }}:</strong>
                                                {{ $job->jobtype->name }}</p>
                                        </li>
                                        <li>
                                            <p class="no-margin"><strong>{{ __('home.location') }}:</strong>
                                                {{ $job->city->name }} </p>
                                        </li>


                                    </ul>
                                </aside>
                                <div class="ads-action">
                                    <ul class="list-border">
                                        {{-- <li><a href="#"> <i class=" fa icon-mail"></i> Email job</a></li>
                                        <li><a href="#" data-toggle="modal"> <i class="fa icon-print"></i> Print job</a> --}}
                                        </li>
                                        <form action="{{ route('jobs.like') }}" id="form-js">
                                            <a class="save-job" href="#">
                                                <input type="hidden" value="{{ $job->id }}" id="job-id-js">
    
                                                <span id="count-js"
                                                    class="count-js">{{ $job->likes->count() }}</span>
                                            </a>
                                            @auth
                                                @if ($job->isLikedByLoggedInUser())
                                                    <button type="submit" class="btn btn-link like" id="like">Unsave
                                                        💖</button>
                                                @else
                                                    <button type="submit" class="btn btn-link like" 
                                                    data-toggle="modal" data-target="#exampleModal" id="like">Save ❤</button>
                                                @endif
                                            @endauth
                                        </form>
                                        <li><a href="#" data-toggle="modal" data-target="#sharejob"> 
                                            <i class="fas fa-share-alt"></i> Share</a></li>
            
                                        <!-- Modal -->
                                        <div class="modal fade" id="sharejob" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Share This Ad</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <a href="{{ route('social.index', $job->id) }}" target="_blank"><i class="fab fa-facebook-square ml-3"></i> Facebook</a>
                                                <a href="{{ route('social.twitter', $job->id) }}" target="_blank"><i class="fab fa-twitter ml-3"></i> Twitter</a>
                                                <a href="{{ route('social.linkedin', $job->id) }}" target="_blank"><i class="fab fa-linkedin-in ml-3"></i> LinkedIn</a>
                                                <a href="{{ route('social.whatsapp', $job->id) }}" target="_blank"><i class="fab fa-whatsapp ml-3"></i> WhatsApp</a>
                                                <a href="{{ route('social.telegram', $job->id) }}" target="_blank"><i class="fab fa-telegram ml-3"></i> Telegram</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
  
    

                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="content-footer text-left">
                            <a href="#applyJob" data-toggle="modal" class="btn  btn-primary"> <i
                                    class=" icon-mail-2"></i> Apply Online </a>
                            <small> or. Send your CV to: career@gmail.com</small>
                        </div> --}}
                    </div>
                </div>
                <!--/.ads-details-wrapper-->

            </div>
            <!--/.page-content-->




            <div class="col-md-3  page-sidebar-right">
                <aside>

                    <div class="card card-user-info sidebar-card">
                        <div class="block-cell user">
        
                            <div class="cell-media"><img src="{{ asset('images/user.jpg') }}" alt="profile photo"></div>
                            <div class="cell-content">
                                <h5 class="title">{{ __('home.posted_by') }}</h5>
                                <span class="name"><a href="seller-profile.html">{{ $job->user->name }} </a></span>
                                {{-- <span class="rating">top rated</span> --}}
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body text-left">
                                <div class="grid-col">
                                    <div class="col from">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ __('home.location') }}</span>
                                    </div>
                                    <div class="col to">
                                        <span>{{ $job->city->name }}</span>
                                    </div>
                                </div>
        
                                <div class="grid-col">
                                    <div class="col from">
                                        <i class="fas fa-user"></i>
                                        <span>{{ __('home.joined') }}</span>
                                    </div>
                                    <div class="col to">
                                        <span>{{ $job->user->created_at->format('Y-m-d. a H:m') }}</span>
                                    </div>
                                </div>
        
                                <div class="grid-col">
                                    <div class="col from">
                                        <i class="fas fa-clock"></i>
                                        <span>{{ __('home.last_online') }}</span>
                                    </div>
                                    <div class="col to">
                                        <span>{{ \Carbon\Carbon::parse($job->user->last_login)->diffForHumans() }}</span>
                                    </div>
                                </div>
        
                            </div>
        
                            <div class="ev-action">
                                <a class="btn btn-success btn-block" data-toggle="modal" href="#contactAdvertiser">
                                    <i class=" icon-mail-2"></i> {{ __('home.contact_user') }}
                                </a>
                                {{-- <a class="btn  btn-info btn-block">
                                    <i class=" icon-phone-1"></i> 01680 531 352 </a> --}}
                            </div>

                            @include('message.message')
                                    
                        </div>
                    </div>
        
                    {{-- <div class="card sidebar-card card-contact-seller">
                        <div class="card-header">{{ __('home.recruiter_info') }}</div>
                        <div class="card-content user-info">
                            <div class="card-body text-center">
                                <div class="seller-info">
                                    <h3 class="no-margin"> {{ $job->user->name }}</h3><br>
                                    <p>{{ __('home.location') }} : <strong>{{ $job->city->name }}</strong></p><br>
                                    <p>{{ __('home.About_him') }} : <strong>{{ $job->user->about_yourself }}</strong>
                                    </p>

                                </div>

                            </div>
                        </div>
                    </div> --}}
                    <div class="card sidebar-card">
                        <div class="card-header"><i class="icon-lamp"></i> {{ __('home.successful_cv') }}</div>
                        <div class="card-content">
                            <div class="card-body text-left">
                                <ul class="list-check">
                                    <li> {{ __('home.tailor_a_cv') }}</li>
                                    <li> {{ __('home.keep_it') }}</li>
                                    <li> {{ __('home.include_key') }}</li>
                                    <li> {{ __('home.showcase') }}</li>
                                </ul>
                                <p><a class="pull-right" href="#"> {{ __('home.know_more') }} <i
                                            class="fa fa-angle-double-right"></i> </a></p>
                            </div>
                        </div>
                    </div>
                    <!--/.categories-list-->
                </aside>
            </div>
            <!--/.page-side-bar-->
        </div>
    </div>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('assets/js/jquery/jquery-3.3.1.min.js') }}">\x3C/script>')</script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/js/vendors.min.js') }}"></script>

<!-- include custom script for site  -->
<script src="{{ asset('assets/js/main.min.js') }}"></script>

<script>
    $(document).ready(function() {
        @if (count($errors) > 0)
            $('#contactAdvertiser').modal('show');
        @endif
    });
</script>


@endsection
