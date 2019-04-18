	var myInit = { method: 'GET',
               mode: 'cors',
               cache: 'default' };

	var myRequest = new Request('https://www.adhical.com/reklam300-250.php', myInit);

	fetch(myRequest).then(function(response) {
	  return response.json();
	}).then(function(json) {
		const adPage = `<center><div id="reklamAlani" style="height:${json.yukseklik}px; display:inline-block;position:relative;">
				<a href="https://www.adhical.com/reklamal/reklam.php?id=${json.id}">
					<img class="reklam" height = "${json.yukseklik}" title="${json.title}" alt="${json.alt}" src="${json.src}" />
				</a>
				<a href="https://www.adhical.com/">
					<img src="https://www.adhical.com/img/clients/i.png" style="position:absolute;right:21px;top:0%; max-width: 20px; max-height: 20px;" title="Reklamınız Reklam Sistemi" alt="Reklamınız Reklam Sistemi">
				</a>
				<a id="kapatButton">
					<img src="https://www.adhical.com/img/clients/x.png" style="position:absolute;right:0%;top:0%; max-width: 20px; max-height: 20px" alt="kapat" title="kapat">
				</a>
			</div></center>
			<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
			<script>$("#kapatButton").click(function(){
				$("#reklamAlani").hide();
			})</script>`;
		var adhical = document.getElementById('Adhical300-250');
		if(adhical) {
			adhical.innerHTML = adPage;
		}
	});