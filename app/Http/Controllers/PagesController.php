<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Tag;
use App\Section;
use App\Models\AvisoPrivacidad;
use App\Models\Testimonio;
use App\Models\Staff;
use App\Models\PostExtras;
use App\Models\Biblioteca;
use App\Models\BibliotecaCategories;
use App\Models\BibliotecaSubcategories;
use App\Models\Email;
use App\BannersPostIndex;
use DB;
use Carbon\Carbon;

class PagesController extends Controller
{
    //
    public function spa(){
        return view('pages.spa');
    }
    public function home(){
        $pageinfo = Post::with('sections')->findOrFail(1);
        $noticias = Post::published()->where('category_id',2)->take(3)->get();


        return [ 'pageinfo' => $pageinfo, 'noticias'=>$noticias ];
    }

    public function homev2(){
        $codetalk = Post::published()->join('post_extra', 'posts.id', '=', 'post_extra.post_id')->where('category_id',7)->orderBy('published_at','DESC')->first();
        $codesinHechos = Post::published()->join('post_extra', 'posts.id', '=', 'post_extra.post_id')->where('category_id',8)->orderBy('published_at','DESC')->first();
        $sinaloaNum = Post::published()->join('post_extra', 'posts.id', '=', 'post_extra.post_id')->where('category_id',9)->orderBy('published_at','DESC')->first();

        if(is_null($codetalk)){
            $codetalk = (object)[];
            $codetalk->status = false;
            $codetalk->published_at = Carbon::create(1899, 1, 1, 0, 0, 0, 'America/Toronto');
        }
        if(is_null($codesinHechos)){
            $codesinHechos = (object)[];
            $codesinHechos->status = false;
            $codesinHechos->published_at = Carbon::create(1899, 1, 1, 0, 0, 0, 'America/Toronto');
        }
        if(is_null($sinaloaNum)){
            $sinaloaNum = (object)[];
            $sinaloaNum->status = false;
            $sinaloaNum->published_at = Carbon::create(1899, 1, 1, 0, 0, 0, 'America/Toronto');
        }

        $a = array();
        $a[71] = Array ('author' => $codetalk, 'date' => $codetalk->published_at );
        $a[49] = Array ( 'author' => $codesinHechos, 'date' => $codesinHechos->published_at ) ;
        $a[75] = Array ( 'author' => $sinaloaNum, 'date' => $sinaloaNum->published_at) ;

        $date = array();

        foreach ($a as $key => $row) {
            $date[$key]  = $row['date'];
        }
        // array_multisort($date, SORT_ASC, $a);
        array_multisort($date, SORT_DESC, $a);

        $noticias = Post::published()->where('category_id',2)->orderBy('published_at','desc')->take(3)->get();
        $articulos = Post::published()->where('category_id',11)->take(3)->orderBy('published_at','desc')->get();
        $query = Post::published()
        ->whereIn('category_id',[2,7,8,9,10,11])
        ->selectRaw('url,urlBanner,urlBannerMobile, category_id,published_at, case category_id when 2 then "noticia_show" when 7 then "codetalks_show" when 8 then "codetalks_show" when 9 then "sinaloaennumeros_show" when 10 then "posicionamiento_show"	when 11 then "articulo_show"  end AS "show"')
        ->orderBy('published_at','DESC')->take(3)
        ->get();

        return [ 'pagInfo' =>  $a, 'noticias'=>$noticias, 'articulos'=>$query];
    }

    public function quienesSomos(){

        $pageinfo = Post::findOrFail(2);
        $sections = Section::first();
        $testimonios = Testimonio::orderBy('id')->get();
        $consejos = Staff::where('departamento_id',1)->orderBy('position', 'ASC')->get();
        $estatales = Staff::where('departamento_id',2)->orderBy('position', 'ASC')->get();
        $cit = Staff::where('departamento_id',7)->orderBy('position', 'ASC')->get();
        $zonaNorte = Staff::where('departamento_id',3)->orderBy('position', 'ASC')->get();
        $zonaCentroNorte = Staff::where('departamento_id',4)->orderBy('position', 'ASC')->get();
        $zonaCentro = Staff::where('departamento_id',5)->orderBy('position', 'ASC')->get();
        $zonaSur = Staff::where('departamento_id',6)->orderBy('position', 'ASC')->get();
        if( request()->wantsJson() )
        {
            return [
                    'pageinfo' => $pageinfo,
                    'sections' => $sections,
                    'testimonios' => $testimonios,
                    'consejos' => $consejos,
                    'estatales' => $estatales,
                    'cit' => $cit,
                    'zonaNorte' => $zonaNorte,
                    'zonaCentroNorte' => $zonaCentroNorte,
                    'zonaCentro' => $zonaCentro,
                    'zonaSur' => $zonaSur


                ];
        }
        return view('pages.about');
    }

    public function queHacemos(){
        $pageinfo = Post::findOrFail(3);
        $sections = Section::first();
        $estrategias =  Post::where('category_id',5)->get();
        $proyectosAll = Post::published()->where('category_id',3);
        $proyectos = $proyectosAll->take(3);
        $politicas = Post::Published()->where('category_id',6)->get();
        $staff = Staff::where('departamento_id',7)->orderBy('position', 'ASC')->get();
        $znorte = Tag::where('id', 1)->with('posts')->withCount('posts')->first();
        $zcnorte = Tag::where('id', 2)->with('posts')->withCount('posts')->first();
        $zcentro = Tag::where('id', 3)->with('posts')->withCount('posts')->first();
        $zsur = Tag::where('id', 4)->with('posts')->withCount('posts')->first();
        if( request()->wantsJson() )
        {
            return [
                'pageinfo' => $pageinfo,
                'sections' => $sections,
                'estrategias' => $estrategias,
                'proyectos' => $proyectos,
                'politicas' => $politicas,
                'staff' => $staff,
                'znorte' => $znorte,
                'zcnorte' => $zcnorte,
                'zcentro' => $zcentro,
                'zsur' => $zsur
            ];
        }
    }

    public function comunicacion(){

        $estrategias = Post::where('category_id',4)->latest()->get();
        // $noticias = Post::published()->where('category_id',2)->take(3)->get();
        foreach ($estrategias as $estrategia) {
            $text = $estrategia->excerpt;
            $maxPos = 153;
            if (strlen($text) > $maxPos)
            {
                $lastPos = ($maxPos - 3) - strlen($text);
                $estrategia->excerpt = substr($text, 0, strrpos($text, ' ', $lastPos)) . '...';
            }
        }
        if( request()->wantsJson() )
        {
            return [
                'contenidoInsteres' => $estrategias,
                // 'noticias' => $noticias
            ];
        }
    }

    public function indexsearch(Request $request){
        $keywords = request('keywords');
        $posts = Post::where('title', 'LIKE', "%{$keywords}%")->where('category_id','!=', '4')
        ->orWhere('body', 'LIKE', "%{$keywords}%")
        ->orderBy('id')
        ->get();
        return $posts;
    }
    public function sinaloaNumeros(){
        $sinaloaNum = Post::published()->join('post_extra', 'posts.id', '=', 'post_extra.post_id')->where('category_id',9)->orderBy('published_at','DESC')->get();
        $banners = BannersPostIndex::where('category_id',9)->first();
        return [ 'sinaloaNum' =>  $sinaloaNum, 'banners' => $banners];
    }
    public function codetalks(){
        $codetalks = Post::published()->join('post_extra', 'posts.id', '=', 'post_extra.post_id')->where('category_id',7)->orderBy('published_at','DESC')->get();
        $banners = BannersPostIndex::where('category_id',7)->first();
        return [ 'codetalks' =>  $codetalks, 'banners' => $banners];
    }
    public function codesinHechos(){
        $codesinHechos = Post::published()->join('post_extra', 'posts.id', '=', 'post_extra.post_id')->where('category_id',8)->orderBy('published_at','DESC')->get();
        $banners = BannersPostIndex::where('category_id',8)->first();
        return [ 'codesinHechos' =>  $codesinHechos, 'banners' => $banners];
    }
    public function historia(){
        $pageinfo = Post::findOrFail(4);

        return [ 'pageinfo' =>  $pageinfo];
    }
    public function covid(){
        $pageinfo = Post::findOrFail(5);

        return [ 'pageinfo' =>  $pageinfo];
    }
    public function biblioteca(){
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $subcategories =  BibliotecaSubcategories::get();
        $categoria1 = Biblioteca::selectRaw('biblioteca.*,subCategories.id as subCategories_id, subCategories.nombre as subCategories_nombre, subCategories.url_img')->join('biblioteca_subcategories as subCategories', 'subCategories.id', '=', 'biblioteca.subcategory_id')->where('category_id',9)->orderBy('published_at', 'DESC')->get();
        $categoria3 = Biblioteca::selectRaw('biblioteca.*,subCategories.id as subCategories_id, subCategories.nombre as subCategories_nombre, subCategories.url_img')->join('biblioteca_subcategories as subCategories', 'subCategories.id', '=', 'biblioteca.subcategory_id')->where('category_id',10)->orderBy('published_at', 'DESC')->get();
        $categoria4 = Biblioteca::selectRaw('biblioteca.*')->where('category_id',11)->orderBy('published_at', 'DESC')->get();
        $categoria1 = $this->formatDate($categoria1);
        $categoria3 = $this->formatDate($categoria3);
        $categoria4 = $this->formatDate($categoria4);

        return [
            'categoria1' =>  $categoria1,
            'categoria3' =>  $categoria3,
            'categoria4' =>  $categoria4,
            'subcategories' => $subcategories];
    }
    public function storeEmail(Request $request){

        Email::create(['email' => $request->email]);

        return 'guardado con exito';
    }
    public function formatDate($obj){
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        foreach ($obj as $key => $value) {
            $fecha = Carbon::parse($value->published_at);
            $mes = $meses[($fecha->format('n')) - 1];
            $value->published_at = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
        }
        return $obj;
    }
    public function posicionamiento(){
        {
            $post = Post::Published()->where('category_id', 10)->get();

            if( request()->wantsJson() )
            {
                return $post;
            }
        }

        abort(404);

    }
    public function posicionamientoGet(Post $post){
        {

            $post->load('photos');
            $posicionamientos = Post::where('category_id', 10)->whereNotIn('id', [$post->id])->take(3)->orderBy('published_at','DESC')->get();

            if( request()->wantsJson() )
            {
                return ['post'=>$post, 'posicionamientos' => $posicionamientos];
            }

        }

        abort(404);

    }
    public function avisos(){
        {

            $aviso = AvisoPrivacidad::with(['avisosarea', 'avisosarea.avisoscontenidos'])->first();

            if( request()->wantsJson() )
            {
                return ['aviso'=>$aviso];
            }

        }

        abort(404);

    }
}
