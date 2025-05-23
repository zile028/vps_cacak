<?php
$contactInfo = [
    "adresa" => "Zemun, 11000 Beograd",
    "telefon" => "(011) 3771-552",
    "email" => "info@vpscacak.edu.rs",
    "radnoVreme" => "Radno vreme 09:30 - 16:30",
    "content" => "Студентска служба пружа својим студентима висок ниво услуга. У сарадњи са студентима непрекидно усавршава административне пословне процесе. У студентској служби можете:",
    "usluge" => [
        "Уписати и оверити семестар.",
        "Добити информације у вези режима студија.",
        "Добити уверење о статусу.",
        "Добити уверење о положеним испитима.",
        "Поднети и друге молбе.",
        "Пријавити испит.",
        "Поништити испит.",
        "Добити информације о преласку са других факултета и признавању испита."
    ]
];

view("public/kontakt.view", [
    "heroTitle" => "Контакт",
    "heroImage" => "hero_contact.jpg",
    "contactInfo" => $contactInfo
]);