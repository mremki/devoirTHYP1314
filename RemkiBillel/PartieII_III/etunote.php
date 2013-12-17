<script src="../js/jquery.min.js" ></script>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script>

		function showRSS(url)
		{
			//merci à http://stackoverflow.com/questions/10943544/how-to-parse-a-rss-feed-using-javascript
			$.ajax({
				url      : document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=100&callback=?&q=' + encodeURIComponent(url),
				dataType : 'json',
				success  : function (data) {
				if (data.responseData.feed && data.responseData.feed.entries) {
				      $.each(data.responseData.feed.entries, function (i, e) {
				        console.log("------------------------");
				        console.log("image      : " + e.mediaGroups[0].contents[0].url);
				        console.log("title      : " + e.title);
				        console.log("author     : " + e.author);
				        console.log("description: " + e.description);
				        var oEtu = {nom:e.title,url:e.mediaGroups[0].contents[0].url};
				        showEtu(oEtu);
				        
				      });
				    }
				}
			});
			console.log('FIN showRSS');
		}
		
		function showEtu(etu){
			
			var d=document.createElement("div");
			d.setAttribute('class', 'etu');
			d.innerHTML = etu.nom;
			document.body.appendChild(d);
			

			var tof = document.createElement("img");
			tof.setAttribute('src', etu.url);
			tof.setAttribute('alt', etu.nom);
			tof.setAttribute('title', etu.nom);
			tof.addEventListener("click", function(){presentliste(etu)});
			d.appendChild(tof);
			
			var absImg = document.createElement("input");
			absImg.setAttribute('type', 'text');
			absImg.setAttribute('name', 'notes');
			absImg.setAttribute('placeholder', 'notes');
			absImg.addEventListener("click", function(){absentliste(etu)});
			d.appendChild(absImg);
				
				
			var absImg = document.createElement("input");
			absImg.setAttribute('type', 'submit');
			absImg.setAttribute('name', 'notes');
			absImg.setAttribute('placeholder', 'notes');
			absImg.addEventListener("click", function(){absentliste(etu)});
			d.appendChild(absImg);		
			
		};		
	</script>
	<style type="text/css">
		.etu{
			align:center;
			width:300px;
		}
		.listeA{
			background-color:red;
		}
		.listeP{
			background-color:green;
		}
	</style>
	</head>
	<body>
		<form>
			<script>
				showRSS("https://picasaweb.google.com/data/feed/base/user/112537161896190034287/albumid/5931538032377292977?alt=rss&kind=photo&authkey=Gv1sRgCJjJwc265LnxigE&hl=fr");
			</script>
		</form>
		<br>
		<div id="lst" align="center"></div>
	</body>
</html>