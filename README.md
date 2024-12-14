<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Proje Kurulumu

Bu rehber, Laravel projenizin nasıl kurulacağına dair adımları içermektedir.

### Adım 1: Projeyi Klonlama

Projeyi GitHub üzerinden klonlamak için aşağıdaki komutu terminalinize yazın:

```bash
git clone https://github.com/Kadirbugrakkus/case-study.git
```

### Adım 2: Veritabanı Ayarları

Projeniz için bir veritabanı oluşturun. .env dosyasında belirtilen veritabanı ismini kullanarak MySQL ya da başka bir veritabanı yönetim sistemi üzerinden yeni bir veritabanı oluşturabilirsiniz.

### Adım 3: Composer Kurulumu

Projeyi klonladıktan sonra, projenin kök dizininde aşağıdaki komutu çalıştırarak gerekli paketleri yükleyin:

```bash
composer install
```

### Adım 4: Migration ve Seed

Veritabanı tablolarını ve gerekli seed'leri oluşturmak için aşağıdaki komutu çalıştırın:

```bash
php artisan migrate:fresh --seed
```


### Adım 5: Projeyi Çalıştırma

Projeyi çalıştırmak için aşağıdaki komutu çalıştırın:

```bash
php artisan serve
```

### Adım 6: Görevleri Atama

Önceki adımlardan sonra bu kısım her dakika Schedule ile atanmamış bir task varsa atama işlemini sağlayacak:

```bash
php artisan schedule:work
```

### Adım 7: Görevleri Alma

İlgili mock verileri (Task) veri tabanına iki farklı apiden olacak şekilde ekler :

```bash
php artisan task:fetch
```


### Not: HTTP Facede

#### - Mock veriler için API oluşturuldu ancak Laravel'de Http Facede istekleri projenin kendisine yapıldığı takdirde hata verebiliyor, bundan dolayı ilgili satır incelemeniz için açıklama satırı haline getirildi ve "app" kullanılarak uygulamanın kendisine istek atıldı.

