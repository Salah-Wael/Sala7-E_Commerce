<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('countries')->delete();

        DB::table('countries')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Afghanistan',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Albania',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Algeria',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Andorra',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Angola',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Antigua and Barbuda',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Argentina',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Armenia',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Australia',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Austria',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Azerbaijan',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'Bahamas',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Bahrain',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Bangladesh',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'Barbados',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'Belarus',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'Belgium',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'Belize',
            ),
            18 =>
            array (
                'id' => 19,
                'name' => 'Benin',
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'Bermuda',
            ),
            20 =>
            array (
                'id' => 21,
                'name' => 'Bhutan',
            ),
            21 =>
            array (
                'id' => 22,
                'name' => 'Bolivia',
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'Bosnia and Herzegovina',
            ),
            23 =>
            array (
                'id' => 24,
                'name' => 'Botswana',
            ),
            24 =>
            array (
                'id' => 25,
                'name' => 'Brazil',
            ),
            25 =>
            array (
                'id' => 26,
                'name' => 'Brunei',
            ),
            26 =>
            array (
                'id' => 27,
                'name' => 'Bulgaria',
            ),
            27 =>
            array (
                'id' => 28,
                'name' => 'Burkina Faso',
            ),
            28 =>
            array (
                'id' => 29,
                'name' => 'Burundi',
            ),
            29 =>
            array (
                'id' => 30,
                'name' => 'Cambodia',
            ),
            30 =>
            array (
                'id' => 31,
                'name' => 'Cameroon',
            ),
            31 =>
            array (
                'id' => 32,
                'name' => 'Canada',
            ),
            32 =>
            array (
                'id' => 33,
                'name' => 'Cape Verde',
            ),
            33 =>
            array (
                'id' => 34,
                'name' => 'Central African Republic',
            ),
            34 =>
            array (
                'id' => 35,
                'name' => 'Chad',
            ),
            35 =>
            array (
                'id' => 36,
                'name' => 'Chile',
            ),
            36 =>
            array (
                'id' => 37,
                'name' => 'China',
            ),
            37 =>
            array (
                'id' => 38,
                'name' => 'Chinese Taipei',
            ),
            38 =>
            array (
                'id' => 39,
                'name' => 'Colombia',
            ),
            39 =>
            array (
                'id' => 40,
                'name' => 'Comoros',
            ),
            40 =>
            array (
                'id' => 41,
                'name' => 'Costa Rica',
            ),
            41 =>
            array (
                'id' => 42,
                'name' => 'Côte dIvoire',
            ),
            42 =>
            array (
                'id' => 43,
                'name' => 'Croatia',
            ),
            43 =>
            array (
                'id' => 44,
                'name' => 'Cuba',
            ),
            44 =>
            array (
                'id' => 45,
                'name' => 'Cyprus',
            ),
            45 =>
            array (
                'id' => 46,
                'name' => 'Czechia',
            ),
            46 =>
            array (
                'id' => 47,
                'name' => 'Czechoslovakia',
            ),
            47 =>
            array (
                'id' => 48,
                'name' => 'Denmark',
            ),
            48 =>
            array (
                'id' => 49,
                'name' => 'Djibouti',
            ),
            49 =>
            array (
                'id' => 50,
                'name' => 'Dominican Republic',
            ),
            50 =>
            array (
                'id' => 51,
                'name' => 'East Timor',
            ),
            51 =>
            array (
                'id' => 52,
                'name' => 'Ecuador',
            ),
            52 =>
            array (
                'id' => 53,
                'name' => 'Egypt',
            ),
            53 =>
            array (
                'id' => 54,
                'name' => 'El Salvador',
            ),
            54 =>
            array (
                'id' => 55,
                'name' => 'Equatorial Guinea',
            ),
            55 =>
            array (
                'id' => 56,
                'name' => 'Eritrea',
            ),
            56 =>
            array (
                'id' => 57,
                'name' => 'Estonia',
            ),
            57 =>
            array (
                'id' => 58,
                'name' => 'Eswatini',
            ),
            58 =>
            array (
                'id' => 59,
                'name' => 'Ethiopia',
            ),
            59 =>
            array (
                'id' => 60,
                'name' => 'Federated States of Micronesia',
            ),
            60 =>
            array (
                'id' => 61,
                'name' => 'Fiji',
            ),
            61 =>
            array (
                'id' => 62,
                'name' => 'Finland',
            ),
            62 =>
            array (
                'id' => 63,
                'name' => 'France',
            ),
            63 =>
            array (
                'id' => 64,
                'name' => 'Gabon',
            ),
            64 =>
            array (
                'id' => 65,
                'name' => 'Georgia',
            ),
            65 =>
            array (
                'id' => 66,
                'name' => 'Germany',
            ),
            66 =>
            array (
                'id' => 67,
                'name' => 'Ghana',
            ),
            67 =>
            array (
                'id' => 68,
                'name' => 'Great Britain',
            ),
            68 =>
            array (
                'id' => 69,
                'name' => 'Greece',
            ),
            69 =>
            array (
                'id' => 70,
                'name' => 'Grenada',
            ),
            70 =>
            array (
                'id' => 71,
                'name' => 'Guatemala',
            ),
            71 =>
            array (
                'id' => 72,
                'name' => 'Guinea',
            ),
            72 =>
            array (
                'id' => 73,
                'name' => 'Guinea-Bissau',
            ),
            73 =>
            array (
                'id' => 74,
                'name' => 'Guyana',
            ),
            74 =>
            array (
                'id' => 75,
                'name' => 'Haiti',
            ),
            75 =>
            array (
                'id' => 76,
                'name' => 'Honduras',
            ),
            76 =>
            array (
                'id' => 77,
                'name' => 'Hong Kong',
            ),
            77 =>
            array (
                'id' => 78,
                'name' => 'Hungary',
            ),
            78 =>
            array (
                'id' => 79,
                'name' => 'Iceland',
            ),
            79 =>
            array (
                'id' => 80,
                'name' => 'Independent Olympic Athletes',
            ),
            80 =>
            array (
                'id' => 81,
                'name' => 'India',
            ),
            81 =>
            array (
                'id' => 82,
                'name' => 'Indonesia',
            ),
            82 =>
            array (
                'id' => 83,
                'name' => 'Iran',
            ),
            83 =>
            array (
                'id' => 84,
                'name' => 'Iraq',
            ),
            84 =>
            array (
                'id' => 85,
                'name' => 'Ireland',
            ),
            85 =>
            array (
                'id' => 86,
                'name' => 'Italy',
            ),
            86 =>
            array (
                'id' => 87,
                'name' => 'Ivory Coast',
            ),
            87 =>
            array (
                'id' => 88,
                'name' => 'Jamaica',
            ),
            88 =>
            array (
                'id' => 89,
                'name' => 'Japan',
            ),
            89 =>
            array (
                'id' => 90,
                'name' => 'Jordan',
            ),
            90 =>
            array (
                'id' => 91,
                'name' => 'Kazakhstan',
            ),
            91 =>
            array (
                'id' => 92,
                'name' => 'Kenya',
            ),
            92 =>
            array (
                'id' => 93,
                'name' => 'Kiribati',
            ),
            93 =>
            array (
                'id' => 94,
                'name' => 'Kosovo',
            ),
            94 =>
            array (
                'id' => 95,
                'name' => 'Kuwait',
            ),
            95 =>
            array (
                'id' => 96,
                'name' => 'Kyrgyzstan',
            ),
            96 =>
            array (
                'id' => 97,
                'name' => 'Laos',
            ),
            97 =>
            array (
                'id' => 98,
                'name' => 'Latvia',
            ),
            98 =>
            array (
                'id' => 99,
                'name' => 'Lebanon',
            ),
            99 =>
            array (
                'id' => 100,
                'name' => 'Lesotho',
            ),
            100 =>
            array (
                'id' => 101,
                'name' => 'Liberia',
            ),
            101 =>
            array (
                'id' => 102,
                'name' => 'Libya',
            ),
            102 =>
            array (
                'id' => 103,
                'name' => 'Liechtenstein',
            ),
            103 =>
            array (
                'id' => 104,
                'name' => 'Lithuania',
            ),
            104 =>
            array (
                'id' => 105,
                'name' => 'Luxembourg',
            ),
            105 =>
            array (
                'id' => 106,
                'name' => 'Madagascar',
            ),
            106 =>
            array (
                'id' => 107,
                'name' => 'Malawi',
            ),
            107 =>
            array (
                'id' => 108,
                'name' => 'Malaysia',
            ),
            108 =>
            array (
                'id' => 109,
                'name' => 'Maldives',
            ),
            109 =>
            array (
                'id' => 110,
                'name' => 'Mali',
            ),
            110 =>
            array (
                'id' => 111,
                'name' => 'Malta',
            ),
            111 =>
            array (
                'id' => 112,
                'name' => 'Marshall Islands',
            ),
            112 =>
            array (
                'id' => 113,
                'name' => 'Mauritania',
            ),
            113 =>
            array (
                'id' => 114,
                'name' => 'Mauritius',
            ),
            114 =>
            array (
                'id' => 115,
                'name' => 'Mexico',
            ),
            115 =>
            array (
                'id' => 116,
                'name' => 'Mixed team',
            ),
            116 =>
            array (
                'id' => 117,
                'name' => 'Moldova',
            ),
            117 =>
            array (
                'id' => 118,
                'name' => 'Monaco',
            ),
            118 =>
            array (
                'id' => 119,
                'name' => 'Mongolia',
            ),
            119 =>
            array (
                'id' => 120,
                'name' => 'Montenegro',
            ),
            120 =>
            array (
                'id' => 121,
                'name' => 'Morocco',
            ),
            121 =>
            array (
                'id' => 122,
                'name' => 'Mozambique',
            ),
            122 =>
            array (
                'id' => 123,
                'name' => 'Myanmar',
            ),
            123 =>
            array (
                'id' => 124,
                'name' => 'Namibia',
            ),
            124 =>
            array (
                'id' => 125,
                'name' => 'Nauru',
            ),
            125 =>
            array (
                'id' => 126,
                'name' => 'Nepal',
            ),
            126 =>
            array (
                'id' => 127,
                'name' => 'Netherlands',
            ),
            127 =>
            array (
                'id' => 128,
                'name' => 'Netherlands Antilles',
            ),
            128 =>
            array (
                'id' => 129,
                'name' => 'New Zealand',
            ),
            129 =>
            array (
                'id' => 130,
                'name' => 'Nicaragua',
            ),
            130 =>
            array (
                'id' => 131,
                'name' => 'Niger',
            ),
            131 =>
            array (
                'id' => 132,
                'name' => 'Nigeria',
            ),
            132 =>
            array (
                'id' => 133,
                'name' => 'North Korea',
            ),
            133 =>
            array (
                'id' => 134,
                'name' => 'North Macedonia',
            ),
            134 =>
            array (
                'id' => 135,
                'name' => 'Norway',
            ),
            135 =>
            array (
                'id' => 136,
                'name' => 'Oman',
            ),
            136 =>
            array (
                'id' => 137,
                'name' => 'Pakistan',
            ),
            137 =>
            array (
                'id' => 138,
                'name' => 'Palau',
            ),
            138 =>
            array (
                'id' => 139,
                'name' => 'Palestinian National Authority',
            ),
            139 =>
            array (
                'id' => 140,
                'name' => 'Panama',
            ),
            140 =>
            array (
                'id' => 141,
                'name' => 'Papua New Guinea',
            ),
            141 =>
            array (
                'id' => 142,
                'name' => 'Paraguay',
            ),
            142 =>
            array (
                'id' => 143,
                'name' => 'Peru',
            ),
            143 =>
            array (
                'id' => 144,
                'name' => 'Philippines',
            ),
            144 =>
            array (
                'id' => 145,
                'name' => 'Poland',
            ),
            145 =>
            array (
                'id' => 146,
                'name' => 'Portugal',
            ),
            146 =>
            array (
                'id' => 147,
                'name' => 'Puerto Rico',
            ),
            147 =>
            array (
                'id' => 148,
                'name' => 'Qatar',
            ),
            148 =>
            array (
                'id' => 149,
                'name' => 'Republic of the Congo',
            ),
            149 =>
            array (
                'id' => 150,
                'name' => 'ROC',
            ),
            150 =>
            array (
                'id' => 151,
                'name' => 'Romania',
            ),
            151 =>
            array (
                'id' => 152,
                'name' => 'Russia',
            ),
            152 =>
            array (
                'id' => 153,
                'name' => 'Russian Federation',
            ),
            153 =>
            array (
                'id' => 154,
                'name' => 'Rwanda',
            ),
            154 =>
            array (
                'id' => 155,
                'name' => 'Saint Kitts and Nevis',
            ),
            155 =>
            array (
                'id' => 156,
                'name' => 'Saint Lucia',
            ),
            156 =>
            array (
                'id' => 157,
                'name' => 'Saint Vincent and the Grenadines',
            ),
            157 =>
            array (
                'id' => 158,
                'name' => 'Samoa',
            ),
            158 =>
            array (
                'id' => 159,
                'name' => 'San Marino',
            ),
            159 =>
            array (
                'id' => 160,
                'name' => 'São Tomé and Príncipe',
            ),
            160 =>
            array (
                'id' => 161,
                'name' => 'Saudi Arabia',
            ),
            161 =>
            array (
                'id' => 162,
                'name' => 'Senegal',
            ),
            162 =>
            array (
                'id' => 163,
                'name' => 'Serbia',
            ),
            163 =>
            array (
                'id' => 164,
                'name' => 'Serbia and Montenegro',
            ),
            164 =>
            array (
                'id' => 165,
                'name' => 'Seychelles',
            ),
            165 =>
            array (
                'id' => 166,
                'name' => 'Sierra Leone',
            ),
            166 =>
            array (
                'id' => 167,
                'name' => 'Singapore',
            ),
            167 =>
            array (
                'id' => 168,
                'name' => 'Slovakia',
            ),
            168 =>
            array (
                'id' => 169,
                'name' => 'Slovenia',
            ),
            169 =>
            array (
                'id' => 170,
                'name' => 'Solomon Islands',
            ),
            170 =>
            array (
                'id' => 171,
                'name' => 'Somalia',
            ),
            171 =>
            array (
                'id' => 172,
                'name' => 'South Africa',
            ),
            172 =>
            array (
                'id' => 173,
                'name' => 'South Korea',
            ),
            173 =>
            array (
                'id' => 174,
                'name' => 'South Sudan',
            ),
            174 =>
            array (
                'id' => 175,
                'name' => 'Spain',
            ),
            175 =>
            array (
                'id' => 176,
                'name' => 'Sri Lanka',
            ),
            176 =>
            array (
                'id' => 177,
                'name' => 'Sudan',
            ),
            177 =>
            array (
                'id' => 178,
                'name' => 'Suriname',
            ),
            178 =>
            array (
                'id' => 179,
                'name' => 'Sweden',
            ),
            179 =>
            array (
                'id' => 180,
                'name' => 'Switzerland',
            ),
            180 =>
            array (
                'id' => 181,
                'name' => 'Syria',
            ),
            181 =>
            array (
                'id' => 182,
                'name' => 'Tajikistan',
            ),
            182 =>
            array (
                'id' => 183,
                'name' => 'Tanzania',
            ),
            183 =>
            array (
                'id' => 184,
                'name' => 'Thailand',
            ),
            184 =>
            array (
                'id' => 185,
                'name' => 'The Bahamas',
            ),
            185 =>
            array (
                'id' => 186,
                'name' => 'The Gambia',
            ),
            186 =>
            array (
                'id' => 187,
                'name' => 'Togo',
            ),
            187 =>
            array (
                'id' => 188,
                'name' => 'Tonga',
            ),
            188 =>
            array (
                'id' => 189,
                'name' => 'Trinidad and Tobago',
            ),
            189 =>
            array (
                'id' => 190,
                'name' => 'Tunisia',
            ),
            190 =>
            array (
                'id' => 191,
                'name' => 'Turkey',
            ),
            191 =>
            array (
                'id' => 192,
                'name' => 'Turkmenistan',
            ),
            192 =>
            array (
                'id' => 193,
                'name' => 'Tuvalu',
            ),
            193 =>
            array (
                'id' => 194,
                'name' => 'Uganda',
            ),
            194 =>
            array (
                'id' => 195,
                'name' => 'Ukraine',
            ),
            195 =>
            array (
                'id' => 196,
                'name' => 'Unified Team',
            ),
            196 =>
            array (
                'id' => 197,
                'name' => 'United Arab Emirates',
            ),
            197 =>
            array (
                'id' => 198,
                'name' => 'United Kingdom',
            ),
            198 =>
            array (
                'id' => 199,
                'name' => 'United States',
            ),
            199 =>
            array (
                'id' => 200,
                'name' => 'United States of America',
            ),
            200 =>
            array (
                'id' => 201,
                'name' => 'Uruguay',
            ),
            201 =>
            array (
                'id' => 202,
                'name' => 'USSR',
            ),
            202 =>
            array (
                'id' => 203,
                'name' => 'Uzbekistan',
            ),
            203 =>
            array (
                'id' => 204,
                'name' => 'Vanuatu',
            ),
            204 =>
            array (
                'id' => 205,
                'name' => 'Vatican City',
            ),
            205 =>
            array (
                'id' => 206,
                'name' => 'Venezuela',
            ),
            206 =>
            array (
                'id' => 207,
                'name' => 'Vietnam',
            ),
            207 =>
            array (
                'id' => 208,
                'name' => 'Virgin Islands',
            ),
            208 =>
            array (
                'id' => 209,
                'name' => 'Yemen',
            ),
            209 =>
            array (
                'id' => 210,
                'name' => 'Yugoslavia',
            ),
            210 =>
            array (
                'id' => 211,
                'name' => 'Zambia',
            ),
            211 =>
            array (
                'id' => 212,
                'name' => 'Zimbabwe',
            ),
        ));


    }
}
