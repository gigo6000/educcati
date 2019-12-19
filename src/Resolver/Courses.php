<?php

namespace App\Resolver;

class Courses
{
    private static $courses = [
        1 => [
            'id' => 1,
            'title' => 'Complete Intro to React v5',
            'slug' => 'complete-intro-to-react-v5',
            'isPublished' => true,
            'sections' => [
                [
                    'id' => 1,
                    'title' => 'Introduction',
                    'lessons' => [
                        [
                            'id' => 1,
                            'title' => 'Introduction',
                            'slug' => 'introduction',
                            'video' => 'http://techslides.com/demos/sample-videos/small.mp4',
                            'duration' => '3min',
                            'isCompleted' => false,
                            'isPublished' => false
                        ],
                        [
                            'id' => 1,
                            'title' => 'Project Setup',
                            'slug' => 'project-setup',
                            'video' => 'https://lamberta.github.io/html5-animation/examples/ch04/assets/movieclip.mp4',
                            'duration' => '20min',
                            'isCompleted' => false,
                            'isPublished' => false
                        ],
                    ]
                ],
                [
                    'id' => 2,
                    'title' => 'Pure React',
                    'lessons' => [
                        [
                            'id' => 1,
                            'title' => 'Getting started with Pure React',
                            'slug' => 'getting-started-with-pure-react',
                            'video' => 'https://content.jwplatform.com/manifests/yp34SRmf.m3u8',
                            'duration' => '3min',
                            'isCompleted' => false,
                            'isPublished' => false
                        ],
                        [
                            'id' => 1,
                            'title' => 'createElement Arguments',
                            'slug' => 'createelement-arguments',
                            'video' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4',
                            'duration' => '20min',
                            'isCompleted' => false,
                            'isPublished' => false
                        ],
                    ]
                ],

            ]
        ],
        2 => [
            'id' => 2,
            'name' => 'Learn Gatsby in 2 Hours',
            'isPublished' => true,
        ],
        3 => [
            'id' => 3,
            'name' => 'VIM Masterclass',
            'isPublished' => true,
        ],
    ];

    public static function getCourses()
    {
        return self::$courses;
    }
}
