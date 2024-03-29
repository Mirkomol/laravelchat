<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                     src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#">Mirkamol</a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('idea.destroy', $idea->id) }}">
                    @csrf
                    @method('delete')
                    <a class="mx-2" href="{{ route('idea.edit', $idea->id) }}">Update</a>
                    <a class="mt-1" href="{{ route('idea.show', $idea->id) }}">View</a>
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('idea.update', $idea->id) }}" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                    <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-dark mb-2 btn-sm float-end">Update</button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">{{ $idea->content }}</p>
        @endif

        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"><span class="fas fa-heart me-1"></span>{{ $idea->like }}</a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"><span class="fas fa-clock"></span>{{ $idea->created_at }}</span>
            </div>
        </div>

        @include('shared.commentbox')
    </div>
</div>
