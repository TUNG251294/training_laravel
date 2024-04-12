<div class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>{{ $title }}</h3>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
        <div class="modal-footer">
            -- Modal footer! --
        </div>
    </div>
</div>