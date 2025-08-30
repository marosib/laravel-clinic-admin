<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'reset' => 'A jelszavadat visszaállítottuk.',
    'sent' => 'Elküldtük a jelszó-visszaállító linket e-mailben.',
    'throttled' => 'Kérlek, várj egy kicsit a következő próbálkozásig.',
    'token' => 'Ez a jelszó-visszaállító token érvénytelen.',
    'user' => "Nem találunk felhasználót ezzel az e-mail címmel.",

    'accepted' => 'A(z) :attribute mezőt el kell fogadni.',
    'accepted_if' => 'A(z) :attribute mezőt el kell fogadni, ha :other értéke :value.',
    'active_url' => 'A(z) :attribute mező érvényes URL-nek kell lennie.',
    'after' => 'A(z) :attribute mezőnek a :date utáni dátumnak kell lennie.',
    'after_or_equal' => 'A(z) :attribute mezőnek a :date utáni vagy azzal egyenlő dátumnak kell lennie.',
    'alpha' => 'A(z) :attribute mező csak betűket tartalmazhat.',
    'alpha_dash' => 'A(z) :attribute mező csak betűket, számokat, kötőjelet és aláhúzást tartalmazhat.',
    'alpha_num' => 'A(z) :attribute mező csak betűket és számokat tartalmazhat.',
    'array' => 'A(z) :attribute mezőnek tömbnek kell lennie.',
    'ascii' => 'A(z) :attribute mező csak egybájtos alfanumerikus karaktereket és szimbólumokat tartalmazhat.',
    'before' => 'A(z) :attribute mezőnek a :date előtti dátumnak kell lennie.',
    'before_or_equal' => 'A(z) :attribute mezőnek a :date előtti vagy azzal egyenlő dátumnak kell lennie.',
    'between' => [
        'array' => 'A(z) :attribute mezőnek :min és :max elem között kell lennie.',
        'file' => 'A(z) :attribute fájlnak :min és :max kilobájt között kell lennie.',
        'numeric' => 'A(z) :attribute értékének :min és :max között kell lennie.',
        'string' => 'A(z) :attribute mezőnek :min és :max karakter között kell lennie.',
    ],
    'boolean' => 'A(z) :attribute mezőnek igaz vagy hamis értékűnek kell lennie.',
    'can' => 'A(z) :attribute mező jogosulatlan értéket tartalmaz.',
    'confirmed' => 'A(z) :attribute megerősítése nem egyezik.',
    'contains' => 'A(z) :attribute mező hiányzik egy kötelező érték.',
    'current_password' => 'A jelszó hibás.',
    'date' => 'A(z) :attribute mező érvényes dátumnak kell lennie.',
    'date_equals' => 'A(z) :attribute mezőnek a :date-vel egyenlő dátumnak kell lennie.',
    'date_format' => 'A(z) :attribute mező formátuma nem egyezik a :format formátummal.',
    'decimal' => 'A(z) :attribute mezőnek :decimal tizedesjegyet kell tartalmaznia.',
    'declined' => 'A(z) :attribute mezőt el kell utasítani.',
    'declined_if' => 'A(z) :attribute mezőt el kell utasítani, ha :other értéke :value.',
    'different' => 'A(z) :attribute és :other mezőnek különböznie kell.',
    'digits' => 'A(z) :attribute mezőnek :digits számjegyből kell állnia.',
    'digits_between' => 'A(z) :attribute mezőnek :min és :max számjegy között kell lennie.',
    'dimensions' => 'A(z) :attribute mező képméretei érvénytelenek.',
    'distinct' => 'A(z) :attribute mező értéke ismétlődő.',
    'doesnt_end_with' => 'A(z) :attribute mező nem végződhet az alábbi értékek egyikével: :values.',
    'doesnt_start_with' => 'A(z) :attribute mező nem kezdődhet az alábbi értékek egyikével: :values.',
    'email' => 'A(z) :attribute mező érvényes e-mail címnek kell lennie.',
    'ends_with' => 'A(z) :attribute mezőnek az alábbi értékek egyikével kell végződnie: :values.',
    'enum' => 'A kiválasztott :attribute érvénytelen.',
    'exists' => 'A kiválasztott :attribute érvénytelen.',
    'extensions' => 'A(z) :attribute mezőnek az alábbi kiterjesztések egyikével kell rendelkeznie: :values.',
    'file' => 'A(z) :attribute mezőnek fájlnak kell lennie.',
    'filled' => 'A(z) :attribute mezőnek értéket kell tartalmaznia.',
    'gt' => [
        'array' => 'A(z) :attribute mezőnek több mint :value elemet kell tartalmaznia.',
        'file' => 'A(z) :attribute fájlnak nagyobbnak kell lennie, mint :value kilobájt.',
        'numeric' => 'A(z) :attribute értékének nagyobbnak kell lennie, mint :value.',
        'string' => 'A(z) :attribute mezőnek több mint :value karakterből kell állnia.',
    ],
        'gte' => [
        'array' => 'A(z) :attribute mezőnek legalább :value elemet kell tartalmaznia.',
        'file' => 'A(z) :attribute fájlnak legalább :value kilobájtnak kell lennie.',
        'numeric' => 'A(z) :attribute értékének legalább :value-nek kell lennie.',
        'string' => 'A(z) :attribute mezőnek legalább :value karakterből kell állnia.',
    ],
    'hex_color' => 'A(z) :attribute mezőnek érvényes hexadecimális színnek kell lennie.',
    'image' => 'A(z) :attribute mezőnek képnek kell lennie.',
    'in' => 'A kiválasztott :attribute érvénytelen.',
    'in_array' => 'A(z) :attribute mezőnek szerepelnie kell a :other értékek között.',
    'integer' => 'A(z) :attribute mezőnek egész számnak kell lennie.',
    'ip' => 'A(z) :attribute mező érvényes IP-címnek kell lennie.',
    'ipv4' => 'A(z) :attribute mező érvényes IPv4-címnek kell lennie.',
    'ipv6' => 'A(z) :attribute mező érvényes IPv6-címnek kell lennie.',
    'json' => 'A(z) :attribute mező érvényes JSON karakterláncnak kell lennie.',
    'list' => 'A(z) :attribute mezőnek listának kell lennie.',
    'lowercase' => 'A(z) :attribute mezőnek kisbetűsnek kell lennie.',
    'lt' => [
        'array' => 'A(z) :attribute mezőnek kevesebb mint :value elemet kell tartalmaznia.',
        'file' => 'A(z) :attribute fájlnak kevesebb mint :value kilobájtnak kell lennie.',
        'numeric' => 'A(z) :attribute értékének kisebbnek kell lennie, mint :value.',
        'string' => 'A(z) :attribute mezőnek kevesebb mint :value karakterből kell állnia.',
    ],
    'lte' => [
        'array' => 'A(z) :attribute mező nem tartalmazhat többet, mint :value elemet.',
        'file' => 'A(z) :attribute fájlnak legfeljebb :value kilobájtnak kell lennie.',
        'numeric' => 'A(z) :attribute értékének legfeljebb :value-nek kell lennie.',
        'string' => 'A(z) :attribute mezőnek legfeljebb :value karakterből kell állnia.',
    ],
    'mac_address' => 'A(z) :attribute mező érvényes MAC-címnek kell lennie.',
    'max' => [
        'array' => 'A(z) :attribute mező nem tartalmazhat többet, mint :max elemet.',
        'file' => 'A(z) :attribute fájl nem lehet nagyobb, mint :max kilobájt.',
        'numeric' => 'A(z) :attribute értéke nem lehet nagyobb, mint :max.',
        'string' => 'A(z) :attribute mező nem lehet hosszabb, mint :max karakter.',
    ],
    'max_digits' => 'A(z) :attribute mező nem tartalmazhat több, mint :max számjegyet.',
    'mimes' => 'A(z) :attribute mezőnek a következő fájltípusok egyikének kell lennie: :values.',
    'mimetypes' => 'A(z) :attribute mezőnek a következő fájltípusok egyikének kell lennie: :values.',
    'min' => [
        'array' => 'A(z) :attribute mezőnek legalább :min elemet kell tartalmaznia.',
        'file' => 'A(z) :attribute fájl legalább :min kilobájtnak kell lennie.',
        'numeric' => 'A(z) :attribute értékének legalább :min-nek kell lennie.',
        'string' => 'A(z) :attribute mezőnek legalább :min karakterből kell állnia.',
    ],
    'min_digits' => 'A(z) :attribute mezőnek legalább :min számjegyet kell tartalmaznia.',
    'missing' => 'A(z) :attribute mezőnek hiányoznia kell.',
    'missing_if' => 'A(z) :attribute mezőnek hiányoznia kell, ha :other értéke :value.',
    'missing_unless' => 'A(z) :attribute mezőnek hiányoznia kell, hacsak :other értéke nem :value.',
    'missing_with' => 'A(z) :attribute mezőnek hiányoznia kell, ha :values jelen van.',
    'missing_with_all' => 'A(z) :attribute mezőnek hiányoznia kell, ha az összes :values jelen van.',
    'multiple_of' => 'A(z) :attribute mezőnek a :value többszörösének kell lennie.',
    'not_in' => 'A kiválasztott :attribute érvénytelen.',
    'not_regex' => 'A(z) :attribute formátuma érvénytelen.',
    'numeric' => 'A(z) :attribute mezőnek számnak kell lennie.',
    'password' => [
        'letters' => 'A(z) :attribute mezőnek tartalmaznia kell legalább egy betűt.',
        'mixed' => 'A(z) :attribute mezőnek tartalmaznia kell legalább egy nagy- és egy kisbetűt.',
        'numbers' => 'A(z) :attribute mezőnek tartalmaznia kell legalább egy számot.',
        'symbols' => 'A(z) :attribute mezőnek tartalmaznia kell legalább egy szimbólumot.',
        'uncompromised' => 'A megadott :attribute korábban adatvédelmi szivárgásban szerepelt. Válassz másik :attribute értéket.',
    ],
    'present' => 'A(z) :attribute mezőnek jelen kell lennie.',
    'present_if' => 'A(z) :attribute mezőnek jelen kell lennie, ha :other értéke :value.',
    'present_unless' => 'A(z) :attribute mezőnek jelen kell lennie, hacsak :other értéke nem :value.',
    'present_with' => 'A(z) :attribute mezőnek jelen kell lennie, ha :values jelen van.',
    'present_with_all' => 'A(z) :attribute mezőnek jelen kell lennie, ha az összes :values jelen van.',
    'prohibited' => 'A(z) :attribute mező tiltott.',
    'prohibited_if' => 'A(z) :attribute mező tiltott, ha :other értéke :value.',
    'prohibited_if_accepted' => 'A(z) :attribute mező tiltott, ha :other elfogadott.',
    'prohibited_if_declined' => 'A(z) :attribute mező tiltott, ha :other elutasított.',
    'prohibited_unless' => 'A(z) :attribute mező tiltott, hacsak :other nem szerepel a :values között.',
    'prohibits' => 'A(z) :attribute mező megakadályozza, hogy :other jelen legyen.',
    'regex' => 'A(z) :attribute formátuma érvénytelen.',
    'required' => 'A(z) :attribute mező kitöltése kötelező.',
    'required_array_keys' => 'A(z) :attribute mezőnek a következő elemeket kell tartalmaznia: :values.',
    'required_if' => 'A(z) :attribute mező kitöltése kötelező, ha :other értéke :value.',
    'required_if_accepted' => 'A(z) :attribute mező kitöltése kötelező, ha :other elfogadott.',
    'required_if_declined' => 'A(z) :attribute mező kitöltése kötelező, ha :other elutasított.',
    'required_unless' => 'A(z) :attribute mező kitöltése kötelező, hacsak :other nem szerepel a :values között.',
    'required_with' => 'A(z) :attribute mező kitöltése kötelező, ha :values jelen van.',
    'required_with_all' => 'A(z) :attribute mező kitöltése kötelező, ha az összes :values jelen van.',
    'required_without' => 'A(z) :attribute mező kitöltése kötelező, ha :values nincs jelen.',
    'required_without_all' => 'A(z) :attribute mező kitöltése kötelező, ha egyik :values sincs jelen.',
    'same' => 'A(z) :attribute mezőnek egyeznie kell a(z) :other mezővel.',
    'size' => [
        'array' => 'A(z) :attribute mezőnek :size elemet kell tartalmaznia.',
        'file' => 'A(z) :attribute fájlnak :size kilobájtnak kell lennie.',
        'numeric' => 'A(z) :attribute értékének :size-nek kell lennie.',
        'string' => 'A(z) :attribute mezőnek :size karakterből kell állnia.',
    ],
    'starts_with' => 'A(z) :attribute mezőnek az alábbi értékek egyikével kell kezdődnie: :values.',
    'string' => 'A(z) :attribute mezőnek szövegnek kell lennie.',
    'timezone' => 'A(z) :attribute mező érvényes időzónának kell lennie.',
    'unique' => 'A(z) :attribute már foglalt.',
    'uploaded' => 'A(z) :attribute feltöltése sikertelen.',
    'uppercase' => 'A(z) :attribute mezőnek nagybetűsnek kell lennie.',
    'url' => 'A(z) :attribute mező érvényes URL-nek kell lennie.',
    'ulid' => 'A(z) :attribute mező érvényes ULID-nek kell lennie.',
    'uuid' => 'A(z) :attribute mező érvényes UUID-nek kell lennie.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'Név',
        'email' => 'E-mail cím',
        'password' => 'Jelszó',
        'password_confirmation' => 'Jelszó megerősítése',
        'birth_date' => 'Születési dátum',
        'title' => 'Cím',
        'description' => 'Leírás',
        'content' => 'Tartalom',
        'category_id' => 'Kategória',
        'status' => 'Állapot',
        'price' => 'Ár',
        'quantity' => 'Mennyiség',
        'image' => 'Kép',
        'file' => 'Fájl',
        'start_date' => 'Kezdő dátum',
        'end_date' => 'Befejező dátum',
        'phone' => 'Telefonszám',
        'address' => 'Cím',
        'city' => 'Város',
        'postcode' => 'Irányítószám',
        'country' => 'Ország',
        'user_id' => 'Felhasználó',
        'role' => 'Szerepkör',
        'terms' => 'Feltételek elfogadása',
        'remember' => 'Emlékezz rám',
    ],

];
