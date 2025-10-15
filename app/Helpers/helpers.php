<?php

use App\Models\SubscriptionHistory;
use App\Models\User;
use App\Models\Packages;
use App\Models\Setting;
use Illuminate\Support\Carbon;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;
use Illuminate\Support\Facades\Http;

function validatePhoneNumber($phoneNumber, $region = 'BD')
{
  // Create an instance of PhoneNumberUtil
  $phoneUtil = PhoneNumberUtil::getInstance();

  try {
    // Parse the phone number with the region (country code)
    $parsedNumber = $phoneUtil->parse($phoneNumber, $region);

    // Check if the parsed number is valid
    if ($phoneUtil->isValidNumber($parsedNumber)) {
      return ['status' => true, 'message' => null];
    } else {
      return ['status' => false, 'message' => null];
    }
  } catch (NumberParseException $e) {
    return ['status' => false, 'message' => $e->getMessage()];
  }
}


function getAddress()
{

  return [
    [
      "name" => "Dhaka",
      "value" => "Dhaka",
      "districts" => [
        [
          "name" => "Dhaka",
          "value" => "Dhaka, Dhaka",
          "subdistricts" => [
            [
              "name" => "Adabor",
              "value" => "Dhaka, Dhaka, Adabor"
            ],
            [
              "name" => "Badda",
              "value" => "Dhaka, Dhaka, Badda"
            ],
            [
              "name" => "Bangsal",
              "value" => "Dhaka, Dhaka, Bangsal"
            ],
            [
              "name" => "Cantonment",
              "value" => "Dhaka, Dhaka, Cantonment"
            ],
            [
              "name" => "Chawkbazar",
              "value" => "Dhaka, Dhaka, Chawkbazar"
            ],
            [
              "name" => "Dhanmondi",
              "value" => "Dhaka, Dhaka, Dhanmondi"
            ],
            [
              "name" => "Gendaria",
              "value" => "Dhaka, Dhaka, Gendaria"
            ],
            [
              "name" => "Gulshan",
              "value" => "Dhaka, Dhaka, Gulshan"
            ],
            [
              "name" => "Hazaribagh",
              "value" => "Dhaka, Dhaka, Hazaribagh"
            ],
            [
              "name" => "Jatrabari",
              "value" => "Dhaka, Dhaka, Jatrabari"
            ],
            [
              "name" => "Kadamtali",
              "value" => "Dhaka, Dhaka, Kadamtali"
            ],
            [
              "name" => "Kafrul",
              "value" => "Dhaka, Dhaka, Kafrul"
            ],
            [
              "name" => "Kalabagan",
              "value" => "Dhaka, Dhaka, Kalabagan"
            ],
            [
              "name" => "Kamrangirchar",
              "value" => "Dhaka, Dhaka, Kamrangirchar"
            ],
            [
              "name" => "Khilkhet",
              "value" => "Dhaka, Dhaka, Khilkhet"
            ],
            [
              "name" => "Khilgaon",
              "value" => "Dhaka, Dhaka, Khilgaon"
            ],
            [
              "name" => "Kotwali",
              "value" => "Dhaka, Dhaka, Kotwali"
            ],
            [
              "name" => "Lalbagh",
              "value" => "Dhaka, Dhaka, Lalbagh"
            ],
            [
              "name" => "Mirpur",
              "value" => "Dhaka, Dhaka, Mirpur"
            ],
            [
              "name" => "Mohammadpur",
              "value" => "Dhaka, Dhaka, Mohammadpur"
            ],
            [
              "name" => "Motijheel",
              "value" => "Dhaka, Dhaka, Motijheel"
            ],
            [
              "name" => "New Market",
              "value" => "Dhaka, Dhaka, New Market"
            ],
            [
              "name" => "Pallabi",
              "value" => "Dhaka, Dhaka, Pallabi"
            ],
            [
              "name" => "Paltan",
              "value" => "Dhaka, Dhaka, Paltan"
            ],
            [
              "name" => "Ramna",
              "value" => "Dhaka, Dhaka, Ramna"
            ],
            [
              "name" => "Rampura",
              "value" => "Dhaka, Dhaka, Rampura"
            ],
            [
              "name" => "Sabujbagh",
              "value" => "Dhaka, Dhaka, Sabujbagh"
            ],
            [
              "name" => "Shah Ali",
              "value" => "Dhaka, Dhaka, Shah Ali"
            ],
            [
              "name" => "Shahbagh",
              "value" => "Dhaka, Dhaka, Shahbagh"
            ],
            [
              "name" => "Shyampur",
              "value" => "Dhaka, Dhaka, Shyampur"
            ],
            [
              "name" => "Sutrapur",
              "value" => "Dhaka, Dhaka, Sutrapur"
            ],
            [
              "name" => "Tejgaon",
              "value" => "Dhaka, Dhaka, Tejgaon"
            ],
            [
              "name" => "Uttar Khan",
              "value" => "Dhaka, Dhaka, Uttar Khan"
            ],
            [
              "name" => "Uttara",
              "value" => "Dhaka, Dhaka, Uttara"
            ],
            [
              "name" => "Vatara",
              "value" => "Dhaka, Dhaka, Vatara"
            ]
          ]
        ],
        [
          "name" => "Faridpur",
          "value" => "Dhaka, Faridpur",
          "subdistricts" => [
            [
              "name" => "Alfadanga",
              "value" => "Dhaka, Faridpur, Alfadanga"
            ],
            [
              "name" => "Bhanga",
              "value" => "Dhaka, Faridpur, Bhanga"
            ],
            [
              "name" => "Boalmari",
              "value" => "Dhaka, Faridpur, Boalmari"
            ],
            [
              "name" => "Charbhadrasan",
              "value" => "Dhaka, Faridpur, Charbhadrasan"
            ],
            [
              "name" => "Faridpur Sadar",
              "value" => "Dhaka, Faridpur, Faridpur Sadar"
            ],
            [
              "name" => "Madhukhali",
              "value" => "Dhaka, Faridpur, Madhukhali"
            ],
            [
              "name" => "Nagarkanda",
              "value" => "Dhaka, Faridpur, Nagarkanda"
            ],
            [
              "name" => "Sadarpur",
              "value" => "Dhaka, Faridpur, Sadarpur"
            ],
            [
              "name" => "Saltha",
              "value" => "Dhaka, Faridpur, Saltha"
            ]
          ]
        ],
        [
          "name" => "Gazipur",
          "value" => "Dhaka, Gazipur",
          "subdistricts" => [
            [
              "name" => "Gazipur Sadar",
              "value" => "Dhaka, Gazipur, Gazipur Sadar"
            ],
            [
              "name" => "Kaliakair",
              "value" => "Dhaka, Gazipur, Kaliakair"
            ],
            [
              "name" => "Kaliganj",
              "value" => "Dhaka, Gazipur, Kaliganj"
            ],
            [
              "name" => "Kapasia",
              "value" => "Dhaka, Gazipur, Kapasia"
            ],
            [
              "name" => "Sreepur",
              "value" => "Dhaka, Gazipur, Sreepur"
            ]
          ]
        ],
        [
          "name" => "Gopalganj",
          "value" => "Dhaka, Gopalganj",
          "subdistricts" => [
            [
              "name" => "Gopalganj Sadar",
              "value" => "Dhaka, Gopalganj, Gopalganj Sadar"
            ],
            [
              "name" => "Kashiani",
              "value" => "Dhaka, Gopalganj, Kashiani"
            ],
            [
              "name" => "Kotalipara",
              "value" => "Dhaka, Gopalganj, Kotalipara"
            ],
            [
              "name" => "Muksudpur",
              "value" => "Dhaka, Gopalganj, Muksudpur"
            ],
            [
              "name" => "Tungipara",
              "value" => "Dhaka, Gopalganj, Tungipara"
            ]
          ]
        ],
        [
          "name" => "Kishoreganj",
          "value" => "Dhaka, Kishoreganj",
          "subdistricts" => [
            [
              "name" => "Austagram",
              "value" => "Dhaka, Kishoreganj, Austagram"
            ],
            [
              "name" => "Bajitpur",
              "value" => "Dhaka, Kishoreganj, Bajitpur"
            ],
            [
              "name" => "Bhairab",
              "value" => "Dhaka, Kishoreganj, Bhairab"
            ],
            [
              "name" => "Hossainpur",
              "value" => "Dhaka, Kishoreganj, Hossainpur"
            ],
            [
              "name" => "Itna",
              "value" => "Dhaka, Kishoreganj, Itna"
            ],
            [
              "name" => "Karimganj",
              "value" => "Dhaka, Kishoreganj, Karimganj"
            ],
            [
              "name" => "Katiadi",
              "value" => "Dhaka, Kishoreganj, Katiadi"
            ],
            [
              "name" => "Kishoreganj Sadar",
              "value" => "Dhaka, Kishoreganj, Kishoreganj Sadar"
            ],
            [
              "name" => "Kuliarchar",
              "value" => "Dhaka, Kishoreganj, Kuliarchar"
            ],
            [
              "name" => "Mithamain",
              "value" => "Dhaka, Kishoreganj, Mithamain"
            ],
            [
              "name" => "Nikli",
              "value" => "Dhaka, Kishoreganj, Nikli"
            ],
            [
              "name" => "Pakundia",
              "value" => "Dhaka, Kishoreganj, Pakundia"
            ],
            [
              "name" => "Tarail",
              "value" => "Dhaka, Kishoreganj, Tarail"
            ]
          ]
        ],
        [
          "name" => "Madaripur",
          "value" => "Dhaka, Madaripur",
          "subdistricts" => [
            [
              "name" => "Kalkini",
              "value" => "Dhaka, Madaripur, Kalkini"
            ],
            [
              "name" => "Madaripur Sadar",
              "value" => "Dhaka, Madaripur, Madaripur Sadar"
            ],
            [
              "name" => "Rajoir",
              "value" => "Dhaka, Madaripur, Rajoir"
            ],
            [
              "name" => "Shibchar",
              "value" => "Dhaka, Madaripur, Shibchar"
            ]
          ]
        ],
        [
          "name" => "Manikganj",
          "value" => "Dhaka, Manikganj",
          "subdistricts" => [
            [
              "name" => "Daulatpur",
              "value" => "Dhaka, Manikganj, Daulatpur"
            ],
            [
              "name" => "Ghior",
              "value" => "Dhaka, Manikganj, Ghior"
            ],
            [
              "name" => "Harirampur",
              "value" => "Dhaka, Manikganj, Harirampur"
            ],
            [
              "name" => "Manikganj Sadar",
              "value" => "Dhaka, Manikganj, Manikganj Sadar"
            ],
            [
              "name" => "Saturia",
              "value" => "Dhaka, Manikganj, Saturia"
            ],
            [
              "name" => "Shibalaya",
              "value" => "Dhaka, Manikganj, Shibalaya"
            ],
            [
              "name" => "Singair",
              "value" => "Dhaka, Manikganj, Singair"
            ]
          ]
        ],
        [
          "name" => "Munshiganj",
          "value" => "Dhaka, Munshiganj",
          "subdistricts" => [
            [
              "name" => "Gazaria",
              "value" => "Dhaka, Munshiganj, Gazaria"
            ],
            [
              "name" => "Lohajang",
              "value" => "Dhaka, Munshiganj, Lohajang"
            ],
            [
              "name" => "Munshiganj Sadar",
              "value" => "Dhaka, Munshiganj, Munshiganj Sadar"
            ],
            [
              "name" => "Sirajdikhan",
              "value" => "Dhaka, Munshiganj, Sirajdikhan"
            ],
            [
              "name" => "Sreenagar",
              "value" => "Dhaka, Munshiganj, Sreenagar"
            ],
            [
              "name" => "Tongibari",
              "value" => "Dhaka, Munshiganj, Tongibari"
            ]
          ]
        ],
        [
          "name" => "Narayanganj",
          "value" => "Dhaka, Narayanganj",
          "subdistricts" => [
            [
              "name" => "Araihazar",
              "value" => "Dhaka, Narayanganj, Araihazar"
            ],
            [
              "name" => "Bandar",
              "value" => "Dhaka, Narayanganj, Bandar"
            ],
            [
              "name" => "Narayanganj Sadar",
              "value" => "Dhaka, Narayanganj, Narayanganj Sadar"
            ],
            [
              "name" => "Rupganj",
              "value" => "Dhaka, Narayanganj, Rupganj"
            ],
            [
              "name" => "Sonargaon",
              "value" => "Dhaka, Narayanganj, Sonargaon"
            ]
          ]
        ],
        [
          "name" => "Narsingdi",
          "value" => "Dhaka, Narsingdi",
          "subdistricts" => [
            [
              "name" => "Belabo",
              "value" => "Dhaka, Narsingdi, Belabo"
            ],
            [
              "name" => "Monohardi",
              "value" => "Dhaka, Narsingdi, Monohardi"
            ],
            [
              "name" => "Narsingdi Sadar",
              "value" => "Dhaka, Narsingdi, Narsingdi Sadar"
            ],
            [
              "name" => "Palash",
              "value" => "Dhaka, Narsingdi, Palash"
            ],
            [
              "name" => "Raipura",
              "value" => "Dhaka, Narsingdi, Raipura"
            ],
            [
              "name" => "Shibpur",
              "value" => "Dhaka, Narsingdi, Shibpur"
            ]
          ]
        ],
        [
          "name" => "Rajbari",
          "value" => "Dhaka, Rajbari",
          "subdistricts" => [
            [
              "name" => "Baliakandi",
              "value" => "Dhaka, Rajbari, Baliakandi"
            ],
            [
              "name" => "Goalanda",
              "value" => "Dhaka, Rajbari, Goalanda"
            ],
            [
              "name" => "Pangsha",
              "value" => "Dhaka, Rajbari, Pangsha"
            ],
            [
              "name" => "Rajbari Sadar",
              "value" => "Dhaka, Rajbari, Rajbari Sadar"
            ]
          ]
        ],
        [
          "name" => "Shariatpur",
          "value" => "Dhaka, Shariatpur",
          "subdistricts" => [
            [
              "name" => "Bhedarganj",
              "value" => "Dhaka, Shariatpur, Bhedarganj"
            ],
            [
              "name" => "Damudya",
              "value" => "Dhaka, Shariatpur, Damudya"
            ],
            [
              "name" => "Gosairhat",
              "value" => "Dhaka, Shariatpur, Gosairhat"
            ],
            [
              "name" => "Naria",
              "value" => "Dhaka, Shariatpur, Naria"
            ],
            [
              "name" => "Shariatpur Sadar",
              "value" => "Dhaka, Shariatpur, Shariatpur Sadar"
            ],
            [
              "name" => "Zanjira",
              "value" => "Dhaka, Shariatpur, Zanjira"
            ]
          ]
        ],
        [
          "name" => "Tangail",
          "value" => "Dhaka, Tangail",
          "subdistricts" => [
            [
              "name" => "Basail",
              "value" => "Dhaka, Tangail, Basail"
            ],
            [
              "name" => "Bhuapur",
              "value" => "Dhaka, Tangail, Bhuapur"
            ],
            [
              "name" => "Delduar",
              "value" => "Dhaka, Tangail, Delduar"
            ],
            [
              "name" => "Dhanbari",
              "value" => "Dhaka, Tangail, Dhanbari"
            ],
            [
              "name" => "Ghatail",
              "value" => "Dhaka, Tangail, Ghatail"
            ],
            [
              "name" => "Gopalpur",
              "value" => "Dhaka, Tangail, Gopalpur"
            ],
            [
              "name" => "Kalihati",
              "value" => "Dhaka, Tangail, Kalihati"
            ],
            [
              "name" => "Madhupur",
              "value" => "Dhaka, Tangail, Madhupur"
            ],
            [
              "name" => "Mirzapur",
              "value" => "Dhaka, Tangail, Mirzapur"
            ],
            [
              "name" => "Nagarpur",
              "value" => "Dhaka, Tangail, Nagarpur"
            ],
            [
              "name" => "Sakhipur",
              "value" => "Dhaka, Tangail, Sakhipur"
            ],
            [
              "name" => "Tangail Sadar",
              "value" => "Dhaka, Tangail, Tangail Sadar"
            ]
          ]
        ]
      ]
    ],
    [
      "name" => "Chittagong",
      "value" => "Chittagong",
      "districts" => [
        [
          "name" => "Bandarban",
          "value" => "Chittagong, Bandarban",
          "subdistricts" => [
            [
              "name" => "Bandarban Sadar",
              "value" => "Chittagong, Bandarban, Bandarban Sadar"
            ],
            [
              "name" => "Thanchi",
              "value" => "Chittagong, Bandarban, Thanchi"
            ],
            [
              "name" => "Ruma",
              "value" => "Chittagong, Bandarban, Ruma"
            ],
            [
              "name" => "Rowangchhari",
              "value" => "Chittagong, Bandarban, Rowangchhari"
            ],
            [
              "name" => "Lama",
              "value" => "Chittagong, Bandarban, Lama"
            ],
            [
              "name" => "Ali Kadam",
              "value" => "Chittagong, Bandarban, Ali Kadam"
            ],
            [
              "name" => "Naikhongchhari",
              "value" => "Chittagong, Bandarban, Naikhongchhari"
            ]
          ]
        ],
        [
          "name" => "Brahmanbaria",
          "value" => "Chittagong, Brahmanbaria",
          "subdistricts" => [
            [
              "name" => "Brahmanbaria Sadar",
              "value" => "Chittagong, Brahmanbaria, Brahmanbaria Sadar"
            ],
            [
              "name" => "Ashuganj",
              "value" => "Chittagong, Brahmanbaria, Ashuganj"
            ],
            [
              "name" => "Sarail",
              "value" => "Chittagong, Brahmanbaria, Sarail"
            ],
            [
              "name" => "Nasirnagar",
              "value" => "Chittagong, Brahmanbaria, Nasirnagar"
            ],
            [
              "name" => "Nabinagar",
              "value" => "Chittagong, Brahmanbaria, Nabinagar"
            ],
            [
              "name" => "Bancharampur",
              "value" => "Chittagong, Brahmanbaria, Bancharampur"
            ],
            [
              "name" => "Kasba",
              "value" => "Chittagong, Brahmanbaria, Kasba"
            ],
            [
              "name" => "Akhaura",
              "value" => "Chittagong, Brahmanbaria, Akhaura"
            ]
          ]
        ],
        [
          "name" => "Chandpur",
          "value" => "Chittagong, Chandpur",
          "subdistricts" => [
            [
              "name" => "Chandpur Sadar",
              "value" => "Chittagong, Chandpur, Chandpur Sadar"
            ],
            [
              "name" => "Haimchar",
              "value" => "Chittagong, Chandpur, Haimchar"
            ],
            [
              "name" => "Kachua",
              "value" => "Chittagong, Chandpur, Kachua"
            ],
            [
              "name" => "Shahrasti",
              "value" => "Chittagong, Chandpur, Shahrasti"
            ],
            [
              "name" => "Matlab Uttar",
              "value" => "Chittagong, Chandpur, Matlab Uttar"
            ],
            [
              "name" => "Matlab Dakkhin",
              "value" => "Chittagong, Chandpur, Matlab Dakkhin"
            ],
            [
              "name" => "Faridganj",
              "value" => "Chittagong, Chandpur, Faridganj"
            ]
          ]
        ],
        [
          "name" => "Chittagong",
          "value" => "Chittagong, Chittagong",
          "subdistricts" => [
            [
              "name" => "Anwara",
              "value" => "Chittagong, Chittagong, Anwara"
            ],
            [
              "name" => "Banshkhali",
              "value" => "Chittagong, Chittagong, Banshkhali"
            ],
            [
              "name" => "Boalkhali",
              "value" => "Chittagong, Chittagong, Boalkhali"
            ],
            [
              "name" => "Chandanaish",
              "value" => "Chittagong, Chittagong, Chandanaish"
            ],
            [
              "name" => "Fatikchhari",
              "value" => "Chittagong, Chittagong, Fatikchhari"
            ],
            [
              "name" => "Hathazari",
              "value" => "Chittagong, Chittagong, Hathazari"
            ],
            [
              "name" => "Lohagara",
              "value" => "Chittagong, Chittagong, Lohagara"
            ],
            [
              "name" => "Mirsharai",
              "value" => "Chittagong, Chittagong, Mirsharai"
            ],
            [
              "name" => "Patiya",
              "value" => "Chittagong, Chittagong, Patiya"
            ],
            [
              "name" => "Rangunia",
              "value" => "Chittagong, Chittagong, Rangunia"
            ],
            [
              "name" => "Raozan",
              "value" => "Chittagong, Chittagong, Raozan"
            ],
            [
              "name" => "Sandwip",
              "value" => "Chittagong, Chittagong, Sandwip"
            ],
            [
              "name" => "Satkania",
              "value" => "Chittagong, Chittagong, Satkania"
            ],
            [
              "name" => "Sitakunda",
              "value" => "Chittagong, Chittagong, Sitakunda"
            ]
          ]
        ],
        [
          "name" => "Cox's Bazar",
          "value" => "Chittagong, Cox's Bazar",
          "subdistricts" => [
            [
              "name" => "Chakaria",
              "value" => "Chittagong, Cox's Bazar, Chakaria"
            ],
            [
              "name" => "Cox's Bazar Sadar",
              "value" => "Chittagong, Cox's Bazar, Cox's Bazar Sadar"
            ],
            [
              "name" => "Kutubdia",
              "value" => "Chittagong, Cox's Bazar, Kutubdia"
            ],
            [
              "name" => "Maheshkhali",
              "value" => "Chittagong, Cox's Bazar, Maheshkhali"
            ],
            [
              "name" => "Ramu",
              "value" => "Chittagong, Cox's Bazar, Ramu"
            ],
            [
              "name" => "Teknaf",
              "value" => "Chittagong, Cox's Bazar, Teknaf"
            ],
            [
              "name" => "Ukhia",
              "value" => "Chittagong, Cox's Bazar, Ukhia"
            ],
            [
              "name" => "Pekua",
              "value" => "Chittagong, Cox's Bazar, Pekua"
            ]
          ]
        ],
        [
          "name" => "Cumilla",
          "value" => "Chittagong, Cumilla",
          "subdistricts" => [
            [
              "name" => "Barura",
              "value" => "Chittagong, Cumilla, Barura"
            ],
            [
              "name" => "Brahmanpara",
              "value" => "Chittagong, Cumilla, Brahmanpara"
            ],
            [
              "name" => "Burichang",
              "value" => "Chittagong, Cumilla, Burichang"
            ],
            [
              "name" => "Chandina",
              "value" => "Chittagong, Cumilla, Chandina"
            ],
            [
              "name" => "Daudkandi",
              "value" => "Chittagong, Cumilla, Daudkandi"
            ],
            [
              "name" => "Debidwar",
              "value" => "Chittagong, Cumilla, Debidwar"
            ],
            [
              "name" => "Homna",
              "value" => "Chittagong, Cumilla, Homna"
            ],
            [
              "name" => "Laksam",
              "value" => "Chittagong, Cumilla, Laksam"
            ],
            [
              "name" => "Meghna",
              "value" => "Chittagong, Cumilla, Meghna"
            ],
            [
              "name" => "Muradnagar",
              "value" => "Chittagong, Cumilla, Muradnagar"
            ],
            [
              "name" => "Nangalkot",
              "value" => "Chittagong, Cumilla, Nangalkot"
            ],
            [
              "name" => "Cumilla Adarsha Sadar",
              "value" => "Chittagong, Cumilla, Cumilla Adarsha Sadar"
            ],
            [
              "name" => "Cumilla Sadar Dakshin",
              "value" => "Chittagong, Cumilla, Cumilla Sadar Dakshin"
            ],
            [
              "name" => "Titas",
              "value" => "Chittagong, Cumilla, Titas"
            ],
            [
              "name" => "Monohorgonj",
              "value" => "Chittagong, Cumilla, Monohorgonj"
            ]
          ]
        ],
        [
          "name" => "Feni",
          "value" => "Chittagong, Feni",
          "subdistricts" => [
            [
              "name" => "Chhagalnaiya",
              "value" => "Chittagong, Feni, Chhagalnaiya"
            ],
            [
              "name" => "Daganbhuiyan",
              "value" => "Chittagong, Feni, Daganbhuiyan"
            ],
            [
              "name" => "Feni Sadar",
              "value" => "Chittagong, Feni, Feni Sadar"
            ],
            [
              "name" => "Parshuram",
              "value" => "Chittagong, Feni, Parshuram"
            ],
            [
              "name" => "Fulgazi",
              "value" => "Chittagong, Feni, Fulgazi"
            ],
            [
              "name" => "Sonagazi",
              "value" => "Chittagong, Feni, Sonagazi"
            ]
          ]
        ],
        [
          "name" => "Khagrachari",
          "value" => "Chittagong, Khagrachari",
          "subdistricts" => [
            [
              "name" => "Dighinala",
              "value" => "Chittagong, Khagrachari, Dighinala"
            ],
            [
              "name" => "Khagrachari Sadar",
              "value" => "Chittagong, Khagrachari, Khagrachari Sadar"
            ],
            [
              "name" => "Lakshmichhari",
              "value" => "Chittagong, Khagrachari, Lakshmichhari"
            ],
            [
              "name" => "Mahalchhari",
              "value" => "Chittagong, Khagrachari, Mahalchhari"
            ],
            [
              "name" => "Manikchhari",
              "value" => "Chittagong, Khagrachari, Manikchhari"
            ],
            [
              "name" => "Matiranga",
              "value" => "Chittagong, Khagrachari, Matiranga"
            ],
            [
              "name" => "Panchhari",
              "value" => "Chittagong, Khagrachari, Panchhari"
            ],
            [
              "name" => "Ramgarh",
              "value" => "Chittagong, Khagrachari, Ramgarh"
            ]
          ]
        ],
        [
          "name" => "Lakshmipur",
          "value" => "Chittagong, Lakshmipur",
          "subdistricts" => [
            [
              "name" => "Lakshmipur Sadar",
              "value" => "Chittagong, Lakshmipur, Lakshmipur Sadar"
            ],
            [
              "name" => "Kamalnagar",
              "value" => "Chittagong, Lakshmipur, Kamalnagar"
            ],
            [
              "name" => "Raipur",
              "value" => "Chittagong, Lakshmipur, Raipur"
            ],
            [
              "name" => "Ramganj",
              "value" => "Chittagong, Lakshmipur, Ramganj"
            ],
            [
              "name" => "Ramgati",
              "value" => "Chittagong, Lakshmipur, Ramgati"
            ]
          ]
        ],
        [
          "name" => "Noakhali",
          "value" => "Chittagong, Noakhali",
          "subdistricts" => [
            [
              "name" => "Begumganj",
              "value" => "Chittagong, Noakhali, Begumganj"
            ],
            [
              "name" => "Chatkhil",
              "value" => "Chittagong, Noakhali, Chatkhil"
            ],
            [
              "name" => "Companiganj",
              "value" => "Chittagong, Noakhali, Companiganj"
            ],
            [
              "name" => "Hatiya",
              "value" => "Chittagong, Noakhali, Hatiya"
            ],
            [
              "name" => "Kabirhat",
              "value" => "Chittagong, Noakhali, Kabirhat"
            ],
            [
              "name" => "Noakhali Sadar",
              "value" => "Chittagong, Noakhali, Noakhali Sadar"
            ],
            [
              "name" => "Senbagh",
              "value" => "Chittagong, Noakhali, Senbagh"
            ],
            [
              "name" => "Subarnachar",
              "value" => "Chittagong, Noakhali, Subarnachar"
            ]
          ]
        ],
        [
          "name" => "Rangamati",
          "value" => "Chittagong, Rangamati",
          "subdistricts" => [
            [
              "name" => "Baghaichhari",
              "value" => "Chittagong, Rangamati, Baghaichhari"
            ],
            [
              "name" => "Barkal",
              "value" => "Chittagong, Rangamati, Barkal"
            ],
            [
              "name" => "Kaptai",
              "value" => "Chittagong, Rangamati, Kaptai"
            ],
            [
              "name" => "Juraichhari",
              "value" => "Chittagong, Rangamati, Juraichhari"
            ],
            [
              "name" => "Langadu",
              "value" => "Chittagong, Rangamati, Langadu"
            ],
            [
              "name" => "Naniarchar",
              "value" => "Chittagong, Rangamati, Naniarchar"
            ],
            [
              "name" => "Rajasthali",
              "value" => "Chittagong, Rangamati, Rajasthali"
            ],
            [
              "name" => "Rangamati Sadar",
              "value" => "Chittagong, Rangamati, Rangamati Sadar"
            ]
          ]
        ]
      ]
    ],
    [
      "name" => "Rajshahi",
      "value" => "Rajshahi",
      "districts" => [
        [
          "name" => "Bogra",
          "value" => "Rajshahi, Bogra",
          "subdistricts" => [
            [
              "name" => "Bogra Sadar",
              "value" => "Rajshahi, Bogra, Bogra Sadar"
            ],
            [
              "name" => "Dupchanchia",
              "value" => "Rajshahi, Bogra, Dupchanchia"
            ],
            [
              "name" => "Dhunat",
              "value" => "Rajshahi, Bogra, Dhunat"
            ],
            [
              "name" => "Shajahanpur",
              "value" => "Rajshahi, Bogra, Shajahanpur"
            ],
            [
              "name" => "Sadar",
              "value" => "Rajshahi, Bogra, Sadar"
            ],
            [
              "name" => "Kahalu",
              "value" => "Rajshahi, Bogra, Kahalu"
            ],
            [
              "name" => "Nandigram",
              "value" => "Rajshahi, Bogra, Nandigram"
            ],
            [
              "name" => "Saturia",
              "value" => "Rajshahi, Bogra, Saturia"
            ],
            [
              "name" => "Pundro",
              "value" => "Rajshahi, Bogra, Pundro"
            ]
          ]
        ],
        [
          "name" => "Joypurhat",
          "value" => "Rajshahi, Joypurhat",
          "subdistricts" => [
            [
              "name" => "Joypurhat Sadar",
              "value" => "Rajshahi, Joypurhat, Joypurhat Sadar"
            ],
            [
              "name" => "Kalai",
              "value" => "Rajshahi, Joypurhat, Kalai"
            ],
            [
              "name" => "Khetlal",
              "value" => "Rajshahi, Joypurhat, Khetlal"
            ],
            [
              "name" => "Akandabari",
              "value" => "Rajshahi, Joypurhat, Akandabari"
            ],
            [
              "name" => "Bogra Sadar",
              "value" => "Rajshahi, Joypurhat, Bogra Sadar"
            ]
          ]
        ],
        [
          "name" => "Naogaon",
          "value" => "Rajshahi, Naogaon",
          "subdistricts" => [
            [
              "name" => "Naogaon Sadar",
              "value" => "Rajshahi, Naogaon, Naogaon Sadar"
            ],
            [
              "name" => "Atrai",
              "value" => "Rajshahi, Naogaon, Atrai"
            ],
            [
              "name" => "Badalgachhi",
              "value" => "Rajshahi, Naogaon, Badalgachhi"
            ],
            [
              "name" => "Dhamuirhat",
              "value" => "Rajshahi, Naogaon, Dhamuirhat"
            ],
            [
              "name" => "Mohadevpur",
              "value" => "Rajshahi, Naogaon, Mohadevpur"
            ],
            [
              "name" => "Porsha",
              "value" => "Rajshahi, Naogaon, Porsha"
            ],
            [
              "name" => "Raninagar",
              "value" => "Rajshahi, Naogaon, Raninagar"
            ],
            [
              "name" => "Sapahar",
              "value" => "Rajshahi, Naogaon, Sapahar"
            ],
            [
              "name" => "Subarnapur",
              "value" => "Rajshahi, Naogaon, Subarnapur"
            ]
          ]
        ],
        [
          "name" => "Natore",
          "value" => "Rajshahi, Natore",
          "subdistricts" => [
            [
              "name" => "Natore Sadar",
              "value" => "Rajshahi, Natore, Natore Sadar"
            ],
            [
              "name" => "Baraigram",
              "value" => "Rajshahi, Natore, Baraigram"
            ],
            [
              "name" => "Bagatipara",
              "value" => "Rajshahi, Natore, Bagatipara"
            ],
            [
              "name" => "Gurudaspur",
              "value" => "Rajshahi, Natore, Gurudaspur"
            ],
            [
              "name" => "Lalpur",
              "value" => "Rajshahi, Natore, Lalpur"
            ],
            [
              "name" => "Singra",
              "value" => "Rajshahi, Natore, Singra"
            ]
          ]
        ],
        [
          "name" => "Pabna",
          "value" => "Rajshahi, Pabna",
          "subdistricts" => [
            [
              "name" => "Pabna Sadar",
              "value" => "Rajshahi, Pabna, Pabna Sadar"
            ],
            [
              "name" => "Bera",
              "value" => "Rajshahi, Pabna, Bera"
            ],
            [
              "name" => "Chatmohar",
              "value" => "Rajshahi, Pabna, Chatmohar"
            ],
            [
              "name" => "Faridpur",
              "value" => "Rajshahi, Pabna, Faridpur"
            ],
            [
              "name" => "Ishwardi",
              "value" => "Rajshahi, Pabna, Ishwardi"
            ],
            [
              "name" => "Sujanagar",
              "value" => "Rajshahi, Pabna, Sujanagar"
            ]
          ]
        ],
        [
          "name" => "Rajshahi",
          "value" => "Rajshahi, Rajshahi",
          "subdistricts" => [
            [
              "name" => "Rajshahi Sadar",
              "value" => "Rajshahi, Rajshahi, Rajshahi Sadar"
            ],
            [
              "name" => "Bagha",
              "value" => "Rajshahi, Rajshahi, Bagha"
            ],
            [
              "name" => "Charghat",
              "value" => "Rajshahi, Rajshahi, Charghat"
            ],
            [
              "name" => "Durgapur",
              "value" => "Rajshahi, Rajshahi, Durgapur"
            ],
            [
              "name" => "Puthia",
              "value" => "Rajshahi, Rajshahi, Puthia"
            ],
            [
              "name" => "Tanore",
              "value" => "Rajshahi, Rajshahi, Tanore"
            ]
          ]
        ],
        [
          "name" => "Sherpur",
          "value" => "Rajshahi, Sherpur",
          "subdistricts" => [
            [
              "name" => "Sherpur Sadar",
              "value" => "Rajshahi, Sherpur, Sherpur Sadar"
            ],
            [
              "name" => "Nakur",
              "value" => "Rajshahi, Sherpur, Nakur"
            ]
          ]
        ]
      ]
    ],
    [
      "name" => "Khulna",
      "value" => "Khulna",
      "districts" => [
        [
          "name" => "Bagerhat",
          "value" => "Khulna, Bagerhat",
          "subdistricts" => [
            [
              "name" => "Bagerhat Sadar",
              "value" => "Khulna, Bagerhat, Bagerhat Sadar"
            ],
            [
              "name" => "Chitalmari",
              "value" => "Khulna, Bagerhat, Chitalmari"
            ],
            [
              "name" => "Fakirhat",
              "value" => "Khulna, Bagerhat, Fakirhat"
            ],
            [
              "name" => "Kachua",
              "value" => "Khulna, Bagerhat, Kachua"
            ],
            [
              "name" => "Mollahat",
              "value" => "Khulna, Bagerhat, Mollahat"
            ],
            [
              "name" => "Mongla",
              "value" => "Khulna, Bagerhat, Mongla"
            ],
            [
              "name" => "Morrelganj",
              "value" => "Khulna, Bagerhat, Morrelganj"
            ],
            [
              "name" => "Rampal",
              "value" => "Khulna, Bagerhat, Rampal"
            ],
            [
              "name" => "Sarankhola",
              "value" => "Khulna, Bagerhat, Sarankhola"
            ]
          ]
        ],
        [
          "name" => "Chuadanga",
          "value" => "Khulna, Chuadanga",
          "subdistricts" => [
            [
              "name" => "Chuadanga Sadar",
              "value" => "Khulna, Chuadanga, Chuadanga Sadar"
            ],
            [
              "name" => "Alamdanga",
              "value" => "Khulna, Chuadanga, Alamdanga"
            ],
            [
              "name" => "Damurhuda",
              "value" => "Khulna, Chuadanga, Damurhuda"
            ],
            [
              "name" => "Jibannagar",
              "value" => "Khulna, Chuadanga, Jibannagar"
            ]
          ]
        ],
        [
          "name" => "Jessore",
          "value" => "Khulna, Jessore",
          "subdistricts" => [
            [
              "name" => "Jessore Sadar",
              "value" => "Khulna, Jessore, Jessore Sadar"
            ],
            [
              "name" => "Abhaynagar",
              "value" => "Khulna, Jessore, Abhaynagar"
            ],
            [
              "name" => "Bagherpara",
              "value" => "Khulna, Jessore, Bagherpara"
            ],
            [
              "name" => "Chaugachha",
              "value" => "Khulna, Jessore, Chaugachha"
            ],
            [
              "name" => "Jhikargachha",
              "value" => "Khulna, Jessore, Jhikargachha"
            ],
            [
              "name" => "Keshabpur",
              "value" => "Khulna, Jessore, Keshabpur"
            ],
            [
              "name" => "Manirampur",
              "value" => "Khulna, Jessore, Manirampur"
            ],
            [
              "name" => "Sharsha",
              "value" => "Khulna, Jessore, Sharsha"
            ]
          ]
        ],
        [
          "name" => "Jhenaidah",
          "value" => "Khulna, Jhenaidah",
          "subdistricts" => [
            [
              "name" => "Jhenaidah Sadar",
              "value" => "Khulna, Jhenaidah, Jhenaidah Sadar"
            ],
            [
              "name" => "Harinakunda",
              "value" => "Khulna, Jhenaidah, Harinakunda"
            ],
            [
              "name" => "Kaliganj",
              "value" => "Khulna, Jhenaidah, Kaliganj"
            ],
            [
              "name" => "Kotchandpur",
              "value" => "Khulna, Jhenaidah, Kotchandpur"
            ],
            [
              "name" => "Maheshpur",
              "value" => "Khulna, Jhenaidah, Maheshpur"
            ],
            [
              "name" => "Shailkupa",
              "value" => "Khulna, Jhenaidah, Shailkupa"
            ]
          ]
        ],
        [
          "name" => "Khulna",
          "value" => "Khulna, Khulna",
          "subdistricts" => [
            [
              "name" => "Dacope",
              "value" => "Khulna, Khulna, Dacope"
            ],
            [
              "name" => "Batiaghata",
              "value" => "Khulna, Khulna, Batiaghata"
            ],
            [
              "name" => "Dumuria",
              "value" => "Khulna, Khulna, Dumuria"
            ],
            [
              "name" => "Dighalia",
              "value" => "Khulna, Khulna, Dighalia"
            ],
            [
              "name" => "Koyra",
              "value" => "Khulna, Khulna, Koyra"
            ],
            [
              "name" => "Paikgachha",
              "value" => "Khulna, Khulna, Paikgachha"
            ],
            [
              "name" => "Phultala",
              "value" => "Khulna, Khulna, Phultala"
            ],
            [
              "name" => "Rupsa",
              "value" => "Khulna, Khulna, Rupsa"
            ],
            [
              "name" => "Terokhada",
              "value" => "Khulna, Khulna, Terokhada"
            ]
          ]
        ],
        [
          "name" => "Kushtia",
          "value" => "Khulna, Kushtia",
          "subdistricts" => [
            [
              "name" => "Kushtia Sadar",
              "value" => "Khulna, Kushtia, Kushtia Sadar"
            ],
            [
              "name" => "Bheramara",
              "value" => "Khulna, Kushtia, Bheramara"
            ],
            [
              "name" => "Daulatpur",
              "value" => "Khulna, Kushtia, Daulatpur"
            ],
            [
              "name" => "Khoksa",
              "value" => "Khulna, Kushtia, Khoksa"
            ],
            [
              "name" => "Kumarkhali",
              "value" => "Khulna, Kushtia, Kumarkhali"
            ],
            [
              "name" => "Mirpur",
              "value" => "Khulna, Kushtia, Mirpur"
            ]
          ]
        ],
        [
          "name" => "Magura",
          "value" => "Khulna, Magura",
          "subdistricts" => [
            [
              "name" => "Magura Sadar",
              "value" => "Khulna, Magura, Magura Sadar"
            ],
            [
              "name" => "Mohammadpur",
              "value" => "Khulna, Magura, Mohammadpur"
            ],
            [
              "name" => "Shalikha",
              "value" => "Khulna, Magura, Shalikha"
            ],
            [
              "name" => "Sreepur",
              "value" => "Khulna, Magura, Sreepur"
            ]
          ]
        ],
        [
          "name" => "Meherpur",
          "value" => "Khulna, Meherpur",
          "subdistricts" => [
            [
              "name" => "Meherpur Sadar",
              "value" => "Khulna, Meherpur, Meherpur Sadar"
            ],
            [
              "name" => "Gangni",
              "value" => "Khulna, Meherpur, Gangni"
            ],
            [
              "name" => "Mujibnagar",
              "value" => "Khulna, Meherpur, Mujibnagar"
            ]
          ]
        ],
        [
          "name" => "Narail",
          "value" => "Khulna, Narail",
          "subdistricts" => [
            [
              "name" => "Narail Sadar",
              "value" => "Khulna, Narail, Narail Sadar"
            ],
            [
              "name" => "Kalia",
              "value" => "Khulna, Narail, Kalia"
            ],
            [
              "name" => "Lohagara",
              "value" => "Khulna, Narail, Lohagara"
            ]
          ]
        ],
        [
          "name" => "Satkhira",
          "value" => "Khulna, Satkhira",
          "subdistricts" => [
            [
              "name" => "Satkhira Sadar",
              "value" => "Khulna, Satkhira, Satkhira Sadar"
            ],
            [
              "name" => "Assasuni",
              "value" => "Khulna, Satkhira, Assasuni"
            ],
            [
              "name" => "Debhata",
              "value" => "Khulna, Satkhira, Debhata"
            ],
            [
              "name" => "Kalaroa",
              "value" => "Khulna, Satkhira, Kalaroa"
            ],
            [
              "name" => "Kaliganj",
              "value" => "Khulna, Satkhira, Kaliganj"
            ],
            [
              "name" => "Shyamnagar",
              "value" => "Khulna, Satkhira, Shyamnagar"
            ],
            [
              "name" => "Tala",
              "value" => "Khulna, Satkhira, Tala"
            ]
          ]
        ]
      ]
    ],
    [
      "name" => "Barisal",
      "value" => "Barisal",
      "districts" => [
        [
          "name" => "Barguna",
          "value" => "Barisal, Barguna",
          "subdistricts" => [
            [
              "name" => "Amtali",
              "value" => "Barisal, Barguna, Amtali"
            ],
            [
              "name" => "Bamna",
              "value" => "Barisal, Barguna, Bamna"
            ],
            [
              "name" => "Barguna Sadar",
              "value" => "Barisal, Barguna, Barguna Sadar"
            ],
            [
              "name" => "Betagi",
              "value" => "Barisal, Barguna, Betagi"
            ],
            [
              "name" => "Patharghata",
              "value" => "Barisal, Barguna, Patharghata"
            ],
            [
              "name" => "Taltali",
              "value" => "Barisal, Barguna, Taltali"
            ]
          ]
        ],
        [
          "name" => "Barisal",
          "value" => "Barisal, Barisal",
          "subdistricts" => [
            [
              "name" => "Agailjhara",
              "value" => "Barisal, Barisal, Agailjhara"
            ],
            [
              "name" => "Babuganj",
              "value" => "Barisal, Barisal, Babuganj"
            ],
            [
              "name" => "Bakerganj",
              "value" => "Barisal, Barisal, Bakerganj"
            ],
            [
              "name" => "Banaripara",
              "value" => "Barisal, Barisal, Banaripara"
            ],
            [
              "name" => "Gaurnadi",
              "value" => "Barisal, Barisal, Gaurnadi"
            ],
            [
              "name" => "Hizla",
              "value" => "Barisal, Barisal, Hizla"
            ],
            [
              "name" => "Barishal Sadar",
              "value" => "Barisal, Barisal, Barishal Sadar"
            ],
            [
              "name" => "Mehendiganj",
              "value" => "Barisal, Barisal, Mehendiganj"
            ],
            [
              "name" => "Muladi",
              "value" => "Barisal, Barisal, Muladi"
            ],
            [
              "name" => "Wazirpur",
              "value" => "Barisal, Barisal, Wazirpur"
            ]
          ]
        ],
        [
          "name" => "Bhola",
          "value" => "Barisal, Bhola",
          "subdistricts" => [
            [
              "name" => "Bhola Sadar",
              "value" => "Barisal, Bhola, Bhola Sadar"
            ],
            [
              "name" => "Burhanuddin",
              "value" => "Barisal, Bhola, Burhanuddin"
            ],
            [
              "name" => "Char Fasson",
              "value" => "Barisal, Bhola, Char Fasson"
            ],
            [
              "name" => "Daulatkhan",
              "value" => "Barisal, Bhola, Daulatkhan"
            ],
            [
              "name" => "Lalmohan",
              "value" => "Barisal, Bhola, Lalmohan"
            ],
            [
              "name" => "Manpura",
              "value" => "Barisal, Bhola, Manpura"
            ],
            [
              "name" => "Tazumuddin",
              "value" => "Barisal, Bhola, Tazumuddin"
            ]
          ]
        ],
        [
          "name" => "Jhalokati",
          "value" => "Barisal, Jhalokati",
          "subdistricts" => [
            [
              "name" => "Jhalokati Sadar",
              "value" => "Barisal, Jhalokati, Jhalokati Sadar"
            ],
            [
              "name" => "Kathalia",
              "value" => "Barisal, Jhalokati, Kathalia"
            ],
            [
              "name" => "Nalchity",
              "value" => "Barisal, Jhalokati, Nalchity"
            ],
            [
              "name" => "Rajapur",
              "value" => "Barisal, Jhalokati, Rajapur"
            ]
          ]
        ],
        [
          "name" => "Patuakhali",
          "value" => "Barisal, Patuakhali",
          "subdistricts" => [
            [
              "name" => "Bauphal",
              "value" => "Barisal, Patuakhali, Bauphal"
            ],
            [
              "name" => "Dashmina",
              "value" => "Barisal, Patuakhali, Dashmina"
            ],
            [
              "name" => "Galachipa",
              "value" => "Barisal, Patuakhali, Galachipa"
            ],
            [
              "name" => "Kalapara",
              "value" => "Barisal, Patuakhali, Kalapara"
            ],
            [
              "name" => "Mirzaganj",
              "value" => "Barisal, Patuakhali, Mirzaganj"
            ],
            [
              "name" => "Patuakhali Sadar",
              "value" => "Barisal, Patuakhali, Patuakhali Sadar"
            ],
            [
              "name" => "Rangabali",
              "value" => "Barisal, Patuakhali, Rangabali"
            ],
            [
              "name" => "Dumki",
              "value" => "Barisal, Patuakhali, Dumki"
            ]
          ]
        ],
        [
          "name" => "Pirojpur",
          "value" => "Barisal, Pirojpur",
          "subdistricts" => [
            [
              "name" => "Bhandaria",
              "value" => "Barisal, Pirojpur, Bhandaria"
            ],
            [
              "name" => "Kawkhali",
              "value" => "Barisal, Pirojpur, Kawkhali"
            ],
            [
              "name" => "Mathbaria",
              "value" => "Barisal, Pirojpur, Mathbaria"
            ],
            [
              "name" => "Nazirpur",
              "value" => "Barisal, Pirojpur, Nazirpur"
            ],
            [
              "name" => "Pirojpur Sadar",
              "value" => "Barisal, Pirojpur, Pirojpur Sadar"
            ],
            [
              "name" => "Nesarabad (Swarupkati)",
              "value" => "Barisal, Pirojpur, Nesarabad (Swarupkati)"
            ],
            [
              "name" => "Zianagar",
              "value" => "Barisal, Pirojpur, Zianagar"
            ]
          ]
        ]
      ]
    ],
    [
      "name" => "Mymensingh",
      "value" => "Mymensingh",
      "districts" => [
        [
          "name" => "Jamalkandi",
          "value" => "Mymensingh, Jamalkandi",
          "subdistricts" => [
            [
              "name" => "Jamalkandi Sadar",
              "value" => "Mymensingh, Jamalkandi, Jamalkandi Sadar"
            ],
            [
              "name" => "Bhaluka",
              "value" => "Mymensingh, Jamalkandi, Bhaluka"
            ],
            [
              "name" => "Gafargaon",
              "value" => "Mymensingh, Jamalkandi, Gafargaon"
            ],
            [
              "name" => "Haluaghat",
              "value" => "Mymensingh, Jamalkandi, Haluaghat"
            ],
            [
              "name" => "Nandail",
              "value" => "Mymensingh, Jamalkandi, Nandail"
            ],
            [
              "name" => "Netrakona",
              "value" => "Mymensingh, Jamalkandi, Netrakona"
            ]
          ]
        ],
        [
          "name" => "Jamalpur",
          "value" => "Mymensingh, Jamalpur",
          "subdistricts" => [
            [
              "name" => "Jamalpur Sadar",
              "value" => "Mymensingh, Jamalpur, Jamalpur Sadar"
            ],
            [
              "name" => "Sarishabari",
              "value" => "Mymensingh, Jamalpur, Sarishabari"
            ],
            [
              "name" => "Melandah",
              "value" => "Mymensingh, Jamalpur, Melandah"
            ],
            [
              "name" => "Dewanganj",
              "value" => "Mymensingh, Jamalpur, Dewanganj"
            ],
            [
              "name" => "Islampur",
              "value" => "Mymensingh, Jamalpur, Islampur"
            ],
            [
              "name" => "Baksiganj",
              "value" => "Mymensingh, Jamalpur, Baksiganj"
            ]
          ]
        ],
        [
          "name" => "Mymensingh",
          "value" => "Mymensingh, Mymensingh",
          "subdistricts" => [
            [
              "name" => "Mymensingh Sadar",
              "value" => "Mymensingh, Mymensingh, Mymensingh Sadar"
            ],
            [
              "name" => "Bhaluka",
              "value" => "Mymensingh, Mymensingh, Bhaluka"
            ],
            [
              "name" => "Gafargaon",
              "value" => "Mymensingh, Mymensingh, Gafargaon"
            ],
            [
              "name" => "Haluaghat",
              "value" => "Mymensingh, Mymensingh, Haluaghat"
            ],
            [
              "name" => "Nandail",
              "value" => "Mymensingh, Mymensingh, Nandail"
            ]
          ]
        ],
        [
          "name" => "Netrokona",
          "value" => "Mymensingh, Netrokona",
          "subdistricts" => [
            [
              "name" => "Netrokona Sadar",
              "value" => "Mymensingh, Netrokona, Netrokona Sadar"
            ],
            [
              "name" => "Atpara",
              "value" => "Mymensingh, Netrokona, Atpara"
            ],
            [
              "name" => "Barhatta",
              "value" => "Mymensingh, Netrokona, Barhatta"
            ],
            [
              "name" => "Durgapur",
              "value" => "Mymensingh, Netrokona, Durgapur"
            ],
            [
              "name" => "Khaliajuri",
              "value" => "Mymensingh, Netrokona, Khaliajuri"
            ],
            [
              "name" => "Modon",
              "value" => "Mymensingh, Netrokona, Modon"
            ],
            [
              "name" => "Purbadhala",
              "value" => "Mymensingh, Netrokona, Purbadhala"
            ],
            [
              "name" => "Shahid Moksud",
              "value" => "Mymensingh, Netrokona, Shahid Moksud"
            ]
          ]
        ],
        [
          "name" => "Sherpur",
          "value" => "Mymensingh, Sherpur",
          "subdistricts" => [
            [
              "name" => "Sherpur Sadar",
              "value" => "Mymensingh, Sherpur, Sherpur Sadar"
            ],
            [
              "name" => "Nalitabari",
              "value" => "Mymensingh, Sherpur, Nalitabari"
            ],
            [
              "name" => "Jhenaigati",
              "value" => "Mymensingh, Sherpur, Jhenaigati"
            ],
            [
              "name" => "Sreebardi",
              "value" => "Mymensingh, Sherpur, Sreebardi"
            ],
            [
              "name" => "Nakla",
              "value" => "Mymensingh, Sherpur, Nakla"
            ]
          ]
        ]
      ]
    ],
    [
      "name" => "Rangpur",
      "value" => "Rangpur",
      "districts" => [
        [
          "name" => "Bagura",
          "value" => "Rangpur, Bagura",
          "subdistricts" => [
            [
              "name" => "Bagura Sadar",
              "value" => "Rangpur, Bagura, Bagura Sadar"
            ],
            [
              "name" => "Dhunat",
              "value" => "Rangpur, Bagura, Dhunat"
            ],
            [
              "name" => "Gabtali",
              "value" => "Rangpur, Bagura, Gabtali"
            ],
            [
              "name" => "Kahaloo",
              "value" => "Rangpur, Bagura, Kahaloo"
            ],
            [
              "name" => "Nandigram",
              "value" => "Rangpur, Bagura, Nandigram"
            ],
            [
              "name" => "Sadar",
              "value" => "Rangpur, Bagura, Sadar"
            ],
            [
              "name" => "Shibganj",
              "value" => "Rangpur, Bagura, Shibganj"
            ],
            [
              "name" => "Sonatala",
              "value" => "Rangpur, Bagura, Sonatala"
            ]
          ]
        ],
        [
          "name" => "Dinajpur",
          "value" => "Rangpur, Dinajpur",
          "subdistricts" => [
            [
              "name" => "Birampur",
              "value" => "Rangpur, Dinajpur, Birampur"
            ],
            [
              "name" => "Chirirbandar",
              "value" => "Rangpur, Dinajpur, Chirirbandar"
            ],
            [
              "name" => "Dinajpur Sadar",
              "value" => "Rangpur, Dinajpur, Dinajpur Sadar"
            ],
            [
              "name" => "Ghoraghat",
              "value" => "Rangpur, Dinajpur, Ghoraghat"
            ],
            [
              "name" => "Hakimpur",
              "value" => "Rangpur, Dinajpur, Hakimpur"
            ],
            [
              "name" => "Kaharol",
              "value" => "Rangpur, Dinajpur, Kaharol"
            ],
            [
              "name" => "Nawabganj",
              "value" => "Rangpur, Dinajpur, Nawabganj"
            ],
            [
              "name" => "Parbatipur",
              "value" => "Rangpur, Dinajpur, Parbatipur"
            ],
            [
              "name" => "Sujanagar",
              "value" => "Rangpur, Dinajpur, Sujanagar"
            ]
          ]
        ],
        [
          "name" => "Gaibandha",
          "value" => "Rangpur, Gaibandha",
          "subdistricts" => [
            [
              "name" => "Gaibandha Sadar",
              "value" => "Rangpur, Gaibandha, Gaibandha Sadar"
            ],
            [
              "name" => "Gobindaganj",
              "value" => "Rangpur, Gaibandha, Gobindaganj"
            ],
            [
              "name" => "Palashbari",
              "value" => "Rangpur, Gaibandha, Palashbari"
            ],
            [
              "name" => "Sundarganj",
              "value" => "Rangpur, Gaibandha, Sundarganj"
            ],
            [
              "name" => "Shaghata",
              "value" => "Rangpur, Gaibandha, Shaghata"
            ],
            [
              "name" => "Sadullapur",
              "value" => "Rangpur, Gaibandha, Sadullapur"
            ]
          ]
        ],
        [
          "name" => "Kurigram",
          "value" => "Rangpur, Kurigram",
          "subdistricts" => [
            [
              "name" => "Bhurungamari",
              "value" => "Rangpur, Kurigram, Bhurungamari"
            ],
            [
              "name" => "Chilmari",
              "value" => "Rangpur, Kurigram, Chilmari"
            ],
            [
              "name" => "Kurigram Sadar",
              "value" => "Rangpur, Kurigram, Kurigram Sadar"
            ],
            [
              "name" => "Nageshwari",
              "value" => "Rangpur, Kurigram, Nageshwari"
            ],
            [
              "name" => "Rajarhat",
              "value" => "Rangpur, Kurigram, Rajarhat"
            ],
            [
              "name" => "Rajarhat",
              "value" => "Rangpur, Kurigram, Rajarhat"
            ],
            [
              "name" => "Rowmari",
              "value" => "Rangpur, Kurigram, Rowmari"
            ],
            [
              "name" => "Ujirpur",
              "value" => "Rangpur, Kurigram, Ujirpur"
            ]
          ]
        ],
        [
          "name" => "Lalmonirhat",
          "value" => "Rangpur, Lalmonirhat",
          "subdistricts" => [
            [
              "name" => "Aditmari",
              "value" => "Rangpur, Lalmonirhat, Aditmari"
            ],
            [
              "name" => "Lalmonirhat Sadar",
              "value" => "Rangpur, Lalmonirhat, Lalmonirhat Sadar"
            ],
            [
              "name" => "Hatibandha",
              "value" => "Rangpur, Lalmonirhat, Hatibandha"
            ],
            [
              "name" => "Kaliganj",
              "value" => "Rangpur, Lalmonirhat, Kaliganj"
            ],
            [
              "name" => "Patgram",
              "value" => "Rangpur, Lalmonirhat, Patgram"
            ]
          ]
        ],
        [
          "name" => "Nilphamari",
          "value" => "Rangpur, Nilphamari",
          "subdistricts" => [
            [
              "name" => "Domar",
              "value" => "Rangpur, Nilphamari, Domar"
            ],
            [
              "name" => "Nilphamari Sadar",
              "value" => "Rangpur, Nilphamari, Nilphamari Sadar"
            ],
            [
              "name" => "Jaldhaka",
              "value" => "Rangpur, Nilphamari, Jaldhaka"
            ],
            [
              "name" => "Kishoreganj",
              "value" => "Rangpur, Nilphamari, Kishoreganj"
            ],
            [
              "name" => "Saidpur",
              "value" => "Rangpur, Nilphamari, Saidpur"
            ]
          ]
        ],
        [
          "name" => "Panchagarh",
          "value" => "Rangpur, Panchagarh",
          "subdistricts" => [
            [
              "name" => "Boda",
              "value" => "Rangpur, Panchagarh, Boda"
            ],
            [
              "name" => "Debiganj",
              "value" => "Rangpur, Panchagarh, Debiganj"
            ],
            [
              "name" => "Panchagarh Sadar",
              "value" => "Rangpur, Panchagarh, Panchagarh Sadar"
            ],
            [
              "name" => "Tetulia",
              "value" => "Rangpur, Panchagarh, Tetulia"
            ]
          ]
        ],
        [
          "name" => "Rangpur",
          "value" => "Rangpur, Rangpur",
          "subdistricts" => [
            [
              "name" => "Rangpur Sadar",
              "value" => "Rangpur, Rangpur, Rangpur Sadar"
            ],
            [
              "name" => "Kawshalyganj",
              "value" => "Rangpur, Rangpur, Kawshalyganj"
            ],
            [
              "name" => "Mithapukur",
              "value" => "Rangpur, Rangpur, Mithapukur"
            ],
            [
              "name" => "Pirganj",
              "value" => "Rangpur, Rangpur, Pirganj"
            ],
            [
              "name" => "Taraganj",
              "value" => "Rangpur, Rangpur, Taraganj"
            ]
          ]
        ],
        [
          "name" => "Thakurgaon",
          "value" => "Rangpur, Thakurgaon",
          "subdistricts" => [
            [
              "name" => "Thakurgaon Sadar",
              "value" => "Rangpur, Thakurgaon, Thakurgaon Sadar"
            ],
            [
              "name" => "Baliadangi",
              "value" => "Rangpur, Thakurgaon, Baliadangi"
            ],
            [
              "name" => "Haripur",
              "value" => "Rangpur, Thakurgaon, Haripur"
            ],
            [
              "name" => "Pirgachha",
              "value" => "Rangpur, Thakurgaon, Pirgachha"
            ],
            [
              "name" => "Ranishwar",
              "value" => "Rangpur, Thakurgaon, Ranishwar"
            ]
          ]
        ]
      ]
    ],
    [
      "name" => "Sylhet",
      "value" => "Sylhet",
      "districts" => [
        [
          "name" => "Habiganj",
          "value" => "Sylhet, Habiganj",
          "subdistricts" => [
            [
              "name" => "Baniachong",
              "value" => "Sylhet, Habiganj, Baniachong"
            ],
            [
              "name" => "Habiganj Sadar",
              "value" => "Sylhet, Habiganj, Habiganj Sadar"
            ],
            [
              "name" => "Lakhai",
              "value" => "Sylhet, Habiganj, Lakhai"
            ],
            [
              "name" => "Madhabpur",
              "value" => "Sylhet, Habiganj, Madhabpur"
            ],
            [
              "name" => "Nabiganj",
              "value" => "Sylhet, Habiganj, Nabiganj"
            ],
            [
              "name" => "Shaistaganj",
              "value" => "Sylhet, Habiganj, Shaistaganj"
            ]
          ]
        ],
        [
          "name" => "Moulvibazar",
          "value" => "Sylhet, Moulvibazar",
          "subdistricts" => [
            [
              "name" => "Barlekha",
              "value" => "Sylhet, Moulvibazar, Barlekha"
            ],
            [
              "name" => "Juri",
              "value" => "Sylhet, Moulvibazar, Juri"
            ],
            [
              "name" => "Moulvibazar Sadar",
              "value" => "Sylhet, Moulvibazar, Moulvibazar Sadar"
            ],
            [
              "name" => "Rajnagar",
              "value" => "Sylhet, Moulvibazar, Rajnagar"
            ],
            [
              "name" => "Sreemangal",
              "value" => "Sylhet, Moulvibazar, Sreemangal"
            ],
            [
              "name" => "Kamalganj",
              "value" => "Sylhet, Moulvibazar, Kamalganj"
            ],
            [
              "name" => "Kulaura",
              "value" => "Sylhet, Moulvibazar, Kulaura"
            ],
            [
              "name" => "Shreemangal",
              "value" => "Sylhet, Moulvibazar, Shreemangal"
            ]
          ]
        ],
        [
          "name" => "Sunamganj",
          "value" => "Sylhet, Sunamganj",
          "subdistricts" => [
            [
              "name" => "Bishwambharpur",
              "value" => "Sylhet, Sunamganj, Bishwambharpur"
            ],
            [
              "name" => "Derai",
              "value" => "Sylhet, Sunamganj, Derai"
            ],
            [
              "name" => "Dowarabazar",
              "value" => "Sylhet, Sunamganj, Dowarabazar"
            ],
            [
              "name" => "Golarha",
              "value" => "Sylhet, Sunamganj, Golarha"
            ],
            [
              "name" => "Jamalkandi",
              "value" => "Sylhet, Sunamganj, Jamalkandi"
            ],
            [
              "name" => "Jatrapur",
              "value" => "Sylhet, Sunamganj, Jatrapur"
            ],
            [
              "name" => "Sunamganj Sadar",
              "value" => "Sylhet, Sunamganj, Sunamganj Sadar"
            ],
            [
              "name" => "Tahirpur",
              "value" => "Sylhet, Sunamganj, Tahirpur"
            ]
          ]
        ],
        [
          "name" => "Sylhet",
          "value" => "Sylhet, Sylhet",
          "subdistricts" => [
            [
              "name" => "Beanibazar",
              "value" => "Sylhet, Sylhet, Beanibazar"
            ],
            [
              "name" => "Biswanath",
              "value" => "Sylhet, Sylhet, Biswanath"
            ],
            [
              "name" => "Companiganj",
              "value" => "Sylhet, Sylhet, Companiganj"
            ],
            [
              "name" => "Dakshin Surma",
              "value" => "Sylhet, Sylhet, Dakshin Surma"
            ],
            [
              "name" => "Gowainghat",
              "value" => "Sylhet, Sylhet, Gowainghat"
            ],
            [
              "name" => "Jaintiapur",
              "value" => "Sylhet, Sylhet, Jaintiapur"
            ],
            [
              "name" => "Osmani Nagar",
              "value" => "Sylhet, Sylhet, Osmani Nagar"
            ],
            [
              "name" => "Sadar",
              "value" => "Sylhet, Sylhet, Sadar"
            ],
            [
              "name" => "South Surma",
              "value" => "Sylhet, Sylhet, South Surma"
            ],
            [
              "name" => "Utrara",
              "value" => "Sylhet, Sylhet, Utrara"
            ]
          ]
        ]
      ]
    ]
  ];
}


function BkashResponseStore($data)
{
  // Check if 'paymentID' exists and is not null

  // Ensure the key 'paymentID' is present in the $data array
  if (!isset($data['paymentID'])) {
    throw new \Exception('paymentID is not set in the provided data');
  }
  $existingResponse = SubscriptionHistory::where('payment_id', $data['paymentID'])->first();

  if (!$existingResponse) {
    $bkashStore = [
      'type' => $data['type'],
      'type_id' => $data['type_id'],
      'day' => $data['day'],
      'reference' => $data['reference'] ?? null,
      'pay_id' => $data['pay_id'] ?? null,
      'payment_id' => $data['paymentID'],  // Make sure this is the correct key
      'payment_details' => $data['payment_details'] ?? null,
      'trxID' => $data['trxID'] ?? null,
      'message' => $data['message'] ?? null,
      'status' => $data['status'],
      'status_code' => $data['status_code'] ?? null,
      'amount' => $data['amount'] ?? null,
      'users_id' => $data['users_id'] ?? null,
      'users' => json_encode($data['users']),
      'apiVersion' => $data['apiVersion'],
      'updated_at' => now(),
      'created_at' => now(),
    ];
    SubscriptionHistory::create($bkashStore);
  } else {

    $bkashStore = [
      'type' => $data['type'] ?? $existingResponse->type,
      'type_id' => $data['type_id'] ?? $existingResponse->type_id,
      'day' => $data['day'] ?? $existingResponse->day,
      'reference' => $data['reference'] ?? $existingResponse->reference,
      'pay_id' => $data['pay_id'] ?? $existingResponse->pay_id,
      'payment_id' => $data['paymentID'] ?? $existingResponse->paymentID,  // Correct key
      'payment_details' => $data['payment_details'] ?? $existingResponse->payment_details,
      'message' => $data['message'] ?? $existingResponse->message,
      'status_code' => $data['status_code'] ?? $existingResponse->status_code,
      'trxID' => $data['trxID'] ?? $existingResponse->trxID,
      'status' => $data['status'] ?? $existingResponse->status,
      'amount' => $data['amount'] ?? $existingResponse->amount,
      'users_id' => $data['users_id'] ?? $existingResponse->users_id,
      'users' => json_encode($data['users']) ?? $existingResponse->users,
      'apiVersion' => $data['apiVersion'] ?? $existingResponse->apiVersion,
      'updated_at' => now(),
    ];
    SubscriptionHistory::where('payment_id', $data['paymentID'])->update($bkashStore);
  }
}


function updateSubscription($userId, $subscriptionPackageId)
{
  // Fetch the user and subscription package
  $user = User::find($userId);
  $subscriptionPackage = Packages::where('id', $subscriptionPackageId)->where('status', 1)->first();

  if (!$user) {
    return redirect()->back()->withErrors("user", 'User Not Found');
  }

  if (!$subscriptionPackage) {
    return redirect()->back()->withErrors("user", 'No subscription package found for you. Please contact support.');
  }

  $day = $subscriptionPackage->day;
  $currentTime = Carbon::now();

  $expirationDate = Carbon::parse($user->subscription_expires_at);

  if ($user->subscription_status === 1) {
    // Check if the current subscription has expired
    if ($expirationDate <= $currentTime) {
      $expirationDate = $currentTime;
    }
  } else {
    if ($expirationDate <= $currentTime) {
      $expirationDate = $currentTime;
    }
  }

  $expirationDate->addDays($day);

  $userUpdate = [
    'subscription_at' => $currentTime,
    'subscription_expires_at' => $expirationDate->toDateTimeString(),
    'subscription_status' => 1,
    'subscription_id' => $subscriptionPackage->id,
    'subscription_pack' => json_encode($subscriptionPackage),
  ];

  User::where('id', $userId)->update($userUpdate);
}


function getSettings()
{
  return Setting::first();
}


// function sendSms($phone, $sms)
// {
//   $api = "http://103.177.125.106:7788/sendtext?apikey=a0b1cb231568de20&secretkey=159bafa9&callerID=1234&toUser=" . $phone . "&messageContent=" . $sms;
//   $response = Http::get($api);
//   $data = $response->json();
//   return $data;
// }

function sendSms($phone, $message)
{
//   if (config('app.debug')) {
//     // In debug mode, do not send SMS, just log or return a fake response
//     return ["debug" => true, "message" => "SMS not sent (debug mode)", "phone" => $phone, "content" => $message];
//   }

  // API Endpoint & Credentials
//   $api_url = "http://103.177.125.106:7788/sendtext";
//   $apikey = "a0b1cb231568de20";
//   $secretkey = "159bafa9";
//   $callerID = "1234";
  $api_url = "https://smpp.revesms.com:7790/sendtext";
  $apikey = "c1d7919d0f806205";
  $secretkey = "4064329f";
  $callerID = "1234";

  // Build the request URL
  $url = "{$api_url}?apikey={$apikey}&secretkey={$secretkey}&callerID={$callerID}&toUser=" . urlencode($phone) . "&messageContent=" . urlencode($message);

  // Initialize cURL
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Ignore SSL verification (if needed)

  // Execute the request
  $response = curl_exec($ch);
//   dd($ressponse);

  // Check for cURL errors
  if (curl_errno($ch)) {
    $error_msg = curl_error($ch);
    curl_close($ch);
    return ["error" => true, "message" => $error_msg];
  }

  curl_close($ch);

  // Convert JSON response to PHP array
  $data = json_decode($response, true);

  return $data ?: ["error" => true, "message" => "Invalid API response"];
}
