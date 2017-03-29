<div class="page-header">
    <h1>{{ $title }}</h1>
</div>

<p>{{ $welcomeMessage }}</p>
<p>Ici est un test</p>

<a class="btn btn-md btn-success" href="{{ site_url() }}">
    {{ __('Home') }}
</a>
<a class="btn btn-md btn-success" href="{{ site_url('subpage') }}">
    {{ __('Open subpage') }}
</a>