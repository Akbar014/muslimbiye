<?php

namespace Database\Seeders;

use App\Models\Guide;
use Illuminate\Database\Seeder;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guide::create(
            [
                'question_bn' => 'মুসলিম বিয়ে ডটকমে কিভাবে একাউন্ট তৈরি করবো?',
                'answer_bn' => '১) প্রথমে MuslimBie.com প্রবেশ করুন এবং হোম পেজের উপরের ডান কোণে থাকা ইউজার আইকনে ক্লিক করুন।<br><br>২) Create Account এ ক্লিক করুন।<br><br>৩) রেজিস্ট্রেশন ফর্ম প্রদর্শিত হবে। আপনার নাম লিখুন এবং জেন্ডার সিলেক্ট করুন।<br><br>৪) আপনার ইমেইল লিখে Verify বাটনে ক্লিক করুন। আপনার ইমেইল সঠিক হলে সেখানে একটি ভেরিফিকেশন কোড যাবে। নির্ধারিত স্থানে ভেরিফিকেশন কোড প্রবেশ করিয়ে Confirm বাটনে ক্লিক করে ইমেইল ভেরিফিকেশন সম্পন্ন করুন।<br><br>৫) আপনার মোবাইল নাম্বার লিখে Verify বাটনে ক্লিক করুন। আপনার মোবাইল নাম্বার সঠিক হলে সেখানে একটি ভেরিফিকেশন কোড যাবে। নির্ধারিত স্থানে ভেরিফিকেশন কোড প্রবেশ করিয়ে Confirm বাটনে ক্লিক করে মোবাইল নাম্বার ভেরিফিকেশন সম্পন্ন করুন।<br><br>৬) একটি পাসওয়ার্ড নির্বাচন করুন।<br><br>৭) মুসলিম বিয়ের <a href="/terms-and-conditions" target="_blank">Terms and Condition</a> এবং <a href="/privacy-policy" target="_blank">Privacy Policy</a> এর সাথে একমত হলে চেকবক্স চেক করুন।<br><br>৮) Create account বাটনে ক্লিক করে অ্যাকাউন্ট তৈরি সম্পন্ন করুন।',
                'question_en' => 'How to create an account on MuslimBie.com?',
                'answer_en' => '1) First, go to MuslimBie.com and click on the user icon at the top right corner of the homepage.<br><br>2) Click on Create Account.<br><br>3) The registration form will be displayed. Enter your name and select your gender.<br><br>4) Enter your email and click on Verify. If your email is correct, a verification code will be sent to it. Enter the verification code in the designated place and click Confirm to complete email verification.<br><br>5) Enter your mobile number and click on Verify. If your mobile number is correct, a verification code will be sent to it. Enter the verification code in the designated place and click Confirm to complete mobile number verification.<br><br>6) Choose a password.<br><br>7) If you agree with MuslimBie\'s <a href="/terms-and-conditions" target="_blank">Terms and Conditions</a> and <a href="/privacy-policy" target="_blank">Privacy Policy</a>, check the checkbox.<br><br>8) Click on Create account to complete the account creation process.',
                'status' => 1
            ]
        );
        Guide::create(
            [
                'question_bn' => 'মুসলিম বিয়ে ডটকমে কিভাবে বায়োডাটা জমা দিবো',
                'answer_bn' => '১. প্রথমে মুসলিম বিয়ে লগইন করুন। মুসলিম বিয়ে অ্যাকাউন্ট না থাকলে অ্যাকাউন্ট তৈরি করুন।<br><br>২. লগইন করার পর হোম পেজ বা ড্যাশবোর্ড থেকে বায়োডাটা তৈরি করুন বাটনে ক্লিক করুন।<br><br>৩. বায়োডাটা তৈরির পূর্বে মুসলিম বিয়ের শর্ত সমূহ পড়ুন এবং সম্মত হলে চেকবক্স চেক করে বায়োডাটা তৈরি করুন বাটনে ক্লিক করুন।<br><br>৪. বায়োডাটা ফর্ম প্রদর্শিত হবে। ফর্মে সকল তথ্য সঠিকভাবে দেয়া শেষ হলে বায়োডাটা রিভিউ পেজে প্রবেশ করবেন এবং সব তথ্য ভালভাবে পরিদর্শন করে Submit বাটনে ক্লিক করে বায়োডাটা জমা দিন।<br><br>৫. কয়েকদিনের মাঝে মুসলিম বিয়ে কাস্টমার কেয়ার থেকে আপনার অভিভাবক এবং আপনাকে কল করে ভেরিফাই করা হতে পারে।<br><br>৬. মুসলিম বিয়ে কাস্টমার কেয়ার কর্তৃক আপনার বায়োডাটা রিভিউ শেষে একটি মেইল দিয়ে এপ্রুভ অথবা নট-এপ্রুভ স্ট্যাটাস জানানো হবে ইন শা আল্লাহ।<br><br><b>লক্ষণীয়ঃ বায়াডাটায় সকল তথ্য স্পষ্ট করে লিখবেন।</b>',
                'question_en' => 'How to submit a biodata on MuslimBie.com?',
                'answer_en' => '1. First, log in to MuslimBie. If you do not have an account, create one.<br><br>2. After logging in, click on the Create Biodata button from the homepage or dashboard.<br><br>3. Before creating the biodata, read the terms and conditions of MuslimBie and if you agree, check the checkbox and click on the Create Biodata button.<br><br>4. The biodata form will be displayed. After providing all the information correctly, you will enter the biodata review page. Review all the information carefully and click on the Submit button to submit the biodata.<br><br>5. Within a few days, MuslimBie customer care may call you and your guardian for verification.<br><br>6. After reviewing your biodata, MuslimBie customer care will notify you of the approval or non-approval status via email, In Sha Allah.<br><br><b>Note: Please provide all information clearly in the biodata.</b>',
                'status' => 1
            ]
        );
        Guide::create(
            [
                'question_bn' => 'মুসলিম বিয়ে বায়োডাটা এডিট করবো কিভাবে?',
                'answer_bn' => '১. প্রথমে মুসলিম বিয়ে একাউন্টে লগইন করুন।<br><br>২. লগইন করার উপরের ডান কোণে থাকা ইউজার আইকনে ক্লিক করুন।<br><br>৩. বায়োডাটা এডিট করুন বাটনে ক্লিক করুন।<br><br>৪. বায়োডাটা ফর্মটি প্রদর্শিত হবে, আপনি যে তথ্যটি এডিট করতে চান সেখানে প্রবেশ করে এডিট শেষে বায়োডাটা রিভিউ করুন এবং Submit বাটনে ক্লিক করুন।<br><br>৫. মুসলিম বিয়ে কাস্টমার কেয়ার থেকে আপনার এডিট করা তথ্য রিভিউ করা হবে।<br><br>৬. রিভিউ শেষে একটি মেইল দিয়ে এপ্রুভ অথবা নট-এপ্রুভ স্ট্যাটাস জানানো হবে ইন শা আল্লাহ।',
                'question_en' => 'How to edit biodata on MuslimBie.com?',
                'answer_en' => '1. First, log in to your MuslimBie account.<br><br>2. After logging in, click on the user icon at the top right corner.<br><br>3. Click on the Edit Biodata button.<br><br>4. The biodata form will be displayed. Enter the information you want to edit, review the biodata, and click on the Submit button.<br><br>5. MuslimBie customer care will review the edited information.<br><br>6. After the review, you will be notified of the approval or non-approval status via email, In Sha Allah.',
                'status' => 1
            ]
        );
        Guide::create(
            [
                'question_bn' => 'মুসলিম বিয়ে বায়োডাটা সাময়িক সময়ের জন্য হাইড করবো কিভাবে?',
                'answer_bn' => '<b>পাত্র/পাত্রী পক্ষের সাথে বিয়ের কথা চলা অবস্থায় আপনার বায়োডাটা হাইড করে রাখুন।</b> এছাড়াও আপনি যে কোনো কারণে যে কোনো সময়কালের জন্য এক ক্লিকে বায়োডাটা হাইড করে রাখতে পারবেন। অর্থাৎ আপনার বায়োডাটা সার্চ রেজাল্টে দেখানো হবে না।<br><br>১. প্রথমে মুসলিম বিয়ে একাউন্টে লগইন করুন।<br><br>২. লগইন করার পর ড্যাশবোর্ডে যান অথবা উপরের ডান কোণে থাকা ইউজার আইপাত্রী ক্লিক করুন।<br><br>৩. Biodata Status এর নিচে স্লাইড বাটনে ক্লিক করুন।<br><br>৪. আপনাকে একটি কনফার্মেশন পপআপ দেখাবে।<br><br>৫. Ok বাটনে ক্লিক করে বায়োডাটা হাইড করুন।<br><br>একই উপায়ে আবার যে কোনো সময় বায়োডাটা লাইভ করতে পারবেন। তবে কোন তথ্য এডিট করা হলে কাস্টমার কেয়ার আপনার বায়োডাটা আবার রিভিউ করবে।',
                'question_en' => 'How to temporarily hide biodata on MuslimBie.com?',
                'answer_en' => '<b>Hide your biodata while discussing marriage with a potential match.</b> You can also hide your biodata at any time for any reason with just one click. This means your biodata will not appear in search results.<br><br>1. First, log in to your MuslimBie account.<br><br>2. After logging in, go to the dashboard or click on the user icon at the top right corner.<br><br>3. Click on the slide button under Biodata Status.<br><br>4. A confirmation popup will appear.<br><br>5. Click on the Ok button to hide your biodata.<br><br>You can make your biodata live again at any time in the same way. However, if any information is edited, customer care will review your biodata again.',
                'status' => 1
            ]
        );
        Guide::create(
            [
                'question_bn' => 'মুসলিম বিয়ে বায়োডাটা ডিলিট করবো কিভাবে?',
                'answer_bn' => 'আপনি যে কোনো সময় আপনার বায়োডাটা নিজেই ডিলিট করতে পারবেন।<br><br><br>১. প্রথমে মুসলিম বিয়ে একাউন্টে লগইন করুন।<br><br>২. লগইন করার পর ড্যাশবোর্ডে যান অথবা উপরের ডান কোণে থাকা ইউজার আইকনে ক্লিক করুন।<br><br>৩. সেটিংস এ ক্লিক করুন।<br><br>৪. বায়োডাটা ডিলিট বাটনে ক্লিক করে ডিলিট সম্পন্ন করুন। <br><br><br><b>লক্ষণীয়:</b> আপনার বায়োডাটা ডিলিট করলে আর ফেরত আনতে পারবেন না। সাময়িক সময়ের জন্য প্রয়োজন হলে হাইড করে রাখতে পারেন।',
                'question_en' => 'How do I delete my MuslimBiye biodata?',
                'answer_en' => 'You can delete your biodata at any time by yourself.<br><br><br>1. First, log in to your MuslimBiye account.<br><br>2. After logging in, go to the dashboard or click on the user icon at the top right corner.<br><br>3. Click on "Settings".<br><br>4. Click the "Delete Biodata" button to complete the deletion.<br><br><br><b>Note:</b> Once deleted, your biodata cannot be recovered. If needed temporarily, you can hide it instead.',
                'status' => 1
            ]
        );

        Guide::create(
            [
                'question_bn' => 'কোনো বায়োডাটার ব্যাপারে অভিযোগ করবো কিভাবে?',
                'answer_bn' => 'আপনি কানেকশন ব্যবহারের মাধ্যমে কোনো বায়োডাটার যোগাযোগ তথ্য দেখে থাকলে, সেই বায়োডাটার ব্যাপারে কোনো অভিযোগ করতে চাইলে-<br><br><br>১. উক্ত বায়োডাটার নিচে Report বাটনে ক্লিক করুন। অথবা ড্যাশবোর্ড থেকে আমার ক্রয়সমূহ মেনুতে যান। সেখান থেকে অভিযুক্ত বায়োডাটার পাশের Report বাটনে ক্লিক করুন।<br><br>২. নির্ধারিত ফর্ম পূরণ করে আপনার অভিযোগ করুন।<br><br>কাস্টমার কেয়ার থেকে তা যাচাই করে উপযুক্ত পদক্ষেপ নেয়া হবে ইন শা আল্লাহ।',
                'question_en' => 'How do I report a biodata?',
                'answer_en' => 'If you have accessed a biodata’s contact information through a connection and want to report it:<br><br><br>1. Click the "Report" button below the biodata. Alternatively, go to the "My Purchases" menu from the dashboard and click the "Report" button next to the biodata you want to report.<br><br>2. Fill out the designated form and submit your complaint.<br><br>Our customer care team will review the report and take appropriate action, In Sha Allah.',
                'status' => 1
            ]
        );
        Guide::create(
            [
                'question_bn' => 'কিভাবে কানেকশন ক্রয় করবো?',
                'answer_bn' => 'মুসলিম বিয়ে ডটকমে একজন পাত্র বা পাত্রীর অভিভাবকের যোগাযোগের নাম্বার দেখতে একটি কানেকশন ব্যবহার করতে হয়। নিম্নবর্ণিত উপায়ে কানেকশন ক্রয় করতে পারবেন- <br><br><br>১. প্রথমে মুসলিম বিয়ে ড্যাসবোর্ডে প্রবেশ করুন। <br><br>২. “কানেকশন কিনুন” এই বাটনটিতে ক্লিক করুন। <br><br>৩. এই পেজে ৩ টি কানেকশন প্যাকেজ দেখতে পাবেন। আপনার প্রয়োজন অনুযায়ী একটি প্যাকেজ নির্বাচন করুন এবং Purchage Now বাটনটিতে ক্লিক করুন। <br><br>৪. বিকাশ অথবা নগদ যে একাউন্ট থেকে পেমেন্ট করতে চাচ্ছেন তা সিলেক্ট করুন এবং Pay Now বাটনে ক্লিক করুন। <br><br>৫. যদি বিকাশ সিলেক্ট করে Pay Now বাটনে ক্লিক করেন তাহলে বিকাশ থেকে পেমেন্ট করার চেক আউট দেখতে পারবেন। প্রথমে আপনার বিকাশ নাম্বারটি লিখুন এবং Confirm বাটনে ক্লিক করুন।<br><br>৬. আপনার বিকাশ মোবাইল নাম্বারে একটি OTP কোড যাবে সেটি প্রবেশ করান এবং Confirm বাটনে ক্লিক করুন। <br><br>৭. আপনার বিকাশের PIN কোডটি বসান এবং Confirm বাটনে ক্লিক করুন। <br><br>৮. এভাবে খুব সহজেই আপনার পেমেন্ট করা সম্পন্ন হবে এবং আপনার একাউন্টে কানেকশন যোগ হয়ে যাবে ইন শা আল্লাহ। <br><br>৯. ড্যাসবোর্ডে এসে আপনার কানেকশন দেখতে পারবেন এবং অভিভাবকের নাম্বার পেতে এটি ব্যবহার করতে পারবেন।',
                'question_en' => 'How can I purchase a connection?',
                'answer_en' => 'On MuslimBiye.com, you need a connection to view a guardian’s contact number of a bride or groom. Follow these steps to purchase a connection:<br><br><br>1. First, log in to the MuslimBiye dashboard.<br><br>2. Click on the "Buy Connection" button.<br><br>3. You will see three connection packages on this page. Select the package that suits your needs and click "Purchase Now".<br><br>4. Choose the account from which you want to make the payment (Bkash or Nagad) and click "Pay Now".<br><br>5. If you select Bkash and click "Pay Now", you will see the Bkash payment checkout. Enter your Bkash number and click "Confirm".<br><br>6. You will receive an OTP code on your Bkash-registered mobile number. Enter the code and click "Confirm".<br><br>7. Enter your Bkash PIN and click "Confirm".<br><br>8. Your payment will be completed successfully, and the connection will be added to your account, In Sha Allah.<br><br>9. You can view your purchased connections on the dashboard and use them to access guardian contact details.',
                'status' => 1
            ]
        );

        Guide::create(
            [
                'question_bn' => 'কিভাবে কানেকশন রিফান্ড পেতে পারি?',
                'answer_bn' => 'কানেকশন ব্যবহার করে কোনো বায়োডাটার যোগাযোগ তথ্য নিয়ে যোগাযোগ করতে ব্যর্থ হলে আপনি কানেকশন ফেরত পেতে পারেন। তবে বিপরীত পক্ষ যদি তাদের ব্যক্তিগত অপছন্দের কারণে আপনার প্রস্তাব প্রত্যাখ্যান করে তাহলে রিফান্ড পাবেন না।<br><br>১) সর্বপ্রথম উক্ত বায়োডাটার সবার নিচে Report বাটনে ক্লিক করুন। অথবা ড্যাশবোর্ড থেকে আমার ক্রয়সমূহ মেনুতে যান। সেখান থেকে সেই বায়োডাটার পাশের Report বাটনে ক্লিক করুন। <br><br>২) নির্ধারিত ফর্ম পূরণ করে আপনার অভিযোগ দাখিল করুন। কাস্টমার কেয়ার থেকে আপনার অভিযোগ যাচাই করা হবে এবং খুব দ্রুত আপনাকে জানানো হবে ইন শা আল্লাহ। <br><br><br>বিস্তারিত জানতে মুসলিম বিয়ের <a href="/refund-policy" target="_blank">Refund Policy</a> দেখুন।',
                'question_en' => 'How can I get a refund for a connection?',
                'answer_en' => 'If you fail to contact a biodata after using a connection, you may be eligible for a refund. However, if the other party declines your proposal due to personal preferences, you will not receive a refund.<br><br>1) First, click the "Report" button at the bottom of the respective biodata. Alternatively, go to the "My Purchases" menu from the dashboard and click the "Report" button next to the biodata.<br><br>2) Fill out the designated form and submit your complaint. Our customer care team will review your report and respond as soon as possible, In Sha Allah.<br><br><br>For more details, please check the MuslimBiye <a href="/refund-policy" target="_blank">Refund Policy</a>.',
                'status' => 1
            ]
        );
    }
}
