<?php 
return [
    'title'           => 'Watch video',
    'id'              => 'watch-video',
    'icon'            => 'video',
    'description'     => 'Display video popup with title',    
    'parallax'        => true,
    'fields'          => [
        [
            
            'type' => 'text',
            'id' => 'video_url',
            'name' => 'Video URL',
            'std' => 'https://www.youtube.com/watch?v=6iuZX98dI90'
        ]        
    ],
];