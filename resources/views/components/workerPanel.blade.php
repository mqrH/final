<div class="col">
    <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-3">
            <h4 class="my-0 fw-normal">{{ $position }}</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">{{ $name }}<br></h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li>{{ $bio }}</li>
            </ul>
            <a href="{{ route('set-entity', ['entity' => 'worker', 'data' => $id]) }}" class="w-100 btn btn-lg btn-outline-primary">Select</a>
        </div>
    </div>
</div>
