<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus impedit odit ut amet facilis quas dolore, veritatis sunt fuga ipsa.',
            'contact' => 'contact',
            'termsofservice' => 'termsofservice',
            'privacypolicy' => 'privacypolicy',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('images')->insert([
            'name' => 'Google Logo',
            'image_url' => 'google.png',
            'reference' => 'http://localhost/phpmyadmin/sql.php?server=1&db=blog_origin&table=images&pos=0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('posts')->insert([
            'title' => 'Authentication dan authorization',
            'article' => '<p>
                    Authentication dan authorization adalah kunci untuk mendapatkan akses kepada resources corporate — banyak
                    jenis authentication method yang bisa diadopsi dengan keuntungan dan kerugiannya
                </p>
                <p>
                    Dalam suatu infrastuktur jaringan business atau corporasi yang berskala menengah dan besar, perhatian
                    terhadap perlindungan asset corporate yang berupa informasi begitu besarnya. Keamanan terhadap segala macam
                    ancaman jaringan maupun ancaman dari internet adalah yang paling utama. Adanya manajemen keamanan terhadap
                    informasi adalah seuatu keharusan, yang merupakan framework, procedure, kebijakan dan lain-lain yang
                    tujuannya adalah keamanan total terhadap asset informasi. Salah satu pintu masuk kompromi keamanan adalah
                    mendapatkan akses melalui authentication dan authorization.
                </p>
                <h1>Apa itu authentikasi?</h1>
                <p class="first">
                    Authentication adalah proses dimana seorang user (melalui berbagai macam akses fisik berupa komputer ,
                    melalui jaringan , atau melalui remote access ) mendapatkan hak akses kepada suatu entity (dalam hal ini
                    jaringan suatu corporate). Seorang user melakukan login kedalam suatu infrastruktur jaringan dan sistem
                    mengenali user ID ini dan menerimanya untuk kemudian diberikan akses terhadap resources jaringan sesuai
                    dengan authorisasi yang dia terima.
                </p>
                <figure>
                    <img src="img/contoh.gif" alt="">
                    <a href="">Form-Based Authentication</a>
                </figure>
                <p>Metode authentication yang berbasis pada kerahasiaan informasi adalah:</p>
                <ul>
                    <li>Password/PIN: Hanya pemiliknya yang tahu password/pin.</li>
                    <li>Digital Certificate: Berbasis pada asymmetric cryptography yang mengandung informasi rahasia yaitu
                    private key.</li>
                </ul>
                <p>Pada session based authentication, server aka membuat session untuk user setelah user log in. Session id
                    akan disimpan di dalam cookie pada browser yang digunakan user. Selama user tetap dalam keadaan log in,
                    Cooki dapat dikirim pada setiap request yang dilakukan oleh user. Server lalu melakukan perbandingan dengan
                    session id yang disimpan pada cookie dengan informasi session yang disimpan pada memory untuk mengverifikasi
                    identitas user dan mengembalikan respon sesuai dengan status yang diberikan.</p>
                <h2>Token Based Authentication</h2>
                <p class="first">Terdapat banyak aplikasi web menggunakan JSON Web Token (JWT) dibandingkan sessions untuk
                    authentication. Pada aplikasi token based, server akan membuat JWT dengan rahasia dan mengirim JTW kepada
                    client. Client kemudian menyimpan JTW (biasanya pada local storage) dan memasukan JWT kedalam headers untuk
                    setiap request yang dilakukan oleh client. Server kemudian akan memvalidasi JWT pada setiap request yang
                    dilakukan clinet dan mengembalikan respons yang sesuai.</p>
                <p>Perbedaan yang sangat besar disini adalah user’s state tidak disimpan di dalam server, akan tetapi disimpan
                    didalam token pada sisi client. Sebagian besar aplikasi web modern menggunakan JWT untuk authentication
                    dengan alasan scalabilty dan mobile device authentication.</p>',
            'category' => 'blog',
            'tag' => 'Auth Aja, Kuy lah, mabar.',
            'thumbnail' => 'google.png',
            'uploader' => 1,
            'url' => 'authentication-dan-authorization',
            'status' => true,
            'view' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
