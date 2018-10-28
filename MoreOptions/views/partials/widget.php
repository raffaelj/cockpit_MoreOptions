<div>

    <div class="uk-panel-box uk-panel-card">

        <div class="uk-panel-box-header uk-flex">
            <strong class="uk-panel-box-header-title uk-flex-item-1">
                @lang('Collection Types')

                @hasaccess?('collections', 'create')
                <a href="@route('/collections/collection')" class="uk-icon-plus uk-margin-small-left" title="@lang('Create Collection')" data-uk-tooltip></a>
                @end
            </strong>
            @if(count($colgroups))
            <span class="uk-badge uk-flex uk-flex-middle"><span>{{ count($colgroups) }}</span></span>
            @endif
        </div>

        @if(count($colgroups))

            <div class="uk-margin">

                <ul class="uk-list uk-list-space uk-margin-top">
                    @foreach($colgroups as $type => $collection)
                    <li>
                      <strong class="uk-panel-box-header-title uk-flex-item-1">
                          {{ $type }}
                      </strong>
                      <ul class="uk-list uk-list-space uk-margin-top">
                      @foreach($collection as $col)
                        <li>
                        <div class="uk-grid uk-grid-small">
                            <div class="uk-flex-item-1">
                                <a href="@route('/collections/entries/'.$col['name'])">

                                    <img class="uk-margin-small-right uk-svg-adjust" src="@url(isset($col['icon']) && $col['icon'] ? 'assets:app/media/icons/'.$col['icon']:'collections:icon.svg')" width="18px" alt="icon" style="color:{{ $col['color'] }}" data-uk-svg>

                                    {{ htmlspecialchars(@$col['label'] ? $col['label'] : $col['name']) }}
                                </a>
                            </div>
                            @if($app->module('collections')->hasaccess($col['name'], 'collection_edit'))
                            <div class="uk-flex-item-2">
                                <a class="uk-icon-cog" style="color:{{ $col['color'] }}" href="@route('/collections/collection/'.$col['name'])" title="@lang('Edit')" data-uk-tooltip="pos:'right'"></a>
                            </div>
                            @endif
                            <div>
                                @if($app->module('collections')->hasaccess($col['name'], 'entries_create'))
                                <a class="uk-text-muted" href="@route('/collections/entry')/{{ $col['name'] }}" title="@lang('Add entry')" data-uk-tooltip="pos:'right'">
                                    <img src="@url('assets:app/media/icons/plus-circle.svg')" width="1.2em" data-uk-svg />
                                </a>
                                @endif
                            </div>
                        </div>
                      @endforeach
                      </ul>
                    </li>
                    @endforeach
                </ul>

            </div>

        @else

            <div class="uk-margin uk-text-center uk-text-muted">

                <p>
                    <img src="@url('collections:icon.svg')" width="30" height="30" alt="Collections" data-uk-svg />
                </p>

                @lang('No collections')
            </div>

        @endif

    </div>

</div>
