<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Electronics' => 'Electronic devices and accessories.',
            'Clothing' => 'Apparel and fashion accessories.',
            'Furniture' => 'Home and office furniture.',
            'Books' => 'Books and literature.',
            'Tools' => 'Tools and hardware.',
            'Groceries' => 'Food and household items.',
            'Toys' => 'Toys and games.',
            'Sports Equipment' => 'Equipment for various sports.',
            'Home Decor' => 'Decorative items for homes.',
            'Beauty Products' => 'Cosmetics and beauty accessories.',
            'Automotive' => 'Car parts and accessories.',
            'Pet Supplies' => 'Supplies for pets and animals.',
            'Stationery' => 'Office and school supplies.',
            'Outdoor Gear' => 'Equipment for outdoor activities.',
            'Health and Wellness' => 'Products related to health and wellness.',
            'Party Supplies' => 'Supplies for parties and events.',
            'Kitchen Appliances' => 'Appliances for the kitchen.',
            'Electrical Supplies' => 'Electrical components and supplies.',
            'Computer Hardware' => 'Hardware components for computers.',
            'Camping Gear' => 'Equipment for camping and hiking.',
            'Jewelry' => 'Various types of jewelry.',
            'Musical Instruments' => 'Instruments for playing music.',
            'Art and Craft Supplies' => 'Supplies for artistic and craft activities.',
            'Baby Products' => 'Products for infants and babies.',
            'Office Furniture' => 'Furniture for office spaces.',
            'Fitness Equipment' => 'Equipment for exercise and fitness.',
            'Video Games' => 'Games for various gaming platforms.',
            'Luggage and Travel Accessories' => 'Bags and accessories for travel.',
            'Medical Supplies' => 'Supplies for medical purposes.',
            'Hobbies and Collectibles' => 'Items related to hobbies and collectibles.',
            'Gardening Supplies' => 'Supplies for gardening and landscaping.',
            'Party Decorations' => 'Decorations for parties and events.',
            'DIY and Home Improvement' => 'Supplies for do-it-yourself projects and home improvement.',
            'Eyewear' => 'Glasses and other eyewear products.',
            'Home Appliances' => 'Appliances for various household needs.',
            'Musical Equipment' => 'Equipment for musical performances.',
            'Swimwear' => 'Swimsuits and related accessories.',
        ];

        $categoryName = $this->faker->randomElement(array_keys($categories));

        return [
            'name' => $categoryName,
            'description' => $categories[$categoryName],
            'created_at' => now(),
            'updated_at' => now(),
            'is_deleted' => false,
            'department_id' => $this->faker->numberBetween(1, 7)
        ];
    }
}
