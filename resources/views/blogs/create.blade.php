@extends('layouts')

@section('content')

<style>
        .toolbar {
            margin-bottom: 10px;
        }
        .rich-text-editor, .code-editor {
            width: 100%;
            min-height: 200px;
            border: 1px solid #ccc;
            padding: 10px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            border-radius: 5px;
            overflow: auto;
        }
        .rich-text-editor {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .code-editor {
            font-family: 'Courier New', Courier, monospace;
            display: none;
        }
        button, select, input {
            margin-right: 5px;
        }
</style>

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="brdcrmb-title">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Create Blog</h1>
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
                            <form action="{{ route('blogs.store') }}" method="POST" onsubmit="syncContent()">
                                @csrf

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                                </div>

            
                                <div class="form-group">
                                    <label for="short_content">Short Content</label>
                                    <textarea name="short_content" id="short_content" class="form-control" required>{{ old('short_content') }}</textarea>
                                </div>
                                <div class="form-group">
                                <label for="short_content">Content</label>

                                <div class="toolbar">
            <button type="button" onclick="formatText('bold')">Bold</button>
            <button type="button" onclick="formatText('italic')">Italic</button>
            <button type="button" onclick="formatText('underline')">Underline</button>
            <button type="button" onclick="formatText('strikeThrough')">Strikethrough</button>
            <button type="button" onclick="formatText('insertOrderedList')">Numbered List</button>
            <button type="button" onclick="formatText('insertUnorderedList')">Bulleted List</button>
            <button type="button" onclick="formatText('removeFormat')">Remove Formatting</button>
            <button type="button" onclick="insertLink()">Insert Link</button>
            <button type="button" onclick="insertImage()">Insert Image</button>
            <input type="file" id="imageUpload" style="display: none;">
            <button type="button" onclick="document.getElementById('imageUpload').click()">Upload Image</button>

            <button type="button" onclick="insertYouTubeVideo()">Insert YouTube Video</button>
            <select onchange="formatText('formatBlock', this.value)">
                <option value="">Paragraph</option>
                <option value="h1">Heading 1</option>
                <option value="h2">Heading 2</option>
                <option value="h3">Heading 3</option>
            </select>
            <button type="button" onclick="formatText('justifyLeft')">Align Left</button>
            <button type="button" onclick="formatText('justifyCenter')">Align Center</button>
            <button type="button" onclick="formatText('justifyRight')">Align Right</button>
            <button type="button" onclick="formatText('justifyFull')">Justify</button>
            <input type="color" onchange="formatText('foreColor', this.value)" title="Text Color">
            <button type="button" onclick="toggleSourceCode()">Toggle HTML Source</button>
        </div>
        <div class="rich-text-editor" contenteditable="true">
            {!! $blog->content ?? '' !!}
        </div>
        <textarea class="code-editor" name="content">{!! $blog->content ?? '' !!}</textarea>
        <br>
    </div>

                                <button type="submit" class="btn btn-primary btn-sm">Create</button>
                                <a href="{{ route('blogs.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end row-->
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
