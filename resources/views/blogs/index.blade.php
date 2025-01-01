@extends('layouts')

@section('content')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="brdcrmb-title">
                        <div class="breadcrumb-holder">
                            <h1 class="main-title float-left">View Blogs</h1>
                            <div class="toplnk text-center"> 
                                <a class="btn xbtn-srch collapsed" data-bs-toggle="collapse" href="#xsearchbox" aria-expanded="{{ request('role') ? 'true' : 'false' }}" aria-controls="xsearchbox">
                                    <ion-icon name="search-outline"></ion-icon>
                                </a>
                                <a href="{{ route('blogs.create') }}" class="btn xbtn-add">
                                    <ion-icon name="add-outline"></ion-icon> Add Blog
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse {{ request('title')  ? 'show' : '' }}" id="xsearchbox">
        <div class="card card-body xsearchbdy">
        <a class="cbtn-srch" data-bs-toggle="collapse" href="#xsearchbox" aria-expanded="true" aria-controls="xsearchbox" style="float: right;">
            <ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
        </a>
        <form autocomplete="off" action="{{ route('blogs.index') }}" method="GET" class="d-flex align-items-center gap-2">
            <div class="form-group mb-0 flex-grow-1">
                <label for="title" class="d-none">Title</label>
                <input type="text" id="title" name="title" class="form-control form-control-sm" 
                       placeholder="Title" value="{{ request('title') }}" style="max-width: 300px; width: 100%;">
            </div>
           
            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary btn-sm">
                    <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon> Search
                </button>
                <a class="btn btn-secondary btn-sm" href="{{ route('blogs.index') }}">
                    <ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon> Cancel
                </a>
            </div>
        </form>
    </div>
</div>





            <div class="row">
                <div class="col-xl-12">
                    <div class="inr-frm-str">
                        <div class="inr-frm-sub">
                            <div class="in-page-tbl">
                                <div class="body-content mb-3">
                                    <div class="table-responsive tbl-bdy">
                                        <table class="table table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Title</th>
                                                    <th>Short Content</th>
                                                    <th>Actions</th>
                                                </tr>
                                                @php
                                                 $serial = ($blogs->currentPage() - 1) * $blogs->perPage() + 1; // Calculate starting serial number
                                                @endphp
                                                </thead>
                                                <tbody>
                                                @foreach ($blogs as $blog)
                                                <tr>
                                                    <td>{{ $serial++ }}</td>
                                                    <td>{{ $blog->title }}</td>
                                                    <td>{{ $blog->short_content }}</td>
                                                    <td>

                                                        <form action="{{ route('blogs.destroy',$blog->id) }}" method="Post">
                                                        <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='{{ route('blogs.edit', $blog->id) }}'">Edit</button>
                                                        <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='{{ route('blogs.show', $blog->id) }}'">View</button>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                    Delete
                                                                </button>
                                                        </form>

                                                        </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                             <ul class="pagination">
                                                 {{ $blogs->links('pagination::bootstrap-4') }}
                                             </ul>
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-->
                </div>
                <!-- end card-->
            </div>
        </div>
        <!-- END container-fluid -->
    </div>
    <!-- END content-page -->
</div>

@endsection
