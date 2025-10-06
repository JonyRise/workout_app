<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): JsonResponse
    {






        $array = [              //1 level
            9,
            3,
            [1, 5, 3],          //2 level
            23,
            [                   //2 level
                12,
                43,
                [1, 333, 5,]    //3 level
            ],
            23,
            [1, 5,],            //2 level
        ];
        // echo '<pre>';
        // // print_r($array);
        // $i = $array[4];
        // print_r($i);
        // $i = $i[2];
        // print_r($i);
        // $i = $i[1];
        // echo $i;


        // echo $array[4][2][1];



        $array = [              //1 level
            9,
            3,
            [1, 5, 3],          //2 level
            23,
            [                   //2 level
                12,
                43,
                [1, 333, 5,]    //3 level
            ],
            23,
            [1, 5,],            //2 level
        ];

        // print_r($array[1][7]);

        // echo 9[7];


        $aar = [1, 5, 3];


echo '<pre>';
        // print_r($aar[1]);
        // print_r([1, 5, 3][1]);




        // $a = 4;
        // $b = 4;
        // $c = 4;


        // $a = $a-$b;

        // echo $a;
        // echo $b;
        // echo $c;







        //робота з масивами
        // $array = [
        //     "Lorem","Ipsum","is","simply","dummy","text","of","the","printing","and",
        //     "typesetting","industry","Lorem","Ipsum","has","been","the","industry","s",
        //     "standard","dummy","text","ever","since","the","1500s","when","an","unknown",
        //     "printer","took","a","galley","of","type","and","scrambled","it","to","make",
        //     "a","type","specimen","book","It","has","survived","not","only","five",
        //     "centuries","but","also","the","leap","into","electronic","typesetting",
        //     "remaining","essentially","unchanged","It","was","popularised","in","the",
        //     "1960s","with","the","release","of","Letraset","sheets","containing","Lorem",
        //     "Ipsum","passages","and","more","recently","with","desktop","publishing",
        //     "software","like","Aldus","PageMaker","including","versions","of","Lorem","Ipsum"
        // ];

        $array = [1,2,3,4,5];


        foreach ($array as $index => $item) {
            echo "елемент із індексом " . $index . " МАЄ ЗНАЧЕННЯ " . $item;
            echo '<br>';
        }


        // echo $array[0];
        // echo $array[1];
        // echo $array[2];
        // echo $array[3];
        // echo $array[4];
        // echo $array[5]; //bad history


        $array = [1,2,5,11, [1,76,34,9,12,[12,4,6,8,9,12,12,[12,12,45,[12,12,465,76,[44,55,66,[7777]]],78,322]]], 787,23];





        return $this->json([]);
    }
}
