<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // $faker = Faker\Factory::create();
        // $categories = Category::all();
        // foreach ($categories as $category) {
        //     for ($i = 0; $i < rand(-1, 10); ++$i) {
        //         $name = ucwords($faker->word);
        //         $stock = $faker->numberBetween(0, 100);
        //         $price = $faker->randomFloat(2, 5, 100);
        //         $summary = $faker->sentence();
        //         $description = $faker->paragraph();
        //         $image = $faker->imageUrl($width = 640, $height = 480);
        //         Product::create([
        //     'name' => $name,
        //     'stock' => $stock,
        //     'price' => $price,
        //     'description' => $description,
        //     'summary' => $summary,
        //     'image' => $image,
        //     'category_id' => $category->id,
        //     ]);
        //     }
        // }
        DB::table('products')->insert([                
                [
                'name'          => 'Buah Merah Mix',
                'stock'         => 999,
                'price'         => 350.00,
                'description'   => 'Essensa Naturale Flagship Product. Combination of Buah Merah, Mangosteen , Barley, Moringa, Guyabano and Wheat Grass. Buah Merah Mix is Proven to Helps Cure Many Types of Diseases and Viruses By Boosting Our Natural Immune System to Fight and Rebuld Again Damage Cells.',
                'summary'       => 1,
                'image'         => 'img/buahmerah.jpg',
                'category_id'   => 6
                ],
                [
                'name'          => 'Herbs Central 8 in 1 UNI',
                'stock'         => 999,
                'price'         => 250.00,
                'description'   => 'A Great Instant Coffee Especially Formulated for Coffee Drinkers who want MORE from their cup.',
                'summary'       => 1,
                'image'         => 'img/products/herbs-central-with-sachet.jpg',
                'category_id'   => 6
                ],
                [
                'name'          => 'Active Deo Plus',
                'stock'         => 999,
                'price'         => 300.00,
                'description'   => 'Active Deo Plus is an Antiperspirant roll on with natural whiteners that gives you 24 hr protection from wetness and odor. With DAILY USE your under arm will have a whiter and even more tone.',
                'summary'       => 1,
                'image'         => 'img/products/active-deo-plus.jpg',
                'category_id'   => 8
                ],
                [
                'name'          => 'Affirmative',
                'stock'         => 999,
                'price'         => 150.00,
                'description'   => 'Eau De Cologne Which is Non-Toxic, Zero Methanol Content and Infused with Essential Oils and Alkaline Ions that has a Long and Lasting Scent For 24 HR.',
                'summary'       => 1,
                'image'         => 'img/products/affirmative.jpg',
                'category_id'   => 1
                ],
                [
                'name'          => 'ONA Coffee UNI',
                'stock'         => 999,
                'price'         => 250.00,
                'description'   => 'A perfect Blend of the finest choice of Robusta Coffee Beans, Buah Merah Oil and Ganoderma Extracts. Each sachet is packed with vitamins and minerals. Proven Safe and Effective That Can Be Used in Long Term.',
                'summary'       => 1,
                'image'         => 'img/products/ona.jpg',
                'category_id'   => 6
                ],
                [
                'name'          => 'Whitening Soap',
                'stock'         => 999,
                'price'         => 250.00,
                'description'   => 'Whitens and Exfoliates skin making it smoot and even toned. Clinically Proven to Lessens the Apperance of scars and reduces age spots.',
                'summary'       => 1,
                'image'         => 'img/products/whitening-herbal-soap.jpg',
                'category_id'   => 9
                ],
                [
                'name'          => 'Anti-Bacterial Soap',
                'stock'         => 999,
                'price'         => 250.00,
                'description'   => 'Help Eliminate Bacteria and Other Skin Diseases While Cleansing the Skin. Speed up The Healing of External Wounds and Help Vanish Skin Irritations.',
                'summary'       => 1,
                'image'         => 'img/products/anti-bacterial-soap.jpg',
                'category_id'   => 9
                ],
                [
                'name'          => 'Moisturizing Soap',
                'stock'         => 999,
                'price'         => 250.00,
                'description'   => 'Soothes and nourishes the skin. Great Anti-Aging Property that can Help Diminish Stretch Marks by softening and revitilizing dead skins.',
                'summary'       => 1,
                'image'         => 'img/products/moisturizing-herbal-soap.jpg',
                'category_id'   => 9
                ],
                [
                'name'          => 'Grape Seed Oil Extract',
                'stock'         => 999,
                'price'         => 900.00,
                'description'   => 'Reduces bad Cholesterol and High Blood pressure. Strengthens the Immune System, bones and gums. Helps Delay Skin Aging. Firms and Tones muscles and skin. Helps Increase Sperm count. Improves Sexual and eye Health.',
                'summary'       => 1,
                'image'         => 'img/products/grapeseed.jpg',
                'category_id'   => 6
                ],
                [
                'name'          => 'Body Contouring Soap',
                'stock'         => 999,
                'price'         => 250.00,
                'description'   => 'Helps Increase metabolism and stimulates faster burning of excess fats. Also Helps Hydrates and detoxify the Skin.',
                'summary'       => 1,
                'image'         => 'img/products/body-contouring-herbal-soap.jpg',
                'category_id'   => 9
                ],
                [
                'name'          => 'La Merah Facial Wash',
                'stock'         => 999,
                'price'         => 360.00,
                'description'   => 'Natural Cleansing without clogging the pores. Helps Fight and Reduces Pimples and Blemishes. Safe For those Who Have Sensitive and Baby Skin. Also Helps Whitens Your Face. CLINICALLY PROVEN TO SEE RESULTS AFTER 6 DAYS USING LA MERAH SKIN CARE SET',
                'summary'       => 1,
                'image'         => 'img/products/la-merah-facial-wash.jpg',
                'category_id'   => 3
                ],
                [
                'name'          => 'La Merah Toner',
                'stock'         => 999,
                'price'         => 360.00,
                'description'   => 'A Natural Toner that can Hydrates and Rebalance the Skin Color. Deep Cleansing Excess Oil Also Helps Whitens and Rejuvinate skin. CLINICALLY PROVEN TO SEE RESULTS AFTER 6 DAYS USING LA MERAH SKIN CARE SET',
                'summary'       => 1,
                'image'         => 'img/products/la-merah-facial-toner.jpg',
                'category_id'   => 3
                ],
                [
                'name'          => 'La Merah Day Cream',
                'stock'         => 999,
                'price'         => 360.00,
                'description'   => 'Natural Sun Block and Moisturizing Cream. CLINICALLY PROVEN TO SEE RESULTS AFTER 6 DAYS USING LA MERAH SKIN CARE SET',
                'summary'       => 1,
                'image'         => 'img/products/la-merah-day-cream.jpg',
                'category_id'   => 3
                ],
                [
                'name'          => 'La mera Night Cream',
                'stock'         => 999,
                'price'         => 360.00,
                'description'   => 'Helps Exfoliate Dead Skin Cells and Softens the Skin at Night. Helps Reduced and Prevent Premature Wrinkles. CLINICALLY PROVEN TO SEE RESULTS AFTER 6 DAYS USING LA MERAH SKIN CARE SET',
                'summary'       => 1,
                'image'         => 'img/products/la-merah-night-cream.jpg',
                'category_id'   => 3
                ],
                [
                'name'          => 'Shampoo',
                'stock'         => 999,
                'price'         => 400.00,
                'description'   => 'Optimal Hair Care. Naturally Strengthens Hair, Adds Volume to Hair, Making it Soft, Shinny and Easy to Manage. Helps Fight Dandruff.',
                'summary'       => 1,
                'image'         => 'img/products/shampoo.jpg',
                'category_id'   => 8
                ],
                [
                'name'          => 'Conditioner',
                'stock'         => 999,
                'price'         => 400.00,
                'description'   => 'Optimal Hair Nutrition. Helps Repairs Damaged Hair, Prevents Dryness of Hair, Making it Easy to Comb and Manageable Hair.',
                'summary'       => 1,
                'image'         => 'img/products/conditioner.jpg',
                'category_id'   => 8
                ],
                [
                'name'          => 'Whitening Lotion',
                'stock'         => 999,
                'price'         => 400.00,
                'description'   => 'Natural And Organic Lotion that can Help Moisturize your Skin without Clogging your Skins Pores. Prevents Skin Dryness.Develop Soft and Smooth Skin that helps Whitens the Skin',
                'summary'       => 1,
                'image'         => 'img/products/lotion.jpg',
                'category_id'   => 8
                ],
                [
                'name'          => 'Andiroba',
                'stock'         => 999,
                'price'         => 350.00,
                'description'   => 'Natural Insect Skin Repellant. Also Works as Anti-Inflamattory Agent. Enriched with Natural Anti-Oxidants and moisturizer actives for complete protection.',
                'summary'       => 1,
                'image'         => 'img/products/andiroba.jpg',
                'category_id'   => 8
                ],
                [
                'name'          => 'Clean It Dish Washing Liquid',
                'stock'         => 999,
                'price'         => 140.00,
                'description'   => 'Environmental Friendly Dish Washing Liquid that is made from the peets of Citrus Fruits. D - LIMONENE is declared as GRAS (Generally Regarded As Safe) and non toxic according to FDA and toxic substance Control Act (TSCA)',
                'summary'       => 1,
                'image'         => 'img/products/dishwashing-liquid.jpg',
                'category_id'   => 7
                ],
                [
                'name'          => 'Clean It Powder Detergent',
                'stock'         => 999,
                'price'         => 200.00,
                'description'   => 'Natural Detergent that is Nature Friendly. Has Natural Degreaser also KILLS BACTERIA.',
                'summary'       => 1,
                'image'         => 'img/products/detergent.jpg',
                'category_id'   => 7
                ],
                [
                'name'          => 'Clean It Fabric Softener',
                'stock'         => 999,
                'price'         => 140.00,
                'description'   => 'Natural Fabric Softener that can Help You Iron Easily on Newly Washed Clothes.',
                'summary'       => 1,
                'image'         => 'img/products/fabric-softener.jpg',
                'category_id'   => 7
                ],
                [
                'name'          => 'Gen White Glutha Plus Collagen',
                'stock'         => 999,
                'price'         => 1200.00,
                'description'   => 'Combination of Gluthathione + Marine Collagen + Acerola. Most Powerful Antioxidant that protects your skin against aging. Also proven as effecient detoxifier.',
                'summary'       => 1,
                'image'         => 'img/products/genwhite.jpg',
                'category_id'   => 6
                ],
                [
                'name'          => 'Jan Carol Talcum Powder',
                'stock'         => 999,
                'price'         => 150.00,
                'description'   => 'Natural Talcum that has a Refreshing floral scent. Helps Reduce excessive sweat. Prevents Bedsored and Prevents skins Irritation. Jan Carol Talcum powder is perfect for keeping the skn dry as it helps to absorb moisture.',
                'summary'       => 1,
                'image'         => 'img/products/jan-carol.jpg',
                'category_id'   => 8
                ],
                [
                'name'          => 'Purity Feminine Wash',
                'stock'         => 999,
                'price'         => 300.00,
                'description'   => 'Safe for Delicate Areas of Woman. Purity Feminine Wash has an Antibacterial and Antiseptic properties that are especially formulated from Tea Tree Oil for a Complete feminine protection. It Also Aids to Control Irritation, discomfort from itchiness, yeast infection and UNPLEASANT ODOR.',
                'summary'       => 1,
                'image'         => 'img/products/purity.jpg',
                'category_id'   => 8
                ],
                [
                'name'          => 'Red Mint Lini Mint',
                'stock'         => 999,
                'price'         => 350.00,
                'description'   => 'Red Mint acts like WD40 , it brings back the lubrication that helps improves the mobility of our ball and socket. Recommended for Body Massage, Muscle Pain , Arthritis, Headache, Shoulder pain, Back pain, migraine etc.',
                'summary'       => 1,
                'image'         => 'img/products/linimint.jpg',
                'category_id'   => 8
                ],
                [
                'name'          => 'Hand Sanitizer',
                'stock'         => 999,
                'price'         => 160.00,
                'description'   => 'Natural and Organic Hand Sanitizer contains Anti-Bacterial Agent for immediate hand protection from gems. It has Wheat germ oil that reinforces the skins natural protective layer by its moisturizing action',
                'summary'       => 1,
                'image'         => 'img/products/sanitizer.jpg',
                'category_id'   => 8
                ],
                [
                'name'          => 'Simplicity Lightening Hydrogel',
                'stock'         => 999,
                'price'         => 400.00,
                'description'   => 'A unique gel form Simplicity Lightening Hydrogel contains Burberry Extracts which is a Natural Whitening Agent.',
                'summary'       => 1,
                'image'         => 'img/products/simplicity.jpg',
                'category_id'   => 8
                ],
                [
                'name'          => 'Velvet Sunblock',
                'stock'         => 999,
                'price'         => 150.00,
                'description'   => 'Moisture Cream with Sunblock contains nourishing and elasticising elements. It also helps to maitain moisture and restores the natural lipid layer of the skin silky and velvety.',
                'summary'       => 1,
                'image'         => 'img/products/uvblock.jpg',
                'category_id'   => 8
                ]
            ]);
    }
}