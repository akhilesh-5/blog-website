@extends('layouts')

@section('content')
<style>
    .content-display {
        background-color: #f1f1f1;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .toolbar button, .toolbar select, .toolbar input[type="color"] {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .toolbar button:hover, .toolbar select:hover, .toolbar input[type="color"]:hover {
        background-color: #e0e0e0;
    }

    .toolbar select {
        padding: 5px;
        min-width: 120px;
    }

    .rich-text-content {
        min-height: 300px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 14px;
        border-radius: 5px;
        margin-top: 10px;
        background-color: #fff;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
        overflow-y: auto;
    }

    .code-content {
        display: none; /* Hidden by default (switching via JS) */
        width: 100%;
        min-height: 300px;
        border: 1px solid #ccc;
        padding: 10px;
        font-family: monospace;
        font-size: 14px;
        border-radius: 5px;
        margin-top: 10px;
        background-color: #f9f9f9;
        white-space: pre-wrap;
    }

    /* Styling the buttons and inputs for better visuals */
    .toolbar button {
        border: none;
        padding: 10px 15px;
        font-size: 14px;
        border-radius: 4px;
        color: #333;
        background-color: #f8f8f8;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .toolbar button:hover {
        background-color: #e2e2e2;
    }

    button:focus, input:focus, select:focus {
        outline: none;
        box-shadow: 0px 0px 3px 2px rgba(100, 100, 100, 0.3);
    }

    button.upload-btn {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
    }

    button.upload-btn:hover {
        background-color: #45a049;
    }



    /* Optional - add more spacing between editor and save button */
    .save-btn {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s;
    }

    .save-btn:hover {
        background-color: #0056b3;
    }
</style>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="brdcrmb-title">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">View Blog</h1>
                        <div class="toplnk">
                            <a href="{{ route('blogs.index') }}" class="btn xbtn-back">
                                <ion-icon name="arrow-back-outline"></ion-icon> Back to Blogs List
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="inr-frm-str">
                        <div class="inr-frm-sub">
                            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" onsubmit="syncContent()">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <div class="content-box">
                                {!! $blog->title ?? '' !!}
                            </div>
                                </div>
                                <div class="form-group">
                                <label for="short_content">Short Content</label>
                                <div class="content-box">
                                {!! $blog->short_content ?? '' !!}
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="content">Content</label>
                            
                            </div>
                            <div class="content-box">
                                {!! $blog->content ?? '' !!}
                            </div>
                                    <!-- </div> -->
                                    <!-- <div class="rich-text-editor" contenteditable="true">
                                        {!! $blog->content ?? '' !!}
                                    </div>
                                    <textarea class="code-editor" name="content">{!! $blog->content ?? '' !!}</textarea>
                                    <br>
                                    </div> -->
                                <!-- <button type="submit" class="btn btn-primary btn-sm">Update</button> -->
                                <!-- <a href="{{ route('blogs.index') }}" class="btn btn-secondary btn-sm">Cancel</a> -->

                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <h5 class="fw-bold mb-4 text-primary">Comments</h5>
                    <div class="comment-list">
                        @foreach($blog->comments as $comment)
                        <div class="comment-item mb-4 p-3 bg-light rounded">
                            <div class="d-flex flex-column">
                                <div class="d-flex justify-content-between">
                                    <p class="text-dark fw-bold mb-1">{{ strtoupper($comment->name ?? 'Anonymous') }}</p>
                                    <div class="d-flex justify-content-center">
                                  

                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE') <!-- This makes the form act as a DELETE request -->
                                            <!-- <button type="submit" class="btn btn-primary">Delete</button> -->
                                            <button type="submit" class="btn btn-link text-danger" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                                                <i class="fas fa-trash-alt"></i> <!-- Font Awesome Trash Icon -->
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <p class="mb-1 text-muted">{{ $comment->comment }}</p>
                                <small class="text-muted text-end">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="col-xl-6">
                    <div class="viw-pge-sec">
                        <div class="viw-pge-degl">
                            <!-- <div class="mt-4">
                                <h5 class="fw-bold mb-4">Add a Comment</h5>
                                <form action="{{ route('comments.store', ['blogId' => $blog->id]) }}" method="POST">

                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                    <div class="mb-3">
                                        <textarea name="comment" class="form-control" rows="4" required placeholder="Tap to enter comment here"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div> -->
                            <div class="mt-4">
                                <h5 class="fw-bold mb-4">Add a Comment</h5>
                                <form action="{{ route('comments.store', ['blogId' => $blog->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                                    <div class="mb-3">
                                        <textarea name="comment" class="form-control" rows="4" required placeholder="Tap to enter comment here"></textarea>
                                    </div>

                                    @if (!Auth::check())
                                        <div class="mb-3">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                                        </div>
                                    @else
                                        <p><strong>Logged in as:</strong> {{ Auth::user()->name }} ({{ Auth::user()->email }})</p>
                                    @endif

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- end card-->
            </div>
            <!-- end card-->
        </div>
        <!-- END container-fluid -->
    </div>
    <!-- END content-page -->
</div>
    
@endsection
