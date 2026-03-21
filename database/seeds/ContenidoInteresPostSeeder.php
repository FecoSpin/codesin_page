<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;

class ContenidoInteresPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = new Post;
        $post->title = "SINALOA HOY Y MAÑANA";
        $post->url = str_slug("SINALOA HOY Y MAÑANA");
        $post->excerpt = "Este video pretende reflejar la visión de desarrollo de Sinaloa a 25 años de la Alianza por la Competitividad, la cual, es una agenda con el objetivo de lograr avances en la posición";
        $post->urlvideo = "https://youtu.be/8yquMY2lTp0";
        $post->urlimage = "/img/contenidos/contenido1.png";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 4;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "CODESIN Alianza por la competitividad";
        $post->url = str_slug("CODESIN Alianza por la competitividad");
        $post->excerpt = "Desde el CODESIN impulsamos la Alianza por la Competitividad, una agenda para impulsar el crecimiento y el desarrollo de Sinaloa, que propone mejorar la competitividad del territorio y generar";
        $post->urlvideo = "https://youtu.be/YYGfTU0Fxas";
        $post->urlimage = "/img/contenidos/contenido2.png";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 4;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "SINALOA COMPETIMOS POR EL MUNDO";
        $post->url = str_slug("SINALOA COMPETIMOS POR EL MUNDO");
        $post->excerpt = "Sinaloa es uno de los cinco estados líderes del país, por su economía y competitividad.";
        $post->urlvideo = "https://youtu.be/3rk5iNkUlhc";
        $post->urlimage = "/img/contenidos/contenido3.png";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 4;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Movilidad en Sinaloa";
        $post->url = str_slug("Movilidad en Sinaloa");
        $post->excerpt = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris";
        $post->urlvideo = "https://youtu.be/r62_dzc9edA";
        $post->urlimage = "/img/contenidos/contenido5.jpg";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 4;
        $post->user_id = 1;
        $post->save();


        $post = new Post;
        $post->title = "SINALOA HOY Y MAÑANA";
        $post->url = str_slug("SINALOA HOY Y MAÑANA");
        $post->excerpt = "Este video pretende reflejar la visión de desarrollo de Sinaloa a 25 años de la Alianza por la Competitividad, la cual, es una agenda con el objetivo de lograr avances en la posición";
        $post->urlvideo = "https://youtu.be/8yquMY2lTp0";
        $post->urlimage = "/img/contenidos/contenido1.png";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 4;
        $post->user_id = 1;
        $post->save();
    }
}
