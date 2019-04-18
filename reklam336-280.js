document.addEventListener('DOMContentLoaded', () => {
var myInit = { method: 'GET',
               mode: 'cors',
               cache: 'default' };

	var myRequest = new Request('https://www.adhical.com/reklam336-280.php', myInit);

	fetch(myRequest).then(function(response) {
	  return response.json();
	}).then(function(json) {
		const adPage = `<center><div id="reklamAlani" style="height:${json.yukseklik}px; display:inline-block;position:relative;">
				<a href="https://www.adhical.com/reklamal/reklam.php?id=${json.id}&time=${json.saat}">
					<img class="reklam" height = "${json.yukseklik}" title="${json.title}" alt="${json.alt}" src="${json.src}" />
				</a>
				<a href="https://www.adhical.com/">
					<img src="https://www.adhical.com/img/clients/i.png" style="position:absolute !important;right:21px !important;top:0% !important; max-width: 20px !important; max-height: 20px !important;" title="Adhical Reklam Sistemi" alt="Adhical Reklam Sistemi">
				</a>
				<a id="kapatButton">
					<img src="https://www.adhical.com/img/clients/x.png" style="position:absolute !important;right:0% !important;top:0% !important; max-width: 20px !important; max-height: 20px !important;" alt="kapat" title="kapat">
				</a>
			</div></center>`;
		var adhical = document.getElementById('Adhical336-280');
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