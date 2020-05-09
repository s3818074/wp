<?php
$movieInfo =
    [
        "ACT" => [
            "title" => "Avengers: Endgame",
            "rating" => "PG-13",
            "src" => "https://www.youtube.com/embed/TcMBFSGVi1c",
            "plot" => "After the devastating events of Avengers=> Infinity War (2018), the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos's actions and undo the chaos to the universe, no matter what consequences may be in store, and no matter who they face...",
            "time" => [
                "MON" => "", "TUE" => "", "WED" => "T21", "THU" => "T21", "FRI" => "T21", "SAT" => "T18", "SUN" => "T18"
            ]
        ],
        "RMC" => [
            "title" => "Top End Wedding",
            "rating" => "M",
            "src" => "https://www.youtube.com/embed/uoDBvGF9pPU",
            "plot" => "From the makers of The Sapphires, TOP END WEDDING is a celebration of love, family and belonging, set against the spectacular natural beauty of the Northern Territory. This heartwarming romantic comedy tells the story of successful Adelaide lawyer Lauren (Tapsell) and her fiancé Ned (Lee). Engaged and in love, they have just ten days to pull off their dream Top End Wedding. First though, they need track down Lauren's mother, who has gone AWOL somewhere in the Northern Territory.",
            "time" => [
                "MON" => "T18", "TUE" => "T18", "WED" => "", "THU" => "", "FRI" => "", "SAT" => "T15", "SUN" => "T15"
            ]
        ],
        "ANM" => [
            "title" => "Dumbo",
            "rating" => "PG",
            "src" => "https://www.youtube.com/embed/7NiYVoqBt-8",
            "plot" => "The stork delivers a baby elephant to Mrs. Jumbo, veteran of the circus, but the newborn is ridiculed because of his truly enormous ears and dubbed 'Dumbo'. After being separated from his mother, Dumbo is relegated to the circus' clown acts; it is up to his only friend, a mouse, to assist Dumbo to achieve his full potential.",
            "time" => [
                "MON" => "T12", "TUE" => "T12", "WED" => "T18", "THU" => "T18", "FRI" => "T18", "SAT" => "T12", "SUN" => "T12"
            ]
        ],
        "AHF" => [
            "title" => "The Happy Prince",
            "src" => "https://www.youtube.com/embed/tXANCJQkUIE",
            "plot" => "The untold story of the last days in the tragic times of Oscar Wilde, a person who observes his own failure with ironic distance and regards the difficulties that beset his life with detachment and humor.",
            "rating" => "R",
            "time" => [
                "MON" => "", "TUE" => "", "WED" => "T12", "THU" => "T12", "FRI" => "T12", "SAT" => "T21", "SUN" => "T21"
            ]
        ]
    ];
$priceList = [ "STA"=> [19.80,14.00], "STP"=> [17.50,12.50], "STC"=> [15.3,11.00], "FCA"=> [30.00,24.00], "FCP"=> [27.00,22.50], "FCC"=> [24.00,21.00] ];
php2js($movieInfo,"movieInfo");
php2js($priceList,"priceList");

$err = [];
if(!empty($_POST))
{
    print_red(calculatePrice($priceList));
    print_red($_POST["price"]);
    print_red(equalf(calculatePrice($priceList),$_POST["price"]));
}
?>