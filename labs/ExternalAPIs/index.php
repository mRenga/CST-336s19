<head>
    <title> External APIs </title>
    <meta charset="utf-8" />
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!--Bootstrap files-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!--Custom Styles-->
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>



<body>



<!--This appears at the bottom-->

    <div class="jumbotron">
        <h1>Image Search</h1>
    </div>

    <div id="directions" class="resultParas">
        <label for="searchField">Search for an image: </label>
        <input type="text" id="searchField" class="searchField">
        <button id="submit">Search</button>
    </div>
    
    <script>
        $(document).ready(function(){
        
              //Ajax call to check the letter in the selected word  
              $("#submit").click( function(){  
                  
                 var guess = document.getElementById("searchField").value;
                 $.ajax({
                    type: "POST",
                    dataType:'json',
                    url: "getImages.php",
                    data: { 
                         
                        },
                    success: function(data,status) {
                        console.log(data);
                      },
                      complete: function(data,status) { //optional, used for debugging purposes
                          //alert(status);
                      }
                  });//AJAX  
             } );//username changes
         
        });
    </script>
    
</body>