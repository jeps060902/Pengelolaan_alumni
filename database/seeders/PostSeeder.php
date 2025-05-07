<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Judul Pertama',
            'author' => 'Budi',
            'slug' => 'judul-pertama',
            'body' => 'Isi konten dari postingan pertama.'
        ]);
        Post::create([
            'title' => 'Mengoptimalkan Produktivitas di Era Digital',
            'author' => 'Jepss06',
            'slug' => 'mengoptimalkan-produktivitas-di-era-digital',
            'body' => 'Produktivitas menjadi salah satu kunci keberhasilan di era digital yang serba cepat. Dalam artikel ini, kita membahas cara mengelola waktu, memanfaatkan teknologi seperti aplikasi to-do list dan calendar, serta pentingnya istirahat teratur untuk menjaga fokus.'
        ]);
        
        Post::create([
            'title' => 'Tips Belajar Pemrograman untuk Pemula',
            'author' => 'Jepss06',
            'slug' => 'tips-belajar-pemrograman-untuk-pemula',
            'body' => 'Bagi pemula, belajar pemrograman bisa terasa menakutkan. Namun dengan pendekatan yang tepat, proses ini bisa menjadi menyenangkan. Gunakan platform seperti FreeCodeCamp, W3Schools, atau dokumentasi resmi. Mulailah dari dasar, pahami konsep, lalu lanjut ke proyek kecil.'
        ]);
        
        Post::create([
            'title' => 'Manfaat Meditasi bagi Kesehatan Mental',
            'author' => 'Jepss06',
            'slug' => 'manfaat-meditasi-bagi-kesehatan-mental',
            'body' => 'Meditasi telah terbukti secara ilmiah membantu mengurangi stres, meningkatkan konsentrasi, dan menjaga kestabilan emosi. Praktik meditasi 10-15 menit setiap hari bisa menjadi rutinitas sederhana namun berdampak besar bagi kesehatan mental kita.'
        ]);
        
        Post::create([
            'title' => 'Panduan Memulai Karier Freelance di Internet',
            'author' => 'Jepss06',
            'slug' => 'panduan-memulai-karier-freelance-di-internet',
            'body' => 'Karier sebagai freelancer menawarkan fleksibilitas dan potensi penghasilan yang besar. Namun, dibutuhkan disiplin, konsistensi, dan kemampuan membangun personal branding. Artikel ini membahas langkah-langkah awal seperti membuat portofolio, bergabung di platform freelance, dan teknik negosiasi.'
        ]);
        
        Post::create([
            'title' => 'Pentingnya Cybersecurity di Dunia Modern',
            'author' => 'Jepss06',
            'slug' => 'pentingnya-cybersecurity-di-dunia-modern',
            'body' => 'Dengan meningkatnya ketergantungan pada teknologi, ancaman terhadap data pribadi dan keamanan digital juga meningkat. Menjaga keamanan perangkat, menggunakan password kuat, serta memahami risiko phishing menjadi bagian penting dari literasi digital di era modern.'
        ]);
    }
}
