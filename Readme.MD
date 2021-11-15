# ASSIGNMENT 6

## SYMFONY İLE İLİŞKİSEL VERİ YAPISI OLUŞTURMA (100 puan)
-	Akademisyenlerle ilgili bir sınıf oluşturulmalıdır. Oluşturulan bu sınıfta aşağıdaki öznitelikler bulunmalıdır.  
ad, soyad, uzmanlık  
-	Öğrencilerle ilgili bir sınıf oluşturulmalıdır. Oluşturulan bu sınıfta aşağıdaki öznitelikler bulunmalıdır.  
ad, soyad, ogrenciNo  
-	Derslerle ilgili bir sınıf oluşturulmalıdır. Oluşturulan bu sınıfta aşağıdaki öznitelikler bulunmalıdır.  
dersAdi, dersKodu, dersAciklamasi  

Projenizde bu sınıflara ait ilgili tabloları mutlaka oluşturunuz. Oluşturduğunuz tablolarda rastgele deneme amaçlı birkaç veri giriniz. Ekstra tablo kullanımı geliştiriciye bağlıdır.

### Örnek Veri:
- Akademisyen için: Muhammet, Çıralı, Semantik
- Öğrenci için: Cenk, Akıncı, 2104467
- Ders için: Nesnesel Tasarıma Giriş, CENG201, Nesneye yönelik progrlama ile kodlama pratikleri

### Örnek Çıktı:
- Akademisyen için: Verdiği derslerin listesi
- Öğrenci için: Aldığı derslerin listesi
- Ders için: Eğitimi veren akademisyen ve dersi alan öğrencilerin listesi

### Uygulamanızda aşağıdaki kriterler zorunludur:
- Bir öğrenci birden fazla ders alabilir.
- Bir akademisyen birden fazla ders verebilir.
- Her bir dersi aynı anda tek bir akademisyen verebilir.
- Uygulamanızda repository pattern kullanılması zorunludur.
- Uygulamada oluşacak öğrenci, akademisyen ve ders için ayrı ayrı sayfalar olmalıdır. URL'deki ilgili verinin IDsi verildiği zaman o veriye ait kayıtlar gelmelidir.

### Assignment için son teslim tarihi 31.10.2021 23:59:59'dur. Bu tarihten sonra teslim edilen projeler 0 puan olarak değerlendirilecektir.