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
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <div class="row">
            @foreach($categories->chunk(6) as $chunk)
                <div class="col-lg-6">
                    @can('create', \App\Category::class)
                        <a href="#" class="btn btn-primary">New category</a>
                    @endcan
                    <ul class="list-unstyled mb-0">
                        @foreach($chunk as $category)
                            <li>
                                <a href="{{ route('category.show', [$category->slug]) }}">
                                    {{ $category->name }}
                                    <span class="badge">{{ $category->tickets->count() }}</span>
                                    @can('update', $category)
                                        <a href="" class="btn-xs btn-primary">
                                            <i class="fa fa-cogs"></i>
                                        </a>
                                    @endcan
                                    @can('delete', $category)
                                        <a href="" class="btn-xs btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endcan
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Side Widget -->
<div class="card my-4">
    <h5 class="card-header">Side Widget</h5>
    <div class="card-body">
        You can put anything you want inside of these side widgets. They are easy to use, and feature
        the new Bootstrap 4 card containers!
    </div>
</div>
