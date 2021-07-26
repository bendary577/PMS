<div class="contacts my-5" id="contacts">
    <div class="title_div text-center my-5"><h3>{{__('lang.contact.title')}}</h3></div>
    <div class="form4 top">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-offset-2">
                    <div class="form-bg">
                        <form class="form">
                            <div class="form-group"> <label class="sr-only">{{__('lang.contact.name')}}</label> <input type="text" class="form-control" required="" id="nameNine" placeholder="{{ __('lang.contact.name')}}"> </div>
                            <div class="form-group"> <label class="sr-only">{{__('lang.contact.email')}}</label> <input type="email" class="form-control" required="" id="emailNine" placeholder="{{ __('lang.contact.email')}}"> </div>
                            <div class="form-group"> <label class="sr-only">{{__('lang.contact.message')}}</label> <textarea class="form-control" required="" rows="7" id="messageNine" placeholder="{{ __('lang.contact.message')}}"></textarea> </div> <button type="submit" class="btn btn-primary text-center">{{ __('lang.contact.send')}}</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-10">
                    <div class="title_div text-center my-5"><h3>{{__('lang.contact.social_media')}}</h3></div>
                    <div class="social_media_links"> 
                        <ul class="social">
                            <li>
                                <div class="row">
                                    <a href="https://twitter.com/share?url=URLTOSHARE" class="tw" title="Tweet this page!">
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <h6 class="ml-3 mt-1">{{__('lang.contact.twitter')}}</h6>
                                </div>
                            </li>
                            <li>
                            <div class="row">
                                <a href="https://www.facebook.com/sharer.php?u=URLTOSHARE&amp;t=TITLE" class="fb" title="Share this page!">
                                    <i class="icon-facebook"></i>
                                </a>
                                <h6 class="ml-3 mt-1">{{__('lang.contact.facebook')}}</h6>
                            </div>
                            </li>
                            <li>
                            <div class="row">
                                <a href="https://plus.google.com/share?url=URLTOSHARE" class="gp" title="Share this page!">
                                    <i class="icon-google-plus"></i>
                                </a>
                                <h6 class="ml-3 mt-1">{{__('lang.contact.google')}}</h6>
                            </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>