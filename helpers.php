<?php

function getEmotions()
{
    return [
        1 => [
            'title' => 'Like',
            'icon' => '<i class="far fa-thumbs-up"></i>'
        ],
        2 => [
            'title' => 'Love',
            'icon' => '<i class="far fa-heart"></i>'
        ],
        3 => [
            'title' => 'Haha',
            'icon' => '<i class="far fa-laugh"></i>'
        ],
        4 => [
            'title' => 'Great Connection!',
            'icon' => '<img class=\'connection_emoji\' src='. asset('images/connection.png') .' alt=\'Connection\'>'
        ]
        // 5 => [
        //     'title' => 'Sad',
        //     'icon' => 'fa-sad-tear'
        // ],
        // 6 => [
        //     'title' => 'Angry',
        //     'icon' => 'fa-angry'
        // ]
    ];
}