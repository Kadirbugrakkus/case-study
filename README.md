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

### Adım 6: Görevleri Alma ve Atama

Projeyi çalıştırdıktan sonra bu adıma kadar veritabanı oluşturlmuş ve seedler eklenmiş olmalı, bunlardan sonrası için otomatik atama aktif hale getirilmeli aşağıdaki komutu çalıştırın:

```bash
php artisan schedule:work
```


### Not: Alma ve Atama

#### - Görevler manuel alınabildiği gibi schedule ile her dakika oluşturulur ve atanabilir. Ayrı ayrı komutları (console) aşağıda belirtilmiştir.

```bash
php artisan tasks:fetch
```

```bash
php artisan tasks:assignment
```

#### - Mock veriler için API oluşturuldu ancak Laravel'de Http Facede istekleri projenin kendisine yapıldığı takdirde hata verebiliyor, bundan dolayı ilgili satır incelemeniz için açıklama satırı haline getirildi ve "app" kullanılarak uygulamanın kendisine istek atıldı.

