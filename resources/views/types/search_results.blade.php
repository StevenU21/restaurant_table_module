<div class="form-group mb-0 mr-3 position-relative">
    <ul class="list-group list-group-flush" style="max-width: 200px;">
        @foreach ($types as $type)
            <li class="list-group-item list-group-item-action">{{ $type->name }}</li>
        @endforeach
    </ul>
</div>
