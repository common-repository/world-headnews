wh_layer = document.getElementById("storyline");
wh_doc = new XMLHttpRequest();
wh_doc.open("GET","http://blogsearch.google.com/blogsearch/feeds/",true);
wh_doc.onreadystatechange = function () {
	if (wh_doc.readyState==4) {
		xml = wh_doc.responseXML;
		items = xml.getElementsByTagName("item");
		
		order = Math.floor(Math.random()*10);
		desc = items[order].getElementsByTagName("description")[0].childNodes[0].nodeValue;
		url = items[order].getElementsByTagName("link")[0].childNodes[0].nodeValue;
		
		wh_layer.innerHTML = "<a href='"+url+"' target='_blank'>"+desc+"</a>";
	}
}
wh_doc.send(null);