<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\Models\TagEstrategias;
use Carbon\Carbon;

class EstrategiasPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TagEstrategias::truncate();

        $post = new Post;
        $post->title = "Estrategia para el Desarrollo industrial de Sinaloa";
        $post->url = str_slug("Estrategia para el Desarrollo industrial de Sinaloa");
        $post->excerpt = "Desarrollo industrial";
        $post->body = "<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
        </p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 5;
        $post->user_id = 1;
        $post->save();

        $estrategia = new TagEstrategias;
        $estrategia->post_id = $post->id;
        $estrategia->name = $post->excerpt;
        $estrategia->url = str_slug($post->excerpt);
        $estrategia->save();

        $post = new Post;
        $post->title = "Estrategia para la Bioeconomía de Sinaloa";
        $post->url = str_slug("Estrategia para la Bioeconomía de Sinaloa");
        $post->excerpt = "Bioeconomía";
        $post->body = "<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
        </p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 5;
        $post->user_id = 1;
        $post->save();

        $estrategia = new TagEstrategias;
        $estrategia->post_id = $post->id;
        $estrategia->name = $post->excerpt;
        $estrategia->url = str_slug($post->excerpt);
        $estrategia->save();

        $post = new Post;
        $post->title = "Estrategia para el Capital humano";
        $post->url = str_slug("Estrategia para el Capital humano");
        $post->excerpt = "Capital humano";
        $post->body = "<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
        </p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 5;
        $post->user_id = 1;
        $post->save();

        $estrategia = new TagEstrategias;
        $estrategia->post_id = $post->id;
        $estrategia->name = $post->excerpt;
        $estrategia->url = str_slug($post->excerpt);
        $estrategia->save();

        $post = new Post;
        $post->title = "Estrategia para los Institutos Municipales de Planeación";
        $post->url = str_slug("Estrategia para los Institutos Municipales de Planeación");
        $post->excerpt = "Institutos Municipales de Planeación";
        $post->body = "<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
        </p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 5;
        $post->user_id = 1;
        $post->save();

        $estrategia = new TagEstrategias;
        $estrategia->post_id = $post->id;
        $estrategia->name = $post->excerpt;
        $estrategia->url = str_slug($post->excerpt);
        $estrategia->save();

        $post = new Post;
        $post->title = "Estrategia para la Movilidad Sustentable";
        $post->url = str_slug("Estrategia para la Movilidad Sustentable");
        $post->excerpt = "Movilidad Sustentable";
        $post->body = "<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
        </p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 5;
        $post->user_id = 1;
        $post->save();

        $estrategia = new TagEstrategias;
        $estrategia->post_id = $post->id;
        $estrategia->name = $post->excerpt;
        $estrategia->url = str_slug($post->excerpt);
        $estrategia->save();

        $post = new Post;
        $post->title = "Estrategia para los Rellenos Sanitarios";
        $post->url = str_slug("Estrategia para los Rellenos Sanitarios");
        $post->excerpt = "Rellenos Sanitarios";
        $post->body = "<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
        </p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 5;
        $post->user_id = 1;
        $post->save();

        $estrategia = new TagEstrategias;
        $estrategia->post_id = $post->id;
        $estrategia->name = $post->excerpt;
        $estrategia->url = str_slug($post->excerpt);
        $estrategia->save();

        $post = new Post;
        $post->title = "Estrategia para la Planeación de largo plazo en Sinaloa";
        $post->url = str_slug("Estrategia para la Planeación de largo plazo en Sinaloa");
        $post->excerpt = "Planeación de largo plazo en Sinaloa";
        $post->body = "<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
        </p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 5;
        $post->user_id = 1;
        $post->save();

        $estrategia = new TagEstrategias;
        $estrategia->post_id = $post->id;
        $estrategia->name = $post->excerpt;
        $estrategia->url = str_slug($post->excerpt);
        $estrategia->save();

        $post = new Post;
        $post->title = "Estrategia para el Sistema Estatal Innovación";
        $post->url = str_slug("Estrategia para el Sistema Estatal Innovación");
        $post->excerpt = "Sistema Estatal de Innovación";
        $post->body = "<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
        </p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 5;
        $post->user_id = 1;
        $post->save();

        $estrategia = new TagEstrategias;
        $estrategia->post_id = $post->id;
        $estrategia->name = $post->excerpt;
        $estrategia->url = str_slug($post->excerpt);
        $estrategia->save();

        $post = new Post;
        $post->title = "Ley de Movilidad Sustentable - Reglamento de Transporte Público";
        $post->url = str_slug("Ley de Movilidad Sustentable - Reglamento de Transporte Público");
        $post->excerpt = "Ley de Movilidad Sustentable - Reglamento de Transporte Público";
        $post->body = "<p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
        </p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 6;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Sistema Estatal de Planeación";
        $post->url = str_slug("Sistema Estatal de Planeación");
        $post->excerpt = "Sistema Estatal de Planeación";
        $post->body = "<p>
        La creación de esta política pública surge de la necesidad de proponer y promover la creación de los elementos clave para una planeación de largo plazo bajo un enfoque integral y de visión compartida, que trascienda los periodos administrativos de gobierno y que rinda cuentas a todos los sinaloenses.
        </p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 6;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Plan de Ordenamiento Estratégico, Ecológico y Territorial de Escuinapa";
        $post->url = str_slug("Plan de Ordenamiento Estratégico, Ecológico y Territorial de Escuinapa");
        $post->excerpt = "Plan de Ordenamiento Estratégico, Ecológico y Territorial de Escuinapa";
        $post->body = "<p>
        El Consejo para el Desarrollo Económico de Sinaloa firmó en colaboración con el Ayuntamiento de Escuinapa y la Secretaría de Desarrollo impulsan y elaboran el Programa de Ordenamiento Ecológico Local (POEL) para el municipio del sur del estado.

        El POEL será un instrumento vinculante que permitirá al ayuntamiento regular el uso de suelo y las actividades productivas de Escuinapa fuera de su mancha urbana, para así lograr la protección del medio ambiente y el aprovechamiento sustentable de los recursos naturales a partir del análisis de las tendencias de deterioro y las potencialidades de aprovechamiento de los mismos.

        Por ser un proyecto prioritario en la Estrategia de Ciudades Sustentables de la Agenda Regional Estratégica de la Zona Sur, así como por la importancia de su impacto en el desarrollo sustentable de las actividades económicas de Escuinapa, el CODESIN contribuye a la elaboración de este instrumento para política pública en materia de desarrollo urbano.

        Entre los beneficios que se verán reflejados en el municipio con la implementación del programa también se encuentra el dar certidumbre a las inversiones, maximizando el consenso y minimizando el conflicto entre los sectores sociales y autoridades.

        El POEL armoniza con el objetivo de CODESIN de promover la competitividad de las regiones del estado, así como con la Ley de Ordenamiento Territorial y Desarrollo Urbano y la Ley de Residuos, ambas impulsadas y elaboradas por el consejo de colaboración público-privada en colaboración con SEDESU.
        </p>";
        $post->urlBanner = "img/default/banner.png";
        $post->urlBannerMobile = "img/default/banner.png";
        $post->urlvideo = "";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 6;
        $post->user_id = 1;
        $post->save();
        
    }
}
