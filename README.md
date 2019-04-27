# Adhical Advertisement PHP Script
Advertisement System Like Google Ads and Google Adsense, mixed

What is The Purpose?
- You can think like Google Ads and Google Adsense. This system doesn't using api from another advertisement system.

Using Which Software Languages?
- We used HTML5, CSS3, JS, Bootstrap3 and PHP5.6

Follow These Steps if You Use This Script;

1 - Update connect.php content

2 - Update .htaccess content

3 - Update 404.php content

4 - Update footer.php (Website name)

5 - Update header.php

6 - Update index.php (change the content with your own content

7 - Change title and description in all page

8 - Update robots.txt

9 - Update sitemap.xml

10 - Change website link from (.htaccess, 404.php, footer.php, gizlilik.php, hakkimizda.php, header.php, iletisim.php, index.php, 300-250.php, 300-600.php, 320-100.php, 336-280.php, 728-90.php, 300-250.js, 300-600.js, 320-100.js, 336-280.js, 728-90.js, )

11 - Update your ad code in 300-250.php, 300-600.php, 320-100.php, 336-280.php, 728-90.php, 300-250.js, 300-600.js, 320-100.js, 336-280.js, 728-90.js and update your advertisement code in index.php (</*div id="Adhical300-600"></div> and <div id="Adhical728-90"></div>*/)

What is Properties of Script?
- This system registering ip (from user), url (clicked website), tiklananid (clicked ads. id (for see clicked ads in "verilenreklamlar")), fiyat (pay for clicks), gecerlilik (approval status), saat (clicked hour), tarih (clicked date), sehir (clicked city), ulke (clicked country) to database after click.
- This system getting ads from users (from "reklamveren" ("hesapturu"=1 (you can see it in "users" (in db)) account)) and u can see information about this ads in "verilenreklamlar". 
Explain about this;

userid = userid,

ad = advertisement name

link = website link for orientation

genislik = ads img width

yukseklik = ads img height

alt = alt meta tag for img

title = title meta tag for img

baslik = title for text ads

aciklama = description for text ads

resim = image way

kategori = category

gorme = num of sight

tiklama = number of clicks

krs20 = 20-cent clicks (you can change this in /public_html/reklamal/reklamal.php in 143-195)

krs30 = 30-cent clicks (you can change this in /public_html/reklamal/reklamal.php in 143-195)

krs40 = 40-cent clicks (you can change this in /public_html/reklamal/reklamal.php in 143-195)

circle1 = your score for the ad picture (reklamveren/detayli-reklam-analizi) 

circle2 = your score for the landing page (reklamveren/detayli-reklam-analizi) 

circle3 = your score for the click rate (reklamveren/detayli-reklam-analizi) 

kalanodeme = remaining budget

odeme = budget

turu = ads type

indirim = discount (0 = no discount, 1 = discount used)

durumu = activity status (0 = user disapproved, 1 = User approved)

aonay = admin approval (0 = admin disapproved, 1 = admin approved)

vtarih = Upload date

sontarih = finish day (Doesn't working)

