<div class="col-md-5 mt-4">
    <div class="card">
        <div class="card-header"> {{ __("Socialite") }} </div>
        <div class="card-body">
            <a href=" {{ route('social_auth', ['social' => 'github']) }} " class="btn btn-github btn-lg btn-block">
                {{ __("Github") }} <i class="fa fa-github"></i>
            </a>
            <a href="{{ route('social_auth', ['social' => 'facebook']) }}" class="btn btn-facebook btn-lg btn-block">
                {{ __("facebook") }} <i class="fa fa-facebook"></i>
            </a>
        </div>
    </div>
</div>