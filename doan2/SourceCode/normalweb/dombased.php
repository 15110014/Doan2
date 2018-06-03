<?php
    include './header.php';
    // decodeURI
?>
<div class="jumbotron text-center">
    <h1>Lựa chọn ngôn ngữ</h1>

    <form name="XSS" method="GET">
        <select name="default" style="color:black;">
            <script>
                if (document.location.href.indexOf("default=") >= 0) {
                    var lang = document.location.href.substring(document.location.href.indexOf("default=")+8);
                    document.write("<option value='" + lang + "'>" + escapeHtml(decodeURI(lang)) + "</option>");
                    document.write("<option value='' disabled='disabled'>----</option>");
                }
                function escapeHtml(text) {
                    return text
                        .replace(/&/g, "&amp;")
                        .replace(/</g, "&lt;")
                        .replace(/>/g, "&gt;")
                        .replace(/"/g, "&quot;")
                        .replace(/'/g, "&#039;");
                } 
                document.write("<option value='Vietnam'>Vietnam</option>");
                document.write("<option value='China'>China</option>");
                document.write("<option value='USA'>USA</option>");
                document.write("<option value='Japan'>Japan</option>");
            </script>
            
        </select>
        <button type="submit">Select</button>
    </form>
    </div>
<?php
    include './footer.php';
?>