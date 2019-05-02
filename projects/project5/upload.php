<!DOCTYPE html>
<html>

<head>
    <title>Upload file</title>
</head>

<body>
    <button type="button" class="dashboard">Back to Dashboard</button>
    <br>
    <form method="POST" action="uploadFile.php" enctype="multipart/form-data">
        <!--Use multiple attribute and array for input name-->
        Select file: <input type="file" multiple name="fileName[]" /> <br />
        <input type="submit" name="uploadForm" value="Upload File" />
        
    </form>
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
   
        $(document).on('click', '.dashboard', function() {
                window.location.href = "dashboard.html";
            });
    </script>
</body>

</html>