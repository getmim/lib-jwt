# lib-jwt

Adalah module yang memungkinkan encode/decode suatu nilai dengan metode JWT. Module ini
menggunakan extensi [cdoco/php-jwt](https://github.com/cdoco/php-jwt), sehingga keberadaan
ekstensi tersebut harus sudah terpasang di server. Jalankan perintah `mim app server` untuk
memastikan.

## Instalasi

Jalankan perintah di bawah di folder aplikasi:

```
mim app install lib-jwt
```

## Konfigurasi

Tambahkan konfigurasi jwt pada konfigurasi aplikasi/module seperti di bawah:

```php
return [
    'libJwt' => [
        // NONE
        // HS256        // HMAC
        // HS384        // HMAC
        // HS512        // HMAC
        // RS256        // RSA
        // RS384        // RSA
        // RS512        // RSA
        // ES256        // ECDSA
        // ES384        // ECDSA
        // ES512        // ECDSA
        'algorithm' => 'HS256',

        // khusus untuk algorithm
        // HS256, HS384, HS512
        'key' => 'random string'
    ]
];
```

Jika menggunakan algorithm dari kelompok `RSA` atau `ECDSA`, pastikan menambahkan 
file certificate sebagai berikut di folder `etc/cert/lib-jwt/`:

```
/etc/cert/lib-jwt/public.pem
/etc/cert/lib-jwt/private.pem
```

Untuk menggenerasi pem file untuk RSA, gunakan perintah:

```
ssh-keygen -t rsa -b 4096 -f private.pem
openssl rsa -in private.pem -pubout -outform PEM -out public.pem
```

Dan gunakan perintah di bawah untuk menggenerasi pem file untuk ECDSA:

```
openssl ecparam -genkey -name secp521r1 -noout -out private.pem
openssl ec -in private.pem -pubout -out public.pem
```

## Penggunaan

Module ini mendaftarkan satu library publik dengan nama `LibJwt\Library\Jwt`.
Dengan method sebagai berikut:

```php
use LibJwt\Library\Jwt;

$data = 'lorem';
$options = [
    'cert' => '', // optional
    'certFile' => '/path/to/private.pem' // optional
];
$token = Jwt::encode([
    'data' => :mixed,   // required
    'exp' => :int,      // optional
    'nbf' => :int,      // optional
    'iss' => :string,   // optional
    'aud' => :array,    // optional
    'jti' => :string,   // optional
    'iat' => :int,      // optional
    'sub' => :string,   // optional
], $options);
```

### encode(array $data, array $options=[]): ?string

### decode(string $data, array $options=[]): ?mixed

### lastError(): ?string

## Lisensi

Module ini menggunakan ekstensi eksternal. Silahkan mengacu pada 
projek [cdoco/php-jwt](https://github.com/cdoco/php-jwt) untuk lisensi.