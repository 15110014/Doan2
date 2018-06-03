function x()
{
    x = document.getElementById('container');
    x.innerHTML="";
    a = document.createElement("iframe");
    attr = document.createAttribute('src');
    attrHeight = document.createAttribute('height');
    attrHeight.value = "600px";
    attrWidth = document.createAttribute('width');
    attrWidth.value="100%";
    attrStyle = document.createAttribute('style');
    attrStyle.value="position:";
    attr.value = "http://localhost/php_coban/database/login2.php";
    a.setAttributeNode(attr);
    a.setAttributeNode(attrHeight);
    a.setAttributeNode(attrWidth);
    a.setAttributeNode(attrStyle);
    document.body.appendChild(a);
}