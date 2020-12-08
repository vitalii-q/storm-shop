<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Современная толстовка',
                'name_en' => 'Modern sweatshirt',
                'code' => 'modern_sweatshirt',
                'category_id' => 2,
                'brand_id' => 1,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '1399',
                'image_1' => 'products/img-1 (detail).jpg',
                'image_2' => 'products/img-2 (detail).jpg',
                'image_3' => 'products/img-3 (detail).jpg',
            ],
            [
                'name' => 'Куртка демисезонная',
                'name_en' => 'Demi-season jacket',
                'code' => 'demi-season jacket',
                'category_id' => 1,
                'brand_id' => 2,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '3499',
                'image_1' => 'products/img-2.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Рубашка модная',
                'name_en' => 'Fashionable shirt',
                'code' => 'fashionable shirt',
                'category_id' => 3,
                'brand_id' => 3,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '1299',
                'image_1' => 'products/img-3.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Куртка стильная',
                'name_en' => 'Stylish jacket',
                'code' => 'stylish jacket',
                'category_id' => 1,
                'brand_id' => 1,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '6299',
                'image_1' => 'products/img-4.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Куртка мужская',
                'name_en' => 'Men\'s jacket',
                'code' => 'mens_jacket',
                'category_id' => 1,
                'brand_id' => 2,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '3500',
                'image_1' => 'products/img-5.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Свитер кашемировый',
                'name_en' => 'Сashmere sweater',
                'code' => 'cashmere_sweater',
                'category_id' => 2,
                'brand_id' => 3,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '2499',
                'image_1' => 'products/img-6.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Рубашка деловая',
                'name_en' => 'Business shirt',
                'code' => 'business_shirt',
                'category_id' => 3,
                'brand_id' => 4,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '1299',
                'image_1' => 'products/img-7.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Свитер молодежный',
                'name_en' => 'Youth sweater',
                'code' => 'youth_sweater',
                'category_id' => 2,
                'brand_id' => 2,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '2699',
                'image_1' => 'products/img-8.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Куртка женская',
                'name_en' => 'Female jacket',
                'code' => 'female_jacket',
                'category_id' => 1,
                'brand_id' => 1,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '3199',
                'image_1' => 'products/img-9.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Куртка длинная',
                'name_en' => 'Long jacket',
                'code' => 'long_jacket',
                'category_id' => 1,
                'brand_id' => 3,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '6399',
                'image_1' => 'products/img-10.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Свитер с воротником',
                'name_en' => 'Collar sweater',
                'code' => 'collar_sweater',
                'category_id' => 2,
                'brand_id' => 1,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '2299',
                'image_1' => 'products/img-11.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Водолазка',
                'name_en' => 'Turtleneck',
                'code' => 'turtleneck',
                'category_id' => 2,
                'brand_id' => 2,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '1500',
                'image_1' => 'products/img-12.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Куртка с капюшоном',
                'name_en' => 'Jacket with a hood',
                'code' => 'jacket_with_a_hood',
                'category_id' => 1,
                'brand_id' => 2,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '4699',
                'image_1' => 'products/img-1.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Брюки стильные',
                'name_en' => 'Stylish trousers',
                'code' => 'stylish_trousers',
                'category_id' => 4,
                'brand_id' => 3,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '1799',
                'image_1' => 'products/img-3.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
            [
                'name' => 'Куртка fashion 2021',
                'name_en' => 'Jacket fashion 2021',
                'code' => 'jacket_fashion_2021',
                'category_id' => 1,
                'brand_id' => 2,
                'description' => 'Равным образом постоянный количественный рост и сфера нашей активности в значительной степени 
                обуславливает создание дальнейших направлений развития. Товарищи! укрепление и развитие структуры обеспечивает широкому 
                кругу (специалистов) участие в формировании позиций, занимаемых участниками в отношении поставленных задач. Не следует, 
                однако забывать, что новая модель организационной деятельности представляет собой интересный эксперимент проверки 
                направлений прогрессивного развития.',
                'description_en' => 'Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim. Phasellus molestie risus non aliquet cursus. 
                Integer vestibulum mi lorem, id hendrerit ante lobortis non. Nunc ante ante, lobortis non pretium non, vulputate vel nisi. Maecenas 
                dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed laoreet velit. <br>
                Proin fringilla urna vel mattis euismod. Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut rutrum lectus 
                urna sit amet quam. Nulla maximus vestibulum mi vitae accumsan. Donec sit amet ligula et enim semper viverra a in arcu. Vestibulum 
                enim ligula, varius sed enim vitae, posuere molestie velit. Morbi risus orci, congue in nulla at, sodales fermentum magna.',
                'description_bottom' => 'Не следует, однако забывать, что дальнейшее развитие различных форм деятельности обеспечивает 
                широкому кругу (специалистов) участие в формировании дальнейших направлений развития. Задача организации, в особенности 
                же начало повседневной работы по формированию позиции требуют от нас анализа позиций, занимаемых участниками в отношении 
                поставленных задач. Равным образом рамки и место обучения кадров позволяет оценить значение новых предложений.',
                'description_bottom_en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse a diam ac magna viverra 
                ultricies nec eget risus. Vestibulum sed felis maximus, auctor felis eget, aliquam ligula. Sed eu enim aliquam, egestas 
                enim et, laoreet metus. Sed sed maximus massa. In maximus augue turpis, vel varius ex malesuada vitae. Nunc sit amet 
                justo velit. Fusce a euismod nunc, eget venenatis lorem. <br>
                Praesent semper pharetra justo, sed tempor nulla ultrices id. 
                Pellentesque posuere risus in enim ullamcorper dignissim sed accumsan libero. Praesent mauris leo, molestie vel erat sed, 
                luctus tincidunt tortor. Pellentesque cursus magna a vulputate efficitur.',
                'information' => 'Задача организации, в особенности же консультация с широким активом требуют от нас анализа систем 
                массового участия. Значимость этих проблем настолько очевидна, что новая модель организационной деятельности в 
                значительной степени обуславливает создание форм развития.',
                'information_en' => 'Ut sit amet nulla vel purus finibus eleifend. Vestibulum sit amet nisi et nibh efficitur porttitor 
                non ac enim. Integer diam lacus, semper nec porttitor quis, fringilla non ex. Aliquam faucibus eros sed odio tempor, at 
                laoreet orci commodo. Vivamus pulvinar facilisis iaculis. Sed interdum ante sed elementum luctus. Aliquam vitae nulla ut 
                lacus pretium auctor. Vestibulum vitae turpis a purus ullamcorper mattis faucibus eu dui. Mauris varius eros enim, non 
                pulvinar elit lobortis at. Suspendisse tincidunt lacus vel imperdiet mollis. <br>
                Sed malesuada nunc non urna rutrum, sit 
                amet iaculis nisl faucibus. Mauris lacinia condimentum nisi id consequat. Fusce volutpat nisl id metus fringilla, id 
                finibus massa rhoncus. Nullam nec lectus faucibus, laoreet eros ac, rhoncus nisi.',
                'price' => '6299',
                'image_1' => 'products/img-4.jpg',
                'image_2' => '',
                'image_3' => '',
            ],
        ]);
    }
}
