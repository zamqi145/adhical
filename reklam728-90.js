var adPage;
document.addEventListener('DOMContentLoaded', () => {
var myInit = { method: 'GET',
               mode: 'cors',
               cache: 'default' };

	var myRequest = new Request('https://www.adhical.com/reklam728-90.php', myInit);

	fetch(myRequest).then(function(response) {
	  return response.json();
	}).then(function(json) {
		if(json.turu==1){
			adPage = `<center><div id="reklamAlani" style="height:${json.yukseklik}px; display:inline-block;position:relative; margin-top: 20px; margin-bottom: 20px;">
				<a href="https://www.adhical.com/reklamal/reklam.php?id=${json.id}&time=${json.saat}" rel="nofollow">
					<img class="reklam" height = "${json.yukseklik}" width="100%" title="${json.title}" alt="${json.alt}" src="${json.src}" />
				</a>
				<a href="https://www.adhical.com/">
					<img src="https://www.adhical.com/img/clients/i.png" style="position:absolute !important;right:21px !important;top:0% !important; max-width: 20px !important; max-height: 20px !important;" title="Adhical Reklam Sistemi" alt="Adhical Reklam Sistemi">
				</a>
				<a id="kapatButton">
					<img src="https://www.adhical.com/img/clients/x.png" style="position:absolute !important;right:0% !important;top:0% !important; max-width: 20px !important; max-height: 20px !important;" alt="kapat" title="kapat">
				</a>
			</div></center>`;
		}
		else if(json.turu==2){
			adPage = `<center><div id="reklamAlani" style="border: solid 1px #dfdfdf; width: 728px; max-height: 100px; padding-top: 5px; padding-left: 8px; padding-right: 10px; padding-bottom: 5px; display: inline-table; margin-bottom: 20px;">
						<a href="https://www.adhical.com/reklamal/reklam.php?id=${json.id}&time=${json.saat}" rel="nofollow"><h2 style="display: table-cell;">${json.baslik}</h2>
						<p>${json.aciklama}</p></a>
					</div></center>`;
		}
		else if(json.turu==3){
			adPage = `<center><div id="reklamAlani" style="border: solid 1px #dfdfdf; width: 728px; max-height: 90px; padding-top: 5px; padding-bottom: 5px; padding-left: 8px; padding-right: 10px;display: inline-table;">
						<a href="https://www.adhical.com/reklamal/reklam.php?id=${json.id}&time=${json.saat}" rel="nofollow"><h2 style="margin: 0px;">${json.baslik}</h2>
						<p>${json.aciklama}</p></a>
					</div></center>`;
		}
		var adhical = document.getElementById('Adhical728-90');
		if(adhical) {
			adhical.innerHTML = adPage;
			var elem = document.getElementById('reklamAlani');
			elem.addEventListener('click', () => {
				var reklam = document.getElementById('reklamAlani');
				reklam.style.height = "0px";
				reklam.style.display = "none";
			});
		}
	});
});