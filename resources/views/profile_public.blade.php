@extends('layouts.master')
@section('main_content')
<!--start category menu-->
        @include('partials.catmenu')
        <!--End header Area-->
<div class="container-fluid profile-box mt-2">
   <div class="row flex">
      <section class="info-column col-md-4">
         <div id="SellerCard-component">
            <div class="seller-card seller_card-package">
               <div style="position:absolute;right:0;height:20px;left:0">
                  <div class="user-online-indicator is-online"><i class="fa fa-circle"></i>online</div>
               </div>
               <div class="user-profile-info">
                     <div class="user-profile-image">
                        <label class="profile-pict editable" style="width:150px;height:150px;font-size:3em" for="profile_image">
{{--                        <input type="file" accept="image/png,image/jpeg" class="hidden" id="profile_image" name="profile[image]">--}}
                        <img src="{{auth()->user()->avatar}}" class="profile-img" alt=""></label>
                     </div>
                  <div class="user-profile-label">
                     <div class="username-line">
                        <b class="seller-link">{{ auth()->user()->username }}</b>
                     </div>
                     <div class="oneliner-wrapper">
                        <small class="oneliner">{{ auth()->user()->bio ?? '' }}</small>
                     </div>
                  </div>
               </div>
              <div class="report-user-package"><a href="#" class="btn report-btn"><i class="fa fa-flag"></i>&nbsp;Report</a></div>
               <div class="user-stats-desc">
                  <ul class="user-stats">
                     <li class="location">From<b>Bangladesh</b></li>
                     <li class="member-since">Member since<b>{{  \Carbon\Carbon::parse(auth()->user()->created_at)->toFormattedDateString() }}</b></li>
                  </ul>
               </div>
            </div>
         </div>
         <section id="user-segmentation" class="segmentation js-segmentation">
            <div data-reactroot="" class="mp-seller-profile">
               <section class="form-thin">
                  <article>
                     <form autocomplete="off" class="js-form-overview">
                        <div class="inner-row description">
                           <aside>
                              <h3 class="alt hint--top" data-hint="Tell us more about yourself. Buyers are also interested in learning about you as a person.">
                                 <!-- react-text: 8 -->Description<!-- /react-text -->

                              </h3>
                           </aside>
                           <section>
                               {{ auth()->user()->description }}
                               <span class="counter hidden">
                                 {{ strlen(auth()->user()->description) }}
                              </span>
                           </section>
                           <!-- react-text: 16 --><!-- /react-text -->
                        </div>
                     </form>
                     <form autocomplete="off" class="js-form-proficient-languages">
                        <div class="inner-row languages">
                           <aside>
                              <h3 class="alt hint--top" data-hint="You can make up to four selections.">
                                 <!-- react-text: 21 -->Languages<!-- /react-text -->
                              </h3>
                              <div class="question">What languages do you speak?</div>
                              <!-- react-text: 24 --><!-- /react-text -->
                           </aside>
                           <section>
                              <ul class="items-list">
                                 <li>
                                    <span class="title">
                                       <!-- react-text: 29 -->English<!-- /react-text --><!-- react-text: 30 --> <!-- /react-text -->
                                    </span>
                                    <!-- react-text: 31 --> - <!-- /react-text --><span class="sub-title">Fluent</span><input type="hidden" name="[seller_profile][proficient_languages][en]" value="fluent">
                                    <div class="animate"><span class="hint--top" data-hint="Edit"><a href="#" class="pencil"></a></span></div>
                                 </li>
                              </ul>
                              <!-- react-empty: 37 --><input type="hidden" value="1">
                           </section>
                        </div>
                     </form>
                     <div class="js-seller-tests"></div>
                     <form autocomplete="off" class="js-form-social-account">
                        <div class="inner-row social-account">
                           <aside>
                              <h3 class="alt hint--top" data-hint="Linking to online social networks adds credibility to your profile. You may add more than one. Note: Your personal information will not be displayed to the buyer.">Linked Accounts</h3>
                              <!-- react-text: 44 --><!-- /react-text -->
                           </aside>
                           <section>
                              <ul>
                                 <li class="facebook js-btn-facebook-connect " data-should-redirect="false" data-platform="facebook"><span>Facebook</span></li>
                                 <li class="google js-btn-google-connect  is-selected " data-should-redirect="false" data-platform="google"><span>Google</span></li>
                                 <li class="dribbble js-btn-dribbble-connect " data-should-redirect="false" data-platform="dribbble"><span>Dribbble</span></li>
                                 <li class="stack_exchange js-btn-stackexchange-connect  is-selected " data-should-redirect="false" data-platform="stack_exchange"><span>Stack Overflow</span></li>
                                 <li class="behance js-btn-behance-connect " data-should-redirect="false" data-platform="behance"><span>Behance</span></li>
                                 <li class="github js-btn-github-connect " data-should-redirect="false" data-platform="github"><span>GitHub</span></li>
                                 <li class="vimeo js-btn-vimeo-connect " data-should-redirect="false" data-platform="vimeo"><span>Vimeo</span>
                                 </li>
                                 <li class="twitter js-btn-twitter-connect " data-should-redirect="false" data-platform="twitter"><span>Twitter</span></li>
                              </ul>
                           </section>
                        </div>
                     </form>
                     <form autocomplete="off" class="js-form-skills">
                        <div class="inner-row skills">
                           <aside>
                              <h3 class="alt hint--top" data-hint="Let your buyers know your skills. Skills gained through your previous jobs, hobbies or even everyday life."><span>Skills</span>

                              </h3>
                           </aside>
                           <section>
                              <div>
                                 <ul class="items-list">
                                    <li class="skill-bubble link">
                                       <a href="/hire/javascript">
                                          <h4 class="title">javascript</h4>
                                       </a>
                                       <input type="hidden" name="[seller_profile][skills][0][level]" value="pro">
                                       <input type="hidden" name="[seller_profile][skills][0][name]" value="javascript">
                                       <input type="hidden" name="[seller_profile][skills][0][status]" value="active">
                                       <input type="hidden" name="[seller_profile][skills][0][_id]" value="de9b9ed78d7e2e1dceeffee780e2f919">
                                       <div class="animate"><span class="" data-hint=""><a href="#" class="pencil"></a></span>
                                          <span class="delete" data-hint=""><a href="#" class="trash-can"></a></span>
                                       </div>
                                    </li>
                                    <li class="skill-bubble link">
                                       <a href="/hire/html5">
                                          <h4 class="title">html5</h4>
                                       </a>
                                       <input type="hidden" name="[seller_profile][skills][1][level]" value="pro"><input type="hidden" name="[seller_profile][skills][1][name]" value="html5"><input type="hidden" name="[seller_profile][skills][1][status]" value="active"><input type="hidden" name="[seller_profile][skills][1][_id]" value="65e232ed43477b2f5cb4413023548fce">
                                       <div class="animate"><span class="" data-hint=""><a href="#" class="pencil"></a></span><span class="delete" data-hint=""><a href="#" class="trash-can"></a></span></div>
                                    </li>
                                    <li class="skill-bubble link">
                                       <a href="/hire/bootstrap">
                                          <h4 class="title">bootstrap</h4>
                                       </a>
                                       <input type="hidden" name="[seller_profile][skills][2][level]" value="pro"><input type="hidden" name="[seller_profile][skills][2][name]" value="bootstrap"><input type="hidden" name="[seller_profile][skills][2][status]" value="active"><input type="hidden" name="[seller_profile][skills][2][_id]" value="ca4c50b905dc21ea17a10549a6f5944f">
                                       <div class="animate"><span class="" data-hint=""><a href="#" class="pencil"></a></span><span class="delete" data-hint=""><a href="#" class="trash-can"></a></span></div>
                                    </li>
                                    <li class="skill-bubble link">
                                       <a href="/hire/php">
                                          <h4 class="title">php</h4>
                                       </a>
                                       <input type="hidden" name="[seller_profile][skills][3][level]" value="pro"><input type="hidden" name="[seller_profile][skills][3][name]" value="php"><input type="hidden" name="[seller_profile][skills][3][status]" value="active"><input type="hidden" name="[seller_profile][skills][3][_id]" value="e1bfd762321e409cee4ac0b6e841963c">
                                       <div class="animate"><span class="" data-hint=""><a href="#" class="pencil"></a></span><span class="delete" data-hint=""><a href="#" class="trash-can"></a></span></div>
                                    </li>
                                    <li class="skill-bubble link">
                                       <a href="/hire/wordpess">
                                          <h4 class="title">wordpess</h4>
                                       </a>
                                       <input type="hidden" name="[seller_profile][skills][4][level]" value="pro"><input type="hidden" name="[seller_profile][skills][4][name]" value="wordpess"><input type="hidden" name="[seller_profile][skills][4][status]" value="active"><input type="hidden" name="[seller_profile][skills][4][_id]" value="52adb7e8c8bf3a974bcfc6e4cf25819c">
                                       <div class="animate"><span class="" data-hint=""><a href="#" class="pencil"></a></span><span class="delete" data-hint=""><a href="#" class="trash-can"></a></span></div>
                                    </li>
                                    <li class="skill-bubble link">
                                       <a href="/hire/java">
                                          <h4 class="title">java programming</h4>
                                       </a>
                                       <input type="hidden" name="[seller_profile][skills][5][level]" value="intermediate"><input type="hidden" name="[seller_profile][skills][5][name]" value="java programming"><input type="hidden" name="[seller_profile][skills][5][status]" value="active"><input type="hidden" name="[seller_profile][skills][5][_id]" value="5c7f873315e16a979d64624fcd19231b">
                                       <div class="animate"><span class="" data-hint=""><a href="#" class="pencil"></a></span><span class="delete" data-hint=""><a href="#" class="trash-can"></a></span></div>
                                    </li>
                                    <li class="skill-bubble link">
                                       <a href="/hire/android">
                                          <h4 class="title">android</h4>
                                       </a>
                                       <input type="hidden" name="[seller_profile][skills][6][level]" value="intermediate"><input type="hidden" name="[seller_profile][skills][6][name]" value="android"><input type="hidden" name="[seller_profile][skills][6][status]" value="active"><input type="hidden" name="[seller_profile][skills][6][_id]" value="c31b32364ce19ca8fcd150a417ecce58">
                                       <div class="animate"><span class="" data-hint=""><a href="#" class="pencil"></a></span><span class="delete" data-hint=""><a href="#" class="trash-can"></a></span></div>
                                    </li>
                                    <li class="skill-bubble link">
                                       <a href="/hire/python">
                                          <h4 class="title">python</h4>
                                       </a>
                                       <input type="hidden" name="[seller_profile][skills][7][level]" value="intermediate"><input type="hidden" name="[seller_profile][skills][7][name]" value="python"><input type="hidden" name="[seller_profile][skills][7][status]" value="active"><input type="hidden" name="[seller_profile][skills][7][_id]" value="23eeeb4347bdd26bfc6b7ee9a3b755dd">
                                       <div class="animate"><span class="" data-hint=""><a href="#" class="pencil"></a></span><span class="delete" data-hint=""><a href="#" class="trash-can"></a></span></div>
                                    </li>
                                    <li class="skill-bubble link">
                                       <a href="/hire/adobe-photoshop">
                                          <h4 class="title">adobephotoshop</h4>
                                       </a>
                                       <input type="hidden" name="[seller_profile][skills][8][level]" value="intermediate"><input type="hidden" name="[seller_profile][skills][8][name]" value="adobephotoshop"><input type="hidden" name="[seller_profile][skills][8][status]" value="active"><input type="hidden" name="[seller_profile][skills][8][_id]" value="3c7f2860c6893e8846d216ac7ff3bd82">
                                       <div class="animate"><span class="" data-hint=""><a href="#" class="pencil"></a></span><span class="delete" data-hint=""><a href="#" class="trash-can"></a></span></div>
                                    </li>
                                    <li class="skill-bubble link">
                                       <a href="/hire/web-development">
                                          <h4 class="title">webdevelopment</h4>
                                       </a>
                                       <input type="hidden" name="[seller_profile][skills][9][level]" value="pro"><input type="hidden" name="[seller_profile][skills][9][name]" value="webdevelopment"><input type="hidden" name="[seller_profile][skills][9][status]" value="active"><input type="hidden" name="[seller_profile][skills][9][_id]" value="57d486a14d435013964f8a5a6206b13b">
                                       <div class="animate"><span class="" data-hint=""><a href="#" class="pencil"></a></span><span class="delete" data-hint=""><a href="#" class="trash-can"></a></span></div>
                                    </li>
                                 </ul>
                              </div>
                              <!-- react-empty: 194 -->
                              <div class="recommendation-wrapper">
                                 <span class="m-r-5">
                                    <!-- react-text: 261 -->Suggestions<!-- /react-text --><!-- react-text: 262 -->:<!-- /react-text -->
                                 </span>
                                 <ul>
                                    <li class="skill-bubble">css3</li>
                                    <li class="skill-bubble">web development</li>
                                    <li class="skill-bubble">wordpress</li>
                                    <li class="skill-bubble">jquery</li>
                                 </ul>
                              </div>
                              <input type="hidden" value="10">
                           </section>
                        </div>
                     </form>
                     <form autocomplete="off" class="js-form-educations">
                        <div class="inner-row education">
                           <aside>
                              <h3 class="alt hint--top" data-hint="Describe your educational background. It will help buyers get to know you!">
                                 <!-- react-text: 201 -->Education<!-- /react-text -->
                              </h3>
                              <div class="question">Did you attend a college or university?</div>
                              <!-- react-text: 204 --><!-- /react-text -->
                           </aside>
                           <section>
                              <ul class="items-list">
                                 <li>
                                    <h4 class="title">
                                       <!-- react-text: 209 -->B.Sc.<!-- /react-text --><!-- react-text: 210 --> - <!-- /react-text --><!-- react-text: 211 -->computer engineering<!-- /react-text -->
                                    </h4>
                                    <div class="animate"><span class="hint--top" data-hint="Edit"><a href="#" class="pencil"></a></span><span class="hint--top delete" data-hint="Delete"><a href="#" class="trash-can"></a></span></div>
                                    <h5 class="sub-title">
                                       <!-- react-text: 218 -->American International University-Bangladesh<!-- /react-text --><!-- react-text: 219 -->, <!-- /react-text --><!-- react-text: 220 -->Bangladesh<!-- /react-text --><!-- react-text: 221 -->, <!-- /react-text --><!-- react-text: 222 -->Graduated 2017<!-- /react-text -->
                                    </h5>
                                    <input type="hidden" name="[seller_profile][educations][0][degree]" value="computer engineering"><input type="hidden" name="[seller_profile][educations][0][to_year]" value="2017"><input type="hidden" name="[seller_profile][educations][0][degree_title]" value="bsc"><input type="hidden" name="[seller_profile][educations][0][country_code]" value="bd"><input type="hidden" name="[seller_profile][educations][0][school]" value="American International University-Bangladesh"><input type="hidden" name="[seller_profile][educations][0][degree_status]" value="active">
                                 </li>
                              </ul>
                              <!-- react-empty: 229 --><input type="hidden" value="1">
                           </section>
                        </div>
                     </form>
                     <form autocomplete="off" class="js-form-certifications">
                        <div class="inner-row certification">
                           <aside>
                              <h3 class="alt hint--top" data-hint="Listing your honors and awards can help you stand out from other sellers.">
                                 <!-- react-text: 235 -->Certification<!-- /react-text -->
                              </h3>
                              <div class="question">Do you have any certifications?</div>
                              <!-- react-text: 238 --><!-- /react-text -->
                           </aside>
                           <section>
                              <ul class="items-list">
                                 <li>
                                    <div>
                                       <h4 class="title">
                                          <!-- react-text: 244 -->Android Course<!-- /react-text -->
                                          <div class="animate"><span class="hint--top" data-hint="Edit"><a href="#" class="pencil"></a></span><span class="hint--top delete" data-hint="Delete"><a href="#" class="trash-can"></a></span></div>
                                       </h4>
                                       <h5 class="sub-title">
                                          <!-- react-text: 251 -->Google <!-- /react-text --><!-- react-text: 252 --> <!-- /react-text --><!-- react-text: 253 -->2015<!-- /react-text -->
                                       </h5>
                                       <input type="hidden" name="[seller_profile][certifications][0][certification_name]" value="Android Course"><input type="hidden" name="[seller_profile][certifications][0][received_from]" value="Google "><input type="hidden" name="[seller_profile][certifications][0][year]" value="2015">
                                    </div>
                                 </li>
                              </ul>
                              <!-- react-empty: 257 --><input type="hidden" value="1">
                           </section>
                        </div>
                     </form>
                  </article>
               </section>
            </div>
         </section>
      </section>

   </div>
</div>
@endsection

