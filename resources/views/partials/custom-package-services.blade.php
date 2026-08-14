@php
    $type = $type ?? 'corporate';
    $services = __('packages.custom_services.' . $type);

    if (!is_array($services)) {
        $services = [];
    }
@endphp

<div class="custom-services-list">
    @foreach ($services as $index => $service)
        <div class="form-check">
            <input class="form-check-input custom-service" type="checkbox" id="{{ $idPrefix }}-service-{{ $index }}"
                value="{{ $service }}">
            <label class="form-check-label" for="{{ $idPrefix }}-service-{{ $index }}">{{ $service }}</label>
        </div>
    @endforeach
</div>
