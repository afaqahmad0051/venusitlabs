<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us')->insert([
            'title' => 'About Us',
            'description' => 'At VenusItLabs, we specialize in crafting innovative software solutions that drive business success. Our expert team delivers custom software development, web and mobile applications, and IT consulting services tailored to meet your unique needs. Committed to quality and excellence, we leverage cutting-edge technologies to help businesses streamline operations, enhance user experiences, and achieve their strategic goals. Partner with us to transform your vision into reality and stay ahead in a digital-first world.'
        ]);
    }
}
