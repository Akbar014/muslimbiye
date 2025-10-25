<script>
    var modal_expires = 0;
    modal_expires = 1;
</script>

<!-- https://code.jquery.com/jquery-1.8.3.min.js -->
 
<script type="text/javascript" src="{{ asset('assets/frontend_new/js/jquery-jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend_new/js/jquery-jquery.inputmask.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend_new/js/select2-select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend_new/js/jquery-validate-jquery-validate.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/frontend_new/js/sweetalert-sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend_new/js/plugins-toast.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>


<script type="text/javascript" src="{{ asset('assets/frontend_new/js/js-ion.rangeSlider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend_new/js/js-ordhekdeen-frontend.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    const districtsBn = {
        'Barguna': 'বরগুনা',
        'Amtali': 'আমতলী',
        'Bamna': 'বামনা',
        'Barguna Sadar': 'বরগুনা সদর',
        'Betagi': 'বেতাগী',
        'Patharghata': 'পাথরঘাটা',
        'Taltali': 'তালতলী',
        'Barishal': 'বরিশাল',
        'Agailjhara': 'আগৈলঝাড়া',
        'Babuganj': 'বাবুগঞ্জ',
        'Bakerganj': 'বাকেরগঞ্জ',
        'Banaripara': 'বানারীপাড়া',
        'Barishal Sadar': 'বরিশাল সদর',
        'Gaurnadi': 'গৌরনদী',
        'Hizla': 'হিজলা',
        'Mehendiganj': 'মেহেন্দিগঞ্জ',
        'Muladi': 'মুলাদী',
        'Wazirpur': 'উজিরপুর',
        'Bhola': 'ভোলা',
        'Bhola Sadar': 'ভোলা সদর',
        'Burhanuddin': 'বোরহানউদ্দিন',
        'Char Fasson': 'চরফ্যাশন',
        'Daulatkhan': 'দৌলতখান',
        'Lalmohan': 'লালমোহন',
        'Manpura': 'মনপুরা',
        'Tazumuddin': 'তাজুমদ্দিন',
        'Jhalokati': 'ঝালকাঠি',
        'Jhalokati Sadar': 'ঝালকাঠি সদর',
        'Kathalia': 'কাঁঠালিয়া',
        'Nalchity': 'নলছিটি',
        'Rajapur': 'রাজাপুর',
        'Patuakhali': 'পটুয়াখালী',
        'Bauphal': 'বাউফল',
        'Dashmina': 'দশমিনা',
        'Dumki': 'দুমকি',
        'Galachipa': 'গলাচিপা',
        'Kalapara': 'কলাপাড়া',
        'Mirzaganj': 'মির্জাগঞ্জ',
        'Patuakhali Sadar': 'পটুয়াখালী সদর',
        'Rangabali': 'রাঙ্গাবালী',
        'Pirojpur': 'পিরোজপুর',
        'Bhandaria': 'ভাণ্ডারিয়া',
        'Kawkhali': 'কাউখালী (পিরোজপুর)',
        'Mathbaria': 'মঠবাড়ীয়া',
        'Nazirpur': 'নাজিরপুর',
        'Zianagar': 'জিয়ানগর',
        'Nesarabad (Swarupkati)': 'নেছারাবাদ (স্বরূপকাঠী)',
        'Pirojpur Sadar': 'পিরোজপুর সদর',
        'Bandarban': 'বান্দরবান',
        'Bandarban Sadar': 'বান্দরবান সদর',
        'Lama': 'লামা',
        'Naikhongchhari': 'নাইক্ষ্যংছড়ি',
        'Rowangchhari': 'রোয়াংছড়ি',
        'Ruma': 'রুমা',
        'Thanchi': 'থানচি',
        'Ali Kadam': 'আলিকদম',
        'Brahmanbaria': 'ব্রাহ্মণবাড়িয়া',
        'Ashuganj': 'আশুগঞ্জ',
        'Akhaura': 'আখাউড়া',
        'Bancharampur': 'বাঞ্ছারামপুর',
        'Brahmanbaria Sadar': 'ব্রাহ্মণবাড়িয়া সদর',
        'Kasba': 'কসবা',
        'Nabinagar': 'নবীনগর',
        'Nasirnagar': 'নাসিরনগর',
        'Sarail': 'সরাইল',
        'Chandpur': 'চাঁদপুর',
        'Chandpur Sadar': 'চাঁদপুর সদর',
        'Faridganj': 'ফরিদগঞ্জ',
        'Shahrasti': 'শাহরাস্তি',
        'Haimchar': 'হাইমচর',
        'Haziganj': 'হাজীগঞ্জ',
        'Kachua': 'কচুয়া',
        'Matlab Dakkhin': 'মতলব দক্ষিণ',
        'Matlab Uttar': 'মতলব উত্তর',
        'Chattogram': 'চট্টগ্রাম',
        'Anwara': 'আনোয়ারা',
        'Banshkhali': 'বাঁশখালী',
        'Boalkhali': 'বোয়ালখালী',
        'Chandanaish': 'চন্দনাইশ',
        'Chattogram Sadar': 'চট্টগ্রাম সদর',
        'Fatikchhari': 'ফটিকছড়ি',
        'Hathazari': 'হাটহাজারী',
        'Lohagara': 'লোহাগাড়া',
        'Mirsharai': 'মীরসরাই',
        'Patiya': 'পটিয়া',
        'Rangunia': 'রাঙ্গুনিয়া',
        'Raozan': 'রাউজান',
        'Sandwip': 'সন্দ্বীপ',
        'Satkania': 'সাতকানিয়া',
        'Sitakunda': 'সীতাকুণ্ড',
        'Cumilla': 'কুমিল্লা',
        'Barura': 'বড়ুরা',
        'Brahmanpara': 'ব্রাহ্মণপাড়া',
        'Burichang': 'বুড়িচং',
        'Chandina': 'চান্দিনা',
        'Chauddagram': 'চৌদ্দগ্রাম',
        'Cumilla Adarsha Sadar': 'কুমিল্লা আদর্শ সদর',
        'Cumilla Sadar Dakshin': 'কুমিল্লা সদর দক্ষিণ',
        'Daudkandi': 'দাউদকান্দি',
        'Debidwar': 'দেবীদ্বার',
        'Homna': 'হোমনা',
        'Laksam': 'লাকসাম',
        'Meghna': 'মেঘনা',
        'Monohorgonj': 'মনোহরগঞ্জ',
        'Muradnagar': 'মুরাদনগর',
        'Nangalkot': 'নাঙ্গলকোট',
        'Titas': 'তিতাস',
        'Cox\'s Bazar': 'কক্সবাজার',
        'Chakaria': 'চকরিয়া',
        'Cox\'s Bazar Sadar': 'কক্সবাজার সদর',
        'Kutubdia': 'কুতুবদিয়া',
        'Maheshkhali': 'মহেশখালী',
        'Pekua': 'পেকুয়া',
        'Ramu': 'রামু',
        'Ukhia': 'উখিয়া',
        'Teknaf': 'টেকনাফ',
        'Feni': 'ফেনী',
        'Chhagalnaiya': 'ছাগলনাইয়া',
        'Daganbhuiyan': 'দাগনভূঞা',
        'Feni Sadar': 'ফেনী সদর',
        'Parshuram': 'পরশুরাম',
        'Sonagazi': 'সোনাগাজী',
        'Fulgazi': 'ফুলগাজী',
        'Khagrachari': 'খাগড়াছড়ি',
        'Dighinala': 'দীঘিনালা',
        'Khagrachari Sadar': 'খাগড়াছড়ি সদর',
        'Lakshmichhari': 'লক্ষ্মীছড়ি',
        'Mahalchhari': 'মহালছড়ি',
        'Manikchhari': 'মানিকছড়ি',
        'Matiranga': 'মাটিরাঙ্গা',
        'Panchhari': 'পানছড়ি',
        'Ramgarh': 'রামগড়',
        'Lakshmipur': 'লক্ষ্মীপুর',
        'Lakshmipur Sadar': 'লক্ষ্মীপুর সদর',
        'Raipur': 'রায়পুর',
        'Ramganj': 'রামগঞ্জ',
        'Ramgati': 'রামগতি',
        'Kamalnagar': 'কমলনগর',
        'Noakhali': 'নোয়াখালী',
        'Begumganj': 'বেগমগঞ্জ',
        'Chatkhil': 'চাটখিল',
        'Companiganj': 'কোম্পানীগঞ্জ',
        'Hatiya': 'হাতিয়া',
        'Kabirhat': 'কবিরহাট',
        'Noakhali Sadar': 'নোয়াখালী সদর',
        'Senbagh': 'সেনবাগ',
        'Subarnachar': 'সুবর্ণচর',
        'Rangamati': 'রাঙ্গামাটি',
        'Baghaichhari': 'বাঘাইছড়ি',
        'Barkal': 'বরকল',
        'Kaptai': 'কাপ্তাই',
        'Juraichhari': 'জুরাছড়ি',
        'Rajasthali': 'রাজস্থলী',
        'Belaichhari': 'বিলাইছড়ি',
        'Langadu': 'লংগদু',
        'Naniarchar': 'নানিয়ারচর',
        'Rangamati Sadar': 'রাঙ্গামাটি সদর',
        'Barisal': 'বরিশাল',
        'Chittagong': 'চট্টগ্রাম',
        'Dhaka': 'ঢাকা',
        'Khulna': 'খুলনা',
        'Mymensingh': 'ময়মনসিংহ',
        'Rajshahi': 'রাজশাহী',
        'Rangpur': 'রংপুর',
        'Sylhet': 'সিলেট',
        'Adabor': 'আদাবর',
        'Badda': 'বাড্ডা',
        'Bangsal': 'বংশাল',
        'Cantonment': 'ক্যান্টনমেন্ট',
        'Chawkbazar': 'চৌকিবাজার',
        'Dhanmondi': 'ধানমন্ডি',
        'Gendaria': 'গেন্ডারিয়া',
        'Gulshan': 'গুলশান',
        'Hazaribagh': 'হাজারীবাগ',
        'Jatrabari': 'যাত্রাবাড়ি',
        'Kadamtali': 'কদমতলী',
        'Kafrul': 'কাফরুল',
        'Kalabagan': 'কালাবাগান',
        'Kamrangirchar': 'কমরাঙ্গীরচর',
        'Khilkhet': 'খিলক্ষেত',
        'Khilgaon': 'খিলগাঁও',
        'Kotwali': 'কোতয়ালি',
        'Lalbagh': 'লালবাগ',
        'Mirpur': 'মিরপুর',
        'Mohammadpur': 'মোহাম্মদপুর',
        'Motijheel': 'মোটিজিল',
        'New Market': 'নিউ মার্কেট',
        'Pallabi': 'পল্লবী',
        'Paltan': 'পল্টন',
        'Ramna': 'রমনা',
        'Rampura': 'রামপুরা',
        'Sabujbagh': 'সবুজবাগ',
        'Shah Ali': 'শাহ আলী',
        'Shahbagh': 'শাহবাগ',
        'Shyampur': 'শিয়ালদহ',
        'Sutrapur': 'সূত্রাপুর',
        'Tejgaon': 'তেজগাঁও',
        'Uttar Khan': 'উত্তর খান',
        'Uttara': 'উত্তরা',
        'Vatara': 'ভাটারা',

        'Faridpur': 'ফরিদপুর',
        'Alfadanga': 'আলফাডাঙ্গা',
        'Bhanga': 'ভাঙ্গা',
        'Boalmari': 'বোয়ালমারী',
        'Charbhadrasan': 'চরভদ্রাসন',
        'Faridpur Sadar': 'ফরিদপুর সদর',
        'Madhukhali': 'মধুখালী',
        'Nagarkanda': 'নগরকান্দা',
        'Sadarpur': 'সদরপুর',
        'Saltha': 'সালথা',
        'Gazipur': 'গাজীপুর',
        'Gazipur Sadar': 'গাজীপুর সদর',
        'Kaliakair': 'কালিয়াকৈর',
        'Kaliganj': 'কালীগঞ্জ',
        'Kapasia': 'কাপাসিয়া',
        'Sreepur': 'শ্রীপুর',
        'Gopalganj': 'গোপালগঞ্জ',
        'Gopalganj Sadar': 'গোপালগঞ্জ সদর',
        'Kashiani': 'কাশিয়ানি',
        'Kotalipara': 'কোটালীপাড়া',
        'Muksudpur': 'মুকসুদপুর',
        'Tungipara': 'তুঙ্গিপাড়া',
        'Kishoreganj': 'কিশোরগঞ্জ',
        'Austagram': 'আউশকান্দি',
        'Bajitpur': 'বাজিতপুর',
        'Bhairab': 'ভৈরব',
        'Hossainpur': 'হোসেনপুর',
        'Itna': 'ইটনা',
        'Karimganj': 'কারিমগঞ্জ',
        'Katiadi': 'কাটিয়াদি',
        'Kishoreganj Sadar': 'কিশোরগঞ্জ সদর',
        'Kuliarchar': 'কুলিয়ারচর',
        'Mithamain': 'মিঠামইন',
        'Nikli': 'নিকলী',
        'Pakundia': 'পাকুন্দিয়া',
        'Tarail': 'তারাইল',
        'Madaripur': 'মাদারীপুর',
        'Kalkini': 'কালকিনি',
        'Madaripur Sadar': 'মাদারীপুর সদর',
        'Rajoir': 'রাজৈর',
        'Shibchar': 'শিবচর',
        'Manikganj': 'মানিকগঞ্জ',
        'Daulatpur': 'দৌলতপুর',
        'Ghior': 'ঘিওর',
        'Harirampur': 'হরিরামপুর',
        'Manikganj Sadar': 'মানিকগঞ্জ সদর',
        'Saturia': 'সাতুরিয়া',
        'Shibalaya': 'শিবালয়',
        'Singair': 'সিংগাইর',
        'Munshiganj': 'মুন্সিগঞ্জ',
        'Gazaria': 'গজারিয়া',
        'Lohajang': 'লহজাং',
        'Munshiganj Sadar': 'মুন্সিগঞ্জ সদর',
        'Sirajdikhan': 'সিরাজদিখান',
        'Sreenagar': 'শ্রীনগর',
        'Tongibari': 'টঙ্গীবাড়ি',
        'Narayanganj': 'নারায়ণগঞ্জ',
        'Araihazar': 'আড়াইহাজার',
        'Bandar': 'বান্দর',
        'Narayanganj Sadar': 'নারায়ণগঞ্জ সদর',
        'Rupganj': 'রূপগঞ্জ',
        'Sonargaon': 'সোনারগাঁও',
        'Narsingdi': 'নরসিংদী',
        'Belabo': 'বেলাবো',
        'Monohardi': 'মোনহারী',
        'Narsingdi Sadar': 'নরসিংদী সদর',
        'Palash': 'পালাশ',
        'Raipura': 'রায়পুরা',
        'Shibpur': 'শিবপুর',
        'Rajbari': 'রাজবাড়ী',
        'Baliakandi': 'বালিয়াকান্দি',
        'Goalanda': 'গোলন্দা',
        'Pangsha': 'পাংশা',
        'Rajbari Sadar': 'রাজবাড়ী সদর',
        'Shariatpur': 'শরিয়তপুর',
        'Bhedarganj': 'ভেদরগঞ্জ',
        'Damudya': 'দামুদ্যা',
        'Gosairhat': 'গোসাইরহাট',
        'Naria': 'নড়িয়া',
        'Shariatpur Sadar': 'শরিয়তপুর সদর',
        'Zanjira': 'জঞ্জিরা',
        'Tangail': 'টাঙ্গাইল',
        'Basail': 'বাসাইল',
        'Bhuapur': 'ভূয়াপুর',
        'Delduar': 'দেলদুয়ার',
        'Dhanbari': 'ধানবাড়ি',
        'Ghatail': 'ঘাটাইল',
        'Gopalpur': 'গোপালপুর',
        'Kalihati': 'কালিহাতি',
        'Madhupur': 'মধুপুর',
        'Mirzapur': 'মির্জাপুর',
        'Nagarpur': 'নাগরপুর',
        'Sakhipur': 'সখীপুর',
        'Tangail Sadar': 'টাঙ্গাইল সদর',
        'Bagerhat': 'বাগেরহাট',
        'Bagerhat Sadar': 'বাগেরহাট সদর',
        'Chitalmari': 'চিতলমারী',
        'Fakirhat': 'ফকিরহাট',
        'Mollahat': 'মোল্লাহাট',
        'Mongla': 'মোংলা',
        'Morrelganj': 'মোরেলগঞ্জ',
        'Rampal': 'রামপাল',
        'Sarankhola': 'সারণখোলা',
        'Chuadanga': 'চুয়াডাঙ্গা',
        'Chuadanga Sadar': 'চুয়াডাঙ্গা সদর',
        'Alamdanga': 'আলমডাঙ্গা',
        'Damurhuda': 'দামুরহুদা',
        'Jibannagar': 'জীবননগর',
        'Jessore': 'যশোর',
        'Jessore Sadar': 'যশোর সদর',
        'Abhaynagar': 'অভয়নগর',
        'Bagherpara': 'বাঘেরপাড়া',
        'Chaugachha': 'চৌগাছা',
        'Jhikargachha': 'ঝিকরগাছা',
        'Keshabpur': 'কেশবপুর',
        'Manirampur': 'মনিরামপুর',
        'Sharsha': 'শার্শা',
        'Jhenaidah': 'ঝিনাইদহ',
        'Jhenaidah Sadar': 'ঝিনাইদহ সদর',
        'Harinakunda': 'হারিনাকুন্ডা',
        'Kotchandpur': 'কোটচাঁদপুর',
        'Maheshpur': 'মহেশপুর',
        'Shailkupa': 'শৈলকুপা',
        'Khulna': 'খুলনা',
        'Dacope': 'ডাকোপ',
        'Batiaghata': 'বাটিয়াঘাটা',
        'Dumuria': 'দুমুরিয়া',
        'Dighalia': 'দিঘলিয়া',
        'Koyra': 'কয়রা',
        'Paikgachha': 'পাইকগাছা',
        'Phultala': 'ফুলতলা',
        'Rupsa': 'রূপসা',
        'Terokhada': 'তেরখাদা',
        'Kushtia': 'কুষ্টিয়া',
        'Kushtia Sadar': 'কুষ্টিয়া সদর',
        'Bheramara': 'ভেরামারা',
        'Khoksa': 'খোকসা',
        'Kumarkhali': 'কুমারখালী',
        'Magura': 'মাগুরা',
        'Magura Sadar': 'মাগুরা সদর',
        'Shalikha': 'শালিখা',
        'Meherpur': 'মেহেরপুর',
        'Meherpur Sadar': 'মেহেরপুর সদর',
        'Gangni': 'গাংনী',
        'Mujibnagar': 'মুজিবনগর',
        'Narail': 'নড়াইল',
        'Narail Sadar': 'নড়াইল সদর',
        'Kalia': 'কালিয়া',
        'Satkhira': 'সাতক্ষীরা',
        'Satkhira Sadar': 'সাতক্ষীরা সদর',
        'Assasuni': 'আশাশুনি',
        'Debhata': 'দেবহাটা',
        'Kalaroa': 'কালরোয়া',
        'Shyamnagar': 'শ্যামনগর',
        'Tala': 'তালা',
        'Jamalkandi': 'জামালকান্দি',
        'Jamalkandi Sadar': 'জামালকান্দি সদর',
        'Bhaluka': 'ভালুকা',
        'Gafargaon': 'গফরগাঁও',
        'Haluaghat': 'হালুয়াঘাট',
        'Nandail': 'নন্দাইল',
        'Netrakona': 'নেত্রকোনা',
        'Jamalpur': 'জামালপুর',
        'Jamalpur Sadar': 'জামালপুর সদর',
        'Sarishabari': 'সরিষাবাড়ী',
        'Melandah': 'মেলান্দহ',
        'Dewanganj': 'দেওয়াঙ্গঞ্জ',
        'Islampur': 'ইসলামপুর',
        'Baksiganj': 'বাকসীগঞ্জ',
        'Mymensingh': 'ময়মনসিংহ',
        'Mymensingh Sadar': 'ময়মনসিংহ সদর',
        'Netrokona': 'নেত্রকোনা',
        'Netrokona Sadar': 'নেত্রকোনা সদর',
        'Atpara': 'আটপাড়া',
        'Barhatta': 'বারহাট্টা',
        'Durgapur': 'দুর্গাপুর',
        'Khaliajuri': 'খালিয়াজুরী',
        'Modon': 'মোডন',
        'Purbadhala': 'পূর্বধলা',
        'Shahid Moksud': 'শহীদ মোহসীন',
        'Sherpur': 'শেরপুর',
        'Sherpur Sadar': 'শেরপুর সদর',
        'Nalitabari': 'নালিতাবাড়ী',
        'Jhenaigati': 'ঝিনাইগাতি',
        'Sreebardi': 'শ্রীবাড়ী',
        'Nakla': 'নাকলা',
        'Bagura': 'বগুড়া',
        'Bagura Sadar': 'বগুড়া সদর',
        'Bogra': 'বগুড়া',
        'Bogra Sadar': 'বগুড়া সদর',
        'Dupchanchia': 'দুপচাঁচিয়া',
        'Dhunat': 'ধুনট',
        'Shajahanpur': 'শাজাহানপুর',
        'Sadar': 'সদর',
        'Kahalu': 'কাহালু',
        'Nandigram': 'নন্দিগ্রাম',
        'Pundro': 'পুন্দ্র',
        'Joypurhat': 'জয়পুরহাট',
        'Joypurhat Sadar': 'জয়পুরহাট সদর',
        'Kalai': 'কালাই',
        'Khetlal': 'খেতলাল',
        'Akandabari': 'আকন্দাবাড়ী',
        'Naogaon': 'নওগাঁ',
        'Naogaon Sadar': 'নওগাঁ সদর',
        'Atrai': 'আত্রাই',
        'Badalgachhi': 'বদলগাছী',
        'Dhamuirhat': 'ধামুইরহাট',
        'Mohadevpur': 'মহাদেবপুর',
        'Porsha': 'পোরশা',
        'Raninagar': 'রানীনগর',
        'Sapahar': 'সাপাহার',
        'Subarnapur': 'সুবর্ণপুর',
        'Natore': 'নাটোর',
        'Natore Sadar': 'নাটোর সদর',
        'Baraigram': 'বড়াইগ্রাম',
        'Bagatipara': 'বাগাতিপাড়া',
        'Gurudaspur': 'গুরুদাসপুর',
        'Lalpur': 'লালপুর',
        'Singra': 'সিংড়া',
        'Pabna': 'পাবনা',
        'Pabna Sadar': 'পাবনা সদর',
        'Bera': 'বেরার',
        'Chatmohar': 'চাটমোহর',
        'Ishwardi': 'ইশ্বরদী',
        'Sujanagar': 'সুজানগর',
        'Rajshahi': 'রাজশাহী',
        'Rajshahi Sadar': 'রাজশাহী সদর',
        'Bagha': 'বাঘা',
        'Charghat': 'চারঘাট',
        'Durgapur': 'দুর্গাপুর',
        'Puthia': 'পুঠিয়া',
        'Tanore': 'তানোর',
        'Sherpur': 'শেরপুর',
        'Sherpur Sadar': 'শেরপুর সদর',
        'Nakur': 'নাকুর',
        'Bogura': 'বগুড়া',
        'Bogura Sadar': 'বগুড়া সদর',
        'Dhunat': 'ধুনট',
        'Gabtali': 'গাবতলী',
        'Kahaloo': 'কাহালু',
        'Nandigram': 'নন্দিগ্রাম',
        'Sadar': 'সদর',
        'Shibganj': 'শিবগঞ্জ',
        'Sonatala': 'সোনাতলা',
        'Dinajpur': 'দিনাজপুর',
        'Birampur': 'বিরামপুর',
        'Chirirbandar': 'চিরিরবন্দর',
        'Dinajpur Sadar': 'দিনাজপুর সদর',
        'Ghoraghat': 'ঘোড়াঘাট',
        'Hakimpur': 'হাকিমপুর',
        'Kaharol': 'কাহারোল',
        'Nawabganj': 'নবাবগঞ্জ',
        'Parbatipur': 'পার্বতীপুর',
        'Sujanagar': 'সুজানগর',
        'Gaibandha': 'গাইবান্ধা',
        'Gaibandha Sadar': 'গাইবান্ধা সদর',
        'Gobindaganj': 'গোবিন্দগঞ্জ',
        'Palashbari': 'পালাশবাড়ী',
        'Sundarganj': 'সুন্দরগঞ্জ',
        'Shaghata': 'শাঘাটা',
        'Sadullapur': 'সাদুল্লাপুর',
        'Kurigram': 'কুড়িগ্রাম',
        'Bhurungamari': 'ভুরুঙ্গামারী',
        'Chilmari': 'চিলমারী',
        'Kurigram Sadar': 'কুড়িগ্রাম সদর',
        'Nageshwari': 'নাগেশ্বরী',
        'Rajarhat': 'রাজারহাট',
        'Rowmari': 'রৌমারী',
        'Ujirpur': 'উজিরপুর',
        'Lalmonirhat': 'লালমনিরহাট',
        'Aditmari': 'আদিতমারী',
        'Lalmonirhat Sadar': 'লালমনিরহাট সদর',
        'Hatibandha': 'হাতিবন্দা',
        'Patgram': 'পতগ্রাম',
        'Nilphamari': 'নীলফামারী',
        'Domar': 'ডোমার',
        'Nilphamari Sadar': 'নীলফামারী সদর',
        'Jaldhaka': 'জলঢাকা',
        'Saidpur': 'সৈদপুর',
        'Panchagarh': 'পঞ্চগড়',
        'Boda': 'বোদা',
        'Debiganj': 'দেবিগঞ্জ',
        'Panchagarh Sadar': 'পঞ্চগড় সদর',
        'Tetulia': 'তেতুলিয়া',
        'Rangpur': 'রংপুর',
        'Rangpur Sadar': 'রংপুর সদর',
        'Kawshalyganj': 'কাউশল্যগঞ্জ',
        'Mithapukur': 'মিঠাপুকুর',
        'Pirganj': 'পীরগঞ্জ',
        'Taraganj': 'তারাগঞ্জ',
        'Thakurgaon': 'ঠাকুরগাঁও',
        'Thakurgaon Sadar': 'ঠাকুরগাঁও সদর',
        'Baliadangi': 'বালিয়াডাঙ্গী',
        'Haripur': 'হরিপুর',
        'Pirgachha': 'পীরগাছা',
        'Ranishwar': 'রাণিশোড়',
        'Habiganj': 'হবিগঞ্জ',
        'Baniachong': 'বানিয়াচং',
        'Habiganj Sadar': 'হবিগঞ্জ সদর',
        'Lakhai': 'লাখাই',
        'Madhabpur': 'মাধবপুর',
        'Nabiganj': 'নবীগঞ্জ',
        'Shaistaganj': 'শায়েস্তাগঞ্জ',
        'Moulvibazar': 'মৌলভীবাজার',
        'Barlekha': 'বারলেখা',
        'Juri': 'জুরী',
        'Moulvibazar Sadar': 'মৌলভীবাজার সদর',
        'Rajnagar': 'রাজনগর',
        'Sreemangal': 'শ্রীমঙ্গল',
        'Kamalganj': 'কামালগঞ্জ',
        'Kulaura': 'কুলাউড়া',
        'Shreemangal': 'শ্রীমঙ্গল',
        'Sunamganj': 'সুনামগঞ্জ',
        'Bishwambharpur': 'বিশ্বম্ভরপুর',
        'Derai': 'দিরাই',
        'Dowarabazar': 'দোয়ারাবাজার',
        'Golarha': 'গোলারহ',
        'Jamalkandi': 'জামালকান্দি',
        'Jatrapur': 'জাত্রাপুর',
        'Sunamganj Sadar': 'সুনামগঞ্জ সদর',
        'Tahirpur': 'তাহিরপুর',
        // Sylhet Districts
        'Beanibazar': 'বিয়ানীবাজার',
        'Biswanath': 'বিশ্বনাথ',
        'Dakshin Surma': 'দক্ষিণ সুরমা',
        'Gowainghat': 'গোয়াইনঘাট',
        'Jaintiapur': 'জৈন্তিয়াপুর',
        'Osmani Nagar': 'ওসমানীনগর',
        'Sadar': 'সদর',
        'South Surma': 'দক্ষিণ সুরমা',
        'Utrara': 'উত্ররা',
    }
    const isEnglish = {{ App::getLocale() == 'en' ? 'true' : 'false' }};


    function addToFavourites(id, callback) {
        try {
            let formData = new FormData();

            formData.append('_token', '{{ csrf_token() }}');
            formData.append('id', id);

            fetch("{{ route('user.favourite.update') }}", {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status == "success") {
                        toastr.success(data.message);
                    } else {
                        toastr.error(data.message);
                    }
                    if (typeof callback == 'function') {
                        callback(data);
                    }
                });
        } catch (error) {
            toastr.error("Something Went Wrong");
            if (typeof callback == 'function') {
                callback(null);
            }
        }
    }

    function removeFromFavourites(id, callback) {
        try {
            let formData = new FormData();

            formData.append('_token', '{{ csrf_token() }}');
            formData.append('id', id);

            fetch("{{ route('user.favourite.delete') }}", {
                    method: 'POST',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status == "success") {
                        toastr.success(data.message);
                    } else {
                        toastr.error(data.message);
                    }
                    if (typeof callback == 'function') {
                        callback(data);
                    }
                });
        } catch (error) {
            toastr.error("Something Went Wrong");
            if (typeof callback == 'function') {
                callback(null);
            }
        }
    }

    let address_containers = document.querySelectorAll('.address_container');
    address_containers.forEach(address_container => {
        let hiddenInput = address_container.querySelector('.address_name');
        let addressMenuButton = address_container.querySelector('.address_menu_button');
        let addressMenuDropdown = address_container.querySelector('.address_menu_dropdown');
        let divisionBtns = address_container.querySelectorAll('.division_btn');
        let districtBtns = address_container.querySelectorAll('.district_btn');
        let zella_remover = address_container.querySelector('.zella_remover');


        addressMenuButton.addEventListener('click', function() {
            addressMenuDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (
                !address_container.contains(event.target)
            ) {
                addressMenuDropdown.classList.add('hidden');
            }
        });

        divisionBtns.forEach(divisionBtn => {
            divisionBtn.addEventListener('click', function() {
                address_container.querySelector(
                        `.district_container_${divisionBtn.getAttribute('data-divisionId')}`)
                    .style.left = "0px";
            })
        })

        districtBtns.forEach(districtBtn => {
            districtBtn.addEventListener('click', function() {
                address_container.querySelector(
                        `.subdistrict_container_${districtBtn.getAttribute('data-districtId')}_${districtBtn.getAttribute('data-divisionId')}`
                    )
                    .style.left = "0px";
            })
        })

        address_container.querySelectorAll('.country_btn').forEach(countryBtn => {
            countryBtn.addEventListener('click', function() {
                address_container.querySelector('.country_container').style.left = "100%";
            })
        });

        address_container.querySelectorAll('.remove_district').forEach(districtRemoveBtn => {
            districtRemoveBtn.addEventListener('click', function() {
                address_container.querySelectorAll('.district_container').forEach(
                    districtContainer =>
                    districtContainer.style
                    .left = "100%");
            })
        });

        address_container.querySelectorAll('.remove_subdistrict').forEach(subDistrictRemoveBtn => {
            subDistrictRemoveBtn.addEventListener('click', function() {
                address_container.querySelectorAll('.subdistrict_container').forEach(
                    subDistrictContainer =>
                    subDistrictContainer.style
                    .left = "100%");
            })
        });


        address_container.querySelectorAll('.subdistrict_btn').forEach(subdistrictBtn => {
            subdistrictBtn.addEventListener('click', function() {
                let submitValue = subdistrictBtn.getAttribute('data-value');
                hiddenInput.value = submitValue;
                let submitValueSplit = submitValue.split(', ');

                if (!isEnglish) {
                    submitValueSplit = submitValueSplit.map(i => {
                        return districtsBn[i];
                    })
                }


                addressMenuButton.innerHTML = `
                        <div class="flex items-center justify-between w-full">
                            <span>${submitValueSplit.join(', ')}</span>
                            <i class="fa fa-times text-secondary cursor-pointer zella_remover p-2"></i>
                        </div>
                    `;
                addressMenuDropdown.classList.toggle('hidden');
                zella_remover = address_container.querySelector('.zella_remover');
                zella_remover.addEventListener('click', function() {
                    hiddenInput.value = null;
                    addressMenuButton.innerHTML = `
                            <span class="text-slate-400">
                                ঠিকানা নির্বাচন করুন
                            </span>
                        `;
                });
                address_container.querySelectorAll('.subdistrict_container').forEach(
                    subDistrictContainer =>
                    subDistrictContainer.style
                    .left = "100%");
                address_container.querySelectorAll('.district_container').forEach(
                    districtContainer =>
                    districtContainer.style
                    .left = "100%");
            })
        })

        if (zella_remover) {
            zella_remover.addEventListener('click', function() {
                hiddenInput.value = null;
                addressMenuButton.innerHTML = `
                        <span class="text-slate-400">
                            ঠিকানা নির্বাচন করুন
                        </span>
                    `;
            });
        }


    });
</script>

<script>
    // Re-enable right click
    document.addEventListener('contextmenu', function (e) {
        e.stopPropagation();
    }, true);

    // Re-enable key shortcuts like F12, Ctrl+Shift+I, Ctrl+U
    document.addEventListener('keydown', function (e) {
        e.stopPropagation();
    }, true);

    // Allow selection and copy
    document.addEventListener('selectstart', function (e) {
        e.stopPropagation();
    }, true);
    document.addEventListener('copy', function (e) {
        e.stopPropagation();
    }, true);
</script>

@foreach ($errors->all() as $error)
    <script>
        toastr.error("{{ $error }}")
    </script>
@endforeach
@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}")
    </script>
@endif
@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}")
    </script>
@endif
{{-- {{session('error')}} --}}
@yield('js')
