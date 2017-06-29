<div class="portlet portlet-sortable light bordered portlet-form">
    <div class="portlet-title">
        <div class="caption font-green">
            <i class=" {{ $icon }} font-green"></i>
            <span class="caption-subject bold uppercase"> {{ $title }} </span>
        </div>
        <div class="actions">
            @if(isset($actions) && !empty($actions))
                @foreach($actions as $id => $action)
                    @php
                        $link = empty($action['link']) ? 'javascript:;' : $action['link'];
                    @endphp
                    <a class="btn btn-circle btn-icon-only btn-default" id="{{ $id }}" href="{{ $link }}" {!! $action['attributes'] !!}>
                        <i class="{{ $action['icon'] }}"></i>
                    </a>
                @endforeach
            @endif
            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"></a>
        </div>
    </div>
    <div class="portlet-body">
        {{ $slot }}
    </div>
</div>
<!-- empty sortable porlet required for each columns! -->
<div class="portlet portlet-sortable-empty"> </div>