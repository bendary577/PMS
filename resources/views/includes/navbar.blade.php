<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Hospita</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">{{ __('lang.home')}} <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">{{ __('lang.contacts')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">{{ __('lang.services')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">{{ __('lang.about')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('change.language', ['lang' => app()->getLocale() == 'en' ? 'ar' : 'en' ])}}">{{ app()->getLocale() == 'en' ? 'اللغة العربية' : 'english' }}</a>
      </li>
    </ul>
    <a  href="{{route('login')}}" class="btn btn-success"> 
        {{ __('lang.login')}}
    </a>
  </div>
</nav>