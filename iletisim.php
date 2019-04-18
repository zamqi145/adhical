<?php 
	include("connect.php"); 
	$titl = "Your Title"; 
	$desc = "Your Description"; 
	$keyw = "Your Titles"; 
	define("FROM_FILE", "1"); 
	include("header.php"); 
?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="jumbotron jumbotron-sm">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-12">
				<h1 class="col-sm-12 h1">İletişim</h1>
			</div>
		</div>
	</div>
</div>
<div class="big2">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<i class="far fa-clock color-d-b"></i>
				<p class="color-black">Hafta boyunca 8:00 - 23:00</p>
			</div>
		</div>
	</div>
</div>
<div class="big">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="well well-sm">
					<form action="islem/iletisim.php" method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Ad Soyad</label>
									<input type="text" class="form-control" id="name" name="ad" maxlength="80" placeholder="Adınız ve soyadınız" required="required" />
								</div>
								<div class="form-group">
									<label for="tel">Telefon Numası</label>
									<input type="text" class="form-control" id="tel" name="tel" maxlength="11" placeholder="Telefon Numaranız" required="required" />
								</div>
								<div class="form-group">
									<label for="email">E-posta</label>
									<div class="input-group">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-envelope"></span>
										</span>
										<input type="email" class="form-control" id="email" name="eposta" maxlength="80" placeholder="E-posta adresiniz" required="required" />
									</div>
								</div>
								<div class="form-group">
									<label for="subject">Tür</label>
									<select id="subject" name="konu" class="form-control" required="required">
										<option value="reklamveren" selected>Reklam Veren</option>
										<option value="yayinci">Yayıncı</option>
										<option value="diger">Diğer</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Mesaj</label>
									<textarea id="message" class="form-control" name="mesaj" rows="15" cols="30" maxlength="2500" required="required" placeholder="Mesajınız"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary pull-right" id="btnContactUs">Gönder</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php");?>
