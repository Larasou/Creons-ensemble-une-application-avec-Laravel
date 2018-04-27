<div class="ui container">
    @if(session('violet'))
        <div class="ui violet icon message">
            <i class="check icon"></i>
            <div class="content">
                <div class="header">
                    {!! session('title') !!}
                </div>
                <p>
                    {!! session('violet') !!}
                </p>
            </div>
        </div>
    @endif

    @if(session('blue'))
        <div class="ui blue icon message">
            <i class="check icon"></i>
            <div class="content">
                <div class="header">
                    {!! session('title') !!}
                </div>
                <p>
                    {!! session('blue') !!}
                </p>
            </div>
        </div>
    @endif

    @if(session('orange'))
        <div class="ui orange icon message">
            <i class="check icon"></i>
            <div class="content">
                <div class="header">
                    {!! session('title') !!}
                </div>
                <p>
                    {!! session('orange') !!}
                </p>
            </div>
        </div>
    @endif


    @if(session('green'))
        <div class="ui green icon message">
            <i class="check icon"></i>
            <div class="content">
                <div class="header">
                    {!! session('title') !!}
                </div>
                <p>
                    {!! session('green') !!}
                </p>
            </div>
        </div>
    @endif
</div>