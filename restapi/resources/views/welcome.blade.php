<!doctype html>
<html>
<head>
    <title>axios - file upload example</title>
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
</head>
<body class="container">
<h1>file upload</h1>

<form role="form" class="form" onsubmit="return false;">
    <div class="form-group">
        <label for="file">File</label>
        <input id="file" type="file" class="form-control"/>
    </div>
    <button id="upload" type="button" class="btn btn-primary">Upload</button>
</form>

<div id="output" ></div>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    (function () {
        var output = document.getElementById('output');
        document.getElementById('upload').onclick = function () {
            var data = new FormData();
            data.append('foo', 'bar');
            data.append('file', document.getElementById('file').files[0]);

            var config = {
                onUploadProgress: function(progressEvent) {
                    var percentCompleted = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
                }
            };

            axios.post('api/upload/server', data, config)
                .then(function (res) {
                    output.className = 'container';
                    output.innerHTML = res.data;
                })
                .catch(function (err) {
                    output.className = 'container text-danger';
                    output.innerHTML = err.message;
                });
        };
    })();
</script>
</body>
</html>
