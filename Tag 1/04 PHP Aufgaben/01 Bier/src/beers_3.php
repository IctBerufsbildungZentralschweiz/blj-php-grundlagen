<?php
for ($beers = 99; $beers >= 0; $beers--) {
    $oneLess = $beers - 1;
    $bottles        = $beers   === 1 ? 'bottle' : 'bottles';
    $bottlesOneLess = $oneLess === 1 ? 'bottle' : 'bottles';
    if ($beers > 0) {
        echo "${beers} ${bottles} of beer on the wall, ${beers} ${bottles} of beer.\n"
           . "Take one down and pass it around, ${oneLess} ${bottlesOneLess} of beer on the wall.\n\n";
    } else {
        echo "No more bottles of beer on the wall, no more bottles of beer,\n"
           . "Go to the store and buy some more, 99 bottles of beer on the wall.\n\n";
    }
}
