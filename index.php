<?php

$api_url = 'https://www.themealdb.com/api/json/v1/1/categories.php';

$json_data = file_get_contents($api_url);

$response_data = json_decode($json_data);

$categories = $response_data->categories;

$allMeals = [];

foreach ($categories as $category) {
    $api_url = "https://www.themealdb.com/api/json/v1/1/filter.php?c=". $category->strCategory;
    $json_data = file_get_contents($api_url);
    $response_data = json_decode($json_data);
    $meals = $response_data->meals;
    foreach ($meals as $meal) {
        $meal->price = rand(100 , 600);
        array_push($allMeals , $meal);
    }
}

print_r(json_encode($allMeals));

?>
