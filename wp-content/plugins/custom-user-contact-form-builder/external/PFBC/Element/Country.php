<?php

class CM_Element_Country extends CM_Element_Select
{

    public function __construct($label, $name, array $properties = null)
    {
        $options = array(
            null => "--Select Country--",
            "United States[US]" => "United States",
            "Afghanistan[AF]" => "Afghanistan",
            "Aland Islands[AX]" => "Aland Islands",
            "Albania[AL]" => "Albania",
            "Algeria[DZ]" => "Algeria",
            "American Samoa[AS]" => "American Samoa",
            "Andorra[AD]" => "Andorra",
            "Angola[AO]" => "Angola",
            "Anguilla[AI]" => "Anguilla",
            "Antarctica[AQ]" => "Antarctica",
            "Antigua and Barbuda[AG]" => "Antigua and Barbuda",
            "Argentina[AR]" => "Argentina",
            "Armenia[AM]" => "Armenia",
            "Aruba[AW]" => "Aruba",
            "Australia[AU]" => "Australia",
            "Austria[AT]" => "Austria",
            "Azerbaijan[AZ]" => "Azerbaijan",
            "Bahamas, The[BS]" => "Bahamas, The",
            "Bahrain[BH]" => "Bahrain",
            "Bangladesh[BD]" => "Bangladesh",
            "Barbados[BB]" => "Barbados",
            "Belarus[BY]" => "Belarus",
            "Belgium[BE]" => "Belgium",
            "Belize[BZ]" => "Belize",
            "Benin[BJ]" => "Benin",
            "Bermuda[BM]" => "Bermuda",
            "Bhutan[BT]" => "Bhutan",
            "Bolivia[BO]" => "Bolivia",
            "Bosnia and Herzegovina[BA]" => "Bosnia and Herzegovina",
            "Botswana[BW]" => "Botswana",
            "Bouvet Island[BV]" => "Bouvet Island",
            "Brazil[BR]" => "Brazil",
            "British Indian Ocean Territory[IO]" => "British Indian Ocean Territory",
            "Brunei Darussalam[BN]" => "Brunei Darussalam",
            "Bulgaria[BG]" => "Bulgaria",
            "Burkina Faso[BF]" => "Burkina Faso",
            "Burundi[BI]" => "Burundi",
            "Cambodia[KH]" => "Cambodia",
            "Cameroon[CM]" => "Cameroon",
            "Canada[CA]" => "Canada",
            "Cape Verde[CV]" => "Cape Verde",
            "Cayman Islands[KY]" => "Cayman Islands",
            "Central African Republic[CF]" => "Central African Republic",
            "Chad[TD]" => "Chad",
            "Chile[CL]" => "Chile",
            "China[CN]" => "China",
            "Christmas Island[CX]" => "Christmas Island",
            "Cocos (Keeling) Islands[CC]" => "Cocos (Keeling) Islands",
            "Colombia[CO]" => "Colombia",
            "Comoros[KM]" => "Comoros",
            "Congo[CG]" => "Congo",
            "Congo, The Democratic Republic Of The[CD]" => "Congo, The Democratic Republic Of The",
            "Cook Islands[CK]" => "Cook Islands",
            "Costa Rica[CR]" => "Costa Rica",
            "Cote D'ivoire[CI]" => "Cote D'ivoire",
            "Croatia[HR]" => "Croatia",
            "Cyprus[CY]" => "Cyprus",
            "Czech Republic[CZ]" => "Czech Republic",
            "Denmark[DK]" => "Denmark",
            "Djibouti[DJ]" => "Djibouti",
            "Dominica[DM]" => "Dominica",
            "Dominican Republic[DO]" => "Dominican Republic",
            "Ecuador[EC]" => "Ecuador",
            "Egypt[EG]" => "Egypt",
            "El Salvador[SV]" => "El Salvador",
            "Equatorial Guinea[GQ]" => "Equatorial Guinea",
            "Eritrea[ER]" => "Eritrea",
            "Estonia[EE]" => "Estonia",
            "Ethiopia[ET]" => "Ethiopia",
            "Falkland Islands (Malvinas)[FK]" => "Falkland Islands (Malvinas)",
            "Faroe Islands[FO]" => "Faroe Islands",
            "Fiji[FJ]" => "Fiji",
            "Finland[FI]" => "Finland",
            "France[FR]" => "France",
            "French Guiana[GF]" => "French Guiana",
            "French Polynesia[PF]" => "French Polynesia",
            "French Southern Territories[TF]" => "French Southern Territories",
            "Gabon[GA]" => "Gabon",
            "Gambia, The[GM]" => "Gambia, The",
            "Georgia[GE]" => "Georgia",
            "Germany[DE]" => "Germany",
            "Ghana[GH]" => "Ghana",
            "Gibraltar[GI]" => "Gibraltar",
            "Greece[GR]" => "Greece",
            "Greenland[GL]" => "Greenland",
            "Grenada[GD]" => "Grenada",
            "Guadeloupe[GP]" => "Guadeloupe",
            "Guam[GU]" => "Guam",
            "Guatemala[GT]" => "Guatemala",
            "Guernsey[GG]" => "Guernsey",
            "Guinea[GN]" => "Guinea",
            "Guinea-Bissau[GW]" => "Guinea-Bissau",
            "Guyana[GY]" => "Guyana",
            "Haiti[HT]" => "Haiti",
            "Heard Island and the McDonald Islands[HM]" => "Heard Island and the McDonald Islands",
            "Holy See[VA]" => "Holy See",
            "Honduras[HN]" => "Honduras",
            "Hong Kong[HK]" => "Hong Kong",
            "Hungary[HU]" => "Hungary",
            "Iceland[IS]" => "Iceland",
            "India[IN]" => "India",
            "Indonesia[ID]" => "Indonesia",
            "Iraq[IQ]" => "Iraq",
            "Ireland[IE]" => "Ireland",
            "Isle Of Man[IM]" => "Isle Of Man",
            "Israel[IL]" => "Israel",
            "Italy[IT]" => "Italy",
            "Jamaica[JM]" => "Jamaica",
            "Japan[JP]" => "Japan",
            "Jersey[JE]" => "Jersey",
            "Jordan[JO]" => "Jordan",
            "Kazakhstan[KZ]" => "Kazakhstan",
            "Kenya[KE]" => "Kenya",
            "Kiribati[KI]" => "Kiribati",
            "Korea, Republic Of[KR]" => "Korea, Republic Of",
            "Kuwait[KW]" => "Kuwait",
            "Kyrgyzstan[KG]" => "Kyrgyzstan",
            "Lao People's Democratic Republic[LA]" => "Lao People's Democratic Republic",
            "Latvia[LV]" => "Latvia",
            "Lebanon[LB]" => "Lebanon",
            "Lesotho[LS]" => "Lesotho",
            "Liberia[LR]" => "Liberia",
            "Libya[LY]" => "Libya",
            "Liechtenstein[LI]" => "Liechtenstein",
            "Lithuania[LT]" => "Lithuania",
            "Luxembourg[LU]" => "Luxembourg",
            "Macao[MO]" => "Macao",
            "Macedonia, The Former Yugoslav Republic Of[MK]" => "Macedonia, The Former Yugoslav Republic Of",
            "Madagascar[MG]" => "Madagascar",
            "Malawi[MW]" => "Malawi",
            "Malaysia[MY]" => "Malaysia",
            "Maldives[MV]" => "Maldives",
            "Mali[ML]" => "Mali",
            "Malta[MT]" => "Malta",
            "Marshall Islands[MH]" => "Marshall Islands",
            "Martinique[MQ]" => "Martinique",
            "Mauritania[MR]" => "Mauritania",
            "Mauritius[MU]" => "Mauritius",
            "Mayotte[YT]" => "Mayotte",
            "Mexico[MX]" => "Mexico",
            "Micronesia, Federated States Of[FM]" => "Micronesia, Federated States Of",
            "Moldova, Republic Of[MD]" => "Moldova, Republic Of",
            "Monaco[MC]" => "Monaco",
            "Mongolia[MN]" => "Mongolia",
            "Montenegro[ME]" => "Montenegro",
            "Montserrat[MS]" => "Montserrat",
            "Morocco[MA]" => "Morocco",
            "Mozambique[MZ]" => "Mozambique",
            "Myanmar[MM]" => "Myanmar",
            "Namibia[NA]" => "Namibia",
            "Nauru[NR]" => "Nauru",
            "Nepal[NP]" => "Nepal",
            "Netherlands[NL]" => "Netherlands",
            "Netherlands Antilles[AN]" => "Netherlands Antilles",
            "New Caledonia[NC]" => "New Caledonia",
            "New Zealand[NZ]" => "New Zealand",
            "Nicaragua[NI]" => "Nicaragua",
            "Niger[NE]" => "Niger",
            "Nigeria[NG]" => "Nigeria",
            "Niue[NU]" => "Niue",
            "Norfolk Island[NF]" => "Norfolk Island",
            "Northern Mariana Islands[MP]" => "Northern Mariana Islands",
            "Norway[NO]" => "Norway",
            "Oman[OM]" => "Oman",
            "Pakistan[PK]" => "Pakistan",
            "Palau[PW]" => "Palau",
            "Palestinian Territories[PS]" => "Palestinian Territories",
            "Panama[PA]" => "Panama",
            "Papua New Guinea[PG]" => "Papua New Guinea",
            "Paraguay[PY]" => "Paraguay",
            "Peru[PE]" => "Peru",
            "Philippines[PH]" => "Philippines",
            "Pitcairn[PN]" => "Pitcairn",
            "Poland[PL]" => "Poland",
            "Portugal[PT]" => "Portugal",
            "Puerto Rico[PR]" => "Puerto Rico",
            "Qatar[QA]" => "Qatar",
            "Reunion[RE]" => "Reunion",
            "Romania[RO]" => "Romania",
            "Russian Federation[RU]" => "Russian Federation",
            "Rwanda[RW]" => "Rwanda",
            "Saint Barthelemy[BL]" => "Saint Barthelemy",
            "Saint Helena[SH]" => "Saint Helena",
            "Saint Kitts and Nevis[KN]" => "Saint Kitts and Nevis",
            "Saint Lucia[LC]" => "Saint Lucia",
            "Saint Martin[MF]" => "Saint Martin",
            "Saint Pierre and Miquelon[PM]" => "Saint Pierre and Miquelon",
            "Saint Vincent and The Grenadines[VC]" => "Saint Vincent and The Grenadines",
            "Samoa[WS]" => "Samoa",
            "San Marino[SM]" => "San Marino",
            "Sao Tome and Principe[ST]" => "Sao Tome and Principe",
            "Saudi Arabia[SA]" => "Saudi Arabia",
            "Senegal[SN]" => "Senegal",
            "Serbia[RS]" => "Serbia",
            "Seychelles[SC]" => "Seychelles",
            "Sierra Leone[SL]" => "Sierra Leone",
            "Singapore[SG]" => "Singapore",
            "Slovakia[SK]" => "Slovakia",
            "Slovenia[SI]" => "Slovenia",
            "Solomon Islands[SB]" => "Solomon Islands",
            "Somalia[SO]" => "Somalia",
            "South Africa[ZA]" => "South Africa",
            "South Georgia and the South Sandwich Islands[GS]" => "South Georgia and the South Sandwich Islands",
            "Spain[ES]" => "Spain",
            "Sri Lanka[LK]" => "Sri Lanka",
            "Suriname[SR]" => "Suriname",
            "Svalbard and Jan Mayen[SJ]" => "Svalbard and Jan Mayen",
            "Swaziland[SZ]" => "Swaziland",
            "Sweden[SE]" => "Sweden",
            "Switzerland[CH]" => "Switzerland",
            "Taiwan[TW]" => "Taiwan",
            "Tajikistan[TJ]" => "Tajikistan",
            "Tanzania, United Republic Of[TZ]" => "Tanzania, United Republic Of",
            "Thailand[TH]" => "Thailand",
            "Timor-leste[TL]" => "Timor-leste",
            "Togo[TG]" => "Togo",
            "Tokelau[TK]" => "Tokelau",
            "Tonga[TO]" => "Tonga",
            "Trinidad and Tobago[TT]" => "Trinidad and Tobago",
            "Tunisia[TN]" => "Tunisia",
            "Turkey[TR]" => "Turkey",
            "Turkmenistan[TM]" => "Turkmenistan",
            "Turks and Caicos Islands[TC]" => "Turks and Caicos Islands",
            "Tuvalu[TV]" => "Tuvalu",
            "Uganda[UG]" => "Uganda",
            "Ukraine[UA]" => "Ukraine",
            "United Arab Emirates[AE]" => "United Arab Emirates",
            "United Kingdom[GB]" => "United Kingdom",
            "United States Minor Outlying Islands[UM]" => "United States Minor Outlying Islands",
            "Uruguay[UY]" => "Uruguay",
            "Uzbekistan[UZ]" => "Uzbekistan",
            "Vanuatu[VU]" => "Vanuatu",
            "Venezuela[VE]" => "Venezuela",
            "Vietnam[VN]" => "Vietnam",
            "Virgin Islands, British[VG]" => "Virgin Islands, British",
            "Virgin Islands, U.S.[VI]" => "Virgin Islands, U.S.",
            "Wallis and Futuna[WF]" => "Wallis and Futuna",
            "Western Sahara[EH]" => "Western Sahara",
            "Yemen[YE]" => "Yemen",
            "Zambia[ZM]" => "Zambia",
            "Zimbabwe[ZW]" => "Zimbabwe"
        );
        parent::__construct($label, $name, $options, $properties);
    }

}
