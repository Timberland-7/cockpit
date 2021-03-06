<div>

    <div class="uk-panel-box uk-panel-card">

        <div class="uk-panel-box-header uk-flex">
            <strong class="uk-panel-box-header-title uk-flex-item-1">
                @lang('Singletons')

                @hasaccess?('singletons', 'create')
                <a href="@route('/singletons/singleton')" class="uk-icon-plus uk-margin-small-left" title="@lang('Create Singleton')" data-uk-tooltip></a>
                @end
            </strong>

            @if(count($singletons))
            <span class="uk-badge uk-flex uk-flex-middle"><span>{{ count($singletons) }}</span></span>
            @endif
        </div>

        @if(count($singletons))

            <div class="uk-margin">

                <ul class="uk-list uk-list-space uk-margin-top">
                    @foreach(array_slice($singletons, 0, count($singletons) > 5 ? 5: count($singletons)) as $singleton)
                    <li>
                        <a href="@route('/singletons/form/'.$singleton['name'])">

                            <img class="uk-margin-small-right uk-svg-adjust" src="@url(isset($singleton['icon']) && $singleton['icon'] ? 'assets:app/media/icons/'.$singleton['icon']:'singletons:icon.svg')" width="18px" alt="icon" data-uk-svg>

                            {{ @$singleton['label'] ? $singleton['label'] : $singleton['name'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>

            </div>

            <div class="uk-panel-box-footer">
                <a href="@route('/singletons')">@lang('See all')</a>
            </div>

        @else

            <div class="uk-margin uk-text-center uk-text-muted">

                <p>
                    <img src="@url('singletons:icon.svg')" width="30" height="30" alt="Singletons" data-uk-svg />
                </p>

                @lang('No singleton').

                @hasaccess?('singletons', 'create')
                <a href="@route('/singletons/singleton')">@lang('Create a singleton')</a>.
                @end

            </div>

        @endif

    </div>

</div>
