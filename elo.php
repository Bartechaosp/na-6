<!-- zad 1 -->
 <?php 
 //zad 1
    // for ($i = 0; $i < 100 ;$i++) {
    //     if ($i % 3 == 0) echo($i);
    // }

//Zad 2
        // $tablica = [1,2,3];
        // $suma = 0;
        // for($i = 0; $i < count($tablica) ;$i++) {
        //     $suma += $tablica[$i];
        // }
        // echo $suma;

        //zad 3
        // $number = $_POST['input1'];
        // if ($number % 2 == 0) {
        //     echo("Liczba jest parzysta");
        // } else {
        //     echo("Liczba nie jest parzysta");
        // }

        //zad 4
        // $text = $_POST['input1'];
        // for ($i = 0; $i < strlen($text) ;$i++) {
        //     if($text[$i] == " " || $text[$i] == "-" && $text[$i] == ",") {
        //         echo "No Panie, to nie jest słowo i ";
        //     }
        // }
        // if($text == strrev($text)) {
        //     echo "to słowo jest tym czymś";
        // } else {
        //     echo "nie jest tym czymś";
        // }

        //zad 5
        // function czyPierwsza($liczba) {
        //     $count = 0;
        //     for ($i = 1; $i <= $liczba ;$i++) {
        //         if ($liczba % $i == 0) {
        //             $count++;
        //         }
        //     }
        //     if ($count == 2) echo $liczba;
        // }
        
        // for ($i = 1; $i < 100 ;$i++) {
        //     czyPierwsza($i);
        //     echo "\n";
        // }

        //zad 6
    //     function wieloZnak($napis, $powtoznik) {
    //         str_split($napis);
    //         for ($z=0; $z < strlen($napis);$z++) {
    //         for ($i=0; $i < $powtoznik ;$i++) {
    //             echo $napis[$z];
    //         }
    //     }
    // }
    //     $text = $_POST["input1"];
    //     $powtoznik = $_POST['input2'];
    //     wieloZnak($text, $powtoznik);

    //zad 7
    // for ($i = 1; $i < 100 ;$i++) {
    //     if ($i % 3 == 0 && $i % 5 == 0) {
    //         echo "FizzBuzz\n";
    //     } else if ($i % 5 == 0) {
    //         echo "Buzz\n";
    //     } else if ($i % 3 == 0) {
    //         echo "Fizz\n";
    //     } else echo "$i\n";
    // }

    //zad 8
    // function ciagZnakow($napis) {
    //     return strlen($napis);
    // }
    // echo ciagZnakow("Elo");

    //zad 9
    // $liczba1 = $_POST['input1'];
    // $liczba2 = $_POST['input2'];

    // function iloczyn($liczba1, $liczba2) {
    //     return $liczba1 * $liczba2;
    // }
    // echo iloczyn($liczba1, $liczba2);

    //zad 10
    // function reverse($napis) {
    //     for ($i = strlen($napis)-1; $i >= 0 ;$i--) {
    //         echo $napis[$i];
    //     }
    // }
    // reverse("elo");

    //zad 11
    // function ktoWiekszy($a, $b) {
    //     if ($a > $b) {
    //         return $a;
    //     } else return $b;
    // }
    // echo ktoWiekszy(2, 4);

    //zad 12
    // $tekst = $_POST['input1'];
    // function reverse($napis) {
    //     for ($i = strlen($napis)-1; $i >= 0 ;$i--) {
    //         echo $napis[$i];
    //     }
    // }
    // reverse($tekst);

    //zad 13
    //     function sredniaZTablicy($tablica) {
    //         $suma = 0;
    //         for ($i = 0; $i < count($tablica) ;$i++) {
    //             $suma += $tablica[$i];
    //         }
    //         return $suma / count($tablica);
    //     }

    // $tab = [1,2,3];

    // echo sredniaZTablicy($tab);

    //zad 14
    // for ($i = 1; $i < 10 ;$i++) {
    //     for ($y = 1; $y < 10 ;$y++) {
    //         $z = $i * $y;
    //         echo "$i * $y = $z\r\n";
    //     }
    // }

    //zad 15
    // while(True) {
    //     echo "1 - wylicz śilnię z podanej liczby\n";
    //     echo "2 - Spotęguj podstawę potęgi do wykładnika potęgi\n";
    //     echo "3 - niespodzianka\n";
    //     echo "4 - zamknij program\n";

    //     $optionMain = readline("Podaj opcję: ");
    //     if ($optionMain == 1) {
    //         $liczba = readline("Podaj liczbę do policzenia silni: ");
    //         $silnia = 1;
    //         for ($i = $liczba-1; $i > 0 ;$i--) {
    //             $silnia *= $i;
    //         }
    //         echo "$silnia\n";
    //     } else if ($optionMain == 2) {
    //         $podstawa = readline("Podaj podstawę potęgi: ");
    //         $wykladnik = readline("Podaj wykładnik potęgi: ");
    //         $wynik = pow($podstawa, $wykladnik);
    //         echo "$wynik\n";
    //     } else if ($optionMain == 3) {
    //         $tekst = "PHP jest cool :-f";
    //         for ($i = 0; $i < strlen($tekst) ;$i++) {
    //             echo "$tekst[$i] ";
    //         }
    //         echo "\n";
    //     } else if ($optionMain == 4) {
    //         break;
    //     }
    // }

    //zad 16
    //echo pi();
?> 
