<?php
/**
 * Scott Medlock
 * 2/2/2018
 * validation functions for My Dating Website
 */

    function validName($name) {
        return ctype_alpha($name);
    }

    function validAge($age) {
        return (is_numeric($age) && $age >= 18);
    }

    function validPhone($phone) {
        // https://stackoverflow.com/questions/3090862/how-to-validate-phone-number-using-php
        return preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone);
    }

    function validOutdoor($list) {
        $validList = array('hiking', 'biking', 'swimming', 'collecting', 'walking', 'climbing');
        foreach ($list as $item) {
            if (!in_array($item, $validList)) {
                return false;
            }
        }
        return true;
    }

    function validIndoor($list) {
        $validList = array('tv', 'movies', 'cooking', 'board-games', 'puzzles', 'reading', 'playing-cards', 'video-games');
        foreach ($list as $item) {
            if (!in_array($item, $validList)) {
                return false;
            }
        }
        return true;
    }