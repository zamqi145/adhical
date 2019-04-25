-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 25 Nis 2019, 21:30:43
-- Sunucu sürümü: 5.7.26
-- PHP Sürümü: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `adhicalc_reklam`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `acikarayan`
--

CREATE TABLE `acikarayan` (
  `id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `tekrar` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `tarih` date NOT NULL,
  `saat` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `acikarayanuser`
--

CREATE TABLE `acikarayanuser` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `url` varchar(255) NOT NULL,
  `tekrar` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `saat` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `alicibilgi`
--

CREATE TABLE `alicibilgi` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `hesapsahibi` varchar(50) CHARACTER SET latin5 NOT NULL,
  `banka` varchar(30) CHARACTER SET latin5 NOT NULL,
  `kartno1` varchar(4) NOT NULL,
  `kartno2` varchar(4) NOT NULL,
  `kartno3` varchar(4) NOT NULL,
  `kartno4` varchar(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin5 NOT NULL,
  `description` varchar(300) CHARACTER SET latin5 NOT NULL,
  `keywords` varchar(500) CHARACTER SET latin5 NOT NULL,
  `hakkimizda` text CHARACTER SET latin5 NOT NULL,
  `asbaslik1` varchar(500) CHARACTER SET latin5 NOT NULL,
  `asaciklama1` varchar(2500) CHARACTER SET latin5 NOT NULL,
  `asslider1` varchar(500) NOT NULL,
  `asslider2` varchar(500) NOT NULL,
  `rvslider1` varchar(500) NOT NULL,
  `rvslider2` varchar(500) NOT NULL,
  `rvslider3` varchar(500) NOT NULL,
  `y1` float NOT NULL,
  `y2` float NOT NULL,
  `y3` float NOT NULL,
  `r1` float NOT NULL,
  `r2` float NOT NULL,
  `r3` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `title`, `description`, `keywords`, `hakkimizda`, `asbaslik1`, `asaciklama1`, `asslider1`, `asslider2`, `rvslider1`, `rvslider2`, `rvslider3`, `y1`, `y2`, `y3`, `r1`, `r2`, `r3`) VALUES
(1, 'Ana Sayfa - Adhical Reklam Sistemi', 'Reklam veren ve reklam yayıncıları için internet reklamcılığında en iyi hizmeti sağlamaya çalışan yerli reklam sistemi.', 'reklam, reklam yönetimi, reklam al, reklam ver, reklam veren, reklam yayıncısı, internet reklamı, internet reklamcılığı, web site tanıtımı, ürün tanıtımı, internete reklam verme, reklam şirketi, sitene reklam al, reklam sistemi', 'Adhical Reklam Sistemi 26 Mart 2018 tarihinde kullanıcılarımız ile buluştuk. Ayrıca size daha iyi hizmet verebilmek için kendi kârımızı olabildiğince azalttık.<br />\r\nŞuanda ise reklam veren ve reklam yayıncılarımızın daha verimli reklam analizlere ulaşabilmesi için sistemimizi olabildiğince geliştiriyoruz.', 'Adhical Reklam Sistemi', 'Adhical Reklam Sistemi ile hangi sitede reklamım daha etkili olur kaygısından ya da hangi siteden daha çok gelir elde edebilirim kaygısından kurtulabilirsiniz.  Adhical Reklam Sisteminde reklam veren olun ve inanılmaz kitlelere en uygun ücretle, en uygun yerlerde reklamlarınızın görüntülenmesini sağlayın. Üstelik görüntülenmeler için de ödeme almıyoruz. Hemen kayıt olun ve bu imkanlardan yararlanmaya başlayın.\r\n\r\n', 'img/726x500/1.png', 'img/726x500/2.png', '../img/595x460/1.png', '../img/595x230/1.png', '../img/595x230/2.png', 0.2, 0.25, 0.3, 0.25, 0.35, 0.45);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bildirimler`
--

CREATE TABLE `bildirimler` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bildirim` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `konu` varchar(1000) CHARACTER SET latin5 NOT NULL,
  `icerik` text CHARACTER SET latin5 NOT NULL,
  `description` varchar(400) CHARACTER SET latin5 NOT NULL,
  `keywords` varchar(750) CHARACTER SET latin5 NOT NULL,
  `resim` varchar(750) NOT NULL,
  `resim2` varchar(750) NOT NULL,
  `okunma` int(11) NOT NULL,
  `seven` int(11) NOT NULL,
  `sevmeyen` int(11) NOT NULL,
  `yazan` int(11) NOT NULL,
  `seourl` varchar(1100) NOT NULL,
  `atarih` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`id`, `kategori`, `konu`, `icerik`, `description`, `keywords`, `resim`, `resim2`, `okunma`, `seven`, `sevmeyen`, `yazan`, `seourl`, `atarih`) VALUES
(1, '1', 'İnternette Nasıl Daha Verimli Reklam Verilir?', '<p style=\"font-size: 17px\">\"İnternet reklamcılığı alanında reklam verirken nelere dikkat edilmeli?\", \"İnternet reklamcılığı alanında nasıl daha verimli reklamlar verebilirim?\", \"İnternet reklamcılığı alanında verdiğim reklamlar nasıl daha etkili olur?\" ya da \"Reklam vermeye ne zaman başlamalıyım?\" sorularının cevabını sizin de merak ettiğinizi düşünüyorum. Eğer bu ve bu tarz soruların cevabını merak ediyorsanız bu yazımızı baştan sona okumanızı şiddetle tavsiye ediyoruz :)</p>\r\n<h3>İnternet reklamcılığı nedir?</h3><br />\r\n<p style=\"font-size: 17px;\">Sorularımıza geçmeden önce internet reklamcılığının ne olduğundan bahsetmek istiyorum. İnternet reklamcılığı sektörü aslında hepimizin bildiği internet reklamlarıdır. Bu şekilde söyleyince çoğumuza çok basit geliyor olabilir çünkü çoğumuz reklam vermekte ne zorluk olabilir, resim hazırlayıp görüntülü reklam veriyoruz bitiyor ya da metin hazırlayıp metin reklamları veriyoruz o kadar, düşüncesine kapılıyor olabilir ama tabi ki her sektörün de kendine göre zorlukları bulunuyor.</p> <br />\r\n<p style=\"font-size: 17px;\">Öncelikle şunu söylemeliyim ki internet reklamcılığı günümüzde gazete - televizyon gibi reklam alanlarından çok daha ucuzdur ve çok daha fazla kitleye erişim sunmaktadır.</p><br />\r\n<p style=\"font-size: 17px;\">Şimdi gelelim internet reklamcılığının zorluklarına. İnternette reklam verirken görsel kullanmaya özen göstermelisiniz çünkü insanların büyük bir kısmı yazıları okumayı sevmez ancak güzel bir görsel ve az yazı oranıyla reklam resminizin üstündeki yazıyı insanlara okutarak sizden haberdar olmanızı hatta müşteriniz olmasını sağlayabilirsiniz.</p> <br />\r\n<h3>İnternet reklamcılığı alanında reklam verirken nelere dikkat etmeliyim?</h3><br />\r\n<ol><li><p style=\"font-size: 17px;\">Görüntülü reklamları tercih etmenizi öneririz ayrıca reklam resminize çok dikkat etmelisiniz çünkü insanların görselde ki yazınızı okumasının tek sebebi reklam resminiz olabilir. En basitinden düşünürsek bir web sitesine girdiğinizde reklamlara normalde bakmazsınız hiç ilginizi çekmez hatta reklam alan site için kötü yorumlarda bulunabilirsiniz ama nadir de olsa denk geliyoruz, bazı reklamlar çok dikkatimizi çekiyor o reklamlarda yazan yazının tamamını okuyoruz hatta 2. kez karşımıza çıktığında yine okuyoruz işte bunun tek sebebi reklam resimlerinin bizlerin ilgisini çekmesidir. Kısaca bir reklam resmiyle web sitenizden nefret de ettirebilirsiniz, hiç düşünülmeye de bilirsiniz, çok seviledebilirsiniz. Başka bir noktadan da bakmak gerekirse önemli olan akılda kalmaktır yani reklam resminiz şık ve ilgi çekici olursa akılda kalıcı olursunuz. Aslında çok itici de olursanız akılda kalırsınız hatta bazı firmalar itici reklamlarla akılda kalmaktadır. Son cümlemi okuduktan sonra aklınızdan \"şu firmanın da reklamları amma sinir bozucuydu\" dediğinizi duyar gibiyim işte bakın o firma sizin aklınızda kalmış. Öyle bir şey olmadı derseniz açın televizyonunuzu ve kanalları gezin illaki bir reklam sizin sinirlerinizi bozar ve hemen kanalı değiştirirsiniz :)</p></li><br />\r\n<li><p style=\"font-size: 17px;\">Bir önceki maddede de belirttiğim gibi dikkat etmeniz gereken bir diğer şey de reklam resminizin üzerindeki yazıdır. Reklam resminiz gayet güzel olabilir ama insanlar sadece reklam resminiz güzel diye sizi tercih etmezler. Reklam resminiz reklamınız üzerindeki yazıyı okumalarını sağlar ve bunun için dikkat çeker, reklamlarınız üzerindeki yazı da reklamlara tıklaması için insanları tetikler bunun sonucunda artık kullanıcı web sitenizi ziyaret etmiştir son hamle olarak da web sitenizi beğendirirseniz kullanıcı artık potansiyel müşterinizdir.</p></li></ol><br />\r\n<h3>Reklam vermeye ne zaman başlamalıyım?</h3><br />\r\n<p style=\"font-size: 17px;\">Henüz yeni bir işletmeyseniz reklam vermeye hemen başlamayın. Önce sosyal medya üzerinden takipçi edinip görüşlerini alın. Web siteniz üzerindeki eksikleri tamamlayın ve web sitenizden emin olduğunuzda reklam vermeye başlayın. İlk başta web sitenizi tanıtırken masraf yapmak zorunda değilsiniz bunu sakın unutmayın. Elbette reklam vermek sizi daha geniş bir kitleye ulaştırır ancak öncelikle sosyal medyada bir konum edinmeye çalışın. Bunun için özgün ve yaratıcı fikirler bulun. Daha çok önceden kullanılmamış ve dikkat çeken şeyler arayın... Herkesin yaptığı bir şey bile olsa çekiliş yapmaktan korkmayın ve çekiliş için çok fazla madde eklemeyin sizin için sayfanızı takip etmesi, gönderiyi beğenmesi ve 3 kişiyi etiketlemesi yeterli olabilir. Örneğin bunu instagram üzerinden yaparsanız keşfette çıkma şansınız arttığı gibi insanlar artık sayfanızı takip edecek ve 3 kişiye de sizin için çekilişin haberini vermiş olacak. Maddeler ne kadar azalırsa katılımcınız o kadar artar. Kullanıcılarınıza 10-15 madde sunarsanız ya da her sosyal medyadan sizi takip etmesini zorunlu tutarsanız çekilişinize büyük ihtimalle katılmayacaktır :)</p><br />\r\n<h3>İnternet reklamcılığı alanında nasıl daha verimli reklamlar verebilirim?</h3><br />\r\n<p style=\"font-size: 17px;\">Aslında yukarıda bahsettiğimiz maddeler bu sorunun da cevabı sayılabilir. Ancak reklam verirken deneme yapmalısınız. Bu reklamı oluşturdum oldu olayına getirmeyin. Reklam resminiz ya da reklam yazınız size göre güzel olsa da kullanıcılarınız için umduğunuz kadar dikkat çekici olmayabilir. Bu yüzden reklam verirken öncelikle 20 TL civarında 3-5 adet reklam oluşturun. Daha sonra bu reklamlardan en verimli iki tanesi için analiz çıkarmaya başlayın. Analiz çıkarırken ilk önce reklamlarınızdan beklediğiniz verimi alıp alamadığınızı yani dönüşüm oranlarını göze alın. Eğer beklediğiniz dönüş oranından çok daha düşük olduysa hatta o reklamın masrafını bile karşılamadıysa daha fazla reklam denemesi yaparak ideal reklamınızı arayabilirsiniz. Eğer beklediğiniz dönüş oranınızı sağladıysa ve bu 2 reklam dönüşüm oranı arasındaki fark fazla değilse 2 reklamı birden kullanıp uzun vade de değerlendirme yapıp son kararı verebilirsiniz ama aradaki fark fazlaysa en iyi dönüşüm aldığınız reklam ile devam etmenizi önerebiliriz. Bu reklamı yayınlarken aklınıza o zamana uygun daha çok ilgi çekecek reklam fikri gelirse deneme reklamı vermekten çekinmeyin çünkü beklediğinizden daha iyi dönüşüm oranı sunabilir.</p><br />\r\n<p style=\"font-size: 17px;\">Yazımızı okuduğunuz için sizlere çok teşekkür ederiz. Diğer yazılarımıza da blog bölümümüzden göz atabilirsiniz.</p>', 'İnternette nasıl daha verimli reklam vereceğinizi anlattığımız blog yazımız.', 'internette reklam vermek, internette nasıl daha verimli reklam verilir, internette daha verimli reklam vermek, reklam vermeye ne zaman başlamalıyım, internet reklamcılığı alanında reklam verirken nelere dikkat edilmeli', 'https://www.adhical.com/img/blogresmi/1.png', 'https://www.adhical.com/img/blogresmi/2.png', 968, 0, 0, 1, 'internette-nasil-daha-verimli-reklam-verilir', '2018-09-04'),
(2, '2', 'Yüksek Kazanç Sağlamak için Reklam Yerleşimi Nasıl Olmalı?', '<p style=\"font-size: 17px\">\"Web siteye reklam yerleşimi nasıl yapılır?\", \"Web sitenin nerelerine reklam yerleştirilmeli?\" ya da \"Web sitem üzerinden nasıl daha fazla gelir elde edebilirim?\" sorularının cevabını sizin de merak ettiğinizi düşünüyorum. Eğer bu ve bu tarz soruların cevabını merak ediyorsanız doğru konuya girdiniz. Bu yazımızı baştan sonra okumanızı şiddetle tavsiye ediyoruz :)</p>\r\n<h3>Reklamı yerleştirdiğimiz yer önemli mi?</h3><br />\r\n<p style=\"font-size: 17px;\">Konunun başında belirttiğim sorulara geçmeden önce bu soruya cevap vermek istiyorum. Reklamı yerleştirdiğiniz yer gerçekten çok önemlidir. Reklam yerleşiminizi doğru yaparsanız gelirinizi 3-4 kat arttırabilirsiniz. Şimdi bunun sebeplerini açıklayalım. Hep beraber biraz düşünelim. Reklam firmalarından en çok görüntüleme başı mı yoksa tıklama başı mı ödeme alıyorsunuz? İstisnasız hepimizin cevabı tıklama başı olmuştur. Eğer reklam yerleşiminiz doğru olmazsa reklamlarınız belki fark edilmez bile bu yüzden tıklama oranınız çok düşük olur. \"Peki biz nasıl kullanıcılarımızın reklamlara tıklamasını sağlayabiliriz?\", \"Bu konuda bizim yapabileceğimiz bir şey yok reklam verenin reklamına bağlı, ilgi çekmesine bağlı.\" diyorsanız en baştan elendiniz. Lütfen konumuzu dikkatlice okumaya devam edin...</p>\r\n<h3>Tıklama sayımızı nasıl arttırabiliriz?</h3><br />\r\n<p style=\"font-size: 17px\">Tıklama sayımızı arttırmanın yolu aslında o kadar da zor değil. Şimdi ilk maddemiz ile düşünmeye devam edelim..</p>\r\n<ul><li><p style=\"font-size: 17px;\">Kullanıcılarınızın reklama tıklaması için önce reklamı görmesi lazım değil mi? O zaman reklamları alt bölümün (footer) bile altına yerleştirenler çok büyük hata yapıyor ve bundan vazgeçmek zorundalar diyebiliriz aksi halde gelirleri büyük ihtimalle kat kat azalacaktır çünkü kullanıcılarınız alt bölüme kadar bile nadiren inerken onun da altına inmeleri ve reklamın dikkatlerini çekmesi olabildiğince zordur.</p></li>\r\n<li><p style=\"font-size: 17px;\">Hatalı reklam yerleşim alanlarına bolca değindik ama nereye reklam yerleşiminin yapılmasının doğru olacağından hiç bahsetmedik. Gelelim nereye reklam yerleşimi yapacağımıza. <br />Web sitemize giren kullanıcılar alt bölümün altına ve o tarz alttaki alanlara bakmıyor tamam bunu anladık ama peki nereye bakıyorlar?<br /> Evet, tabi ki de site açıldığında ilk olarak üst bölümü gördükleri için bu alana zorunlu olarak bakıyorlar yani üst bölümde logomuzun yanına (üst bölümün sol tarafına logo koymak, sağ tarafına reklam koymak çokça tercih edilen bir yöntemdir) reklamınızı rahatlıkla yerleştirebilirsiniz. <br />Peki sadece bu alana mı reklam yerleşimi yapacağız? <br />Tabi ki de sadece 1 adet reklam yerleştirerek işimizi bitirmeyeceğiz diğer alanları web sitenizin analizini inceleyerek en çok ziyaret edilen sayfalara yapabilirsiniz örneğin bir blogsanız ve ya bir forumsanız konularınızın üst bölümüne (konu başlığınız ile içeriğinizin arasına) ya da içeriğinizin arasına (ilk paragraftan hemen sonra) reklamlarınızı koyabilirsiniz. Buralar en çok dikkat çeken noktalar olacaktır.</p></li>\r\n<li><p style=\"font-size: 17px\">Bu alanlar dışında kenar çubuğunuza da (sidebar) reklam ekleyebilirsiniz. Çünkü kullanıcı içeriğinizi okurken kenar çubuğunuzdaki reklamlarda dikkatini çekebilir.</p></li></ul><br />\r\n<p style=\"font-size: 17px\">Yazımızı okuduğunuz için sizlere çok teşekkür ederiz. Diğer yazılarımıza da blog bölümümüzden göz atabilirsiniz.</p>', 'Web sitenize aldığınız reklamlardan nasıl daha fazla gelir sağlayabileceğinizi anlattığımız blog yazımız.', 'web siteye reklam yerleşimi nasıl olmalı, web siteye reklam yerleşimi yapma, web siteye reklam nasıl yerleştirilmeli, web siteye reklam yerleşimi, reklam yerleşimi', 'https://www.adhical.com/img/blogresmi/3.png', 'https://www.adhical.com/img/blogresmi/4.png', 481, 0, 0, 1, 'yuksek-kazanc-saglamak-icin-reklam-yerlesimi-nasil-olmali', '2018-09-05'),
(3, '1', 'İnternette Web Site Reklamı Nasıl Yapılır?', '<p style=\"font-size: 17px\">\"Ücretsiz web site reklamı nasıl yapılır?\", \"Web site reklamı yaparken nelere dikkat edilmeli?\" ve \"İnternette nasıl reklam verilir?\" gibi soruları merak ediyorsanız konumuzu baştan sona dikkatlice okuyun :)</p>\r\n<p style=\"font-size: 17px;\">Öncelikle evet, yanlış anlamadınız web sitenizin reklamını ücretsiz yapabilirsiniz. Peki nasıl mı? Hadi daha fazla uzatmadan konuya geçelim.</p>\r\n<p style=\"font-size: 17px;\">Öncelikle söylemeliyim ki reklam sadece ücretli olarak web sitelerde ya da sosyal medyadan reklam oluşturarak yapılmaz. Peki nasıl yapılır?</p>\r\n<h3>Ücretsiz web site reklamı nasıl yapılır?</h3><br />\r\n<p style=\"font-size: 17px;\">Sitenizin tanıtımını sosyal medya üzerinden, forumlar aracılığıyla ve SEO yöntemleri ile yapabilirsiniz. Şimdi de biraz bunlardan bahsedelim.</p>\r\n<p style=\"font-size: 17px;\">Sosyal medya üzerinden web siteniz ile çözüm bulduğunuz konudaki gruplara girerek web sitenizden yararlı bölümleri paylaşıp altına link ekleyerek web sitenizi tanıtabilir ve bu sayede ziyaretçi sayınızı arttırabilirsiniz.</p>\r\n<p style=\"font-size: 17px;\">Forumlarda web siteniz için tanıtım yazıları paylaşabilir, hizmet verdiğiniz alanda soruları olan kişilere cevap verirken cevabınızın altına kaynak olarak web sitenizi ekleyerek web sitenizi tanıtabilirsiniz ve bu sayede de ziyaretçi sayınızı arttırabilirsiniz.</p>\r\n<p style=\"font-size: 17px;\">Son olarak ta SEO (Arama Motoru Optimizasyonu) ile ziyaretçi sayınızı arttırabilirsiniz. Kısaca SEO ikiye ayrılır. İç SEO ile web sitenizi arama motorlarına daha kolay tanıtabilir ve bu sayede arama sonuçlarında üst sıralarda gözükebilirsiniz. Dış SEO ile de yani başka sitelerden backlink alarak o sitenin ziyaretçilerine kendinizi tanıtabilir, o sitedeki backlink/tanıtım yazınızın indexlenmesinden sonra arama motorlarında da gözükerek daha çok ziyaretçi çekebilir ve ziyaretçilerinizin gözündeki güveni arttırabilirsiniz. </p>\r\n<p style=\"font-size: 17px;\">Reklam bütçeniz varsa internette nasıl reklam verilir konumuzu okumaya devam edin.</p>\r\n<h3>İnternette nasıl reklam verilir?</h3><br />\r\n<ol>\r\n<li><p style=\"font-size: 17px;\">İnternette reklam vermek için herhangi bir reklam sistemine üye olunuz. Tabi ki de kendi <a href=\"https://www.reklaminiz.com/\">reklam sistemi</a>mizi öneriyoruz :)</p></li>\r\n<li><p style=\"font-size: 17px;\">Üye olduğunuz reklam sistemine giriş yapın.</p></li>\r\n<li><p style=\"font-size: 17px;\">Artık reklam sisteminde ilk reklamınızı oluşturmaya başlayabilirsiniz.</p></li>\r\n<li><p style=\"font-size: 17px;\">Eğer ilk defa internet reklamı veriyorsanız reklam bilgilerinize lütfen çok dikkat edin! Ayrıca daha verimli reklam vermek için <a href=\"https://www.reklaminiz.com/blog?konu=internette-nasil-daha-verimli-reklam-verilir\"><b>internette nasıl daha verimli reklam verilir?</b></a> makalemizi okuyabilirsiniz.</p></li>\r\n<li><p style=\"font-size: 17px;\">Reklam verirken size bazı sorular sorulacak. Bu soruları açıklayarak beraber dolduralım.</p></li>\r\n</ol>\r\n<h3>Hangi reklam türünü kullanmalıyım?</h3><br />\r\n<ul>\r\n<li><p style=\"font-size: 17px;\"><b>Görüntülü Reklam:</b> Reklam resminiz varsa görüntülü reklamı kullanmanızı öneririz. Görüntülü reklam verirseniz yüklediğiniz resim yayıncılarımızın web sitesinde gözükecektir.</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Düz Metin Reklam:</b> Düz metin reklam türünde reklam için eklediğiniz başlık ve açıklama alt alta gözükür.</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Yan Metin Reklam:</b> Yan metin reklam türünde reklam için eklediğiniz başlık ve açıklama yan yana gözükür.</p></li>\r\n</ul>\r\n<h3>Reklamınız reklam sistemimizde ilk reklamınızı oluşturun</h3><br />\r\n<ol>\r\n<li><p style=\"font-size: 17px;\">\"Reklamlarım\" menüsünden \"Reklam Ver\" seçeneğini seçtiğinizde size oluşturmak istediğiniz reklam türü sorulacaktır. Burada reklam türünüzü seçin.</p></li>\r\n<li><p style=\"font-size: 17px;\">Görüntülü Reklam Türünü Seçtiyseniz:</p><br />\r\n<ul>\r\n<li><p style=\"font-size: 17px;\"><b>Reklam Adı:</b> Reklam adınızı sadece siz görebilirsiniz. Bu yüzden baktığınızda hangi reklam olduğunu hatırlayacağınız reklam adı vermenizi öneririz. Örnek isim: 728x90 reklaminiz.com görüntülü reklamım</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Web Site Linki:</b> Reklam resminize tıklandığında kullanıcıların yönlendirileceği web site linki.</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Reklam Başlığı:</b> Kullanıcılar imleçlerini reklam resminizin üstüne getirdiğinde ekrana çıkacak ufak yazı.</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Bütçeniz:</b> Oluşturduğunuz reklam için harcanacak reklam bütçesi. Minimum 10 TL değerinde reklam verebilirsiniz.</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Reklam Boyutu:</b> Sistemimizde vereceğiniz reklam resminin boyutlarıdır. Bu boyutlara uygun olmayan reklam resimleri eklerseniz sizinle iletişime geçilecektir.</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Reklam Resmi:</b> Yayıncılarımızın web sitesinde gözükecek reklam resmi.</p></li>\r\n</ul>\r\n</li>\r\n<li><p style=\"font-size: 17px;\">Düz/Yan Metin Reklam Türünü Seçtiyseniz:</p><br />\r\n<ul>\r\n<li><p style=\"font-size: 17px;\"><b>Reklam Adı:</b> Görüntülü reklamda belirttiğimiz gibi reklam adını sadece siz görürsünüz.</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Reklam Başlığı:</b> Reklam metninizin başlığı.</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Reklam Açıklaması:</b> Reklam metninizin açıklaması.</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Web Site Linki:</b> Reklam metninize tıklandığında kullanıcıların yönlendirileceği web site linki.</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Bütçeniz:</b> Oluşturduğunuz reklam için harcanacak reklam bütçesi. Minimum 10 TL değerinde reklam verebilirsiniz.</p></li>\r\n<li><p style=\"font-size: 17px;\"><b>Reklam Boyutu:</b> Sistemimizde vereceğiniz reklam resminin boyutlarıdır. Bu boyutlara uygun olmayan reklam resimleri eklerseniz sizinle iletişime geçilecektir.</p></li>\r\n</ul>\r\n</li>\r\n</ol>\r\n<p style=\"font-size: 17px\">Yazımızı okuduğunuz için sizlere çok teşekkür ederiz. Diğer yazılarımıza da blog bölümümüzden göz atabilirsiniz.</p>', 'Ücretsiz web site tanıtımınızı ve web site reklamınızı nasıl yapacağınızı anlattığımız blog yazımız.', 'web sitesi reklamı, web site reklamı, ücretsiz web site reklamı nasıl yapılır, web sitesi reklamı nasıl yapılır, internete reklam vermek, internet reklamcılığı, sitemin reklamını nasıl yapabilirim, ücretsiz web site reklamı yapma, nasıl reklam yapılır', 'https://www.adhical.com/img/blogresmi/5.png', 'https://www.adhical.com/img/blogresmi/6.png', 771, 0, 0, 1, 'web-site-reklami-nasil-yapilir', '2018-09-08'),
(4, '1,2', 'Banner Nedir? | Web Siteye Banner Reklam Ekleme', '<p style=\"font-size: 17px;\"><b>Banner</b>, web site ve şirketlerin ürünlerini ya da kendilerini tanıtmak için hazırladıkları reklam çeşididir. Banner reklamların bir çok çeşidi vardır. Bu yazımızda en etkili reklam türlerini göreceksiniz.</p>\r\n<h2>Banner Reklam Tasarımı Hazırlanırken Nelere Dikkat Edilmeli</h2><br />\r\n<p style=\"font-size: 17px;\">Banner tasarım hazırlamak aslında herkesin yapabileceği bir şey değildir çünkü banner tasarımınız sitenizin tanıtımındaki en büyük role sahiptir.</p>\r\n<p style=\"font-size: 17px;\">Banner reklam tasarımı hazırlarken; </p><br />\r\n<ul>\r\n<li><p style=\"font-size: 17px;\">İçeriğinizi vurgulamasına, </p></li>\r\n<li><p style=\"font-size: 17px;\">Renklerin uyumlu olmasına ve reklam verdiğiniz siteye girildiği anda ziyaretçilere iticilik yaratmamasına,</p></li>\r\n<li><p style=\"font-size: 17px;\">Seçtiğiniz arka plan görselindeki yazı oranının fazla olmamasına,</p></li>\r\n<li><p style=\"font-size: 17px;\">Seçtiğiniz arka plan görselinin sizin içeriğinizi vurgulamasına çok dikkat etmelisiniz,</p> </li>\r\n<li><p style=\"font-size: 17px;\"> Örneğin reklam sistemiyseniz arka plan resminizde kullanıcılara para kazandığını gösteren bir resim olabilir. </p></li>\r\n</ul>\r\n<h2>Hareketli Banner Hazırlama</h2><br />\r\n<p style=\"font-size: 17px;\">Hareketli banner reklam hazırlamak sizin için güzel bir 2. adım hareketi olabilir. Peki <b>neden hareketli banner hazırlanmalı? </b></p>\r\n<ul>\r\n<li><p style=\"font-size: 17px;\">Hareketli banner reklamlar hareketsiz reklam resimlerine göre daha çok dikkat çeker,</p></li>\r\n<li><p style=\"font-size: 17px;\">daha fazla içerik sığdırabilirsiniz yani kayan yazı özelliğiyle ya da görsele sonradan gelen yazılar ile hem daha çok dikkat çekebilir hem de reklamınızdaki yazıların daha fazla okunmasını sağlayabilirsiniz.</p></li>\r\n</ul>\r\n<h2>Banner Reklam Çeşitleri Nelerdir?</h2><br />\r\n<p style=\"font-size: 17px;\"><b>Pop Under reklam çeşidi:</b> Reklama tıklandığında reklamın bulunduğu site gösterilmeye devam edilir, arka planda başka bir sekmede sizin reklamınız gösterilir. Bu reklam türü satış ve bu tarz türler için genelde etkili değildir ancak web sitenizin oturum süresini arttırmak için güzel bir yöntem de olabilmektedir.</p>\r\n<p style=\"font-size: 17px;\"><b>Roll Over reklam çeşidi:</b> Ziyaretçi imlecini reklamınızın üstüne getirdiğinde tıklanmadığında aşağıya doğru uzayan reklam türüdür. </p>\r\n<p style=\"font-size: 17px;\"><b>Commercial Break reklam çeşidi:</b> Ziyaret ettiğiniz web sitesi yüklenirken bir süreliğine tüm sayfayı kaplayacak şekilde gözüken reklamlardır.</p>\r\n<h2>Reklam Boyutları Nelerdir?</h2><br />\r\n<p style=\"font-size: 17px;\">Web sitemiz aracılığıyla kullanılan reklam boyutları;</p>\r\n<ul>\r\n<li><p style=\"font-size: 17px;\">728x90</p></li>\r\n<li><p style=\"font-size: 17px;\">336x280</p></li>\r\n<li><p style=\"font-size: 17px;\">320x100</p></li>\r\n<li><p style=\"font-size: 17px;\">300x250</p></li>\r\n<li><p style=\"font-size: 17px;\">300x600 boyutlarında reklamlar verebilirsiniz.</p></li>\r\n</ul>\r\n<h2>Web Siteye Banner Reklam Ekleme</h2><br />\r\n<p style=\"font-size: 17px;\">Web sitenize çok kolay bir şekilde reklam alabilirsiniz. Reklam sistemimizden reklam almak için lütfen aşağıdaki adımları takip edin;</p>\r\n<ul>\r\n<li><p style=\"font-size: 17px;\"><a target=\"_blank\" href=\"kayit-ol\">Kayıt olun</a>,</p></li>\r\n<li><p style=\"font-size: 17px;\">Giriş yapın,</p></li>\r\n<li><p style=\"font-size: 17px;\">Web sitelerim menüsünden \"Site Başvurusu Yap\" seçeneğine tıklayın, </p></li>\r\n<li><p style=\"font-size: 17px;\">Bilgileri doldurarak site başvurusu yap butonuna tıklayın,</p></li>\r\n<li><p style=\"font-size: 17px;\">Web sitenizin ana dizininde verilen isimde dosya oluşturun,</p></li>\r\n<li><p style=\"font-size: 17px;\">Kontrol Et butonuna tıklayın,</p></li>\r\n<li><p style=\"font-size: 17px;\">Reklamlarım menüsünden \"Reklam Oluştur\" seçeneğine tıklayın,</p></li>\r\n<li><p style=\"font-size: 17px;\">İstediğiniz özelliklerde reklam oluşturun,</p></li>\r\n<li><p style=\"font-size: 17px;\">Reklamlarım menüsünden \"Reklamlarım\" seçeneğine tıklayın,</p></li>\r\n<li><p style=\"font-size: 17px;\">Oluşturduğunuz reklamın reklam kodunu alın ve kodu anlatılan şekilde web sitenize ekleyin.</p></li>\r\n</ul><br />\r\n<p style=\"font-size: 17px;\">Bir sorunuz olursa yorumdan sorularınızı sorabilirsiniz. Bloğumuzu takip ettiğiniz için teşekkür ederiz.</p> ', 'Banner nedir, banner reklam nasıl oluşturulur, banner reklam tasarımı hazırlanırken nelere dikkat edilmeli ve hareketli banner reklam hazırlama konusunda merak ettiklerinizi cevapladığımız blog yazımız.', 'banner, banner reklam verme, banner ne demektir, banner çeşitleri, web siteye banner reklam ekleme, hareketli banner, hareketli banner hazırlama, banner reklam çeşitleri, reklam boyutları, banner reklam tasarımı hazırlanırken nelere dikkat edilmeli, banner boyutları, banner reklam, banner reklam tasarımı, hareketli banner', 'https://www.adhical.com/img/blogresmi/7.png', 'https://www.adhical.com/img/blogresmi/8.png', 589, 0, 0, 1, 'banner-nedir-web-siteye-banner-reklam-ekleme', '2018-09-14'),
(5, '1', 'Kategori Filtre Sistemi Eklendi - Reklamınız Reklam Sistemi', '<p style=\"font-size: 17px\"><b>Web site reklamı</b> veren reklam verenlerimiz için yeni özellikler ekledik..<br /> Artık reklam verirken kategori de seçebileceksiniz ve bu sayede reklamlarınızın gösterildiği kitle alanınızla daha ilgili bir kitle olacak.</p><p style=\"font-size: 17px\">Bu güncelleme sayesinde reklamlarınızın verimliliği artacak, reklam bütçeniz daha verimli harcanmış olacak.</p>\r\n<p style=\"font-size: 17px\">Sistemimiz hakkında bir sorunuz olursa bizimle iletişime geçebilirsiniz.</p>\r\n<p style=\"font-size: 17px\">Bloğumuzu takip ettiğiniz için teşekkür ederiz.</p>\r\n', 'Reklam sistemimize kategori filtreleme özelliği eklendi. Artık reklamlarınızda daha iyi hedeflendirilmiş kitlenize ulaşarak daha verimli reklamlar verebilirsiniz.', 'reklam sistemi, reklamınız reklam sistemi, internet reklamcılığı, reklam ver, kategori filtreleme', 'https://www.adhical.com/img/blogresmi/9.png', 'https://www.adhical.com/img/blogresmi/10.png', 450, 0, 0, 1, 'kategori-filtre-sistemi-eklendi-reklaminiz-reklam-sistemi', '2018-12-28'),
(6, '1', 'İnternette Reklam Verirken Dikkat Edilmesi Gerekenler', '<p style=\"font-size: 17px\">Merhaba bugün ki yazımızda <b>\'İnternette Reklam Verirken Dikkat Edilmesi Gerekenler\'</b> konusunda sizlerin bilgilenmesi için bildiklerimizi paylaşmak istedik. </p><br />\r\n<p style=\"font-size: 17px\">Konumuza geçmeden önce \"İnternette Reklam Yapmak Neden Bu Kadar Önemli\" sorusunu cevaplıyalım. </p><br />\r\n<p style=\"font-size: 17px\">Günümüzde neredeyse hayatımızın tamamına yön veren faaliyetlerin çoğunluğu internet ile beraber oluşturuluyor. İnternet artık markalar için bir platform olmaktan çıktı, markaların kendi alanlarında hedef kitlelerini ulaşabilmesi için \'İnternet Reklamcılığı\' büyük bir önem taşıyor. Ülkemizin 3\'te 1\'i internet ile bağdaş bir şekilde yaşıyor. Bu yüzden günümüzde bu kanallar arasında en çok tercih edilenlerden biri de \'İnternet Reklamcılığı\' oldu.</p><br />\r\n<p style=\"font-size: 17px\">Şimdi ise konumuza dönelim. Sitenizin ismini duyurmak ya da arama sonuçlarında daha üst sıralarda olması için sitenizin adına reklam verebilirsiniz. Peki reklam verirken nelere dikkat edeceğinizi sırasıyla inceleyelim;</p><br /><br />\r\n\r\n1. HEDEF KİTLE BELİRLEMEK.\r\nReklam vermeden önce Belirleyeceğiniz hedefin nereye veya kimlere hitap edeceğini belirlemeniz gerekiyor. Sizlere bir örnek ile izah edelim. Yeni bir alışveriş merkezini hedeflemeye karar verdiğinizi düşünün. Peki bu kitle hangi anahtar kelimeleri arıyor? Hangi sitelerde dolaşıyor? Bütün bunların analizini yapmak, reklamlarınızın daha iyi bir kitleye ulaşmasını sağlayabilir. \r\n\r\n2. ANAHTAR KELİMELERİNİ BELIRLEMEK.\r\nAnahtar kelimeler, kullanıcıların internette arama motorlarında yaptığı aramalarlarla eşleşir ve reklamlarınızı tetikler. Belirlediğiniz anahtar kelimelerin hedeflediğiniz kitledeki firma, ürün veya hizmetlerinizle bağlantılı olması gerekir. \r\n\r\n3. İNTERNET SİTENİZİN HIZINI KONTROL EDİN.\r\nİnternet sitenizin açılış hızı ziyaretçilerinize daha iyi bir deneyim sunabilmek ve internet sitenizde daha uzun kalmaları için açılış hızı çok önemlidir. Özellikle İnternet sitenize çektiğiniz her kullanıcı için bir ödeme yapıyorsanız, bu maddeyi fazlasıyla dikkate almalısınız. \r\n\r\n4. İNTERNET REKLAMCILIĞI\'NDA MOBİL UYUMLULUĞUNUN ÖNEMİ\r\nGünümüzde insanların büyük çoğunluğunda mobil araçlar mevcut ve haliyle sokakta yürüyen biri bile internete bağlanıp web sitelerine erişebiliyor. İnternet bir tık yanımızda yani. Durum böyle olunca mobilde reklamlarınızı vermeden önce internet sitenizin mobilde görünümü sade çok güzel ve açılış sayfalarının hızlı olduğuna dikkat etmelisiniz. Kullanıcı sitenize reklamdan gelirse uzun kalması için detaylı özgün bilgiler ve vermelisiniz ki reklamdan geldiği için harcanılan mevla boşa gitmesin. Bu sayede hem reklamdan giden para boşuna gitmemiş olur hem de size gerçek bir ziyaretçi gelmiş olur. \r\n\r\nYazımızın Sizlere Faydalı Olduğunu Umarak Sizlere Şimdilik Kolay Gelsin Diyoruz :).', 'İnternette reklam verirken dikkat edilmesi gereken konular ve detaylar.', 'reklam verirken dikkat edilmesi gerekenler, internette reklam vermek, nasıl daha verimli reklam verilir', 'https://www.adhical.com/img/blogresmi/9.png', 'https://www.adhical.com/img/blogresmi/10.png', 331, 0, 0, 1, 'internette-reklam-verirken-dikkat-edilmesi-gerekenler', '2019-02-25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogyorum`
--

CREATE TABLE `blogyorum` (
  `id` int(11) NOT NULL,
  `konuid` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin5 NOT NULL,
  `eposta` varchar(150) NOT NULL,
  `yorum` text CHARACTER SET latin5 NOT NULL,
  `onay` tinyint(1) NOT NULL DEFAULT '0',
  `tarih` date NOT NULL,
  `ip` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `blogyorum`
--

INSERT INTO `blogyorum` (`id`, `konuid`, `name`, `eposta`, `yorum`, `onay`, `tarih`, `ip`) VALUES
(1, 1, 'İbrahim', 'sabirliolun@gmail.com', 'son zamanlarda internette reklam vermek ile ilgili okuduğum yararlı ve nadir makalelerden. Eyvallah admin :)', 1, '2018-09-05', '176.227.104.218'),
(2, 4, 'Ahmet', 'ahmetalgan105@gmail.com', '728x90 banner resimlerinin tıklama başına fiyatı ne kadar?', 1, '2018-09-14', '212.154.23.116'),
(3, 4, 'Reklamınız Destek Ekibi', 'info@reklaminiz.com', 'Ahmet bey reklam tıklamaları için net bir fiyat yok. Bu yüzden sadece tıklama başı maliyet aralığını söyleyebilirim, tıklama başı bütçenizden 20-40 kuruş arasında kesinti yapılmaktadır.', 1, '2018-09-14', '78.184.0.62');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destek`
--

CREATE TABLE `destek` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `talepid` varchar(12) NOT NULL,
  `baslik` varchar(120) CHARACTER SET latin5 NOT NULL,
  `mesaj` varchar(1500) CHARACTER SET latin5 NOT NULL,
  `gonderici` int(11) NOT NULL,
  `ilkmesaj` int(11) NOT NULL,
  `durumu` int(1) NOT NULL,
  `tarih` date NOT NULL,
  `saat` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ggorme`
--

CREATE TABLE `ggorme` (
  `id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `tarih` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `ggorme`
--

INSERT INTO `ggorme` (`id`, `ip`, `tarih`) VALUES
(1, '94.101.87.41', '2019-04-25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `goripler`
--

CREATE TABLE `goripler` (
  `id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `reklamid` int(11) NOT NULL DEFAULT '0',
  `weblink` varchar(1000) NOT NULL,
  `anaurl` varchar(255) NOT NULL,
  `tarih` date NOT NULL,
  `saat` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `goripler`
--

INSERT INTO `goripler` (`id`, `ip`, `reklamid`, `weblink`, `anaurl`, `tarih`, `saat`) VALUES
(1, '94.101.87.41', 0, 'https://www.adhical.com/', 'www.adhical.com', '2019-04-25', '21:29:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gtiklama`
--

CREATE TABLE `gtiklama` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `tekrar` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `saat` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hesaplarimiz`
--

CREATE TABLE `hesaplarimiz` (
  `id` int(11) NOT NULL,
  `banka` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `hesapno` varchar(75) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` int(11) NOT NULL,
  `ad` varchar(80) CHARACTER SET latin5 NOT NULL,
  `eposta` varchar(80) CHARACTER SET latin5 NOT NULL,
  `tel` varchar(11) NOT NULL,
  `konu` varchar(30) CHARACTER SET latin5 NOT NULL,
  `mesaj` varchar(2500) CHARACTER SET latin5 NOT NULL,
  `tarih` date NOT NULL,
  `saat` varchar(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `durumu` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `kategoriadi` varchar(150) CHARACTER SET latin5 NOT NULL,
  `reklamsayisi` int(11) NOT NULL,
  `sitesayisi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kisatik`
--

CREATE TABLE `kisatik` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `tiksure` varchar(10) NOT NULL,
  `tekrar` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `saat` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kupon`
--

CREATE TABLE `kupon` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `harcama` int(11) NOT NULL,
  `kupon_miktari` int(11) NOT NULL,
  `kupon_kod` varchar(21) NOT NULL,
  `aktiflik_durumu` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odemeler`
--

CREATE TABLE `odemeler` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `reklamad` varchar(40) CHARACTER SET latin5 NOT NULL,
  `hesapad` varchar(75) CHARACTER SET latin5 NOT NULL,
  `odemeyapan` varchar(100) CHARACTER SET latin5 NOT NULL,
  `kartno` varchar(40) NOT NULL,
  `onay` int(1) NOT NULL,
  `odememiktari` float NOT NULL,
  `odemetarihi` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reklamlar`
--

CREATE TABLE `reklamlar` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ad` varchar(20) CHARACTER SET latin5 NOT NULL,
  `genislik` int(4) NOT NULL,
  `yukseklik` int(4) NOT NULL,
  `tiklanma` int(11) NOT NULL,
  `durumu` int(1) NOT NULL,
  `kod` text NOT NULL,
  `vtarih` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siteler`
--

CREATE TABLE `siteler` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `link` varchar(50) NOT NULL,
  `kategori` int(100) NOT NULL DEFAULT '14',
  `gosterimi` int(11) NOT NULL DEFAULT '0',
  `onaykodu` varchar(10) NOT NULL,
  `onayd` int(1) NOT NULL,
  `a_tarih` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tikipler`
--

CREATE TABLE `tikipler` (
  `id` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `url` varchar(50) NOT NULL,
  `tiklananid` int(11) NOT NULL,
  `fiyat` float NOT NULL,
  `kesilen` int(11) DEFAULT NULL,
  `gecerlilik` int(11) NOT NULL,
  `saat` varchar(10) NOT NULL,
  `tarih` date NOT NULL,
  `sehir` varchar(255) CHARACTER SET latin5 NOT NULL,
  `ulke` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `sifreistemehakki` int(11) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `url` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kazanc` float NOT NULL,
  `kalanharcama` int(11) NOT NULL DEFAULT '0',
  `harcama` int(11) NOT NULL,
  `gtiklama` int(11) DEFAULT '0',
  `eposta` varchar(255) CHARACTER SET latin1 NOT NULL,
  `veresiyeharcamasi` int(11) NOT NULL DEFAULT '0',
  `veresiyesuresi` int(11) NOT NULL DEFAULT '0',
  `veresiyelimiti` int(11) NOT NULL DEFAULT '0',
  `odemedurumu` tinyint(1) NOT NULL,
  `hesapturu` int(1) NOT NULL,
  `onay` int(1) NOT NULL,
  `yasaksebebi` varchar(2500) NOT NULL DEFAULT 'Yasaklı değil.',
  `siteonay` int(11) NOT NULL,
  `ktarih` date NOT NULL,
  `ip` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin5;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyarili`
--

CREATE TABLE `uyarili` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `uyari` varchar(255) CHARACTER SET latin5 NOT NULL,
  `yto` varchar(3) NOT NULL,
  `tarih` date NOT NULL,
  `saat` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `verilenreklamlar`
--

CREATE TABLE `verilenreklamlar` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ad` varchar(30) CHARACTER SET latin5 NOT NULL,
  `link` varchar(200) NOT NULL,
  `genislik` varchar(4) NOT NULL,
  `yukseklik` varchar(4) NOT NULL,
  `alt` varchar(400) CHARACTER SET latin5 DEFAULT NULL,
  `title` varchar(200) CHARACTER SET latin5 DEFAULT NULL,
  `baslik` varchar(300) CHARACTER SET latin5 DEFAULT NULL,
  `aciklama` varchar(1000) CHARACTER SET latin5 DEFAULT NULL,
  `resim` text,
  `kategori` int(11) NOT NULL,
  `gorme` int(11) NOT NULL,
  `tiklama` int(11) NOT NULL,
  `krs20` int(11) NOT NULL,
  `krs30` int(11) NOT NULL,
  `krs40` int(11) NOT NULL,
  `circle1` int(3) NOT NULL DEFAULT '0',
  `circle2` int(3) NOT NULL DEFAULT '0',
  `circle3` int(3) NOT NULL DEFAULT '0',
  `kalanodeme` float NOT NULL,
  `odeme` int(11) NOT NULL,
  `turu` int(11) NOT NULL,
  `indirim` int(11) NOT NULL,
  `durumu` int(11) NOT NULL,
  `aonay` int(11) NOT NULL,
  `vtarih` date NOT NULL,
  `sontarih` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yabancitik`
--

CREATE TABLE `yabancitik` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `link` varchar(255) NOT NULL,
  `url` varchar(500) NOT NULL,
  `sure` int(5) NOT NULL,
  `tiklananid` int(11) NOT NULL,
  `tekrar` int(11) NOT NULL,
  `sehir` varchar(255) NOT NULL,
  `ulke` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ysite`
--

CREATE TABLE `ysite` (
  `id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `ytarih` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `acikarayan`
--
ALTER TABLE `acikarayan`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `acikarayanuser`
--
ALTER TABLE `acikarayanuser`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `alicibilgi`
--
ALTER TABLE `alicibilgi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bildirimler`
--
ALTER TABLE `bildirimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blogyorum`
--
ALTER TABLE `blogyorum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `destek`
--
ALTER TABLE `destek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ggorme`
--
ALTER TABLE `ggorme`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `goripler`
--
ALTER TABLE `goripler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gtiklama`
--
ALTER TABLE `gtiklama`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hesaplarimiz`
--
ALTER TABLE `hesaplarimiz`
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kisatik`
--
ALTER TABLE `kisatik`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kupon`
--
ALTER TABLE `kupon`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odemeler`
--
ALTER TABLE `odemeler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `reklamlar`
--
ALTER TABLE `reklamlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siteler`
--
ALTER TABLE `siteler`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Tablo için indeksler `tikipler`
--
ALTER TABLE `tikipler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `eposta` (`eposta`);

--
-- Tablo için indeksler `uyarili`
--
ALTER TABLE `uyarili`
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `verilenreklamlar`
--
ALTER TABLE `verilenreklamlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yabancitik`
--
ALTER TABLE `yabancitik`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ysite`
--
ALTER TABLE `ysite`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `acikarayan`
--
ALTER TABLE `acikarayan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `acikarayanuser`
--
ALTER TABLE `acikarayanuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `alicibilgi`
--
ALTER TABLE `alicibilgi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `bildirimler`
--
ALTER TABLE `bildirimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `blogyorum`
--
ALTER TABLE `blogyorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `destek`
--
ALTER TABLE `destek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ggorme`
--
ALTER TABLE `ggorme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `goripler`
--
ALTER TABLE `goripler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `gtiklama`
--
ALTER TABLE `gtiklama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kisatik`
--
ALTER TABLE `kisatik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kupon`
--
ALTER TABLE `kupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `odemeler`
--
ALTER TABLE `odemeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `reklamlar`
--
ALTER TABLE `reklamlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `siteler`
--
ALTER TABLE `siteler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `tikipler`
--
ALTER TABLE `tikipler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `verilenreklamlar`
--
ALTER TABLE `verilenreklamlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yabancitik`
--
ALTER TABLE `yabancitik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ysite`
--
ALTER TABLE `ysite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
