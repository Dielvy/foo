<?php

namespace App\DataFixtures;

use App\Entity\Destination;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DestinationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $datas = [
            [
                'name' => 'Paris',
                'description' => 'Paris, the city of lights, offers breathtaking architecture, world-class museums, charming streets, and romantic river views along the Seine. A perfect blend of history, culture, and gastronomy.',
                'price' => 1200,
                'duration' => 5,
                'image' => 'paris.jpg'
            ],
            [
                'name' => 'Maldives',
                'description' => 'The Maldives is a tropical paradise with white sandy beaches, crystal-clear turquoise waters, luxurious overwater bungalows, vibrant coral reefs, and an idyllic atmosphere for relaxation and unforgettable experiences.',
                'price' => 3500,
                'duration' => 7,
                'image' => 'maldives.jpg'
            ],
            [
                'name' => 'Tokyo',
                'description' => 'Tokyo is a bustling metropolis where modernity meets tradition, featuring neon-lit streets, serene temples, world-class cuisine, advanced technology, vibrant fashion districts, and endless cultural experiences to explore.',
                'price' => 1500,
                'duration' => 6,
                'image' => 'tokyo.jpg'
            ],
            [
                'name' => 'New York',
                'description' => 'New York City, the city that never sleeps, is famous for its iconic skyline, bustling streets, Broadway theaters, world-class museums, diverse neighborhoods, and endless opportunities for adventure and entertainment.',
                'price' => 1800,
                'duration' => 5,
                'image' => 'newyork.jpg'
            ],
            [
                'name' => 'Rome',
                'description' => 'Rome, the eternal city, is rich with history, from ancient ruins like the Colosseum and Roman Forum to Renaissance art, majestic piazzas, charming streets, and delicious Italian cuisine that makes every visit unforgettable.',
                'price' => 1300,
                'duration' => 4,
                'image' => 'rome.jpg'
            ],
            [
                'name' => 'Bali',
                'description' => 'Bali, a tropical haven, offers lush rice terraces, stunning beaches, vibrant culture, ancient temples, luxurious resorts, and thrilling activities such as surfing, diving, and hiking, making it an ideal destination for relaxation and adventure.',
                'price' => 2000,
                'duration' => 7,
                'image' => 'bali.jpg'
            ],
            [
                'name' => 'Sydney',
                'description' => 'Sydney is a vibrant city known for its iconic Opera House, beautiful harbor, golden beaches, diverse cultural scene, thriving nightlife, and outdoor activities, offering a perfect mix of urban sophistication and natural beauty.',
                'price' => 2200,
                'duration' => 6,
                'image' => 'sydney.jpg'
            ],
            [
                'name' => 'Barcelona',
                'description' => 'Barcelona combines stunning architecture by Gaudí, rich history, beautiful beaches, vibrant street life, world-class cuisine, and cultural events, making it a city full of charm, energy, and unforgettable experiences for every traveler.',
                'price' => 1400,
                'duration' => 5,
                'image' => 'barcelona.jpg'
            ],
            [
                'name' => 'Tunis',
                'description' => 'Tunis, the historic capital of Tunisia, offers ancient medinas, impressive mosques, vibrant markets, rich history from Phoenician to Ottoman eras, beautiful Mediterranean coastline, and an authentic blend of culture, food, and tradition.',
                'price' => 1600,
                'duration' => 4,
                'image' => 'tunis.jpg'
            ],
        ];

        foreach ($datas as $data) {
            $destination = new Destination();
            $destination->setName($data['name']);
            $destination->setDescription($data['description']);
            $destination->setPrice($data['price']);
            $destination->setDuration($data['duration']);
            $destination->setImage($data['image']);
            $manager->persist($destination);
        }

        $manager->flush();
    }
}
