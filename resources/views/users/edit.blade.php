@extends('layouts')

@section('content')
<style>
    .toolbar {
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

    .rich-text-editor {
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

    .code-editor {
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

    /* Scrollbar for rich-text-editor */
    .rich-text-editor::-webkit-scrollbar {
        width: 6px;
    }

    .rich-text-editor::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 4px;
    }

    .rich-text-editor::-webkit-scrollbar-thumb:hover {
        background-color: #555;
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
                        <h1 class="main-title float-left">Edit User</h1>
                        <div class="toplnk">
                            <a href="{{ route('users.index') }}" class="btn xbtn-back">
                                <ion-icon name="arrow-back-outline"></ion-icon> Back to Users List
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="inr-frm-str">
                        <div class="inr-frm-sub">
                            <form action="{{ route('users.update', $user->id) }}" method="POST" onsubmit="syncContent()">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div class="form-group">
                                <label for="email">Email  ID</label>
                                <textarea name="email" id="email" class="form-control" required>{{ old('email', $user->email) }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                    <label for="role">Role</label>
                                    <select id="role" class="form-control" name="role" required="">
                                        <option value="" selected="">Select Role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Author</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Cancel</a>

                            </form>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
        let isSourceMode = false;

        function formatText(command, value = null) {
            document.execCommand(command, false, value);
        }

         function insertYouTubeVideo() {
          var url = prompt("Enter the YouTube video URL:");
          if (url) {
            var videoId = getYouTubeVideoId(url);
            if (videoId) {
              var iframeTag = `<iframe width="560" height="315" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>`;
              document.execCommand('insertHTML', false, iframeTag);
            } else {
              alert("Invalid YouTube URL.");
            }
          }
        }

        function getYouTubeVideoId(url) {
          var regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
          var match = url.match(regex);
          return (match && match[1]) ? match[1] : null;
        }

        function insertLink() {
            var url = prompt("Enter the URL:");
            if (url) {
                document.execCommand('createLink', false, url);
            }
        }

        function insertImage() {
            var imageUrl = prompt("Enter the image URL:");
            if (imageUrl) {
                document.execCommand('insertImage', false, imageUrl);
            }
        }

        function toggleSourceCode() {
            const richTextEditor = document.querySelector('.rich-text-editor');
            const codeEditor = document.querySelector('.code-editor');

            if (isSourceMode) {
                // Switch to rich text mode
                richTextEditor.innerHTML = codeEditor.value;
                codeEditor.style.display = 'none';
                richTextEditor.style.display = 'block';
            } else {
                // Switch to HTML source mode
                codeEditor.value = richTextEditor.innerHTML;
                richTextEditor.style.display = 'none';
                codeEditor.style.display = 'block';
            }

            isSourceMode = !isSourceMode;
        }

        function syncContent() {
          
            document.querySelector('.code-editor').value = document.querySelector('.rich-text-editor').innerHTML;
          
        }
    </script>
    <script>
    document.getElementById('imageUpload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const formData = new FormData();
        formData.append('image', file);

        fetch('{{ route('upload.image') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.url) {
                // Insert the image URL into the editor
                const imgTag = `<img src="${data.url}" alt="Image" />`;
                document.execCommand('insertHTML', false, imgTag);
            } else {
                alert('Failed to upload image');
            }
        })
        .catch(error => {
            console.error('Error uploading image:', error);
            alert('Failed to upload image');
        });
    });
</script>
@endsection
