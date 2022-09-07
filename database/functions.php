<?php

    /**
     * Gives the HTML list from the given array. 
     *
     * @param array $array
     * @param string|null $classUl
     * @param string|null $classLi
     * @return string
     */

    function getHtmlFromArray(array $array, string $classUl = null, string $classLi = null): string
    {
        if ($classUl) $classUl = " class=\"$classUl\"";
        if ($classLi) $classLi = " class=\"$classLi\"";
        $valueToLi = fn ($v) => "<li$classLi>$v</li>";
        return "<ul$classUl>" . implode("", array_map($valueToLi, $array)) . "</ul>";
    }



    
?>