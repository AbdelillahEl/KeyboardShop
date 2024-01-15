<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Keyboard;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
            'name' => 'Admin', 
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'), 
            'role' => 'admin',
            
         ]);
         Faq::create([
            
                'id' => 1,
                'question' => 'What types of keyboards do you offer?',
                'answer' => 'We offer a wide range of keyboards, including mechanical, membrane, gaming, and ergonomic keyboards to suit various preferences.',
         ]);
         Faq::create([
            
                'id' => 2,
                'question' => 'Can I customize the key switches on my mechanical keyboard?',
                'answer' => 'Yes, many of our mechanical keyboards allow you to choose from different key switch options, such as Cherry MX, Razer, and more.',
         ]);
         Faq::create([
        
                'id' => 3,
                'question' => 'Do you provide warranty for your keyboards?',
                'answer' => 'Absolutely! All our keyboards come with a standard warranty. Please check the product details for specific warranty information.',
         ]);
         Faq::create([
            
                'id' => 4,
                'question' => 'Are the keyboards compatible with Mac and Windows operating systems?',
                'answer' => 'Yes, the majority of our keyboards are compatible with both Mac and Windows operating systems. Check the product specifications for detailed compatibility information.',
         ]);
         Faq::create([
            
                'id' => 5,
                'question' => 'How do I clean my keyboard?',
                'answer' => 'To clean your keyboard, we recommend using a can of compressed air to remove dust between the keys. For deeper cleaning, you can use a keycap puller and isopropyl alcohol. Always disconnect the keyboard before cleaning.',
         ]);
         Faq::create([
            
                'id' => 6,
                'question' => 'Can I return a keyboard if I\'m not satisfied with it?',
                'answer' => 'Yes, we have a hassle-free return policy. If you\'re not satisfied with your purchase, you can return it within a specified period for a refund or exchange. Check our return policy for more details.',
         ]);
         Faq::create([
            
                'id' => 7,
                'question' => 'Are there any discounts for bulk orders?',
                'answer' => 'Yes, we offer discounts for bulk orders. Contact our customer support for personalized assistance and pricing for bulk purchases.',
         ]);
         Faq::create([
            
                'id' => 8,
                'question' => 'How can I track my order?',
                'answer' => 'Once your order is shipped, you will receive a tracking number via email. You can use this tracking number to monitor the status and location of your package.',
         ]);
         Faq::create([
            
                'id' => 9,
                'question' => 'Do you offer international shipping?',
                'answer' => 'Yes, we offer international shipping. Shipping costs and delivery times vary depending on the destination. Please check our shipping information for details.',
         ]);
         Faq::create([
            
                'id' => 10,
                'question' => 'Can I get technical support for my keyboard?',
                'answer' => 'Absolutely! If you encounter any technical issues or need assistance with your keyboard, our customer support team is available to help. Contact us via email or phone for prompt assistance.',
         ]);
         

        
        
        
         Keyboard::create(
            [
                'id' => 1,
                'user_id' => 11,
                'title' => 'Mechanical Keyboard',
                'description' => 'High-quality mechanical keyboard with customizable RGB lighting.',
                'price' => 120,
                'switches'=> 'Mx Brown lightweight Switches',  
                'details'=> 'The "Mechanical Keyboard" is a flagship product that redefines your typing experience. Crafted with precision, it features high-quality mechanical switches that offer a tactile and audible feedback. The customizable RGB lighting allows you to set the mood of your workspace, with millions of color options to choose from. This keyboard is not just a tool; its a statement of your commitment to excellence in every keystroke.',
                'image' => 'basic.png',
            ]
         );
         Keyboard::create(
            [
                'id' => 2,
                'user_id' => 11,
                'title' => 'Wireless Bluetooth Keyboard',
                'description' => 'Compact wireless Bluetooth keyboard for mobile devices and laptops.',
                'price' => 50,
                'switches'=> 'Mx Brown lightweight Switches',  
                'details'=> 'Embrace the future of connectivity with our Wireless Bluetooth Keyboard. This compact and portable keyboard seamlessly pairs with your mobile devices and laptops via Bluetooth technology. Its ergonomic design ensures comfortable typing even during extended use. Enjoy the freedom of typing from anywhere, whether you are in a coffee shop or your cozy home office.',
                'image' => 'bluetooth.png',
            ]
         );
         Keyboard::create(
            [
                'id' => 3,
                'user_id' => 11,
                
                'title' => 'Gaming Keyboard',
                'description' => 'Gaming keyboard with anti-ghosting, customizable macros, and RGB backlighting.',
                'price' => 150,
                'switches'=> 'Mx Brown lightweight Switches',  
                'details'=>'Gamers, meet your new best friend: the Gaming Keyboard. Engineered for precision and performance, it features anti-ghosting technology, ensuring that every keystroke is registered accurately, no matter how fast you play. Take control of your gaming experience with customizable macros and immerse yourself in the world of RGB backlighting.',
                'image' => 'mechanicalgamer.png',
            ]
         );
         Keyboard::create(
            [
                'id' => 4,
                'user_id' => 11,
                'title' => 'Ergonomic Split Keyboard',
                'description' => 'Ergonomic split keyboard for comfortable typing and Mx Brown lightweight Switchesuced strain.',
                'price' => 80,
                'switches'=> 'Mx Brown lightweight Switches',  
                'details'=>'The Ergonomic Split Keyboard is designed with your comfort in mind. Say goodbye to wrist strain and hello to a keyboard that supports your natural hand position. The split layout reduces tension, while cushioned palm rests provide a soft landing for your hands. Typing has never felt this good.',
                'image' => 'split.png',
            ]
         );
         Keyboard::create(
            [
                'id' => 5,
                'user_id' => 11,
                'title' => 'Compact Mechanical Keyboard',
                'description' => 'Compact mechanical keyboard with tenkeyless design and tactile switches.',
                'price' => 100,
                'switches'=> 'Mx Brown lightweight Switches',  
                'details'=>'Efficiency meets elegance in our Compact Mechanical Keyboard. The tenkeyless design saves valuable desk space, making it perfect for minimalist workspaces. Its tactile mechanical switches deliver a satisfying click with each keystroke, enhancing your typing speed and accuracy. This keyboard is a testament to form and function.',
                'image' => 'ergonomic.png',
            ]
         );
         Keyboard::create([
            'id' => 6,
            'user_id' => 11,
            'title' => 'RGB Gaming Mechanical Keyboard',
            'description' => 'Feature-packed RGB gaming mechanical keyboard with customizable switches.',
            'price' => 180,
            'switches'=> 'Mx Brown lightweight Switches',  
            'details'=>'Step into the future of gaming with the RGB Gaming Mechanical Keyboard. It is not just a keyboard; it is an immersive experience. Customize every aspect, from key switches to lighting effects, and set the stage for epic gaming sessions. Elevate your gaming setup with this powerhouse of a keyboard.',
            'image' => 'corsair.png',
        ]);
         Keyboard::create([
            'id' => 7,
            'user_id' => 11,
            'title' => 'Compact Wireless Mechanical Keyboard',
            'description' => 'Compact wireless mechanical keyboard with long battery life.',
            'price' => 90,
            'switches'=> 'Mx Brown lightweight Switches',  
            'details'=>'Experience the best of both worlds with our Compact Wireless Mechanical Keyboard. It combines the tactile satisfaction of mechanical switches with the convenience of wireless connectivity. Say goodbye to cable clutter and hello to productivity on the go. Stay connected, stay efficient.',
            'image' => 'bluetooth2.png',
        ]);
         Keyboard::create([
            'id' => 8,
            'user_id' => 11,
            'title' => 'Backlit Multimedia Keyboard',
            'description' => 'Multimedia keyboard with backlit keys and multimedia control buttons.',
            'price' => 70,
            'switches'=> 'Mx Brown lightweight Switches',  
            'details'=>'The Backlit Multimedia Keyboard is your multitasking companion. Whether you are crunching numbers or enjoying your favorite multimedia, this keyboard has you covered. The backlit keys make typing a breeze in any lighting condition, and the dedicated multimedia control buttons put entertainment at your fingertips.',
            'image' => 'multimedia.png',
        ]);
         Keyboard::create([
            'id' => 9,
            'user_id' => 11,
            'title' => 'Silent Typing Keyboard',
            'description' => 'Silent typing keyboard with quiet switches for noise-sensitive environments.',
            'price' => 110,
            'switches'=> 'Mx Brown lightweight Switches', 
            'details'=>'Silence is bliss with the Silent Typing Keyboard. Perfect for shared workspaces and late-night projects, it offers a whisper-quiet typing experience. The low-profile keys and advanced noise-dampening technology ensure that you type in stealth mode without disturbing those around you.', 
            'image' => 'silent.png',
        ]);
         Keyboard::create([
            'id' => 10,
            'user_id' => 11,
            'title' => 'Pink Wireless Mechanical Gaming Keyboard',
            'description' => 'Wireless mechanical gaming keyboard with low-latency connectivity.',
            'price' => 160,
            'switches'=> 'Mx Brown lightweight Switches',  
            'details'=>'Dominate the gaming arena with the Wireless Mechanical Gaming Keyboard. Its low-latency wireless connection and customizable key switches give you the edge you need to crush the competition. Elevate your gaming prowess with this precision-engineered keyboard designed for victory.',
            'image' => 'pink.png',
        ]);

    }
}
