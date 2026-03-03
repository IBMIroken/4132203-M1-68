<div>
    <form id="fm_blog">
        <input type="text" name="blog">
        <button type="submit">SAVE</button>
    </form>
</div>

<script>
    $("#fm_blog").submit(function(e){
        e.preventDefault();


        $.ajax({
            url: "/php/blog.php",
            type: "POST",
            data: $(this).serialize(),
            success: function(res){
                let response = JSON.parse(res);
                alert(response.message);

            }
        });
    });
</script>