<?php 

$osobe = [
    'Dragan' => [
        "prezime" => "Vujic",
        "godiste" => "1995",
        "pol" => "Muški",
        "interesi" => ["fotografija","knjige"],
        "broj_telefona" => "+381601234",
        "email" => "dragan.vujic@gmail.com"
    ],
    'Jelena' => [
        "prezime"=> "Markovic",
        "godiste"=> "1997",
        "pol"=> "Zensko",
        "interesi"=>["muzika","umetnost"]
    ]
];

echo $osobe['Jelena']['interesi'][1];

$osobe['Marko'] = [];
$osobe['Natasa'] = [];
array_push($osobe['Marko'], [
    'prezime' => 'Obradovic',
    'godiste' => '1990'
]);

array_push($osobe['Natasa'], [
    'ime' => "Natasa",
    'prezime'=> 'Milovanovic',
    'godiste'=> '1995',
    'pol'=> 'Zensko',
    'hobiji'=> ['tenis','glazba' => ['rock', 'pop', 'naroda']],
    'kontakt'=> ['email'=>'natasamilovanovic@gmail'],
    'jmbg' => 020432050305,
    ]
);

echo  $osobe['Marko'][0]['godiste'];
echo $osobe['Natasa'][0]['hobiji']['glazba'][0];
echo $osobe['Natasa'][0]['jmbg'] . "<br>";
echo "Zovem se " . $osobe['Natasa'][0]['ime'] . ", rodjena sam " . $osobe['Natasa'][0]['godiste'] . ' i volim da igram ' . $osobe['Natasa'][0]['hobiji'][0]; 
