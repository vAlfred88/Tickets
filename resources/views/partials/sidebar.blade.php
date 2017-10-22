<div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
        </div>
    </div>
</div>

<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Категории</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                @can('create', \App\Category::class)
                    <a href="{{ route('category.index') }}" class="btn-sm btn-primary">
                        Категории
                    </a>
                @endcan
                <hr>
                <ul class="list-unstyled mb-0">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('category.show', [$category->slug]) }}">
                                {{ $category->name }}
                            </a>
                            <span class="badge">{{ $category->tickets->count() }}</span>
                        </li>
                    @endforeach
                </ul>
                <hr>
            </div>
        </div>
    </div>
</div>

<!-- Status Widget -->
<div class="card my-4">
    <h5 class="card-header">Статусы</h5>
    <div class="card-body">
        {{--@can('create', \App\Category::class)--}}
        <a href="{{ route('category.create') }}" class="btn-sm btn-primary">
            Статусы
        </a>
        {{--@endcan--}}
        <hr>
        <ul class="list-unstyled mb-0">
            @foreach($statuses as $status)
                <li>
                    <a href="{{ route('status.show', ['id' => $status->id]) }}">
                        {{ $status->label }}
                    </a>
                    <span class="badge">{{ $status->tickets->count() }}</span>
                </li>
            @endforeach
        </ul>
        <hr>
    </div>
</div>
