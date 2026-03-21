<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Storage::disk('publicImg')->deleteDirectory('posts');
        // Storage::disk('publicImg')->deleteDirectory('banners');
        Post::truncate();
        Category::truncate();
        Tag::truncate();

        $category = new Category;
        $category->name = "Paginas";
        $category->save();

        $category = new Category;
        $category->name = "Noticias";
        $category->save();

        $category = new Category;
        $category->name = "Proyectos";
        $category->save();

        $category = new Category;
        $category->name = "Contenido de interes";
        $category->save();

        $category = new Category;
        $category->name = "Estrategias";
        $category->save();

        $category = new Category;
        $category->name = "Politicas Publicas";
        $category->save();

        $tag = new Tag;
        $tag->name = "Proyectos Zona Norte";
        $tag->url = str_slug("Proyectos Zona Norte");
        $tag->save();

        $tag = new Tag;
        $tag->name = "Proyectos Zona Centro - Norte";
        $tag->url = str_slug("Proyectos Zona Centro - Norte");
        $tag->save();


        $tag = new Tag;
        $tag->name = "Proyectos Zona Centro";
        $tag->url = str_slug("Proyectos Zona Centro");
        $tag->save();


        $tag = new Tag;
        $tag->name = "Proyectos Zona Sur";
        $tag->url = str_slug("Proyectos Zona Sur");
        $tag->save();

        $post = new Post;
        $post->pageName = "Principal";
        $post->title = "¿Quiénes somos?";
        $post->url = str_slug("home");
        $post->excerpt = "¿Quiénes somos?";
        $post->body = "<p>Un organismo de colaboración público-privado para incidir en las definiciones e instrumentación de la visión de&nbsp; largo plaza en Sinaloa y mejorar la competitividad de sus empresas y regiones.</p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "https://youtu.be/0g5UI0QQ6nU";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->pageName = "Quiénes Somos";
        $post->title = "¿Qué es el CODESIN?";
        $post->url = str_slug("quienes-somos");
        $post->excerpt = "Qué es el CODESIN";
        $post->body = "<p> CODESIN es un espacio de colaboración público-privada, integrado por empresarios y funcionarios públicos, cuyo objetivo principal es influir en políticas públicas para la competitividad y el desarrollo económico de Sinaloa.
        Se crea por decreto en 1996 y se sustenta jurídicamente en la Ley de Fomento a la Inversión para el Desarrollo Económico del Estado de Sinaloa, publicada en 1997, en donde se reconoce como un organismo mixto que entre otros objetivos tiene proponer un proyecto económicos de largo plazo para el Estado, la planeación estratégica que los sustente, los mecanismos de medición de avance y la difusión que de estos conceptos debe realizarse.
        A nivel regional, CODESIN cuenta con cuatro Comités Regionales de Promoción Económica, cuyo objetivo principal es impulsar la competitividad y atractividad de sus Regiones.
        El CODESIN contribuye a crear las condiciones para atraer y retener inversiones, que es una de las formas más reconocidas para generar empleos. Crear las condiciones tiene que ver con la construcción de una plataforma competitiva, la planeación del desarrollo y con la institucionalización de un proceso de promoción que garantice al Estado la continuidad y la visión de largo plazo.</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->pageName = "Qué Hacemos";
        $post->title = "Center Investment & Trade (CIT)";
        $post->url = str_slug("Qué hacemos");
        $post->excerpt = "Center Investment & Trade (CIT)";
        $post->body = "<p>El Centro para la Inversión y el Comercio de Sinaloa es una agencia especializada creada por el Consejo para el Desarrollo Económico de Sinaloa (CODESIN) en coordinación con la Secretaría de Desarrollo Económico, con la finalidad de atraer inversión nacional y extranjera, así como desarrollar y apoyar al inversionista de nuestro estado.
        Nuestro compromiso es hacer que los negocios sucedan en Sinaloa, conectando a los actores empresariales locales y a las vocaciones regionales del Estado con las oportunidades de mercado e inversionistas de todo el mundo.
        Con alcance estatal en el CIT confluyen las capacidades de gestión y apoyo del Gobierno del Estado y el empuje y visión del sector privado.</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        // post categorias noticias
        

    }
}
