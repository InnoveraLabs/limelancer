@extends('layouts.master')
<link rel="stylesheet" href="{{ asset('css/typeahead.css') }}">

@section('main_content')
<style>
@keyframes tonext {
	  75% {
		left: 0;
	  }
	  95% {
		left: 100%;
	  }
	  98% {
		left: 100%;
	  }
	  99% {
		left: 0;
	  }
	}

	@keyframes tostart {
	  75% {
		left: 0;
	  }
	  95% {
		left: -300%;
	  }
	  98% {
		left: -300%;
	  }
	  99% {
		left: 0;
	  }
	}

	@keyframes snap {
	  96% {
		scroll-snap-align: center;
	  }
	  97% {
		scroll-snap-align: none;
	  }
	  99% {
		scroll-snap-align: none;
	  }
	  100% {
		scroll-snap-align: center;
	  }
	}



	* {
	  box-sizing: border-box;
	  scrollbar-color: transparent transparent; /* thumb and track color */
	  scrollbar-width: 0px;
	}

	*::-webkit-scrollbar {
	  width: 0;
	}

	*::-webkit-scrollbar-track {
	  background: transparent;
	}

	*::-webkit-scrollbar-thumb {
	  background: transparent;
	  border: none;
	}

	* {
	  -ms-overflow-style: none;
	}

	ol, li {
	  list-style: none;
	  margin: 0;
	  padding: 0;
	}

	.carousel {
	  position: relative;
	  padding-top: 63%;
	  filter: drop-shadow(0 0 10px #0003);
	  perspective: 100px;
	}

	.carousel__viewport {
	  position: absolute;
	  top: -16px;
	  right: 0;
	  bottom: 0;
	  left: 0;
	  display: flex;
	  overflow-x: scroll;
	  counter-reset: item;
	  scroll-behavior: smooth;
	  scroll-snap-type: x mandatory;
	}

	.carousel__slide {
	  position: relative;
	  flex: 0 0 100%;
	  width: 100%;
	  background-color: #fff;
	}

	.carousel__slide:nth-child(even) {
	  background-color: #fff;
	}

	.carousel__slide:before {
	  content: '';
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  transform: translate3d(-50%,-40%,70px);
	  color: #fff;
	  font-size: 2em;
	}

	.carousel__snapper {
	  position: absolute;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	  scroll-snap-align: center;
	}

	@media (hover: hover) {
	  .carousel__snapper {
		animation-name: tonext, snap;
		animation-timing-function: ease;
		animation-duration: 4s;
		animation-iteration-count: infinite;
	  }

	  .carousel__slide:last-child .carousel__snapper {
		animation-name: tostart, snap;
	  }
	}

	@media (prefers-reduced-motion: reduce) {
	  .carousel__snapper {
		animation-name: none;
	  }
	}

	.carousel:hover .carousel__snapper,
	.carousel:focus-within .carousel__snapper {
	  animation-name: none;
	}

	.carousel__navigation {
	  position: absolute;
	  right: 0;
	  bottom: 0;
	  left: 0;
	  text-align: center;
	}

	.carousel__navigation-list,
	.carousel__navigation-item {
	  display: inline-block;
	}

	.carousel__navigation-button {
	  display: inline-block;
	  width: 1.5rem;
	  height: 1.5rem;
	  background-color: #333;
	  background-clip: content-box;
	  border: 0.25rem solid transparent;
	  border-radius: 50%;
	  font-size: 0;
	  transition: transform 0.1s;
	}

	.carousel::before,
	.carousel::after,
	.carousel__prev,
	.carousel__next {
	  position: absolute;
	  top: 0;
	  margin-top: 23.5%;
	  width: 2rem;
	  height: 2rem;
	  transform: translateY(-50%);
	  border-radius: 50%;
	  font-size: 0;
	  outline: 0;
	}

	.carousel::before,
	.carousel__prev {
	  left: -1rem;
	}

	.carousel::after,
	.carousel__next {
	  right: -1rem;
	}
/*
	.carousel::before,
	.carousel::after {
	  content: '';
	  z-index: 1;
	  background-color: #333;
	  background-size: 1.5rem 1.5rem;
	  background-repeat: no-repeat;
	  background-position: center center;
	  color: #fff;
	  font-size: 2.5rem;
	  line-height: 4rem;
	  text-align: center;
	  pointer-events: none;
	}

	.carousel::before {
	  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='0,50 80,100 80,0' fill='%23fff'/%3E%3C/svg%3E");
	}

	.carousel::after {
	  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='100,50 20,100 20,0' fill='%23fff'/%3E%3C/svg%3E");
	} */
</style>
    <!--start category menu-->
    <!--End header Area-->
    <div class="container-fluid profile-box mt-2">

        <div class="row flex fit-lg-wrapper">

            <section class="info-column col-md-4">

                <div id="SellerCard-component">

                    <div class="seller-card seller_card-package">

                        <div style="position: absolute; right: 0; height: 20px; left: 0;">
                            <div class="user-online-indicator is-online">
                                <i class="fa fa-circle"></i>online
                            </div>
                        </div>

                        <div class="user-profile-info">
						
						<?php $imge=str_replace("storage/","public/avatars/",auth()->user()->avatar); ?>
                            <div class="user-profile-image">
                                <label class="profile-pict editable" style="width: 150px; height: 150px; font-size: 3em;" for="profile_image">
                                     <input onchange="doAfterSelectImage(this)" type="file" accept="image/png,image/jpeg" class="hidden" id="profile_image" name="avatar" />
                                    <img src="{{ $imge }}" class="profile-img" alt="" />
                                </label>
                            </div>

                            <div class="user-profile-label">
                                <div class="username-line">
                                    <b class="seller-link">{{ auth()->user()->name }}</b>
                                    <p>@ {{ auth()->user()->username }}</p>
                                </div>
                                <div class="oneliner-wrapper" id="oneliner-wrapper">
                                    <small class="oneliner">{{ auth()->user()->bio ?? '' }}</small>
                                    <i class="fa fa-pencil icn-edit"></i>
                                    <div class="bioupdate d-none">
                                        <form action="{{ route('user.update_bio_description', auth()->user()) }}" id="#bioform" method="POST">
                                            @csrf
                                            @method("PATCH")
                                            <input type="text" maxlength="70" class="one-liner" name="bio" placeholder="What's your story in one line?" autocomplete="off" value="{{ auth()->user()->bio ?? '' }}">
                                            <div class="controls">
                                                <button class="fit-button fit-button-color-green fit-button-fill-ghost fit-button-size-small co-green-700 m-r-16" id="cancel">Cancel</button>
                                                <button class="fit-button fit-button-color-green fit-button-fill-full fit-button-size-small co-white bg-co-green-700" type=""submit>Update</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="buttons-wrapper">
                            <a class="fit-button fit-button-color-grey fit-button-fill-ghost fit-button-size-small co-grey-1000
                            btn-view-as" text="seller_card.view_as_buyer"
                               href="{{route('user.public_mode', auth()->user()->username)}}?public_mode=true">
                                Preview Public Mode
                            </a>
                        </div>
                        <div class="user-stats-desc">
                            <ul class="user-stats">
                                <li class="location">From<b>{{ auth()->user()->country }}</b></li>
                                <li class="member-since">Member since
                                    <b>
                                        {{  auth()->user()->created_at }}
                                    </b>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <section id="user-segmentation" class="segmentation js-segmentation">
                    <div data-reactroot="" class="mp-seller-profile">
                        <section class="form-thin">
                            <article>
                                <form action="{{ route('user.update_bio_description', auth()->user()) }}"
                                      method="POST" class="js-form-overview" >
                                    @csrf
                                    @method("PATCH")
                                    <div class="inner-row description">
                                        <aside>
                                            <h3 class="alt hint--top"
                                                data-hint="Tell us more about yourself. Buyers are also interested in learning about
                                                you as a person.">
                                                <!-- react-text: 8 -->Description<!-- /react-text -->
                                                <a class="add" id="editDescription">Edit Description</a>
                                            </h3>
                                        </aside>
                                        <section id="descriptionData">
                                            <p>{{ auth()->user()->description }}</p>
                                        </section>

                                        <section id="descriptionForm" class="d-none">
                                            <div class="form-wrapper">
                                                <textarea maxlength="600"
                                                          minlength="150"
                                                          name="description"
                                                          placeholder="Please tell us about any hobbies, additional expertise, or
                                                          anything else you’d like to add.">{{ auth()->user()->description }}</textarea>
                                                <input type="button" class="btn-lrg-standard btn-white cancel" value="Cancel">
                                                <button type="submit" class="btn-lrg-standard update">Update</button>
                                            </div>

                                        </section>

                                    </div>
                                </form>
                                <form action="{{ route('user.language_store') }}" method="POST" autocomplete="off" class="js-form-proficient-languages">
                                    @csrf
                                    <div class="inner-row languages">
                                        <aside>
                                            <h3 class="alt hint--top" data-hint="You can make up to four selections.">
                                                <!-- react-text: 21 -->Languages<!-- /react-text -->
                                                <a id="langNew" class="add">Add New</a>
                                            </h3>
                                            <div class="question">What languages do you speak?</div>
                                            <!-- react-text: 24 --><!-- /react-text -->
                                        </aside>
                                        <section class="d-none" id="LangForm">
                                            <div class="form-row form-wrapper cf">
                                                <div class="autocomplete-wrap">
                                                    <div style="display: inline-block;" id="language">
                                                        <label for="autocomplete-5"></label>
                                                        <input type="text" placeholder="Add Language"
                                                               class="capitalize" name="lang_name" id="typeahead" role="combobox" value="" >

                                                    </div>
                                                </div>
                                                <select name="lang_level">
                                                    <option value="0" class="hidden">Language Level</option>
                                                    <option value="basic">Basic</option>
                                                    <option value="conversational">Conversational</option>
                                                    <option value="fluent">Fluent</option>
                                                    <option value="native_or_bilingual">Native/Bilingual</option>
                                                </select>
                                                <span class="buttons-wrapper">
                                                    <button type="submit" class="btn-lrg-standard add  incomplete float-right">Add</button>
                                                    <button class="btn-lrg-standard btn-white cancel" id="cancel">Cancel</button>
                                                </span>
                                            </div>
                                        </section>

                                        <section id="langData">
                                            <ul class="items-list">
                                                @foreach(auth()->user()->languages as $language)
                                                <li>
                                                    <span class="title">{{ $language->lang_name }}</span><!-- react-text: 31 --> - <!-- /react-text -->
                                                    <span class="sub-title">{{ strtoupper(str_replace("_or_", "/", $language->lang_level)) }}</span>

                                                    <div class="animate">
                                                        <span class="hint--top delete" data-hint="Delete">
                                                            <a href="{{ route('user.lang_delete', $language->id) }}" class="trash-can">
                                                            </a>
                                                        </span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul><!-- react-empty: 37 -->
                                            <input type="hidden" value="1">
                                        </section>
                                    </div>
                                </form>
                                <form autocomplete="off" class="js-form-social-account">
                                    <div class="inner-row social-account">
                                        <aside>
                                            <h3
                                                class="alt hint--top"
                                                data-hint="Linking to online social networks adds credibility to your profile. You may add more than one. Note: Your personal information will not be displayed to the buyer."
                                            >
                                                Linked Accounts
                                            </h3>
                                            <!-- react-text: 44 --><!-- /react-text -->
                                        </aside>
                                        <section>
                                            <ul>
                                                <li class="facebook js-btn-facebook-connect" data-should-redirect="false" data-platform="facebook"><span>Facebook</span></li>
                                                <li class="google js-btn-google-connect is-selected" data-should-redirect="false" data-platform="google"><span>Google</span></li>
                                                <li class="dribbble js-btn-dribbble-connect" data-should-redirect="false" data-platform="dribbble"><span>Dribbble</span></li>
                                                <li class="stack_exchange js-btn-stackexchange-connect is-selected" data-should-redirect="false" data-platform="stack_exchange"><span>Stack Overflow</span></li>
                                                <li class="behance js-btn-behance-connect" data-should-redirect="false" data-platform="behance"><span>Behance</span></li>
                                                <li class="github js-btn-github-connect" data-should-redirect="false" data-platform="github"><span>GitHub</span></li>
                                                <li class="vimeo js-btn-vimeo-connect" data-should-redirect="false" data-platform="vimeo"><span>Vimeo</span></li>
                                                <li class="twitter js-btn-twitter-connect" data-should-redirect="false" data-platform="twitter"><span>Twitter</span></li>
                                            </ul>
                                        </section>
                                    </div>
                                </form>
                                <form action="{{ route('user.skills_store') }}" method="POST" autocomplete="on" class="js-form-skills">
                                    @csrf
                                    <div class="inner-row skills">
                                        <aside>
                                            <h3 class="alt hint--top" data-hint="Let your buyers know your skills. Skills gained through your previous jobs, hobbies or even everyday life.">
                                                <span>Skills</span>
                                                <a id="skillAdd" class="add">Add New</a>
                                            </h3>
                                        </aside>
                                        <section>
                                            <div id="skillData">
                                                <ul class="items-list">
                                                    @foreach(auth()->user()->skills as $userSkill)
                                                    <li class="skill-bubble link">
                                                        <a href="">
                                                            <h4 class="title">{{ $userSkill->skill->skills_name }}</h4>
                                                        </a>

                                                        <div class="animate">
                                                            <span class="" data-hint="">
                                                                <a href="{{ route('user.skill_delete', $userSkill->id) }}" class="trash-can"></a></span>

                                                        </div>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                            <div class="form-row form-wrapper cf d-none" id="skillform">
                                                <div class="autocomplete-wrap">
                                                    <div style="display: inline-block;">
                                                        <label for="autocomplete-4"></label>
                                                        <select name="skill_id">
                                                            <option value="0" class="hidden">Skills</option>
                                                            @foreach($skills as $skill)
                                                            <option value="{{ $skill->id }}">{{ $skill->skills_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <select name="skills_level">
                                                    <option value="0" class="hidden">Experience Level</option>
                                                    <option value="beginner">Beginner</option>
                                                    <option value="intermediate">Intermediate</option>
                                                    <option value="pro">Expert</option>
                                                </select>
                                                <span class="buttons-wrapper">
                                                    <button type="submit" class="btn-lrg-standard add  incomplete float-right">Add</button>
                                                    <button class="btn-lrg-standard btn-white cancel" id="skillCancel" value="Cancel">Cancel</button>
                                                </span>
                                            </div>

                                        </section>
                                    </div>
                                </form>
                                <form action="{{ route('user.education') }}" method="POST" autocomplete="off" class="js-form-educations">
                                    @csrf
                                    <div class="inner-row education">
                                        <aside>
                                            <h3 class="alt hint--top" data-hint="Describe your educational background. It will help buyers get to know you!">
                                                <!-- react-text: 201 -->Education<!-- /react-text -->
                                                <a id="addEducation" class="add">Add New</a>
                                            </h3>
                                            <div class="question">Did you attend a college or university?</div>
                                            <!-- react-text: 204 --><!-- /react-text -->
                                        </aside>
                                        <section>
                                            @include('user.profile_education_form')
                                        </section>
                                    </div>
                                </form>
{{--                                <form autocomplete="off" class="js-form-certifications">--}}
{{--                                    <div class="inner-row certification">--}}
{{--                                        <aside>--}}
{{--                                            <h3 class="alt hint--top" data-hint="Listing your honors and awards can help you stand out from other sellers.">--}}
{{--                                                <!-- react-text: 235 -->Certification<!-- /react-text -->--}}
{{--                                                <a href="#" class="add">Add New</a>--}}
{{--                                            </h3>--}}
{{--                                            <div class="question">Do you have any certifications?</div>--}}
{{--                                            <!-- react-text: 238 --><!-- /react-text -->--}}
{{--                                        </aside>--}}
{{--                                        <section>--}}
{{--                                            <ul class="items-list">--}}
{{--                                                <li>--}}
{{--                                                    <div>--}}
{{--                                                        <h4 class="title">--}}
{{--                                                            <!-- react-text: 244 -->Android Course<!-- /react-text -->--}}
{{--                                                            <div class="animate">--}}
{{--                                                                <span class="hint--top" data-hint="Edit"><a href="#" class="pencil"></a></span><span class="hint--top delete" data-hint="Delete"><a href="#" class="trash-can"></a></span>--}}
{{--                                                            </div>--}}
{{--                                                        </h4>--}}
{{--                                                        <h5 class="sub-title">--}}
{{--                                                            <!-- react-text: 251 -->Google--}}
{{--                                                            <!-- /react-text --><!-- react-text: 252 -->--}}
{{--                                                            <!-- /react-text --><!-- react-text: 253 -->2015<!-- /react-text -->--}}
{{--                                                        </h5>--}}
{{--                                                        <input type="hidden" name="[seller_profile][certifications][0][certification_name]" value="Android Course" />--}}
{{--                                                        <input type="hidden" name="[seller_profile][certifications][0][received_from]" value="Google " /><input type="hidden" name="[seller_profile][certifications][0][year]" value="2015" />--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                            <!-- react-empty: 257 -->--}}
{{--                                            <input type="hidden" value="1" />--}}
{{--                                        </section>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
                            </article>
                        </section>
                    </div>
                </section>
            </section>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <section class="gigs-column col-md-8">
                <div id="content-seller-gigs">
                    <section class="seller-gigs cf">
                        <ul class="status-filter-bar nav nav-tabs">
                            <li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#active-gigs">ACTIVE GIGS</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#paused-gigs">PAUSED</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#draft-gigs">DRAFT</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="paused-gigs" class="tab-pane">
								<div class="col-md-12">	
								@foreach($puased as $service)
									<div class="col-md-12">	
                                    <div class="gig-card-base seller-gig-card" style="margin-right:10px;margin-bottom:10px;">
                                        <div class="btn-share-container">
                                        </div>
										<style>
										.seller-gig-card .gig-menu<?php echo $service->id; ?> {
											background-color: #fff;
											position: absolute;
											z-index: 10;
											width: 100%;
											height: 100%;
											font-size: 14px;
											opacity: 0;
											visibility: hidden;
											-webkit-transition: opacity .3s ease;
											transition: opacity .3s ease;
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> li {
											cursor:pointer
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> li:last-child {
											position:absolute;
											z-index:10;
											bottom:0;
											width:100%;
											border-top:1px solid #ddd
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a {
											color:#555;
											display:block;
											padding:12px 15px
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a:before {
											font:normal 14px/14px 'FontAwesome';
											display:inline-block;
											width:30px
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a:hover {
											background-color:#f7f7f7
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.preview:before {
											content:'\f06e'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.edit:before {
											content:'\f040'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.pause:before {
											content:'\f04c'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.activate:before {
											content:'\f144'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.statistics:before {
											content:'\f200'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.settings:before {
											content:'\f013'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.delete:before {
											content:'\f1f8'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> .gig-denied {
											background-color:#eee;
											color:#d80000;
											cursor:auto;
											min-height:120px;
											text-align:center;
											padding-top:100px;
											font-weight:700
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?>.visible {
											opacity:1;
											visibility:visible
										}
										.seller-gig-card<?php echo $service->id; ?>.unmounting {
											opacity:0;
											overflow:hidden;
											width:0;
											margin-right:0;
											-webkit-transform:scale(0) translateZ(0);
											transform:scale(0) translateZ(0)
										}
										.seller-gig-card .btn-gig-menu<?php echo $service->id; ?> {
											line-height:100%;
											float:left;
											margin-left:13px;
											margin-top:8px
										}
										.seller-gig-card .btn-gig-menu<?php echo $service->id; ?>:hover svg path {
											fill:#555
										}
										</style>
                                        <ul class="gig-menu<?php echo $service->id; ?>">
                                            <li><a href="{{ route('user.service_details', $service->gig_slug) }}" class="preview" target="_blank">Preview</a></li>
                                            <li><a href="{{ route('user.overview_edit', $service->id) }}" class="edit" target="_blank">Edit</a></li>
											<li><a href="{{ route('user.gigs_paused', $service->id) }}" class="paused" target="_blank"><i class="fa fa-plane" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;Áctivate</a></li>
                                            <li><a href="#" class="statistics" target="_blank">Statistics</a></li>
									  {{--  <li class="#"><a href="#" target="_blank">Update Pricing</a></li>--}}
                                      {{--  <li><a href="#" class="settings">Advanced</a></li>--}}
                                        </ul>
										
                                        <div class="header-gig-card">
                                            <a href="{{ route('user.service_details', $service->gig_slug) }}">
                                                <div>
                                                    @if(!empty($service->galleries->first()->featured_image))
                                                    <figure>                                              
													<?php
													$one = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',1)
															->where('file_number',1)
															->first();
													$two = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',1)
															->where('file_number',2)
															->first();
													$three = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',1)
															->where('file_number',3)
															->first();
													$five = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',3)
															->where('file_number',1)
															->first();
													$six = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',3)
															->where('file_number',2)
															->first();
													?>
													<section class="carousel" aria-label="Gallery">													  
													 <ol class="carousel__viewport">
														@if(!empty($one))
														<li id="carousel__slide1{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<a href="{{ route('user.service_details', $service->gig_slug) }}" style="text-decoration:none;color:black;"><img
                                                            src="{{ asset('/public/service/') }}/{{@$one->featured_image}}"
                                                            alt="{{ $service->title }}"
                                                            ></a>
														  <div class="carousel__snapper">
															<a href="#carousel__slide4{{$service->id}}"
															   class="carousel__prev">Go to last slide</a>
															<a href="#carousel__slide2{{$service->id}}"
															   class="carousel__next">Go to next slide</a>
														  </div>
														</li>
														@endif
														@if(!empty($one))
														<li id="carousel__slide2{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<img
                                                            src="{{ asset('/public/service/') }}/{{@$two->featured_image}}"
                                                            alt="{{ $service->title }}"
                                                            >
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide1{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide3{{$service->id}}"
															 class="carousel__next">Go to next slide</a>
														</li>
														@endif
														@if(!empty($three))
														<li id="carousel__slide3{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<img
                                                            src="{{ asset('/public/service/') }}/{{@$three->featured_image}}"
                                                            alt="{{ $service->title }}"
                                                            >
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide2{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide4{{$service->id}}"
															 class="carousel__next">Go to next slide</a>
														</li>
														@endif
														@if(!empty($five))
														<li id="carousel__slide4{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<iframe id="viewer" src="{{ asset('/public/service/') }}/{{@$five->featured_image}}" frameborder="0" scrolling="no" width="230" height="150" ></iframe>
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide3{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide5{{$service->id}}"
															 class="carousel__next">Go to first slide</a>
														</li>
														@endif
														@if(!empty($six))
														<li id="carousel__slide5{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<iframe id="viewer" src="{{ asset('/public/service/') }}/{{@$six->featured_image}}" frameborder="0" scrolling="no" width="230" height="150" ></iframe>
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide4{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide1{{$service->id}}"
															 class="carousel__next">Go to first slide</a>
														</li>
														@endif
													  </ol>
													</section>
													</figure>
                                                    @else
                                                        <figure class="no-image"></figure>
                                                    @endif
                                                </div>
                                                <h3><a href="{{ route('user.service_details', $service->gig_slug) }}" style="text-decoration:none;color:black;">I will {{ $service->title }}</a></h3>
                                            </a>
                                        </div>
										
										<script>
											function myFunction(value) {
											$('.gig-menu'+value).addClass('visible');			 
											}
										
										</script>
                                        <a href="#" onclick="myFunction(<?php echo $service->id; ?>)" id="btn-gig-menu<?php echo $service->id; ?>" class="btn-gig-menu<?php echo $service->id; ?> hint--top" data-hint="Gig Actions">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="10" viewBox="0 0 42 10">
                                                <path fill="#C6C6C6" d="M5 0c2.8 0 5 2.2 5 5s-2.2 5-5 5-5-2.2-5-5 2.2-5 5-5zm16
                                                0c2.8 0 5 2.2 5 5s-2.2 5-5 5-5-2.2-5-5 2.2-5 5-5zm16 0c2.8 0 5 2.2 5 5s-2.2 5-5
                                                5-5-2.2-5-5 2.2-5 5-5z">
                                                </path>
                                            </svg>
                                        </a>										
                                        <a href="#" class="gig-price">
                                            <small>Starting at</small>
                                            ${{ $service->pricing[0]->price ?? '' }}

                                        </a>
                                    </div>
									</div>
                                @endforeach
                                <a class="gig-card-base add-new-gig" href="{{ route('user.create_gig') }}">Create a new gig</a>
								</div>
                            </div>
							<div id="draft-gigs" class="tab-pane">
								<div class="col-md-12" >	
								@foreach($draft as $key => $service)									
									<div class="col-md-12">									
                                    <div class="gig-card-base seller-gig-card" style="margin-right:10px;margin-bottom:10px;">
                                        <div class="btn-share-container">
                                        </div>
										<style>
										.seller-gig-card .gig-menu<?php echo $service->id; ?> {
											background-color: #fff;
											position: absolute;
											z-index: 10;
											width: 100%;
											height: 100%;
											font-size: 14px;
											opacity: 0;
											visibility: hidden;
											-webkit-transition: opacity .3s ease;
											transition: opacity .3s ease;
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> li {
											cursor:pointer
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> li:last-child {
											position:absolute;
											z-index:10;
											bottom:0;
											width:100%;
											border-top:1px solid #ddd
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a {
											color:#555;
											display:block;
											padding:12px 15px
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a:before {
											font:normal 14px/14px 'FontAwesome';
											display:inline-block;
											width:30px
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a:hover {
											background-color:#f7f7f7
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.preview:before {
											content:'\f06e'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.edit:before {
											content:'\f040'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.pause:before {
											content:'\f04c'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.activate:before {
											content:'\f144'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.statistics:before {
											content:'\f200'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.settings:before {
											content:'\f013'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.delete:before {
											content:'\f1f8'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> .gig-denied {
											background-color:#eee;
											color:#d80000;
											cursor:auto;
											min-height:120px;
											text-align:center;
											padding-top:100px;
											font-weight:700
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?>.visible {
											opacity:1;
											visibility:visible
										}
										.seller-gig-card<?php echo $service->id; ?>.unmounting {
											opacity:0;
											overflow:hidden;
											width:0;
											margin-right:0;
											-webkit-transform:scale(0) translateZ(0);
											transform:scale(0) translateZ(0)
										}
										.seller-gig-card .btn-gig-menu<?php echo $service->id; ?> {
											line-height:100%;
											float:left;
											margin-left:13px;
											margin-top:8px
										}
										.seller-gig-card .btn-gig-menu<?php echo $service->id; ?>:hover svg path {
											fill:#555
										}
										</style>
                                        <ul class="gig-menu<?php echo $service->id; ?>">
                                            <li><a href="{{ route('user.service_details', $service->gig_slug) }}" class="preview" target="_blank">Preview</a></li>
                                            <li><a href="{{ route('user.overview_edit', $service->id) }}" class="edit" target="_blank">Edit</a></li>
											<!--li><a href="{{ route('user.gigs_paused', $service->id) }}" class="paused" target="_blank"><i class="fa fa-plane" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;Áctivate</a></li-->
                                            <li><a href="#" class="statistics" target="_blank">Statistics</a></li>
									  {{--  <li class="#"><a href="#" target="_blank">Update Pricing</a></li>--}}
                                      {{--  <li><a href="#" class="settings">Advanced</a></li>--}}
                                        </ul>
										
                                        <div class="header-gig-card">
                                            <a href="{{ route('user.service_details', $service->gig_slug) }}">
                                                <div>
                                                    @if(!empty($service->galleries->first()->featured_image))
                                                    <figure>                                              
													<?php
													$one = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',1)
															->where('file_number',1)
															->first();
													$two = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',1)
															->where('file_number',2)
															->first();
													$three = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',1)
															->where('file_number',3)
															->first();
													$five = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',3)
															->where('file_number',1)
															->first();
													$six = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',3)
															->where('file_number',2)
															->first();
													?>
													<section class="carousel" aria-label="Gallery">													  
													 <ol class="carousel__viewport">
														@if(!empty($one))
														<li id="carousel__slide1{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<a href="{{ route('user.service_details', $service->gig_slug) }}" style="text-decoration:none;color:black;"><img
                                                            src="{{ asset('/public/service/') }}/{{@$one->featured_image}}"
                                                            alt="{{ $service->title }}"
                                                            ></a>
														  <div class="carousel__snapper">
															<a href="#carousel__slide4{{$service->id}}"
															   class="carousel__prev">Go to last slide</a>
															<a href="#carousel__slide2{{$service->id}}"
															   class="carousel__next">Go to next slide</a>
														  </div>
														</li>
														@endif
														@if(!empty($one))
														<li id="carousel__slide2{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<img
                                                            src="{{ asset('/public/service/') }}/{{@$two->featured_image}}"
                                                            alt="{{ $service->title }}"
                                                            >
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide1{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide3{{$service->id}}"
															 class="carousel__next">Go to next slide</a>
														</li>
														@endif
														@if(!empty($three))
														<li id="carousel__slide3{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<img
                                                            src="{{ asset('/public/service/') }}/{{@$three->featured_image}}"
                                                            alt="{{ $service->title }}"
                                                            >
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide2{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide4{{$service->id}}"
															 class="carousel__next">Go to next slide</a>
														</li>
														@endif
														@if(!empty($five))
														<li id="carousel__slide4{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<iframe id="viewer" src="{{ asset('/public/service/') }}/{{@$five->featured_image}}" frameborder="0" scrolling="no" width="230" height="150" ></iframe>
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide3{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide5{{$service->id}}"
															 class="carousel__next">Go to first slide</a>
														</li>
														@endif
														@if(!empty($six))
														<li id="carousel__slide5{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<iframe id="viewer" src="{{ asset('/public/service/') }}/{{@$six->featured_image}}" frameborder="0" scrolling="no" width="230" height="150" ></iframe>
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide4{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide1{{$service->id}}"
															 class="carousel__next">Go to first slide</a>
														</li>
														@endif
													  </ol>
													</section>
													</figure>
                                                    @else
                                                        <figure class="no-image"></figure>
                                                    @endif
                                                </div>
                                                <h3><a href="{{ route('user.service_details', $service->gig_slug) }}" style="text-decoration:none;color:black;">I will {{ $service->title }}</a></h3>
                                            </a>
                                        </div>
										
										<script>
											function myFunction(value) {
											$('.gig-menu'+value).addClass('visible');			 
											}
										
										</script>
                                        <a href="#" onclick="myFunction(<?php echo $service->id; ?>)" id="btn-gig-menu<?php echo $service->id; ?>" class="btn-gig-menu<?php echo $service->id; ?> hint--top" data-hint="Gig Actions">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="10" viewBox="0 0 42 10">
                                                <path fill="#C6C6C6" d="M5 0c2.8 0 5 2.2 5 5s-2.2 5-5 5-5-2.2-5-5 2.2-5 5-5zm16
                                                0c2.8 0 5 2.2 5 5s-2.2 5-5 5-5-2.2-5-5 2.2-5 5-5zm16 0c2.8 0 5 2.2 5 5s-2.2 5-5
                                                5-5-2.2-5-5 2.2-5 5-5z">
                                                </path>
                                            </svg>
                                        </a>										
                                        <a href="#" class="gig-price">
                                            <small>Starting at</small>
                                            ${{ $service->pricing[0]->price ?? '' }}

                                        </a>
                                    </div>
									</div>
                                @endforeach
                                <a class="gig-card-base add-new-gig" href="{{ route('user.create_gig') }}">Create a new gig</a>
                            </div>
							</div>	
                            <div id="active-gigs" class="tab-pane show active">
							<div class="col-md-12" >
                                @foreach($services as $service)
								<div class="col-md-12" >
                                    <div class="gig-card-base seller-gig-card" style="margin-right:10px;margin-bottom:10px;">
                                        <div class="btn-share-container">
                                        </div>
										<style>
										.seller-gig-card .gig-menu<?php echo $service->id; ?> {
											background-color: #fff;
											position: absolute;
											z-index: 10;
											width: 100%;
											height: 100%;
											font-size: 14px;
											opacity: 0;
											visibility: hidden;
											-webkit-transition: opacity .3s ease;
											transition: opacity .3s ease;
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> li {
											cursor:pointer
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> li:last-child {
											position:absolute;
											z-index:10;
											bottom:0;
											width:100%;
											border-top:1px solid #ddd
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a {
											color:#555;
											display:block;
											padding:12px 15px
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a:before {
											font:normal 14px/14px 'FontAwesome';
											display:inline-block;
											width:30px
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a:hover {
											background-color:#f7f7f7
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.preview:before {
											content:'\f06e'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.edit:before {
											content:'\f040'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.pause:before {
											content:'\f04c'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.activate:before {
											content:'\f144'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.statistics:before {
											content:'\f200'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.settings:before {
											content:'\f013'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> a.delete:before {
											content:'\f1f8'
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?> .gig-denied {
											background-color:#eee;
											color:#d80000;
											cursor:auto;
											min-height:120px;
											text-align:center;
											padding-top:100px;
											font-weight:700
										}
										.seller-gig-card .gig-menu<?php echo $service->id; ?>.visible {
											opacity:1;
											visibility:visible
										}
										.seller-gig-card<?php echo $service->id; ?>.unmounting {
											opacity:0;
											overflow:hidden;
											width:0;
											margin-right:0;
											-webkit-transform:scale(0) translateZ(0);
											transform:scale(0) translateZ(0)
										}
										.seller-gig-card .btn-gig-menu<?php echo $service->id; ?> {
											line-height:100%;
											float:left;
											margin-left:13px;
											margin-top:8px
										}
										.seller-gig-card .btn-gig-menu<?php echo $service->id; ?>:hover svg path {
											fill:#555
										}
										</style>
                                        <ul class="gig-menu<?php echo $service->id; ?>">
                                            <li><a href="{{ route('user.service_details', $service->gig_slug) }}" class="preview" target="_blank">Preview</a></li>
                                            <li><a href="{{ route('user.overview_edit', $service->id) }}" class="edit" target="_blank">Edit</a></li>
											<li><a href="{{ route('user.gigs_paused', $service->id) }}" class="paused" target="_blank"><i class="fa fa-pause" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;&nbsp;Paused</a></li>
                                            <li><a href="#" class="statistics" target="_blank">Statistics</a></li>
									  {{--  <li class="#"><a href="#" target="_blank">Update Pricing</a></li>--}}
                                      {{--  <li><a href="#" class="settings">Advanced</a></li>--}}
                                        </ul>
										
                                        <div class="header-gig-card">
                                            <a href="{{ route('user.service_details', $service->gig_slug) }}">
                                                <div>
                                                    @if(!empty($service->galleries->first()->featured_image))
                                                    <figure>                                              
													<?php
													$one = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',1)
															->where('file_number',1)
															->first();
													$two = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',1)
															->where('file_number',2)
															->first();
													$three = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',1)
															->where('file_number',3)
															->first();
													$five = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',3)
															->where('file_number',1)
															->first();
													$six = DB::table('service_galleries')
															->where('service_id',$service->id)
															->where('file_type',3)
															->where('file_number',2)
															->first();
													?>
													<section class="carousel" aria-label="Gallery">													  
													 <ol class="carousel__viewport">
														@if(!empty($one))
														<li id="carousel__slide1{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<a href="{{ route('user.service_details', $service->gig_slug) }}" style="text-decoration:none;color:black;"><img
                                                            src="{{ asset('/public/service/') }}/{{@$one->featured_image}}"
                                                            alt="{{ $service->title }}"
                                                            ></a>
														  <div class="carousel__snapper">
															<a href="#carousel__slide4{{$service->id}}"
															   class="carousel__prev">Go to last slide</a>
															<a href="#carousel__slide2{{$service->id}}"
															   class="carousel__next">Go to next slide</a>
														  </div>
														</li>
														@endif
														@if(!empty($one))
														<li id="carousel__slide2{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<img
                                                            src="{{ asset('/public/service/') }}/{{@$two->featured_image}}"
                                                            alt="{{ $service->title }}"
                                                            >
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide1{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide3{{$service->id}}"
															 class="carousel__next">Go to next slide</a>
														</li>
														@endif
														@if(!empty($three))
														<li id="carousel__slide3{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<img
                                                            src="{{ asset('/public/service/') }}/{{@$three->featured_image}}"
                                                            alt="{{ $service->title }}"
                                                            >
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide2{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide4{{$service->id}}"
															 class="carousel__next">Go to next slide</a>
														</li>
														@endif
														@if(!empty($five))
														<li id="carousel__slide4{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<iframe id="viewer" src="{{ asset('/public/service/') }}/{{@$five->featured_image}}" frameborder="0" scrolling="no" width="230" height="150" ></iframe>
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide3{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide5{{$service->id}}"
															 class="carousel__next">Go to first slide</a>
														</li>
														@endif
														@if(!empty($six))
														<li id="carousel__slide5{{$service->id}}"
															tabindex="0"
															class="carousel__slide">
															<iframe id="viewer" src="{{ asset('/public/service/') }}/{{@$six->featured_image}}" frameborder="0" scrolling="no" width="230" height="150" ></iframe>
														  <div class="carousel__snapper"></div>
														  <a href="#carousel__slide4{{$service->id}}"
															 class="carousel__prev">Go to previous slide</a>
														  <a href="#carousel__slide1{{$service->id}}"
															 class="carousel__next">Go to first slide</a>
														</li>
														@endif
													  </ol>
													</section>
													</figure>
                                                    @else
                                                        <figure class="no-image"></figure>
                                                    @endif
                                                </div>
                                                <h3><a href="{{ route('user.service_details', $service->gig_slug) }}" style="text-decoration:none;color:black;">I will {{ $service->title }}</a></h3>
                                            </a>
                                        </div>
										
										<script>
											function myFunction(value) {
											$('.gig-menu'+value).addClass('visible');			 
											}
											/*var simple = '<?php echo $service->id; ?>';
											$('.btn-gig-menu1').click(function() {
											
												$('.gig-menu1').addClass('visible');
											});

											$('.gig-menu1').on('focusout', function () {
												 
												$('.gig-menu1').removeClass('visible');
											}); */
										</script>
                                        <a href="#" onclick="myFunction(<?php echo $service->id; ?>)" id="btn-gig-menu<?php echo $service->id; ?>" class="btn-gig-menu<?php echo $service->id; ?> hint--top" data-hint="Gig Actions">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="10" viewBox="0 0 42 10">
                                                <path fill="#C6C6C6" d="M5 0c2.8 0 5 2.2 5 5s-2.2 5-5 5-5-2.2-5-5 2.2-5 5-5zm16
                                                0c2.8 0 5 2.2 5 5s-2.2 5-5 5-5-2.2-5-5 2.2-5 5-5zm16 0c2.8 0 5 2.2 5 5s-2.2 5-5
                                                5-5-2.2-5-5 2.2-5 5-5z">
                                                </path>
                                            </svg>
                                        </a>										
                                        <a href="#" class="gig-price">
                                            <small>Starting at</small>
                                            ${{ $service->pricing[0]->price ?? '' }}

                                        </a>
                                    </div>
									</div>
                                @endforeach
								
                                <a class="gig-card-base add-new-gig" href="{{ route('user.create_gig') }}">Create a new gig</a>
								</div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
	
@endsection

@section('scripts')

    <script src="{{ asset('js/profile_scripts.js') }}"></script>

    <script>
        function doAfterSelectImage(input){
            readURL(input);
            uploadUserProfileImage(input);
        }

        function readURL(input) {

            if (input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('.profile-img').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function uploadUserProfileImage(input){
	
            var property = input.files[0];

            var formData = new FormData();
            formData.append('file', property);
			
            $.ajax({
                method: 'PUT',
                data: formData,
                url: '{{ route('user.avatar_update') }}',
                contentType: false,
                cache: false,
                processData: false,

            })
        }

    </script>
@endsection
