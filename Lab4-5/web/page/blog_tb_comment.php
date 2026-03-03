<div>
    <table id="tb_blog">
        <thead>
            <tr>
                <td>ID</td>
                <td>Text</td>
                <td>Edit</td>
                <td>Del</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ID</td>
                <td>Text</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    let jsonUrl = "/php/blog.php";
    $.getJSON(jsonUrl, function(jsonData) {
        $("#tb_blog tr").remove();

        jsonData.data.forEach(function(item) {
            let tbRow = `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.comment}</td>
                            <td></td>
                            <td><button id="bt_del_blog" data="${item.id}">DEL</button></td>
                        </tr>
                        `;

            $("#tb_blog tbody").append(tbRow);
        });
    });
</script>