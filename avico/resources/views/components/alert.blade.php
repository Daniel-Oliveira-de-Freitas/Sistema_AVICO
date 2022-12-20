<div>
    <div class="alert @if ($dismissible === 'true') alert-dismissible @endif alert-{{ $alertType }}">
        @if ($dismissible === 'true')
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        @endif
        <strong>{{ $message }}</strong>
    </div>
</div>
