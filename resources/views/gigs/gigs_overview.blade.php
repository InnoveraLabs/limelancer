@extends('layouts.master')
@section('main_content')


    <!--End header Area-->
    <div class="container-fluid cr-gig-box">

        @include('gigs.tabs')

        <section class="create-gig-box container mb-5">

            <div class="row"><!--- row Starts --->
                <div class="col-md-10">
                    <div class="tab-content card card-body"><!--- tab-content Starts --->

                        <div class="tab-pane fade show active" id="overview">
                            <div class="form-field-wrapper">
                                <form action="{{ route('user.store_gig') }}" method="POST" class="proposal-form">
                                    @csrf

                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
			
                                    <div class="form-group row"><!--- form-group row Starts --->
                                        <div class="col-md-3 form-titles">Gig Title</div>
                                        <div class="col-md-9">

                                            <div class="gig-title-area-wrapper">
                                                <span class="gig-title-prefix" style="transform: translateY(0px);">I will</span>
                                                <textarea name="title" maxlength="80" rows="2" placeholder="do something I'm really good at" class="form-control gig-title-area">{{ old('title', $service->title ?? null) }}</textarea>
                                            </div>
                                            <div class="title-footer">

                                                @error('title')

                                                    <small id="title-error" class="text-danger float-left" >
                                                        {{ $message }}
                                                    </small>

                                                @enderror

                                                <span class="small-mssg"><em id="chars">0</em> / 80 max</span>
                                            </div>
                                        </div>
                                    </div><!--- form-group row Ends --->

                                    <div class="form-group row"><!--- form-group row Starts --->
                                        <div class="col-md-3 form-titles"> Category </div>
                                        <div class="col-md-9">
                                            <div class="custom-select-wrapper">
                                                <label class="select">
                                                    <select name="category_id" id="category" class="form-control gig-cat-select mb-3">

                                                        <option value="" class="hidden text-uppercase"> Select A Category </option>

                                                        @foreach($categories as $category)
                                                            <option {{old('category_id', $service->category_id) == $category->id ? 'selected' : ""}} value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('category_id')
                                                    <small id="title-error" class="text-danger float-left" >
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </label>
												<?php 
												$sub_cat = DB::table('sub_categories')
															->get();
												?>
												<input type="hidden" name="sub_category_id" value="{{ $service->sub_category_id }}">
                                                <label class="select">
                                                    <select name="sub_category_id" id="sub_category" class="form-control gig-cat-select mb-3" disabled>
                                                        <option value="" class="" >Please Select a Category </option>
														 @foreach($sub_cat as $category)
                                                            <option {{old('sub_category_id', $service->sub_category_id) == $category->id ? 'selected' : ""}} value="{{ $category->id }}">{{ $category->sub_c_name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('sub_category_id')
                                                    <small id="title-error" class="text-danger float-right" >
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </label>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row"><!--- form-group row Starts --->
                                        <div class="col-md-3 form-titles">Search Tags</div>
                                        <div class="col-md-9">
                                            <input type="text" name="tags" class="form-control mb-3" data-role="tagsinput" value="&nbsp;&nbsp;{{ $service->tags }}">
                                            @error('tags')
                                            <small id="title-error" class="text-danger float-left" >
                                                {{ $message }}
                                            </small>
                                            @enderror
                                            <span class="small-mssg">5 tags maximum. Use letters and numbers only.</span>
                                        </div>
                                    </div><!--- form-group row Ends --->
                                    <div class="form-group row"><!--- form-group row Starts --->
                                        <div class="col-md-3"></div>
                                        <div class="col-md-9 general-note">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                                            <b class="please-note">Please note:</b>
                                            Some categories require that sellers verify their skills.

                                        </div>
                                    </div><!--- form-group row Ends --->
                                    <div class="form-group gig-btn-group"><!--- form-group Starts --->
                                        <a href="{{ route('user.profile')}}" class="lime-btn lime-btn-secondary">Cancel</a>
                                        <button class="lime-btn learn_btn" type="submit" >Save &amp; Continue</button>
                                    </div>

                                </form><!--- form Ends -->
                            </div>



                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>

@endsection


@section('scripts')
    <script type="text/javascript" src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
    <script >

        //on category change show sub category names
        $('#category').change(function (){
            var sub_id = $(this).val();
            $.ajax({
                url: "{{ route('admin.subcategory.get_by_category') }}?category_id=" + sub_id,
                method: 'GET',
                success: function(data) {
                    $('#sub_category').removeAttr('disabled');
                    $('#sub_category').html(data.html);
                }
            });
        });

        $('textarea').keyup(function() {
            var textlen = $(this).val().length;
            $('#chars').text(textlen);
        });

        $('.course-id-empty').click(function()
        {
            alert("Fill course info to proceed");
        });


    </script>

@endsection

