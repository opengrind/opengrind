<?php

namespace App\Http\ViewHelpers\Profile\Settings;

use App\Models\User;

class ProfileSettingsViewHelper
{
    public static function index(User $user): array
    {
        $timezones = [
            [
                'id' => 'GMT',
                'name' => trans('GMT timezone'),
            ],
            [
                'id' => 'UTC',
                'name' => trans('UTC timezone'),
            ],
            [
                'id' => 'America/Adak',
                'name' => trans('(GMT/UTC - 10:00) Adak'),
            ],
            [
                'id' => 'America/Anchorage',
                'name' => trans('(GMT/UTC - 09:00) Anchorage'),
            ],
            [
                'id' => 'America/Anguilla',
                'name' => trans('(GMT/UTC - 04:00) Anguilla'),
            ],
            [
                'id' => 'America/Antigua',
                'name' => trans('(GMT/UTC - 04:00) Antigua'),
            ],
            [
                'id' => 'America/Araguaina',
                'name' => trans('(GMT/UTC - 03:00) Araguaina'),
            ],
            [
                'id' => 'America/Argentina/Buenos_Aires',
                'name' => trans('(GMT/UTC - 03:00) Argentina/Buenos Aires'),
            ],
            [
                'id' => 'America/Argentina/Catamarca',
                'name' => trans('(GMT/UTC - 03:00) Argentina/Catamarca'),
            ],
            [
                'id' => 'America/Argentina/Cordoba',
                'name' => trans('(GMT/UTC - 03:00) Argentina/Cordoba'),
            ],
            [
                'id' => 'America/Argentina/Jujuy',
                'name' => trans('(GMT/UTC - 03:00) Argentina/Jujuy'),
            ],
            [
                'id' => 'America/Argentina/La_Rioja',
                'name' => trans('(GMT/UTC - 03:00) Argentina/La Rioja'),
            ],
            [
                'id' => 'America/Argentina/Mendoza',
                'name' => trans('(GMT/UTC - 03:00) Argentina/Mendoza'),
            ],
            [
                'id' => 'America/Argentina/Rio_Gallegos',
                'name' => trans('(GMT/UTC - 03:00) Argentina/Rio Gallegos'),
            ],
            [
                'id' => 'America/Argentina/Salta',
                'name' => trans('(GMT/UTC - 03:00) Argentina/Salta'),
            ],
            [
                'id' => 'America/Argentina/San_Juan',
                'name' => trans('(GMT/UTC - 03:00) Argentina/San Juan'),
            ],
            [
                'id' => 'America/Argentina/San_Luis',
                'name' => trans('(GMT/UTC - 03:00) Argentina/San Luis'),
            ],
            [
                'id' => 'America/Argentina/Tucuman',
                'name' => trans('(GMT/UTC - 03:00) Argentina/Tucuman'),
            ],
            [
                'id' => 'America/Argentina/Ushuaia',
                'name' => trans('(GMT/UTC - 03:00) Argentina/Ushuaia'),
            ],
            [
                'id' => 'America/Aruba',
                'name' => trans('(GMT/UTC - 04:00) Aruba'),
            ],
            [
                'id' => 'America/Asuncion',
                'name' => trans('(GMT/UTC - 03:00) Asuncion'),
            ],
            [
                'id' => 'America/Atikokan',
                'name' => trans('(GMT/UTC - 05:00) Atikokan'),
            ],
            [
                'id' => 'America/Bahia',
                'name' => trans('(GMT/UTC - 03:00) Bahia'),
            ],
            [
                'id' => 'America/Bahia_Banderas',
                'name' => trans('(GMT/UTC - 06:00) Bahia Banderas'),
            ],
            [
                'id' => 'America/Barbados',
                'name' => trans('(GMT/UTC - 04:00) Barbados'),
            ],
            [
                'id' => 'America/Belem',
                'name' => trans('(GMT/UTC - 03:00) Belem'),
            ],
            [
                'id' => 'America/Belize',
                'name' => trans('(GMT/UTC - 06:00) Belize'),
            ],
            [
                'id' => 'America/Blanc-Sablon',
                'name' => trans('(GMT/UTC - 04:00) Blanc-Sablon'),
            ],
            [
                'id' => 'America/Boa_Vista',
                'name' => trans('(GMT/UTC - 04:00) Boa Vista'),
            ],
            [
                'id' => 'America/Bogota',
                'name' => trans('(GMT/UTC - 05:00) Bogota'),
            ],
            [
                'id' => 'America/Boise',
                'name' => trans('(GMT/UTC - 07:00) Boise'),
            ],
            [
                'id' => 'America/Cambridge_Bay',
                'name' => trans('(GMT/UTC - 07:00) Cambridge Bay'),
            ],
            [
                'id' => 'America/Campo_Grande',
                'name' => trans('(GMT/UTC - 03:00) Campo Grande'),
            ],
            [
                'id' => 'America/Cancun',
                'name' => trans('(GMT/UTC - 05:00) Cancun'),
            ],
            [
                'id' => 'America/Caracas',
                'name' => trans('(GMT/UTC - 04:30) Caracas'),
            ],
            [
                'id' => 'America/Cayenne',
                'name' => trans('(GMT/UTC - 03:00) Cayenne'),
            ],
            [
                'id' => 'America/Cayman',
                'name' => trans('(GMT/UTC - 05:00) Cayman'),
            ],
            [
                'id' => 'America/Chicago',
                'name' => trans('(GMT/UTC - 06:00) Chicago'),
            ],
            [
                'id' => 'America/Chihuahua',
                'name' => trans('(GMT/UTC - 07:00) Chihuahua'),
            ],
            [
                'id' => 'America/Costa_Rica',
                'name' => trans('(GMT/UTC - 06:00) Costa Rica'),
            ],
            [
                'id' => 'America/Creston',
                'name' => trans('(GMT/UTC - 07:00) Creston'),
            ],
            [
                'id' => 'America/Cuiaba',
                'name' => trans('(GMT/UTC - 03:00) Cuiaba'),
            ],
            [
                'id' => 'America/Curacao',
                'name' => trans('(GMT/UTC - 04:00) Curacao'),
            ],
            [
                'id' => 'America/Danmarkshavn',
                'name' => trans('(GMT/UTC + 00:00) Danmarkshavn'),
            ],
            [
                'id' => 'America/Dawson',
                'name' => trans('(GMT/UTC - 08:00) Dawson'),
            ],
            [
                'id' => 'America/Dawson_Creek',
                'name' => trans('(GMT/UTC - 07:00) Dawson Creek'),
            ],
            [
                'id' => 'America/Denver',
                'name' => trans('(GMT/UTC - 07:00) Denver'),
            ],
            [
                'id' => 'America/Detroit',
                'name' => trans('(GMT/UTC - 05:00) Detroit'),
            ],
            [
                'id' => 'America/Dominica',
                'name' => trans('(GMT/UTC - 04:00) Dominica'),
            ],
            [
                'id' => 'America/Edmonton',
                'name' => trans('(GMT/UTC - 07:00) Edmonton'),
            ],
            [
                'id' => 'America/Eirunepe',
                'name' => trans('(GMT/UTC - 05:00) Eirunepe'),
            ],
            [
                'id' => 'America/El_Salvador',
                'name' => trans('(GMT/UTC - 06:00) El Salvador'),
            ],
            [
                'id' => 'America/Fort_Nelson',
                'name' => trans('(GMT/UTC - 07:00) Fort Nelson'),
            ],
            [
                'id' => 'America/Fortaleza',
                'name' => trans('(GMT/UTC - 03:00) Fortaleza'),
            ],
            [
                'id' => 'America/Glace_Bay',
                'name' => trans('(GMT/UTC - 04:00) Glace Bay'),
            ],
            [
                'id' => 'America/Godthab',
                'name' => trans('(GMT/UTC - 03:00) Godthab'),
            ],
            [
                'id' => 'America/Goose_Bay',
                'name' => trans('(GMT/UTC - 04:00) Goose Bay'),
            ],
            [
                'id' => 'America/Grand_Turk',
                'name' => trans('(GMT/UTC - 04:00) Grand Turk'),
            ],
            [
                'id' => 'America/Grenada',
                'name' => trans('(GMT/UTC - 04:00) Grenada'),
            ],
            [
                'id' => 'America/Guadeloupe',
                'name' => trans('(GMT/UTC - 04:00) Guadeloupe'),
            ],
            [
                'id' => 'America/Guatemala',
                'name' => trans('(GMT/UTC - 06:00) Guatemala'),
            ],
            [
                'id' => 'America/Guayaquil',
                'name' => trans('(GMT/UTC - 05:00) Guayaquil'),
            ],
            [
                'id' => 'America/Guyana',
                'name' => trans('(GMT/UTC - 04:00) Guyana'),
            ],
            [
                'id' => 'America/Halifax',
                'name' => trans('(GMT/UTC - 04:00) Halifax'),
            ],
            [
                'id' => 'America/Havana',
                'name' => trans('(GMT/UTC - 05:00) Havana'),
            ],
            [
                'id' => 'America/Hermosillo',
                'name' => trans('(GMT/UTC - 07:00) Hermosillo'),
            ],
            [
                'id' => 'America/Indiana/Indianapolis',
                'name' => trans('(GMT/UTC - 05:00) Indiana/Indianapolis'),
            ],
            [
                'id' => 'America/Indiana/Knox',
                'name' => trans('(GMT/UTC - 06:00) Indiana/Knox'),
            ],
            [
                'id' => 'America/Indiana/Marengo',
                'name' => trans('(GMT/UTC - 05:00) Indiana/Marengo'),
            ],
            [
                'id' => 'America/Indiana/Petersburg',
                'name' => trans('(GMT/UTC - 05:00) Indiana/Petersburg'),
            ],
            [
                'id' => 'America/Indiana/Tell_City',
                'name' => trans('(GMT/UTC - 06:00) Indiana/Tell City'),
            ],
            [
                'id' => 'America/Indiana/Vevay',
                'name' => trans('(GMT/UTC - 05:00) Indiana/Vevay'),
            ],
            [
                'id' => 'America/Indiana/Vincennes',
                'name' => trans('(GMT/UTC - 05:00) Indiana/Vincennes'),
            ],
            [
                'id' => 'America/Indiana/Winamac',
                'name' => trans('(GMT/UTC - 05:00) Indiana/Winamac'),
            ],
            [
                'id' => 'America/Inuvik',
                'name' => trans('(GMT/UTC - 07:00) Inuvik'),
            ],
            [
                'id' => 'America/Iqaluit',
                'name' => trans('(GMT/UTC - 05:00) Iqaluit'),
            ],
            [
                'id' => 'America/Jamaica',
                'name' => trans('(GMT/UTC - 05:00) Jamaica'),
            ],
            [
                'id' => 'America/Juneau',
                'name' => trans('(GMT/UTC - 09:00) Juneau'),
            ],
            [
                'id' => 'America/Kentucky/Louisville',
                'name' => trans('(GMT/UTC - 05:00) Kentucky/Louisville'),
            ],
            [
                'id' => 'America/Kentucky/Monticello',
                'name' => trans('(GMT/UTC - 05:00) Kentucky/Monticello'),
            ],
            [
                'id' => 'America/Kralendijk',
                'name' => trans('(GMT/UTC - 04:00) Kralendijk'),
            ],
            [
                'id' => 'America/La_Paz',
                'name' => trans('(GMT/UTC - 04:00) La Paz'),
            ],
            [
                'id' => 'America/Lima',
                'name' => trans('(GMT/UTC - 05:00) Lima'),
            ],
            [
                'id' => 'America/Los_Angeles',
                'name' => trans('(GMT/UTC - 08:00) Los Angeles'),
            ],
            [
                'id' => 'America/Lower_Princes',
                'name' => trans('(GMT/UTC - 04:00) Lower Princes'),
            ],
            [
                'id' => 'America/Maceio',
                'name' => trans('(GMT/UTC - 03:00) Maceio'),
            ],
            [
                'id' => 'America/Managua',
                'name' => trans('(GMT/UTC - 06:00) Managua'),
            ],
            [
                'id' => 'America/Manaus',
                'name' => trans('(GMT/UTC - 04:00) Manaus'),
            ],
            [
                'id' => 'America/Marigot',
                'name' => trans('(GMT/UTC - 04:00) Marigot'),
            ],
            [
                'id' => 'America/Martinique',
                'name' => trans('(GMT/UTC - 04:00) Martinique'),
            ],
            [
                'id' => 'America/Matamoros',
                'name' => trans('(GMT/UTC - 06:00) Matamoros'),
            ],
            [
                'id' => 'America/Mazatlan',
                'name' => trans('(GMT/UTC - 07:00) Mazatlan'),
            ],
            [
                'id' => 'America/Menominee',
                'name' => trans('(GMT/UTC - 06:00) Menominee'),
            ],
            [
                'id' => 'America/Merida',
                'name' => trans('(GMT/UTC - 06:00) Merida'),
            ],
            [
                'id' => 'America/Metlakatla',
                'name' => trans('(GMT/UTC - 09:00) Metlakatla'),
            ],
            [
                'id' => 'America/Mexico_City',
                'name' => trans('(GMT/UTC - 06:00) Mexico City'),
            ],
            [
                'id' => 'America/Miquelon',
                'name' => trans('(GMT/UTC - 03:00) Miquelon'),
            ],
            [
                'id' => 'America/Moncton',
                'name' => trans('(GMT/UTC - 04:00) Moncton'),
            ],
            [
                'id' => 'America/Monterrey',
                'name' => trans('(GMT/UTC - 06:00) Monterrey'),
            ],
            [
                'id' => 'America/Montevideo',
                'name' => trans('(GMT/UTC - 03:00) Montevideo'),
            ],
            [
                'id' => 'America/Montserrat',
                'name' => trans('(GMT/UTC - 04:00) Montserrat'),
            ],
            [
                'id' => 'America/Nassau',
                'name' => trans('(GMT/UTC - 05:00) Nassau'),
            ],
            [
                'id' => 'America/New_York',
                'name' => trans('(GMT/UTC - 05:00) New York'),
            ],
            [
                'id' => 'America/Nipigon',
                'name' => trans('(GMT/UTC - 05:00) Nipigon'),
            ],
            [
                'id' => 'America/Nome',
                'name' => trans('(GMT/UTC - 09:00) Nome'),
            ],
            [
                'id' => 'America/Noronha',
                'name' => trans('(GMT/UTC - 02:00) Noronha'),
            ],
            [
                'id' => 'America/North_Dakota/Beulah',
                'name' => trans('(GMT/UTC - 06:00) North Dakota/Beulah'),
            ],
            [
                'id' => 'America/North_Dakota/Center',
                'name' => trans('(GMT/UTC - 06:00) North Dakota/Center'),
            ],
            [
                'id' => 'America/North_Dakota/New_Salem',
                'name' => trans('(GMT/UTC - 06:00) North Dakota/New Salem'),
            ],
            [
                'id' => 'America/Ojinaga',
                'name' => trans('(GMT/UTC - 07:00) Ojinaga'),
            ],
            [
                'id' => 'America/Panama',
                'name' => trans('(GMT/UTC - 05:00) Panama'),
            ],
            [
                'id' => 'America/Pangnirtung',
                'name' => trans('(GMT/UTC - 05:00) Pangnirtung'),
            ],
            [
                'id' => 'America/Paramaribo',
                'name' => trans('(GMT/UTC - 03:00) Paramaribo'),
            ],
            [
                'id' => 'America/Phoenix',
                'name' => trans('(GMT/UTC - 07:00) Phoenix'),
            ],
            [
                'id' => 'America/Port-au-Prince',
                'name' => trans('(GMT/UTC - 05:00) Port-au-Prince'),
            ],
            [
                'id' => 'America/Port_of_Spain',
                'name' => trans('(GMT/UTC - 04:00) Port of Spain'),
            ],
            [
                'id' => 'America/Porto_Velho',
                'name' => trans('(GMT/UTC - 04:00) Porto Velho'),
            ],
            [
                'id' => 'America/Puerto_Rico',
                'name' => trans('(GMT/UTC - 04:00) Puerto Rico'),
            ],
            [
                'id' => 'America/Rainy_River',
                'name' => trans('(GMT/UTC - 06:00) Rainy River'),
            ],
            [
                'id' => 'America/Rankin_Inlet',
                'name' => trans('(GMT/UTC - 06:00) Rankin Inlet'),
            ],
            [
                'id' => 'America/Recife',
                'name' => trans('(GMT/UTC - 03:00) Recife'),
            ],
            [
                'id' => 'America/Regina',
                'name' => trans('(GMT/UTC - 06:00) Regina'),
            ],
            [
                'id' => 'America/Resolute',
                'name' => trans('(GMT/UTC - 06:00) Resolute'),
            ],
            [
                'id' => 'America/Rio_Branco',
                'name' => trans('(GMT/UTC - 05:00) Rio Branco'),
            ],
            [
                'id' => 'America/Santarem',
                'name' => trans('(GMT/UTC - 03:00) Santarem'),
            ],
            [
                'id' => 'America/Santiago',
                'name' => trans('(GMT/UTC - 03:00) Santiago'),
            ],
            [
                'id' => 'America/Santo_Domingo',
                'name' => trans('(GMT/UTC - 04:00) Santo Domingo'),
            ],
            [
                'id' => 'America/Sao_Paulo',
                'name' => trans('(GMT/UTC - 02:00) Sao Paulo'),
            ],
            [
                'id' => 'America/Scoresbysund',
                'name' => trans('(GMT/UTC - 01:00) Scoresbysund'),
            ],
            [
                'id' => 'America/Sitka',
                'name' => trans('(GMT/UTC - 09:00) Sitka'),
            ],
            [
                'id' => 'America/St_Barthelemy',
                'name' => trans('(GMT/UTC - 04:00) St. Barthelemy'),
            ],
            [
                'id' => 'America/St_Johns',
                'name' => trans('(GMT/UTC - 03:30) St. Johns'),
            ],
            [
                'id' => 'America/St_Kitts',
                'name' => trans('(GMT/UTC - 04:00) St. Kitts'),
            ],
            [
                'id' => 'America/St_Lucia',
                'name' => trans('(GMT/UTC - 04:00) St. Lucia'),
            ],
            [
                'id' => 'America/St_Thomas',
                'name' => trans('(GMT/UTC - 04:00) St. Thomas'),
            ],
            [
                'id' => 'America/St_Vincent',
                'name' => trans('(GMT/UTC - 04:00) St. Vincent'),
            ],
            [
                'id' => 'America/Swift_Current',
                'name' => trans('(GMT/UTC - 06:00) Swift Current'),
            ],
            [
                'id' => 'America/Tegucigalpa',
                'name' => trans('(GMT/UTC - 06:00) Tegucigalpa'),
            ],
            [
                'id' => 'America/Thule',
                'name' => trans('(GMT/UTC - 04:00) Thule'),
            ],
            [
                'id' => 'America/Thunder_Bay',
                'name' => trans('(GMT/UTC - 05:00) Thunder Bay'),
            ],
            [
                'id' => 'America/Tijuana',
                'name' => trans('(GMT/UTC - 08:00) Tijuana'),
            ],
            [
                'id' => 'America/Toronto',
                'name' => trans('(GMT/UTC - 05:00) Toronto'),
            ],
            [
                'id' => 'America/Tortola',
                'name' => trans('(GMT/UTC - 04:00) Tortola'),
            ],
            [
                'id' => 'America/Vancouver',
                'name' => trans('(GMT/UTC - 08:00) Vancouver'),
            ],
            [
                'id' => 'America/Whitehorse',
                'name' => trans('(GMT/UTC - 08:00) Whitehorse'),
            ],
            [
                'id' => 'America/Winnipeg',
                'name' => trans('(GMT/UTC - 06:00) Winnipeg'),
            ],
            [
                'id' => 'America/Yakutat',
                'name' => trans('(GMT/UTC - 09:00) Yakutat'),
            ],
            [
                'id' => 'America/Yellowknife',
                'name' => trans('(GMT/UTC - 07:00) Yellowknife'),
            ],
            [
                'id' => 'Europe/Amsterdam',
                'name' => trans('(GMT/UTC + 01:00) Amsterdam'),
            ],
            [
                'id' => 'Europe/Andorra',
                'name' => trans('(GMT/UTC + 01:00) Andorra'),
            ],
            [
                'id' => 'Europe/Astrakhan',
                'name' => trans('(GMT/UTC + 04:00) Astrakhan'),
            ],
            [
                'id' => 'Europe/Athens',
                'name' => trans('(GMT/UTC + 02:00) Athens'),
            ],
            [
                'id' => 'Europe/Belgrade',
                'name' => trans('(GMT/UTC + 01:00) Belgrade'),
            ],
            [
                'id' => 'Europe/Berlin',
                'name' => trans('(GMT/UTC + 01:00) Berlin'),
            ],
            [
                'id' => 'Europe/Bratislava',
                'name' => trans('(GMT/UTC + 01:00) Bratislava'),
            ],
            [
                'id' => 'Europe/Brussels',
                'name' => trans('(GMT/UTC + 01:00) Brussels'),
            ],
            [
                'id' => 'Europe/Bucharest',
                'name' => trans('(GMT/UTC + 02:00) Bucharest'),
            ],
            [
                'id' => 'Europe/Budapest',
                'name' => trans('(GMT/UTC + 01:00) Budapest'),
            ],
            [
                'id' => 'Europe/Busingen',
                'name' => trans('(GMT/UTC + 01:00) Busingen'),
            ],
            [
                'id' => 'Europe/Chisinau',
                'name' => trans('(GMT/UTC + 02:00) Chisinau'),
            ],
            [
                'id' => 'Europe/Copenhagen',
                'name' => trans('(GMT/UTC + 01:00) Copenhagen'),
            ],
            [
                'id' => 'Europe/Dublin',
                'name' => trans('(GMT/UTC + 00:00) Dublin'),
            ],
            [
                'id' => 'Europe/Gibraltar',
                'name' => trans('(GMT/UTC + 01:00) Gibraltar'),
            ],
            [
                'id' => 'Europe/Guernsey',
                'name' => trans('(GMT/UTC + 00:00) Guernsey'),
            ],
            [
                'id' => 'Europe/Helsinki',
                'name' => trans('(GMT/UTC + 02:00) Helsinki'),
            ],
            [
                'id' => 'Europe/Isle_of_Man',
                'name' => trans('(GMT/UTC + 00:00) Isle of Man'),
            ],
            [
                'id' => 'Europe/Istanbul',
                'name' => trans('(GMT/UTC + 02:00) Istanbul'),
            ],
            [
                'id' => 'Europe/Jersey',
                'name' => trans('(GMT/UTC + 00:00) Jersey'),
            ],
            [
                'id' => 'Europe/Kaliningrad',
                'name' => trans('(GMT/UTC + 02:00) Kaliningrad'),
            ],
            [
                'id' => 'Europe/Kiev',
                'name' => trans('(GMT/UTC + 02:00) Kiev'),
            ],
            [
                'id' => 'Europe/Lisbon',
                'name' => trans('(GMT/UTC + 00:00) Lisbon'),
            ],
            [
                'id' => 'Europe/Ljubljana',
                'name' => trans('(GMT/UTC + 01:00) Ljubljana'),
            ],
            [
                'id' => 'Europe/London',
                'name' => trans('(GMT/UTC + 00:00) London'),
            ],
            [
                'id' => 'Europe/Luxembourg',
                'name' => trans('(GMT/UTC + 01:00) Luxembourg'),
            ],
            [
                'id' => 'Europe/Madrid',
                'name' => trans('(GMT/UTC + 01:00) Madrid'),
            ],
            [
                'id' => 'Europe/Malta',
                'name' => trans('(GMT/UTC + 01:00) Malta'),
            ],
            [
                'id' => 'Europe/Mariehamn',
                'name' => trans('(GMT/UTC + 02:00) Mariehamn'),
            ],
            [
                'id' => 'Europe/Minsk',
                'name' => trans('(GMT/UTC + 03:00) Minsk'),
            ],
            [
                'id' => 'Europe/Monaco',
                'name' => trans('(GMT/UTC + 01:00) Monaco'),
            ],
            [
                'id' => 'Europe/Moscow',
                'name' => trans('(GMT/UTC + 03:00) Moscow'),
            ],
            [
                'id' => 'Europe/Oslo',
                'name' => trans('(GMT/UTC + 01:00) Oslo'),
            ],
            [
                'id' => 'Europe/Paris',
                'name' => trans('(GMT/UTC + 01:00) Paris'),
            ],
            [
                'id' => 'Europe/Podgorica',
                'name' => trans('(GMT/UTC + 01:00) Podgorica'),
            ],
            [
                'id' => 'Europe/Prague',
                'name' => trans('(GMT/UTC + 01:00) Prague'),
            ],
            [
                'id' => 'Europe/Riga',
                'name' => trans('(GMT/UTC + 02:00) Riga'),
            ],
            [
                'id' => 'Europe/Rome',
                'name' => trans('(GMT/UTC + 01:00) Rome'),
            ],
            [
                'id' => 'Europe/Samara',
                'name' => trans('(GMT/UTC + 04:00) Samara'),
            ],
            [
                'id' => 'Europe/San_Marino',
                'name' => trans('(GMT/UTC + 01:00) San Marino'),
            ],
            [
                'id' => 'Europe/Sarajevo',
                'name' => trans('(GMT/UTC + 01:00) Sarajevo'),
            ],
            [
                'id' => 'Europe/Simferopol',
                'name' => trans('(GMT/UTC + 03:00) Simferopol'),
            ],
            [
                'id' => 'Europe/Skopje',
                'name' => trans('(GMT/UTC + 01:00) Skopje'),
            ],
            [
                'id' => 'Europe/Sofia',
                'name' => trans('(GMT/UTC + 02:00) Sofia'),
            ],
            [
                'id' => 'Europe/Stockholm',
                'name' => trans('(GMT/UTC + 01:00) Stockholm'),
            ],
            [
                'id' => 'Europe/Tallinn',
                'name' => trans('(GMT/UTC + 02:00) Tallinn'),
            ],
            [
                'id' => 'Europe/Tirane',
                'name' => trans('(GMT/UTC + 01:00) Tirane'),
            ],
            [
                'id' => 'Europe/Ulyanovsk',
                'name' => trans('(GMT/UTC + 04:00) Ulyanovsk'),
            ],
            [
                'id' => 'Europe/Uzhgorod',
                'name' => trans('(GMT/UTC + 02:00) Uzhgorod'),
            ],
            [
                'id' => 'Europe/Vaduz',
                'name' => trans('(GMT/UTC + 01:00) Vaduz'),
            ],
            [
                'id' => 'Europe/Vatican',
                'name' => trans('(GMT/UTC + 01:00) Vatican'),
            ],
            [
                'id' => 'Europe/Vienna',
                'name' => trans('(GMT/UTC + 01:00) Vienna'),
            ],
            [
                'id' => 'Europe/Vilnius',
                'name' => trans('(GMT/UTC + 02:00) Vilnius'),
            ],
            [
                'id' => 'Europe/Volgograd',
                'name' => trans('(GMT/UTC + 03:00) Volgograd'),
            ],
            [
                'id' => 'Europe/Warsaw',
                'name' => trans('(GMT/UTC + 01:00) Warsaw'),
            ],
            [
                'id' => 'Europe/Zagreb',
                'name' => trans('(GMT/UTC + 01:00) Zagreb'),
            ],
            [
                'id' => 'Europe/Zaporozhye',
                'name' => trans('(GMT/UTC + 02:00) Zaporozhye'),
            ],
            [
                'id' => 'Europe/Zurich',
                'name' => trans('(GMT/UTC + 01:00) Zurich'),
            ],
            [
                'id' => 'Africa/Abidjan',
                'name' => trans('(GMT/UTC + 00:00) Abidjan'),
            ],
            [
                'id' => 'Africa/Accra',
                'name' => trans('(GMT/UTC + 00:00) Accra'),
            ],
            [
                'id' => 'Africa/Addis_Ababa',
                'name' => trans('(GMT/UTC + 03:00) Addis Ababa'),
            ],
            [
                'id' => 'Africa/Algiers',
                'name' => trans('(GMT/UTC + 01:00) Algiers'),
            ],
            [
                'id' => 'Africa/Asmara',
                'name' => trans('(GMT/UTC + 03:00) Asmara'),
            ],
            [
                'id' => 'Africa/Bamako',
                'name' => trans('(GMT/UTC + 00:00) Bamako'),
            ],
            [
                'id' => 'Africa/Bangui',
                'name' => trans('(GMT/UTC + 01:00) Bangui'),
            ],
            [
                'id' => 'Africa/Banjul',
                'name' => trans('(GMT/UTC + 00:00) Banjul'),
            ],
            [
                'id' => 'Africa/Bissau',
                'name' => trans('(GMT/UTC + 00:00) Bissau'),
            ],
            [
                'id' => 'Africa/Blantyre',
                'name' => trans('(GMT/UTC + 02:00) Blantyre'),
            ],
            [
                'id' => 'Africa/Brazzaville',
                'name' => trans('(GMT/UTC + 01:00) Brazzaville'),
            ],
            [
                'id' => 'Africa/Bujumbura',
                'name' => trans('(GMT/UTC + 02:00) Bujumbura'),
            ],
            [
                'id' => 'Africa/Cairo',
                'name' => trans('(GMT/UTC + 02:00) Cairo'),
            ],
            [
                'id' => 'Africa/Casablanca',
                'name' => trans('(GMT/UTC + 00:00) Casablanca'),
            ],
            [
                'id' => 'Africa/Ceuta',
                'name' => trans('(GMT/UTC + 01:00) Ceuta'),
            ],
            [
                'id' => 'Africa/Conakry',
                'name' => trans('(GMT/UTC + 00:00) Conakry'),
            ],
            [
                'id' => 'Africa/Dakar',
                'name' => trans('(GMT/UTC + 00:00) Dakar'),
            ],
            [
                'id' => 'Africa/Dar_es_Salaam',
                'name' => trans('(GMT/UTC + 03:00) Dar es Salaam'),
            ],
            [
                'id' => 'Africa/Djibouti',
                'name' => trans('(GMT/UTC + 03:00) Djibouti'),
            ],
            [
                'id' => 'Africa/Douala',
                'name' => trans('(GMT/UTC + 01:00) Douala'),
            ],
            [
                'id' => 'Africa/El_Aaiun',
                'name' => trans('(GMT/UTC + 00:00) El Aaiun'),
            ],
            [
                'id' => 'Africa/Freetown',
                'name' => trans('(GMT/UTC + 00:00) Freetown'),
            ],
            [
                'id' => 'Africa/Gaborone',
                'name' => trans('(GMT/UTC + 02:00) Gaborone'),
            ],
            [
                'id' => 'Africa/Harare',
                'name' => trans('(GMT/UTC + 02:00) Harare'),
            ],
            [
                'id' => 'Africa/Johannesburg',
                'name' => trans('(GMT/UTC + 02:00) Johannesburg'),
            ],
            [
                'id' => 'Africa/Juba',
                'name' => trans('(GMT/UTC + 03:00) Juba'),
            ],
            [
                'id' => 'Africa/Kampala',
                'name' => trans('(GMT/UTC + 03:00) Kampala'),
            ],
            [
                'id' => 'Africa/Khartoum',
                'name' => trans('(GMT/UTC + 03:00) Khartoum'),
            ],
            [
                'id' => 'Africa/Kigali',
                'name' => trans('(GMT/UTC + 02:00) Kigali'),
            ],
            [
                'id' => 'Africa/Kinshasa',
                'name' => trans('(GMT/UTC + 01:00) Kinshasa'),
            ],
            [
                'id' => 'Africa/Lagos',
                'name' => trans('(GMT/UTC + 01:00) Lagos'),
            ],
            [
                'id' => 'Africa/Libreville',
                'name' => trans('(GMT/UTC + 01:00) Libreville'),
            ],
            [
                'id' => 'Africa/Lome',
                'name' => trans('(GMT/UTC + 00:00) Lome'),
            ],
            [
                'id' => 'Africa/Luanda',
                'name' => trans('(GMT/UTC + 01:00) Luanda'),
            ],
            [
                'id' => 'Africa/Lubumbashi',
                'name' => trans('(GMT/UTC + 02:00) Lubumbashi'),
            ],
            [
                'id' => 'Africa/Lusaka',
                'name' => trans('(GMT/UTC + 02:00) Lusaka'),
            ],
            [
                'id' => 'Africa/Malabo',
                'name' => trans('(GMT/UTC + 01:00) Malabo'),
            ],
            [
                'id' => 'Africa/Maputo',
                'name' => trans('(GMT/UTC + 02:00) Maputo'),
            ],
            [
                'id' => 'Africa/Maseru',
                'name' => trans('(GMT/UTC + 02:00) Maseru'),
            ],
            [
                'id' => 'Africa/Mbabane',
                'name' => trans('(GMT/UTC + 02:00) Mbabane'),
            ],
            [
                'id' => 'Africa/Mogadishu',
                'name' => trans('(GMT/UTC + 03:00) Mogadishu'),
            ],
            [
                'id' => 'Africa/Monrovia',
                'name' => trans('(GMT/UTC + 00:00) Monrovia'),
            ],
            [
                'id' => 'Africa/Nairobi',
                'name' => trans('(GMT/UTC + 03:00) Nairobi'),
            ],
            [
                'id' => 'Africa/Ndjamena',
                'name' => trans('(GMT/UTC + 01:00) Ndjamena'),
            ],
            [
                'id' => 'Africa/Niamey',
                'name' => trans('(GMT/UTC + 01:00) Niamey'),
            ],
            [
                'id' => 'Africa/Nouakchott',
                'name' => trans('(GMT/UTC + 00:00) Nouakchott'),
            ],
            [
                'id' => 'Africa/Ouagadougou',
                'name' => trans('(GMT/UTC + 00:00) Ouagadougou'),
            ],
            [
                'id' => 'Africa/Porto-Novo',
                'name' => trans('(GMT/UTC + 01:00) Porto-Novo'),
            ],
            [
                'id' => 'Africa/Sao_Tome',
                'name' => trans('(GMT/UTC + 00:00) Sao Tome'),
            ],
            [
                'id' => 'Africa/Tripoli',
                'name' => trans('(GMT/UTC + 02:00) Tripoli'),
            ],
            [
                'id' => 'Africa/Tunis',
                'name' => trans('(GMT/UTC + 01:00) Tunis'),
            ],
            [
                'id' => 'Africa/Windhoek',
                'name' => trans('(GMT/UTC + 02:00) Windhoek'),
            ],
            [
                'id' => 'Antarctica/Casey',
                'name' => trans('(GMT/UTC + 08:00) Casey'),
            ],
            [
                'id' => 'Antarctica/Davis',
                'name' => trans('(GMT/UTC + 07:00) Davis'),
            ],
            [
                'id' => 'Antarctica/DumontDUrville',
                'name' => trans('(GMT/UTC + 10:00) DumontDUrville'),
            ],
            [
                'id' => 'Antarctica/Macquarie',
                'name' => trans('(GMT/UTC + 11:00) Macquarie'),
            ],
            [
                'id' => 'Antarctica/Mawson',
                'name' => trans('(GMT/UTC + 05:00) Mawson'),
            ],
            [
                'id' => 'Antarctica/McMurdo',
                'name' => trans('(GMT/UTC + 13:00) McMurdo'),
            ],
            [
                'id' => 'Antarctica/Palmer',
                'name' => trans('(GMT/UTC - 03:00) Palmer'),
            ],
            [
                'id' => 'Antarctica/Rothera',
                'name' => trans('(GMT/UTC - 03:00) Rothera'),
            ],
            [
                'id' => 'Antarctica/Syowa',
                'name' => trans('(GMT/UTC + 03:00) Syowa'),
            ],
            [
                'id' => 'Antarctica/Troll',
                'name' => trans('(GMT/UTC + 00:00) Troll'),
            ],
            [
                'id' => 'Antarctica/Vostok',
                'name' => trans('(GMT/UTC + 06:00) Vostok'),
            ],
            [
                'id' => 'Arctic/Longyearbyen',
                'name' => trans('(GMT/UTC + 01:00) Longyearbyen'),
            ],
            [
                'id' => 'Asia/Aden',
                'name' => trans('(GMT/UTC + 03:00) Aden'),
            ],
            [
                'id' => 'Asia/Almaty',
                'name' => trans('(GMT/UTC + 06:00) Almaty'),
            ],
            [
                'id' => 'Asia/Amman',
                'name' => trans('(GMT/UTC + 02:00) Amman'),
            ],
            [
                'id' => 'Asia/Anadyr',
                'name' => trans('(GMT/UTC + 12:00) Anadyr'),
            ],
            [
                'id' => 'Asia/Aqtau',
                'name' => trans('(GMT/UTC + 05:00) Aqtau'),
            ],
            [
                'id' => 'Asia/Aqtobe',
                'name' => trans('(GMT/UTC + 05:00) Aqtobe'),
            ],
            [
                'id' => 'Asia/Ashgabat',
                'name' => trans('(GMT/UTC + 05:00) Ashgabat'),
            ],
            [
                'id' => 'Asia/Baghdad',
                'name' => trans('(GMT/UTC + 03:00) Baghdad'),
            ],
            [
                'id' => 'Asia/Bahrain',
                'name' => trans('(GMT/UTC + 03:00) Bahrain'),
            ],
            [
                'id' => 'Asia/Baku',
                'name' => trans('(GMT/UTC + 04:00) Baku'),
            ],
            [
                'id' => 'Asia/Bangkok',
                'name' => trans('(GMT/UTC + 07:00) Bangkok'),
            ],
            [
                'id' => 'Asia/Barnaul',
                'name' => trans('(GMT/UTC + 07:00) Barnaul'),
            ],
            [
                'id' => 'Asia/Beirut',
                'name' => trans('(GMT/UTC + 02:00) Beirut'),
            ],
            [
                'id' => 'Asia/Bishkek',
                'name' => trans('(GMT/UTC + 06:00) Bishkek'),
            ],
            [
                'id' => 'Asia/Brunei',
                'name' => trans('(GMT/UTC + 08:00) Brunei'),
            ],
            [
                'id' => 'Asia/Chita',
                'name' => trans('(GMT/UTC + 09:00) Chita'),
            ],
            [
                'id' => 'Asia/Choibalsan',
                'name' => trans('(GMT/UTC + 08:00) Choibalsan'),
            ],
            [
                'id' => 'Asia/Colombo',
                'name' => trans('(GMT/UTC + 05:30) Colombo'),
            ],
            [
                'id' => 'Asia/Damascus',
                'name' => trans('(GMT/UTC + 02:00) Damascus'),
            ],
            [
                'id' => 'Asia/Dhaka',
                'name' => trans('(GMT/UTC + 06:00) Dhaka'),
            ],
            [
                'id' => 'Asia/Dili',
                'name' => trans('(GMT/UTC + 09:00) Dili'),
            ],
            [
                'id' => 'Asia/Dubai',
                'name' => trans('(GMT/UTC + 04:00) Dubai'),
            ],
            [
                'id' => 'Asia/Dushanbe',
                'name' => trans('(GMT/UTC + 05:00) Dushanbe'),
            ],
            [
                'id' => 'Asia/Gaza',
                'name' => trans('(GMT/UTC + 02:00) Gaza'),
            ],
            [
                'id' => 'Asia/Hebron',
                'name' => trans('(GMT/UTC + 02:00) Hebron'),
            ],
            [
                'id' => 'Asia/Ho_Chi_Minh',
                'name' => trans('(GMT/UTC + 07:00) Ho Chi Minh'),
            ],
            [
                'id' => 'Asia/Hong_Kong',
                'name' => trans('(GMT/UTC + 08:00) Hong Kong'),
            ],
            [
                'id' => 'Asia/Hovd',
                'name' => trans('(GMT/UTC + 07:00) Hovd'),
            ],
            [
                'id' => 'Asia/Irkutsk',
                'name' => trans('(GMT/UTC + 08:00) Irkutsk'),
            ],
            [
                'id' => 'Asia/Jakarta',
                'name' => trans('(GMT/UTC + 07:00) Jakarta'),
            ],
            [
                'id' => 'Asia/Jayapura',
                'name' => trans('(GMT/UTC + 09:00) Jayapura'),
            ],
            [
                'id' => 'Asia/Jerusalem',
                'name' => trans('(GMT/UTC + 02:00) Jerusalem'),
            ],
            [
                'id' => 'Asia/Kabul',
                'name' => trans('(GMT/UTC + 04:30) Kabul'),
            ],
            [
                'id' => 'Asia/Kamchatka',
                'name' => trans('(GMT/UTC + 12:00) Kamchatka'),
            ],
            [
                'id' => 'Asia/Karachi',
                'name' => trans('(GMT/UTC + 05:00) Karachi'),
            ],
            [
                'id' => 'Asia/Kathmandu',
                'name' => trans('(GMT/UTC + 05:45) Kathmandu'),
            ],
            [
                'id' => 'Asia/Khandyga',
                'name' => trans('(GMT/UTC + 09:00) Khandyga'),
            ],
            [
                'id' => 'Asia/Kolkata',
                'name' => trans('(GMT/UTC + 05:30) Kolkata'),
            ],
            [
                'id' => 'Asia/Krasnoyarsk',
                'name' => trans('(GMT/UTC + 07:00) Krasnoyarsk'),
            ],
            [
                'id' => 'Asia/Kuala_Lumpur',
                'name' => trans('(GMT/UTC + 08:00) Kuala Lumpur'),
            ],
            [
                'id' => 'Asia/Kuching',
                'name' => trans('(GMT/UTC + 08:00) Kuching'),
            ],
            [
                'id' => 'Asia/Kuwait',
                'name' => trans('(GMT/UTC + 03:00) Kuwait'),
            ],
            [
                'id' => 'Asia/Macau',
                'name' => trans('(GMT/UTC + 08:00) Macau'),
            ],
            [
                'id' => 'Asia/Magadan',
                'name' => trans('(GMT/UTC + 10:00) Magadan'),
            ],
            [
                'id' => 'Asia/Makassar',
                'name' => trans('(GMT/UTC + 08:00) Makassar'),
            ],
            [
                'id' => 'Asia/Manila',
                'name' => trans('(GMT/UTC + 08:00) Manila'),
            ],
            [
                'id' => 'Asia/Muscat',
                'name' => trans('(GMT/UTC + 04:00) Muscat'),
            ],
            [
                'id' => 'Asia/Nicosia',
                'name' => trans('(GMT/UTC + 02:00) Nicosia'),
            ],
            [
                'id' => 'Asia/Novokuznetsk',
                'name' => trans('(GMT/UTC + 07:00) Novokuznetsk'),
            ],
            [
                'id' => 'Asia/Novosibirsk',
                'name' => trans('(GMT/UTC + 06:00) Novosibirsk'),
            ],
            [
                'id' => 'Asia/Omsk',
                'name' => trans('(GMT/UTC + 06:00) Omsk'),
            ],
            [
                'id' => 'Asia/Oral',
                'name' => trans('(GMT/UTC + 05:00) Oral'),
            ],
            [
                'id' => 'Asia/Phnom_Penh',
                'name' => trans('(GMT/UTC + 07:00) Phnom Penh'),
            ],
            [
                'id' => 'Asia/Pontianak',
                'name' => trans('(GMT/UTC + 07:00) Pontianak'),
            ],
            [
                'id' => 'Asia/Pyongyang',
                'name' => trans('(GMT/UTC + 08:30) Pyongyang'),
            ],
            [
                'id' => 'Asia/Qatar',
                'name' => trans('(GMT/UTC + 03:00) Qatar'),
            ],
            [
                'id' => 'Asia/Qyzylorda',
                'name' => trans('(GMT/UTC + 06:00) Qyzylorda'),
            ],
            [
                'id' => 'Asia/Rangoon',
                'name' => trans('(GMT/UTC + 06:30) Rangoon'),
            ],
            [
                'id' => 'Asia/Riyadh',
                'name' => trans('(GMT/UTC + 03:00) Riyadh'),
            ],
            [
                'id' => 'Asia/Sakhalin',
                'name' => trans('(GMT/UTC + 11:00) Sakhalin'),
            ],
            [
                'id' => 'Asia/Samarkand',
                'name' => trans('(GMT/UTC + 05:00) Samarkand'),
            ],
            [
                'id' => 'Asia/Seoul',
                'name' => trans('(GMT/UTC + 09:00) Seoul'),
            ],
            [
                'id' => 'Asia/Shanghai',
                'name' => trans('(GMT/UTC + 08:00) Shanghai'),
            ],
            [
                'id' => 'Asia/Singapore',
                'name' => trans('(GMT/UTC + 08:00) Singapore'),
            ],
            [
                'id' => 'Asia/Srednekolymsk',
                'name' => trans('(GMT/UTC + 11:00) Srednekolymsk'),
            ],
            [
                'id' => 'Asia/Taipei',
                'name' => trans('(GMT/UTC + 08:00) Taipei'),
            ],
            [
                'id' => 'Asia/Tashkent',
                'name' => trans('(GMT/UTC + 05:00) Tashkent'),
            ],
            [
                'id' => 'Asia/Tbilisi',
                'name' => trans('(GMT/UTC + 04:00) Tbilisi'),
            ],
            [
                'id' => 'Asia/Tehran',
                'name' => trans('(GMT/UTC + 03:30) Tehran'),
            ],
            [
                'id' => 'Asia/Thimphu',
                'name' => trans('(GMT/UTC + 06:00) Thimphu'),
            ],
            [
                'id' => 'Asia/Tokyo',
                'name' => trans('(GMT/UTC + 09:00) Tokyo'),
            ],
            [
                'id' => 'Asia/Ulaanbaatar',
                'name' => trans('(GMT/UTC + 08:00) Ulaanbaatar'),
            ],
            [
                'id' => 'Asia/Urumqi',
                'name' => trans('(GMT/UTC + 06:00) Urumqi'),
            ],
            [
                'id' => 'Asia/Ust-Nera',
                'name' => trans('(GMT/UTC + 10:00) Ust-Nera'),
            ],
            [
                'id' => 'Asia/Vientiane',
                'name' => trans('(GMT/UTC + 07:00) Vientiane'),
            ],
            [
                'id' => 'Asia/Vladivostok',
                'name' => trans('(GMT/UTC + 10:00) Vladivostok'),
            ],
            [
                'id' => 'Asia/Yakutsk',
                'name' => trans('(GMT/UTC + 09:00) Yakutsk'),
            ],
            [
                'id' => 'Asia/Yekaterinburg',
                'name' => trans('(GMT/UTC + 05:00) Yekaterinburg'),
            ],
            [
                'id' => 'Asia/Yerevan',
                'name' => trans('(GMT/UTC + 04:00) Yerevan'),
            ],
            [
                'id' => 'Atlantic/Azores',
                'name' => trans('(GMT/UTC - 01:00) Azores'),
            ],
            [
                'id' => 'Atlantic/Bermuda',
                'name' => trans('(GMT/UTC - 04:00) Bermuda'),
            ],
            [
                'id' => 'Atlantic/Canary',
                'name' => trans('(GMT/UTC + 00:00) Canary'),
            ],
            [
                'id' => 'Atlantic/Cape_Verde',
                'name' => trans('(GMT/UTC - 01:00) Cape Verde'),
            ],
            [
                'id' => 'Atlantic/Faroe',
                'name' => trans('(GMT/UTC + 00:00) Faroe'),
            ],
            [
                'id' => 'Atlantic/Madeira',
                'name' => trans('(GMT/UTC + 00:00) Madeira'),
            ],
            [
                'id' => 'Atlantic/Reykjavik',
                'name' => trans('(GMT/UTC + 00:00) Reykjavik'),
            ],
            [
                'id' => 'Atlantic/South_Georgia',
                'name' => trans('(GMT/UTC - 02:00) South Georgia'),
            ],
            [
                'id' => 'Atlantic/St_Helena',
                'name' => trans('(GMT/UTC + 00:00) St. Helena'),
            ],
            [
                'id' => 'Atlantic/Stanley',
                'name' => trans('(GMT/UTC - 03:00) Stanley'),
            ],
            [
                'id' => 'Australia/Adelaide',
                'name' => trans('(GMT/UTC + 10:30) Adelaide'),
            ],
            [
                'id' => 'Australia/Brisbane',
                'name' => trans('(GMT/UTC + 10:00) Brisbane'),
            ],
            [
                'id' => 'Australia/Broken_Hill',
                'name' => trans('(GMT/UTC + 10:30) Broken Hill'),
            ],
            [
                'id' => 'Australia/Currie',
                'name' => trans('(GMT/UTC + 11:00) Currie'),
            ],
            [
                'id' => 'Australia/Darwin',
                'name' => trans('(GMT/UTC + 09:30) Darwin'),
            ],
            [
                'id' => 'Australia/Eucla',
                'name' => trans('(GMT/UTC + 08:45) Eucla'),
            ],
            [
                'id' => 'Australia/Hobart',
                'name' => trans('(GMT/UTC + 11:00) Hobart'),
            ],
            [
                'id' => 'Australia/Lindeman',
                'name' => trans('(GMT/UTC + 10:00) Lindeman'),
            ],
            [
                'id' => 'Australia/Lord_Howe',
                'name' => trans('(GMT/UTC + 11:00) Lord Howe'),
            ],
            [
                'id' => 'Australia/Melbourne',
                'name' => trans('(GMT/UTC + 11:00) Melbourne'),
            ],
            [
                'id' => 'Australia/Perth',
                'name' => trans('(GMT/UTC + 08:00) Perth'),
            ],
            [
                'id' => 'Australia/Sydney',
                'name' => trans('(GMT/UTC + 11:00) Sydney'),
            ],
            [
                'id' => 'Indian/Antananarivo',
                'name' => trans('(GMT/UTC + 03:00) Antananarivo'),
            ],
            [
                'id' => 'Indian/Chagos',
                'name' => trans('(GMT/UTC + 06:00) Chagos'),
            ],
            [
                'id' => 'Indian/Christmas',
                'name' => trans('(GMT/UTC + 07:00) Christmas'),
            ],
            [
                'id' => 'Indian/Cocos',
                'name' => trans('(GMT/UTC + 06:30) Cocos'),
            ],
            [
                'id' => 'Indian/Comoro',
                'name' => trans('(GMT/UTC + 03:00) Comoro'),
            ],
            [
                'id' => 'Indian/Kerguelen',
                'name' => trans('(GMT/UTC + 05:00) Kerguelen'),
            ],
            [
                'id' => 'Indian/Mahe',
                'name' => trans('(GMT/UTC + 04:00) Mahe'),
            ],
            [
                'id' => 'Indian/Maldives',
                'name' => trans('(GMT/UTC + 05:00) Maldives'),
            ],
            [
                'id' => 'Indian/Mauritius',
                'name' => trans('(GMT/UTC + 04:00) Mauritius'),
            ],
            [
                'id' => 'Indian/Mayotte',
                'name' => trans('(GMT/UTC + 03:00) Mayotte'),
            ],
            [
                'id' => 'Indian/Reunion',
                'name' => trans('(GMT/UTC + 04:00) Reunion'),
            ],
            [
                'id' => 'Pacific/Apia',
                'name' => trans('(GMT/UTC + 14:00) Apia'),
            ],
            [
                'id' => 'Pacific/Auckland',
                'name' => trans('(GMT/UTC + 13:00) Auckland'),
            ],
            [
                'id' => 'Pacific/Bougainville',
                'name' => trans('(GMT/UTC + 11:00) Bougainville'),
            ],
            [
                'id' => 'Pacific/Chatham',
                'name' => trans('(GMT/UTC + 13:45) Chatham'),
            ],
            [
                'id' => 'Pacific/Chuuk',
                'name' => trans('(GMT/UTC + 10:00) Chuuk'),
            ],
            [
                'id' => 'Pacific/Easter',
                'name' => trans('(GMT/UTC - 05:00) Easter'),
            ],
            [
                'id' => 'Pacific/Efate',
                'name' => trans('(GMT/UTC + 11:00) Efate'),
            ],
            [
                'id' => 'Pacific/Enderbury',
                'name' => trans('(GMT/UTC + 13:00) Enderbury'),
            ],
            [
                'id' => 'Pacific/Fakaofo',
                'name' => trans('(GMT/UTC + 13:00) Fakaofo'),
            ],
            [
                'id' => 'Pacific/Fiji',
                'name' => trans('(GMT/UTC + 12:00) Fiji'),
            ],
            [
                'id' => 'Pacific/Funafuti',
                'name' => trans('(GMT/UTC + 12:00) Funafuti'),
            ],
            [
                'id' => 'Pacific/Galapagos',
                'name' => trans('(GMT/UTC - 06:00) Galapagos'),
            ],
            [
                'id' => 'Pacific/Gambier',
                'name' => trans('(GMT/UTC - 09:00) Gambier'),
            ],
            [
                'id' => 'Pacific/Guadalcanal',
                'name' => trans('(GMT/UTC + 11:00) Guadalcanal'),
            ],
            [
                'id' => 'Pacific/Guam',
                'name' => trans('(GMT/UTC + 10:00) Guam'),
            ],
            [
                'id' => 'Pacific/Honolulu',
                'name' => trans('(GMT/UTC - 10:00) Honolulu'),
            ],
            [
                'id' => 'Pacific/Johnston',
                'name' => trans('(GMT/UTC - 10:00) Johnston'),
            ],
            [
                'id' => 'Pacific/Kiritimati',
                'name' => trans('(GMT/UTC + 14:00) Kiritimati'),
            ],
            [
                'id' => 'Pacific/Kosrae',
                'name' => trans('(GMT/UTC + 11:00) Kosrae'),
            ],
            [
                'id' => 'Pacific/Kwajalein',
                'name' => trans('(GMT/UTC + 12:00) Kwajalein'),
            ],
            [
                'id' => 'Pacific/Majuro',
                'name' => trans('(GMT/UTC + 12:00) Majuro'),
            ],
            [
                'id' => 'Pacific/Marquesas',
                'name' => trans('(GMT/UTC - 09:30) Marquesas'),
            ],
            [
                'id' => 'Pacific/Midway',
                'name' => trans('(GMT/UTC - 11:00) Midway'),
            ],
            [
                'id' => 'Pacific/Nauru',
                'name' => trans('(GMT/UTC + 12:00) Nauru'),
            ],
            [
                'id' => 'Pacific/Niue',
                'name' => trans('(GMT/UTC - 11:00) Niue'),
            ],
            [
                'id' => 'Pacific/Norfolk',
                'name' => trans('(GMT/UTC + 11:00) Norfolk'),
            ],
            [
                'id' => 'Pacific/Noumea',
                'name' => trans('(GMT/UTC + 11:00) Noumea'),
            ],
            [
                'id' => 'Pacific/Pago_Pago',
                'name' => trans('(GMT/UTC - 11:00) Pago Pago'),
            ],
            [
                'id' => 'Pacific/Palau',
                'name' => trans('(GMT/UTC + 09:00) Palau'),
            ],
            [
                'id' => 'Pacific/Pitcairn',
                'name' => trans('(GMT/UTC - 08:00) Pitcairn'),
            ],
            [
                'id' => 'Pacific/Pohnpei',
                'name' => trans('(GMT/UTC + 11:00) Pohnpei'),
            ],
            [
                'id' => 'Pacific/Port_Moresby',
                'name' => trans('(GMT/UTC + 10:00) Port Moresby'),
            ],
            [
                'id' => 'Pacific/Rarotonga',
                'name' => trans('(GMT/UTC - 10:00) Rarotonga'),
            ],
            [
                'id' => 'Pacific/Saipan',
                'name' => trans('(GMT/UTC + 10:00) Saipan'),
            ],
            [
                'id' => 'Pacific/Tahiti',
                'name' => trans('(GMT/UTC - 10:00) Tahiti'),
            ],
            [
                'id' => 'Pacific/Tarawa',
                'name' => trans('(GMT/UTC + 12:00) Tarawa'),
            ],
            [
                'id' => 'Pacific/Tongatapu',
                'name' => trans('(GMT/UTC + 13:00) Tongatapu'),
            ],
            [
                'id' => 'Pacific/Wake',
                'name' => trans('(GMT/UTC + 12:00) Wake'),
            ],
            [
                'id' => 'Pacific/Wallis',
                'name' => trans('(GMT/UTC + 12:00) Wallis'),
            ],
        ];

        return [
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'username' => $user->username,
            'avatar' => $user->avatar,
            'locale' => $user->locale,
            'agePreferences' => $user->age_preferences,
            'timezone' => $user->timezone,
            'timezones' => $timezones,
            'bornAt' => $user->born_at?->format('Y-m-d'),
            'hasPublicProfile' => $user->has_public_profile ? 1 : 0,
        ];
    }
}
