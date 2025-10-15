<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create(
            [
            'question_bn' => 'মুসলিম বিয়ে ডটকম কী? এটি কিভাবে কাজ করে?',
            'answer_bn' => 'এটি একটি বাংলাদেশী ইসলামিক ম্যাট্রিমনি ওয়েবসাইট। এখানে উপজেলাভিত্তিক জেনারেল ও দ্বীনদার সকল মুসলিম পাত্র-পাত্রীদের বায়োডাটা খোঁজা ও অভিভাবকদের সাথে সরাসরি যোগাযোগ করা যায়। একই সাথে বিনামূল্যে বায়োডাটা তৈরি করে জমা দিতে পারবেন।',
            'question_en' => 'What is MuslimBie.com? How does it work?',
            'answer_en' => 'It is a Bangladeshi Islamic matrimony website. Here you can search for biodata of general and religious Muslim brides and grooms based on sub-districts and directly contact their guardians. You can also create and submit your biodata for free.',
            'status' => 1
            ]
        );
        Faq::create(
            [
            'question_bn' => 'বায়োডাটা জমা দিতে কত টাকা লাগে?',
            'answer_bn' => 'মুসলিমবিয়েতে সম্পূর্ণ বিনামূল্যে বায়োডাটা জমা দেয়া যায়।',
            'question_en' => 'How much does it cost to submit biodata?',
            'answer_en' => 'Submitting biodata on MuslimBie is completely free.',
            'status' => 1
            ]
        );
        Faq::create(
            [
            'question_bn' => 'এই ওয়েবসাইট কি সবার জন্য উন্মুক্ত?',
            'answer_bn' => 'জ্বি , এই ওয়েবসাইট জেনারেল ও দ্বীনদার সকল মুসলিম পাত্র-পাত্রীর জন্য উন্মুক্ত।',
            'question_en' => 'Is this website open to everyone?',
            'answer_en' => 'Yes, this website is open to all general and religious Muslim brides and grooms.',
            'status' => 1
            ]
        );
        Faq::create(
            [
            'question_bn' => 'বায়োডাটা তৈরি করার কোনো বিশেষ শর্ত আছে?',
            'answer_bn' => '<p class="text-[1rem] md:text-[14px]">আমাদের ওয়েবসাইটে বায়োডাটা নূন্যতম আবশ্যকতা নিম্নরূপ-</p><p><br></p><p class="text-[1rem] md:text-[14px]">জেনারেল-</p><p class="text-[1rem] md:text-[14px]">১/ সকল মুসলিম পাত্র-পাত্রীর জন্য উন্মুক্ত</p><p>দ্বীনদার জেনারেল, আলেম-আলেমা-</p><p><br></p><p class="text-[1rem] md:text-[14px]">পুরুষ-</p><p class="text-[1rem] md:text-[14px]">১/ ৫ ওয়াক্ত নামাযী হতে হবে।</p><p class="text-[1rem] md:text-[14px]">২/ ওয়াজিব দাড়ি সুন্নতি পদ্ধতিতে বড় থাকতে হবে।</p><p class="text-[1rem] md:text-[14px]">৩/ টাখনুর উপর কাপড় পরতে হবে।</p><p class="text-[1rem] md:text-[14px]">৪/ অভিভাবকের অনুমতি।</p><p><br></p><p class="text-[1rem] md:text-[14px]">নারী-</p><p class="text-[1rem] md:text-[14px]">১/ ৫ ওয়াক্ত নামাযী হতে হবে।</p><p class="text-[1rem] md:text-[14px]">২/ “নিকাব” সহ ফরজ পর্দানশীন হতে হবে।</p><p class="text-[1rem] md:text-[14px]">৩/ অভিভাবকের অনুমতি।</p>',
            'question_en' => 'Are there any special conditions for creating biodata?',
            'answer_en' => '<p class="text-[1rem] md:text-[14px]">The minimum requirements for creating biodata on our website are as follows-</p><p><br></p><p class="text-[1rem] md:text-[14px]">General-</p><p class="text-[1rem] md:text-[14px]">1/ Open to all Muslim brides and grooms</p><p>Religious General, Alim-Alima-</p><p><br></p><p class="text-[1rem] md:text-[14px]">Men-</p><p class="text-[1rem] md:text-[14px]">1/ Must pray 5 times a day.</p><p class="text-[1rem] md:text-[14px]">2/ Must have a beard grown in the Sunnah way.</p><p class="text-[1rem] md:text-[14px]">3/ Must wear clothes above the ankles.</p><p class="text-[1rem] md:text-[14px]">4/ Guardian\'s permission.</p><p><br></p><p class="text-[1rem] md:text-[14px]">Women-</p><p class="text-[1rem] md:text-[14px]">1/ Must pray 5 times a day.</p><p class="text-[1rem] md:text-[14px]">2/ Must observe obligatory hijab including niqab.</p><p class="text-[1rem] md:text-[14px]">3/ Guardian\'s permission.</p>',
            'status' => 1
            ]
        );
        Faq::create(
            [
            'question_bn' => 'মুসলিম বিয়ে বায়োডাটা জমা দিলে আমার তথ্য কতটুকু গোপন থাকবে? কতটুকু প্রকাশিত হবে?',
            'answer_bn' => 'আপনার বায়োডাটা এপ্রুভ করা হলে আপনার ও আপনার পিতা-মাতার নাম, মোবাইল নাম্বার এবং ইমেইল এড্রেস গোপন রাখা হবে। বাকি সকল তথ্য সাধারণ ইউজাররা দেখতে পারবে। অর্থাৎ সাধারণ ইউজাররা আপনার বায়োডাটা পড়তে পারবে কিন্ত আপনার পরিচয় জানতে পারবে না। <br><br>যদি কেউ বিয়ের জন্য যোগাযোগ করতে আগ্রহী হয় তাহলে কানেকশন ব্যবহার করে আপনার নাম, অভিভাবকের মোবাইল নাম্বার ও ইমেইল এড্রেস দেখতে পারবে এবং বিয়ের জন্য যোগাযোগ করতে পারবে। বিস্তারিত জানতে <a href="frontend.privacy_policy" target="_blank">Privacy Policy</a> পড়ুন।',
            'question_en' => 'How much of my information will remain confidential if I submit biodata on MuslimBie? How much will be disclosed?',
            'answer_en' => 'Once your biodata is approved, your and your parents\' names, mobile numbers, and email addresses will be kept confidential. All other information will be visible to general users. In other words, general users can read your biodata but will not know your identity. <br><br>If someone is interested in contacting you for marriage, they can use the connection feature to see your name, guardian\'s mobile number, and email address and contact you for marriage. For more details, read the <a href="frontend.privacy_policy" target="_blank">Privacy Policy</a>.',
            'status' => 1
            ]
        );
        Faq::create(
            [
            'question_bn' => 'আমার একটি বায়োডাটা পছন্দ হয়েছে, আমি কি সরাসরি সেই পাত্র/পাত্রীর সাথে যোগাযোগ করতে পারবো?',
            'answer_bn' => 'মুসলিমবিয়েতে সরাসরি পাত্র/পাত্রীর মাঝে যোগাযোগ করাকে সমর্থন করে না। শুধুমাত্র পাত্র/পাত্রীর অভিভাবকের সাথেই যোগাযোগ করতে পারবেন।',
            'question_en' => 'I like a biodata, can I directly contact the bride/groom?',
            'answer_en' => 'MuslimBie does not support direct contact between brides and grooms. You can only contact the guardian of the bride/groom.',
            'status' => 1
            ]
        );
        Faq::create(
            [
            'question_bn' => 'আমার অভিভাবক আমার বিয়েতে রাজি নয়, আমি কি বায়োডাটা জমা দিতে পারবো?',
            'answer_bn' => 'আমাদের ওয়েবসাইটে বায়োডাটা তৈরি করতে হলে অবশ্যই পাত্র/পাত্রীর অভিভাবকের অনুমতি নিয়ে জমা দিতে হবে। অন্যথায় বায়োডাটা এপ্রুভ করা হয় না।',
            'question_en' => 'My guardian does not agree to my marriage, can I submit biodata?',
            'answer_en' => 'To create biodata on our website, you must submit it with the permission of the bride/groom\'s guardian. Otherwise, the biodata will not be approved.',
            'status' => 1
            ]
        );
        Faq::create(
            [
            'question_bn' => 'বায়োডাটা জমা দেয়ার পর বিয়ে হয়ে গেলে বা অন্য কারণে বায়োডাটা ডিলিট করতে পারবো?',
            'answer_bn' => 'হ্যাঁ, আপনার যখন ইচ্ছা তখন বায়োডাটা ডিলিট করতে পারবেন।',
            'question_en' => 'Can I delete my biodata after getting married or for any other reason?',
            'answer_en' => 'Yes, you can delete your biodata whenever you want.',
            'status' => 1
            ]
        );
        Faq::create(
            [
            'question_bn' => 'মুসলিম বিয়ে মাধ্যমে বিয়ে করলে বিবাহ পরবর্তী কোনো সার্ভিস চার্জ পরিশোধ করতে হয়?',
            'answer_bn' => 'না। মুসলিমবিয়ে\'র মাধ্যমে বিয়ে করলে কোনো প্রকার বিবাহ পরবর্তী চার্জ পরিশোধ করতে হয় না। আপনাদের দোয়া আমাদের পাথেয়।',
            'question_en' => 'Is there any post-marriage service charge if I get married through MuslimBie?',
            'answer_en' => 'No. There is no post-marriage service charge if you get married through MuslimBie. Your prayers are our asset.',
            'status' => 1
            ]
        );
    }
}
