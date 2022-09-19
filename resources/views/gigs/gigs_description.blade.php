@extends('layouts.master')

@section('main_content')


    <!--End header Area-->
    <div class="container-fluid cr-gig-box">

        @include('gigs.tabs')

        <section class="container mt-5 mb-5">

            <div class="row"><!--- row Starts --->
                <div class="col-md-10 offset-md-1">
                    <div class="tab-content card card-body"><!--- tab-content Starts --->
                        <div class="tab-pane active">
                            <h5 class="font-weight-normal">Description</h5>
                            <hr>
                            <p class="small mb-2"> Project Details </p>
							 
							<?php 
							$sub_cat = DB::table('service_descriptions')
									   ->where('service_id',$service->id )	
									   ->first();
									   //echo $sub_cat->description;
							?>
                            <form action="{{ route('user.description_store') }}" method="POST" class="proposal-form"><!--- form Starts -->
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <div class="form-group">
                                    <textarea rows="7" id="description" name="description" placeholder="Write your description" class="form-control" >
                                    {{ old('description', $sub_cat->description ?? null) }}
                                    </textarea>

                                    @error('description')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            <div class="form-group mb-0"><!--- form-group Starts --->
                                <a href="#" class="lime-btn lime-btn-secondary float-left backButton">Back</a>
                                <button class="lime learn_btn float-right" type="submit">Save &amp; Continue</button>
                            </div><!--- form-group Starts --->

                            </form><!--- form Ends -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace( 'description');
    </script>

@endsection


