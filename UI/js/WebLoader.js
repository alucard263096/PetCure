function callXmlLoader(url,json,callback) {
    $.post(url, json, function (e) {
        var xmldoc = loadXml(e);
        callback(xmldoc);
    });
}

function loadXml(xmlDox) {
    var arr=new Array();
    try{
        var root = xmlDox.childNodes[0];
        for (i = 0; i < root.childNodes.length; i++) {
            var node = new Array();
            var n = root.childNodes[i];
            for (j = 0; j < n.childNodes.length; j++) {
                node[n.childNodes[j].nodeName] = n.childNodes[j].textContent;
            }
            arr[i] = node;
        }
    } catch (ex) {
        alert("网络出错"+ex.message+xmlDox);
    }
    return arr;
}