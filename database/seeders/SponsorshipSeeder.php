<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SponsorshipsData = [
            [

                "name" => "Base",

                "price" => 2.99,
                "length" => 24
            ],
            [
                "name" => "Premium",
                "price" => 5.99,
                "length" => 72
            ],
            [
                "name" => "Ultimate",
                "price" => 9.99,
                "length" => 144
            ]


        ];

        foreach ($SponsorshipsData as $SponsorshipData) {
            Sponsor::create($SponsorshipData);
        }
    }
}