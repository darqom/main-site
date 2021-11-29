<div class="card" wire:ignore>
    <div class="card-header">
        <h4>Pindah ke</h4>
    </div>
    <div class="card-body">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="{{ route('panel.settings.general') }}" class="nav-link @active('panel.settings.general')">Umum</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('panel.settings.smtp') }}" class="nav-link @active('panel.settings.smtp')">SMTP</a>
            </li>
        </ul>
    </div>
</div>
