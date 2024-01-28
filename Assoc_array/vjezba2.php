<?php 

$osobe = [
    'Dragan' => [
        "ime" => "Dragan",
        "prezime" => "Vujic",
        "godiste" => "1995",
        "pol" => "Muški",
        "hobiji" => ["fotografija","knjige"],
        "broj_telefona" => "+381601234",
        "email" => "dragan.vujic@gmail.com"
    ],
    'Konstantin' => [
        "prezime" => "Markovic",
        "godiste" => "1997",
        "pol" => "Zensko",
        "hobiji" => [
            "umetnost",
            "glazba" => ['bluz', 'reagge']
        ]
    ]
];

echo $osobe['Konstantin']['hobiji'][0] . "<br>";


$osobe['Marko'] = [
    'prezime' => 'Obradovic',
    'godiste' => '1990'
];

$osobe['Jelena'] = [
    'ime' => "Jelena",
    'prezime' => 'Milovanovic',
    'godiste' => '1995',
    'pol' => 'Zensko',
    'hobiji' =>  [
        'tenis',
        'glazba' => [
            'rock',
            'pop',
            'narodna' => ['Sinan Sakic', 'Dzej', 'Jasar']]], 
    'kontakt' => ['email'=>'Jelenamilovanovic@gmail'],
    'jmbg' => 020432050305,
    ];

echo $osobe['Marko']['godiste'] . "<br>";
echo $osobe['Jelena']['hobiji']['glazba'][0] . "<br>";
echo $osobe['Jelena']['jmbg'] . "<br>";


echo "Zovem se " . $osobe['Jelena']['ime'] . ", rodjena sam " . $osobe['Jelena']['godiste'] . ' i volim da igram ' . $osobe['Jelena']['hobiji'][0] . ". Omiljeni zanr muzike mi je " . $osobe['Jelena']['hobiji']['glazba'][1] . ", dok mi je omiljeni izvodjac " . $osobe['Jelena']['hobiji']['glazba']['narodna'][1] . "<br>";

//Problem:
// $osobe['Jelena'][0]['hobiji']['glazba'][1] Ukoliko bih isao u dubinu od nekoliko 'ugnezdavnja' kako bih onda ispisao ...Omiljeni zanr muzike mi je " . $osobe['Jelena'][0]['hobiji']['glazba'][2] - tacnije zelim da kazem da je omiljena muzika narodna ? ukoliko stavim index 2 imam gresku. 
//Pitanje za konsultacije

print_r($imena = array_keys($osobe)); //Vjezba
echo "<hr>";
print_r(array_values($osobe));
echo "<hr>";
echo $imena = array_key_first($osobe) . "<br>";
echo $imena = array_key_last($osobe) . "<br>";

if (array_key_exists('Jelena', $osobe)) {
    echo "The 'Jelena' key is in the array" . "<hr>";
}

print_r($prezimena = array_column($osobe, 'prezime')); // Vjezba
echo "<hr>";
print_r($hobiji = array_column($osobe, 'hobiji')); // Vjezba
echo "<hr>";
print_r($godine = array_column($osobe, 'godiste')); // Vjezba
echo "<hr>";


$glazbaValues = [];

foreach($osobe as $ljudi) {
    if(!empty($ljudi['hobiji']['glazba'])) {
        $glazbaValues[] = implode(", ", $ljudi['hobiji']['glazba']);
    }
}
print_r($glazbaValues); 
echo "<hr>";

//Pitanje za konsultacije, na koji nacin da ispisem i narodna

// ================================ Vjezba Godine =========================//
$datum = date("Y");
$godineDragan = $datum - $osobe['Dragan']['godiste'];
echo "Pozdrav, zovem se {$osobe['Dragan']['ime']} i imam {$godineDragan} godina";
echo "<hr>";



