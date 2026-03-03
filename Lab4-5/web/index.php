<html>
    <body>
        <div id="hello">Hello PHP</div>

        <div id="blog"></div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <script>

        document.getElementById("hello").innerHTML = "Welcome";

        // $(function(){});
        
        $(document).ready(function(){
            $("#hello").html("I LOVE IT");

            $("#blog").load("page/blog.php");
        });

    </script>

</html>