<!-- start footer ==============================
        ============================== -->
<footer>
    <div class="footer">
        <div class="main-container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="element-footer">
                        <h2> {{ __('models.about_company') }} </h2>
                        <ul>
                            <li><a href="{{ route('site.about') }}"> {{ __('models.about_us') }} </a></li>
                            <li><a href="{{ route('site.solutions') }}"> {{ __('models.solutions') }} </a></li>
                            <li><a href="{{ route('site.partners') }}"> {{ __('models.partners') }} </a></li>
                            <li><a href="{{ route('site.clients') }}"> {{ __('models.clients') }} </a></li>
                            <li><a href="{{ route('site.jobs.index') }}">{{ __('models.jobs') }}</a></li>
                            <li><a href="{{ route('site.internships.index') }}">{{ __('models.internships') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="element-footer">
                        <h2>تواصل معنا</h2>
                        <ul>
                            <li><a> <i class="bi bi-geo-alt"></i> {{ getSetting('address') }} </a></li>
                            <li><a href="tel:{{ getSetting('phone_1') }}"> <i class="bi bi-telephone"></i>
                                    {{ getSetting('phone_1') }} </a></li>
                            <li><a href="tel:{{ getSetting('phone_2') }}"> <i class="bi bi-telephone"></i>
                                    {{ getSetting('phone_2') }} </a></li>
                            <li><a href="https://wa.me/{{ getSetting('whatsapp') }}"> <i class="bi bi-whatsapp"></i>
                                    {{ getSetting('whatsapp') }} </a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-lg-4">
                    @include('site.includes.mailList')
                </div>
            </div>



            <div class="end-page">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="logo-footer">
                            <a href="index.html">
                                <img src="images/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <p>
                            {{ __('models.all_rights') . ' ' . date('Y') . ' ' . __('models.reserved_to') . ' ' . 'New Cairo' }}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="meida-footer">
                            <ul>
                                <li><a href="{{ getSetting('instagram') }}"> <i class="bi bi-instagram"></i></a></li>
                                <li><a href="{{ getSetting('twitter') }}"> <i class="bi bi-twitter"></i></a></li>
                                <li><a href="{{ getSetting('facebook') }}"> <i class="bi bi-facebook"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>








        </div>
    </div>

</footer>
<!-- end footer=========================
        ===========================  -->






</div>





<div class="media-icons">
    <div class="click-media-icons">
        <i class="bi bi-share"></i>
    </div>
    <ul>
        <li><a href="{{ getSetting('instagram') }}"> <i class="bi bi-instagram"></i></a></li>
        <li><a href="{{ getSetting('twitter') }}"> <i class="bi bi-twitter"></i></a></li>
        <li><a href="{{ getSetting('facebook') }}"> <i class="bi bi-facebook"></i> </a></li>
    </ul>
</div>












<!-- start menu responsive ===
        ======== -->
<div class="bg_menu ">
</div>
<div class="menu_responsive" id="menu-div">

    <div class="element_menu_responsive">
        <ul>

            <li>
                <a href="{{ route('site.home') }}" class="{{ isActiveRoute('site.home') }}">
                    {{ __('models.home') }}
                </a>
            </li>
            <li>
                <a href="{{ route('site.about') }}" class="{{ isActiveRoute('site.about') }}">
                    {{ __('models.about_us') }}
                </a>
            </li>
            <li>
                <a href="{{ route('site.solutions') }}" class="{{ isActiveRoute('site.solutions') }}">
                    {{ __('models.solutions') }}
                </a>
            </li>
            <li>
                <a href="{{ route('site.sectors') }}" class="{{ isActiveRoute('site.sectors') }}">
                    {{ __('models.sectors') }}
                </a>
            </li>
            <li>
                <a href="{{ route('site.partners') }}" class="{{ isActiveRoute('site.partners') }}">
                    {{ __('models.partners') }}
                </a>
            </li>
            <li>
                <a href="{{ route('site.clients') }}" class="{{ isActiveRoute('site.clients') }}">
                    {{ __('models.clients') }}
                </a>
            </li>
            <li>
                <a href="{{ route('site.jobs.index') }}"
                    class="{{ areActiveRoutes(['site.jobs.index', 'site.jobs.show', 'site.jobs.apply']) }}">
                    {{ __('models.jobs') }}
                </a>
            </li>
            <li>
                <a href="{{ route('site.news.index') }}"
                    class="{{ areActiveRoutes(['site.news.index', 'site.news.show', 'site.news.filter']) }}">
                    {{ __('models.news') }}
                </a>
            </li>
            <li>
                <a href="{{ route('site.contact') }}" class="{{ isActiveRoute('site.contact') }}">
                    {{ __('models.contact_us') }}
                </a>
            </li>

            <li>
                <a class="click-dropdown-mune" href=""> {{ __('models.lang') }}</a>
                <div class="dropdowm-language-mune">
                    <ul>
                        <li><a href="{{ route('language', 'ar') }}">عربي</a> </li>
                        <li><a href="{{ route('language', 'en') }}"> English</a> </li>
                    </ul>
                </div>

            </li>
        </ul>
    </div>


    <div class="remove-mune">
        <span></span>
    </div>




</div>

<!-- end menu responsive ===
        ======== -->

</div>

@include('site.layouts.script')



</body>
<!-- end-body
=================== -->

</html>
